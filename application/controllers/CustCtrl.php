<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustCtrl extends CI_Controller { 

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url'); 
		$this->load->model('CustModel');
		$this->load->library('mongo_db');
	}

	public function index() {
		$result['data'] = $this->CustModel->getData();
		//var_dump($result['data']);
		$this->load->view('CustView',$result);         
	}

	public function addEditCustomer(){
		$result['mode'] = "Add New ";
		$this->load->view('addEditCustomer',$result);
	}

	public function listOrder($customerID) {
		$result['orderDetailsData'] = $this->CustModel->listOrderDetailsByID($customerID);
		$this->load->view('listOrder',$result);         
	}

	public function insCustDetails(){
		$insCustData= array(
						'customerName' => $this->input->post('txtCustomerName'),
						'customerAddress' => $this->input->post('txtCustomerAddress'),
						'customerMobileNo' => $this->input->post('txtCustomerMobileNo'),
						'orderDetails' => []
					);
		$this->mongo_db->insert('customerMaster',$insCustData);
		redirect("CustCtrl");
	}

	public function getOrderDetails($customerID){
		$result['mode'] = "Edit";
		$result['customerID'] = $customerID;		
		$result['orderDetailsData'] = $this->CustModel->getOrderDetailsByID($customerID);
		$this->load->view('addEditOrder',$result);
	}

	public function addOrderDetails(){
		$result['mode'] = "Add New ";
		$this->load->view('addEditOrder',$result);
	} 
	 
}
