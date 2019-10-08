<?php if(!defined("BASEPATH")) exit("Hack Attempt");

class ResetPassword extends CI_Controller {

	function ResetPassword() {
		parent::__construct();

		$this->output->enable_profiler(TRUE);

		$this->load->model('M_reset', 'reset');
		$this->load->model('M_user', 'user');

		$this->load->library('email');
		$this->load->helper('form');
		date_default_timezone_set('Asia/Jakarta');
	}

  function index() {

		$data['RESET_EMAIL'] = $this->input->get('email');
		$data['RESET_DATA']  = $this->reset->getResetStatus($data['RESET_EMAIL']);
		$data['RESET_HASH']  = $this->input->get('key');

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

			redirect(base_url('profile/forgot_password/completed'));

		}

	}


	function resetPasswordProcess() {

		$resetEmail = $this->input->post('input-email');
		$password   = $this->input->post('reset-password');

		$hash = sha1($password);

		$data = array(
			'RESET_STATUS' => 'FINISHED'
		);

		$password = array(
			'PASSWORD' => $hash
		);

		echo sha1(date("Y.m.d.h.m.s")); 

		$this->user->updatePassword($resetEmail, $password);

		$this->user->updateResetStatus($resetEmail, $data);

	}

}
