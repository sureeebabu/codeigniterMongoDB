<?php
class OrderModel extends CI_Model 
{

	function listOrderDetailsByID($customerID) { 
		 $query =  $this->mongo_db->getWhere('customerMaster', ['_id' => new MongoDB\BSON\ObjectID( $customerID )])[0];
		 //print_r($query["orderDetails"][2]["orderID"]);
		 return $query["orderDetails"];
	}

	function getOrderDetailsByID($orderID,$customerID) {
		
		$id = [
				'_id' => new MongoDB\BSON\ObjectID( $customerID ),
				'orderDetails.$.orderID' =>  new MongoDB\BSON\ObjectID( $orderID)
			 ];		

			 //print_r($id);

		//$query = $this->mongo_db->where($id)->get('customerMaster')[0]["orderDetails"][0];  // Return Nested Json Object (orderDetails)

		if (empty($this->mongo_db->where($id)->get('customerMaster')[0]["orderDetails"][0])) {  // Check Whether orderDetails Data is available or not
				return "";
			}
			else {
				$query = $this->mongo_db->where($id)->get('customerMaster')[0]["orderDetails"][0];  // Return Nested Json Object (orderDetails)
				//print_r($query);
				return $query;
		}
		//return $query;
		// 		{
		//         "_id" : ObjectId("5d1464ef4df7ac90b8b3262d"),
		//         "customerName" : "daijworld",
		//         "customerAddress" : "velacherry",
		//         "customerMobileNo" : 7092804642,
		//         "orderDetails" : [
		//                 {
		//                    "orderID" : 1,
		//                    "orderNo" : "DW/19-20/001",
		//                    "orderPrice" : 5000
		//                 }
		//         ]
		// }
	}

}