<?php if(!defined("BASEPATH")) exit("Hack Attempt");
class Margin_cms extends CI_Controller {
	public function index(){
		$page = 'margin';
		if ( ! file_exists(APPPATH.'/views/pages-cms/'.$page.'.php')){ show_404(); }

		$data['title'] = 'Margin Parameter';

		$this->load->model('M_cms', 'cms');
		$this->load->helper('form');
		
		$data['content'] = $this->cms->select_margin();
		$data['page'] = 'Margin Parameter';

		$data['new_order'] = $this->cms->select_order_new();
		$data['unview_order'] = $this->cms->select_order_unview();


        $this->load->view('templates-cms/header', $data);
        $this->load->view('templates-cms/navbar');
        $this->load->view('pages-cms/margin');
        $this->load->view('templates-cms/footer');
	}

	public function getMargin() {

		// $this->output->enable_profiler(TRUE);
		// echo 'masuk';
		$this->load->helper('form');

		$id = $this->input->get('id');

		$this->load->model('M_cms', 'cms');

		$data['margin'] = $this->cms->singleMargin($id);

 		$this->load->view('pages-cms/modal-margin', $data);
	}

	public function getAddMargin() {

		// $this->output->enable_profiler(TRUE);
		// echo 'masuk';
		$this->load->helper('form');

		// $this->load->model('M_cms', 'cms');

 		$this->load->view('pages-cms/modal-addmargin');
	}

	public function updateMargin(){

		//SET JAM DAN TANGGAL JADI INDONESIA
		date_default_timezone_set('Asia/Jakarta');

		// $this->output->enable_profiler(TRUE);
		// echo "masuk";
		$this->load->model('M_cms', 'cms');

		$recID = $this ->input->post('margin_rec');
		$id = $this->input->post('margin_id');
		$value = $this->input->post('margin_value');
		$description = $this->input->post('margin_desc');
		$updated = date('Y-m-d H:i:s');
		//$updated = $this->input->post('margin_updated');
		// $quantity = $this->input->post('txt_quantity');

		$this->cms->updateMargin($recID, $id, $value, $updated, $description);

		redirect('cms/margin');
	}

	public function addMargin(){

		// $this->output->enable_profiler(TRUE);
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('upload');

		$this->load->model('M_cms', 'cms');

		// $recID = $this ->input->post('margin_rec');
		$id = $this->input->post('margin_id');
		$value = $this->input->post('margin_value');
		$description = $this->input->post('margin_desc');
		$created = date('Y-m-d H:i:s');

		$data = array(
				'REC_ID' => '',
                'ID'  => $id,
                'VALUE' => $value,
                'CREATED_TIME' => $created,
                'UPDATED_TIME' => '',
                'UPDATED_BY' => 'ADMIN',
                'STATUS' => 'CURRENT',
                'DESCRIPTION' => $description
            );
        var_dump($data);

        //UPDATE PREVIOUS DATA
        $this->cms->updateStatus();

		$this->cms->insert_margin($data);

		redirect('cms/margin');
	}

	public function deleteMargin(){

		// $this->output->enable_profiler(TRUE);

		$this->load->model('M_cms', 'cms');
		
		$recID = $this->input->post('hiddenREC');
		$this->cms->delete_margin($recID, 'g_convert');

		// redirect('cms/margin');
	}
}
?>
