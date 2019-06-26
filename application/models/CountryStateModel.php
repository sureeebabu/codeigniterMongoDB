<?php
class CountryStateModel extends CI_Model 
{

	function getData() {
		$query = $this->mongo_db->sort('_id', 'desc')->get('countryState');  //Order By
		return $query;
	}
	
}