<?php 
class Login extends CI_Controller {

	function __construct() {
        parent::__construct();
    }

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
	function recover_password(){
		$data['main_content']='recover_password';
		$this->load->view('includes/template',$data);
	}

	function send() {
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');

        if ($this->form_validation->run() == FALSE) 
        {
            $data['main_content']='recover_password';
            $this->load->view('includes/template',$data);
        } 
        else 
        {
			$this->load->model('member_model');
			$num=$this->member_model->check_email_data();
				if($num==0)
				{
					$data['message'] = "your email is not in our Database";
					$data['main_content']='mail_error';
            		$this->load->view('includes/template',$data);
				}
				else if($num==1)
				{
					$result= $this->member_model->recover_email_password();
					$username=$result['username'];
					$email=$result['email_address'];
					$password=$result['password'];
		        	$config = array(
		        		'protocol' => 'smtp',
						'smtp_host' => 'localhost',
						'smtp_port' => '465',
						'smtp_host' => 'ssl://smtp.googlemail.com',
						'smtp_user' => 'sender Email',/*place sender Email here*/
						'smtp_pass' => 'sender pass',/*place sender Email password here*/
						'charset' => 'iso-8859-1',
						'wordwrap' => TRUE,
						'mailtype' => 'html');

		            $this->load->library('email');
		            $this->email->initialize($config);
		            $this->email->set_newline("\r\n"); //set the new line rule 
		            $this->email->from('senser email', 'sender name');
		            $this->email->to($email);

		            $this->email->subject('Your Recovered Password');
		            $this->email->message("your username is <strong><i>" . $username . "</i></strong><br> and password <strong><i>" .$password."</i></strong>");

		            if ($this->email->send()) {
		                $data['message'] = "check your inbox for password";
		                $data['main_content']='mail_error';
            			$this->load->view('includes/template',$data);
		            } else {
		                $data['message'] = "Mail Not sent please check your internet"."<br>".$this->email->print_debugger();
		                $data['main_content']='mail_error';
            			$this->load->view('includes/template',$data);
		               // show_errors($this->email->print_debugger());
		            }
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