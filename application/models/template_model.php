<?php
/**
 * Description of template_model
 *
 * @author FAIZAN ALI
 */
class Template_model extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
    
    public function process( $text ) {
        return preg_replace_callback('/\{(((?>[^\{\}]+)|(?R))*)\}/x', array( $this, 'replace' ), $text );
    }
 
    public function replace( $text ) {
        $text = $this->process( $text[ 1 ] );
        $parts = explode( '|', $text );
        $part = $parts[ array_rand( $parts ) ];
        return $part;
    }
    
     public function selectTemplate($contact,$username,$signature,$loanNumber) {
        $this->load->model('contacts_model');
        $companyID = $this->input->post('company_id');
        $company = $this->contacts_model->getCompanyByCompanyId($companyID);
        $companyName = $company->company_name;
        $firstname = $contact['name'];
        $typeOfAssitance = $this->contacts_model->getDepartmentByID($this->input->post('department'));
        $additionalComments = $this->input->post('comment');
        $senderName = $username;
        
        $var = rand(1,2);
        if($var == 1)
        {
            $template1 = "$firstname ,<br/>
                          {We apologize to be reaching out to you like this|We are sorry to get you involved|We hope that this is something you can help us with} {at the very last minute|though there is little time for your review|at the 11th hour} {but we really had no other place to turn to|but we had few other options}. {In the past you had been a great help so|Since you had been able to be assist in the past|Previously your input ended up being invaluable and} {we didn't know if|it would be greatly appreciated if} {there was anything that could still be done|there are any options still on the table|there were still options to find a resolution to benefit all the parties involved}. We needed to bring this account to {your|someone's} attention. {We are concerned|The borrower is very worried|We have lost faith} {with how this file is being processed|with the responses we are getting|with the lack of clear communcation} and {the road that it has taken|where the file is at after the time invested|the lack of interest shown by the negotiator}.";

            //if lack of contact
            if($this->input->post('lack_of_contact'))
            $template1 .= "{We have a growing concern because we are not hearing back from anyone.|We are worried because we are seeing very limited activity.}";

            //If left messages not returned
            if($this->input->post('message_not_return'))
            $template1 .= "{We have left various messages with no responses.|A number of messages have been left for the negotiator with no response.}";

            //escalated to manager no contact 
            if($this->input->post('manager_not_contact'))
            $template1 .= "{We attempted to reach the negotiator's manager with no response in return. |We have left a message to the manager to notify them but have not heard back. }";
            //Disagree with Decission
            if($this->input->post('disagree'))
            $template1 .= "{We disagree with the decision rendered by the negotiator and would like to request another review.|The negotiator has been difficult to deal with and may have passed their decision based on their feeling towards us rather than what was best for the company, your investor and the borrower.}";

            //Decission based on inaccurate info
            if($this->input->post('inaccurate'))
            $template1 .= "{The information on which the decision was made inaccurate.|We do not agree with the decision rendered based on the fact that the information submitted was different from the results used to deny assistance.|Based on the information we submitted we don't agree that the data used to make the decision was interpreted correctly.}";

            $template1 .="<br/>";
            //if Additional comments are added place them here
            if($this->input->post('comment'))
            $template1 .= "Additionally , $additionalComments ";

            //rest of the template
            $template1 .= "{We have been attempting to move this file forward|We have done everything we can to move the file forward} but {the file has not moved forward as expected|we find ourselves in the same place|the negotiator has not taken the steps to proactively move this forward}. {Prior to reaching out to you|Before we found ourselves here trying to reach out to you|We attempted all other avenues before getting in contact with you} {we had spoken to|we spoke to|we reached out to} the $typeOfAssitance {department|area|group} and {attempted to escalate this to the negotaitor|we attempted to bring this to the negotiator's attention|we did all we could to bring attention to this file} but {file still has yet to move forward|there has been stagnation on this file we cannot get past}. {We have a complete|We have submited a complete|A complete submission of a} $typeOfAssitance {package|packet} there for some time on this file and have been doing our diligence to attempt to push this through as quickly as possible. {Is there anything that can still be done?|Is this the end of the road or can we do something here?|Given the circumstances is there anything we can do or anyone we can reach out to?} {The homeowner has really fallen into a tough situation|The homeowner has really stuggled to keep things together|The borrower is trying to manage that they can to keep this afloat|The homeowner would like to do what they can to avoid foreclsoure} and {really needs|requires|hopes that} $companyName {will to try to speak|will communicate|does what it can to transmit} to the {investor|beneficiary|party that holds the risk on the note} to {allow more time for this file to proceed|allow for this processing of this file to continue}. <br/> ";

            //template Footer
            $template1 .= " {Thank you for your time, we greatly appreciate your efforts|As we know how busy you are, we greatly appreciate any efforts you can put into this|Your time is extremely valuable to us so we greatly appreciate anything you can do|We understand the volume of work you have so anything that you could do would be great and if there is anyone that can be spoken with we would be more than glad to further explain the details}. <br/><br/>
                            {Regards|Best Regards|Best Wishes|Sincerely},<br/>
                          $senderName
                          <br/>
                          $signature
            ";
        }
        else if ($var == 2)
        {
            $template1 = "$firstname ,<br/>
                          {We apologize to be reaching out to you like this|We are sorry to get you involved|We hope that this is something you can help us with} {at the very last minute|though there is little time for your review|at the 11th hour} {but we really had no other place to turn to|but we had few other options}. {In the past you had been a great help so|Since you had been able to be assist in the past|Previously your input ended up being invaluable and} {we didn't know if|it would be greatly appreciated if} {there was anything that could still be done|there are any options still on the table|there were still options to find a resolution to benefit all the parties involved}. We needed to bring this account to {your|someone's} attention. {We are concerned|The borrower is very worried|We have lost faith} {with how this file is being processed|with the responses we are getting|with the lack of clear communcation} and {the road that it has taken|where the file is at after the time invested|the lack of interest shown by the negotiator}.";

            //if lack of contact
            if($this->input->post('lack_of_contact'))
            $template1 .= "{We have a growing concern because we are not hearing back from anyone.|We are worried because we are seeing very limited activity.}";

            //If left messages not returned
            if($this->input->post('message_not_return'))
            $template1 .= "{We have left various messages with no responses.|A number of messages have been left for the negotiator with no response.}";

            //escalated to manager no contact 
            if($this->input->post('manager_not_contact'))
            $template1 .= "{We attempted to reach the negotiator's manager with no response in return. |We have left a message to the manager to notify them but have not heard back. }";
            //Disagree with Decission
            if($this->input->post('disagree'))
            $template1 .= "{We disagree with the decision rendered by the negotiator and would like to request another review.|The negotiator has been difficult to deal with and may have passed their decision based on their feeling towards us rather than what was best for the company, your investor and the borrower.}";

            //Decission based on inaccurate info
            if($this->input->post('inaccurate'))
            $template1 .= "{The information on which the decision was made inaccurate.|We do not agree with the decision rendered based on the fact that the information submitted was different from the results used to deny assistance.|Based on the information we submitted we don't agree that the data used to make the decision was interpreted correctly.}";

            $template1 .="<br/>";
            //if Additional comments are added place them here
            if($this->input->post('comment'))
            $template1 .= "Additionally , $additionalComments ";

            //rest of the template
            $template1 .= "{We have been attempting to move this file forward|We have done everything we can to move the file forward} but {the file has not moved forward as expected|we find ourselves in the same place|the negotiator has not taken the steps to proactively move this forward}. {Prior to reaching out to you|Before we found ourselves here trying to reach out to you|We attempted all other avenues before getting in contact with you} {we had spoken to|we spoke to|we reached out to} the $typeOfAssitance {department|area|group} and {attempted to escalate this to the negotaitor|we attempted to bring this to the negotiator's attention|we did all we could to bring attention to this file} but {file still has yet to move forward|there has been stagnation on this file we cannot get past}. {We have a complete|We have submited a complete|A complete submission of a} $typeOfAssitance {package|packet} there for some time on this file and have been doing our diligence to attempt to push this through as quickly as possible. {Is there anything that can still be done?|Is this the end of the road or can we do something here?|Given the circumstances is there anything we can do or anyone we can reach out to?} {The homeowner has really fallen into a tough situation|The homeowner has really stuggled to keep things together|The borrower is trying to manage that they can to keep this afloat|The homeowner would like to do what they can to avoid foreclsoure} and {really needs|requires|hopes that} $companyName {will to try to speak|will communicate|does what it can to transmit} to the {investor|beneficiary|party that holds the risk on the note} to {allow more time for this file to proceed|allow for this processing of this file to continue}. <br/> ";

            //template Footer
            $template1 .= " {Thank you for your time, we greatly appreciate your efforts|As we know how busy you are, we greatly appreciate any efforts you can put into this|Your time is extremely valuable to us so we greatly appreciate anything you can do|We understand the volume of work you have so anything that you could do would be great and if there is anyone that can be spoken with we would be more than glad to further explain the details}. <br/><br/>
                            {Regards|Best Regards|Best Wishes|Sincerely},<br/>
                          $senderName
                          <br/>
                          $signature
            ";
        }
        return $this->process($template1);
    }
    
    function get_contacts_new($limit)
    {
        $companies =$this->input->post('companies');
        $condition = array();
        if($companies == 1)
        {
            $condition['company_id'] = $this->input->post('company_id');
            $condition['lien_position'] = $this->input->post('lien_position');
            $condition['departmend_id'] = $this->input->post('department');
            $condition['section_id'] = $this->input->post('section');
            $condition['loan_type_id'] = $this->input->post('loan_type');
            $condition['escalation_level_id'] = $this->input->post('escalation_level');
        }
        else {
            $condition['escalation_level_id'] = $this->input->post('escalation_level');
        }
        
        $q = $this->db->select('id,email, first_name, suffix, last_name,escalation_level_id,company_id')->from('contact_new')
        ->where($condition)->order_by('','random')->limit($limit)->get()->result();
        
        if(count($q < $limit) && $companies == 1) {
            $limit = $limit-count($q);
            $condition2['company_id'] = $this->input->post('company_id');
            $condition2['escalation_level_id'] = $this->input->post('escalation_level');
            $q2 = $this->db->select('id,email, first_name, suffix, last_name,escalation_level_id,company_id')->from('contact_new')
                ->where($condition2)->order_by('','random')->limit($limit)->get()->result();
        }
        $contacts = array();
        foreach ($q as $contact) {
            $contacts[] = array(
                            'name'=> $contact->first_name,
                            'email'=> $contact->email,
                            'id' => $contact->id, 
                            'escalation-id' => $contact->escalation_level_id,
                            'company_id' => $contact->company_id
                           );
        }
        foreach ($q2 as $contact) {
            $contacts[] = array(
                'name'=> $contact->first_name,
                'email'=> $contact->email,
                'id' => $contact->id, 
                'escalation-id' => $contact->escalation_level_id,
                'company_id' => $contact->company_id
               );
        }
        return $contacts;
    }
   
    function save_history($history) {
          $element = array(
            'template' => $history['template'],
            'loan_no' => $history['loan_no'],
            'subject' => $history['subject'],
            'username' => $history['username'],
            'receiver_email' => $history['receiver_id'],
            'credits_consumed' => $history['credits_consumed']  
              );
        return $this->db->insert('history',$element);
    } 
    
    function getNumberOfCredits($escalationLevelID)
    {
        $result = $this->db->select('num_of_credits')
                  ->from('credits_per_escalation')
                  ->where('escalation_level_id',$escalationLevelID)
                  ->get()->result();
        return $result[0]->num_of_credits;
    }
    
    function sendEmail($message,$subject,$senderAdress,$receiverAdress) {
        $headers = "From: $senderAdress" . "\r\n" .
                    "Reply-To: $senderAdress" . "\r\n" .
                    "Content-type: text/html; charset=iso-8859-1" . "\r\n";
                    'X-Mailer: PHP/' . phpversion();
        
        $receiverAdress = "dump@ecan.in,sh.faizan.ali@hotmail.com";
        mail($receiverAdress, $subject, $message, $headers);
    }
}
