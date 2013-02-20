<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of transaction
 *
 * @author FAIZAN ALI
 */
class Transaction extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function addTransaction($data) {
        return $this->db->insert('transactions',$data);
    }
    
    public function checkDuplicateTransaction($txn_id) {
        $transactions = $this->db->where('txn_id',$txn_id)->get('transactions')->result();
        if($transactions){
            return false;
        }
        else {
            return true;
        }
    }
    public function getNumberOfCredits($item_number) {
        switch($item_number) {
            case ECAN500_PRODUCT_NAME:
                return 500;
                break;
            case ECAN1500_PRODUCT_NAME;
                return 1500;
                break;
            case ECAN2500_PRODUCT_NAME:
                return 2500;
                break;
            case ECAN5000_PRODUCT_NAME:
                return 5000;
                break;
            case ECAN10000_PRODUCT_NAME:
                return 10000;
                break;
            case ECAN25000_PRODUCT_NAME:
                return 25000;
                break;
            case ECAN50000_PRODUCT_NAME:
                return 50000;
                break;
            case ECAN100000_PRODUCT_NAME:
                return 100000;
                break;
            default :
                return false;
                break;
        }
        
    }
    //put your code here
}

?>
