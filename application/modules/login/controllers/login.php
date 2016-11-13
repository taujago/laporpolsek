<?php 
class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		//$this->load->helper("serviceurl");
		
	}
	
	function index(){
		$this->load->view("login_view");
	}
	
	
	function logout(){
		unset($_SESSION['userdata']);
		redirect("login");
	}
	
	function ceklogin(){

		$data = $this->input->post();
		$this->db->select("u.*,
			sek.nama_polsek,
			res.nama_polres

			",false);
		$this->db->where("user_id",$data['username']);
		$this->db->where("user_pass",$data['password']);
		$this->db->from("pengguna u")
		->join("m_polres res",'res.id_polres = u.id_polres','left')
		->join("m_polsek sek","sek.id_polsek = u.id_polsek","left");
	 
		$res = $this->db->get();
		// echo $this->db->last_query(); exit;

		if($res->num_rows() == 1 ) {
			//$this->session->set_userdata("login",true);
			$userdata = $res->row_array();
			// show_array($userdata);
 			$_SESSION['userdata'] = $userdata;
 			$_SESSION['userdata']['login'] = true;

 			// show_array($_SESSION);
			//$this->session->set_userdata("userdata",$userdata);

 			if($userdata['level'] == "0"){
 				$url = site_url("index_administrator");
 			}
 			else if ($userdata['level'] == "1") {
 				$url = site_url("index_admindik");
 			}
 			else if ($userdata['level'] == "2") {
 				$url = site_url("index_penyidik");
 			}
 			else {
 				
 				$url = site_url("depan_baru");
 			}


			$ret = array("error"=>false,"message"=>"Login berhasil","url"=>$url);
		}
		else {
			$ret = array("error"=>true,"message"=>"Login gagal");
		}

		echo json_encode($ret);

 
		 
		 
	}
}

?>