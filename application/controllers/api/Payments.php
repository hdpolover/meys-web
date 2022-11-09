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

    public function manualPayment()
    {
        if (isset($_FILES['image'])) {
            $path = "berkas/user/{$this->session->userdata('user_id')}/payments/{$this->input->post('payment_batch')}/";
            $upload = $this->uploader->uploadImage($_FILES['image'], $path);
            
            if ($upload['status'] == true) {
                if ($this->M_payment->manualPayment($upload['filename']) == true) {

                    $subject = "Payment send - Middle East Youth Summit";
                    $message = "Hi, your manual transfer payment for Middle East Yout Summit has been send to our system. Please wait for further notice until our Team verifed your payment proof";

                    // mengirimemail
                    sendMail(htmlspecialchars($this->session->userdata("email"), true), $subject, $message);

                    $this->session->set_flashdata('notif_success', 'Succesfuly send your payment ');
                    redirect(site_url('user/payment'));
                } else {
                    $this->session->set_flashdata('notif_warning', 'There is a problem when trying to send your payment, try again later');
                    redirect($this->agent->referrer());
                }
            } else {
                $this->session->set_flashdata('notif_warning', $upload['message']);
                redirect($this->agent->referrer());
            }
        } else {
            $this->session->set_flashdata('notif_warning', 'Please provide evidance that you already send payment !');
            redirect($this->agent->referrer());
        }
    }

    public function manualPaymentCancel()
    {
        if ($this->M_payment->manualPaymentCancel() == true) {

            $subject = "Payment cancel - Middle East Youth Summit";
            $message = "Hi, you has been canceled your payment for Middle East Youth Summit. Please make payment as requested if you still not yet make payment";

            // mengirimemail
            sendMail(htmlspecialchars($this->session->userdata("email"), true), $subject, $message);

            $this->session->set_flashdata('notif_success', 'Succesfuly cancel your current payment ');
            redirect(site_url('user/payment'));
        } else {
            $this->session->set_flashdata('notif_warning', 'There is a problem when trying to cancel your current payment, try again later');
            redirect($this->agent->referrer());
        }
    }

    public function verificationPayment()
    {
        if ($this->M_payment->verificationPayment() == true) {
            $this->session->set_flashdata('notif_success', 'Succesfuly verification payment ');
            redirect(site_url('admin/payments'));
        } else {
            $this->session->set_flashdata('notif_warning', 'There is a problem when trying to verification payment, try again later');
            redirect($this->agent->referrer());
        }
    }

    public function rejectedPayment()
    {
        if ($this->M_payment->rejectedPayment() == true) {
            $this->session->set_flashdata('notif_success', 'Succesfuly rejected payment ');
            redirect(site_url('admin/payments'));
        } else {
            $this->session->set_flashdata('notif_warning', 'There is a problem when trying to rejected payment, try again later');
            redirect($this->agent->referrer());
        }
    }
}
