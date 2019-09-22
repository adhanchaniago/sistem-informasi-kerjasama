<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Caller extends CI_Controller {

	public function __construct() {
		parent::__construct();
    }
    
    public function send_reminder()
    {
        $this->load->model('Coop_model');
        #config
        $email_user = 'assetmanagementsai@gmail.com';
        $email_pass = 'assetmanagementsai123';
        $pd4_email = "aldansorry@gmail.com";
        $email_subject = "NEW EMAIL";
        $email_from_cc = "si_kerjasama@polinema.ac.id";
        $email_from_text = "Sistem Informasi Kerjasama";
        
        $data = [
            'coop' => $this->Coop_model->get_coop_reminder()
        ];

		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => $email_user,
			'smtp_pass' => $email_pass,
			'mailtype'  => 'html', 
			'charset'   => 'iso-8859-1',
			'newline' => "\r\n",
		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->clear();

		$this->email
		->from($email_from_cc, $email_from_text)
		->to($pd4_email)
		->subject($email_subject)
		->set_mailtype('html');
		$html = $this->load->view("email/reminder",$data,true);
		$this->email->message($html);
		$ret = $this->email->send();
    }
	
}
