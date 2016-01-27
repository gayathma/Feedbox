<?php

class Questionnaire_service extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }


    public function get_questionnaires()
    {
        $res = $this->db->get_where(
            'fb_questionnaire',
            array('is_deleted' => '0')
        );
        return $res->result();
    }

    public function get_questionnaire_by_id($id)
    {
        $res = $this->db->get_where(
            'fb_questionnaire',
            array('is_deleted' => '0', 'id' => $id)
        );
        return $res->row();
    }

    public function get_latest_questionnaire()
    {
        $this->db->select('*');
        $this->db->from('fb_questionnaire');
        $this->db->where('is_deleted', '0');
        $this->db->order_by('id','desc');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row();
    }


}


?>
