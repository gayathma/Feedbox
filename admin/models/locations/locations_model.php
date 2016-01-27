<?php

class Locations_model extends CI_Model
{

    var $id;
    var $name;
    var $type;
    var $is_published;
    var $is_deleted;
    var $added_date;
    var $updated_date;

    function __construct()
    {
        parent::__construct();
    }

    public function set_type($type)
    {
        $this->type = $type;
    }

    public function get_type()
    {
        return $this->type;
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
