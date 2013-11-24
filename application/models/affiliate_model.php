<?php

class affiliate_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }
    
    function getParentAffiliate($userID)
    {
        $query = "select * from member where member.id = (select created_by_user_id from affiliate_codes where affiliate_codes.id = (select member.affiliate_code_id from member where member.id = $userID))";
        $result = $this->db->query($query)->result();
        if(count($result) > 0)
        {
            return $result[0];
        }
        else 
        {
            return null;
        }
    }
    
    function getAffiliatePendingPayments($userID)
    {
        $query = "select SUM(affiliate_transactions.affiliate_percentage_from_transaction) as total from affiliate_transactions where affiliate_transactions.affiliate_id = $userID and is_paid = 0";
        $result = $this->db->query($query)->result();
        return $result[0]->total;
    }
    
    function getAllReferalCodes($userId)
    {
        $query = "Select * from affiliate_codes where created_by_user_id = $userId";
        $result = $this->db->query($query)->result();
        return $result;
    }
    
    function getTransactionHistory($userID,$codeId = -1)
    {
        if($codeId != -1)
        {
            $query = "select * from affiliate_transactions where affiliate_transactions.affiliate_id = $userID AND affiliate_code_id = $codeId";
        }
        else
        {
            $query = "select * from affiliate_transactions where affiliate_transactions.affiliate_id = $userID";
        }
        $result = $this->db->query($query)->result();
        return $result;
    }
    
    function getReferalCodesSum($codeId,$paid_status)
    {
        $query = "SELECT SUM(affiliate_percentage_from_transaction) AS total_transaction FROM affiliate_transactions where affiliate_code_id = $codeId and is_paid = $paid_status ";
        $result = $this->db->query($query)->result();
        return $result[0]->total_transaction;
    }
    
    function getMyReferalCodesTransactions($userId)
    {
        $query = "select affiliate_codes.id,status,user_id,referal_code,affiliate_percentage_from_transaction,affiliate_transactions.product_id,affiliate_code_id from affiliate_transactions join affiliate_codes on affiliate_codes.id = affiliate_transactions.affiliate_code_id where affiliate_id = $userId GROUP BY referal_code";
        $result = $this->db->query($query)->result();
        return $result;
    }
    
    function getTotalPendingEarnings($userId,$paidStatus)
    {
        $query = "SELECT SUM(affiliate_percentage_from_transaction) AS total_transaction FROM affiliate_transactions where is_paid = $paidStatus AND affiliate_id = $userId";
        $result = $this->db->query($query)->result();
        return $result[0]->total_transaction;
    }
    
    function addCheckoutRequest($user,$amount)
    {
        $data = array();
        $data['affiliate_id'] = $user['id'];
        $this->db->insert('affiliate_checkout_requests',$data);
        $this->sendCheckoutEmail($user,$amount);
    }
    
    function haveCheckoutRequest($userId)
    {
        $query = "Select count(0) as num_rows from affiliate_checkout_requests where affiliate_id = $userId";
        $result = $this->db->query($query)->result();
        if($result[0]->num_rows > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    function getCheckoutRequest()
    {
        $query = "select acr.is_paid,acr.id as checkoutId,acr.date_requested,tr.affiliate_id,member.first_name,member.last_name,member.company_street_address,member.company_address_line2,member.email_address,member.company_city,member.company_state,member.company_zip_code,SUM(affiliate_percentage_from_transaction) as amount from 
                  affiliate_transactions tr inner join member on tr.affiliate_id = member.id
                  inner join affiliate_checkout_requests acr on acr.affiliate_id = member.id 
                  Where acr.is_paid = 0";
        $result = $this->db->query($query)->result();
        return $result;
    }
    
    function markTransactionPaid($id)
    {
        $this->db->where('id',$id);
        $data = array('is_paid'=>1);
        $this->db->update('affiliate_checkout_requests',$data);
    }
    
    function sendCheckoutEmail($user,$amount)
    {
        $this->load->library('email');
        //email to user
        $username = $user['first_name'];
        $userEmail = $user['email_address'];
        $to = $userEmail;
        $subject = SUBJECT_CHECKOUTMAIL;
        $message = "Dear $username, 
                        We have received your checkout request for $$amount, We will get back to you shortly"; 
        
        $this->email->from('info@ecan.in','Ecan.in');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);	
        $this->email->send();
        
        //email to admin
        $username = $user['username'];
        $userId = $user['id'];
        $message = "Affiliate with username $username and ID $userId has requested for checkout of amount $amount";
        $this->email->from('info@ecan.in','Ecan.in');
        $this->email->to(EMAIL_ADMIN);
        $this->email->subject($subject);
        
        $this->email->message($message);	
        $this->email->send();
    }
    
    function export_users_csv($affiliate_members)
    {
        header("Content-type: application/csv");
        header("Content-Disposition: attachment; filename=file.csv");
        header("Pragma: no-cache");
        header("Expires: 0");
        $x = get_object_vars($affiliate_members[0]);
        $keys = array_keys($x);
        echo implode(",", $keys);
        echo "\n";
        foreach($affiliate_members as $contact) {
            $x = get_object_vars($contact);
            echo implode(",", $x);
            echo "\n";
        }
    }
}
?>
