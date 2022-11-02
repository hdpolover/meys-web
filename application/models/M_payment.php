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

        return $this->db->get()->result();
    }

    function getUserPaymentBatchHistory($user_id , $batch_id){
        $this->db->select('a.*, b.summit, c.payment_method, c.img_method')
        ->from('tb_payments a')
        ->join('m_payments_batch b', 'a.payment_batch = b.id')
        ->join('m_payments_settings c', 'a.payment_setting = c.id')
        ->where(['a.user_id' => $user_id, 'a.payment_batch' => $batch_id, 'a.is_deleted' => 0])
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


}
