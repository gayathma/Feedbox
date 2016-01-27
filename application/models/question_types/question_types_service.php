<?php

class Question_types_service extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function get_published_question_types()
    {
        $res = $this->db->get_where(
            'fb_question_types',
            array('is_published' => '1', 'is_deleted' => '0')
        );
        return $res->result();
    }
    
    function get_question_type_by_id($question_type_id) {

        $query = $this->db->get_where('fb_question_types', array('id' => $question_type_id, 'is_deleted' => '0'));
        return $query->row();
    }

}


?>
