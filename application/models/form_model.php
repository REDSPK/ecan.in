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

            $q = $this->db->query("select first_name,suffix,credits_consumed,last_name,email,job_title,company_name,loan_no,`subject`,template,date,username,escalation_level,department_name
                                    from contact_new 
                                    inner join  companies c on contact_new.company_id = c.id 
                                    inner join history on contact_new.id = history.receiver_email 
                                    inner join escalation_level on contact_new.escalation_level_id = escalation_level.id
                                    inner join departments on contact_new.departmend_id = departments.id
                                    where username = '$username'
                                    ORDER BY date DESC
                                    LIMIT $start,$end");
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
            $q = $this->db->query("select history.id,first_name,middle_name,suffix,credits_consumed,last_name,email,job_title,company_name,loan_no,`subject`,template,date,username,escalation_level,department_name
                                    from contact_new 
                                    inner join  companies c on contact_new.company_id = c.id 
                                    inner join history on contact_new.id = history.receiver_email 
                                    inner join escalation_level on contact_new.escalation_level_id = escalation_level.id
                                    inner join departments on contact_new.departmend_id = departments.id
                                    ORDER BY date DESC
                                    LIMIT $start,$end");
            $data=array();
            foreach ($q->result() as $history) {
                $data[] = $history;
            }
            return $data;
	}
    function admin_history_rows(){
            $q = $this->db->query("select Count(0) as num_rows
                                    from contact_new 
                                    inner join  companies c on contact_new.company_id = c.id 
                                    inner join history on contact_new.id = history.receiver_email 
                                    inner join escalation_level on contact_new.escalation_level_id = escalation_level.id
                                    inner join departments on contact_new.departmend_id = departments.id")->result();
            return $q[0]->num_rows;
    }

	/*--------------------serch queries for history--------------------------*/
	function get_companies_name(){
		$q=$this->db->distinct('company')
			->get('companies')->result();
		
		 $ret = array('' =>'');
		  	foreach ($q as $value) {
		  		$ret[$value->company_name]=$value->company_name;
		  	}
		  return $ret;
	}
	function search_my_history_rows($username,$param){
            
                if(isset($param['company_name']) && $param['company_name'] !='' && $param['loan_no'] == '') {
                    $companyName = $param['company_name'];
                    $whereClause = "company_name = '$companyName' ";
                }
                else if(isset($param['loan_no']) && $param['loan_no'] !='' && $param['company_name'] == ''){
                    $loanNumber = $param['loan_no'];
                    $whereClause = "loan_no = '$loanNumber'";
                }
                else if(isset($param['loan_no']) && $param['loan_no'] != '' && $param['company_name'] != '' && isset($param['company_name'])){
                    $companyName = $param['company_name'];
                    $loanNumber = $param['loan_no'];
                    $whereClause = "loan_no = '$loanNumber' AND company_name = '$companyName'";
                }
                
                $company_name = (isset($param['company_name']) && !empty($param['company_name']) ? " AND company_name = '$param[company_name]'" : '');
        	$username = (isset($param['username']) && !empty($param['username']) ? " AND username = '$param[username]'" : '');
        	$loan_no=mysql_real_escape_string($param['loan_no']);
                $q = $this->db->query("select Count(0) as num_rows
                                from contact_new 
                                inner join  companies c on contact_new.company_id = c.id 
                                inner join history on contact_new.id = history.receiver_email 
                                inner join escalation_level on contact_new.escalation_level_id = escalation_level.id
                                inner join departments on contact_new.departmend_id = departments.id
                                WHERE  $whereClause")->result();
    		return $q[0]->num_rows;
	}
	function search_my_history_details($username,$start = 0,$end,$param){
            
             if(isset($param['company_name']) && $param['company_name'] !='' && $param['loan_no'] == '') {
                    $companyName = $param['company_name'];
                    $whereClause = "company_name = '$companyName' ";
                }
                else if(isset($param['loan_no']) && $param['loan_no'] !='' && $param['company_name'] == ''){
                    $loanNumber = $param['loan_no'];
                    $whereClause = "loan_no = '$loanNumber'";
                }
                else if(isset($param['loan_no']) && $param['loan_no'] != '' && $param['company_name'] != '' && isset($param['company_name'])){
                    $companyName = $param['company_name'];
                    $loanNumber = $param['loan_no'];
                    $whereClause = "loan_no = '$loanNumber' AND company_name = '$companyName'";
                }
                if(!isset($start) || !$start){
                    $start = 0;
                }
                $q = $this->db->query("select first_name,credits_consumed,middle_name,suffix,last_name,email,job_title,company_name,loan_no,`subject`,template,date,username,escalation_level,department_name
                                    from contact_new 
                                    inner join  companies c on contact_new.company_id = c.id 
                                    inner join history on contact_new.id = history.receiver_email 
                                    inner join escalation_level on contact_new.escalation_level_id = escalation_level.id
                                    inner join departments on contact_new.departmend_id = departments.id
                                    where $whereClause
                                    ORDER BY date DESC
                                    LIMIT $start,$end")->result();
                
                $data=array();
                foreach ($q as $history) {
                    $data[] = $history;
                }
                return $data;
	}
	function search_admin_history_details($start,$end,$param){
            if(!isset($start) || !$start){
                $start = 0;
            }
            
            if(isset($param['user_name']) && $param['user_name'] !='' && $param['loan_no'] == '') {
                    $companyName = $param['user_name'];
                    $whereClause = "username = '$companyName' ";
            }
            else if(isset($param['loan_no']) && $param['loan_no'] !='' && $param['user_name'] == ''){
                $loanNumber = $param['loan_no'];
                $whereClause = "loan_no = '$loanNumber'";
            }
            else if(isset($param['loan_no']) && $param['loan_no'] != '' && $param['user_name'] != '' && isset($param['user_name'])){
                $companyName = $param['user_name'];
                $loanNumber = $param['loan_no'];
                $whereClause = "loan_no = '$loanNumber' AND username = '$companyName'";
            }
            
            $q = $this->db->query("select first_name,suffix,last_name,middle_name,credits_consumed,email,job_title,company_name,loan_no,`subject`,template,date,username,escalation_level,department_name
                                    from contact_new 
                                    inner join  companies c on contact_new.company_id = c.id 
                                    inner join history on contact_new.id = history.receiver_email 
                                    inner join escalation_level on contact_new.escalation_level_id = escalation_level.id
                                    inner join departments on contact_new.departmend_id = departments.id
                                    WHERE  $whereClause
                                    ORDER BY date DESC
                                    LIMIT $start,$end")->result();
            
            $data=array();
            foreach ($q as $history) {
                $data[] = $history;
            }
            return $data;
	}
        
	function search_num_rows($param){
                
                if(isset($param['user_name']) && $param['user_name'] != '' && $param['loan_no'] == '') {
                    $companyName = $param['user_name'];
                    $whereClause = "username = '$companyName' ";
                }
                else if(isset($param['loan_no']) && $param['loan_no'] !='' && $param['user_name'] == ''){
                    $loanNumber = $param['loan_no'];
                    $whereClause = "loan_no = '$loanNumber'";
                }
                else if(isset($param['loan_no']) && $param['loan_no'] != '' && $param['user_name'] != '' && isset($param['user_name'])){
                    $companyName = $param['user_name'];
                    $loanNumber = $param['loan_no'];
                    $whereClause = "loan_no = '$loanNumber' AND username = '$companyName'";
                }
                
       		 $q = $this->db->query("select Count(0) as num_rows
                                from contact_new 
                                inner join  companies c on contact_new.company_id = c.id 
                                inner join history on contact_new.id = history.receiver_email 
                                inner join escalation_level on contact_new.escalation_level_id = escalation_level.id
                                inner join departments on contact_new.departmend_id = departments.id
                                WHERE  $whereClause")->result();
    		return $q[0]->num_rows;
	}
}