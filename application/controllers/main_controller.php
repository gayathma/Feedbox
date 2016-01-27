<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Main_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // class constructor

        $this->load->model('questionnaire/questionnaire_model');
        $this->load->model('questionnaire/questionnaire_service');

        $this->load->model('patients/patients_model');
        $this->load->model('patients/patients_service');

        $this->load->model('question_types/question_types_model');
        $this->load->model('question_types/question_types_service');

        $this->load->model('questions/questions_model');
        $this->load->model('questions/questions_service');

        $this->load->model('patients_feeds/patients_feeds_model');
        $this->load->model('patients_feeds/patients_feeds_service');

    }

    public function index($id)
    {
        $question_types_service = new Question_types_service();
        $questions_service      = new Questions_service();
        $questionnaire_service  = new Questionnaire_service();

        //get latest questionnaire
        $questionnaire = $questionnaire_service->get_questionnaire_by_id($id);

        //load question types
        $result_arr     = array();
        $question_types = $questions_service->get_question_categories_for_questionnaire($questionnaire->id);

        if (!empty($question_types)) {
            foreach ($question_types as $question_type) {
                $ques_t                  = array();
                $ques_t['question_type'] = $question_types_service->get_question_type_by_id($question_type->question_type_id);
                //load questions for question type
                $questions           = $questions_service->get_questions_for_question_type_questionnaire($question_type->question_type_id, $questionnaire->id);
                $ques_t['questions'] = (!empty($questions)) ? $questions : array();

                $result_arr[] = $ques_t;
            }
        }

        //load question without categories
        $non_type_questions = $questions_service->get_non_cate_questions_for_questionnaire($questionnaire->id);
        $ques_t                  = array();
        $ques_t['question_type'] = "";
        $ques_t['questions'] = $non_type_questions;
        $result_arr[] = $ques_t;


        $data['result_arr'] = $result_arr;
        //load emotion expressions from the feedbox config
        $data['emotions']      = $this->config->item('EMOTICON_TYPES');
        $data['questionnaire'] = $questionnaire;

        $partials = array('content' => 'content/home');
        $this->template->load('template/feedbox_template', $partials, $data); //load template
    }

    public function save_feedback()
    {
        $patients_service       = new Patients_service();
        $patients_model         = new Patients_model();
        $patients_feeds_service = new Patients_feeds_service();
        $questionnaire_service  = new Questionnaire_service();

        $data['questionnaire'] = $questionnaire_service->get_questionnaire_by_id($this->input->post('questionnaire_id', TRUE));
        
        echo $this->load->view('content/thank_you',$data);

        //check is the user is exist or not
        $patient    = $patients_service->get_patient_by_number($this->input->post('patient_number', TRUE));
        $patient_id = '';

        //if user exist update the details  otherwise insert a new user
        if (!empty($patient)) {
            $patient_id = $patient->id;

            $patients_model->set_id($patient_id);
            $patients_model->set_patient_name($this->input->post('patient_name', TRUE));
            $patients_model->set_patient_email($this->input->post('patient_email', TRUE));
            $patients_model->set_patient_contact_no($this->input->post('patient_contact_no', TRUE));
            $patients_model->set_patient_admission_date($this->input->post('patient_admission_date', TRUE));
            $patients_model->set_patient_discharge_date($this->input->post('patient_discharge_date', TRUE));
            $patients_model->set_updated_date(date("Y-m-d H:i:s"));

            $patients_service->update_patient_details($patients_model);
        } else {

            $patients_model->set_patient_number($this->input->post('patient_number', TRUE));
            $patients_model->set_patient_name($this->input->post('patient_name', TRUE));
            $patients_model->set_patient_email($this->input->post('patient_email', TRUE));
            $patients_model->set_patient_contact_no($this->input->post('patient_contact_no', TRUE));
            $patients_model->set_patient_admission_date($this->input->post('patient_admission_date', TRUE));
            $patients_model->set_patient_discharge_date($this->input->post('patient_discharge_date', TRUE));
            $patients_model->set_is_deleted('0');
            $patients_model->set_added_date(date("Y-m-d H:i:s"));

            $patient_id = $patients_service->save_patient_details($patients_model);
        }

        $questions = $this->input->post('questions', TRUE);
        $answers   = $this->input->post('answer', TRUE);

        foreach ($questions as $question) {
            $patients_feeds_model = new Patients_feeds_model();

            $patients_feeds_model->set_questionnaire_id($this->input->post('questionnaire_id', TRUE));
            $patients_feeds_model->set_feed($answers[$question]);
            $patients_feeds_model->set_patient_id($patient_id);
            $patients_feeds_model->set_question_id($question);
            $patients_feeds_model->set_is_deleted('0');
            $patients_feeds_model->set_added_date(date("Y-m-d H:i:s"));

            $patients_feeds_service->save_patient_feed($patients_feeds_model);
        }

    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */