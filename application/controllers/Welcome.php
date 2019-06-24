<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url'); 
	
	}
	
	public function index()
	{
		$this->load->library('mongo_db',array('activate' => 'default'),'mongo_db');		
		$result['data'] = $this->mongo_db->get('newsMaster');
		$this->load->view('welcome_message',$result);
	}
}
