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

	public function insOrderDetails(){
		//$this->mongo_db->push('scores', 89)->update('customerMaster');
		$id = new MongoDB\BSON\ObjectID("5d1491ea4df7ac90b8b32637");

		$nestedData= array(
						'orderID' => 10,
						'orderNo' => 'DW/19-20/001',
					);

		//$this->mongo_db->addToSet('days', 'friday')->update('customerMaster');
		$this->mongo_db->addToSet(['days' => 'friday', 'months' => ['december', 'november']])->update('customerMaster');
		 //$this->mongo_db->pushAll('orderDetails', $nestedData, ['sort' => 'DESC'])->where('_id', $id )->update('customerMaster');
		 //$this->mongo_db->addToSetAll('tags', ['iphone', 'samsung', 'nokia'])->updateAll('customerMaster');


		//$this->mongo_db->push(['scores' => 89, 'players' => 6, 'type' => 'basketball'])->update('customerMaster');

		 //$this->mongo_db->push(['scores' => 89, 'players' => 6, 'type' => 'basketball'])->update('games');

		
		// $this->mongo_db->update(array("_id"=>$id),array('$addToSet' => array("done_by" => "2")));

		 //$this->mongo_db->addToSetAll('orderDetails', ['iphone', 'samsung', 'nokia'])->update('customerMaster');
	}

	public function updateOrderDetails($customerID){
		// $id = ['_id' => new MongoDB\BSON\ObjectID( $customerID )];
		// $this->mongo_db->where($id)->set(
		// 		[
		//  		  'orderDetails.orderID'    => $this->input->post('txtOrderID'),
		// 		  'orderDetails.orderNo'    => $this->input->post('txtOrderNo'),
		// 		  'orderDetails.orderPrice' => $this->input->post('txtOrderPrice')
		// 		]
				
		// 		)->update('customerMaster');

		redirect("CustCtrl");
	}
	 
}
