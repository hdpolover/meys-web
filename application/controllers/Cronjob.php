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

        $webhook = "https://discord.com/api/webhooks/1040091929729302569/D6kb3xoe96IG88xWtfPWJtLZz9AsF_ewTBBFvgVB3kT_TkqFpZVROFs37FUyAEnkwxN9"; 
        $timestamp = date("c", strtotime("now"));
        $msg = json_encode([
            "username" => "MEYS 2022",
            
            "tts" => false,
        
            "embeds" => [
                [
                    // Title
                    "title" => "Cronjob updated online users",
        
                    // Embed Type, do not change.
                    "type" => "rich",
        
                    // Description
                    "description" => !empty($arr) ? json_encode($arr) : 'No online users',
        
                    // Timestamp, only ISO8601
                    "timestamp" => $timestamp,
        
                    // Left border color, in HEX
                    "color" => hexdec( "3366ff" ),
                ]
            ]
        
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );
    
        discordmsg($msg, $webhook);
        ej($arr);
    }

    public function sendAnnouncementsUsers()
    {
        $users = $this->M_auth->getUsersAnnouncements();
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
