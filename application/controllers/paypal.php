<?php
/**
 * Description of paypal
 *
 * @author FAIZAN ALI
 */

define('PAYPAL_PAYMENT_EMAIL','faizan_1352316042_biz@hotmail.com');
class paypal extends CI_Controller {
     /**
     *  If true, the recommended cURL PHP library is used to send the post back 
     *  to PayPal. If flase then fsockopen() is used. Default true.
     *
     *  @var boolean
     */
    public $use_curl = true;     
    
    /**
     *  If true, explicitly sets cURL to use SSL version 3. Use this if cURL
     *  is compiled with GnuTLS SSL.
     *
     *  @var boolean
     */
    public $force_ssl_v3 = true;     
   
    /**
     *  If true, cURL will use the CURLOPT_FOLLOWLOCATION to follow any 
     *  "Location: ..." headers in the response.
     *
     *  @var boolean
     */
    public $follow_location = false;     
    
    /**
     *  If true, an SSL secure connection (port 443) is used for the post back 
     *  as recommended by PayPal. If false, a standard HTTP (port 80) connection
     *  is used. Default true.
     *
     *  @var boolean
     */
    public $use_ssl = true;      
    
    /**
     *  If true, the paypal sandbox URI www.sandbox.paypal.com is used for the
     *  post back. If false, the live URI www.paypal.com is used. Default false.
     *
     *  @var boolean
     */
    public $use_sandbox = false; 
    
    /**
     *  The amount of time, in seconds, to wait for the PayPal server to respond
     *  before timing out. Default 30 seconds.
     *
     *  @var int
     */
    public $timeout = 30;       
    
    private $post_data = array();
    private $post_uri = '';     
    private $response_status = '';
    private $response = '';
    const PAYPAL_HOST = 'www.paypal.com';
    const SANDBOX_HOST = 'www.sandbox.paypal.com';
    public function __construct() {
        parent::__construct();
        error_reporting(E_ALL);
        session_start();
        ini_set('log_errors', true);
        ini_set('error_log', dirname(__FILE__).'/ipn_errors.log');
        $this->use_sandbox = true;
    }
    
