<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Reports extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('USER_LOGGED_IN')) {
            redirect(site_url() . '/login/load_login');
        } else {
            $this->load->model('locations/locations_model');
            $this->load->model('locations/locations_service');

            $this->load->model('questionnaire/questionnaire_model');
            $this->load->model('questionnaire/questionnaire_service');

            $this->load->model('patients_feeds/patients_feeds_model');
            $this->load->model('patients_feeds/patients_feeds_service');

            $this->load->model('question_types/question_types_model');
            $this->load->model('question_types/question_types_service');

            $this->load->model('questions/questions_model');
            $this->load->model('questions/questions_service');

            $this->load->model('patients/patients_model');
            $this->load->model('patients/patients_service');
        }
    }

    public function report_dashboard()
    {
        $locations_service = new Locations_service();

        $location_id = $this->session->userdata('USER_LOCATION');
        $location    = $locations_service->get_location_by_id($location_id);

        $partials = array();
        if (!empty($location)) {
            if ($location->type == 'hospital') {
                $partials = array('content' => 'reports/hospital_report_dashboard'); //load the view
            }else{
                $partials = array('content' => 'reports_other/report_dashboard'); //load the view
            }
        }

        $this->template->load('template/main_template', $partials); //load teh template
    }

    public function hospital_monthly_report()
    {
        $questionnaire_service = new Questionnaire_service();

        $location_id            = $this->session->userdata('USER_LOCATION');
        $data['questionnaires'] = $questionnaire_service->get_questionnaires($location_id);

        $partials = array('content' => 'reports/hospital_monthly_report'); //load the view
        $this->template->load('template/main_template', $partials, $data); //load teh template
    }

    public function generate_hospital_monthly_report()
    {

        $patients_feed_service = new Patients_feeds_service();
        $question_type_service = new Question_types_service();

        $location_id   = $this->session->userdata('USER_LOCATION');
        $month         = $this->input->post('month', TRUE);
        $questionnaire = $this->input->post('questionnaire', TRUE);
        $date          = date('n', strtotime($this->input->post('month', TRUE)));

        $data['questionnaire']    = $questionnaire;
        $data['date']             = $date;
        $data['feed_back_sheets'] = $patients_feed_service->get_feedbacks_for_location_by_month(
            $location_id, $date, $questionnaire
        );
        $data['month']            = date('F Y', strtotime($month));
        if ($questionnaire != "") {
            $data['q_types'] = $question_type_service->get_published_question_types_for_questionnaire(
                $location_id, $questionnaire
            );
        } else {
            $data['q_types'] = $question_type_service->get_published_question_types($location_id);
        }
        $data['location_id']      = $location_id;
        $data['total_admissions'] = $this->input->post('total_admissions', TRUE);


        $this->load->view('reports/hospital_monthly_report_chart_view', $data);
    }

    public function generate_hospital_monthly_report_export()
    {

        $patients_feed_service = new Patients_feeds_service();
        $question_type_service = new Question_types_service();

        $location_id   = $this->session->userdata('USER_LOCATION');
        $month         = $this->input->get('month', TRUE);
        $questionnaire = $this->input->get('questionnaire', TRUE);
        $date          = date('n', strtotime($this->input->get('month', TRUE)));

        $data['questionnaire']    = $questionnaire;
        $data['date']             = $date;
        $data['feed_back_sheets'] = $patients_feed_service->get_feedbacks_for_location_by_month(
            $location_id, $date, $questionnaire
        );
        $data['month']            = date('F Y', strtotime($month));
        if ($questionnaire != "") {
            $data['q_types'] = $question_type_service->get_published_question_types_for_questionnaire(
                $location_id, $questionnaire
            );
        } else {
            $data['q_types'] = $question_type_service->get_published_question_types($location_id);
        }
        $data['location_id']      = $location_id;
        $data['total_admissions'] = $this->input->get('total_admissions', TRUE);


        echo $this->load->view('reports/hospital_monthly_report_chart_view_excel', $data, TRUE);
    }

    public function patient_feedback_report()
    {
        $questionnaire_service = new Questionnaire_service();

        $location_id            = $this->session->userdata('USER_LOCATION');
        $data['questionnaires'] = $questionnaire_service->get_questionnaires($location_id);

        $partials = array('content' => 'reports/patient_feedback_monthly_report'); //load the view
        $this->template->load('template/main_template', $partials, $data); //load teh template
    }

    public function generate_patient_feedback_export()
    {

        $patients_feed_service = new Patients_feeds_service();
        $question_type_service = new Question_types_service();

        $location_id   = $this->session->userdata('USER_LOCATION');
        $month         = $this->input->get('month', TRUE);
        $questionnaire = $this->input->get('questionnaire', TRUE);
        $date          = date('n', strtotime($this->input->get('month', TRUE)));

        $data['questionnaire']    = $questionnaire;
        $data['date']             = $date;
        $data['get_month']        = $month;
        $data['feed_back_sheets'] = $patients_feed_service->get_feedbacks_for_location_by_month(
            $location_id, $date, $questionnaire
        );
        $data['month']            = date('F Y', strtotime($month));
        if ($questionnaire != "") {
            $data['q_types'] = $question_type_service->get_published_question_types_for_questionnaire(
                $location_id, $questionnaire
            );
        } else {
            $data['q_types'] = $question_type_service->get_published_question_types($location_id);
        }

        $data['location_id'] = $location_id;
        echo $this->load->view('reports/patient_feedback_monthly_report_excel', $data, TRUE);
    }

    //////////////////////////////Other Location Reports /////////////////////////
    public function monthly_report()
    {
        $questionnaire_service = new Questionnaire_service();

        $location_id            = $this->session->userdata('USER_LOCATION');
        $data['questionnaires'] = $questionnaire_service->get_questionnaires($location_id);

        $partials = array('content' => 'reports_other/monthly_report'); //load the view
        $this->template->load('template/main_template', $partials, $data); //load teh template
    }


    public function generate_monthly_report()
    {

        $patients_feed_service = new Patients_feeds_service();
        $question_type_service = new Question_types_service();

        $location_id   = $this->session->userdata('USER_LOCATION');
        $month         = $this->input->post('month', TRUE);
        $questionnaire = $this->input->post('questionnaire', TRUE);
        $date          = date('n', strtotime($this->input->post('month', TRUE)));

        $data['questionnaire']    = $questionnaire;
        $data['date']             = $date;
        $data['feed_back_sheets'] = $patients_feed_service->get_feedbacks_for_location_by_month(
            $location_id, $date, $questionnaire
        );
        $data['month']            = date('F Y', strtotime($month));
        if ($questionnaire != "") {
            $data['q_types'] = $question_type_service->get_published_question_types_for_questionnaire(
                $location_id, $questionnaire
            );
        } else {
            $data['q_types'] = $question_type_service->get_published_question_types($location_id);
        }
        $data['location_id']      = $location_id;
        $data['total_admissions'] = $this->input->post('total_admissions', TRUE);


        $this->load->view('reports_other/monthly_report_chart_view', $data);
    }

    public function generate_monthly_report_export()
    {

        $patients_feed_service = new Patients_feeds_service();
        $question_type_service = new Question_types_service();

        $location_id   = $this->session->userdata('USER_LOCATION');
        $month         = $this->input->get('month', TRUE);
        $questionnaire = $this->input->get('questionnaire', TRUE);
        $date          = date('n', strtotime($this->input->get('month', TRUE)));

        $data['questionnaire']    = $questionnaire;
        $data['date']             = $date;
        $data['feed_back_sheets'] = $patients_feed_service->get_feedbacks_for_location_by_month(
            $location_id, $date, $questionnaire
        );
        $data['month']            = date('F Y', strtotime($month));
        if ($questionnaire != "") {
            $data['q_types'] = $question_type_service->get_published_question_types_for_questionnaire(
                $location_id, $questionnaire
            );
        } else {
            $data['q_types'] = $question_type_service->get_published_question_types($location_id);
        }
        $data['location_id']      = $location_id;
        $data['total_admissions'] = $this->input->get('total_admissions', TRUE);


        echo $this->load->view('reports_other/monthly_report_chart_view_excel', $data, TRUE);
    }


    public function feedback_report()
    {
        $questionnaire_service = new Questionnaire_service();

        $location_id            = $this->session->userdata('USER_LOCATION');
        $data['questionnaires'] = $questionnaire_service->get_questionnaires($location_id);

        $partials = array('content' => 'reports_other/feedback_monthly_report'); //load the view
        $this->template->load('template/main_template', $partials, $data); //load teh template
    }

    public function generate_feedback_export()
    {

        $patients_feed_service = new Patients_feeds_service();
        $question_type_service = new Question_types_service();

        $location_id   = $this->session->userdata('USER_LOCATION');
        $month         = $this->input->get('month', TRUE);
        $questionnaire = $this->input->get('questionnaire', TRUE);
        $date          = date('n', strtotime($this->input->get('month', TRUE)));

        $data['questionnaire']    = $questionnaire;
        $data['date']             = $date;
        $data['get_month']        = $month;
        $data['feed_back_sheets'] = $patients_feed_service->get_feedbacks_for_location_by_month(
            $location_id, $date, $questionnaire
        );
        $data['month']            = date('F Y', strtotime($month));
        if ($questionnaire != "") {
            $data['q_types'] = $question_type_service->get_published_question_types_for_questionnaire(
                $location_id, $questionnaire
            );
        } else {
            $data['q_types'] = $question_type_service->get_published_question_types($location_id);
        }

        $data['location_id'] = $location_id;
        echo $this->load->view('reports_other/feedback_monthly_report_excel', $data, TRUE);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */