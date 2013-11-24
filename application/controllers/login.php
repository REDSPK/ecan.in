<?php 
class Login extends CI_Controller {

    function __construct() 
    {
        parent::__construct();
    }
    
    function index()
    {
            $data['main_content']='login_form';
            $this->load->view('includes/template',$data);
    }

    function validate_cradentials()
    {
        $this->load->model('member_model');
        $query= $this->member_model->validate();
        if($query==END_USER_LOGGED_IN){
            $data = array(
                'username' => $this->input->post('username'),
                'is_logged_in' => true,
                'admin'=>FALSE,
                'employee' =>FALSE
                );
            $this->session->set_userdata($data);
            redirect('site/member_area');
        }
        else if($query==ACCOUNT_NOT_ACTIVATED)
        {
            $data['message']='Your Account is not activated.Please activate through the link we had sent you.';
            $data['main_content']='resend_activation';
            $data['username']=$this->input->post('username');
            $this->load->view('includes/template',$data);
        }
        else if($query == INVALID_USERNAME_PASSWORD)
        {
            $data['message']='Your username or password may wrong.';
            $data['main_content']='mail_error';
            $this->load->view('includes/template',$data);
        }
        else if($query == ADMIN_USER_LOGGED_IN)
        {
            $data = array(
                'username' => $this->input->post('username'),
                'is_logged_in' => true,
                'admin'=>true,
                'employee' =>FALSE
                );
            $this->session->set_userdata($data);
            redirect('admin/admin_area');
        }
        else if ($query == EMPLOYEE_LOGGED_IN) 
        {
            $data = array(
                'username' => $this->input->post('username'),
                'is_logged_in' => true,
                'admin'=>False,
                'employee' =>true    
                );
            $this->session->set_userdata($data);
            redirect('admin/admin_area');
        }
        else if ($query == AFFILIATE_LOGGED_IN)
        {
            $username = $this->input->post('username');
            $user = $this->member_model->get_member($username);
            $data = array(
                'username' => $username,
                'is_logged_in' => true,
                'admin'=>False,
                'employee' =>FALSE,
                'affiliate' => True,
                'user' => $user
                );
            $this->session->set_userdata($data);
            redirect('affiliate/home');
        }
        else
        {
            $this->index();
        }
    }

    function signup()
    {
        $data['main_content']='signup_form';
        $this->load->view('includes/template',$data);
    }

    function create_member()
    {
        $this->load->helper('security');
        $this->form_validation->set_rules('first_name','First Name','trim|required|man_length[25]|xss_clean');
        $this->form_validation->set_rules('last_name','Last Name','trim|required|man_length[25]|xss_clean');
        $this->form_validation->set_rules('email_address','Email Address','trim|required|valid_email|is_unique[member.email_address]');
        /*Company validation*/
        $this->form_validation->set_rules('company_telephone','Company Telephone','trim|required|man_length[25]|xss_clean');
        $this->form_validation->set_rules('direct_telephone','Direct Telephone','trim|required|man_length[25]|xss_clean');
        $this->form_validation->set_rules('company_fax','Company Fax','trim|required|man_length[25]|xss_clean');
        $this->form_validation->set_rules('company_name','Company Name','trim|required|man_length[25]|xss_clean');
        $this->form_validation->set_rules('company_street_address','Company Street Address','trim|required|man_length[25]|xss_clean');
        $this->form_validation->set_rules('company_address_line2','Company Address Line 2','trim|required|man_length[25]|xss_clean');
        $this->form_validation->set_rules('company_city','Company City','trim|required|man_length[25]|xss_clean');
        $this->form_validation->set_rules('company_state','Company State','trim|required|man_length[25]|xss_clean');
        $this->form_validation->set_rules('company_zip_code','Company Zip Code','trim|required|man_length[25]|xss_clean');
        $this->form_validation->set_rules('company_website','Company Website','trim|required|man_length[25]|xss_clean');
        $this->form_validation->set_rules('username','Username','trim|required|min_length[4]|man_length[15]|is_unique[member.username]|xss_clean|alpha_numeric');
        $this->form_validation->set_rules('password','Password','|trim|required|min_length[4]|max_length[32]');
        $this->form_validation->set_rules('password2','Password Confirm','trim|required|matches[password]');
        if($this->form_validation->run()==FALSE)
        {
            $this->signup();
        }
        else
        {
            $this->load->model('member_model');
            
            $id = $this->member_model->create_member();
            
            if($id == -1)
            {
                $data['message'] = "The code has expired or does not exist";
                $data['main_content']='mail_error';
                $this->load->view('includes/template',$data);
            }
            else
            {
                $activation_code = $this->member_model->generate_activation($id);
                $subject='Ecan.in account activation link';
                $success_message="check your inbox for activate your account";
                $message='Click the link below to activate your account' . anchor('http://ecan.in/login/account_activation/' . $activation_code,'Confirmation Register');
                $email=$this->input->post('email_address');
                $this->sendemail($subject,$message,$success_message,$email);
            }
        }
    }
    
    function resend_activation_link()
    {
        $this->load->model('member_model');
        $credentials= $this->member_model->get_activation_code($this->uri->segment(3));
        $subject='Ecan.in account activation link';
        $success_message="check your inbox for activate your account";
        $message='Click the link below to activate your account' . anchor('http://ecan.in/login/account_activation/' . $credentials['activationcode'],'Confirmation Register');
        $email=$credentials['email'];
        $this->sendemail($subject,$message,$success_message,$email);
    }
    function recover_password()
    {
        $data['main_content']='recover_password';
        $this->load->view('includes/template',$data);
    }
    function account_activation() 
    {
        $this->load->model('member_model');
        $register_code = $this->uri->segment(3);
        if ($register_code == '')
        {
            $data['message'] ='error no registration code in URL';
            $data['main_content']='mail_error';
            $this->load->view('includes/template',$data);
        }
        $reg_confirm = $this->member_model->confirm_registration($register_code);
        if($reg_confirm)
        {
            $data['message'] ='Your account is activated';
            $data['main_content']='mail_error';
            $this->load->view('includes/template',$data);
        }
        else 
        {
            $data['message'] ='Error to activate account';
            $data['main_content']='mail_error';
            $this->load->view('includes/template',$data);
        }

    } 
    function send() 
    {
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
            if($num == 0)
            {
                $data['message'] = "your email is not in our Database";
                $data['main_content']='signup_unsuccessful';
                $this->load->view('includes/template',$data);
            }
            else if($num == 1)
            {
                $result= $this->member_model->recover_email_password();
                $username=$result['username'];
                $email=$result['email_address'];
                $password=$result['password'];
                $subject='Your Recovered Password for Ecan.in';
                $message="your username is <strong><i>" . $username . "</i></strong><br> and password <strong><i>" .$password."</i></strong>";
                $success_message="check your inbox for password";
                $this->sendemail($subject,$message,$success_message,$email);
            }
        }
    }
    function sendemail($subject,$message,$success_message,$email)
    {

            $this->load->library('email');
            $this->email->from('info@Ecan.in', 'Ecan.in'); /*place sender Email here*/
            $this->email->to($email);
            $this->email->subject($subject);
            $this->email->message($message);

            if ($this->email->send()) 
            {
                $data['message'] = $success_message;
                $data['main_content']='mail_error';
                $this->load->view('includes/template',$data);
            } else
            {
                $data['message'] = "Mail Not sent please contact admin";
                $data['main_content']='mail_error';
                $this->load->view('includes/template',$data);
               // show_errors($this->email->print_debugger());
            }
    }

    function check_username()
    {
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