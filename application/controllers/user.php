<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author FAIZAN ALI
 */
class User extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    function edit_profile()
    {
        if($this->session->userdata('is_logged_in'))
        {
            $this->load->model('member_model');
            $data['member']=$this->member_model->get_member($this->session->userdata('username'));
            $data['main_content']='edit_form';
            $this->load->view('includes/template',$data);
        }
    }
    
    function is_logeed_in()
    {
        $is_logged_in=$this->session->userdata('is_logged_in');
        if(!isset($is_logged_in) || $is_logged_in!=true)
        {
            $data['message'] = 'you dont have permission to this Area.';
            $data['main_content']='mail_error';
            $this->load->view('includes/template',$data);
        }
    }
    
    function save_profile()
    {
        $this->form_validation->set_rules('first_name','First Name','trim|required');
        $this->form_validation->set_rules('last_name','Last Name','trim|required');
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
        if($this->form_validation->run()==FALSE){
            $this->index();
        }
        else
        {
            $this->load->model('member_model');
            if($this->session->userdata('is_logged_in'))
            {
                if($this->member_model->save_profile_data($this->session->userdata('username')))
                {
                    $data['message']="your profile is updated";
                    $data['main_content']='message_page';
                    $this->load->view('includes/template',$data);
                }
                else
                {
                    $data['message']='data not updated';
                    $data['main_content']='message_page';
                    $this->load->view('includes/template',$data);
                }
            }
            else
            {
                $data['message']= 'your session not exist.please login again';
                $data['main_content']='message_page';
                $this->load->view('includes/template',$data);
            }	
        }
    }
    
    function change_password()
    {
        $data['main_content']='password_form';
        $this->load->view('includes/template',$data);
    }
    
    function save_password()
    {
        $this->form_validation->set_rules('old_password','Old Password','trim|required');
        $this->form_validation->set_rules('new_password','New Password','trim|required|min_length[4]|max_length[32]');
        $this->form_validation->set_rules('new_password_confirm','New Password Confirm','trim|required|matches[new_password]');
        if($this->form_validation->run() == FALSE)
        {
            $this->change_password();
        }
        else
        {
            $this->load->model('member_model');
            if($this->member_model->change_password($this->session->userdata('username')))
            {
                $data['message']="your password is updated";
                $data['main_content']='message_page';
                $this->load->view('includes/template',$data);
            }
            else
            {
                $data['message']="your old password is wrong";
                $data['main_content']='message_page';
                $this->load->view('includes/template',$data);
            }
        }
    }
}

?>
