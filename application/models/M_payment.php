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

    function getUserPaymenHistory($user_id){
        $this->db->select('a.*, b.summit, c.payment_method, c.img_method')
        ->from('tb_payments a')
        ->join('m_payments_batch b', 'a.payment_batch = b.id')
        ->join('m_payments_settings c', 'a.payment_setting = c.id')
        ->where(['a.user_id' => $user_id, 'a.is_deleted' => 0])
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

        $offset = $this->input->post('start');
        $limit  = $this->input->post('length'); // Rows display per page
        $summary            = [
            'totalIncome' => 0,
            'manualIncome' => 0,
            'paypalIncome' => 0,
            'xenditIncome' => 0,

            'paymentSuccess' => 0,
            'paymentPending' => 0,
            'paymentFailed' => 0,
            'paymentExpired' => 0,

        ];
        
        $filter = [];

        if($this->input->post('filterEmail') != null || $this->input->post('filterEmail') != '') $filter[] = "d.email like '%".$this->input->post('filterEmail')."%'";
        if($this->input->post('filterName') != null || $this->input->post('filterName') != '') $filter[] = "e.name like '%".$this->input->post('filterName')."%'";

        if($this->input->post('filterInstitution') != null || $this->input->post('filterInstitution') != '') $filter[] = "f.institution_workplace like '%".$this->input->post('filterInstitution')."%'";
        if($this->input->post('filterBatch') != null && $this->input->post('filterBatch') > 0) $filter[] = "a.payment_batch = ".$this->input->post('filterBatch');
        if($this->input->post('filterStatus') != null && $this->input->post('filterStatus') > 0) $filter[] = "a.status = ".$this->input->post('filterStatus');

        if($filter != null){
            $filter = implode(' AND ', $filter);
        }  

        $this->db->select('a.*, b.summit, c.payment_method, c.img_method, d.email, e.name, e.phone, f.institution_workplace as institution')
        ->from('tb_payments a')
        ->join('m_payments_batch b', 'a.payment_batch = b.id')
        ->join('m_payments_settings c', 'a.payment_setting = c.id')
        ->join('tb_auth d', 'a.user_id = d.user_id')
        ->join('tb_user e', 'a.user_id = e.user_id')
        ->join('tb_participants f', 'a.user_id = f.user_id')
        ->where(['a.is_deleted' => 0, 'b.active' => 1])
        ;


        $this->db->where($filter)

        ->group_by('a.user_id')
        ->order_by('a.status ASC');

        $models = $this->db->get()->result();

        foreach($models as $key => $val){
            $models[$key]->payment_history = $this->getUserPaymentBatchHistory($val->user_id, 2);
        }

        $totalRecords = count($models);

        foreach ($models as $key => $val) {

            if ($val->status == 1) {
                $summary['paymentPending'] += 1;
            } elseif ($val->status == 2) {
                $summary['totalIncome'] += $val->amount;

                if($val->payment_setting == 1){
                    $summary['paypalIncome'] += $val->amount;
                }else{
                    $summary['manualIncome'] += $val->amount;
                }
                
                $summary['paymentSuccess'] += 1;
            } elseif ($val->status == 3) {
                $summary['paymentFailed'] += 1;
            } elseif ($val->status == 4) {
                $summary['paymentFailed'] += 1;
            } elseif ($val->status == 5) {
                $summary['paymentExpired'] += 1;
            }
            

        }

        $summary = [
            'totalIncome' => "Rp. ".number_format($summary['totalIncome']),
            'manualIncome' => "Rp. ".number_format($summary['manualIncome']),
            'paypalIncome' => "Rp. ".number_format($summary['paypalIncome']),
            'xenditIncome' => "Rp. ".number_format($summary['xenditIncome']),

            'paymentSuccess' => number_format($summary['paymentSuccess']),
            'paymentPending' => number_format($summary['paymentPending']),
            'paymentFailed' => number_format($summary['paymentFailed']),
            'paymentExpired' => number_format($summary['paymentExpired'])
        ];

        $models = array_slice($models, $offset, $limit);

        return ['records' => array_values($models), 'totalDisplayRecords' => count($models), 'totalRecords' => $totalRecords, 'summary' => $summary];
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
