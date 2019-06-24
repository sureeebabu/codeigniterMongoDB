<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserCtrl extends CI_Controller { 

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		// $this->load->model('User_Model');
	
	}

	public function index()
	{
		 $this->load->view('addEditUser');
	}
}
