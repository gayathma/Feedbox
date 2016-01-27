<?php

class Patients_service extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
    
    
    public function save_patient_details($patients_model){
        $this->db->insert('fb_patients', $patients_model);
        return $this->db->insert_id();
    }

    public function get_patient_by_number($patient_number)
    {
        $res = $this->db->get_where(
            'fb_patients',
            array('is_deleted' => '0' ,'patient_number' => $patient_number)
        );
        return $res->row();
    }

    public function update_patient_details($patients_model){

        $data = array(
            'patient_name' => $patients_model->get_patient_name(),
            'patient_contact_no' => $patients_model->get_patient_contact_no(),
            'patient_email' => $patients_model->get_patient_email(),
            'patient_admission_date' => $patients_model->get_patient_admission_date(),
            'patient_discharge_date' => $patients_model->get_patient_discharge_date(),
            'updated_date' => $patients_model->get_updated_date()
        );

        $this->db->where('id', $patients_model->get_id());
        return $this->db->update('fb_patients', $data);

    }


}


?>
