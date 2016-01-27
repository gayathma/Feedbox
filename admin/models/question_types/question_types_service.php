<?php

class Question_types_service extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function save_question_type($question_type_model){
        return $this->db->insert('fb_question_types', $question_type_model);
    }

    public function get_published_question_types($location_id)
    {
        $res = $this->db->get_where(
            'fb_question_types',
            array('is_published' => '1', 'is_deleted' => '0', 'location_id' => $location_id)
        );
        return $res->result();
    }

    function delete_question_type($question_type_id) {
        $data = array('is_deleted' => '1');
        $this->db->where('id', $question_type_id);
        return $this->db->update('fb_question_types', $data);
    }

    function get_question_type_by_id($question_type_id) {

        $query = $this->db->get_where('fb_question_types', array('id' => $question_type_id, 'is_deleted' => '0'));
        return $query->row();
    }

    function update_question_type($question_type_model) {

        $data = array('name' => $question_type_model->get_name(),
                      'name_ta' => $question_type_model->get_name_ta(),
                      'name_si' => $question_type_model->get_name_si(),
                      'updated_date' => $question_type_model->get_updated_date(),
        );

        $this->db->where('id', $question_type_model->get_id());
        return $this->db->update('fb_question_types', $data);
    }

}


?>
