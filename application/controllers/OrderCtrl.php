<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderCtrl extends CI_Controller { 

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url'); 
		$this->load->model('OrderModel');
		//$this->load->model('CustModel');
		$this->load->library('mongo_db');
	}

	public function index() {

	}


	public function listOrder($customerID) {
		$result['orderDetailsData'] = $this->OrderModel->listOrderDetailsByID($customerID);
		//print_r($result['orderDetailsData'][3]["orderID"]);
		$this->load->view('listOrder',$result);         
	}

	public function editOrder($orderID,$customerID){
		$result['mode'] = "Edit";
		$result['orderID'] = $orderID;	
		$result['customerID'] = $customerID;
		//print_r($orderID);
		$result['orderDetailsData'] = $this->OrderModel->getOrderDetailsByID($orderID,$customerID);
		$this->load->view('addEditOrder',$result);
	}

	public function addOrderDetails($customerID){
		$result['customerID'] = $customerID;
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
		redirect("OrderCtrl/listOrder/".$customerID);
	}

	public function upOrderDetails($customerID,$orderID){
 		$id = ['orderDetails.orderID' => new MongoDB\BSON\ObjectID($orderID)];
		$this->mongo_db->where($id)->set(
				[
					'orderDetails.$.orderNo' => $this->input->post('txtOrderNo'),
					'orderDetails.$.orderPrice' => $this->input->post('txtOrderPrice'),
				]
				
				)->update('customerMaster');
		redirect("OrderCtrl/listOrder/".$customerID);
	}
	 
}
