<?php if(!defined("BASEPATH")) exit("Hack Attempt");
class Privacy_cms extends CI_Controller {

	public function index(){
		$this->load->model("M_cms");
		$this->load->helper('form');
		//$this->output->enable_profiler(TRUE);
		$page = 'privacy';
		        if ( ! file_exists(APPPATH.'/views/pages-cms/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
		
		//$this->output->enable_profiler(TRUE);


		$data['page'] = 'PRIVACY';
		$data['privacy'] = $this->M_cms->select_privacy();
	    

	    $this->load->view('templates-cms/header', $data);
        $this->load->view('templates-cms/navbar');
        $this->load->view('pages-cms/privacy', $data);
        $this->load->view('templates-cms/footer');
	}
}