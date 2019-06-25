<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndexCtrl extends CI_Controller { 

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url'); 
		$this->load->library('mongo_db');
	}

	public function index() {
		$result['data'] = $this->mongo_db->get('newsMaster');
		$this->load->view('indexView',$result);         
	}

	public function deleteFn($newsID){
		$delete= array(
					'_id' => $newsID
				);
		$this->mongo_db->delete('newsMaster',$delete);
		redirect("IndexCtrl");
	}

	public function edit($newsID){
		$data['mode'] = "Edit";		
		$data['newsID'] = $newsID;
		//print_r($newsID);

		//print_r($this->mongo_db->select(['_id', 'newsTitle', 'newsCategory'])->get('newsMaster'));
		//$data['newsData'] = $this->mongo_db->where('newsTitle', 'a')->get('newsMaster');
		//print_r($this->mongo_db->where('newsTitle', 'a')->get('newsMaster')[0]);

		//print_r($this->mongo_db->where('newsTitle', 'a')->get('newsMaster')[0]);  // Working Code
  		$filter = ['_id' => new MongoDB\BSON\ObjectID( $newsID )];

		$data['newsData'] = $this->mongo_db->where($filter)->get('newsMaster')[0];
		 

		$this->load->view('addEditNews',$data);
	}

	public function addEditUsers(){
		$data['mode'] = "Add New ";
		$this->load->view('addEditNews',$data);
	}

	public function insNewsData(){
		$insNewsData= array(
						'newsTitle' => $this->input->post('txtNewsTitle'),
						'newsCategory' => $this->input->post('txtNewsCategory'),
					);
		$this->mongo_db->insert('newsMaster',$insNewsData);
		redirect("IndexCtrl");
	}

	public function updateNewsData($newsID){
	 
		$updateData = array(
			'newsTitle' => $this->input->post('txtNewsTitle'),
			'newsCategory' => $this->input->post('txtNewsCategory'),
        );
		$id = array('_id' => $newsID);
		$add_attributes =  array_merge($id, $updateData);

	 	print_r($add_attributes);
		// $this->mongo_db->update
		// (
		// 	'newsMaster',
		// 	array('_id' =>  $newsID),
		// 	array('$set' => array( 
		// 		'newsTitle' => $this->input->post('txtNewsTitle'),
		// 		'newsCategory' => $this->input->post('txtNewsCategory'),
		// 		))
		// );

		
		
		$this->mongo_db->update('newsMaster',$add_attributes);
        // $this->mongo_db->update('newsMaster',$id, array('$set' => $updateData));
		

		//redirect("IndexCtrl");
	}

}
