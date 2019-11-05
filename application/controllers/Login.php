<?php if(!defined("BASEPATH")) exit("Hack Attempt");

class Login extends CI_Controller {

		public function __construct() {
			parent::__construct();

			$this->output->enable_profiler(TRUE);

			$this->load->model('M_user', 'user');

			/* LOAD CUSTOM GOOGLE LIBRARY */
			$this->load->library('google');
	}

	public function index() {

		$data['googleURL']=$this->google->get_login_url();

		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
	    $this->load->view('pages/account-registration/login', $data);
	    $this->load->view('templates/footer.php');

  }

	public function social() {

		$google_data = $this->google->validate();
		$pieces = explode(" ", $google_data['name']);

		$dataSess = array(
			'FIRST_NAME' => $pieces[0],
			'EMAIL' => $google_data['email'],
			'LOGGED_IN'=> TRUE
		);

		$this->session->set_userdata($dataSess);

		redirect(base_url('home'));

	}

	public function login_user() {

		$dataSess = array();

		$email = $this->input->post('txt-email');
		$password = $this->input->post('txt-password');

		$hashPassword = sha1($password);

		$checkEmail = $this->user->checkExistingEmail($email);

		//Check if email exists
		if($checkEmail->num_rows() == 0) {
			redirect(site_url('login?error=2'));
		}
		else {
			//Check if password is correct
			$checkPassword = $this->user->checkPassword($hashPassword);
			if($checkPassword->num_rows() == 0) {
				redirect(site_url('login?error=1'));
			}
			else {
				//Check if account already verified
				$checkVerified = $this->user->checkVerified($email);
				if($checkVerified->num_rows() == 0) {
					redirect(site_url('login?error=3'));
				} else {
					//Asign user data from SQL to Session
					$loginUser = $this->user->loginUser($email, $hashPassword);

					foreach($loginUser->result() as $data) {

						$dataSess = array(
							'FIRST_NAME' => $data->FIRST_NAME,
							'LAST_NAME' => $data->LAST_NAME,
							'PHONE' => $data->PHONE,
							'EMAIL' => $data->EMAIL,
							'ADDRESS' => $data->ADDRESS,
							'COUNTRY' => $data->COUNTRY,
							'PROVINCE' => $data->PROVINCE,
							'USERID' => $data->ID,
							'ZIP' => $data->ZIP,
		 			  		'LOGGED_IN'=> TRUE
	 					);

					}

					$this->session->set_userdata($dataSess);

					// redirect(base_url('home'));

				}
			}
		}

	}

	function logout() {

		$this->session->sess_destroy();
		
		redirect(base_url('home'));

	}

	function forgot_password() {

		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
	    $this->load->view('pages/account-registration/forgot_password');
	    $this->load->view('templates/footer');

	}

	function completeResetPassword() {

		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
	    $this->load->view('pages/account-registration/reset_success');
	    $this->load->view('templates/footer');

	}

}
