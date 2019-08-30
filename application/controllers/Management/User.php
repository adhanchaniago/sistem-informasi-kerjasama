<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    var $cname = 'Management/User';

	public function __construct() {
		parent::__construct();
		must_login();
		$this->load->model(['User_model']);
	}
	public function index()
	{
		$data = [
            'cname' => $this->cname,
			'header' => 'Management User',
			'description' => null,
			'breadcrumb' => [
				[
					'text' => 'Management',
					'icon' => 'fa fa-gears',
					'target' => null,
					'is_active' => true
				],
				[
					'text' => 'User',
					'icon' => 'fa fa-user',
					'target' => base_url('Management/User'),
					'is_active' => false
				]
			],
            'pages' => 'management/user/index',
            'script' => 'pages/management/user/script'
		];
		$this->load->view('layouts/default',$data);
    }
    
    public function get_data()
    {
        $data['data'] = $this->db->get('tb_user')->result();
        echo json_encode($data);
	}
	
	public function action_delete()
	{
		$id = $this->input->post('id');
		$delete = $this->User_model->delete($id);
		if($delete['code'] == 0){
			echo json_encode([
				'type' => 'success',
				'message' => 'Delete success ',
				'title' => 'Delete'
			]);
		}else if($delete['code'] == 1452){
			echo json_encode([
				'type' => 'warning',
				'message' => 'Message : '.$delete['message'],
				'title' => 'Delete'
			]);
		}
	}
}
