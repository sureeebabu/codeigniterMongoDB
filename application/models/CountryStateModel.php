<?php
class CountryStateModel extends CI_Model 
{

	function getData() {
		$query = $this->mongo_db->sort('_id', 'desc')->get('countryState');  //Order By
		return $query;
	}
	
	function getStateDataByCountryID($countryID) {
		//$query = $this->mongo_db->getWhere('countryState', ['_id' => $countryID]);  // Where Condition
		
		$id = ['_id' => new MongoDB\BSON\ObjectID( $countryID )];		
		$query = $this->mongo_db->where($id)->get('countryState');
		return $query;
	}
}