<?php

class Patients_service extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }

    public function get_patient_by_number($patient_number)
    {
        $res = $this->db->get_where(
            'fb_patients',
            array('is_deleted' => '0' ,'patient_number' => $patient_number)
        );
        return $res->row();
    }

}


?>
