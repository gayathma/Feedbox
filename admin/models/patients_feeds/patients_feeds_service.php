<?php

class Patients_feeds_service extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }

    public function get_feedbacks_for_location_by_month($location_id,$month,$questionnaire) {

        $this->db->select('fb_patients_feeds.*');
        $this->db->from('fb_patients_feeds');
        $this->db->join('fb_questionnaire', 'fb_questionnaire.id = fb_patients_feeds.questionnaire_id');
        $this->db->join('fb_questions', 'fb_questions.id = fb_patients_feeds.question_id');
        $this->db->where('fb_patients_feeds.is_deleted', '0');
        if($questionnaire != ""){
            $this->db->where('fb_patients_feeds.questionnaire_id', $questionnaire);
        }
        $this->db->where('fb_questionnaire.location', $location_id);
        $this->db->where('MONTH(fb_patients_feeds.added_date)', $month);
        $this->db->group_by('fb_patients_feeds.patient_id, fb_patients_feeds.added_date');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_feedback_excellent_digits($location_id,$month,$question_id,$answer_type,$questionnaire) {

        $this->db->select('fb_patients_feeds.id');
        $this->db->from('fb_patients_feeds');
        $this->db->join('fb_questionnaire', 'fb_questionnaire.id = fb_patients_feeds.questionnaire_id');
        $this->db->join('fb_questions', 'fb_questions.id = fb_patients_feeds.question_id');
        $this->db->where('fb_patients_feeds.is_deleted', '0');
        $this->db->where('fb_patients_feeds.question_id', $question_id);
        $this->db->where('fb_questionnaire.location', $location_id);
        $this->db->where('fb_patients_feeds.questionnaire_id', $questionnaire);
        $this->db->where('fb_questions.answer_type', $answer_type);
        $this->db->where('MONTH(fb_patients_feeds.added_date)', $month);
        $this->db->where('fb_patients_feeds.feed', 4);
        return $this->db->count_all_results();
    }

    public function get_feedback_yes($location_id,$month,$question_id,$answer_type,$questionnaire) {

        $this->db->select('fb_patients_feeds.id');
        $this->db->from('fb_patients_feeds');
        $this->db->join('fb_questionnaire', 'fb_questionnaire.id = fb_patients_feeds.questionnaire_id');
        $this->db->join('fb_questions', 'fb_questions.id = fb_patients_feeds.question_id');
        $this->db->where('fb_patients_feeds.is_deleted', '0');
        $this->db->where('fb_patients_feeds.question_id', $question_id);
        $this->db->where('fb_questionnaire.location', $location_id);
        $this->db->where('fb_patients_feeds.questionnaire_id', $questionnaire);
        $this->db->where('fb_questions.answer_type', $answer_type);
        $this->db->where('MONTH(fb_patients_feeds.added_date)', $month);
        $this->db->where('fb_patients_feeds.feed', '1');
        return $this->db->count_all_results();
    }

    public function get_feedback_no($location_id,$month,$question_id,$answer_type,$questionnaire) {

        $this->db->select('fb_patients_feeds.id');
        $this->db->from('fb_patients_feeds');
        $this->db->join('fb_questionnaire', 'fb_questionnaire.id = fb_patients_feeds.questionnaire_id');
        $this->db->join('fb_questions', 'fb_questions.id = fb_patients_feeds.question_id');
        $this->db->where('fb_patients_feeds.is_deleted', '0');
        $this->db->where('fb_patients_feeds.question_id', $question_id);
        $this->db->where('fb_questionnaire.location', $location_id);
        $this->db->where('fb_patients_feeds.questionnaire_id', $questionnaire);
        $this->db->where('fb_questions.answer_type', $answer_type);
        $this->db->where('MONTH(fb_patients_feeds.added_date)', $month);
        $this->db->where('fb_patients_feeds.feed', '0');
        return $this->db->count_all_results();
    }

    public function get_feedback_good_digits($location_id,$month,$question_id,$answer_type,$questionnaire) {

        $this->db->select('fb_patients_feeds.id');
        $this->db->from('fb_patients_feeds');
        $this->db->join('fb_questionnaire', 'fb_questionnaire.id = fb_patients_feeds.questionnaire_id');
        $this->db->join('fb_questions', 'fb_questions.id = fb_patients_feeds.question_id');
        $this->db->where('fb_patients_feeds.is_deleted', '0');
        $this->db->where('fb_patients_feeds.question_id', $question_id);
        $this->db->where('fb_patients_feeds.questionnaire_id', $questionnaire);
        $this->db->where('fb_questionnaire.location', $location_id);
        $this->db->where('fb_questions.answer_type', $answer_type);
        $this->db->where('MONTH(fb_patients_feeds.added_date)', $month);
        $this->db->where('fb_patients_feeds.feed', 3);
        return $this->db->count_all_results();
    }

    public function get_feedback_satis_digits($location_id,$month,$question_id,$answer_type,$questionnaire) {

        $this->db->select('fb_patients_feeds.id');
        $this->db->from('fb_patients_feeds');
        $this->db->join('fb_questionnaire', 'fb_questionnaire.id = fb_patients_feeds.questionnaire_id');
        $this->db->join('fb_questions', 'fb_questions.id = fb_patients_feeds.question_id');
        $this->db->where('fb_patients_feeds.is_deleted', '0');
        $this->db->where('fb_patients_feeds.question_id', $question_id);
        $this->db->where('fb_patients_feeds.questionnaire_id', $questionnaire);
        $this->db->where('fb_questionnaire.location', $location_id);
        $this->db->where('fb_questions.answer_type', $answer_type);
        $this->db->where('MONTH(fb_patients_feeds.added_date)', $month);
        $this->db->where('fb_patients_feeds.feed', 2);
        return $this->db->count_all_results();
    }

    public function get_feedback_poor_digits($location_id,$month,$question_id,$answer_type,$questionnaire) {

        $this->db->select('fb_patients_feeds.id');
        $this->db->from('fb_patients_feeds');
        $this->db->join('fb_questionnaire', 'fb_questionnaire.id = fb_patients_feeds.questionnaire_id');
        $this->db->join('fb_questions', 'fb_questions.id = fb_patients_feeds.question_id');
        $this->db->where('fb_patients_feeds.is_deleted', '0');
        $this->db->where('fb_patients_feeds.question_id', $question_id);
        $this->db->where('fb_patients_feeds.questionnaire_id', $questionnaire);
        $this->db->where('fb_questionnaire.location', $location_id);
        $this->db->where('fb_questions.answer_type', $answer_type);
        $this->db->where('MONTH(fb_patients_feeds.added_date)', $month);
        $this->db->where('fb_patients_feeds.feed', 1);
        return $this->db->count_all_results();
    }


    public function get_feed_for_location_by_month($location_id,$date,$patient_id,$questionnaire_id,$question_id) {

        $this->db->select('fb_patients_feeds.*');
        $this->db->from('fb_patients_feeds');
        $this->db->join('fb_questionnaire', 'fb_questionnaire.id = fb_patients_feeds.questionnaire_id');
        $this->db->join('fb_questions', 'fb_questions.id = fb_patients_feeds.question_id');
        $this->db->where('fb_patients_feeds.is_deleted', '0');
        $this->db->where('fb_questionnaire.location', $location_id);
        $this->db->where('fb_patients_feeds.added_date', $date);
        $this->db->where('fb_patients_feeds.patient_id', $patient_id);
        $this->db->where('fb_patients_feeds.questionnaire_id', $questionnaire_id);
        $this->db->where('fb_patients_feeds.question_id', $question_id);
        $query = $this->db->get();
        return $query->row();
    }

}


?>
