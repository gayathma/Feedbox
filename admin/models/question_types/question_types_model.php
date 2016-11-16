<?php

class Question_types_model extends CI_Model
{

    var $id;
    var $name;
    var $name_ta;
    var $name_si;
    var $location_id;
    var $is_published;
    var $is_deleted;
    var $added_date;
    var $updated_date;

    function __construct()
    {
        parent::__construct();
    }

    public function get_location_id() {
        return $this->location_id;
    }

    public function set_location_id($location_id) {
        $this->location_id = $location_id;
    }

    public function set_name_si($name_si)
    {
        $this->name_si = $name_si;
    }

    public function get_name_si()
    {
        return $this->name_si;
    }

    public function set_name_ta($name_ta)
    {
        $this->name_ta = $name_ta;
    }

    public function get_name_ta()
    {
        return $this->name_ta;
    }

    public function set_is_published($is_published)
    {
        $this->is_published = $is_published;
    }

    public function get_is_published()
    {
        return $this->is_published;
    }

    public function set_name($name)
    {
        $this->name = $name;
    }

    public function get_name()
    {
        return $this->name;
    }

    public function get_updated_date()
    {
        return $this->updated_date;
    }

    public function set_updated_date($updated_date)
    {
        $this->updated_date = $updated_date;
    }

    public function get_added_date()
    {
        return $this->added_date;
    }

    public function set_added_date($added_date)
    {
        $this->added_date = $added_date;
    }

    public function get_id()
    {
        return $this->id;
    }

    public function set_id($id)
    {
        $this->id = $id;
    }

    public function get_is_deleted()
    {
        return $this->is_deleted;
    }

    public function set_is_deleted($is_deleted)
    {
        $this->is_deleted = $is_deleted;
    }

}


?>
