<?php 
/**
* 
*/
class Signout extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
        if($this->session->userdata('is_logged_in'))
        {   
		$this->session->unset_userdata('is_logged_in');
        $this->session->unset_userdata('username');
        $this->session->sess_destroy();
        $this->clearCache();
        redirect('login','refresh');
    	}
    }

    public function clearCache(){
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: no-store, no-cache, must-revalidate');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
    }
}