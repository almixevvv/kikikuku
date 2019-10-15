<?php if(!defined("BASEPATH")) exit("Hack Attempt");
class Register extends CI_Controller {

	public function __construct() {
        
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_user', 'user');
        $this->load->helper('form');
        $this->load->library('email');
        
        // $this->output->enable_profiler(TRUE);
    }

	public function index() {

    	$this->load->view('templates/header');
		$this->load->view('templates/navbar');
    	$this->load->view('pages/account-registration/register');
    	$this->load->view('templates/footer');

  	}

	public function checkExistingEmail() {

		$userEmail = $this->input->get('email');

		$userQuery = $this->user->checkExistingEmail($userEmail);

		if($userQuery->num_rows() == 0) {
			echo 'ok';
		} else {
			echo 'existing';
		}
	}

	public function input() {

		$fName = $this->input->post('uFirstName');
		$lName = $this->input->post('uLastName');
		$phone = $this->input->post('uPhone');
		$email = $this->input->post('uEmail');
		$country = $this->input->post('uCountry');
		$address1 = $this->input->post('uAddress1');
		$address2 = $this->input->post('uAddress2');
		$password = $this->input->post('uPass');
		$state = $this->input->post('uProvince');
		$zip = $this->input->post('uZip');
		$date = $this->input->post('uBirthdate');

		$hashPassword = sha1($password);
		$hashEmail = sha1($email);

		$formatDate = strtotime($date);



		$data = array(
			'FIRST_NAME' 	=> $fName,
			'LAST_NAME' 	=> $lName,
			'JOIN_DATE' 	=> date("Y/m/d h:i:s"),
			'BIRTH_DATE' 	=> date('Y-m-d',$formatDate),
			'PHONE' 		=> $phone,
			'ADDRESS' 		=> $address1,
			'ADDRESS_2' 	=> $address2,
			'COUNTRY' 		=> $country,
			'PROVINCE' 		=> $state,
			'ZIP' 			=> $zip,
			'EMAIL' 		=> $email,
			'PASSWORD' 		=> $hashPassword,
			'STATUS' 		=> 'PENDING',
			'HASH' 			=> $hashEmail
		);

		$query = $this->user->registration($data);

		if($query) {
			$data['email'] = $email;
			$data['hash'] = sha1($email);

			//Disable this for debug only
			//$this->load->view('email-template/verification-email', $data);
			//$config['smtp_host']   = 'mail.kikikuku.com';
			$config['smtp_user']   = 'admin@kikikuku.com';
			$config['smtp_pass']   = 'nOX-D8NlrF#Z';
			$config['smtp_port']   = 25;
			$config['charset']     = 'utf-8';
			$config['wordwrap']    = TRUE;
			$config['mailtype']    = 'html';
			
			$this->email->initialize($config);

			$this->email->from('admin@kikikuku.com', 'Kikikuku Team');
			$this->email->to($email);
			$this->email->set_mailtype('html');

			$message = $this->load->view('email-template/verification-email', $data, true);

			$this->email->subject('Please confirm your email address');
			$this->email->message($message);

			if($this->email->send()) {
				redirect(base_url('?verification=pending'));
			}
		} else {
			redirect(base_url('?verification=error'));
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
