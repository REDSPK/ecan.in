<?php
class Member_model extends CI_Model
{
	
	function validate()
	{
		$this->db->where('username',$this->input->post('username'));
		$this->db->where('password',md5($this->input->post('password')));
		$query =$this->db->get('member');

		if($query->num_rows==1)
		{
			return true;
		}

	}
	function create_member(){
		$new_member = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email_address' => $this->input->post('email_address'),
			'company_telephone' => $this->input->post('company_telephone'),
			'direct_telephone' => $this->input->post('direct_telephone'),
			'company_fax' => $this->input->post('company_fax'),
			'company_name' => $this->input->post('company_name'),
			'company_street_address' => $this->input->post('company_street_address'),
			'company_address_line2' => $this->input->post('company_address_line2'),
			'company_city' => $this->input->post('company_city'),
			'company_state' => $this->input->post('company_state'),
			'company_zip_code' => $this->input->post('company_zip_code'),
			'company_website' => $this->input->post('company_website'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password'))
		 );
		$insert=$this->db->insert('member',$new_member);
		return $insert;
	}

	function check_username_data(){
		$this->db->where('username',$this->input->post('username'));
		$query =$this->db->get('member');
			return $query->num_rows;
	}
}
?>