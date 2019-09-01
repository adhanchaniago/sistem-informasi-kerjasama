<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CreateCoop extends CI_Controller
{

	var $cname = 'Main/CreateCoop';

	public function __construct()
	{
		parent::__construct();
		must_login();
		$this->load->model(['Coop_model', 'CoopType_model']);
	}
	public function index()
	{
		$data = [
			'cname' => $this->cname,
			'header' => 'Tambah Kerjasama',
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
					'target' => null,
					'is_active' => true
				],
				[
					'text' => 'Tambah',
					'icon' => 'fa fa-plus',
					'target' => base_url($this->cname),
					'is_active' => false
				]
			],
			'pages' => 'main/createcoop/index',
			'script' => 'pages/main/createcoop/script'
		];
		$this->load->view('layouts/default', $data);
	}

	public function create()
	{
		$index_form = $this->input->post('index_form');
		$data = [
			'cname' => $this->cname,
			'index_form' => $index_form,
			'row_data' => $this->input->post('row_data'),
			'list_company' => $this->Coop_model->get_company(),
			'list_coop_type' => $this->CoopType_model->get()
		];
		$this->load->view('pages/main/createcoop/create', $data);
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
				'message' => 'Create Success ' . $this->input->post('company_name'),
				'type' => 'success'
			]);
		} else {
			echo json_encode([
				'code' => 1,
				'array_error' => $this->form_validation->error_array()
			]);
		}
	}

	public function upload_excel()
	{
		$config['upload_path'] = './data_storage/temp/';
		$config['allowed_types'] = 'xls|xlsx';
		$config['max_size']  = '2000';
		$config['file_name'] = 'fwr.xls';
		$config['overwrite'] = true;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('excel_file')) {
			$error = $this->upload->display_errors('', '');
			$data_return = [
				'code' => 1,
				'title' => 'Upload gagal',
				'message' => $error,
				'type' => 'error'
			];
		} else {
			$file_name = $this->upload->data('file_name');
			$this->load->library('excel_reader');

			$inputFileName = 'data_storage/temp/' . $file_name;
			$inputFileType = 'xls';
			$is_error = false;

			try {
				$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
				$objReader = PHPExcel_IOFactory::createReader($inputFileType);
				$objPHPExcel = $objReader->load($inputFileName);
			} catch(Exception $e) {
				$is_error = true;
				$error = 'Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage();
			}

			if(!$is_error){
				$sheet = $objPHPExcel->getSheet(0);
			
				$highestRow = $sheet->getHighestRow();
				$highestColumn = $sheet->getHighestColumn();
				$code = $sheet->getCell('A1')->getValue();
				if($code == "FORMAT COOP UPLOAD"){
					$data_excel = $sheet->rangeToArray('A3:'.'H'.$highestRow , NULL, TRUE, FALSE);

					$data = [];
					foreach($data_excel as $key => $value){
						$coop = [
							'no' => $value[1],
							'company_name' => $value[1],
							'company_address' => $value[2],
							'coop_number' => $value[3],
							'description' => $value[4],
							'start_date' => date('Y-m-d',(int) (($value[5]-25569)*86400)),
							'end_date' => date('Y-m-d',(int) (($value[6]-25569)*86400)),
							'fk_coop_type' => $this->Coop_model->find_coop_type($value[7]),
						];
						array_push($data,$coop);
					}
					$data_return = [
						'code' => 0,
						'title' => 'Upload',
						'message' => "Berhasil ".count($data)." row",
						'type' => 'success',
						'data' => $data,
					];
				}else{
					$data_return = [
						'code' => 1,
						'title' => 'Format Error',
						'message' => "Wrong Format",
						'type' => 'error',
						'data' => [],
					];
				}
			}else{
				$data_return = [
					'code' => 1,
					'title' => 'Read Error',
					'message' => $error,
					'type' => 'error',
					'data' => [],
				];
			}
		}
		echo json_encode($data_return);
	}
}
