<?php

class User_model extends CI_Model {

    var $id;
    var $name;
    var $user_name;
    var $email;
    var $user_type;
    var $location_id;
    var $password;
    var $is_online;
    var $is_published;
    var $is_deleted;
    var $added_by;
    var $added_date;
    var $updated_date;
    var $updated_by;

    function __construct() {
        parent::__construct();
    }
    
    public function get_location_id() {
        return $this->location_id;
    }

    public function set_location_id($location_id) {
        $this->location_id = $location_id;
    }

    
    public function get_id() {
        return $this->id;
    }

    public function set_id($id) {
        $this->id = $id;
    }

    public function get_name() {
        return $this->name;
    }

    public function set_name($name) {
        $this->name = $name;
    }

    public function get_user_name() {
        return $this->user_name;
    }

    public function set_user_name($user_name) {
        $this->user_name = $user_name;
    }

    public function get_email() {
        return $this->email;
    }

    public function set_email($email) {
        $this->email = $email;
    }

    public function get_user_type() {
        return $this->user_type;
    }

    public function set_user_type($user_type) {
        $this->user_type = $user_type;
    }

    public function get_password() {
        return $this->password;
    }

    public function set_password($password) {
        $this->password = $password;
    }

    public function get_is_online() {
        return $this->is_online;
    }

    public function set_is_online($is_online) {
        $this->is_online = $is_online;
    }

    public function get_is_published() {
        return $this->is_published;
    }

    public function set_is_published($is_published) {
        $this->is_published = $is_published;
    }

    public function get_is_deleted() {
        return $this->is_deleted;
    }

    public function set_is_deleted($is_deleted) {
        $this->is_deleted = $is_deleted;
    }

    public function get_added_by() {
        return $this->added_by;
    }

    public function set_added_by($added_by) {
        $this->added_by = $added_by;
    }

    public function get_added_date() {
        return $this->added_date;
    }

    public function set_added_date($added_date) {
        $this->added_date = $added_date;
    }

    public function get_updated_date() {
        return $this->updated_date;
    }

    public function set_updated_date($updated_date) {
        $this->updated_date = $updated_date;
    }

    public function get_updated_by() {
        return $this->updated_by;
    }

    public function set_updated_by($updated_by) {
        $this->updated_by = $updated_by;
    }


}
