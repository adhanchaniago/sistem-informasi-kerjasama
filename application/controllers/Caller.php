<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Caller extends CI_Controller {

	public function __construct() {
		parent::__construct();
    }
    
    public function send_reminder()
    {
		$this->load->model('Coop_model');
		
		$this->load->model('ConfigEmail_model');
		$_config = $this->ConfigEmail_model->get_all();
		#config
		
		
        $pd4_email = "aldansorry@gmail.com";
        $data = [
            'coop' => $this->Coop_model->get_coop_reminder()
		];
		
		// $this->load->view("email/reminder",$data);

		$config = Array(
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
		$html = $this->load->view("email/reminder",$data,true);
		$this->email->message($html);
		$ret = $this->email->send();
    }
	
}
