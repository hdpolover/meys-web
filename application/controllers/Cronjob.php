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
        $arr = "";
        if (!empty($users)) {
            foreach ($users as $key => $val) {
                if (strtotime("+6 minutes", $val->log_time) < time()) {
                    $this->M_auth->makeOffline($val->user_id);
                    $arr .= "- {$val->user_id} - {$val->email}: {$val->device} \n";
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
                    "description" => $arr != "" ? "``` {$arr} ```" : 'No online users',

                    // Timestamp, only ISO8601
                    "timestamp" => $timestamp,

                    // Left border color, in HEX
                    "color" => hexdec("3366ff"),
                ]
            ]

        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        discordmsg($msg, $webhook);
        ej($arr);
    }

    public function backupDb()
    {
        #RUN EVERY HOURS

        // load database utility CI
        $this->load->dbutil();

        // set var name
        $date = date('ymd_H-i-s');

        // set prefix backup name
        $backup_name = "backup-db-{$date}.sql";

        // config backup
        $conf = [
            'format' => 'txt',
            'filename' => $backup_name,
            'add_insert' => true,
            'foreign_key_checks' => false
        ];

        // prepare backup
        $backup = $this->dbutil->backup($conf);

        // set location
        $path = "./berkas/backup_db/";

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        // remove backup more than a days
        $files = glob("{$path}*");
        $now   = time();

        $list_file = "";
        foreach ($files as $file) {
            if (is_file($file)) {
                $list_file .= "$file \n";
                if ($now - filemtime($file) >= 60 * 60 * 24) { // 1 days delete
                    unlink($file);
                }
            }
        }

        // params discord
        $webhook = "https://discord.com/api/webhooks/1040091929729302569/D6kb3xoe96IG88xWtfPWJtLZz9AsF_ewTBBFvgVB3kT_TkqFpZVROFs37FUyAEnkwxN9";
        $timestamp = date("c", strtotime("now"));

        // create backup file
        file_put_contents("{$path}{$backup_name}", $backup);

        $msg = json_encode([
            "username" => "MEYS 2022 - Backup DB",

            "tts" => false,

            "embeds" => [
                [
                    // Title
                    "title" => "Cronjob backup DB",

                    // Embed Type, do not change.
                    "type" => "rich",

                    // Description
                    "description" => "``` Backup DB on {$date} \n\n LIST CURRENT FILE: \n{$list_file}```",

                    // Timestamp, only ISO8601
                    "timestamp" => $timestamp,

                    // Left border color, in HEX
                    "color" => hexdec("3366ff"),
                ]
            ]

        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);


        discordmsg($msg, $webhook);

        ej($backup);
    }

    public function sendAnnouncementsUsers()
    {
        $users = $this->M_auth->getUsersAnnouncements();
        $arr = [];
        if (!empty($users)) {
            foreach ($users as $key => $val) {
                if (strtotime("+6 minutes", $val->log_time) < time()) {
                    $this->M_auth->makeOffline($val->user_id);
                    $arr[$key] = $val;
                }
            }
        }

        ej($arr);
    }
}
