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
}