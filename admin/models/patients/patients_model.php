<?php

class Patients_model extends CI_Model{
    
    var $id;
    var $patient_number;
    var $patient_name;
    var $patient_contact_no;
    var $patient_email;
    var $patient_admission_date;
    var $patient_discharge_date;
    var $is_deleted;
    var $added_date;
    var $updated_date;
    
    function __construct(){
        parent::__construct();
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

    public function get_patient_admission_date()
    {
        return $this->patient_admission_date;
    }

    public function set_patient_admission_date($patient_admission_date)
    {
        $this->patient_admission_date = $patient_admission_date;
    }

    public function get_patient_contact_no()
    {
        return $this->patient_contact_no;
    }

    public function set_patient_contact_no($patient_contact_no)
    {
        $this->patient_contact_no = $patient_contact_no;
    }

    public function get_patient_discharge_date()
    {
        return $this->patient_discharge_date;
    }

    public function set_patient_discharge_date($patient_discharge_date)
    {
        $this->patient_discharge_date = $patient_discharge_date;
    }

    public function get_patient_email()
    {
        return $this->patient_email;
    }

    public function set_patient_email($patient_email)
    {
        $this->patient_email = $patient_email;
    }

    public function get_patient_name()
    {
        return $this->patient_name;
    }

    public function set_patient_name($patient_name)
    {
        $this->patient_name = $patient_name;
    }

    public function get_patient_number()
    {
        return $this->patient_number;
    }

    public function set_patient_number($patient_number)
    {
        $this->patient_number = $patient_number;
    }

    public function get_updated_date()
    {
        return $this->updated_date;
    }

    public function set_updated_date($updated_date)
    {
        $this->updated_date = $updated_date;
    }

}


?>
