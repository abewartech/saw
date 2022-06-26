<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        //login
        
        if ($this->session->userdata('id_user') == "") {
            redirect('login');
        } 
        
    }

   
	
	public function index()
	{
		$data = array(
			'content' => 'home/home', 
			'lokasi' => 'Dashboard', 
			);
		$this->load->view('admin', $data);
	}

}
