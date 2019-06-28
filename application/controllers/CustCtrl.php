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

	public function getOrderDetails($customerID){
		$result['mode'] = "Edit";
		$result['customerID'] = $customerID;
		
		$result['orderDetailsData'] = $this->CustModel->getOrderDetailsByID($customerID);
		//var_dump($result['orderDetailsData']);
		$this->load->view('addEditOrder',$result);
	}

	public function addOrderDetails(){
		$result['mode'] = "Add New ";
		$this->load->view('addEditOrder',$result);
	}
 

	public function updateOrderDetails($customerID){
		$id = new MongoDB\BSON\ObjectID($customerID);
		$nestedData= array(
						'orderID' => $this->input->post('txtOrderID'),
						'orderNo' => $this->input->post('txtOrderNo'),
						'orderPrice' => $this->input->post('txtOrderPrice'),
					);
		$this->mongo_db->push('orderDetails', $nestedData, ['sort' => 'DESC'])->where('_id', $id )->update('customerMaster');		

		redirect("CustCtrl");
	}
	 
}
