<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Payments extends CI_Controller
{
    // construct
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['M_master', 'M_payment']);
        $this->load->library('uploader');
    }

    public function savePaymentSettings()
    {
        if ($this->M_payment->savePaymentSettings() == true) {
            $this->session->set_flashdata('notif_success', 'Successfully changes payments settings');
            redirect(site_url('admin/payment-settings'));
        } else {
            $this->session->set_flashdata('notif_warning', 'There is something wrong, when trying to changes payments settings');
            redirect($this->agent->referrer());
        }
    }
}
