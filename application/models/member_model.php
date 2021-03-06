<?php
class Member_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }
    
    function getMemberByUsername($username)
    {
        $user = $this->db->where('username',$username)->get(MEMBER_TABLE)->result();
        return $user[0];
    }
    
    function validate()
    {
        $this->db->where('username',$this->input->post('username'));
        $this->db->where('password',md5($this->input->post('password')));
        $result = $this->db->get('member')->result();

        if(count($result) >= 1)
        {                        
            $result = $result[0];
            if($result->activated == NOT_ACTIVATED)
            {
                return ACCOUNT_NOT_ACTIVATED;
            }
            else if ($result->admin == 1) 
            {
                return ADMIN_USER_LOGGED_IN;
            }
            else if ($result->user_type == EMPLOYEE_TYPE)
            {
                return EMPLOYEE_LOGGED_IN;
            }
            else if($result->user_type == END_USER_TYPE)
            {
                return END_USER_LOGGED_IN;
            }
            else if($result->user_type == AFFILIATE_TYPE)
            {
                return AFFILIATE_LOGGED_IN;
            }
        }
        else {
            return INVALID_USERNAME_PASSWORD;
        }
    }
    
    function create_member(){
        $affiliateCode = $this->input->post('affiliate_code');
        $credits = 500;
        if($affiliateCode)
        {
            $affiliateCode = $this->getAffiliateCodeInfo($affiliateCode);
            if($affiliateCode == -1)
            {
                return -1;
            }
            else
            {
                $credits = $affiliateCode->num_of_credits;
            }
        }
        else 
        {
            $affiliateCode = new stdClass();
            $affiliateCode->id = 0;
        }
        $new_member = array (
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
            'affiliate_code_id' => $affiliateCode->id,
            'credits' => $credits,
            'user_type' => $this->input->post('user_type'),
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
            $data = array('activated' => 1);
            $this->db->where('activationcode',$register_code);
            $this->db->update('member', $data);
            return TRUE;
        }
        else {
            return FALSE;
        }
    } 
    function generate_activation($id)
    {
        $password = $this->get_random_password(10,12, true,true,false);
        $data = array(
           'activationcode' => $password
        );
        $this->db->where('id', $id);
        $this->db->update(MEMBER_TABLE, $data);
        return $password;
    }
    function get_activation_code($username){
        $credentials = array('username'=>$username);
        $code = $this->db->select('activationcode,email_address')->from('member')->where($credentials);
        $q = $code->get()->result();
        $ret = array('activationcode' => $q[0]->activationcode,'email'=>$q[0]->email_address );
        return $ret;
    }
    function recover_email_password(){
        $password=$this->get_random_password(6,8, false,true,false);
        $data = array('password' => md5($password));

        $this->db->where('email_address', $this->input->post('email'));
        $this->db->update('member', $data);
        $q = $this->db->select('username,email_address')->from('member')
                    ->where('email_address',$this->input->post('email'));
        $temp = $q->get()->result();
        $ret['username'] = $temp[0]->username;
        $ret['password'] = $password;
        $ret['email_address'] = $temp[0]->email_address;

        return $ret;
    }
    function change_password($username){
        $password=$this->input->post('new_password');
        $old_password=$this->input->post('old_password');

        $this->db->where('password',md5($old_password));
        $query =$this->db->get('member');
        if($query->num_rows==1)
        {

                $data = array(
               'password' => md5($password)
            );
                $this->db->where('username', $username);
                return $this->db->update('member', $data);
        }
        return false;
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
    
    function get_member($username){
    	$this->db->where('username',$username);
        $query =$this->db->get('member')->result();
		
        $member=array(
            'id' => $query[0]->id,
            'first_name' => $query[0]->first_name,
            'last_name' => $query[0]->last_name,
            'username' => $query[0]->username,
            'company_telephone' => $query[0]->company_telephone,
            'direct_telephone' => $query[0]->direct_telephone,
            'company_fax'=> $query[0]->company_fax,
            'company_name'=> $query[0]->company_name,
            'company_street_address'=> $query[0]->company_street_address,
            'company_address_line2'	=> $query[0]->company_address_line2,
            'company_city'=> $query[0]->company_city,
            'company_state'=> $query[0]->company_state,
            'company_zip_code'=> $query[0]->company_zip_code,
            'company_website'=> $query[0]->company_website,
            'email_address'	=> $query[0]->email_address,
            'credits' => $query[0]->credits,
            'affiliate_code' => $query[0]->affiliate_code_id
        );
        return $member;
    }
    
    function get_member_name($username)
    {
    	$this->db->where('username',$username);
        $query = $this->db->get('member')->result();
        return $query[0]->first_name.' '.$query[0]->last_name;
    }
    
    function updateUserCredits($userID,$numCredits) 
    {
        if($this->db->query('UPDATE member SET credits = credits + '.$numCredits.' WHERE username = '."'$userID'")){
            return true;
        }
        else{
            return false;
        }
    }
    
    function deductUserCredits($userID,$numCredits) 
    {
        if($this->db->query('UPDATE member SET credits = credits - '.$numCredits.' WHERE username = '."'$userID'")){
            return true;
        }
        else{
            return false;
        }
    }
    
    function getUserCredits($username) 
    {
        $result = $this->db->select('credits')->from('member')->where('username',$username)->get()->result();
        return $result[0]->credits;
    }
    
    function save_profile_data($username)
    {
    	$update_member = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'company_telephone' => $this->input->post('company_telephone'),
			'direct_telephone' => $this->input->post('direct_telephone'),
			'company_fax' => $this->input->post('company_fax'),
			'company_name' => $this->input->post('company_name'),
			'company_street_address' => $this->input->post('company_street_address'),
			'company_address_line2' => $this->input->post('company_address_line2'),
			'company_city' => $this->input->post('company_city'),
			'company_state' => $this->input->post('company_state'),
			'company_zip_code' => $this->input->post('company_zip_code'),
			'company_website' => $this->input->post('company_website')
		 );
		$this->db->where('username', $username);
		return $this->db->update('member', $update_member);
    }
    
    function get_signature($username)
    {
        $value=$this->db->select('email_address, first_name,last_name,company_telephone,company_street_address,company_name ,company_city')
        ->from('member')
        ->where('username',$username)->get()->result();

       return $signature='<strong>Phone:</strong> '.$value[0]->company_telephone."<br>".'<strong>Company:</strong> '.$value[0]->company_name." ".$value[0]->company_street_address." ".$value[0]->company_city."<br>".'<strong>Email:</strong> '.$value[0]->email_address;
    }
    
    function searchUser()
    {
        $criteria = $this->input->post('search_criteria');
        $phrase = $this->input->post('phrase');
        if($criteria == SEARCH_BY_EMAIL) {
            $result = $this->db->select('*')->from('member')->where('email_address',$phrase)->get()->result();
        }
        else if ($criteria == SEARCH_BY_USERNAME) {
            $result = $this->db->select('*')->from('member')->where('username',$phrase)->get()->result();
        }
        if(count($result)>0){
            return $result[0];
        }
        else {
            return FALSE;
        }
    }
    
    function get_delete_requests($all = false)
    {
        $query = $this->db->select('*')->from(EMPLOYEE_DELETE_TABLE)->get()->result_array();
        $inArr = $query;//This is the 2D array
        if($all){
            return $inArr;
        }
        else {
            $outArr = array();
            for($i=0;$i<count($inArr);$i++){
                    $outArr[$i] = $inArr[$i]['user_requested'];
            }
            return $outArr;
        }  
    }
    
    function add_credits_consumed($numCredits)
    {
        $user = $this->session->userdata(USERNAME);
        $this->db->query('UPDATE member SET credits_consumed = credits_consumed + '.$numCredits.' WHERE username = '."'$user'");
        return;
    }
    
    function sendCreditsAwardedEmail($toUser,$productId)
    {
        $this->load->model('transaction');
        $num_credits = $this->transaction->getNumberOfCredits($productId);
        $member = $this->get_member($toUser);
        $subject = "NOTICE: Your Ecan.in account has been awarded $num_credits Credits!";
        $firstname = $member['first_name'];
        $contents = "Dear $firstname,
        
        Thank you for being a valued customer. We have awarded you $num_credits Credits.

        As we appreciate your continued support we ask that you please give us any feedback that you can in order to continue to improve your user experience.
        Should you have any further inquiries please don't hesitate to reach us at info@ecan.in. Thank you for your continued partnership.
        Regards,
        Escalation Cannon | Management 
        888-934-3444 ";
        
        
        $to =  $member['email_address'];
        $message = $contents;
        $headers = 'From: info@ecan.in' . "\r\n" .
        'Reply-To: info@ecan.in' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
        $sent = mail($to, $subject, $message, $headers);
    }
    
    function getAffiliatesUser($id)
    {
        $affilifateUsers = $this->db->query("SELECT m.first_name,m.last_name,m.username,m.company_telephone,m.direct_telephone,m.company_fax,m.company_name,m.company_street_address,
                                                    m.company_address_line2,m.company_city,m.company_state,m.company_zip_code,m.company_website,m.email_address,m.date_joined,
                                                    m.credits_consumed,c.referal_code,m.credits,c.created_at
                                                    FROM member m JOIN affiliate_codes c ON m.affiliate_code_id = c.id 
                                                    WHERE affiliate_code_id IN 
                                                    (SELECT id FROM affiliate_codes WHERE created_by_user_id = $id);")->result();
        return $affilifateUsers;
    }
    
    function getMyReferalCodes($id)
    {
        $referalCodes = $this->db->select('*')->from(AFFILIATE_CODES_TABLE)->where('created_by_user_id',$id)->get()->result();
        return $referalCodes;
    }
    
    function getCodeStatus($code)
    {
        $referalCodes = $this->db->select('*')->from(AFFILIATE_CODES_TABLE)->where('referal_code',$code)->get()->result();
        if(count($referalCodes) > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    
    function generateCode($code,$credits,$userID)
    {
        $affiliateCode =  array();
        $affiliateCode['referal_code'] = $code;
        $affiliateCode['num_of_credits'] = $credits;
        $affiliateCode['created_by_user_id'] = $userID;
        $this->db->insert(AFFILIATE_CODES_TABLE,$affiliateCode);
    }
    
    function ChangeCodeStatus($id,$status)
    {
        $data = array('status' => $status);
        $this->db->where('id',$id);
        $this->db->update(AFFILIATE_CODES_TABLE, $data);
    }
    
    function getAffiliateCodeInfo($code)
    {
        $referalCodes = $this->db->select('*')->from(AFFILIATE_CODES_TABLE)->where('referal_code',$code)->get()->result();
        if(count($referalCodes) > 0)
        {
            return $referalCodes[0];
        }
        else
        {
            return -1;
        }
    }
}
?>