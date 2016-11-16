<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('USER_LOGGED_IN')) {
            redirect(site_url() . '/login/load_login');
        } else {
            $this->load->model('questionnaire/questionnaire_model');
            $this->load->model('questionnaire/questionnaire_service');

            $this->load->model('settings/settings_model');
            $this->load->model('settings/settings_service');

            $this->load->model('locations/locations_model');
            $this->load->model('locations/locations_service');

            $this->load->model('users/user_model');
            $this->load->model('users/user_service');
        }
    }

    public function admin_home()
    {
        if ($this->session->userdata('USER_TYPE') == '1') {
            $questionnaire_service = new Questionnaire_service();
            $settings_service      = new Settings_service();
            $locations_service     = new Locations_service();

            $setting = $settings_service->get_settings_by_slug('site_url');

            $data['languages']  = $this->config->item('LANGUAGES');
            $data['locations']  = $locations_service->get_locations();
            $data['domain_url'] = $setting->value;

            $partials = array('content' => 'dashboard/admin_dashboard_view'); //load the view
            $this->template->load('template/main_template', $partials, $data); //load teh template
        } else {
            $this->template->load('template/denied');
        }
    }

    public function index()
    {
        $questionnaire_service = new Questionnaire_service();
        $settings_service      = new Settings_service();
        $locations_service     = new Locations_service();

        $setting = $settings_service->get_settings_by_slug('site_url');

        $data['languages']      = $this->config->item('LANGUAGES');
        $data['locations']      = $locations_service->get_locations();
        $data['questionnaires'] = $questionnaire_service->get_questionnaires($this->session->userdata('USER_LOCATION'));
        $data['domain_url']     = $setting->value;

        $partials = array('content' => 'dashboard/dashboard_view'); //load the view
        $this->template->load('template/main_template', $partials, $data); //load teh template
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */