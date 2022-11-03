<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    // construct
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['M_master', 'M_admin', 'M_auth']);
        $this->load->library('uploader');
    }

    function checkedParticipant()
    {
        if ($this->M_admin->checkedParticipant() == true) {
            $this->session->set_flashdata('notif_success', 'Succesfuly checked/accepted participant submission ');
            redirect(site_url('admin/participans'));
        } else {
            $this->session->set_flashdata('notif_warning', 'There is a problem when trying to checked/accepted participant submission, try again later');
            redirect($this->agent->referrer());
        }
    }

    function rejectedParticipant()
    {
        if ($this->M_admin->rejectedParticipant() == true) {
            $this->session->set_flashdata('notif_success', 'Succesfuly rejected participant submission ');
            redirect(site_url('admin/participans'));
        } else {
            $this->session->set_flashdata('notif_warning', 'There is a problem when trying to rejected participant submission, try again later');
            redirect($this->agent->referrer());
        }
    }

}
