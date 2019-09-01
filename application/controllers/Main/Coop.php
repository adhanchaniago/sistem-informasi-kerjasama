<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Coop extends CI_Controller
{

	var $cname = 'Main/Coop';

	public function __construct()
	{
		parent::__construct();
		must_login();
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
			'pages' => 'main/coop/index',
			'script' => 'pages/main/coop/script'
		];
		$this->load->view('layouts/default', $data);
	}
	public function create()
	{
		$data = [
			'cname' => $this->cname,
			'list_company' => $this->Coop_model->get_company(),
			'list_coop_type' => $this->CoopType_model->get()
		];
		$this->load->view('pages/main/coop/create', $data);
	}

	public function update()
	{
		$id = $this->input->post('id');

		$data = [
			'cname' => $this->cname,
			'list_company' => $this->Coop_model->get_company(),
			'list_coop_type' => $this->CoopType_model->get(),
			'coop' => $this->Coop_model->get_by_id($id),
		];
		$this->load->view('pages/main/coop/update', $data);
	}

	public function get_data()
	{
		$data['data'] = $this->Coop_model->get();
		echo json_encode($data);
	}

	public function action_create()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_message('required', '{field} harus diisi');
		$this->form_validation->set_message('max_length', '%s tidak boleh melebihi %s karakter');

		$this->form_validation->set_rules("company_name", 'Nama Perusahaan', "trim|required|max_length[32]");
		$this->form_validation->set_rules("company_address", 'Alamat Perusahaan', "trim|required|max_length[128]");
		$this->form_validation->set_rules("coop_number", 'No', "trim|required|max_length[64]");
		$this->form_validation->set_rules("description", 'Deskripsi', "trim|required");
		$this->form_validation->set_rules("start_date", 'Tanggal Mulai', "trim|required");
		$this->form_validation->set_rules("end_date", 'Tanggal Selesai', "trim|required");
		$this->form_validation->set_rules("fk_coop_type", 'Jenis Kerjasama', "trim|required");


		if ($this->form_validation->run() == true) {
			$set_data = [
				'company_name' => $this->input->post('company_name'),
				'company_address' => $this->input->post('company_address'),
				'coop_number' => $this->input->post('coop_number'),
				'description' => $this->input->post('description'),
				'start_date' => $this->input->post('start_date'),
				'end_date' => $this->input->post('end_date'),
				'fk_coop_type' => $this->input->post('fk_coop_type'),
				'created_by' => $this->session->userdata('lg_id')
			];
			$this->Coop_model->create($set_data);
			echo json_encode([
				'code' => 0,
				'title' => 'Create',
				'message' => 'Create Success',
				'type' => 'success'
			]);
		} else {
			echo json_encode([
				'code' => 1,
				'array_error' => $this->form_validation->error_array()
			]);
		}
	}

	public function action_update()
	{
		$id = $this->input->post('id');
		$user = $this->Coop_model->get_by_id($id);

		$this->load->library('form_validation');

		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_message('required', '{field} harus diisi');
		$this->form_validation->set_message('max_length', '%s tidak boleh melebihi %s karakter');
		$this->form_validation->set_message('is_unique', '%s sudah ada');

		$this->form_validation->set_rules("company_name", 'Nama Perusahaan', "trim|required|max_length[32]");
		$this->form_validation->set_rules("company_address", 'Alamat Perusahaan', "trim|required|max_length[128]");
		$this->form_validation->set_rules("coop_number", 'No', "trim|required|max_length[64]");
		$this->form_validation->set_rules("description", 'Deskripsi', "trim|required");
		$this->form_validation->set_rules("start_date", 'Tanggal Mulai', "trim|required");
		$this->form_validation->set_rules("end_date", 'Tanggal Selesai', "trim|required");
		$this->form_validation->set_rules("fk_coop_type", 'Jenis Kerjasama', "trim|required");
		

		if ($this->form_validation->run() == true) {
			$set_data = [
				'company_name' => $this->input->post('company_name'),
				'company_address' => $this->input->post('company_address'),
				'coop_number' => $this->input->post('coop_number'),
				'description' => $this->input->post('description'),
				'start_date' => $this->input->post('start_date'),
				'end_date' => $this->input->post('end_date'),
				'fk_coop_type' => $this->input->post('fk_coop_type')
			];
			$this->Coop_model->update($id,$set_data);
			echo json_encode([
				'code' => 0,
				'title' => 'Update',
				'message' => 'Update Success',
				'type' => 'success'
			]);
		} else {
			echo json_encode([
				'code' => 1,
				'array_error' => $this->form_validation->error_array()
			]);
		}
	}

	public function action_delete()
	{
		$id = $this->input->post('id');
		$delete = $this->Coop_model->delete($id);
		if ($delete['code'] == 0) {
			echo json_encode([
				'type' => 'success',
				'message' => 'Delete success ',
				'title' => 'Delete'
			]);
		} else if ($delete['code'] == 1452) {
			echo json_encode([
				'type' => 'warning',
				'message' => 'Message : ' . $delete['message'],
				'title' => 'Delete'
			]);
		}
	}
}
