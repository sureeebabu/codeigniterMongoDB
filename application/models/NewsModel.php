<?php
class NewsModel extends CI_Model 
{

	 
	function getDataByID($newsID)
	{
		$this->db->where('batchID',$batchID);
		$query=$this->db->get('batchmaster');
		return $query->row();
	}

	 
	
}