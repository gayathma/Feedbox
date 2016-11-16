<?php

class Settings_service extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function get_all_settings() {

        $this->db->select('fb_settings.*');
        $this->db->from('fb_settings');
        $query = $this->db->get();
        return $query->result();
    }

    function get_settings_by_slug($slug) {

        $query = $this->db->get_where('fb_settings', array('slug' => $slug));
        return $query->row();
    }

    function update_settings($settings_model) {

        $data = array(
            'value' => $settings_model->get_value()
        );

        $this->db->where('slug', $settings_model->get_slug());
        return $this->db->update('fb_settings', $data);
    }

}


?>
