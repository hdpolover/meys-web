<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{
    // construct
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['M_master']);
    }

    function testMailer(){
        sendMailTest($this->input->post('email'), 'Test email mailer', 'This is a Test Email on '.date('d M Y - H:i:s'))['status'];
        $this->session->set_flashdata('notif_success', 'Succesfuly tested mailer for the current setting');
        $debug = sendMailTest($this->input->post('email'), 'Test email mailer', 'This is a Test Email on '.date('d M Y - H:i:s'))['debug'] == 'html' ? 'Test mail succesfuly sended' : sendMailTest($this->input->post('email'), 'Test email mailer', 'This is a Test Email on '.date('d M Y - H:i:s'))['debug'];
        $this->session->set_userdata(['mailer_debug' => $debug]);
        redirect($this->agent->referrer());
    }
}
