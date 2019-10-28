<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class API extends REST_Controller {

	public function __construct() {
		
		parent::__construct();

		$this->load->model('M_api', 'api');
		// $this->output->enable_profiler(TRUE);
		
	}

	public function index_get($id = 0) {
        if(!empty($id)){
            $data = $this->api->getMembers()->result();
        }else{
			$data = 'empty';
        }
     
        $this->response($data, REST_Controller::HTTP_OK);
	}

	public function member() {

		$data = $this->api->getMembers()-result();

		$this->response($data, REST_Controller::HTTP_OK);
	}

	public function Register() {

		$key = $this->input->get('key');
		
		$query = $this->api->getKey($key);

		if($query->num_rows() > 0) {
			
			return $json;
		}

	}

}