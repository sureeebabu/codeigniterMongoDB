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

	public function edit($newsID){
		$this->load->view('addEditUser',$newsID);
	}

	public function deleteFn($newsID){
		//5d10bf8701e83f170a100fce
		// $this->admin->delete("collection",array("_id"=>$newsID),$limit=0);
		redirect("Welcome/index");
	}
	

}
