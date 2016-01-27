<?php

class Questions_service extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function save_question($question_model){
        return $this->db->insert('fb_questions', $question_model);
    }
    
    function update_question($questions_model) {
        $data = array(
            'question_name' => $questions_model->get_question_name(),
            'question_name_ta' => $questions_model->get_question_name_ta(),
            'question_name_si' => $questions_model->get_question_name_si(),
            'question_type_id' => $questions_model->get_question_type_id(),
            'answer_type' => $questions_model->get_answer_type(),
            'updated_date' => $questions_model->get_updated_date()
            );
        $this->db->where('id', $questions_model->get_id());
        return $this->db->update('fb_questions', $data);
    }

    public function get_questions_for_question_type($question_type_id)
    {
        $res = $this->db->get_where(
            'fb_questions',
            array('is_published' => '1', 'is_deleted' => '0','question_type_id' => $question_type_id)
        );
        return $res->result();
    }

    public function get_all_questions($questionnaire_id) {

        $this->db->select('fb_questions.*,fb_question_types.name as type');
        $this->db->from('fb_questions');
        $this->db->join('fb_question_types', 'fb_question_types.id = fb_questions.question_type_id','left');
        $this->db->where('fb_questions.is_deleted', '0');
        $this->db->where('fb_questions.questionnaire_id', $questionnaire_id);
        $this->db->order_by("fb_questions.id", "asc");
        $query = $this->db->get();
        return $query->result();
    }

    public function get_question_by_id($id)
    {
        $this->db->select('fb_questions.*,fb_question_types.name as type');
        $this->db->from('fb_questions');
        $this->db->join('fb_question_types', 'fb_question_types.id = fb_questions.question_type_id','left');
        $this->db->where('fb_questions.is_deleted', '0');
        $this->db->where('fb_questions.id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    function delete_question($question_id) {
        $data = array('is_deleted' => '1');
        $this->db->where('id', $question_id);
        return $this->db->update('fb_questions', $data);
    }

}


?>
