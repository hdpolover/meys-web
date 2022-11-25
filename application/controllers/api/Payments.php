<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, OPTIONS');

defined('BASEPATH') or exit('No direct script access allowed');

class Payments extends CI_Controller
{
    // config
    protected $_midtrans_prod = false;
    protected $_server_key_production = '';
    protected $_server_key_sandbox = 'SB-Mid-server-qC8YfWnkcF_fjPrZmuNEwb8P';
    protected $_client_key_production = '';
    protected $_client_key_sandbox = 'SB-Mid-client-LAEwpi34CdNrwLgt';

    // construct
    public function __construct()
    {
        parent::__construct();

        $params = [
            'server_key' => $this->_server_key_sandbox,
            'production' => $this->_midtrans_prod
        ];

        $this->load->model(['M_master', 'M_payment', 'M_auth']);
        $this->load->library(['Uploader', 'Midtrans']);
        $this->midtrans->config($params);
    }

    public function pay()
    {
        // check session
        if (checkSession()['status'] == false) {
            $this->session->set_userdata('redirect', checkSession()['uri']);
            $this->session->set_flashdata('notif_warning', "Please login to continue");
            redirect('sign-in');
        }

        // init var
        $order_id =  rand();

        $user_id = $this->session->userdata('user_id');

        // init post
        $payment_batch_id = $this->input->post('payment_batch');
        $amount = $this->input->post('amount');
        $amount_usd = $this->input->post('amount_usd');

        // get user detail
        $user = $this->M_auth->get_userByID($user_id);

        // get payment item / batch
        $batch = $this->M_master->get_paymentsBatchByID($payment_batch_id);

        // bracket fullname
        $name = explode(' ', $user->name);
        $user->first_name = $name[0];
        $user->last_name = end($name);

        // init based post table
        $data_load = [
            'user_id' => $user_id,
            'order_id' => $order_id,
            'payment_batch' => $payment_batch_id,
            'amount' => $amount,
            'amount_usd' => $amount_usd,
            'status' => 1,
            'created_at' => time(),
            'created_by' => $user_id
        ];

        $save = $this->M_payment->savePaymentG($data_load);
        if ($save['status'] == true) {
            // Required
            $transaction_details = [
                'order_id' => $order_id,
                'gross_amount' => $amount, // no decimal allowed for creditcard
            ];

            // Optional

            $item_details = [
                'id' => $payment_batch_id,
                'price' => $amount,
                'quantity' => 1,
                'name' => $batch->summit
            ];

            $address = [
                'first_name'    => $user->first_name,
                'last_name'     => $user->last_name,
                'phone'         => $user->phone,
                'country_code'  => 'IDN'
            ];

            // Optional
            $customer_details = [
                'first_name'        => $user->first_name,
                'last_name'         => $user->last_name,
                'email'             => $user->email,
                'phone'             => $user->phone,
                'billing_address'   => $address,
                'shipping_address'  => $address
            ];

            // Data yang akan dikirim untuk request redirect_url.
            $credit_card['secure'] = true;
            //set save_card true to enable oneclick or 2click
            //$credit_card['save_card'] = true;

            $custom_expiry = [
                'start_time' => date("Y-m-d H:i:s O", time()),
                'unit' => 'day',
                'duration'  => 1
            ];

            $transaction_data = [
                'transaction_details'   => $transaction_details,
                'item_details'          => $item_details,
                'customer_details'      => $customer_details,
                'credit_card'           => $credit_card,
                'expiry'                => $custom_expiry
            ];

            error_log(json_encode($transaction_data));

            // init log
            $log = [
                'method_type' => 1,
                'log' => json_encode($transaction_data),
                'order_id' => $order_id,
                'created_at' => time(),
                'created_by' => $this->session->userdata('user_id')
            ];

            $this->M_payment->saveLogPayment($log);

            $snapToken = $this->midtrans->getSnapToken($transaction_data);

            // snap log
            $log = [
                'method_type' => 1,
                'log' => $snapToken,
                'order_id' => $order_id,
                'created_at' => time(),
                'created_by' => $this->session->userdata('user_id')
            ];

            $this->M_payment->saveLogPayment($log);

            echo $snapToken;
        } else {
            $this->session->set_flashdata('warning', 'There is something wrong, when trying to make payment data. Contact our TEAM and say you got code 422#3');
            redirect($this->agent->referrer());
        }
    }

    public function finish()
    {
        $result = json_decode($this->input->post('result_data'));
        $response = $this->midtranspayments->cvtPaymentMethodMidtrans($result);

        // update data payment
        $data = $response;

        $where = [
            'order_id' => $response['order_id'],
            'user_id' => $this->session->userdata('user_id'),
        ];

        $this->M_payment->updatePaymentG($data, $where);

        // snap log
        $log = [
            'method_type' => 1,
            'log' => "Success make payments, waiting payment from user if still pending",
            'order_id' => $response['order_id'],
            'created_at' => time(),
            'created_by' => $this->session->userdata('user_id')
        ];

        $this->M_payment->saveLogPayment($log);

        $this->session->set_flashdata('notif_success', 'Your payments has been saved ! Please pay acording your payment method !');
        redirect(site_url('user/payments-transaction/'.$response['order_id'].'?method=gateway'));
        // redirect to detail payments
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
            $upload = $this->Uploader->uploadImage($_FILES['image'], $path);

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
        return $this->M_payment->verificationPayment();
        // if ($this->M_payment->verificationPayment() == true) {
        //     $this->session->set_flashdata('notif_success', 'Succesfuly verification payment ');
        //     redirect(site_url('admin/payments'));
        // } else {
        //     $this->session->set_flashdata('notif_warning', 'There is a problem when trying to verification payment, try again later');
        //     redirect($this->agent->referrer());
        // }
    }

    public function rejectedPayment()
    {
        return $this->M_payment->rejectedPayment();
        // if ($this->M_payment->rejectedPayment() == true) {
        //     $this->session->set_flashdata('notif_success', 'Succesfuly rejected payment ');
        //     redirect(site_url('admin/payments'));
        // } else {
        //     $this->session->set_flashdata('notif_warning', 'There is a problem when trying to rejected payment, try again later');
        //     redirect($this->agent->referrer());
        // }
    }
}
