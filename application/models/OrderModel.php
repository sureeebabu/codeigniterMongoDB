<?php
class OrderModel extends CI_Model 
{

	function listOrderDetailsByID($customerID) { 
		 $query =  $this->mongo_db->getWhere('customerMaster', ['_id' => new MongoDB\BSON\ObjectID( $customerID )])[0];
		 //print_r($query["orderDetails"][2]["orderID"]);
		 return $query["orderDetails"];
	}

	function getOrderDetailsByID($orderID,$arrIndex) {
		
		$id =  new MongoDB\BSON\ObjectID( $orderID);
		$query =  $this->mongo_db->where('orderDetails.orderID',new MongoDB\BSON\ObjectID( $orderID))->sort('likes', -1)->getOne('customerMaster');
		//print_r($query[0]["orderDetails"][2]);
		return $query[0]["orderDetails"][$arrIndex];
	}

}