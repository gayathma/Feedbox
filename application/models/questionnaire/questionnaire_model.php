<?php

class Questionnaire_model extends CI_Model
{

    var $id;
    var $name;
    var $type;
    var $language_type;
    var $location;
    var $thank_image;
    var $thank_text;
    var $thank_text_desc;
    var $thank_text_si;
    var $thank_text_desc_si;
    var $thank_text_ta;
    var $thank_text_desc_ta;
    var $text_colour;
    var $text_box_colour;
    var $btn_colour;
    var $btn_type;
    var $banner_colour;
    var $banner_txt_colour;
    var $welcome_image;
    var $welcome_text;
    var $welcome_text_desc;
    var $welcome_text_si;
    var $welcome_text_desc_si;
    var $welcome_text_ta;
    var $welcome_text_desc_ta;
    var $welcome_bg_colour;
    var $is_published;
    var $is_deleted;
    var $added_date;
    var $updated_date;

    function __construct()
    {
        parent::__construct();
    }

    public function set_banner_colour($banner_colour)
    {
        $this->banner_colour = $banner_colour;
    }

    public function get_banner_colour()
    {
        return $this->banner_colour;
    }

    public function set_banner_txt_colour($banner_txt_colour)
    {
        $this->banner_txt_colour = $banner_txt_colour;
    }

    public function get_banner_txt_colour()
    {
        return $this->banner_txt_colour;
    }

    public function set_btn_colour($btn_colour)
    {
        $this->btn_colour = $btn_colour;
    }

    public function get_btn_colour()
    {
        return $this->btn_colour;
    }

    public function set_btn_type($btn_type)
    {
        $this->btn_type = $btn_type;
    }

    public function get_btn_type()
    {
        return $this->btn_type;
    }

    public function set_text_box_colour($text_box_colour)
    {
        $this->text_box_colour = $text_box_colour;
    }

    public function get_text_box_colour()
    {
        return $this->text_box_colour;
    }

    public function set_text_colour($text_colour)
    {
        $this->text_colour = $text_colour;
    }

    public function get_text_colour()
    {
        return $this->text_colour;
    }

    public function set_type($type)
    {
        $this->type = $type;
    }

    public function get_type()
    {
        return $this->type;
    }

    public function get_welcome_image() {
        return $this->welcome_image;
    }

    public function set_welcome_image($welcome_image) {
        $this->welcome_image = $welcome_image;
    }

    public function get_welcome_text() {
        return $this->welcome_text;
    }

    public function set_welcome_text($welcome_text) {
        $this->welcome_text = $welcome_text;
    }

    public function get_welcome_text_desc() {
        return $this->welcome_text_desc;
    }

    public function set_welcome_text_desc($welcome_text_desc) {
        $this->welcome_text_desc = $welcome_text_desc;
    }

    public function get_welcome_text_si() {
        return $this->welcome_text_si;
    }

    public function set_welcome_text_si($welcome_text_si) {
        $this->welcome_text_si = $welcome_text_si;
    }

    public function get_welcome_text_desc_si() {
        return $this->welcome_text_desc_si;
    }

    public function set_welcome_text_desc_si($welcome_text_desc_si) {
        $this->welcome_text_desc_si = $welcome_text_desc_si;
    }

    public function get_welcome_text_ta() {
        return $this->welcome_text_ta;
    }

    public function set_welcome_text_ta($welcome_text_ta) {
        $this->welcome_text_ta = $welcome_text_ta;
    }

    public function get_welcome_text_desc_ta() {
        return $this->welcome_text_desc_ta;
    }

    public function set_welcome_text_desc_ta($welcome_text_desc_ta) {
        $this->welcome_text_desc_ta = $welcome_text_desc_ta;
    }

    public function get_welcome_bg_colour() {
        return $this->welcome_bg_colour;
    }

    public function set_welcome_bg_colour($welcome_bg_colour) {
        $this->welcome_bg_colour = $welcome_bg_colour;
    }

    public function set_thank_image($thank_image)
    {
        $this->thank_image = $thank_image;
    }

    public function get_thank_image()
    {
        return $this->thank_image;
    }

    public function set_thank_text_desc_si($thank_text_desc_si)
    {
        $this->thank_text_desc_si = $thank_text_desc_si;
    }

    public function get_thank_text_desc_si()
    {
        return $this->thank_text_desc_si;
    }

    public function set_thank_text_desc_ta($thank_text_desc_ta)
    {
        $this->thank_text_desc_ta = $thank_text_desc_ta;
    }

    public function get_thank_text_desc_ta()
    {
        return $this->thank_text_desc_ta;
    }

    public function set_thank_text_si($thank_text_si)
    {
        $this->thank_text_si = $thank_text_si;
    }

    public function get_thank_text_si()
    {
        return $this->thank_text_si;
    }

    public function set_thank_text_ta($thank_text_ta)
    {
        $this->thank_text_ta = $thank_text_ta;
    }

    public function get_thank_text_ta()
    {
        return $this->thank_text_ta;
    }

    public function set_thank_text($thank_text)
    {
        $this->thank_text = $thank_text;
    }

    public function get_thank_text()
    {
        return $this->thank_text;
    }

    public function set_thank_text_desc($thank_text_desc)
    {
        $this->thank_text_desc = $thank_text_desc;
    }

    public function get_thank_text_desc()
    {
        return $this->thank_text_desc;
    }

    public function set_language_type($language_type)
    {
        $this->language_type = $language_type;
    }

    public function get_language_type()
    {
        return $this->language_type;
    }

    public function set_location($location)
    {
        $this->location = $location;
    }

    public function get_location()
    {
        return $this->location;
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

    public function set_added_by($added_by)
    {
        $this->added_by = $added_by;
    }

    public function get_added_by()
    {
        return $this->added_by;
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
