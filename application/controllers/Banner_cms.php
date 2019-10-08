<?php if(!defined("BASEPATH")) exit("Hack Attempt");
class Banner_cms extends CI_Controller {
	public function index(){
		$page = 'banner';
		if ( ! file_exists(APPPATH.'/views/pages-cms/'.$page.'.php')){ show_404(); }
		
		$data['title'] = 'Banner List';

		$this->load->model('M_cms', 'cms');
		$this->load->helper('form');
		
		$data['content'] = $this->cms->select_banner();
		$data['page'] = 'BANNER LIST';		
		
        $this->load->view('templates-cms/header', $data);
        $this->load->view('templates-cms/navbar');
        $this->load->view('pages-cms/banner');
        $this->load->view('templates-cms/footer');
	}

	public function getBanner() {

		
		$this->load->helper('form');

		$id = $this->input->get('id');

		$this->load->model('M_cms', 'cms');

		$data['banner'] = $this->cms->singleBanner($id);

 		$this->load->view('pages-cms/modal-banner', $data);
	}

	public function getAddBanner() {

		
		$this->load->helper('form');

 		$this->load->view('pages-cms/modal-add-banner');
	}

	public function updateBanner(){

		date_default_timezone_set('Asia/Jakarta');

		$this->load->library('upload');

		$this->load->model('M_cms', 'cms');

		$defaultPath = '/image/upload/banner/'.$_FILES['file_image']['name'];

		$id = $this->input->post('banner_id');
		$type = $this->input->post('banner_type');
		$linkType = $this->input->post('banner_linkType');
		$linkTo = $this->input->post('banner_linkTo');
		// $order_no = $this->input->post('banner_orderNo');
		// $flag = $this->input->post('banner_flag');
		$description = $this->input->post('banner_description');
		$updated = date('Y-m-d H:i:s');
		

		$image  = $defaultPath;


		if (empty($_FILES['file_image']['name'])) {
			$this->cms->updateBanners($id, $type, $linkType, $linkTo, $description, $updated);
		}
		else{
			$select_banner=$this->cms->singleBanner($id);
			foreach ($select_banner->result() as $key);
			$img_lama=$key->BANNER_IMAGE;
			unlink(".".$img_lama);

			$this->cms->updateBanner($id, $type, $linkType, $linkTo, $description, $updated,$image);

			$config['upload_path']   = './image/upload/banner/';
			$config['allowed_types'] = 'gif|jpg|png';

			$this->upload->initialize($config);

    		$img = 'file_image';

    		if ( ! $this->upload->do_upload('file_image')) {
    			echo $this->upload->display_errors();
    		} else {
			
			$this->upload->data();
			redirect('cms/banner');
		}

		}

		 redirect('cms/banner');
	}

	public function addBanner(){

		/*$this->output->enable_profiler(TRUE);*/

		date_default_timezone_set('Asia/Jakarta');

		$this->load->library('upload');

		$this->load->model('M_cms', 'cms');

		$defaultPath = '/image/upload/banner/'.$_FILES['file_image']['name'];

		$type = $this->input->post('banner_type');
		$linkType = $this->input->post('banner_linkType');
		$linkTo = $this->input->post('banner_linkTo');
		// $order_no = $this->input->post('banner_orderNo');
		// $flag = $this->input->post('banner_flag');
		$description = $this->input->post('banner_description');
		$created = date('Y-m-d H:i:s');
		
		$image  = $defaultPath;

		$data = array(
			'REC_ID' => '',
            'TYPE'  => $type,
            'LINK_TYPE'  => $linkType,
            'LINKTO'  => $linkTo,
            // 'ORDER_NO'  => $order_no,
            // 'FLAG'  => $flag,
            'DESCRIPTION'  => $description,
            'BANNER_IMAGE' => $image,
            'CREATED' => $created,
            'UPDATED' => ''
            
        );
        var_dump($data);

		$this->cms->insert_banner($data);
		

		$config['upload_path']   = './image/upload/banner/';
    	$config['allowed_types'] = 'gif|jpg|png';

		$this->upload->initialize($config);

    	$img = 'file_image';

		if ( ! $this->upload->do_upload('file_image')) {
			echo $this->upload->display_errors();
		} else {
			$this->upload->data();
			redirect('cms/banner');
	   	}

		redirect('cms/banner');
	}

	function deleteBanner(){
		$this->load->model('M_cms', 'cms');

		$id = $this->input->post('deleteBanner');
		$this->cms->delete_banner($id, 'g_banner');

		redirect('cms/banner');

	}
}
?>