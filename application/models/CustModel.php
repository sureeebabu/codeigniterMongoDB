<?php
class CustModel extends CI_Model 
{

	function getData() {
		$query = $this->mongo_db->sort('_id', 'desc')->get('customerMaster');  //Order By
		return $query;
	}
	
	function getOrderDetailsByID($customerID) {
		
		$id = ['_id' => new MongoDB\BSON\ObjectID( $customerID )];		
		$query = $this->mongo_db->where($id)->get('customerMaster')[0]["orderDetails"][0];  // Return Nested Json Object (orderDetails)
		return $query;
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