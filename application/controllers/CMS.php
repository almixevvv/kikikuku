<?php if(!defined("BASEPATH")) exit("Hack Attempt");
	class CMS extends CI_Controller {

		public function index() {

			$this->load->library('session');
			$this->load->helper('url');

			if($this->session->userdata('name') == null) {
				$this->login();
			} else {
				$this->dashboard();
			}
    }

		public function login() {

			$this->load->helper('form');

			$data['page'] = "LOGIN";

			$this->load->view('templates-cms/header', $data);
			$this->load->view('pages-cms/login');
			$this->load->view('templates-cms/footer');
		}

		public function logout() {

			$this->load->library('session');

			$this->session->sess_destroy();

			redirect('cms/login');

		}

		public function login_process() {

			$this->load->library('session');

			$this->load->model('M_cms', 'cms');

			$email = $this->input->post('txt-username');
			$password = $this->input->post('txt-password');

			$hashPassword = sha1($password);

			$checkUsername = $this->cms->checkUsername($email);

			//Check if username exist
			if($checkUsername->num_rows() > 0) {
				//Check if password match
				$query = $this->cms->cms_login($email, $hashPassword);
				if($query->num_rows() > 0) {
					foreach($query->result() as $data) {
						$session = array(
							'id' => $data->ID,
							'name' => $data->NAME,
							'user_group' => $data->GROUP_ID
						);
						$this->session->set_userdata($session);
					}
					redirect('cms/dashboard');
				} else {
					redirect(site_url('cms/login?error=1'));
				}
			} else {
				redirect(site_url('cms/login?error=2'));
			}
		}

		public function getPassword() {

			//$this->output->enable_profiler(TRUE);
			// echo 'masuk';
			$this->load->helper('form');

	 		$this->load->view('pages-cms/modal-edit-password');
	 		//exit;
		}

		public function updatePassword(){
			$id=$this->session->userdata('id');
			$pass=$this->input->post("new_pass");
			$pass2=$this->input->post("confirm_pass");

			if($pass != $pass2) {
				$this->session->set_flashdata('error', 'mismatch');
				redirect('cms/dashboard');
			} else {
				$hashPassword = sha1($pass);

				$this->load->model('M_cms');
				$this->M_cms->changePassword($id,$hashPassword);
				$this->session->set_flashdata('success', 'match');
				redirect('cms/dashboard');
			}
		}

		public function dashboard() {

			$this->load->library('session');
			$this->load->model('M_cms', 'cms');
			
			$this->load->helper('form');

			$data['page'] = "Dashboard";

			$data['new_order'] = $this->cms->select_order_new();
			$data['unview_order'] = $this->cms->select_order_unview();

			$this->load->view('templates-cms/header', $data);
			$this->load->view('templates-cms/navbar');
			$this->load->view('pages-cms/dashboard');
      		$this->load->view('templates-cms/footer');

		}
}
