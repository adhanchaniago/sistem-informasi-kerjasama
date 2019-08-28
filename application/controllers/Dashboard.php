<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
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
			'pages' => 'dashboard/dashboard1'
		];
		$this->load->view('layouts/default',$data);
	}
}
