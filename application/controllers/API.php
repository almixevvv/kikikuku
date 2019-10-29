<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class API extends REST_Controller {

	public function __construct() {
		
		parent::__construct();

		$this->load->model('M_api', 'api');
		// $this->output->enable_profiler(TRUE);
		
	}

	public function index_get() {

		$this->response([
			'status' => 'error',
			'message' => 'api path error',
			'code' => REST_Controller::HTTP_NOT_FOUND
		], REST_Controller::HTTP_NOT_FOUND);

	}
  
  	//DEBUG GET ALL MEMBER
	public function register_get() {

		$data = $this->api->getMembers()->result();
		$count = $this->api->getMembers()->num_rows();

		$this->response([
			'status' => 'success',
			'total' => $count,
			'message' => $data
		], REST_Controller::HTTP_OK);

	}

	//REGISTER USER
	public function register_post() {

		/* POST API PARAMETER */
		$fName 		= $this->input->post('firstName');
		$lName 		= $this->input->post('lastName');
		$phone 		= $this->input->post('phone');
		$email 		= $this->input->post('email');
		$country 	= $this->input->post('country');
		$address1 	= $this->input->post('address1');
		$address2 	= $this->input->post('address2');
		$password 	= $this->input->post('pass');
		$state 		= $this->input->post('province');
		$zip 		= $this->input->post('zip');

		/* FORMAT BUAT TANGGAL HARUS STRING DD/MM/YYYY */
		$date 		= $this->input->post('birthdate');


		//CHECK IF THE EMAIL IS ALREADY REGISTERED OR NOT
		$checkEmail = $this->api->checkExistingEmail($email);

		if($checkEmail->num_rows() > 0) {
			
			$this->response([
				'status' 		=> 'error',
				'message' 		=> 'user already exists',
				'code' 			=> REST_Controller::HTTP_BAD_REQUEST
			], REST_Controller::HTTP_BAD_REQUEST);

		} else {

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

			$query = $this->api->insertMember($data);

			if(!$query) {
				$this->response([
					'status' 	=> 'success',
					'message' 	=> 'registration successful',
					'code' 		=> REST_Controller::HTTP_OK
				], REST_Controller::HTTP_OK);
			} else {
				$this->response([
					'status' 	=> 'error',
					'message' 	=> 'bad request',
					'code' 		=> REST_Controller::HTTP_BAD_REQUEST
				], REST_Controller::HTTP_BAD_REQUEST);
			}

		}

	}

	public function login_get() {

		//HASHING DI BACKEND
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		//CHECK IF EMAIL IS USED OR NOT
		$emailQuery = $this->api->checkExistingEmail($email);

		//Check if email exists
		if($emailQuery->num_rows() == 0) {
			//Account Verified
			$this->response([
				'status' 	=> 'error',
				'message' 	=> "this email doesn't exist",
				'code' 		=> REST_Controller::HTTP_BAD_REQUEST
			], REST_Controller::HTTP_BAD_REQUEST);
		} else {

		}

	}

	//Verified Account
	public function verification_get() {

		$hash = $this->input->get('hash');
		$email = $this->input->get('email');

		$query = $this->api->verifyMember($hash);

		if($query->num_rows() > 0) {
			
			$update = $this->api->updateStatus($email);
			
			if($update) {
				//Account Verified
				$this->response([
					'status' 	=> 'success',
					'message' 	=> 'account verified',
					'code' 		=> REST_Controller::HTTP_OK
				], REST_Controller::HTTP_OK);
			} else {
				//Verification Error
				$this->response([
					'status' 	=> 'error',
					'message' 	=> 'bad request',
					'code' 		=> REST_Controller::HTTP_BAD_REQUEST
				], REST_Controller::HTTP_BAD_REQUEST);
			}

		} else {
			//Account already verified
			$this->response([
					'status' 	=> 'verified',
					'message' 	=> 'this account is already verified',
					'code' 		=> REST_Controller::HTTP_ACCEPTED
				], REST_Controller::HTTP_ACCEPTED);
		}

	}

}