<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndexCtrl extends CI_Controller { 

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url'); 
		$this->load->model('NewsModel');
		$this->load->library('mongo_db');
	}

	public function index() {
		$result['data'] = $this->NewsModel->getData();
		$this->load->view('indexView',$result);         
	}

	public function search() {
		$searchTxt = $this->input->post('txtSearch');
		
		if(empty($searchTxt)){
			$this->index();
		}else{
			$result['data'] = $this->NewsModel->searchByTitle($searchTxt);
			$this->load->view('indexView',$result);
		}

		
		// if (empty($this->NewsModel->searchByTitle($searchTxt))){
		// 	$this->index();
		// } else {
		// 	$result['data'] = $this->NewsModel->searchByTitle($searchTxt);
		// 	$this->load->view('indexView',$result);
		// }

		
	}

	public function deleteFn($newsID) {
	    $this->NewsModel->deleteFn($newsID);
		redirect("IndexCtrl");
	}

	public function edit($newsID){
		$data['mode'] = "Edit";		
		$data['newsID'] = $newsID;
		$data['newsData'] = $this->NewsModel->getDataByID($newsID);
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
