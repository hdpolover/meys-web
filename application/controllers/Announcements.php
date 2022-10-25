<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Announcements extends CI_Controller
{
    // construct
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['M_announcements']);
    }

    public function manageList()
    {
        $this->templateback->view('admin/announcements');
    }
}
