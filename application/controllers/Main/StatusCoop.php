<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StatusCoop extends CI_Controller
{

	var $cname = 'Main/StatusCoop';

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['Coop_model','CoopType_model']);
	}
	public function index()
	{
		$data = [
			'cname' => $this->cname,
			'header' => 'Kerjasama',
			'description' => null,
			'breadcrumb' => [
				[
					'text' => 'Main',
					'icon' => 'fa fa-gears',
					'target' => null,
					'is_active' => true
				],
				[
					'text' => 'Kerjasama',
					'icon' => 'fa fa-user',
					'target' => base_url($this->cname),
					'is_active' => false
				]
			],
			'pages' => 'main/statuscoop/index',
			'script' => 'pages/main/statuscoop/script'
		];
		$this->load->view('layouts/default', $data);
	}

	public function get_data()
	{
		$data['data'] = $this->Coop_model->get();
		echo json_encode($data);
    }
    
    public function change_status()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        $this->Coop_model->change_status($id,$status);
        echo "a";
    }

	
}
