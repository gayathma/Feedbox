<?php

class Locations_service extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function get_location_by_id($id) {

        $query = $this->db->get_where('fb_locations', array('id' => $id, 'is_deleted' => '0'));
        return $query->row();
    }

    public function save_location($location_model){
        return $this->db->insert('fb_locations', $location_model);
    }

    public function get_locations()
    {
        $res = $this->db->get_where(
            'fb_locations',
            array('is_published' => '1', 'is_deleted' => '0')
        );
        return $res->result();
    }

    function delete_location($id) {
        $data = array('is_deleted' => '1');
        $this->db->where('id', $id);
        return $this->db->update('fb_locations', $data);
    }

    function update_location($location_model) {

        $data = array('name' => $location_model->get_name(),
                      'type' => $location_model->get_type(),
                      'updated_date' => $location_model->get_updated_date(),
        );

        $this->db->where('id', $location_model->get_id());
        return $this->db->update('fb_locations', $data);
    }

}


?>
