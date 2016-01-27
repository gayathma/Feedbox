<?php

class Patients_feeds_service extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
    
    
    public function save_patient_feed($patients_feed_model){
        $this->db->insert('fb_patients_feeds', $patients_feed_model);
        return $this->db->affected_rows();
    }
    
}


?>
