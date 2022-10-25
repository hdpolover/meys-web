<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    // construct
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['M_user', 'M_auth']);
    }

    public function index()
    {

        $data['user'] = $this->M_auth->get_auth($this->session->userdata('email'));
        // style
        $data['navbar_style']   = "navbar-dark";
        $data['logo_style']     = 1;
        $data['btn_sign_up']    = "btn-light";
        $data['btn_sign_in']    = "btn-outline-light";

        $this->templateuser->view('user/overview', $data);
    }

    public function documents()
    {
        $data['user'] = $this->M_auth->get_auth($this->session->userdata('email'));

        // style
        $data['navbar_style']   = "navbar-dark";
        $data['logo_style']     = 1;
        $data['btn_sign_up']    = "btn-light";
        $data['btn_sign_in']    = "btn-outline-light";

        $this->templateuser->view('user/documents', $data);
    }

    public function announcements()
    {
        $data['user'] = $this->M_auth->get_auth($this->session->userdata('email'));

        // style
        $data['navbar_style']   = "navbar-dark";
        $data['logo_style']     = 1;
        $data['btn_sign_up']    = "btn-light";
        $data['btn_sign_in']    = "btn-outline-light";

        $this->templateuser->view('user/announcements', $data);
    }

    public function settings()
    {
        $data['user'] = $this->M_auth->get_auth($this->session->userdata('email'));

        // style
        $data['navbar_style']   = "navbar-dark";
        $data['logo_style']     = 1;
        $data['btn_sign_up']    = "btn-light";
        $data['btn_sign_in']    = "btn-outline-light";

        $this->templateuser->view('user/settings', $data);
    }

    public function changePassword()
    {
        $cur_password   = $this->input->post('currentPassword');
        $password       = $this->input->post('newPassword');
        $conf_password  = $this->input->post('confirmNewPassword');

        // mengambil data user dengan param email
        $user = $this->M_auth->get_auth($this->session->userdata('email'));

        if ($password == $conf_password) {
            //mengecek apakah password benar
            if (password_verify($cur_password, $user->password)) {
                if ($this->M_user->changePassword($password) == true) {

                    // atur dataemailperubahan password
                    $now = date("d F Y - H:i");
                    $email = htmlspecialchars($this->session->userdata("email"), true);

                    $subject = "Perubahan password";
                    $message = "Hai, password untuk akun YBB Foundation Scholarship <b>{$email}</b> telah dirubah pada {$now}. <br>Jika kamu tidak merasa melakukan perubahan password, harap hubungi ADMIN YBB Scholarship Program secepatnya!";

                    // mengirimemailperubahan password
                    sendMail(htmlspecialchars($this->session->userdata("email"), true), $subject, $message);

                    $this->session->set_flashdata('notif_success', 'Passwordmu berhasil dirubah');
                    redirect($this->agent->referrer());
                } else {
                    $this->session->set_flashdata('notif_warning', 'Terjadi kesalahan saat mencoba merubah passwordmu');
                    redirect($this->agent->referrer());
                }
            } else {
                $this->session->set_flashdata('notif_warning', 'Password salah, coba lagi');
                redirect($this->agent->referrer());
            }
        } else {
            $this->session->set_flashdata('notif_warning', 'Konfirmasi password tidak sesuai');
            redirect($this->agent->referrer());
        }
    }
}
