<?php
class NewsModel extends CI_Model 
{

	function getData() {
	 	//$query = $this->mongo_db->count('newsMaster')); 		Return Count (No of Records in table)		
		//$query = $this->mongo_db->limit(10)->sort('_id', 'desc')->get('newsMaster');  // Limit  (Top 10)
		//$query = $this->mongo_db->get('newsMaster');  // Display All Records
		//$query = $this->mongo_db->getWhere('newsMaster', ['newsCategory' => 'BUSINESS']);  // Where Condition
		$query = $this->mongo_db->sort('_id', 'desc')->get('newsMaster');  //Order By
		return $query;
	}

	function searchByTitle($newsTitle){
		$query =  $this->mongo_db->like('newsTitle', $newsTitle, '-i', false, false)->get('newsMaster');  // like Search
		return $query;
	}
	 
	function getDataByID($newsID) {
		$id = ['_id' => new MongoDB\BSON\ObjectID( $newsID )];
		
		$query = $this->mongo_db->where($id)->get('newsMaster')[0];
		return $query;
	}
	
	function deleteFn($newsID) {
		$id= array(
					'_id' => new MongoDB\BSON\ObjectID( $newsID )
				);
		$this->mongo_db->where($id)->delete('newsMaster');
	}

	 
	
}