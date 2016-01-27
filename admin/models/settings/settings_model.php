<?php

class Settings_model extends CI_Model
{

    var $id;
    var $name;
    var $slug;
    var $value;

    function __construct()
    {
        parent::__construct();
    }

    public function set_slug($slug)
    {
        $this->slug = $slug;
    }

    public function get_slug()
    {
        return $this->slug;
    }

    public function set_value($value)
    {
        $this->value = $value;
    }

    public function get_value()
    {
        return $this->value;
    }

    public function set_name($name)
    {
        $this->name = $name;
    }

    public function get_name()
    {
        return $this->name;
    }

    public function get_id()
    {
        return $this->id;
    }

    public function set_id($id)
    {
        $this->id = $id;
    }

}


?>
