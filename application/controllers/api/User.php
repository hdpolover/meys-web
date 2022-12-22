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

    public function getNationality(){
        $word = $this->input->get('search');
        $result = $this->M_master->getNationalitySearch($word);
        
        if(!empty($result)){
            echo $result;
        }else{
            echo "Not found";
        }
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

    public function ajxCheckRC(){
        $ambassador = $this->M_master->getAmbasadorByReferral($this->input->post('referral'));
        if(!empty($ambassador)){
            echo json_encode([
                'status' => true,
                'data' => $ambassador
            ]);
        }else{
            echo json_encode([
                'status' => false,
                'error' => 'error'
            ]);
        }
    }

    public function ajxPostSelf(){
        $path   = "./berkas/user/participans/";
        $photo  = null;
        if($this->input->post('image') !== ""){
            $upload = base64ToImage($path, $this->input->post('image'));
            $photo  = explode("./", $upload['url'])[1];
        }
        if($this->M_user->formStepSelf($photo) == true){
            echo json_encode([
                'status' => true,
                'message' => 'success saved step Self Photo'
            ]);
        }else{
            echo json_encode([
                'status' => false,
                'error' => 'error saved step Self Photo'
            ]);
        }
    }

    public function ajxPostSubmission(){
        if($this->M_user->ajxPostSubmission() == true){

            $subject = "Submission submitted - Middle East Youth Summit";
            $message = "Hi, your submission has been submitted to our system. You will receive further notice regarding your submission, or contact us if you had any question";

            // mengirimemail
            sendMail(htmlspecialchars($this->session->userdata("email"), true), $subject, $message);

            echo json_encode([
                'status' => true,
                'message' => 'success saved submission'
            ]);
        }else{
            echo json_encode([
                'status' => false,
                'error' => 'error saved step submission'
            ]);
        }
    }

    public function uploadDocuments(){
        if (isset($_FILES['proposal']['name']) && $_FILES['proposal']['name'] !== "") {
            $path = "berkas/user/{$this->session->userdata('user_id')}/documents/";
            $upload = $this->uploader->uploadFileMulti($_FILES['proposal'], 'proposal', $path);

            if ($upload['status'] == true) {
                if ($this->M_user->upload_dokumen('proposal', $upload['filename']) == true) {
                    $this->session->set_flashdata('notif_success', 'Succesfuly upload your document ');
                    redirect(site_url('user/submission'));
                } else {
                    $this->session->set_flashdata('notif_warning', 'There is a problem when trying to send your payment, try again later');
                    redirect($this->agent->referrer());
                }
            } else {
                $this->session->set_flashdata('notif_warning', $upload['message']['error']);
                redirect($this->agent->referrer());
            }
        }

        if (isset($_FILES['travel']['name']) && $_FILES['travel']['name'] !== "") {
            $path = "berkas/user/{$this->session->userdata('user_id')}/documents/";
            $upload = $this->uploader->uploadFileMulti($_FILES['travel'], 'travel', $path);

            if ($upload['status'] == true) {
                if ($this->M_user->upload_dokumen('travel', $upload['filename']) == true) {
                    $this->session->set_flashdata('notif_success', 'Succesfuly upload your document ');
                    redirect(site_url('user/submission'));
                } else {
                    $this->session->set_flashdata('notif_warning', 'There is a problem when trying to send your payment, try again later');
                    redirect($this->agent->referrer());
                }
            } else {
                $this->session->set_flashdata('notif_warning', $upload['message']);
                redirect($this->agent->referrer());
            }
        }


    }
}
