<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    // construct
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['M_admin', 'M_user', 'M_master', 'M_payment']);

        // cek apakah user sudah login
        if ($this->session->userdata('logged_in') == false || !$this->session->userdata('logged_in')) {
            if (!empty($_SERVER['QUERY_STRING'])) {
                $uri = uri_string() . '?' . $_SERVER['QUERY_STRING'];
            } else {
                $uri = uri_string();
            }
            $this->session->set_userdata('redirect', $uri);
            $this->session->set_flashdata('notif_warning', "Please login to continue");
            redirect('sign-in');
        }
    }

    public function loadOnlineUsers()
    {
        $data['online_users'] = $this->M_admin->getOnlineUsers();
        
        $this->load->view('online_users', $data);
    }

    public function index()
    {
        $this->templateback->view('admin/dashboard');
    }

    public function statistics()
    {

        // statistik
        $data['statistik'] = $this->M_admin->get_statistik();

        // gender chart
        $statChartGender = $this->M_admin->getChartGender();
        foreach ($statChartGender as $val):
            $val->gender = $val->gender == "" ? "others" : $val->gender;
            $data['arrChartGender']['gender'][] = "'".$val->gender."'";
            $data['arrChartGender']['jmlPeserta'][] = $val->count;
        endforeach;

        // daiily chart
        $statChartDaily = $this->M_admin->getChartDaily();
        foreach ($statChartDaily as $val):
            // $data['arrChartDaily']['created_at'][] = "'".date("Y-m-d\TH:i:s\.v\Z", $val->created_at)."'";
            $data['arrChartDaily']['created_at'][] = "'".$val->created_at."'";
            $data['arrChartDaily']['jmlPeserta'][] = $val->count;
        endforeach;

        // daily  account chart
        $statChartDailyAccount = $this->M_admin->getChartDailyAccount();
        foreach ($statChartDailyAccount as $val):
            // $data['arrChartDailyAccount']['created_at'][] = "'".date("Y-m-d\TH:i:s\.v\Z", $val->created_at)."'";
            $data['arrChartDailyAccount']['created_at'][] = "'".$val->created_at."'";
            $data['arrChartDailyAccount']['jmlPeserta'][] = $val->count;
        endforeach;
        $data['arrChartDailyDate'] = array_unique(array_merge($data['arrChartDailyAccount']['created_at'], $data['arrChartDaily']['created_at']), SORT_REGULAR);
        
        $this->templateback->view('admin/statistics', $data);
    }

    public function payments()
    {
        $this->templateback->view('admin/payments');
    }

    public function participans()
    {
        $data['participans'] = $this->M_admin->getParticipansAll();
        // ej($data);
        $this->templateback->view('admin/participans/list', $data);
    }

    public function participans_detail($participans_id = null)
    {
        $this->templateback->view('admin/dashboard');
    }

    public function settings()
    {
        
        $page = $this->input->get('p');
        switch ($page) {
            case 'general':

                if ($this->agent->is_mobile()) {
                    $this->templatemobile->view('admin/settings/general');
                } else {
                    $this->templateback->view('admin/settings/general');
                }
                break;

            case 'user-log':
                $data['master_password'] = $this->M_admin->get_settingsValue('master_password');
                $data['account'] = $this->M_admin->get_allAccount();
                $data['admin'] = $this->M_admin->get_adminAccount();
                $data['super'] = $this->M_admin->get_superAccount();

                if ($this->agent->is_mobile()) {
                    $this->templatemobile->view('admin/settings/user_log', $data);
                } else {
                    $this->templateback->view('admin/settings/user_log', $data);
                }
                break;

            case 'credentials':
                $data['master_password'] = $this->M_admin->get_settingsValue('master_password');
                $data['account'] = $this->M_admin->get_allAccount();
                $data['admin'] = $this->M_admin->get_adminAccount();
                $data['super'] = $this->M_admin->get_superAccount();

                if ($this->agent->is_mobile()) {
                    $this->templatemobile->view('admin/settings/credentials', $data);
                } else {
                    $this->templateback->view('admin/settings/credentials', $data);
                }
                break;

            case 'mailer':
                $data['mailer_mode'] = $this->M_admin->get_settingsValue('mailer_mode');
                $data['mailer_host'] = $this->M_admin->get_settingsValue('mailer_host');
                $data['mailer_port'] = $this->M_admin->get_settingsValue('mailer_port');
                $data['mailer_smtp'] = $this->M_admin->get_settingsValue('mailer_smtp');
                $data['mailer_connection'] = $this->M_admin->get_settingsValue('mailer_connection');
                $data['mailer_alias'] = $this->M_admin->get_settingsValue('mailer_alias');
                $data['mailer_username'] = $this->M_admin->get_settingsValue('mailer_username');
                $data['mailer_password'] = $this->M_admin->get_settingsValue('mailer_password');

                if ($this->agent->is_mobile()) {
                    $this->templatemobile->view('admin/settings/mailer', $data);
                } else {
                    $this->templateback->view('admin/settings/mailer', $data);
                }
                break;

            default:

                if ($this->agent->is_mobile()) {
                    $this->templatemobile->view('admin/settings');
                } else {
                    $this->templateback->view('admin/settings');
                }
                break;
        }
    }

    public function getDetailParticipant(){

        $user_id = $this->input->post('user_id');
        
		if (!is_null($this->M_user->getUserParticipans($user_id))) {
        
            $data['participants']   = $this->M_user->getUserParticipans($user_id);
            $participans_id         = isset($data['participants']->id) ? $data['participants']->id : null;
            $data['p_essay']        = $this->M_user->getUserParticipansEssay($user_id, $participans_id);
            $data['m_essay']        = $this->M_master->getParticipansEssay();
            $data['countries']      = $this->M_user->getAllCountries();

            $this->load->view('admin/ajax/detail_participant', $data);

		} else {
			echo "<center class='py-5'><h4>There is an error when trying get user participant's data!</h4></center>";
		}
    }
    
    public function getAjaxParticipant(){
        $participants       = $this->M_admin->getParticipansAll();

        $draw               = $this->input->post('draw');
        $search             = $this->input->post('search')['value'];
        $arr                = [];
        $no                 = $this->input->post('start')+1;
        $submissionState    = 1;

        foreach ($participants['records'] as $key => $val) {
            
            $btnDetail      = '<button onclick="showMdlParticipantDetail(\''.$val->user_id.'\')" class="btn btn-soft-info btn-icon btn-sm me-2"><i class="bi-eye"></i></button>';
            $btnPass        = '<button onclick="showMdlChangePassword(\''.$val->user_id.'\')" class="btn btn-soft-primary btn-icon btn-sm me-2"><i class="bi-key"></i></button>';
            $btnEmail        = '<button onclick="showMdlChangeEmail(\''.$val->user_id.'\')" class="btn btn-soft-danger btn-icon btn-sm me-2"><i class="bi-envelope"></i></button>';
            $btnCheck       = '<button onclick="showMdlChecked(\''.$val->user_id.'\')" class="btn btn-soft-success btn-icon btn-sm me-2"><i class="bi-check"></i></button>';
            $step           = '<span class="badge bg-soft-secondary">Not yet fill submission</span>';
            $statusAccount  = '<span class="badge bg-soft-danger">Unverified</span>';
            $statusSubmit   = '<span class="badge bg-soft-danger">Not Submitted</span>';
            $statusCheck    = '<span class="badge bg-soft-danger">Not Checked</span>';

            if($val->status_submit == true){
                if($val->step_status == 1){
                    $step = '<span class="badge bg-soft-info">(1) Personal Data</span>';
                }elseif($val->step_status == 2){
                    $step = '<span class="badge bg-soft-warning">(2) Others</span>';
                }elseif($val->step_status == 3){
                    $step = '<span class="badge bg-soft-danger">(3) Question</span>';
                }elseif($val->step_status == 4){
                    $step = '<span class="badge bg-soft-primary">(4) Programs</span>';
                }elseif($val->step_status == 5){
                    $step = '<span class="badge bg-blue-dark">(5) Self Photo</span>';
                }elseif($val->step_status == 6){
                    $step = '<span class="badge bg-soft-success">(6) Payment & Agreement</span>';
                }elseif($val->step_status == 7){
                    $step = '<span class="badge bg-soft-success">Waiting for review</span>';
                }
            }

            if($val->status_payment == true){
                $val->submit_data->status = (int) $val->submit_data->status;
                if($val->submit_data->status ==  0 || $val->submit_data->status == 1){
                    $statusSubmit   = '<span class="badge bg-soft-danger">Not Submitted</span>';
                    $submissionState= 1;
                }
                if($val->submit_data->status == 2){
                    $statusSubmit   = '<span class="badge bg-soft-info">Submitted</span>';
                    $submissionState= 2;
                }
                if($val->submit_data->status == 3){
                    $step           = '<span class="badge bg-soft-success">Reviewed</span>';
                    $statusSubmit   = '<span class="badge bg-soft-info">Submitted</span>';
                    $statusCheck    = '<span class="badge bg-soft-success">Accepted</span>';
                    $submissionState= 3;
                }
                if($val->submit_data->status == 4){
                    $step           = '<span class="badge bg-soft-success">Reviewed</span>';
                    $statusSubmit   = '<span class="badge bg-soft-info">Submitted</span>';
                    $statusCheck    = '<span class="badge bg-soft-warning">Rejected</span>';
                    $submissionState= 4;
                }
            }

            if($val->status_account == 1){
                $statusAccount  = '<span class="badge bg-soft-success">Verified</span>';
            }elseif($val->status_account == 2){
                $statusAccount  = '<span class="badge bg-soft-warning">Suspended</span>';
            }

            $arr[$key] = [
                "no"            => $no++,
                "action"        => ($submissionState == 2 ? $btnCheck : '').$btnDetail.$btnPass.$btnEmail,
                "name"          => $val->name,
                "email"         => $val->email,
                "step"          => $step,
                "accountStatus" => $statusAccount,
                "submitStatus"  => $statusSubmit,
                "checkStatus"   => $statusCheck,
            ];
        }

        $response = array(
            "draw" => intval($draw),
            "recordsTotal" => $participants['totalRecords'],
            "recordsFiltered" => ($search != "" ? $participants['totalDisplayRecords'] : $participants['totalRecords']),
            "data" => $arr,
            'totalChecked' => $participants['summary']['totalChecked'],
            'totalSubmitted' => $participants['summary']['totalSubmitted'],
            'totalVerif' => $participants['summary']['totalVerif'],
            'totalUser' => $participants['summary']['totalUser'],
        );

        echo json_encode($response);
    }

    public function getDetailPayment(){

        $user_id = $this->input->post('user_id');
        
		if (!is_null($this->M_payment->getUserPaymenHistory($user_id))) {
        
            $data['payment_history']   = $this->M_payment->getUserPaymenHistory($user_id);

            $this->load->view('payments/ajax/detail_payment', $data);

		} else {
			echo "<center class='py-5'><h4>There is an error when trying get user payment's data!</h4></center>";
		}
    }

    function getAjaxPayment(){
        $payments           = $this->M_payment->getAllPayments();

        $draw               = $this->input->post('draw');
        $search             = $this->input->post('search')['value'];
        $arr                = [];
        $no                 = $this->input->post('start')+1;

        foreach ($payments['records'] as $key => $val) {
            $btnDetail      = '<button onclick="mdlPaymentDetail(\''.$val->user_id.'\')" class="btn btn-soft-info btn-icon btn-sm me-2" data-bs-toggle="tooltip" data-bs-html="true" title="See history of this user"><i class="bi-card-list"></i></button>';
            $btnCheck       = '<button onclick="mdlPaymentDetailVerif(\''.$val->user_id.'\', \''.$val->id.'\', \''.base_url().$val->evidance.'\')" class="btn btn-soft-success btn-icon btn-sm me-2" data-bs-toggle="tooltip" data-bs-html="true" title="Change status of this payment"><i class="bi-check"></i></button>';
            $status         = '<span class="badge bg-soft-secondary">New</span>';

            if ($val->status == 1) {
                $status = '<span class="badge bg-soft-secondary">pending</span>';
            } elseif ($val->status == 2) {
                $status = '<span class="badge bg-soft-success">success</span>';
            } elseif ($val->status == 3) {
                $status = '<span class="badge bg-soft-warning">canceled</span>';
            } elseif ($val->status == 4) {
                $status = '<span class="badge bg-soft-danger">rejected</span>';
            } elseif ($val->status == 5) {
                $status = '<span class="badge bg-soft-danger">expired</span>';
            } else {
                $status = '<span class="badge bg-blue-dark">Haven`t make any payment</span>';
            }

            $btn = "";
            if($val->status <= 1 || $val->status == 4  || $val->status == 3){
                $btn .= $btnCheck;
            }
            $btn .= $btnDetail;

            $arr[$key] = [
                "no"            => $no++,
                "action"        => $btn,
                "paymentState"  => $val->summit,
                "status"        => $status,
                "name"          => $val->name,
                "email"         => $val->email,
                "institution"   => $val->institution,
            ];
        }

        $response = array(
            "draw" => intval($draw),
            "recordsTotal" => $payments['totalRecords'],
            "recordsFiltered" => ($search != "" ? $payments['totalDisplayRecords'] : $payments['totalRecords']),
            "data" => $arr,
            'totalIncome' => $payments['summary']['totalIncome'],
            'manualIncome' => $payments['summary']['manualIncome'],
            'paypalIncome' => $payments['summary']['paypalIncome'],
            'xenditIncome' => $payments['summary']['xenditIncome'],

            'paymentSuccess' => $payments['summary']['paymentSuccess'],
            'paymentPending' => $payments['summary']['paymentPending'],
            'paymentFailed' => $payments['summary']['paymentFailed'],
            'paymentExpired' => $payments['summary']['paymentExpired']
        );

        echo json_encode($response);

    }
}
