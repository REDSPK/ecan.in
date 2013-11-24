<?php
/**
 * Description of admin_model
 *
 * @author Faizan
 */
class admin_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function exportUsers($usertype)
    {
        
        $contacts = $this->db->query("SELECT m.first_name,m.last_name,m.username,m.company_telephone,m.direct_telephone,m.company_fax,m.company_name,m.company_street_address,
                                          m.company_address_line2,m.company_city,m.company_state,m.company_zip_code,m.company_website,m.email_address,m.date_joined,
                                          m.credits_consumed from member m where m.user_type = $usertype" )->result_array();
        
        header("Content-type: application/csv");
        header("Content-Disposition: attachment; filename=file.csv");
        header("Pragma: no-cache");
        header("Expires: 0");
        $keys = array_keys($contacts[0]);
        echo implode(",", $keys);
        echo "\n";
        foreach($contacts as $contact) {
            echo implode(",", $contact);
            echo "\n";
        }
        
        
    }
}

?>
