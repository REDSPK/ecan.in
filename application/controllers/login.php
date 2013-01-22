<?php 
class Login extends CI_Controller {

	function index(){
		$data['main_content']='login_form';
		$this->load->view('includes/template',$data);
	}

	function validate_cradentials(){
		$this->load->model('member_model');
		$query= $this->member_model->validate();
		if($query){
				$data = array(
					'username' => $this->input->post('username'),
					'is_logged_in' => true );
				$this->session->set_userdata($data);
				redirect('site/member_area');
		}
		else{
			$this->index();
		}
	}

	function signup(){
		$data['main_content']='signup_form';
		$this->load->view('includes/template',$data);
	}

	function create_member(){
		$this->form_validation->set_rules('first_name','First Name','trim|required');
		$this->form_validation->set_rules('last_name','Last Name','trim|required');
		$this->form_validation->set_rules('email_address','Email Address','trim|required|valid_email|is_unique[member.email_address]');
		/*Company validation*/
		$this->form_validation->set_rules('company_telephone','Company Telephone','trim|required');
		$this->form_validation->set_rules('direct_telephone','Direct Telephone','trim|required');
		$this->form_validation->set_rules('company_fax','Company Fax','trim|required');
		$this->form_validation->set_rules('company_name','Company Name','trim|required');
		$this->form_validation->set_rules('company_street_address','Company Street Address','trim|required');
		$this->form_validation->set_rules('company_address_line2','Company Address Line 2','trim|required');
		$this->form_validation->set_rules('company_city','Company City','trim|required');
		$this->form_validation->set_rules('company_state','Company State','trim|required');
		$this->form_validation->set_rules('company_zip_code','Company Zip Code','trim|required');
		$this->form_validation->set_rules('company_website','Company Website','trim|required');

		$this->form_validation->set_rules('username','Username','trim|required|min_length[4]|is_unique[member.username]');
		$this->form_validation->set_rules('password','Password','|trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('password2','Password Confirm','trim|required|matches[password]');
		if($this->form_validation->run()==FALSE){
			$this->signup();
		}
		else{
			$this->load->model('member_model');
			if($this->member_model->create_member()){
				$data['main_content']='signup_succesful';
				$this->load->view('includes/template',$data);
			}
			else{
				$this->load->view('signup_form');
			}
  		}
	}
	function check_username(){
		if ($this->input->post('username')==NULL)
			echo "choose Username";
		else if(strlen($this->input->post('username'))<=6)
			echo "username Too short";
		else
		{
			$this->load->model('member_model');
			$num=$this->member_model->check_username_data();
			if($num==0)
			{
				echo "Username Available!";
			}
			else if($num==1){
				echo "Username Not Available!";
			}
		}
	}
}
?>