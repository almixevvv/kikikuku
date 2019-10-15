<?php defined('BASEPATH') OR exit('No direct script access allowed');

class API extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('M_api', 'api');
		// $this->output->enable_profiler(TRUE);

	}

	public function Register() {

		$key = $this->input->get('key');
		
		$query = $this->api->getKey($key);

		if($query->num_rows() > 0) {
			
			return $json;
		}

	}

}