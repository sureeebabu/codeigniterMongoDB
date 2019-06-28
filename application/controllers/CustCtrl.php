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

	public function insCustDetails(){
		$insCustData= array(
						'customerName' => $this->input->post('txtCustomerName'),
						'customerAddress' => $this->input->post('txtCustomerAddress'),
						'customerMobileNo' => $this->input->post('txtCustomerMobileNo'),
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
 

	public function insOrderDetails($customerID){
		$id = new MongoDB\BSON\ObjectID($customerID);
		$nestedData= array(
						'orderID' => new MongoDB\BSON\ObjectID(),
						'orderNo' => $this->input->post('txtOrderNo'),
						'orderPrice' => $this->input->post('txtOrderPrice'),
					);

		$this->mongo_db->push('orderDetails', $nestedData, ['sort' => 'DESC'])->where('_id', $id )->update('customerMaster');


		//////////////////
			// Update Nested Object
		//  $id = ['orderDetails._id' => new MongoDB\BSON\ObjectID( "5d15c65f465a11140c000634" )];
		// $this->mongo_db->where($id)->set(
		// 		[
		// 			'orderDetails.$.orderID' => $this->input->post('txtOrderID'),
		// 			'orderDetails.$.orderNo' => $this->input->post('txtOrderNo'),
		// 			'orderDetails.$.orderPrice' => $this->input->post('txtOrderPrice'),
		// 		]
				
		// 		)->update('customerMaster');
		redirect("CustCtrl");
	}

	public function upOrderDetails($customerID,$orderID){
 		$id = ['orderDetails.orderID' => new MongoDB\BSON\ObjectID($orderID)];
		$this->mongo_db->where($id)->set(
				[
					'orderDetails.$.orderNo' => $this->input->post('txtOrderNo'),
					'orderDetails.$.orderPrice' => $this->input->post('txtOrderPrice'),
				]
				
				)->update('customerMaster');
		redirect("CustCtrl");
	}
	 
}
