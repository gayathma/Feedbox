<?php

class Questionnaire_service extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function save_questionnaire($questionnaire_model){
        $this->db->insert('fb_questionnaire', $questionnaire_model);
        return $this->db->insert_id();
    }

    public function get_questionnaires($location_id)
    {
        $res = $this->db->get_where(
            'fb_questionnaire',
            array('is_deleted' => '0', 'location' => $location_id)
        );
        return $res->result();
    }

    public function get_questionnaires_only($location_id)
    {
        $res = $this->db->get_where(
            'fb_questionnaire',
            array('is_deleted' => '0', 'location' => $location_id,'type' => '1')
        );
        return $res->result();
    }


    public function get_questionnaire_by_id($id)
    {
        $res = $this->db->get_where(
            'fb_questionnaire',
            array('is_deleted' => '0', 'id' => $id)
        );
        return $res->row();
    }

    function update_questionnaire($data, $id) {

        $this->db->where('id', $id);
        return $this->db->update('fb_questionnaire', $data);
    }


}


?>
