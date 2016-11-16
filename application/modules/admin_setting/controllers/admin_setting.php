<?php
class admin_setting extends admin_controller {

	var $controller ;

	function admin_setting(){
		parent::__construct();
		// $this->load->model("core_model","cm");
		$this->load->model("coremodel","cm");
		$this->load->helper("tanggal");
		//$this->load->model("admin_setting_model","dm");
		$this->controller = get_class($this);

	}

	function index(){
		// echo "fuckkk.."; exit;
		$userdata = $this->session->userdata("userdata");

		$controller = get_class($this);


		$this->db->select('s.*, sek.nama_polsek, sek.id_polres')
		->from("setting s")->join("m_polsek sek","sek.id_polsek = s.id_polsek","left");

		$data_array= $this->db->get()->row_array();


 		
 		$this->db->where("id_polres",$data_array['id_polres']);

 		$res = $this->db->get("m_polsek");
 		foreach($res->result() as $row) : 
 			$data_array['arr_polsek'][$row->id_polsek] = $row->nama_polsek;
		endforeach;


 		// $data_array['arr_polsek'] = $this->db->get("m_polsek")->row_array();



		$data_array['controller'] = $controller;	 
 		 
		$content = $this->load->view($controller."_view",$data_array,true);

		$this->set_subtitle("SETTING SYSTEM");
		$this->set_title("SETTING SYSTEM");
		$this->set_content($content);
		$this->render_admin();
	}

 

function simpan(){
		$data=$this->input->post();
		
		$this->load->library('form_validation');
		 
		$this->form_validation->set_rules('id_polsek','Polsek','required'); 
		$this->form_validation->set_rules('ttd_nama','Nama Penandatangan','required'); 
		$this->form_validation->set_rules('ttd_pangkat','Pangkat','required'); 
		$this->form_validation->set_rules('ttd_nrp','NRP','required');
		 		
		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');
		if($this->form_validation->run() == TRUE ) { 

			 
			 
			 
			unset($data['id_polres']);
			 
			 $res = $this->db->update("setting",$data);
			 if($res) {
			 	$ret = array("error"=>false,"message"=>"data berhasil disimpan","mode"=>"I");
			 }
			 else {
			 	$ret = array("error"=>true,"message"=>$this->db->_error_message());
			 }
			 
		}
		else {
			$ret = array("error"=>true,"message"=>validation_errors());
		}
		
		echo json_encode($ret);
		
	}




  

}
?>
