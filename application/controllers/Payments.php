<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Payments extends CI_Controller
{
    // construct
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['M_payment']);
    }

    public function getDetailPaymentSetting(){

        $id = $this->input->post('id');

		if ($this->M_payment->getDetailPaymentSetting($id) != false) {
            $data['item'] = $this->M_payment->getDetailPaymentSetting($id);
            
            $this->load->view('payments/ajax/edit_payment', $data);

		} else {
			echo "<center class='py-5'><h4>There is an error when trying get payment setting data!</h4></center>";
		}
    }

    public function index()
    {
        $this->templateback->view('payments/list');
    }

    public function settings()
    {
        $data['payments'] = $this->M_payment->getPaymentSettings();
        $this->templateback->view('payments/settings', $data);
    }
}
