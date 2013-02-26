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
		$q=$this->db->distinct('type');
		$temp=$q->get('contacts')->result();
		foreach ($temp as $key => $value) {
			$data[$value->type]=$value->type;
		}
		return $data;
	}
	function get_level(){
		$q=$this->db->distinct('level');
		$temp=$q->get('contacts')->result();
		foreach ($temp as $key => $value) {
			$data[$value->level]=$value->level;
		}
		return $data;
	}
	function get_companies(){
		$q=$this->db->distinct('company');
		$temp=$q->get('contacts')->result();
		foreach ($temp as $key => $value) {
			$data[$value->company]=$value->company;
		}
		return $data;
	}
	function get_departments(){

		$q=$this->db->distinct('department');
		$temp=$q->get('contacts')->result();
		foreach ($temp as $key => $value) {
			$data[$value->department]=$value->department;
		}
		return $data;
	}
	function get_sections(){

		$q=$this->db->distinct('section');
		$temp=$q->get('contacts')->result();
		foreach ($temp as $key => $value) {
			$data[$value->section]=$value->section;
		}
		return $data;
	}
        function my_history_rows($username) {
            $q = $this->db->query("select Count(0) as num_rows
                                    from contact_new 
                                    inner join  companies c on contact_new.company_id = c.id 
                                    inner join history on contact_new.id = history.receiver_email 
                                    inner join escalation_level on contact_new.escalation_level_id = escalation_level.id
                                    inner join departments on contact_new.departmend_id = departments.id
                                    where username = '$username'")->result();
            return $q[0]->num_rows;
        }
	function my_history_details($username,$start,$end){
            if(!isset($start) || !$start){
                $start = 0;
            }
            $q = $this->db->query("select first_name,suffix,last_name,email,job_title,company_name,`subject`,template,date,username,escalation_level,department_name
                                    from contact_new 
                                    inner join  companies c on contact_new.company_id = c.id 
                                    inner join history on contact_new.id = history.receiver_email 
                                    inner join escalation_level on contact_new.escalation_level_id = escalation_level.id
                                    inner join departments on contact_new.departmend_id = departments.id
                                    where username = '$username' LIMIT $start,$end");
            $data=array();
            foreach ($q->result() as $history) {
                $data[] = $history;
            }
            return $data;
	}
        
	function admin_history_details($start,$end){
            if(!isset($start) || !$start){
                $start = 0;
            }
            $q = $this->db->query("select first_name,suffix,last_name,email,job_title,company_name,`subject`,template,date,username,escalation_level,department_name
                                    from contact_new 
                                    inner join  companies c on contact_new.company_id = c.id 
                                    inner join history on contact_new.id = history.receiver_email 
                                    inner join escalation_level on contact_new.escalation_level_id = escalation_level.id
                                    inner join departments on contact_new.departmend_id = departments.id
                                    LIMIT $start,$end");
            $data=array();
            foreach ($q->result() as $history) {
                $data[] = $history;
            }
            return $data;
	}
}