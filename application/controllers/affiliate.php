<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of affiliate
 *
 * @author Faizan
 */
class affiliate extends CI_Controller {
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('member_model');
    }
    
    function home()
    {
        $user = $this->session->userdata('user');
        $data['user'] = $user;
        $data['record'] = $this->member_model->getAffiliatesUser($user['id']);
        $data['main_content']='affiliate_home';
        $this->load->view('includes/template',$data);
    }
    
    function generate_referal_code()
    {
        $user = $this->session->userdata('user');
        $data['user'] = $user;
        $data['main_content'] = 'affiliate_generate_referal_code';
        $this->load->view('includes/template',$data);
    }
    
    function do_generate_referal_code()
    {
        $user = $this->session->userdata('user');
        $code = $this->input->post('code');
        $credits = $this->input->post('num_points');
        $codeExist = $this->member_model->getCodeStatus($code);
        $retunDict = array();
        if(!$codeExist)
        {
            $this->member_model->generateCode($code,$credits,$user['id']);
            $retunDict[CODE] = SUCCESS_CODE;
            $retunDict[MSG] = "Code Created successfully";
            $this->output->set_content_type(JSON_CONTENT_TYPE)->set_output(json_encode($retunDict));
        }
        else
        {
            $retunDict[CODE] = CODE_ALREADY_EXIST_CODE;
            $retunDict[MSG] = "This code already exist" ;
            $this->output->set_content_type(JSON_CONTENT_TYPE)->set_output(json_encode($retunDict));
        }
    }
    
    function my_referal_codes()
    {
        $user = $this->session->userdata('user');
        $codes = $this->member_model->getMyReferalCodes($user['id']);
        $data['codes'] = $codes;
        $data['main_content'] = 'affilifate_referal_codes';
        $this->load->view('includes/template',$data);
    }
}

?>
