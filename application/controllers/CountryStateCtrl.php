<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CountryStateCtrl extends CI_Controller { 

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url'); 
		$this->load->model('CountryStateModel');
		$this->load->library('mongo_db');
	}

	public function index() {
		$result['data'] = $this->CountryStateModel->getData();
		//var_dump($result['data']);
		$this->load->view('CountryStateView',$result);         
	}

	public function stateListByID($countryID){
		$result['temp_array'] = $this->CountryStateModel->getStateDataByCountryID($countryID);
		//var_dump($result['data']);
		$this->load->view('StateView',$result);
	}
	 
}
