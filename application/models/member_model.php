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
		$this->db->insert('member',$new_member);
		return mysql_insert_id();
	}
	function confirm_registration ($register_code)    {
			$this->db->where('activationcode',$register_code);
			$query =$this->db->get('member');

			if($query->num_rows==1)
			{
				$data = array(
               			'activated' => 1
            	);

				$this->db->where('activationcode',$register_code);
				$this->db->update('member', $data);
            	return TRUE;
            }
            else {
                return FALSE;
            }
            
        } 
    function generate_activation($id){
		$password=$this->get_random_password(10,12, true,true,false);
		$data = array(
               'activationcode' => $password
            );

		$this->db->where('id', $id);
		$this->db->update('member', $data);
		return $password;
	}
	function recover_email_password(){
		$password=$this->get_random_password(6,8, false,true,false);
		$data = array(
               'password' => md5($password)
            );

		$this->db->where('email_address', $this->input->post('email'));
		$this->db->update('member', $data);

		$q=$this->db->select('username,email_address')
				->from('member')
				->where('email_address',$this->input->post('email'));
		$temp=$q->get()->result();
		$ret['username']=$temp[0]->username;
		$ret['password']=$password;
		$ret['email_address']=$temp[0]->email_address;

		return $ret;
	}

	function check_username_data(){
		$this->db->where('username',$this->input->post('username'));
		$query =$this->db->get('member');
			return $query->num_rows;
	}
	function check_email_data(){
		$this->db->where('email_address',$this->input->post('email'));
		$query =$this->db->get('member');
			return $query->num_rows;
	}
	function get_random_password($chars_min=6, $chars_max=8, $use_upper_case=false, $include_numbers=false, $include_special_chars=false)
    {
        $length = rand($chars_min, $chars_max);
        $selection = 'aeuoyibcdfghjklmnpqrstvwxz';
        if($include_numbers) {
            $selection .= "1234567890";
        }
        if($include_special_chars) {
            $selection .= "!@04f7c318ad0360bd7b04c980f950833f11c0b1d1quot;#$%&[]{}?|";
        }
                                
        $password = "";
        for($i=0; $i<$length; $i++) {
            $current_letter = $use_upper_case ? (rand(0,1) ? strtoupper($selection[(rand() % strlen($selection))]) : $selection[(rand() % strlen($selection))]) : $selection[(rand() % strlen($selection))];            
            $password .=  $current_letter;
        }                
        
        return $password;
    }
}
?>