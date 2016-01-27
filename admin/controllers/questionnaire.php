<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Questionnaire extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('USER_LOGGED_IN')) {
            redirect(site_url() . '/login/load_login');
        } else {
            $this->load->model('questionnaire/questionnaire_model');
            $this->load->model('questionnaire/questionnaire_service');

            $this->load->model('questions/questions_model');
            $this->load->model('questions/questions_service');

            $this->load->model('question_types/question_types_model');
            $this->load->model('question_types/question_types_service');
        }
    }

    function save_questionnaire()
    {

        $questionnaire_model   = new Questionnaire_model();
        $questionnaire_service = new Questionnaire_service();

        $questionnaire_model->set_name($this->input->post('name', TRUE));
        $questionnaire_model->set_language_type($this->input->post('language', TRUE));
        $questionnaire_model->set_location($this->input->post('location_id', TRUE));
        $questionnaire_model->set_type('1');
        $questionnaire_model->set_thank_image('face.png');
        $questionnaire_model->set_thank_text('Thank You');
        $questionnaire_model->set_thank_text_desc('We value your feedback');
        $questionnaire_model->set_welcome_bg_colour('#333');
        $questionnaire_model->set_welcome_image('face.png');
        $questionnaire_model->set_text_colour('#FFFFFF');
        $questionnaire_model->set_btn_text_colour('#FFFFFF');
        $questionnaire_model->set_banner_colour('#f47b20');
        $questionnaire_model->set_banner_txt_colour('#333');
        $questionnaire_model->set_btn_colour('#f47b20');
        $questionnaire_model->set_btn_type('3d');
        $questionnaire_model->set_text_box_colour('#414141');
        $questionnaire_model->set_welcome_text('Welcome to Feedbox');
        $questionnaire_model->set_welcome_text_desc(
            'Please rate your level of satisfaction by clicking the appropriate face'
        );
        $questionnaire_model->set_added_date(date("Y-m-d H:i:s"));
        $questionnaire_model->set_is_deleted('0');
        $questionnaire_model->set_is_published('1');

        echo $questionnaire_service->save_questionnaire($questionnaire_model);
    }

    public function main_form($questionnaire_id)
    {
        $questionnaire_service  = new Questionnaire_service();
        $questions_service      = new Questions_service();
        $questions_type_service = new Question_types_service();

        $data['questions']      = $questions_service->get_all_questions($questionnaire_id);
        $data['questionnaire']  = $questionnaire_service->get_questionnaire_by_id($questionnaire_id);
        $data['question_types'] = $questions_type_service->get_published_question_types(
            $this->session->userdata('USER_LOCATION')
        );


        $partials = array('content' => 'questionnaire/main_form'); //load the view
        $this->template->load('template/main_template', $partials, $data); //load teh template
    }

    function load_edit_question_content()
    {
        $questions_service      = new Questions_service();
        $questionnaire_service  = new Questionnaire_service();
        $questions_type_service = new Question_types_service();

        $data['question']       = $questions_service->get_question_by_id(trim($this->input->post('q_id', TRUE)));
        $data['questionnaire']  = $questionnaire_service->get_questionnaire_by_id(
            trim($this->input->post('questionnaire_id', TRUE))
        );
        $data['question_types'] = $questions_type_service->get_published_question_types(
            $this->session->userdata('USER_LOCATION')
        );

        echo $this->load->view('questionnaire/edit_question', $data, TRUE);
    }

    public function question_types()
    {
        $question_types_service = new Question_types_service();

        $data['question_types'] = $question_types_service->get_published_question_types(
            $this->session->userdata('USER_LOCATION')
        );

        $partials = array('content' => 'questionnaire/question_types'); //load the view
        $this->template->load('template/main_template', $partials, $data); //load teh template
    }

    function save_questions_type()
    {

        $questions_type_model   = new Question_types_model();
        $questions_type_service = new Question_types_service();

        $questions_type_model->set_name($this->input->post('name', TRUE));
        $questions_type_model->set_name_si($this->input->post('name_si', TRUE));
        $questions_type_model->set_name_ta($this->input->post('name_ta', TRUE));
        $questions_type_model->set_location_id($this->session->userdata('USER_LOCATION'));
        $questions_type_model->set_added_date(date("Y-m-d H:i:s"));
        $questions_type_model->set_is_deleted('0');
        $questions_type_model->set_is_published('1');

        echo $questions_type_service->save_question_type($questions_type_model);
    }

    /**
     * This is to delete a question type
     */
    function delete_question_type()
    {

        $question_type_service = new Question_types_service();

        echo $question_type_service->delete_question_type(trim($this->input->post('id', TRUE)));
    }

    /**
     * This is to delete a question
     */
    function delete_question()
    {

        $questions_service = new Questions_service();

        echo $questions_service->delete_question(trim($this->input->post('id', TRUE)));
    }

    /**
     * Edit question type pop up content set up and then send .
     */
    function load_edit_question_type_content()
    {
        $question_type_service = new Question_types_service();

        $data['question_type'] = $question_type_service->get_question_type_by_id(
            trim($this->input->post('ques_ty_id', TRUE))
        );

        echo $this->load->view('questionnaire/question_type_edit_pop_up', $data, TRUE);
    }

    /*
     * This function is to update the question type details
     */

    function edit_question_type()
    {

        $questions_type_model   = new Question_types_model();
        $questions_type_service = new Question_types_service();

        $questions_type_model->set_id($this->input->post('q_type_id', TRUE));
        $questions_type_model->set_name($this->input->post('name', TRUE));
        $questions_type_model->set_name_si($this->input->post('name_si', TRUE));
        $questions_type_model->set_name_ta($this->input->post('name_ta', TRUE));
        $questions_type_model->set_updated_date(date("Y-m-d H:i:s"));

        echo $questions_type_service->update_question_type($questions_type_model);
    }

    function save_question()
    {
        $questions_model   = new Questions_model();
        $questions_service = new Questions_service();

        $question_type_id = NULL;
        if ($this->input->post('question_type_id', TRUE) == '') {
            $question_type_id = NULL;
        } else {
            $question_type_id = $this->input->post('question_type_id', TRUE);
        }

        $questions_model->set_question_name($this->input->post('question_name', TRUE));
        $questions_model->set_question_name_si($this->input->post('question_name_si', TRUE));
        $questions_model->set_question_name_ta($this->input->post('question_name_ta', TRUE));
        $questions_model->set_questionnaire_id($this->input->post('questionnaire_id', TRUE));
        $questions_model->set_question_type_id($question_type_id);
        $questions_model->set_answer_type($this->input->post('answer_type', TRUE));
        $questions_model->set_added_date(date("Y-m-d H:i:s"));
        $questions_model->set_is_deleted('0');
        $questions_model->set_is_published('1');

        echo $questions_service->save_question($questions_model);
    }

    function edit_question()
    {
        $questions_model   = new Questions_model();
        $questions_service = new Questions_service();

        $question_type_id = NULL;
        if ($this->input->post('question_type_id', TRUE) == '') {
            $question_type_id = NULL;
        } else {
            $question_type_id = $this->input->post('question_type_id', TRUE);
        }

        $questions_model->set_id($this->input->post('question_id', TRUE));
        $questions_model->set_question_name($this->input->post('question_name', TRUE));
        $questions_model->set_question_name_si($this->input->post('question_name_si', TRUE));
        $questions_model->set_question_name_ta($this->input->post('question_name_ta', TRUE));
        $questions_model->set_questionnaire_id($this->input->post('questionnaire_id', TRUE));
        $questions_model->set_question_type_id($question_type_id);
        $questions_model->set_answer_type($this->input->post('answer_type', TRUE));
        $questions_model->set_updated_date(date("Y-m-d H:i:s"));

        echo $questions_service->update_question($questions_model);
    }

    function save_thank_you_text()
    {
        $questionnaire_service = new Questionnaire_service();

        $data = array(
            'thank_text'         => $this->input->post('thank_text', TRUE),
            'thank_text_desc'    => $this->input->post('thank_text_desc', TRUE),
            'thank_text_si'      => $this->input->post('thank_text_si', TRUE),
            'thank_text_desc_si' => $this->input->post('thank_text_desc_si', TRUE),
            'thank_text_ta'      => $this->input->post('thank_text_ta', TRUE),
            'thank_text_desc_ta' => $this->input->post('thank_text_desc_ta', TRUE)
        );

        $questionnaire_service->update_questionnaire($data, $this->input->post('questionnaire_id', TRUE));

        $data['questionnaire'] = $questionnaire_service->get_questionnaire_by_id(
            $this->input->post('questionnaire_id', TRUE)
        );

    }

    function save_welcome()
    {
        $questionnaire_service = new Questionnaire_service();

        $data = array(
            'welcome_text'         => $this->input->post('welcome_text', TRUE),
            'welcome_text_desc'    => $this->input->post('welcome_text_desc', TRUE),
            'welcome_text_si'      => $this->input->post('welcome_text_si', TRUE),
            'welcome_text_desc_si' => $this->input->post('welcome_text_desc_si', TRUE),
            'welcome_text_ta'      => $this->input->post('welcome_text_ta', TRUE),
            'welcome_text_desc_ta' => $this->input->post('welcome_text_desc_ta', TRUE)
        );

        $questionnaire_service->update_questionnaire($data, $this->input->post('questionnaire_id', TRUE));

        $data['questionnaire'] = $questionnaire_service->get_questionnaire_by_id(
            $this->input->post('questionnaire_id', TRUE)
        );

    }

    function save_theme()
    {
        $questionnaire_service = new Questionnaire_service();

        $data = array(
            'text_colour'       => $this->input->post('text_colour', TRUE),
            'banner_colour'     => $this->input->post('banner_colour', TRUE),
            'banner_txt_colour' => $this->input->post('banner_txt_colour', TRUE),
            'btn_colour'        => $this->input->post('btn_colour', TRUE),
            'btn_type'          => $this->input->post('btn_type', TRUE),
            'text_box_colour'   => $this->input->post('text_box_colour', TRUE),
            'welcome_bg_colour' => $this->input->post('welcome_bg_colour', TRUE),
            'btn_text_colour'   => $this->input->post('btn_text_colour', TRUE)
        );

        $questionnaire_service->update_questionnaire($data, $this->input->post('questionnaire_id', TRUE));

        $data['questionnaire'] = $questionnaire_service->get_questionnaire_by_id(
            $this->input->post('questionnaire_id', TRUE)
        );

    }

    function upload_thank_you_image($id)
    {

        $uploaddir  = './uploads/';
        $unique_tag = 'th';

        $filename = $unique_tag . time() . '-' . basename($_FILES['uploadfile']['name']); //this is the file name
        $file     = $uploaddir . $filename; // this is the full path of the uploaded file

        if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) {
            $questionnaire_service = new Questionnaire_service();

            $data = array(
                'thank_image' => $filename
            );

            $questionnaire_service->update_questionnaire($data, $id);

            echo $filename;
        } else {
            echo "error";
        }
    }

    function upload_welcome_image($id)
    {

        $uploaddir  = './uploads/';
        $unique_tag = 'wl';

        $filename = $unique_tag . time() . '-' . basename($_FILES['uploadfile']['name']); //this is the file name
        $file     = $uploaddir . $filename; // this is the full path of the uploaded file

        if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) {
            $questionnaire_service = new Questionnaire_service();

            $data = array(
                'welcome_image' => $filename
            );

            $questionnaire_service->update_questionnaire($data, $id);

            echo $filename;
        } else {
            echo "error";
        }
    }

}
