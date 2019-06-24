<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller { 
	public function index()
	{
		$this->load->library('mongo_db',array('activate' => 'default'),'mongo_db');		
		$result['data'] = $this->mongo_db->get('newsMaster');
		$this->load->view('indexView',$result);         
	}
}
