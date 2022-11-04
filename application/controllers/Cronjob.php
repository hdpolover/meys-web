<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cronjob extends CI_Controller
{

    // construct
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_auth');
    }

    public function updateOnlineStatus()
    {
        $users = $this->M_auth->getUsersOnline();
        $arr = [];
        if(!empty($users)){
            foreach ($users as $key => $val) {
                if(strtotime("+6 minutes", $val->log_time) < time()){
                    $this->M_auth->makeOffline($val->user_id);
                    $arr[$key] = $val;
                }
            }
        }

        ej($arr);
    }
}
