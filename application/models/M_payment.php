<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_payment extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function getPaymentSettings(){
        return $this->db->get_where('m_payments_settings', ['is_deleted' => 0, 'type_method' => 'manual'])->result();
    }

    function getPaymentSettingsUser(){
        $models = $this->db->get_where('m_payments_settings', ['active' => 1, 'is_deleted' => 0, 'type_method' => 'manual'])->result();

        foreach ($models as $key => $val) {
            $models[$key]->data = json_decode($val->data);
        }

        return $models;
    }

    function getDetailPaymentSetting($id = null){
        return $this->db->get_where('m_payments_settings', ['is_deleted' => 0, 'id' => $id])->row();
    }

    function getUserPaymentBatch(){
        $this->db->select('*')
        ->from('m_payments_batch')
        ->where(['is_deleted' => 0])
        ->where(['start_date >=' => time(), 'end_date <=' => time()])
        ->or_where(['active' => 1])
        ;

        $models = $this->db->get()->result();

        foreach($models as $key => $val){
            if($this->checkPaymentUser($val->id)['status'] == true){
                $models[$key]->payment_status = $this->checkPaymentUser($val->id)['data']->status;
                $models[$key]->payments = $this->checkPaymentUser($val->id)['data'];
            }else{
                $models[$key]->payment_status = 3;
                $models[$key]->payments = null;
            }
        }

        return $models;
    }

    function checkPaymentUser($batch_id = null){
        $this->db->select('a.*, b.summit, c.payment_method, c.img_method')
        ->from('tb_payments a')
        ->join('m_payments_batch b', 'a.payment_batch = b.id')
        ->join('m_payments_settings c', 'a.payment_setting = c.id')
        ->where(['a.user_id' => $this->session->userdata('user_id'), 'a.status !=' => 3, 'a.payment_batch' => $batch_id, 'a.is_deleted' => 0])
        ;

        $models = $this->db->get()->row();

        if(!empty($models)){
            return [
                'status' => true,
                'data' => $models
            ];
        }else{
            return [
                'status' => false,
                'data' => null
            ];
        }
        
    }

    function getUserPaymentDetail($payment_id){
        $this->db->select('a.*, b.summit, c.payment_method, c.img_method, c.data')
        ->from('tb_payments a')
        ->join('m_payments_batch b', 'a.payment_batch = b.id')
        ->join('m_payments_settings c', 'a.payment_setting = c.id')
        ->where(['a.id' => $payment_id, 'a.is_deleted' => 0])
        ;

        $models = $this->db->get()->row();

        $models->data = json_decode($models->data);

        return $models;
    }

    function getUserPaymentBatchHistory($user_id , $batch_id){
        $this->db->select('a.*, b.summit, c.payment_method, c.img_method')
        ->from('tb_payments a')
        ->join('m_payments_batch b', 'a.payment_batch = b.id')
        ->join('m_payments_settings c', 'a.payment_setting = c.id')
        ->where(['a.user_id' => $user_id, 'a.payment_batch' => $batch_id, 'a.is_deleted' => 0])
        ->order_by('a.created_at DESC');
        ;

        return $this->db->get()->result();
    }

    function savePaymentSettings(){
        
        $id = $this->input->post('id');
        $active = $this->input->post('active');
        $data = $this->input->post('data');
        $tutorial = $this->input->post('tutorial');

        $data = [
            'active' => $active == 'on' ? 1 : 0,
            'data' => $data,
            'tutorial' => $tutorial,
            'modified_at' => time(),
            'modified_by' => $this->session->userdata('user_id')
        ];

        $this->db->where('id', $id);
        $this->db->update('m_payments_settings', $data);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

    function manualPayment($evidance = null){
        
        $user_id = $this->session->userdata('user_id');
        $payment_batch = $this->input->post('payment_batch');
        $payment_setting = $this->input->post('payment_setting');
        $amount = $this->input->post('amount');
        $amount_usd = $this->input->post('amount_usd');
        $remarks = $this->input->post('remarks');

        $data = [
            'user_id' => $user_id,
            'transaction_code' => createCode("MANUAL".$this->input->post('code_method')),
            'payment_batch' => $payment_batch,
            'payment_setting' => $payment_setting,
            'evidance' => $evidance,
            'amount' => $amount,
            'amount_usd' => $amount_usd,
            'remarks' => $remarks,
            'created_at' => time(),
            'created_by' => $this->session->userdata('user_id')
        ];

        $this->db->insert('tb_payments', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    function manualPaymentCancel()
    {
        $id = $this->input->post('id');

        $data = [
            'status' => 3,
            'modified_at' => time(),
            'modified_by' => $this->session->userdata('user_id')
        ];

        $this->db->where('id', $id);
        $this->db->update('tb_payments', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    function getAllPayments(){
        $this->db->select('a.*, b.summit, c.payment_method, c.img_method, d.email, e.name, f.institution_workplace as institution')
        ->from('tb_payments a')
        ->join('m_payments_batch b', 'a.payment_batch = b.id')
        ->join('m_payments_settings c', 'a.payment_setting = c.id')
        ->join('tb_auth d', 'a.user_id = d.user_id')
        ->join('tb_user e', 'a.user_id = e.user_id')
        ->join('tb_participants f', 'a.user_id = f.user_id')
        ->where(['a.is_deleted' => 0, 'a.status <' => 3])
        ->group_by('a.user_id')
        ->order_by('a.created_at DESC');

        $models = $this->db->get()->result();

        foreach($models as $key => $val){
            $models[$key]->payment_history = $this->getUserPaymentBatchHistory($val->user_id, 2);
        }

        return $models;
    }

    function verificationPayment()
    {
        $user_id = $this->input->post('user_id');
        $id = $this->input->post('id');

        $data = [
            'is_payment' => 1,
            'modified_at' => time(),
            'modified_by' => $this->session->userdata('user_id')
        ];

        $this->db->where('user_id', $user_id);
        $this->db->update('tb_participants', $data);

        $data = [
            'status' => 2,
            'modified_at' => time(),
            'modified_by' => $this->session->userdata('user_id')
        ];

        $this->db->where('id', $id);
        $this->db->update('tb_payments', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    function rejectedPayment()
    {
        $id = $this->input->post('id');

        $data = [
            'status' => 4,
            'modified_at' => time(),
            'modified_by' => $this->session->userdata('user_id')
        ];

        $this->db->where('id', $id);
        $this->db->update('tb_payments', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

}
