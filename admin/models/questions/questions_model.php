<?php

class Questions_model extends CI_Model
{

    var $id;
    var $question_name;
    var $question_name_ta;
    var $question_name_si;
    var $questionnaire_id;
    var $question_type_id;
    var $answer_type;
    var $is_published;
    var $is_deleted;
    var $added_date;
    var $updated_date;

    function __construct()
    {
        parent::__construct();
    }

    public function set_question_name_si($question_name_si)
    {
        $this->question_name_si = $question_name_si;
    }

    public function get_question_name_si()
    {
        return $this->question_name_si;
    }

    public function set_question_name_ta($question_name_ta)
    {
        $this->question_name_ta = $question_name_ta;
    }

    public function get_question_name_ta()
    {
        return $this->question_name_ta;
    }

    public function set_questionnaire_id($questionnaire_id)
    {
        $this->questionnaire_id = $questionnaire_id;
    }

    public function get_questionnaire_id()
    {
        return $this->questionnaire_id;
    }

    public function set_added_date($added_date)
    {
        $this->added_date = $added_date;
    }

    public function get_added_date()
    {
        return $this->added_date;
    }

    public function set_answer_type($answer_type)
    {
        $this->answer_type = $answer_type;
    }

    public function get_answer_type()
    {
        return $this->answer_type;
    }

    public function set_id($id)
    {
        $this->id = $id;
    }

    public function get_id()
    {
        return $this->id;
    }

    public function set_is_deleted($is_deleted)
    {
        $this->is_deleted = $is_deleted;
    }

    public function get_is_deleted()
    {
        return $this->is_deleted;
    }

    public function set_is_published($is_published)
    {
        $this->is_published = $is_published;
    }

    public function get_is_published()
    {
        return $this->is_published;
    }

    public function set_question_name($question_name)
    {
        $this->question_name = $question_name;
    }

    public function get_question_name()
    {
        return $this->question_name;
    }

    public function set_question_type_id($question_type_id)
    {
        $this->question_type_id = $question_type_id;
    }

    public function get_question_type_id()
    {
        return $this->question_type_id;
    }

    public function set_updated_date($updated_date)
    {
        $this->updated_date = $updated_date;
    }

    public function get_updated_date()
    {
        return $this->updated_date;
    }



}


?>
