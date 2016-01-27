<?php

class Patients_feeds_model extends CI_Model{
    
    var $id;
    var $feed;
    var $patient_id;
    var $question_id;
    var $is_deleted;
    var $added_date;
    var $updated_date;
    
    function __construct(){
        parent::__construct();
    }

    public function set_added_date($added_date)
    {
        $this->added_date = $added_date;
    }

    public function get_added_date()
    {
        return $this->added_date;
    }

    public function set_feed($feed)
    {
        $this->feed = $feed;
    }

    public function get_feed()
    {
        return $this->feed;
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

    public function set_patient_id($patient_id)
    {
        $this->patient_id = $patient_id;
    }

    public function get_patient_id()
    {
        return $this->patient_id;
    }

    public function set_question_id($question_id)
    {
        $this->question_id = $question_id;
    }

    public function get_question_id()
    {
        return $this->question_id;
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
