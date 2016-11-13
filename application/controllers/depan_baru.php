<?php
class depan_baru extends master_controller  {
	function depan_baru(){
		parent::__construct();
		// echo "pilihan ".$this->session->userdata("pilihan"); exit;
	}
	
	
	function index(){
		// $this->set_subtitle("DASHBOARD");
		// $this->set_title("DASHBOARD");
		// $this->set_content("WELCOME");
		// $this->render_baru();

		$content = $this->load->view("depan_view",array(),true);

		$this->set_subtitle("SELAMAT DATANG");
		$this->set_title("SELAMAT DATANG");
		$this->set_content($content);
		$this->render_baru();
	}
}
?>