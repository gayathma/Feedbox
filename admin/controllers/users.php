<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('USER_LOGGED_IN')) {
            redirect(site_url() . '/login/load_login');
        } else {
            $this->load->model('users/user_model');
            $this->load->model('users/user_service');

            $this->load->model('locations/locations_model');
            $this->load->model('locations/locations_service');
        }
    }

    function manage_users() {
        $user_service = new User_service();
        $locations_service = new Locations_service();

        //if super user load all users
        $user_types = "";
        if ($this->session->userdata('USER_TYPE') == '1') {
            $data['results'] = $user_service->get_all_users();
            $user_types = $this->config->item('USER_TYPES');
        }else if ($this->session->userdata('USER_TYPE') == '2') { //if admin users belongs to his location
            $user_types = $this->config->item('USER_TYPES');
            unset($user_types[1]);
            $data['results'] = $user_service->get_users_for_location($this->session->userdata('USER_LOCATION'));
        }
        

        $data['user_types'] = $user_types;
        $data['locations'] = $locations_service->get_locations();

        $parials = array('content' => 'users/user_accounts');
        $this->template->load('template/main_template', $parials, $data);
    }

    /*
     * Function to add user
     */

    function add_user() {

        $user_model   = new User_model();
        $user_service = new User_service();

        $user_model->set_name($this->input->post('name', TRUE));
        $user_model->set_user_name($this->input->post('user_name', TRUE));
        $user_model->set_user_type($this->input->post('user_type', TRUE));
        $location_id = "";
        if ($this->session->userdata('USER_TYPE') != '1') {
            $location_id = $this->session->userdata('USER_LOCATION');
        }else{
            $location_id = $this->input->post('location_id', TRUE);
        }
        $user_model->set_location_id($location_id);
        $user_model->set_email($this->input->post('email', TRUE));
        $user_model->set_password(md5($this->input->post('password', TRUE)));
        $user_model->set_added_by($this->session->userdata('USER_ID'));
        $user_model->set_added_date(date("Y-m-d H:i:s"));
        $user_model->set_is_published('1');
        $user_model->set_is_online('0');
        $user_model->set_is_deleted('0');

        echo $user_service->add_user($user_model);
    }


    /*
     * Function to delete user
     */

    function delete_users() {
        $user_service = new User_service();
        echo $user_service->delete_users(trim($this->input->post('id', TRUE)));

    }

    /*
     * Function to load the user
     */

    function load_user() {
        $user_service = new User_service();
        $user_model   = new User_model();
        $locations_service = new Locations_service();

        $user_types = "";
        if ($this->session->userdata('USER_TYPE') == '1') {
            $user_types = $this->config->item('USER_TYPES');
        }else if ($this->session->userdata('USER_TYPE') == '2') { //if admin users belongs to his location
            $user_types = $this->config->item('USER_TYPES');
            unset($user_types[1]);
        }
        $data['user_types'] = $user_types;
        $data['locations'] = $locations_service->get_locations();

        $user_model->set_id(trim($this->input->post('user_id', TRUE)));
        $data['user'] = $user_service->get_user_by_id($user_model);


        echo $this->load->view('users/edit_user', $data);
    }

    /*
     * Function to update user details
     */

    function update_user() {
        $user_model   = new User_model();
        $user_service = new User_service();


        $user_model->set_id($this->input->post('user_id', TRUE));
        $user_model->set_name($this->input->post('name', TRUE));
        $user_model->set_user_name($this->input->post('user_name', TRUE));
        $user_model->set_user_type($this->input->post('user_type', TRUE));
        $location_id = "";
        if ($this->session->userdata('USER_TYPE') != '1') {
            $location_id = $this->session->userdata('USER_LOCATION');
        }else{
            $location_id = $this->input->post('location_id', TRUE);
        }
        $user_model->set_location_id($location_id);
        $user_model->set_email($this->input->post('email', TRUE));
        $user_model->set_password(md5($this->input->post('password', TRUE)));
        $user_model->set_updated_by($this->session->userdata('USER_ID'));
        $user_model->set_updated_date(date("Y-m-d H:i:s"));

        echo $user_service->update_user($user_model);
    }

    /*
     * Function to update user password and avatar
     */

    function reset_password_and_avatar() {
        $user_model   = new User_model();
        $user_service = new User_service();
        $user_model->set_password($this->input->post('profile_pic', TRUE));
        $user_model->set_profile_pic($this->input->post('pasword', TRUE));
        $user_model->set_updated_by($this->session->userdata('USER_ID'));
        $user_model->set_updated_date(date("Y-m-d H:i:s"));

        echo $user_service->update_user($user_model);
    }



    /*
     * This function to check old password when updating an admin or super admin
     * author - nadeesha
     */

    function check_old_password() {
        $user_service = new User_service();
        $user_model   = new User_model();
        $user_model->set_id($this->session->userdata('USER_ID'));
        $dbpw         = $user_service->checkOldPass($user_model);

        $typedOldPassword = $this->input->post('old_password', TRUE);

        if ($dbpw == md5($typedOldPassword)) {
            echo 1;
        } else {
            echo 0;
        }
    }

}
