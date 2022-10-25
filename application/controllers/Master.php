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

    public function faq()
    {
        $this->templateback->view('admin/master/faq');
    }

    public function paymentBatch()
    {
        $this->templateback->view('admin/master/payment_batch');
    }

    public function entrantForm()
    {
        $this->templateback->view('admin/master/entrant_form');
    }
}
