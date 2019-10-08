<?php if(!defined("BASEPATH")) exit("Hack Attempt");
class Contact_cms extends CI_Controller {

	public function index(){
		$this->load->model("M_cms");
		$this->load->helper('form');
		//$this->output->enable_profiler(TRUE);
		$page = 'contact';
		        if ( ! file_exists(APPPATH.'/views/pages-cms/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
		
		//$this->output->enable_profiler(TRUE);


		$data['page'] = 'Contact Us';
		$data['contact'] = $this->M_cms->select_contact();
	    

	    $this->load->view('templates-cms/header', $data);
        $this->load->view('templates-cms/navbar');
        $this->load->view('pages-cms/contact', $data);
        $this->load->view('templates-cms/footer');
	}
}