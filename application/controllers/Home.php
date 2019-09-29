<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    var $cname = "Home";
	public function __construct() {
        parent::__construct();
        $this->load->model('Coop_model');
	}
	public function index()
	{
		$data = [
            'cname' => $this->cname
		];
		$this->load->view('layouts/search',$data);
    }
    
    public function get_data()
    {
        $data['data'] = $this->Coop_model->get();
        echo json_encode($data);
    }
}
