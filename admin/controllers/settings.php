<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Settings extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('USER_LOGGED_IN')) {
            redirect(site_url() . '/login/load_login');
        } else {
            $this->load->model('settings/settings_model');
            $this->load->model('settings/settings_service');
        }
    }

    public function index()
    {
        if ($this->session->userdata('USER_TYPE') == '1') {
            $settings_service = new Settings_service();

            $data['settings']       = $settings_service->get_all_settings();
            $data['business_types'] = $this->config->item('BUSINESS_TYPES');


            $partials = array('content' => 'settings/settings'); //load the view
            $this->template->load('template/main_template', $partials, $data); //load teh template
        } else {
            $this->template->load('template/denied');
        }
    }

    function save_settings()
    {

        $settings_model   = new Settings_model();
        $settings_service = new Settings_service();

        $slugs = $this->input->post('slug', TRUE);
        $res   = 0;

        foreach ($slugs as $key => $slug) {
            $settings_model->set_slug($key);
            $settings_model->set_value($slug);

            $res = $settings_service->update_settings($settings_model);
        }
        echo $res;
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */