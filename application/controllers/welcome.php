<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }
    
    public function index()
    {
        die('hello');
        $this->load->view('index');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */