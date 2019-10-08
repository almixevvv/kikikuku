<?php if(!defined("BASEPATH")) exit("Hack Attempt");
class Faq_cms extends CI_Controller {

	public function index(){
		$this->load->model("M_cms");
		$this->load->helper('form');
		///$this->output->enable_profiler(TRUE);
		$page = 'faq';
		        if ( ! file_exists(APPPATH.'/views/pages-cms/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
		
		//d$this->output->enable_profiler(TRUE);


		$data['page'] = 'FAQ';
		$data['faq'] = $this->M_cms->select_faq();
	    

	    $this->load->view('templates-cms/header', $data);
        $this->load->view('templates-cms/navbar');
        $this->load->view('pages-cms/faq', $data);
        $this->load->view('templates-cms/footer');
	}

	public function getAddFaq() {

		
		$this->load->helper('form');

 		$this->load->view('pages-cms/modal-add-faq');
	}

	public function getEditFaq() {

		
		$this->load->helper('form');

		$id = $this->input->get('id');

		$this->load->model('M_cms', 'cms');

		$data['faq'] = $this->cms->singleFaq($id);

 		$this->load->view('pages-cms/modal-edit-faq', $data);
	}

	function addFaq()
	{
		$this->load->model('M_cms', 'cms');

		$titleFaq = $this->input->post('faq_title');
		$contentFaq = $this->input->post('faq_content');

		$this->cms->add_faq($titleFaq,$contentFaq);
		redirect('cms/faq');
	}

	function deleteFaq(){
		$this->load->model('M_cms', 'cms');

		$id = $this->input->post('deleteFaq');
		$this->cms->delete_Faq($id, 'g_faq');

		redirect('cms/faq');

	}

	public function updateFaq(){

		$this->load->model('M_cms', 'cms');

		 $id = $this->input->post('faq_id');
		 $titleFaq = $this->input->post('faq_title');
		 $contentFaq = $this->input->post('faq_content');
		
		$this->cms->update_faq($id, $titleFaq, $contentFaq);

		 redirect('cms/faq');
	}
}