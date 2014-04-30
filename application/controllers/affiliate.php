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
    
//    function my_referal_codes()
//    {
//        $user = $this->session->userdata('user');
//        $codes = $this->member_model->getMyReferalCodes($user['id']);
//        $data['codes'] = $codes;
//        $data['main_content'] = 'affiliate_financials';
//        $this->load->view('includes/template',$data);
//    }
    
    function enable_disable_code()
    {
        $id = $_GET['id'];
        $status = $_GET['status'];
        $status =  $this->member_model->ChangeCodeStatus($id,$status);
    }
    
    function transactions()
    {
        $data = array();
        $user = $this->session->userdata('user');
        $this->load->model('affiliate_model');
        $data['current_balance'] = $this->affiliate_model->getAffiliatePendingPayments($user['id']);
        $data['transaction_history'] = $this->affiliate_model->getTransactionHistory($user['id']);
        $data['main_content'] = 'affiliate_financials';
        $this->load->view('includes/template',$data);
    }
    
    function codes_financials()
    {
        $this->load->model('affiliate_model');
        $user = $this->session->userdata('user');
        $codes = $this->affiliate_model->getMyReferalCodesTransactions($user['id']);
        if(!empty($codes))
        {
            foreach($codes as $code)
            {
                $code->pending_transactions = $this->affiliate_model->getReferalCodesSum($code->id,0);
                $code->paid_transactions = $this->affiliate_model->getReferalCodesSum($code->id,1)?$this->affiliate_model->getReferalCodesSum($code->id,1):0;
            }
        }
        else
        {
            $codes = $this->affiliate_model->getAllReferalCodes($user['id']);
            foreach($codes as $code)
            {
                $code->pending_transactions = 0;
                $code->paid_transactions = 0;
            }
        }
        $totalBalance = $this->affiliate_model->getTotalPendingEarnings($user['id'],0);
        if(!$totalBalance)
        {
            $totalBalance = 0;
        }
        $data['userTotalBalance'] = $totalBalance;
        $data['codes'] = $codes;
        $data['checkoutRequested'] = $this->affiliate_model->haveCheckoutRequest($user['id']);
        $data['main_content'] = 'affiliate_codes_financials';
        $this->load->view('includes/template',$data);
    }
    
    function affiliate_code_financials()
    {
        $user = $this->session->userdata('user');
        $this->load->model('affiliate_model');
        $codeId = $this->input->get('code_id');
        $data['transactions'] = $this->affiliate_model->getTransactionHistory($user['id'],$codeId);
        $data['main_content'] = 'affiliate_code_transactions';
        $this->load->view('includes/template',$data);
    }
    
    function add_checkout_request()
    {
        $user = $this->session->userdata('user');
        $this->load->model('affiliate_model');
        $amount = $this->input->get('amount');
        $this->affiliate_model->addCheckoutRequest($user,$amount);
    }
    
    function export_users_csv()
    {
        $this->load->model('affiliate_model');
        $user = $this->session->userdata('user');
        $affiliate_members = $this->member_model->getAffiliatesUser($user['id']);
        $this->affiliate_model->export_users_csv($affiliate_members);   
    }
    
    function get_specific_code_graph()
    {
        $this->load->model('affiliate_model');
        $user = $this->session->userdata('user');
        $codeId = $this->input->get('code_id');
        $transactions = $this->affiliate_model->getTransactionHistory($user['id'],$codeId);
        $finalArray = array();
        if(!empty($transactions))
        {
            foreach($transactions as $transaction)
            {
                $tempArray = array();
                $date = new DateTime($transaction->datetime);
                $tempArray[0] = $date->format('Y-m-d g:iA'); 
                $tempArray[1] = floatval($transaction->affiliate_percentage_from_transaction);
                $finalArray[] = $tempArray;
            }
        }
        $this->output->set_content_type(JSON_CONTENT_TYPE)->set_output(json_encode($finalArray));
    }
    
    function get_all_code_graph()
    {
        $this->load->model('affiliate_model');
        $user = $this->session->userdata('user');
        $allTransactions = $this->affiliate_model->getTransactionHistory($user['id']);
        $allCodes = $this->affiliate_model->getAllReferalCodes($user['id']);
        $BigArray = array();
        $count = 0;
        foreach($allCodes as $code)
        {
            $transactions = $this->affiliate_model->getTransactionHistory($user['id'],$code->id);
            $finalArray = array();
            if(!empty ($transactions))
            {
                foreach($transactions as $transaction)
                {
                    $tempArray = array();
                    $date = new DateTime($transaction->datetime);
                    $tempArray[0] = $date->format('Y-m-d g:iA'); 
                    $point = floatval($transaction->affiliate_percentage_from_transaction);
                    $tempArray[1] = $point;
                    $finalArray[] = $tempArray;
                }
            }
            else
            {
                $tempArray = array();
                $date = new DateTime($code->created_at);
                $tempArray[0] = $date->format('Y-m-d');
                $tempArray[1] = 0.0;
                $finalArray[] = $tempArray;
            }
            
            $BigArray[$count]['code'] = $code->referal_code;
            $BigArray[$count]['points'] = $finalArray;
            $count++;
        }
        
        $finalArray = array();
        if(!empty($allTransactions))
        {
            foreach($allTransactions as $transaction)
            {
                $tempArray = array();
                $date = new DateTime($transaction->datetime);
                $tempArray[0] = $date->format('Y-m-d g:iA'); 
                $point = floatval($transaction->affiliate_percentage_from_transaction);
                $tempArray[1] = $point?$point:0;
                $finalArray[] = $tempArray;
            }
        }
        $this->output->set_content_type(JSON_CONTENT_TYPE)->set_output(json_encode($BigArray));
    }
   
    
    
}

?>
