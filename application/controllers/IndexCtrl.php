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
		//$result['data'] = $this->mongo_db->get('newsMaster'); // Return All Data
		$result['data'] = $this->mongo_db->sort('_id', 'desc')->get('newsMaster');
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
  		$id = ['_id' => new MongoDB\BSON\ObjectID( $newsID )];
		$data['newsData'] = $this->mongo_db->where($id)->get('newsMaster')[0];
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
		
		$id = ['_id' => new MongoDB\BSON\ObjectID( $newsID )];
		$this->mongo_db->where($id)->set(
				[
				 'newsTitle' => $this->input->post('txtNewsTitle'),
				  'newsCategory' => $this->input->post('txtNewsCategory')
				]
				
				)->update('newsMaster');

		redirect("IndexCtrl");
		 
	}

}
