<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ConfigEmail extends CI_Controller
{

	var $cname = 'Main/ConfigEmail';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ConfigEmail_model');
	}
	public function index()
	{
		$data = [
			'cname' => $this->cname,
			'header' => 'Config Email',
			'description' => null,
			'breadcrumb' => [
				[
					'text' => 'Main',
					'icon' => 'fa fa-gears',
					'target' => null,
					'is_active' => true
				],
				[
					'text' => 'Config Email',
					'icon' => 'fa fa-user',
					'target' => base_url($this->cname),
					'is_active' => false
				]
			],
			'pages' => 'main/configemail/index',
			'script' => 'pages/main/configemail/script'
		];

		$data['_config'] = $this->ConfigEmail_model->get_all();
		$this->load->view('layouts/default', $data);
	}

	public function get_data()
	{
		$data['data'] = $this->Coop_model->get();
		echo json_encode($data);
    }
    
    public function change_config()
    {
		$config = $this->input->post('config');
		foreach($config as $key => $value){
			$set = [
				'value_name' => $value
			];
			$this->db
			->where("key_name",$key)
			->update('_config',$set);
		}
    }

	
}
