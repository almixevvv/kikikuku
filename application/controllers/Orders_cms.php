<?php if(!defined("BASEPATH")) exit("Hack Attempt");
class Orders_cms extends CI_Controller {

	 public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
    }

	public function index() {

		$this->load->model("M_cms");
		$this->load->helper('form');
		$page = 'order_management';

		if ( ! file_exists(APPPATH.'/views/pages-cms/'.$page.'.php')) {
      // Whoops, we don't have a page for that!
      show_404();
    }

		//$this->output->enable_profiler(TRUE);
		$data['page'] = 'Order Management';

		$this->load->model('M_cms', 'cms');
		$data['content'] = $this->cms->select_order();
		$data['new_order'] = $this->cms->select_order_new();
		$data['updated_order'] = $this->M_cms->select_order_updated();
		$data['confirmed_order'] = $this->M_cms->select_order_confirmed();
		$data['paid_order'] = $this->M_cms->select_order_paid();
		$data['unview_order'] = $this->cms->select_order_unview();

		$this->load->view('templates-cms/header', $data);
  		$this->load->view('templates-cms/navbar');
    	$this->load->view('pages-cms/order_management', $data);
    	$this->load->view('templates-cms/footer');

	}

	public function status() {
	$data['page'] = 'ORDER MANAGEMENT';
		// $this->output->enable_profiler(TRUE);

		$this->load->model("M_cms");
		$this->load->helper('form');
		//GET THE PARAMETER FOR QUERY
		$searchQuery = $this->input->get('query');
		// $emailQuery  = $this->input->get('id');
		// $userEmail	 = $this->session->userdata('EMAIL');

		//SET EACH PARAMETER TO MATCH THE DATABASE
		if($searchQuery == 'new') {
				$searchQuery = 'NEW ORDER';
				$data['content'] = $this->M_cms->getOrderMasterDataFromQuery($searchQuery);
		} elseif($searchQuery == 'all') {
			$data['content'] = $this->M_cms->select_order();
		} else {
			strtolower($searchQuery);
			$data['content'] = $this->M_cms->getOrderMasterDataFromQuery($searchQuery);
		}
		$data['new_order'] = $this->M_cms->select_order_new();
		$data['updated_order'] = $this->M_cms->select_order_updated();
		$data['confirmed_order'] = $this->M_cms->select_order_confirmed();
		$data['paid_order'] = $this->M_cms->select_order_paid();
		$data['unview_order'] = $this->M_cms->select_order_unview();


		// $data['userHistory'] = $this->M_cms->getOrderHistoryFromQuery($searchQuery);
		// $data['content'] = $this->M_cms->getOrderMasterDataFromQuery($searchQuery);
		// $data['userEmail'] = $this->session->userdata('EMAIL');

		$this->load->view('templates-cms/header', $data);
		$this->load->view('templates-cms/navbar');
		$this->load->view('pages-cms/order_management', $data);
		$this->load->view('templates-cms/footer');

	}

	public function getDetails() {

		$this->load->helper('form');

		$orderNo = $this->input->get('id');

		$this->load->model('M_cms', 'cms');

		  $data_update = array('VIEW_FLAG'  => '1');

            $this->db->where('ORDER_NO',  $orderNo);
            $this->db->update('g_order_master', $data_update);

		$data['details'] = $this->cms->singleOrder($orderNo);
		$data['internal'] = $this->cms->singleOrder($orderNo);
		$data['messages'] = $this->cms->getOrderMessages($orderNo);

 		$this->load->view('pages-cms/modal-orders', $data);
	}

	public function getPayment() {

		// $this->output->enable_profiler(TRUE);
		// echo 'masuk';
		$this->load->helper('form');

		$id = $this->input->get('id');

		$this->load->model('M_cms', 'cms');

		$data['payment'] = $this->cms->singlePayment($id);

 		$this->load->view('pages-cms/modal-checkpayment', $data);
	}

	public function updateOrder(){

		date_default_timezone_set('Asia/Jakarta');
		$this->output->enable_profiler(TRUE);
		// echo "masuk";
		$this->load->model('M_cms', 'cms');

		$orderNo = $this->input->post('order-no');
		$status = $this->input->post('order-status');
		$prevstatus = $this->input->post('prev_status');
		$finalPrice = $this->input->post('final_price');
		$importCost = $this->input->post('import_cost');
		$spc_instruction = $this->input->post('spc_instruction');
		$internal_notes = $this->input->post('internal_notes');
		$updated = date('Y-m-d H:i:s');
		// $quantity = $this->input->post('txt_quantity');

		$counter = $this->input->post('loop-counter');

		for($i = 1; $i < $counter; $i++) {
			// echo 'hiyaiyahiay'.' '.$i;
			$currentPrice = $this->input->post('final_price_'.$i);
			$currentID = $this->input->post('product_name_'.$i);
			$currentQuantity = $this->input->post('txt_quantity_'.$i);

			$this->cms->updateFinalPrice($currentID, $currentPrice, $currentQuantity);
			// echo 'satu beres';
		}

		$this->cms->updateOrderStatus($orderNo, $status, $importCost, $updated, $spc_instruction, $internal_notes);
		 // $this->load-> AutoSendInvoice($orderNo);

	    if($status == 'UPDATED' && $prevstatus == 'NEW ORDER'){

	    	$this->AutoSendInvoice($orderNo);
	    	// echo 'kirim invoice';
		}

		redirect('cms/orders');
	}

	public function adminSendMessages() {

		$this->load->model('M_profile', 'profile');
		date_default_timezone_set('Asia/Jakarta');

		$this->output->enable_profiler(TRUE);

			$ORDER_ID = $this->input->post('id');
			$message = $this->input->post('message');

			$data = array(
				'SENDER_ID' => 'ADMIN',
        		'ORDER_ID' => $ORDER_ID,
				'MESSAGE' => $message,
				'MESSAGE_TIME' => date('Y-m-d H:m:s'),
				'USER_READ_FLAG' => '0',
				'ADMIN_READ_FLAG' => '0'
			);

			$this->profile->sendMessages($data);

	}

	public function confirmPayment(){

		// $this->output->enable_profiler(TRUE);
		// echo "masuk";
		$this->load->model('M_cms', 'cms');

		$id = $this ->input->post('hiddenid');
		//$updated = $this->input->post('margin_updated');
		// $quantity = $this->input->post('txt_quantity');

		$this->cms->confirmStatus($id);

		redirect('cms/orders');
	}

	public function invoice() {

		$orderNo = $this->input->get('id');

		$this->load->model('M_cms', 'cms');
		$this->load->helper('form');

		$data['details'] = $this->cms->singleOrder($orderNo);

		$this->load->view('email-template/invoice', $data);
	}

	public function sendInvoice() {

		$orderNo = $this->input->post('email-order-no');
		$emailAddress = $this->input->post('email-sender');

		$this->load->model('M_cms', 'cms');

		$data['details'] = $this->cms->singleOrder($orderNo);

		$this->cms->updateFlagInvoce($orderNo);

		$this->load->library('email');

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
		$this->email->to($emailAddress);
		$this->email->set_mailtype('html');

		$message = $this->load->view('email-template/invoice-email', $data, true);

		$this->email->subject('Your Order Invoice - '.$orderNo);
		$this->email->message($message);

		$this->email->send();

		print_r($this->email->print_debugger());

		redirect(base_url('cms/orders'));

	}

	public function AutoSendInvoice($orderNo) {

		//$orderNo = $this->input->post('email-order-no');
		//$emailAddress = $this->input->post('email-sender');
		

		$this->load->model('M_cms', 'cms');

		$data['details'] = $this->cms->singleOrder($orderNo);
		$email= $this->cms->singleOrder($orderNo);
		$dataEmail=$email->result();

		$emailAddress=$dataEmail[0]->MEMBER_EMAIL;
		// echo 
		// exit;
		//$emailAddress = $this->input->post('email-sender');

		$this->cms->updateFlagInvoce($orderNo);

		$this->load->library('email');

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
		$this->email->to($emailAddress);
		$this->email->set_mailtype('html');

		$message = $this->load->view('email-template/invoice-email', $data, true);

		$this->email->subject('Your Order Invoice - '.$orderNo);
		$this->email->message($message);

		$this->email->send();

		print_r($this->email->print_debugger());

		redirect(base_url('cms/orders'));

	}


	public function deleteOrder(){

		// $this->output->enable_profiler(TRUE);

		$this->load->model('M_cms', 'cms');
		
		$orderNo = $this->input->post('orderNo');
		$this->cms->delete_order_master($orderNo, 'g_order_master');
		$this->cms->delete_order_detail($orderNo, 'g_order_detail');

		// redirect('cms/margin');
	}

}
