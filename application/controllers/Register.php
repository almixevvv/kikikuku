<?php if(!defined("BASEPATH")) exit("Hack Attempt");
class Register extends CI_Controller {

	public function index() {

		$this->load->helper('form');

		$page = 'register';
		if(!file_exists(APPPATH.'/views/pages/account-registration/'.$page.'.php')) {
				show_404();
		}

    $this->load->view('templates/header');
	$this->load->view('templates/navbar');
    $this->load->view('pages/account-registration/'.$page);
    $this->load->view('templates/footer');

  }

	public function checkExistingEmail() {

		// $this->output->enable_profiler(TRUE);

		$this->load->model('M_user', 'user');

		$userEmail = $this->input->get('email');

		$userQuery = $this->user->checkExistingEmail($userEmail);

		if($userQuery->num_rows() == 0) {
			echo 'ok';
		} else {
			echo 'existing';
		}
	}

	public function input() {

		date_default_timezone_set('Asia/Jakarta');

		// $this->output->enable_profiler(TRUE);
		$this->load->model('M_user', 'user');

		$name = $this->input->post('txt-name');
		$fName = $this->input->post('txt-first-name');
		$lName = $this->input->post('txt-last-name');
		$phone = $this->input->post('txt-phone');
		$email = $this->input->post('txt-email');
		$country = $this->input->post('txt-country');
		$address1 = $this->input->post('txt-address');
		$address2 = $this->input->post('txt-address-2');
		$password = $this->input->post('txt-password');
		$state = $this->input->post('txt-state');
		$zip = $this->input->post('txt-zip');
		$date = $this->input->post('txt-date');

		$hashPassword = sha1($password);
		$hashEmail = sha1($email);

		$data = array(
			'FIRST_NAME' => $fName,
			'LAST_NAME' => $lName,
			'JOIN_DATE' => date("Y/m/d h:i:s"),
			'PHONE' => $phone,
			'ADDRESS' => $address1,
			'ADDRESS_2' => $address2,
			'COUNTRY' => $country,
			'PROVINCE' => $state,
			'ZIP' => $zip,
			'EMAIL' => $email,
			'PASSWORD' => $hashPassword,
			'STATUS' => 'PENDING',
			'HASH' => $hashEmail
		);

		$query = $this->user->registration($data);

		if($query) {
			$data['email'] = $email;
			$data['hash'] = sha1($email);

			//Disable this for debug only
			//$this->load->view('email-template/verification-email', $data);

			$this->load->library('email');
			$this->email->from('andi.wardana@incubesolutions.com', 'Kikikuku Team');
			$this->email->to($email);
			$this->email->set_mailtype('html');

			$message = $this->load->view('email-template/verification-email', $data, true);

			$this->email->subject('Please confirm your email address');
			$this->email->message($message);

			if($this->email->send()) {
				$this->load->view('templates/header');
				$this->load->view('templates/navbar');
				$this->load->view('pages/account-registration/register_success');
				$this->load->view('templates/footer');
			}
		} else {
			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('pages/account-registration/register_error');
			$this->load->view('templates/footer');
		}
	}

	public function verification() {

		$this->load->model('M_user', 'user');

		$hash = $this->input->get('key');
		$email = $this->input->get('email');

		$emailHash = sha1($email);

		$query = $this->user->verifyAccount($emailHash);

		if($query->num_rows() > 0) {
			$update = $this->user->updateStatus($email);
			if($update) {
				//Account verified
				$this->load->view('templates/header');
				$this->load->view('templates/navbar');
				$this->load->view('pages/account-registration/verified_success');
				$this->load->view('templates/footer');
			} else {
				$this->load->view('templates/header');
				$this->load->view('templates/navbar');
				$this->load->view('pages/account-registration/verified_error');
				$this->load->view('templates/footer');
			}

		} else {
			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('pages/account-registration/verified_error');
			$this->load->view('templates/footer');
		}

	}

}
