<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Locations extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('USER_LOGGED_IN')) {
            redirect(site_url() . '/login/load_login');
        } else {
            $this->load->model('locations/locations_model');
            $this->load->model('locations/locations_service');

        }
    }

    public function manage_locations()
    {
        $locations_service = new Locations_service();

        $data['locations']      = $locations_service->get_locations();
        $data['business_types'] = $this->config->item('BUSINESS_TYPES');

        $partials = array('content' => 'locations/locations'); //load the view
        $this->template->load('template/main_template', $partials, $data); //load teh template
    }

    function save_location()
    {

        $locations_model   = new Locations_model();
        $locations_service = new Locations_service();

        $locations_model->set_name($this->input->post('name', TRUE));
        $locations_model->set_type($this->input->post('type', TRUE));
        $locations_model->set_added_date(date("Y-m-d H:i:s"));
        $locations_model->set_is_deleted('0');
        $locations_model->set_is_published('1');

        echo $locations_service->save_location($locations_model);
    }

    /**
     * This is to delete a location
     */
    function delete_location()
    {

        $locations_service = new Locations_service();

        echo $locations_service->delete_location(trim($this->input->post('id', TRUE)));
    }

    /**
     * Edit location pop up content set up and then send .
     */
    function load_edit_location_content()
    {
        $locations_service = new Locations_service();

        $data['business_types'] = $this->config->item('BUSINESS_TYPES');
        $data['location']       = $locations_service->get_location_by_id(
            trim($this->input->post('loc_id', TRUE))
        );

        echo $this->load->view('locations/edit_location', $data, TRUE);
    }

    /*
     * This function is to update the location
     */

    function edit_location()
    {

        $locations_model   = new Locations_model();
        $locations_service = new Locations_service();

        $locations_model->set_id($this->input->post('loc_id', TRUE));
        $locations_model->set_name($this->input->post('name', TRUE));
        $locations_model->set_type($this->input->post('type', TRUE));
        $locations_model->set_updated_date(date("Y-m-d H:i:s"));

        echo $locations_service->update_location($locations_model);
    }

}
