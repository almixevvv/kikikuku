<?php if(!defined("BASEPATH")) exit("Hack Attempt");
	class History_order extends CI_Controller {
	    public function view(){
		$page = 'history_order';
	    if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php')){ show_404(); }

		$id = $this->session->userdata("USERID");
		$data['account'] = $this->M_user->loginbyid($id);
		$data['province'] = $this->M_user->slc_prov();
		$data['city'] = $this->M_user->slc_city("");
        
        $this->load->view('templates/header.php', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer.php', $data);
    }
		
	}
?>