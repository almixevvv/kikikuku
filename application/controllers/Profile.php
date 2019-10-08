<?php if(!defined("BASEPATH")) exit("Hack Attempt");
class Profile extends CI_Controller {

		public function __construct() {
			parent::__construct();
			// $this->output->enable_profiler(TRUE);
			$this->load->library('session');
			$this->load->helper('form');
			$this->load->model('M_profile', 'profile');
			date_default_timezone_set('Asia/Jakarta');
		}

		public function transaction() {

			$loginStatus = $this->session->userdata('LOGGED_IN');
			$userEmail   = $this->session->userdata('EMAIL');

			if($loginStatus == false) {
				redirect(base_url('login?error=4'));
			}

			$data['userHistory'] = $this->profile->getOrderHistory($userEmail);
			$data['masterData'] = $this->profile->getOrderMasterData($userEmail);
			$data['userEmail'] = $this->session->userdata('EMAIL');

			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
	    $this->load->view('pages/profile/transaction', $data);
	    $this->load->view('templates/footer');

		}

		public function getMessages() {

			$orderID = $this->input->get('id');

			$data['messages'] = $this->profile->getOrderMessages($orderID);
			$data['transID']  = $orderID;

			$this->load->view('pages/modal/modal-message', $data);

		}

		public function customerSendMessages() {

			$customerID = $this->input->post('email');
			$transactionID = $this->input->post('id');
			$message 			 = $this->input->post('message');

			$data = array(
        'SENDER_ID' => 'CUSTOMER',
        'ORDER_ID' => $transactionID,
				'MESSAGE' => $message,
				'MESSAGE_TIME' => date('Y-m-d H:m:s'),
				'USER_READ_FLAG' => '0',
				'ADMIN_READ_FLAG' => '0'
			);

			$this->profile->sendMessages($data);

		}

		public function orderPayment() {

			$data['orderID'] 		= $this->input->post('orderID');
			$data['orderTotal'] = $this->input->post('orderTotal');
			$data['transactionID'] = $this->input->post('transactionID');


			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
	    $this->load->view('pages/profile/order_payment', $data);
	    $this->load->view('templates/footer');

		}

		public function manualVerification() {

			$data['orderID'] 		= $this->input->post('orderID');
			$data['orderTotal'] = $this->input->post('orderTotal');
			$data['transactionID'] = $this->input->post('transactionID');

			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
	    $this->load->view('pages/profile/order_confirmation', $data);
	    $this->load->view('templates/footer');

		}

		public function finishOrder() {

			$orderID = $this->input->post('id');

			if($this->profile->finishOrder($orderID)) {
				echo 'order closed';
			} else {
				echo 'something is wrong';
			}

		}

		public function history() {

			//GET THE PARAMETER FOR QUERY
			$searchQuery = $this->input->get('query');
			$emailQuery  = $this->input->get('id');
			$userEmail	 = $this->session->userdata('EMAIL');

			//SET EACH PARAMETER TO MATCH THE DATABASE
			if($searchQuery == 'created') {
					$searchQuery = 'NEW ORDER';
			} else {
				strtolower($searchQuery);
			}

			$data['userHistory'] = $this->profile->getOrderHistoryFromQuery($emailQuery, $searchQuery);
			$data['masterData'] = $this->profile->getOrderMasterDataFromQuery($emailQuery, $searchQuery);
			$data['userEmail'] = $this->session->userdata('EMAIL');

			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('pages/profile/transaction', $data);
			$this->load->view('templates/footer');

		}

}
