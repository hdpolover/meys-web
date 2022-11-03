<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // global
    function get_settingsValue($key){
        return $this->db->get_where('tb_settings', ['key' => $key])->row()->value;
    }

    function countDashboard(){

        $proyek = $this->db->get_where('tb_proyek', ['is_deleted' => 0])->num_rows();
        $leader = $this->db->get_where('tb_auth', ['role' => 2, 'status' => 1])->num_rows();
        $staff = $this->db->get_where('tb_auth', ['role' => 3, 'status' => 1])->num_rows();
        $tasks = $this->db->get_where('tb_proyek_task', ['is_deleted' => 0])->num_rows();

        return ['proyek' => $proyek, 'leader' => $leader, 'staff' => $staff, 'tasks' => $tasks];
    }

    function get_allAccount(){
        $this->db->select('a.email, a.role, a.status, a.is_deleted, a.log_time, a.device, b.*')
        ->from('tb_auth a')
        ->join('tb_user b', 'a.user_id = b.user_id', 'inner')
        ->order_by('a.role ASC')
        ;

        return $this->db->get()->result();
    }

    function get_superAccount(){
        $this->db->select('a.email, a.password, a.log_time, a.device, b.*')
        ->from('tb_auth a')
        ->join('tb_user b', 'a.user_id = b.user_id', 'inner')
        ->where(['a.role' => 0])
        ;

        return $this->db->get()->row();
    }

    function get_adminAccount(){
        $this->db->select('a.email, a.log_time, a.device, b.*')
        ->from('tb_auth a')
        ->join('tb_user b', 'a.user_id = b.user_id', 'inner')
        ->where(['a.role' => 1])
        ;

        return $this->db->get()->row();
    }

    function getParticipans(){
        $this->db->select('*')
        ->from('tb_auth a')
        ->join('tb_user b', 'a.user_id = b.user_id', 'inner')
        ->where(['a.role' => 2])
        ;

        return $this->db->get()->result();
    }

    public function getParticipansAll(){

        $offset = $this->input->post('start');
        $limit  = $this->input->post('length'); // Rows display per page
        
        $filter = [];
        $filter_other['submit'] = null;
        $filter_other['check']  = null;
        $filter_other['step']   = null;

        if($this->input->post('filterEmail') != null || $this->input->post('filterEmail') != '') $filter[] = "a.email like '%".$this->input->post('filterEmail')."%'";
        if($this->input->post('filterName') != null || $this->input->post('filterName') != '') $filter[] = "b.name like '%".$this->input->post('filterName')."%'";
        if($this->input->post('filterNumber') != null || $this->input->post('filterNumber') != '') $filter[] = "b.phone like '%".$this->input->post('filterNumber')."%'";
        if($this->input->post('filterVerified') != null || $this->input->post('filterVerified') != '') $filter[] = ($this->input->post('filterVerified') == 2 ? "a.status like '%".$this->input->post('filterVerified')."%'" : "a.active like '%".$this->input->post('filterVerified')."%'");

        
        if($this->input->post('filterSubmited') != null || $this->input->post('filterSubmited') != '') $filter_other['submit'] = $this->input->post('filterSubmited');
        if($this->input->post('filterChecked') != null || $this->input->post('filterChecked') != '') $filter_other['check'] = $this->input->post('filterChecked');
        if($this->input->post('filterStep') != null || $this->input->post('filterStep') != '') $filter_other['step'] = $this->input->post('filterStep');

        if($filter != null){
            $filter = implode(' AND ', $filter);
        }  

        $this->db->select('*')
        ->from('tb_auth a')
        ->join('tb_user b', 'a.user_id = b.user_id', 'inner')
        ->where(['a.role' => 2])
        ;

        $this->db->where($filter);
        $this->db->order_by('b.name ASC');

        // $this->db->limit($limit)->offset($offset);

        $models = $this->db->get()->result();

        foreach($models as $key => $val){
            $models[$key]->status_account   = $val->active == 0 ? 0 : $val->status;
            $models[$key]->status_payment   = $this->checkPaymentUserAll($val->user_id)['status'];
            $models[$key]->payment_data     = $this->checkPaymentUserAll($val->user_id)['data'];
            $models[$key]->status_submit    = $this->checkSubmitUserStatus($val->user_id)['status'];
            $models[$key]->submit_data      = $this->checkSubmitUserStatus($val->user_id)['data'];
            $models[$key]->essay            = $this->getEssayUser($val->user_id);
        
            if($val->status_submit == true){
                if($val->submit_data->step == 1){
                    $models[$key]->step_status = 1;
                }elseif($val->submit_data->step == 2){
                    $models[$key]->step_status = 2;
                }elseif($val->submit_data->step == 3){
                    $models[$key]->step_status = 3;
                }elseif($val->submit_data->step == 4){
                    $models[$key]->step_status = 4;
                }elseif($val->submit_data->step == 5){
                    $models[$key]->step_status = 5;
                }elseif($val->submit_data->step == 6 && $val->submit_data->status < 2){
                    $models[$key]->step_status = 6;
                }elseif($val->submit_data->step == 6 && $val->submit_data->status >= 2){
                    $models[$key]->step_status = 7;
                }else{
                    $models[$key]->step_status = 0;
                }
            }else{
                $models[$key]->step_status = 0;
            }
        }
        
        if(!is_null($filter_other['submit'])){
            foreach($models as $key => $val){
                if($filter_other['submit'] == 2){
                    if($val->step_status != 7){
                        unset($models[$key]);
                    }
                }else{
                    if($val->step_status == 7){
                        unset($models[$key]);
                    }
                }
            }
        }
        
        if (!is_null($filter_other['check'])) {
            // accepted/checked
            if ($filter_other['check'] == 3) {
                foreach ($models as $key => $val) {
                    if ($val->status_submit == false) {
                        unset($models[$key]);
                    }
                }

                foreach ($models as $key => $val) {
                    if ($val->submit_data->status != 3) {
                        unset($models[$key]);
                    }
                }
            }

            // not checked
            if($filter_other['check'] == 2){
                foreach ($models as $key => $val) {
                    if ($val->status_payment == true) {
                        unset($models[$key]);
                    }
                }
            }

            // rejected
            if($filter_other['check'] == 4){
                foreach ($models as $key => $val) {
                    if ($val->status_submit == false) {
                        unset($models[$key]);
                    }
                }

                foreach ($models as $key => $val) {
                    if ($val->submit_data->status != 4) {
                        unset($models[$key]);
                    }
                }
            }
        }

        if(!is_null($filter_other['step'])){
            foreach($models as $key => $val){
                if($val->step_status != $filter_other['step']){
                    unset($models[$key]);
                }
            }
        }

        $totalRecords = count($models);

        $models = array_slice($models, $offset, $limit);

        return ['records' => array_values($models), 'totalDisplayRecords' => count($models), 'totalRecords' => $totalRecords];
    }

    function get_statistik(){
        $total_pendaftar = $this->db->get_where('tb_auth', ['role' => 2])->num_rows();
        $new_register = $this->db->get_where('tb_auth', ['role' => 2, 'created_at >=' => time(), 'created_at <=' => time()])->num_rows();
        $total_participants = $this->db->get_where('tb_participants', ['status' => 2, 'is_deleted' => 0])->num_rows();

        $arr = [
            'total' => $total_pendaftar,
            'participants' => $total_participants,
            'register_today' => $new_register,
        ];

        return $arr;
    }

    function getChartGender()
    {
        $this->db->select('a.gender, COUNT(a.user_id) as count');
        $this->db->from('tb_user a');
        $this->db->join('tb_auth b', 'a.user_id = b.user_id');
        $this->db->where('b.role', 2);
        $this->db->group_by('gender');
        return $this->db->get()->result();
    }

    function getChartDaily()
    {
        $this->db->select("FROM_UNIXTIME(created_at, '%Y-%m-%d') AS created_at, COUNT(FROM_UNIXTIME(created_at, '%Y-%m-%d')) AS count");
        $this->db->from('tb_participants');
        $this->db->where('status', 2);
        $this->db->group_by("FROM_UNIXTIME(created_at, '%Y-%m-%d')");
        return $this->db->get()->result();
    }

    function getChartDailyAccount()
    {
        $this->db->select("FROM_UNIXTIME(created_at, '%Y-%m-%d') AS created_at, COUNT(FROM_UNIXTIME(created_at, '%Y-%m-%d')) AS count");
        $this->db->from('tb_auth');
        $this->db->group_by("FROM_UNIXTIME(created_at, '%Y-%m-%d')");
        return $this->db->get()->result();
    }

    function checkPaymentUserAll($user_id = null){
        $this->db->select('a.*, b.summit, c.payment_method, c.img_method')
        ->from('tb_payments a')
        ->join('m_payments_batch b', 'a.payment_batch = b.id')
        ->join('m_payments_settings c', 'a.payment_setting = c.id')
        ->where(['a.user_id' => $user_id, 'a.status !=' => 3, 'b.active' => 1, 'a.is_deleted' => 0])
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

    function checkSubmitUserStatus($user_id = null){
        $this->db->select('a.*, b.*, c.email, d.fullname')
        ->from('tb_participants a')
        ->join('tb_user b', 'a.user_id = b.user_id')
        ->join('tb_auth c', 'a.user_id = c.user_id')
        ->join('tb_ambassador d', 'a.referral_code = d.referral_code', 'left')
        ->where(['a.is_deleted' => 0, 'c.status' => 1, 'a.user_id' => $user_id])
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

    function getEssayUser($user_id = null){
        $this->db->select('a.*, b.question, b.type')
        ->from('tb_participants_essay a')
        ->join('m_essay b', 'a.m_essay_id = b.id')
        ->where(['a.user_id' => $user_id]);

        $models = $this->db->get()->result();

        return $models;
    }

}