    public function notify_paypal() {
        try {
            $this->requirePostMethod();
            $verified = $this->processIpn();
        } catch (Exception $e) {
            error_log($e->getMessage());
            exit(0);
        }
        
        if ($verified) 
        {
            $errmsg = '';
            if ($_POST['payment_status'] != 'Completed') 
            { 
                // simply ignore any IPN that is not completed
                error_log("payment status not completed ".$_POST['payment_status']);
                exit(0); 
            }
            if ($_POST['receiver_email'] != PAYPAL_PAYMENT_EMAIL) 
            {
                $errmsg .= "'receiver_email' does not match: ";
                $errmsg .= $_POST['receiver_email']."\n";
            }
            if ($_POST['mc_currency'] != 'USD') 
            {
                $errmsg .= "'mc_currency' does not match: ";
                $errmsg .= $_POST['mc_currency']."\n";
            }
            $this->load->model('transaction');
            $exists = $this->transaction->checkDuplicateTransaction($_POST['txn_id']);
            if (!$exists)
            {
                $errmsg .= "'txn_id' has already been processed: ".$_POST['txn_id']."\n";
                error_log(var_dump($errmsg));
            }
            if (!empty($errmsg)) 
            {
                $body = "IPN failed fraud checks: \n$errmsg\n\n";
                $body .= $this->getTextReport();
                error_log($body);
            }
            else
            {
                $this->load->model('member_model');
                $transactionData = array();
                $userID = $_POST['custom']; 
                $transactionData['user_id'] = $userID;
                $transactionData['item_id'] = $_POST['item_number'];
                $transactionData['user_email'] = $_POST['payer_email'];
                $transactionData['txn_id'] = $_POST['txn_id'];
                $this->transaction->addTransaction($transactionData);
                $numCredits = $this->transaction->getNumberOfCredits($_POST['item_number']);
                $updateQuery = $this->member_model->updateUserCredits($userID,$numCredits);
                
                $this->transaction->addAffiliateTransaction($userID,$transactionData['item_id']);
                error_log("added affiliate transaction");
            }
        } 
        else
        {
            error_log("Invalid IPN".$verified);
            error_log(var_dump($_POST));
        //    mail(PAYPAL_TRANSACTION_EMAIL, 'Invalid IPN', $this->getTextReport(),$headers);
        }
        
    }
    protected function curlPost($encoded_data) {

        if ($this->use_ssl) {
            $uri = 'https://'.$this->getPaypalHost().'/cgi-bin/webscr';
            $this->post_uri = $uri;
        } else {
            $uri = 'http://'.$this->getPaypalHost().'/cgi-bin/webscr';
            $this->post_uri = $uri;
        }
        
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_CAINFO, 
		            dirname(__FILE__)."/cert/api_cert_chain.crt");
        curl_setopt($ch, CURLOPT_URL, $uri);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encoded_data);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, $this->follow_location);
        curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, true);
        
        if ($this->force_ssl_v3) {
            curl_setopt($ch, CURLOPT_SSLVERSION, 3);
        }
        
        $this->response = curl_exec($ch);
        $this->response_status = strval(curl_getinfo($ch, CURLINFO_HTTP_CODE));
        
        if ($this->response === false || $this->response_status == '0') {
            $errno = curl_errno($ch);
            $errstr = curl_error($ch);
            throw new Exception("cURL error: [$errno] $errstr");
        }
    }
    
    /**
     *  Post Back Using fsockopen()
     *
     *  Sends the post back to PayPal using the fsockopen() function. Called by
     *  the processIpn() method if the use_curl property is false. Throws an
     *  exception if the post fails. Populates the response, response_status,
     *  and post_uri properties on success.
     *
     *  @param  string  The post data as a URL encoded string
     */
    protected function fsockPost($encoded_data) {
    
        if ($this->use_ssl) {
            $uri = 'ssl://'.$this->getPaypalHost();
            $port = '443';
            $this->post_uri = $uri.'/cgi-bin/webscr';
        } else {
            $uri = $this->getPaypalHost(); // no "http://" in call to fsockopen()
            $port = '80';
            $this->post_uri = 'http://'.$uri.'/cgi-bin/webscr';
        }

        $fp = fsockopen($uri, $port, $errno, $errstr, $this->timeout);
        
        if (!$fp) { 
            // fsockopen error
            throw new Exception("fsockopen error: [$errno] $errstr");
        } 

        $header = "POST /cgi-bin/webscr HTTP/1.1\r\n";
        $header .= "Host: ".$this->getPaypalHost()."\r\n";
        $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
        $header .= "Content-Length: ".strlen($encoded_data)."\r\n";
        $header .= "Connection: Close\r\n\r\n";
        
        fputs($fp, $header.$encoded_data."\r\n\r\n");
        
        while(!feof($fp)) { 
            if (empty($this->response)) {
                // extract HTTP status from first line
                $this->response .= $status = fgets($fp, 1024); 
                $this->response_status = trim(substr($status, 9, 4));
            } else {
                $this->response .= fgets($fp, 1024); 
            }
        } 
        
        fclose($fp);
    }
    
    private function getPaypalHost() {
        if ($this->use_sandbox) return self::SANDBOX_HOST;
        else return self::PAYPAL_HOST;
    }
    
    /**
     *  Get POST URI
     *
     *  Returns the URI that was used to send the post back to PayPal. This can
     *  be useful for troubleshooting connection problems. The default URI
     *  would be "ssl://www.sandbox.paypal.com:443/cgi-bin/webscr"
     *
     *  @return string
     */
    public function getPostUri() {
        return $this->post_uri;
    }
    
    /**
     *  Get Response
     *
     *  Returns the entire response from PayPal as a string including all the
     *  HTTP headers.
     *
     *  @return string
     */
    public function getResponse() {
        return $this->response;
    }
    
    /**
     *  Get Response Status
     *
     *  Returns the HTTP response status code from PayPal. This should be "200"
     *  if the post back was successful. 
     *
     *  @return string
     */
    public function getResponseStatus() {
        return $this->response_status;
    }
    
    /**
     *  Get Text Report
     *
     *  Returns a report of the IPN transaction in plain text format. This is
     *  useful in emails to order processors and system administrators. Override
     *  this method in your own class to customize the report.
     *
     *  @return string
     */
    public function getTextReport() {
        
        $r = '';
        
        // date and POST url
        for ($i=0; $i<80; $i++) { $r .= '-'; }
        $r .= "\n[".date('m/d/Y g:i A').'] - '.$this->getPostUri();
        if ($this->use_curl) $r .= " (curl)\n";
        else $r .= " (fsockopen)\n";
        
        // HTTP Response
        for ($i=0; $i<80; $i++) { $r .= '-'; }
        $r .= "\n{$this->getResponse()}\n";
        
        // POST vars
        for ($i=0; $i<80; $i++) { $r .= '-'; }
        $r .= "\n";
        
        foreach ($this->post_data as $key => $value) {
            $r .= str_pad($key, 25)."$value\n";
        }
        $r .= "\n\n";
        
        return $r;
    }
    
    /**
     *  Process IPN
     *
     *  Handles the IPN post back to PayPal and parsing the response. Call this
     *  method from your IPN listener script. Returns true if the response came
     *  back as "VERIFIED", false if the response came back "INVALID", and 
     *  throws an exception if there is an error.
     *
     *  @param array
     *
     *  @return boolean
     */    
    public function processIpn($post_data=null) {

        $encoded_data = 'cmd=_notify-validate';
        
        if ($post_data === null) { 
            // use raw POST data 
            if (!empty($_POST)) {
                $this->post_data = $_POST;
                $encoded_data .= '&'.file_get_contents('php://input');
            } else {
                throw new Exception("No POST data found.");
            }
        } else { 
            // use provided data array
            $this->post_data = $post_data;
            
            foreach ($this->post_data as $key => $value) {
                $encoded_data .= "&$key=".urlencode($value);
            }
        }

        if ($this->use_curl) $this->curlPost($encoded_data); 
        else $this->fsockPost($encoded_data);
        
        if (strpos($this->response_status, '200') === false) {
            throw new Exception("Invalid response status: ".$this->response_status);
        }
        
        if (strpos($this->response, "VERIFIED") !== false) {
            return true;
        } elseif (strpos($this->response, "INVALID") !== false) {
            return false;
        } else {
            throw new Exception("Unexpected response from PayPal.");
        }
    }
    
    /**
     *  Require Post Method
     *
     *  Throws an exception and sets a HTTP 405 response header if the request
     *  method was not POST. 
     */    
    public function requirePostMethod() {
        // require POST requests
        if ($_SERVER['REQUEST_METHOD'] && $_SERVER['REQUEST_METHOD'] != 'POST') {
            header('Allow: POST', true, 405);
            throw new Exception("Invalid HTTP request method.");
        }
    }
    
    public function thankyou()
    {
        $data['main_content'] = 'thankyou';
        $this->load->view('includes/template',$data);
    }
    
    public function buy_credits() {
        $this->load->model('member_model');
        $username = $this->session->userdata('username');
        $member = $this->member_model->get_member($username);
        $data['main_content'] = 'buy_credits';
        $data['member'] = $member;
        $this->load->view('includes/template',$data);
    }
}

?>
