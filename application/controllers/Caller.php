<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Caller extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function send_reminder()
	{
		$this->load->model('Coop_model');

		$this->load->model('ConfigEmail_model');
		$_config = $this->ConfigEmail_model->get_all();
		#config

		$data_coop = $this->Coop_model->get_coop_reminder();

		if ($data_coop != null) {
			$pd4_email = "aldansorry@gmail.com";
			$data = [
				'coop' => $data_coop
			];
			// $this->load->view("email/reminder", $data);
			$config = array(
				'protocol' => $_config['email_protocol'],
				'smtp_host' => $_config['email_smtp_host'],
				'smtp_port' => (int) $_config['email_smtp_port'],
				'smtp_user' => $_config['email_username'],
				'smtp_pass' => $_config['email_password'],
				'mailtype'  => 'html',
				'charset'   => 'iso-8859-1',
				'newline' => "\r\n",
			);
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->clear();

			$this->email
				->from($_config['email_from_cc'], $_config['email_from_text'])
				->to($pd4_email)
				->subject($_config['email_subject'])
				->set_mailtype('html');
			$html = $this->load->view("email/reminder", $data, true);
			$this->email->message($html);
			$ret = $this->email->send();
			if ($ret) {
				$set_email = [
					'date' => date('Y-m-d H:i:s'),
					'recipient' => $pd4_email,
					'status' => '1',
					'message' => ''
				];
			} else { 
				$set_email = [
					'date' => date('Y-m-d H:i:s'),
					'recipient' => $pd4_email,
					'status' => '2',
					'message' => 'Error'
				];
			}
			$insert_mailing = $this->db->insert('tb_emailing', $set_email);
			if ($insert_mailing) {
				$id_mailling = $this->db->insert_id();
				foreach ($data_coop as $key => $value) {
					$set_email_coop = [
						'fk_emailing' => $id_mailling,
						'fk_coop' => $value->id
					];
					$this->db->insert('_emailing_coop', $set_email_coop);
				}
			}
		} else {
			echo "a";
		}
	}
}
