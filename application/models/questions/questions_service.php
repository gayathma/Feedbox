<?php

class Questions_service extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function get_questions_for_question_type($question_type_id)
    {
        $res = $this->db->get_where(
            'fb_questions',
            array('is_published' => '1', 'is_deleted' => '0','question_type_id' => $question_type_id)
        );
        return $res->result();
    }

    public function get_all_questions_for_questionnaire($questionnaire_id)
    {
        $res = $this->db->get_where(
            'fb_questions',
            array('is_published' => '1', 'is_deleted' => '0','questionnaire_id' => $questionnaire_id)
        );
        return $res->result();
    }

    public function get_questions_for_question_type_questionnaire($question_type_id,$questionnaire_id)
    {
        $this->db->select('fb_questions.*,fb_question_types.name as type');
        $this->db->from('fb_questions');
        $this->db->join('fb_question_types', 'fb_question_types.id = fb_questions.question_type_id');
        $this->db->where('fb_questions.is_deleted', '0');
        $this->db->where('fb_questions.is_published', '1');
        $this->db->where('fb_questions.questionnaire_id', $questionnaire_id);
        $this->db->where('fb_questions.question_type_id', $question_type_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_question_categories_for_questionnaire($questionnaire_id)
    {
        $this->db->distinct('question_type_id');
        $this->db->select('question_type_id');
        $this->db->from('fb_questions');
        $this->db->where('is_deleted', '0');
        $this->db->where('is_published', '1');
        $this->db->where('questionnaire_id', $questionnaire_id);
        $this->db->where('question_type_id IS NOT NULL');

        $query = $this->db->get();
        return $query->result();

    }

    public function get_non_cate_questions_for_questionnaire($questionnaire_id)
    {
        $this->db->select('*');
        $this->db->from('fb_questions');
        $this->db->where('is_deleted', '0');
        $this->db->where('is_published', '1');
        $this->db->where('questionnaire_id', $questionnaire_id);
        $this->db->where('question_type_id IS NULL');

        $query = $this->db->get();
        return $query->result_array();

    }

}


?>
