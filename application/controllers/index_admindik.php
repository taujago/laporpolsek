<?php
class index_admindik extends admindik_controller  {
	function index_administrator(){
		parent::__construct();
		// echo "pilihan ".$this->session->userdata("pilihan"); exit;
	}
	
	
	function index(){
		// $this->set_subtitle("DASHBOARD");
		// $this->set_title("DASHBOARD");
		// $this->set_content("WELCOME");
		// $this->render_baru();

		$content = $this->load->view("depan_view",array(),true);

		$this->set_subtitle("ADMINISTRATOR PENYIDIK DASHBOARD");
		$this->set_title("ADMINISTRATOR PENYIDIK DASHBOARD");
		$this->set_content($content);
		$this->render_admin();
	}
}
?>