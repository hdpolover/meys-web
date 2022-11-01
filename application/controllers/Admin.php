<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    // construct
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['M_admin']);

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

    public function index()
    {
        $this->templateback->view('admin/dashboard');
    }

    public function statistics()
    {
        $this->templateback->view('admin/statistics');
    }

    public function payments()
    {
        $this->templateback->view('admin/payments');
    }

    public function participans()
    {
        $data['participans'] = $this->M_admin->getParticipans();
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
    
    public function getAjaxParticipant(){
        $draw   = $this->input->post('draw');
        $search = $this->input->post('search')['value'];
        
        $participants = $this->M_admin->getParticipansAll();
        $arr = [];
        $no = 1;
        foreach ($participants['records'] as $key => $val) {
            $arr[] = [
                "no"       => $no++,
                "name"     => $val->name,
                "email"    => $val->email,
                "action"   => '
                    <a target="_blank" href="'.site_url('admin/participant/'.$val->user_id).'" class="btn btn-soft-info btn-icon btn-sm"><i class="bi-eye"></i></a>
                    <button onclick="showMdlChangePassword(\''.$val->user_id.'\')" class="btn btn-soft-primary btn-icon btn-sm"><i class="bi-key"></i></button>
                    '
            ];
        }

        $response = array(
            "draw" => intval($draw),
            "recordsTotal" => $participants['totalRecords'],
            "recordsFiltered" => ($search != "" ? $participants['totalDisplayRecords'] : $participants['totalRecords']),
            "data" => $arr,
        );

        echo json_encode($response);
    }
}
