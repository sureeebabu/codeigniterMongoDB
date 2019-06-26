<?php
class NewsModel extends CI_Model 
{

	function getData() {
		$query = $this->mongo_db->sort('_id', 'desc')->get('newsMaster');
		//$query = $this->mongo_db->get('newsMaster');
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