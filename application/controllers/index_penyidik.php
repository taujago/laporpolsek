<?php
class index_penyidik extends penyidik_controller  {
	function index_penyidik(){
		parent::__construct();
		// echo "pilihan ".$this->session->userdata("pilihan"); exit;
	}
	
	
	function index(){
		// $this->set_subtitle("DASHBOARD");
		// $this->set_title("DASHBOARD");
		// $this->set_content("WELCOME");
		// $this->render_baru();

		$content = $this->load->view("depan_view",array(),true);

		$this->set_subtitle("PENYIDIK DASHBOARD");
		$this->set_title("PENYIDIK DASHBOARD");
		$this->set_content($content);
		$this->render_admin();
	}
}
?>