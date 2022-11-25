<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function changePassword($password)
    {
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->update('tb_auth', ['password' => password_hash($password, PASSWORD_DEFAULT)]);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    function getAllCountries(){
        return $this->db->get_where('m_countries')->result();
    }

    function getUserParticipans($user_id){
        $this->db->select('a.*, b.*, c.email, d.fullname')
        ->from('tb_participants a')
        ->join('tb_user b', 'a.user_id = b.user_id')
        ->join('tb_auth c', 'a.user_id = c.user_id')
        ->join('tb_ambassador d', 'a.referral_code = d.referral_code', 'left')
        ->where(['a.is_deleted' => 0, 'c.status' => 1, 'a.user_id' => $user_id])
        ;

        $models = $this->db->get()->row();
        $user   = $this->get_userByID($user_id);
        if(!is_null($models)){
            if($models->referral_code == 0 && $user != false){
                $models->referral_code = $user->referral_code;
                if(($this->getAmbasadorByReferral($models->referral_code))){
                    $models->fullname = $this->getAmbasadorByReferral($models->referral_code)->fullname;
                }else{
                    $models->fullname = "unknow";
                }
            }
        }
        
        return $models;
    }

    public function get_userByID($user_id)
    {
        $this->db->select('*');
        $this->db->from('tb_auth a');
        $this->db->join('tb_user b', 'a.user_id = b.user_id', 'left');
        $this->db->where('a.user_id', $user_id);
        $query = $this->db->get();

        // jika hasil dari query diatas memiliki lebih dari 0 record
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    function getAmbasadorByReferral($referral_code = null){
        return $this->db->get_where('tb_ambassador', ['referral_code' => $referral_code, 'status' => 1, 'is_deleted' => 0])->row();
    }

    function getUserParticipansEssay($user_id, $participans_id){
        $this->db->select('a.*, b.*, c.*')
        ->from('tb_participants_essay a')
        ->join('tb_user b', 'a.user_id = b.user_id')
        ->join('tb_auth c', 'a.user_id = c.user_id')
        ->where(['a.is_deleted' => 0, 'a.participans_id' => $participans_id, 'a.user_id' => $user_id])
        ;

        $models = $this->db->get()->result();

        $arr = [];
        foreach($models as $key => $val){
            $arr[$val->m_essay_id] = $val;
        }

        return $arr;
    }

    function formStepBasic(){
        
        if($this->input->post('is_custom_nationality') == -1){
            $nationality_custom = $this->input->post('nationality_custom');
            $nationality = -1;
        }else{
            $nationality_custom = null;
            $nationality = $this->input->post('nationality');
        } 
        
        $formData = [
            'user_id'               => $this->session->userdata('user_id'),
            'birthdate'             => strtotime($this->input->post('birthdate')),
            'nationality'           => $nationality,
            'nationality_custom'    => $nationality_custom,
            'occupation'            => $this->input->post('occupation'),
            'field_of_study'        => $this->input->post('fieldofstudy'),
            'institution_workplace' => $this->input->post('institution'),
            'whatsapp_number'       => $this->input->post('whatsAppNumber'),
            'instagram'             => $this->input->post('instagram'),
            'emergency_contact'     => $this->input->post('emergency'),
            'contact_relation'      => $this->input->post('contactRelation'),
            'disease_history'       => $this->input->post('disease'),
            'tshirt_size'           => $this->input->post('tshirt'),
            'address'               => $this->input->post('address'),
            'postal_code'           => $this->input->post('postal_code'),
            'city'                  => $this->input->post('city'),
            'province'              => $this->input->post('province'),
            'created_by'            => $this->session->userdata('user_id'),
            'created_at'            => time(),
        ];

        $participans = $this->getUserParticipans($this->session->userdata('user_id'));
        
        $userData = [
            'name'                  => $this->input->post('fullname'),
            'gender'                => $this->input->post('gender')
        ];

        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->update('tb_user', $userData);

        if(empty($participans)){
            $this->db->insert('tb_participants', $formData);
        }else{
            $this->db->where('id', $participans->id);
            $this->db->update('tb_participants', $formData);
        }

        return ($this->db->affected_rows() != 1) ? false : true;
    }

    function formStepOthers(){

        $participans = $this->getUserParticipans($this->session->userdata('user_id'));

        $formData = [
            'user_id'               => $this->session->userdata('user_id'),
            'step'                  => $participans->step <= 2 ? 2 : $participans->step,
            'achievements'          => $this->input->post('achievements'),
            'experience'            => $this->input->post('experience'),
            'social_projects'       => $this->input->post('socialProjects'),
            'talents'               => $this->input->post('talents'),
            'modified_by'           => $this->session->userdata('user_id'),
            'modified_at'           => time(),
        ];

        if(empty($participans)){
            $this->db->insert('tb_participants', $formData);
        }else{
            $this->db->where('id', $participans->id);
            $this->db->update('tb_participants', $formData);
        }

        return ($this->db->affected_rows() != 1) ? false : true;
    }

    function formStepEssays($m_essay = []){

        $participans    = $this->getUserParticipans($this->session->userdata('user_id'));
        $essay          = $this->getUserParticipansEssay($this->session->userdata('user_id'), $participans->id);

        $this->db->where('id', $participans->id);
        $this->db->update('tb_participants', ['step' => $participans->step <= 3 ? 3 : $participans->step]);

        if(empty($participans)){
            if(empty($essay)){
                if(!empty($m_essay)){
                    foreach($m_essay as $key => $val){
                        $formData = [
                            'participans_id' => $participans->id,
                            'user_id' => $this->session->userdata('user_id'),
                            'm_essay_id' => $val->id,
                            'm_question' => $val->question,
                            'answer' => $this->input->post('essay')[$val->id][0],
                        ];
                        $this->db->insert('tb_participants_essay', $formData);
                    }
                }
            }else{
                if(!empty($m_essay)){
                    foreach($essay as $k => $v){
                        foreach($m_essay as $key => $val){
                            if($this->input->post('essay')[$v->m_essay_id]){
                                $formData = [
                                    'participans_id' => $participans->id,
                                    'user_id' => $this->session->userdata('user_id'),
                                    'm_essay_id' => $v->m_essay_id,
                                    'm_question' => $val->question,
                                    'answer' => $this->input->post('essay')[$v->m_essay_id][0],
                                ];
                                $this->db->where('id', $v->id);
                                $this->db->update('tb_participants_essay', $formData);
                            }else{
                                $formData = [
                                    'participans_id' => $participans->id,
                                    'user_id' => $this->session->userdata('user_id'),
                                    'm_essay_id' => $val->id,
                                    'm_question' => $val->question,
                                    'answer' => $this->input->post('essay')[$val->id][0],
                                ];
                                $this->db->insert('tb_participants_essay', $formData);
                            }
                        }
                    }
                }
            }
        }else{
            if(empty($essay)){
                if(!empty($m_essay)){
                    foreach($m_essay as $key => $val){
                        $formData = [
                            'participans_id' => $participans->id,
                            'user_id' => $this->session->userdata('user_id'),
                            'm_essay_id' => $val->id,
                            'm_question' => $val->question,
                            'answer' => $this->input->post('essay')[$val->id][0],
                        ];
                        $this->db->insert('tb_participants_essay', $formData);
                    }
                }
            }else{
                if(!empty($m_essay)){
                    foreach($essay as $k => $v){
                        foreach($m_essay as $key => $val){
                            if(isset($this->input->post('essay')[$v->m_essay_id])){
                                $formData = [
                                    'participans_id' => $participans->id,
                                    'user_id' => $this->session->userdata('user_id'),
                                    'm_essay_id' => $v->m_essay_id,
                                    'm_question' => $val->question,
                                    'answer' => $this->input->post('essay')[$v->m_essay_id][0],
                                ];
                                $this->db->where('id', $v->id);
                                $this->db->update('tb_participants_essay', $formData);
                            }else{
                                $formData = [
                                    'participans_id' => $participans->id,
                                    'user_id' => $this->session->userdata('user_id'),
                                    'm_essay_id' => $val->id,
                                    'm_question' => $val->question,
                                    'answer' => $this->input->post('essay')[$val->id][0],
                                ];
                                $this->db->insert('tb_participants_essay', $formData);
                            }
                        }
                    }
                }
            }
        }

        return ($this->db->affected_rows() != 1) ? false : true;
    }

    function formStepProgram(){
        $participans = $this->getUserParticipans($this->session->userdata('user_id'));

        $formData = [
            'step'                  => $participans->step <= 4 ? 4 : $participans->step,
            'source'                => $this->input->post('source'),
            'source_account'        => $this->input->post('sourceAccount'),
            'twibbon_link'          => $this->input->post('twibbon_link'),
            'share_proof_link'      => $this->input->post('shareRequirement'),
            'referral_code'         => $this->input->post('referral'),
            'modified_by'           => $this->session->userdata('user_id'),
            'modified_at'           => time(),
        ];

        if(empty($participans)){
            $this->db->insert('tb_participants', $formData);
        }else{
            $this->db->where('id', $participans->id);
            $this->db->update('tb_participants', $formData);
        }

        return ($this->db->affected_rows() != 1) ? false : true;
    }

    function formStepSelf($photo = null){
        $participans = $this->getUserParticipans($this->session->userdata('user_id'));

        if(!is_null($photo)){
            $formData = [
                'step'                  => $participans->step <= 5 ? 5 : $participans->step,
                'self_photo'            => $photo,
                'modified_by'           => $this->session->userdata('user_id'),
                'modified_at'           => time(),
            ];
    
            if(empty($participans)){
                $this->db->insert('tb_participants', $formData);
            }else{
                $this->db->where('id', $participans->id);
                $this->db->update('tb_participants', $formData);
            }
    
            return ($this->db->affected_rows() != 1) ? false : true;
        }else{
            return true;
        }
    }

    function ajxPostSubmission(){
        $participans = $this->getUserParticipans($this->session->userdata('user_id'));

        $formData = [
            'step'                  => $participans->step <= 6 ? 6 : $participans->step,
            'terms_condition'       => 1,
            'status'                => 2,
            'modified_by'           => $this->session->userdata('user_id'),
            'modified_at'           => time(),
        ];

        if(empty($participans)){
            $this->db->insert('tb_participants', $formData);
        }else{
            $this->db->where('id', $participans->id);
            $this->db->update('tb_participants', $formData);
        }

        return ($this->db->affected_rows() != 1) ? false : true;
    }
}
