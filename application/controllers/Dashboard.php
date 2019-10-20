<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		must_login();
	}
	public function index()
	{
		$data = [
			'header' => 'Dashboard',
			'description' => null,
			'breadcrumb' => [
				[
					'text' => 'Dashboard',
					'icon' => 'fa fa-dashboard',
					'target' => base_url('Dashboard'),
					'is_active' => false
				],
				[
					'text' => 'Dashboard1',
					'icon' => 'fa fa-check',
					'target' => null,
					'is_active' => true
				]
			],
			'pages' => 'dashboard/dashboard1',
			'script' => 'pages/dashboard/script_dashboard1'
		];

		
		$data['data_emailing'] = $this->db->get('tb_emailing')->result();
		$data['coop_will_expired'] = $this->db
		->select('vw_coop_for_email.*,tb_company.name as company_name')
		->join('tb_company','vw_coop_for_email.fk_company=tb_company.id')
		->where('remind_date <=','now()',false)
		->where('end_date >','now()',false)
		->get('vw_coop_for_email')->result();
		$this->load->view('layouts/default',$data);
	}

	public function get_chart_data()
	{
		$data = $this->db
		->get('vw_chart_coop')
		->row(0);

		echo json_encode($data);
	}
}
