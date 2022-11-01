<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    // construct
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['M_user', 'M_master']);
        $this->load->library('uploader');
    }
    public function ajxPostBasic(){

        if($this->M_user->formStepBasic() == true){
            echo json_encode([
                'status' => true,
                'message' => 'success saved step basic'
            ]);
        }else{
            echo json_encode([
                'status' => false,
                'error' => 'error saved step basic'
            ]);
        }
    }
    public function ajxPostOther(){

        if($this->M_user->formStepOthers() == true){
            echo json_encode([
                'status' => true,
                'message' => 'success saved step others'
            ]);
        }else{
            echo json_encode([
                'status' => false,
                'error' => 'error saved step others'
            ]);
        }
    }
    public function ajxPostEssay(){
        $m_essay        = $this->M_master->getParticipansEssay();
        if($this->M_user->formStepEssays($m_essay) == true){
            echo json_encode([
                'status' => true,
                'message' => 'success saved step others'
            ]);
        }else{
            echo json_encode([
                'status' => false,
                'error' => 'error saved step others'
            ]);
        }
    }
    public function ajxPostProgram(){
        if($this->M_user->formStepProgram() == true){
            echo json_encode([
                'status' => true,
                'message' => 'success saved step others'
            ]);
        }else{
            echo json_encode([
                'status' => false,
                'error' => 'error saved step others'
            ]);
        }
    }
}
