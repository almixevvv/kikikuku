<?php if(!defined("BASEPATH")) exit("Hack Attempt");

class ResetPassword extends CI_Controller {

	function __construct() {
		parent::__construct();

		// $this->output->enable_profiler(TRUE);

		$this->load->model('M_reset', 'reset');
		$this->load->model('M_user', 'user');

		$this->load->library('email');
		$this->load->helper('form');

		date_default_timezone_set('Asia/Jakarta');
	}

  function index() {

		$data['RESET_EMAIL'] = $this->input->get('email');
		$data['RESET_DATA']  = $this->reset->getResetStatus($data['RESET_EMAIL'], $this->input->get('key'));

		//Save the url to session
		$this->session->set_userdata('KEY', $this->input->get('key'));
		$this->session->set_userdata('EMAIL', $this->input->get('email')); 

		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('pages/account-registration/reset_password', $data);
    	$this->load->view('templates/footer');

	}

	function sendPasswordReset() {

		$regularEmail = $this->input->post('reset-email');

		$queryResult = $this->user->checkExistingEmail($regularEmail);

		if($queryResult->num_rows() == 0) {
			redirect(base_url('profile/forgot_password?error=1'));
		} else {

			$id = date('y-m-d-h-m-s');

			$hashID = sha1($id);

			$resetData = array(

				'USER_EMAIL'   => $regularEmail,
				'RESET_ID'    => $hashID,
				'RESET_STATUS' => 'ACTIVE'

			);

			$config['protocol']    = 'smtp';
			$config['smtp_host']   = 'mail.kikikuku.com';
			$config['smtp_user']   = 'admin@kikikuku.com';
			$config['smtp_pass']   = 'nOX-D8NlrF#Z';
			$config['smtp_port']   = 25;
			$config['charset']     = 'utf-8';
			$config['wordwrap']    = TRUE;
			$config['mailtype']    = 'html';

			$this->email->initialize($config);

			$this->email->from('admin@kikikuku.com', 'Kikikuku Team');
			$this->email->to($regularEmail);
			$this->email->set_mailtype('html');

			$message = $this->load->view('email-template/reset-password', $resetData, true);

			$this->email->subject('Please confirm your email address');
			$this->email->message($message);

			$this->email->send();

			// print_r($this->email->print_debugger());
			$this->user->sentResetPassword($resetData);

			redirect(base_url('login?reset=successful'));

		}

	}


	function resetPasswordProcess() {

		$resetEmail = $this->input->post('input-email');
		$password   = $this->input->post('uPass');
		$key 		= $this->session->KEY;
		$email 		= $this->session->EMAIL;

		$hash = sha1($password);

		$queryCheckPass = $this->reset->checkPassword($resetEmail, $hash);

		if($queryCheckPass->num_rows() > 0) {

			$this->session->set_flashdata('error', 'password');

			redirect(base_url('profile/reset?email='.$email.'&key='.$key));

		} else {

			$data = array(
				'RESET_STATUS' => 'FINISHED'
			);

			$password = array(
				'PASSWORD' => $hash
			);

			$this->session->set_flashdata('success', 'password');

			$this->reset->updatePassword($resetEmail, $password);
			$this->reset->updateResetStatus($resetEmail, $key, $data);

			redirect(base_url('login'));

		}

	}

}
