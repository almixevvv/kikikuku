<?php if (!defined("BASEPATH")) exit("Hack Attempt");
class Profile extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->model('M_profile', 'profile');
		$this->load->model('M_user', 'user');

		// $this->output->enable_profiler(TRUE);
		date_default_timezone_set('Asia/Jakarta');
	}

	public function transaction()
	{

		$userData 	 = $this->session->user_data;

		$loginStatus = $userData['LOGGED_IN'];
		$userEmail 	 = $userData['EMAIL'];

		if ($loginStatus == false) {
			$this->session->set_flashdata('cart', 'no_user');
			redirect(base_url('login?refer=profile/transaction'));
		}

		$data['productName'] 	 = 'Transaction History';

		if ($this->input->get('transaction') == null) {
			$data['masterData'] = $this->profile->getAllOrderMasterData($userEmail);
		} else {
			$status = $this->input->get('transaction');
			$data['masterData'] = $this->profile->getOrderMasterData($userEmail, $status);
		}

		$data['userHistory'] = $this->profile->getOrderHistory($userEmail);
		$data['userEmail'] = $this->session->userdata('EMAIL');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('pages/profile/transaction', $data);
		$this->load->view('templates/footer');
	}

	public function myprofile()
	{

		$data['productName'] 	 = 'My Profile';

		$userData 	 = $this->session->user_data;

		$loginStatus = $userData['LOGGED_IN'];
		$userEmail 	 = $userData['EMAIL'];

		if ($loginStatus == false) {
			$this->session->set_flashdata('cart', 'no_user');
			redirect(base_url('login?refer=profile/transaction'));
		}

		$data['memberDetails'] = $this->user->getMemberData($userEmail);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('pages/profile/profile', $data);
		$this->load->view('templates/footer');
	}

	public function getMessages()
	{

		$orderID = $this->input->get('id');

		$data['message'] = $this->profile->getOrderMessages($orderID);
		$data['transID'] = $orderID;

		$this->load->view('pages/modal/modal-message', $data);
	}

	public function changePassword()
	{

		$id = $this->input->get('id');

		$userData 	 = $this->session->user_data;

		$data['memberDetails'] = $this->profile->getMemberDetails($userEmail);

		$this->load->view('pages/modal/modal-password', $data);
	}

	public function changePhone()
	{

		$id = $this->input->get('id');

		$data['memberDetails'] = $this->profile->getMemberDetails($userEmail);

		$this->load->view('pages/modal/modal-phone', $data);
	}

	public function updatePhone()
	{

		$id 	= $this->input->post('id');

		$data = array(
			'PHONE' => $this->input->post('phone'),
		);

		$query = $this->profile->updatePhone($id, $data);

		if ($query) {
			redirect('profile/myprofile');
		}
	}

	public function changePhoto()
	{
		$data['memberID'] = $this->input->get('id');

		$this->load->view('pages/modal/modal-photo', $data);
	}

	public function updatePhoto()
	{
		// // $this->output->enable_profiler(TRUE);
		// $this->load->helper('form');
		// $this->load->library('upload');

		// $defaultPath = '/assets/images/member-img/' . $_FILES['file_name']['name'];

		// $id = $this->input->post('id');
		// $file  = $defaultPath;

		// $this->profile->updatePhoto($id, $defaultPath);

		// $config['upload_path']   = './assets/images/member-img/';
		// $config['allowed_types'] = 'jpeg|jpg|png';

		// $this->upload->initialize($config);

		// if (!$this->upload->do_upload('file_name')) {
		// 	echo $this->upload->display_errors();
		// } else {
		// 	$this->upload->data();
		// 	redirect('profile/myprofile');
		// 	// $this->set('showModal',true);
		// }
	}

	public function changeAddress()
	{

		$id = $this->input->get('id');

		$loginStatus = $this->session->userdata('LOGGED_IN');
		$userEmail   = $this->session->userdata('EMAIL');

		if ($loginStatus == false) {
			redirect(base_url('login?error=4'));
		}

		$data['memberDetails'] = $this->profile->getMemberDetails($userEmail);

		$this->load->view('pages/modal/modal-address', $data);
	}

	public function updateAddress()
	{

		$id	= $this->input->post('id');

		$data = array(
			'ADDRESS' 		=> $this->input->post('add1'),
			'ADDRESS_2'  	=> $this->input->post('add2'),
			'COUNTRY' 		=> $this->input->post('country'),
			'PROVINCE' 		=> $this->input->post('province'),
			'ZIP' 			=> $this->input->post('zip'),
		);

		$query = $this->profile->updateAddress($id, $data);

		if ($query) {
			redirect('profile/myprofile');
		}
	}

	public function customerSendMessages()
	{

		$customerID 	= $this->input->get('sender');
		$transactionID 	= $this->input->get('id');
		$message 		= $this->input->get('message');

		$data = array(
			'SENDER_ID' 		=> 'CUSTOMER',
			'ORDER_ID' 			=> $transactionID,
			'MESSAGE' 			=> $message,
			'MESSAGE_TIME' 		=> date('Y-m-d H:m:s'),
			'USER_READ_FLAG' 	=> '0',
			'ADMIN_READ_FLAG' 	=> '1'
		);

		$this->profile->sendMessages($data);
	}

	public function orderPayment()
	{

		$data['productName'] 	= 'Transaction Payment';

		$data['orderID'] 		= $this->input->post('orderID');
		$data['orderTotal'] 	= $this->input->post('orderTotal');
		$data['transactionID'] 	= $this->input->post('transactionID');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('pages/profile/payment', $data);
		$this->load->view('templates/footer');
	}

	public function manualVerification()
	{

		$data['productName'] 	= 'Transaction Payment';

		$userData 	= $this->session->trans_items;

		if ($userData['orderID'] == null) {
			$data['orderID'] 		= $this->input->post('orderID');
			$data['orderTotal'] 	= $this->input->post('orderTotal');
			$data['transactionID'] 	= $this->input->post('transactionID');

			$transSession = array(
				'ORDER_ID'		=> $this->input->post('orderID'),
				'ORDER_TOTAL'	=> $this->input->post('orderTotal'),
				'TRANS_ID'		=> $this->input->post('transactionID')
			);

			$this->session->set_userdata('trans_items', $transSession);
		} else {
			$data['orderID'] 		= $userData['orderID'];
			$data['orderTotal'] 	= $userData['orderTotal'];
			$data['transactionID'] 	= $userData['transactionID'];
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('pages/profile/payment_process', $data);
		$this->load->view('templates/footer');
	}

	public function finishOrder()
	{
		$orderID = $this->input->post('id');

		if ($this->profile->finishOrder($orderID)) {
			echo 'order closed';
		} else {
			echo 'something is wrong';
		}
	}

	public function history()
	{

		//GET THE PARAMETER FOR QUERY
		$searchQuery = $this->input->get('query');
		$emailQuery  = $this->input->get('id');
		$userEmail	 = $this->session->userdata('EMAIL');

		//SET EACH PARAMETER TO MATCH THE DATABASE
		if ($searchQuery == 'created') {
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
