<?php
class TemplateUser
{
    protected $_ci;

    public function __construct()
    {
        $this->_ci = &get_instance();
        $this->_ci->load->database();
    }

    public function getSettingsValue($key)
    {
        $query = $this->_ci->db->get_where('tb_settings', ['key' => $key]);
        return $query->row()->value;
    }

    public function countAnnouncements()
    {
        $query = $this->_ci->db->get_where('tb_announcements', ['is_member' => 1 , 'is_deleted' => 0]);
        return $query->num_rows();
    }

    public function countDocuments()
    {
        $query = $this->_ci->db->get_where('m_documents', ['is_deleted' => 0]);
        return $query->num_rows();
    }

    function getUserParticipans($user_id){
        $this->_ci->db->select('a.*, b.*, c.*, d.fullname')
        ->from('tb_participants a')
        ->join('tb_user b', 'a.user_id = b.user_id')
        ->join('tb_auth c', 'a.user_id = c.user_id')
        ->join('tb_ambassador d', 'a.referral_code = d.referral_code', 'left')
        ->where(['a.is_deleted' => 0, 'c.status' => 1, 'a.user_id' => $user_id])
        ;

        $models = $this->_ci->db->get()->row();

        return $models;
    }

    public function view($content, $data = null)
    {
        $data['web_title'] = $this->getSettingsValue('web_title');
        $data['web_desc'] = $this->getSettingsValue('web_desc');
        $data['web_icon'] = $this->getSettingsValue('web_icon');
        $data['web_logo'] = $this->getSettingsValue('web_logo');
        $data['web_logo_white'] = $this->getSettingsValue('web_logo_white');
        $data['web_alamat'] = $this->getSettingsValue('web_alamat');
        $data['web_telepon'] = $this->getSettingsValue('web_telepon');
        $data['web_email'] = $this->getSettingsValue('web_email');
        $data['web_guidelines'] = $this->getSettingsValue('web_guidelines');
        $data['submission_deadline'] = $this->getSettingsValue('submission_deadline');
        $data['user_profil']   = $this->getUserParticipans($this->_ci->session->userdata('user_id'));

        $data['countAnnouncements'] = $this->countAnnouncements();
        $data['countDocuments'] = $this->countDocuments();

        $data['sosmed_ig'] = $this->getSettingsValue('sosmed_ig');
        $data['sosmed_twitter'] = $this->getSettingsValue('sosmed_twitter');
        $data['sosmed_facebook'] = $this->getSettingsValue('sosmed_facebook');
        $data['sosmed_yt'] = $this->getSettingsValue('sosmed_yt');

        $this->_ci->load->view('template/user/header', $data);
        $this->_ci->load->view('template/alert', $data);
        $this->_ci->load->view('template/user/navbar', $data);
        $this->_ci->load->view('template/user/sidebar', $data);
        $this->_ci->load->view($content, $data);
        $this->_ci->load->view('template/user/footer', $data);
    }
}
