<?php

/**
 * Description of template
 *
 * @author FAIZAN ALI
 */
class Template extends CI_Controller {
   function __construct() {
        parent::__construct();
        $this->is_logeed_in();
   }
    
   function is_logeed_in(){
        $is_logged_in=$this->session->userdata('is_logged_in');
        if(!isset($is_logged_in) || $is_logged_in!=true){
            $data['message'] = 'you dont have permission to this Area.';
            $data['main_content']='mail_error';
            $this->load->view('includes/template',$data);
        }
    }
    
    public function post_email(){
        $this->load->model('template_model');
        $loan_no = $this->input->post('loan_number');
        $date =	$this->input->post('date');
        $limit = $this->input->post('num_of_mails');
        $subject="";
        $username = $this->session->userdata('username');
        $this->load->model('member_model');
        $this->load->model('template_model');
        $name=$this->member_model->get_member_name($username);
        $signature=$this->member_model->get_signature($username);
        $contacts = $this->template_model->get_contacts_new($limit);
        $num_of_credits = $this->template_model->getNumberOfCredits($this->input->post('escalation_level'));
        $requiredCredits = $num_of_credits*$limit;
        $userCredits = $this->member_model->getUserCredits($username);
        $consumedCredits = 0;
        if($userCredits < $requiredCredits) {
            $this->output->set_content_type(JSON_CONTENT_TYPE)->
            set_output(json_encode(array('msg'=>"you dont have required credits you require atleast $requiredCredits to send this mail. consider limiting your blast size",'code'=>NOT_ENOUGH_CREDITS_CODE)));
        }
        if($contacts) {
            foreach ($contacts as $contact) 
            {
                $template = $this->template_model->selectTemplate($contact,$name,$signature,$loan_no);
                if($this->input->post('date'))
                {
                    $subject ="SALE DATE: ".$this->input->post('date')." - ";
                }
                $subject=$subject.$this->input->post('subject')." - LN#:".$this->input->post('loan_number')."-".$this->input->post('client_name');
                $element = array(
                'template' => $template,
                'subject' => $subject,
                'loan_no' => $loan_no,
                'username' => $username,
                'receiver_id' => $contact['id'],
                'credits_consumed' => $num_of_credits
                    );
                $this->template_model->save_history($element);
                $this->member_model->deductUserCredits($username,$num_of_credits);
                $consumedCredits += $num_of_credits;
            }
            $this->member_model->add_credits_consumed($consumedCredits);
            $this->output->set_content_type(JSON_CONTENT_TYPE)->
            set_output(json_encode(array('msg'=>"Your Blast have been posted",'code'=>SUCCESS_CODE,'credits_consumed'=>$consumedCredits)));
        }
        else {
            $this->output->set_content_type(JSON_CONTENT_TYPE)->
            set_output(json_encode(array('msg'=>"Ooops.. No contact with this criteria found",'code'=>NO_CONTACT_CODE)));
        }
    }
    
    function have_required_credits($num_of_credits,$limit){
        $this->load->model('template_model');
        $this->load->model('member_model');
        $username = $this->session->userdata('username');
        $requiredCredits = $this->template_model->getNumberOfCredits($num_of_credits);
        $userCredits = $this->member_model->getUserCredits($username);
        
        if($userCredits < $requiredCredits) {            
            $this->output->set_content_type(JSON_CONTENT_TYPE)->set_output(json_encode(array('required'=>$requiredCredits,'have'=>$userCredits,'code'=>1)));
        }
        else {
            $this->output->set_content_type(JSON_CONTENT_TYPE)->set_output(json_encode(array('required'=>$requiredCredits,'have'=>$userCredits,'code'=>0)));
        }
    }
    
    function getCredits($escalationLevel,$limit) {
        $this->load->model('template_model');
        $this->load->model('member_model');
        $username = $this->session->userdata('username');
//        $escalationLevel = $this->input->get('num_of_credits');
//        $limit = $this->input->get('limit');
        $requiredCredits = $this->template_model->getNumberOfCredits($escalationLevel)*$limit;
        $userCredits = $this->member_model->getUserCredits($username);
        if($userCredits < $requiredCredits) {            
            $this->output->set_content_type(JSON_CONTENT_TYPE)->set_output(json_encode(array('required'=>$requiredCredits,'have'=>$userCredits)));
        }
        else {
            $this->output->set_content_type(JSON_CONTENT_TYPE)->set_output(json_encode(array('required'=>$requiredCredits,'have'=>$userCredits)));
        }
    }
    
}

?>
