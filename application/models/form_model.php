<?php
/**
* 
*/
class Form_model extends CI_model
{
	
	function __construct()
	{
            parent::__construct();
	}

	function get_loan_types(){
            $q=$this->db->select('loan_type');
            $temp=$q->get('loan_type')->result();
            foreach ($temp as $key => $value) {
                    $data[$value->loan_type]=$value->loan_type;
            }
            return $data;
	}
        
	function get_level(){
            $q=$this->db->select('id,title');
            $temp=$q->get('level')->result();
            foreach ($temp as $key => $value) {
                    $data[$value->id]=$value->title;
            }
            return $data;
	}
        
        function getCompanies() {
            $query = $this->db->query('SELECT DISTINCT company from contacts');
            return $query->result();
        }
}