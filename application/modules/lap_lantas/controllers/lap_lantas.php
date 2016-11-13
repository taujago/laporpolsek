<?php
class lap_lantas extends master_controller {
 	var $controller ;

	function lap_lantas(){
		parent::__construct();
		 
		$this->load->model("coremodel","cm");
		$this->load->helper("tanggal");
		$this->load->model("lap_lantas_model","dm");
		$this->controller = get_class($this);
		$this->userdata = $_SESSION['userdata'];

	}

	function hapus_session(){
		
		$this->session->unset_userdata("temp_lap_laka_lantas_id");
	}

	function index(){
		// echo "fuckkk.."; exit;
		$userdata = $this->session->userdata("userdata");

		$controller = get_class($this);


		// $data['leasing_id'] = $userdata['leasing_id'];
		 


	 
		//show_array($data_array); exit;
		$data_array['controller'] = $controller;

	 

		//$data_array['status'] = ( isset($this->input->get('status'))?$this->input->get('status'):"0"; 
		//echo "uri .. ".$data_array['uri']; exit;
		$data_array['status'] = isset($_GET['status'])?$_GET['status']:'0';
		$content = $this->load->view($controller."_view",$data_array,true);

		$this->set_subtitle("LAPORAN POLISI TIPE LANTAS");
		$this->set_title("LAPORAN  POLISI TIPE LANTAS");
		$this->set_content($content);
		$this->render_baru();
	}


function get_data(){
		$controller = get_class($this);
	 	$userdata = $this->session->userdata("userdata");
      	$draw = $_REQUEST['draw']; // get the requested page 
    	$start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:"level"; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"desc"; // get the direction if(!$sidx) $sidx =1;  
        
        // $no_rangka = $_REQUEST['columns'][5]['search']['value'];
        $tanggal_awal = $_REQUEST['columns'][1]['search']['value'];
        $tanggal_akhir = $_REQUEST['columns'][2]['search']['value'];
        // $id_fungsi = $_REQUEST['columns'][3]['search']['value'];


      //  order[0][column]
        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null ,
				"tanggal_awal" => $tanggal_awal, 
				"tanggal_akhir" => $tanggal_akhir
				 
		);     
           
        $row = $this->dm->data($req_param)->result_array();
		
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->data($req_param)->result_array();
        

       
        $arr_data = array();
        foreach($result as $row) : 
		//$daft_id = $row['daft_id'];
        	 
$id = $row['lap_laka_lantas_id'];
// $user_id = $row['user_id'];
// $this->db->where('id', $user_id);
// $rsnama = $this->db->get('pengguna')->row_array();
// // echo 
// // show_array($rsnama);
// // exit();
// // echo "vangkeh..";
// $nama = "bangkehh.."; //$rsnama['nama'];

        $nama = $row['nama']; 
         
        	$arr_data[] = array(
        		 
								$row['nomor'],
								flipdate($row['tanggal']),
								$row['pelapor_nama'],
								$row['mengetahui_nama'],
								$nama,        		  			 
        		  			  
        		  				"<div class=\"btn-group\"> 
     <a class=\"btn dropdown-toggle btn-primary\" data-toggle=\"dropdown\" href=\"#\">Proses<span class=\"caret\"></span></a>
     
     <ul class=\"dropdown-menu\">
		<li><a  href=\" " . site_url("$controller/edit/".$id) ."\" ><span class=\"glyphicon glyphicon-edit\"></span> Edit </a></li>
		<li><a  href=\" " . site_url("$controller/detail/".$id) ."\" ><span class=\"glyphicon glyphicons-article\"></span> Detail </a></li>

		<li><a  href='#' onclick=\"hapus('". $id ."')\" ><span class=\"glyphicon glyphicon-remove\"></span> Hapus</a></li>
 	 </ul>


	</div> "
        		  				);
        endforeach;

         $responce = array('draw' => $draw, // ($start==0)?1:$start,
        				  'recordsTotal' => $count, 
        				  'recordsFiltered' => $count,
        				  'data'=>$arr_data
        	);
         
        echo json_encode($responce); 
    }



function baru(){



		$temp_lap_laka_lantas_id = $this->session->userdata("temp_lap_laka_lantas_id"); 

		if($temp_lap_laka_lantas_id == "") {
			$xx = md5(date("dmyhis").round(0,100)); 
			$this->session->set_userdata("temp_lap_laka_lantas_id",$xx);
			$temp_lap_laka_lantas_id = $this->session->userdata("temp_lap_laka_lantas_id"); 
		}

		// echo $this->session->userdata("$temp_lap_laka_lantas_id");  exit;

		//$this->session->unset_userdata("temp_lap_laka_lantas_id");
		$data['temp_lap_laka_lantas_id']=$temp_lap_laka_lantas_id;
		$data['action']="simpan";
		$data['lap_a_id']="";
		$data['mode']="I";
		$data['controller'] = $this->controller;

		// show_array($data);


		$data['arr_gol_kejahatan'] = $this->cm->get_arr_dropdown("m_golongan_kejahatan", 
			"id","golongan_kejahatan",'golongan_kejahatan');

		$data['arr_jenis_lokasi'] = $this->cm->get_arr_dropdown("m_jenis_lokasi", 
			"id_jenis_lokasi","jenis_lokasi",'jenis_lokasi');

		$data['arr_fungsi'] = $this->cm->get_arr_dropdown("m_fungsi", 
			"id_fungsi","fungsi",'id_fungsi');


		$data['arr_pangkat'] = $this->cm->get_arr_dropdown("m_pangkat", 
			"id_pangkat","pangkat",'pangkat');

		$data['arr_fungsi'] = $this->cm->get_arr_dropdown("m_fungsi", 
			"id_fungsi","fungsi",'id_fungsi');




		// $data['json_url_terlapor'] = "";
		// $data['json_url_saksi'] = "";
		// $data['json_url_korban'] = "";
		// $data['json_url_barbuk'] = "";



		$data['json_url_pengemudi'] = site_url("$this->controller/temp_get_lap_lantas_pengemudi");
		$data['json_url_saksi'] = site_url("$this->controller/temp_get_lap_lantas_saksi");
		$data['json_url_korban'] = site_url("$this->controller/temp_get_lap_lantas_korban");
		$data['json_url_kendaraan'] = site_url("$this->controller/temp_get_lap_lantas_kendaraan");
		$data['json_url_pasal'] = site_url("$this->controller/temp_get_lap_lantas_pasal");

		$data['pengemudi_add_url'] = site_url("$this->controller/tmp_pengemudi_simpan"); 
		$data['saksi_add_url'] = site_url("$this->controller/tmp_saksi_simpan"); 
		$data['korban_add_url'] = site_url("$this->controller/tmp_korban_simpan"); 
		$data['kendaraan_add_url'] = site_url("$this->controller/tmp_kendaraan_simpan"); 

		$data['pasal_add_url'] = site_url("$this->controller/tmp_pasal_simpan"); 

		





		$content = $this->load->view($this->controller."_view_form",$data,true);
		$this->set_subtitle("INPUT LAPORAN POLISI LAKA LANTAS");
		$this->set_title("INPUT LAPORAN POLISI LAKA LANTAS");
		$this->set_content($content);
		$this->render_baru();
	 
} 


function simpan(){
		$data=$this->input->post();

 

		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('tanggal','Tanggal','required'); 
		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');
		if($this->form_validation->run() == TRUE ) { 
			unset($data['mode']);
			unset($data['lap_laka_lantas_id']);


			$data['tanggal'] = flipdate($data['tanggal']);
			$data['kp_tanggal'] = flipdate($data['kp_tanggal']);

			$userdata = $this->userdata;
			$data['user_id'] = $userdata['id'];

			unset($data['nomor']);

			$data['nomor'] = $this->cm->get_lap_number($this->controller,$data);

		 
			$data['lap_laka_lantas_id'] = md5(microtime());


			 $res = $this->db->insert("lap_laka_lantas",$data);

			 $lap_lantas_id = $data['lap_laka_lantas_id'];

			 if($res) {

			 	$temp_lap_laka_lantas_id = $this->session->userdata("temp_lap_laka_lantas_id");

			 	$arr_update = array("lap_laka_lantas_id"=>$lap_lantas_id);

			 	$this->db->where("temp_laka_lantas_id",$temp_lap_laka_lantas_id);
			 	$this->db->update("lap_laka_pengemudi",$arr_update);

			 	$this->db->where("temp_laka_lantas_id",$temp_lap_laka_lantas_id);
			 	$this->db->update("lap_laka_saksi",$arr_update);

			 	$this->db->where("temp_laka_lantas_id",$temp_lap_laka_lantas_id);
			 	$this->db->update("lap_laka_korban",$arr_update);

			 	$this->db->where("temp_laka_lantas_id",$temp_lap_laka_lantas_id);
			 	$this->db->update("lap_laka_kendaraan",$arr_update);


			 	$this->db->where("temp_lap_laka_lantas_id",$temp_lap_laka_lantas_id);
			 	$this->db->update("lap_laka_pasal",$arr_update);

			 	


			 	$this->session->unset_userdata("temp_lap_laka_lantas_id");
			 	

			 	$ret = array("error"=>false,"message"=>"data laporan tipe Laka Lantas berhasil disimpan");
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





function edit($id){
		 
		$data = $this->dm->detail($id); 


		// $data['tanggal'] = flipdate($data['tanggal']);
		// $data['kp_dilaporkan_pada'] = flipdate($data['kp_dilaporkan_pada']);
		// $data['kp_tanggal'] = flipdate($data['kp_tanggal']);

		// show_array($data); exit;
		//$data = $arr['message'];
		$data['action']="update";
		$data['mode']="U";
		$data['controller'] = $this->controller;


		

		


		$data['arr_pangkat'] = $this->cm->get_arr_dropdown("m_pangkat", 
			"id_pangkat","pangkat",'pangkat');

		$data['arr_fungsi'] = $this->cm->get_arr_dropdown("m_fungsi", 
			"id_fungsi","fungsi",'id_fungsi');
		

 

	$data['json_url_pengemudi'] = site_url("$this->controller/get_lap_lantas_pengemudi/$id");
	$data['json_url_saksi'] = site_url("$this->controller/get_lap_lantas_saksi/$id");
	$data['json_url_korban'] = site_url("$this->controller/get_lap_lantas_korban/$id");
	$data['json_url_kendaraan'] = site_url("$this->controller/get_lap_lantas_kendaraan/$id");
	$data['json_url_pasal'] = site_url("$this->controller/get_lap_lantas_pasal/$id");

	$data['pengemudi_add_url'] = site_url("$this->controller/pengemudi_simpan/$id"); 
	$data['saksi_add_url'] = site_url("$this->controller/saksi_simpan/$id"); 
	$data['korban_add_url'] = site_url("$this->controller/korban_simpan/$id"); 
	$data['kendaraan_add_url'] = site_url("$this->controller/kendaraan_simpan/$id");
	$data['pasal_add_url'] = site_url("$this->controller/pasal_simpan/$id"); 


		$content = $this->load->view($this->controller."_view_form",$data,true);

		


		
		$this->set_subtitle("EDIT DATA LAPORAN TIPE A");
		$this->set_title("EDIT DATA LAPORAN TIPE A");
		$this->set_content($content);
		$this->render_baru();
	}




function update(){
		$data=$this->input->post();
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nomor','Nomor','required');
 		
		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');
		if($this->form_validation->run() == TRUE ) { 
			
			unset($data['mode']);		

			$data['tanggal'] = flipdate($data['tanggal']);
			$data['kp_tanggal'] = flipdate($data['kp_tanggal']);
			 



			$this->db->where("lap_laka_lantas_id",$data['lap_laka_lantas_id']);
			 $res = $this->db->update("lap_laka_lantas",$data);
			 if($res) {
			 	$ret = array("error"=>false,"message"=>"Data berhasil diupdate");
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
	
function hapus(){
	$data = $this->input->post();
	$this->db->where("lap_laka_lantas_id", $data['id']);
	$this->db->delete("lap_laka_korban");

	$this->db->where("lap_laka_lantas_id", $data['id']);
	$this->db->delete("lap_laka_saksi");
	
	$this->db->where("lap_laka_lantas_id", $data['id']);
	$this->db->delete("lap_laka_pengemudi");

	$this->db->where("lap_laka_lantas_id", $data['id']);
	$this->db->delete("lap_laka_kendaraan");

	$this->db->where("lap_laka_lantas_id",$data['id']);
	$res = $this->db->delete("lap_laka_lantas");
	if($res){
		$ret = array("error"=>false,"message"=>"Data Berhasi dihapus");

	}
	else {
		$ret = array("error"=>true,"message"=>"Data gagal dihapus");
	}
	echo json_encode($ret);
}

function detail($id){

	$detail = $this->dm->detail($id);
	$detail['mode'] = "U";
	

	$detail['json_url_pengemudi'] = site_url("$this->controller/get_lap_lantas_pengemudi/$id");
	$detail['json_url_saksi'] = site_url("$this->controller/get_lap_lantas_saksi/$id");
	$detail['json_url_korban'] = site_url("$this->controller/get_lap_lantas_korban/$id");
	$detail['json_url_kendaraan'] = site_url("$this->controller/get_lap_lantas_kendaraan/$id");
	$detail['json_url_pasal'] = site_url("$this->controller/get_lap_lantas_pasal/$id");

	$detail['pengemudi_add_url'] = site_url("$this->controller/pengemudi_simpan/$id"); 
	$detail['saksi_add_url'] = site_url("$this->controller/saksi_simpan/$id"); 
	$detail['korban_add_url'] = site_url("$this->controller/korban_simpan/$id"); 
	$detail['kendaraan_add_url'] = site_url("$this->controller/kendaraan_simpan/$id");
	$detail['pasal_add_url'] = site_url("$this->controller/pasal_simpan/$id"); 


	
	$detail['controller'] = $this->controller;




	//show_array($detail);
	$content = $this->load->view($this->controller."_view_detail",$detail,true);
	$this->set_subtitle("DETAIL LAPORAN POLISI LAKA LANTAS  NOMOR : ".$detail['nomor']);
	$this->set_title("DETAIL  LAPORAN  POLISI  LAKA LANTAS NOMOR : ".$detail['nomor']);
	$this->set_content($content);
	$this->render_baru();


}

function get_detail_json($id) {
	$detail = $this->dm->detail($id);
	$detail['tanggal'] = flipdate($detail['tanggal']);
	$detail['kp_tanggal'] = flipdate($detail['kp_tanggal']);


	// $detail['kp_dilaporkan_pada'] = flipdate($detail['kp_dilaporkan_pada']);
	// $detail['kp_tanggal'] = flipdate($detail['kp_tanggal']);
	// show_array($detail); exit;
	echo json_encode($detail);
}

function get_pasa_edit_dropdown(){
	$post = $this->input->post();
	extract($post);
	$this->db->where("id_fungsi",$id_fungsi);
	$res = $this->db->get("m_pasal");

	$html = "";
	foreach($res->result() as $row) : 
		$sel = ($row->id == $id_pasal)?"selected":"";
		$html .= "<option value=$row->id $sel >$row->pasal </option>";
	endforeach;
	echo $html;
}


function get_lap_lantas_pengemudi($lap_laka_lantas_id) {
	$controller = get_class($this);
	 	$userdata = $this->session->userdata("userdata");
      	$draw = $_REQUEST['draw']; // get the requested page 
    	$start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:"tanggal"; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"desc"; // get the direction if(!$sidx) $sidx =1;  
        
        // $no_rangka = $_REQUEST['columns'][5]['search']['value'];
        // $tanggal_awal = $_REQUEST['columns'][4]['search']['value'];
        // $tanggal_akhir = $_REQUEST['columns'][6]['search']['value'];
        // $status = $_REQUEST['columns'][7]['search']['value'];


      //  order[0][column]
        $req_param = array (
        		"lap_laka_lantas_id" => $lap_laka_lantas_id,
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null 
				 
		);     
           
        $row = $this->dm->get_lap_lantas_pengemudi($req_param)->result_array();
		
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->get_lap_lantas_pengemudi($req_param)->result_array();
        

       
        $arr_data = array();
        foreach($result as $row) : 
		//$daft_id = $row['daft_id'];
        	 
		$id = $row['lap_laka_lantas_pengemudi_id'];
         
        	$arr_data[] = array(
   		 
		$row['pengemudi_nama'],
		$row['pengemudi_jk'],
		flipdate($row['pengemudi_tgl_lahir']),
		$row['pekerjaan'],
		$row['agama'],
		$row['pengemudi_alamat']." - ". $row['desa']." - ".$row['kecamatan']." - ".$row['kota']." -  ".$row['provinsi'], 
		
		
        		  			 
        		  			  
        		  				"<div class=\"btn-group\"> 
     <a class=\"btn dropdown-toggle btn-primary\" data-toggle=\"dropdown\" href=\"#\">Proses<span class=\"caret\"></span></a>
     
     <ul class=\"dropdown-menu\">
		<li><a  href=\"javascript:pengemudi_edit('".$id."')\"><span class=\"glyphicon glyphicon-edit\"></span> Edit </a></li> 

		<li><a  href=\"javascript:pengemudi_hapus('".$id."')\"><span class=\"glyphicon glyphicon-remove\"></span> Hapus</a></li>
 	 </ul>


	</div> ");
        endforeach;

         $responce = array('draw' => $draw, // ($start==0)?1:$start,
        				  'recordsTotal' => $count, 
        				  'recordsFiltered' => $count,
        				  'data'=>$arr_data
        	);
         
        echo json_encode($responce); 
}




function get_lap_lantas_pengemudi_detail($id){
	$data = $this->dm->get_lap_lantas_pengemudi_detail($id);
	$data['pengemudi_tgl_lahir'] = flipdate($data['pengemudi_tgl_lahir']);
	
	echo json_encode($data);
}


// get_lap_lantas_kendaraan_detail




function get_lap_lantas_saksi($lap_laka_lantas_id) {
		$controller = get_class($this);
	 	$userdata = $this->session->userdata("userdata");
      	$draw = $_REQUEST['draw']; // get the requested page 
    	$start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:"id"; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"desc"; // get the direction if(!$sidx) $sidx =1;  
        
        // $no_rangka = $_REQUEST['columns'][5]['search']['value'];
        // $tanggal_awal = $_REQUEST['columns'][4]['search']['value'];
        // $tanggal_akhir = $_REQUEST['columns'][6]['search']['value'];
        // $status = $_REQUEST['columns'][7]['search']['value'];


      //  order[0][column]
        $req_param = array (
        	"lap_laka_lantas_id" => $lap_laka_lantas_id,
        		 
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null 
				 
		);     
           
        $row = $this->dm->get_lap_lantas_saksi($req_param)->result_array();
		
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->get_lap_lantas_saksi($req_param)->result_array();
        

       
        $arr_data = array();
        foreach($result as $row) : 
		//$daft_id = $row['daft_id'];
        	 
		$id = $row['saksi_id'];
         
        	$arr_data[] = array(
   		 
		$row['saksi_nama'],
		$row['saksi_jk'],
		flipdate($row['saksi_tgl_lahir']),
		$row['pekerjaan'],
		$row['agama'],
		$row['saksi_alamat']." - ". $row['desa']." - ".$row['kecamatan']." - ".$row['kota']." -  ".$row['provinsi'],
        		  			 
        		  			  
        		  				"<div class=\"btn-group\"> 
     <a class=\"btn dropdown-toggle btn-primary\" data-toggle=\"dropdown\" href=\"#\">Proses<span class=\"caret\"></span></a>
     
     <ul class=\"dropdown-menu\">
		<li><a  href=\"javascript:saksi_edit('".$id."')\"><span class=\"glyphicon glyphicon-edit\"></span> Edit </a></li> 

		<li><a  href=\"javascript:saksi_hapus('".$id."')\"><span class=\"glyphicon glyphicon-remove\"></span> Hapus</a></li>
 	 </ul>


	</div> ");
        endforeach;

         $responce = array('draw' => $draw, // ($start==0)?1:$start,
        				  'recordsTotal' => $count, 
        				  'recordsFiltered' => $count,
        				  'data'=>$arr_data
        	);
         
        echo json_encode($responce); 
}


function tersangka_add($lap_a_id){
	$detail = $this->dm->detail($lap_a_id);
	// $detail['tanggal'] = flipdate($detail['tanggal']);
	// $detail['kp_dilaporkan_pada'] = flipdate($detail['kp_dilaporkan_pada']);
	// $detail['kp_tanggal'] = flipdate($detail['kp_tanggal']);

	$data['action']="tersangka_simpan";
	$data['lap_a_id']=$lap_a_id; 
	$data['mode']="I";
	$data['controller'] = $this->controller;

 

	//show_array($detail);
	$content = $this->load->view("lap_a_view_detail_form_tersangka",$data,true);
	$this->set_subtitle("TAMBAH DATA TERSANGKA LAPORAN NOMOR : ".$detail['nomor']);
	$this->set_title("TAMBAH DATA TERSANGKA LAPORAN NOMOR : ".$detail['nomor']);
	$this->set_content($content);
	$this->render_baru();

}



function tersangka_simpan($lap_a_id){
		$data=$this->input->post();

 

		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('tersangka_nama','Nama','required'); 
		$this->form_validation->set_rules('tersangka_id_desa','Desa','required'); 
		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');
		if($this->form_validation->run() == TRUE ) { 
			unset($data['tersangka_id']);
			 


			$data['tersangka_tgl_lahir'] = flipdate($data['tersangka_tgl_lahir']);
			$data['lap_a_id'] = $lap_a_id;
			 

			 
			// $data['tanggal'] = flipdate($data['tanggal']);


			 $res = $this->db->insert("lap_a_tersangka",$data);
			 if($res) {
			 	$ret = array("error"=>false,"message"=>"data berhasil disimpan",
			 		"mode"=>"I"
			 		);
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

function tersangka_edit($lap_a_id){
	$detail = $this->dm->detail($lap_a_id);

	// $detail['tanggal'] = flipdate($detail['tanggal']);
	// $detail['kp_dilaporkan_pada'] = flipdate($detail['kp_dilaporkan_pada']);
	// $detail['kp_tanggal'] = flipdate($detail['kp_tanggal']);
	$data['id'] = $this->uri->segment(4);
	$data['action']="tersangka_update";
	$data['lap_a_id']=$lap_a_id; 
	$data['mode']="U";
	$data['controller'] = $this->controller;

 

	//show_array($detail);
	$content = $this->load->view("lap_a_view_detail_form_tersangka",$data,true);
	$this->set_subtitle("EDIT DATA TERSANGKA LAPORAN NOMOR : ".$detail['nomor']);
	$this->set_title("EDIT DATA TERSANGKA LAPORAN NOMOR : ".$detail['nomor']);
	$this->set_content($content);
	$this->render_baru();

}

function tersangka_update($lap_a_id){
		$data=$this->input->post();

 

		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('tersangka_nama','Nama','required'); 
		$this->form_validation->set_rules('tersangka_id_desa','Desa','required'); 
		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');
		if($this->form_validation->run() == TRUE ) { 

			$data['id'] = $data['tersangka_id'];
			unset($data['tersangka_id']);
			 


			$data['tersangka_tgl_lahir'] = flipdate($data['tersangka_tgl_lahir']);
			$data['lap_a_id'] = $lap_a_id;
			 

			 
			// $data['tanggal'] = flipdate($data['tanggal']);
			 $this->db->where("id",$data['id']);

			 $res = $this->db->update("lap_a_tersangka",$data);
			 if($res) {
			 	$ret = array("error"=>false,"message"=>"data berhasil disimpan",
			 		"mode"=>"U");
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


function tersangka_hapus(){
	$data = $this->input->post();
	$this->db->where("id",$data['id']);
	$res = $this->db->delete("lap_a_tersangka");
	if($res){
		$ret = array("error"=>false,"message"=>"Data Berhasi dihapus");

	}
	else {
		$ret = array("error"=>true,"message"=>"Data gagal dihapus");
	}
	echo json_encode($ret);
}





///// saksi 

function saksi_add($lap_a_id){
	$detail = $this->dm->detail($lap_a_id);
	// $detail['tanggal'] = flipdate($detail['tanggal']);
	// $detail['kp_dilaporkan_pada'] = flipdate($detail['kp_dilaporkan_pada']);
	// $detail['kp_tanggal'] = flipdate($detail['kp_tanggal']);

	$data['action']="saksi_simpan";
	$data['lap_a_id']=$lap_a_id; 
	$data['mode']="I";
	$data['controller'] = $this->controller;

 

	//show_array($detail);
	$content = $this->load->view("lap_a_view_detail_form_saksi",$data,true);
	$this->set_subtitle("TAMBAH DATA SAKSI LAPORAN NOMOR : ".$detail['nomor']);
	$this->set_title("TAMBAH DATA SAKSI LAPORAN NOMOR : ".$detail['nomor']);
	$this->set_content($content);
	$this->render_baru();

}



function saksi_simpan($lap_laka_lantas_id){
		$data=$this->input->post();

 

		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('saksi_nama','Nama','required'); 
		$this->form_validation->set_rules('saksi_id_desa','Desa','required'); 
		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');
		if($this->form_validation->run() == TRUE ) { 
			unset($data['saksi_id']);
			 


			$data['saksi_tgl_lahir'] = flipdate($data['saksi_tgl_lahir']);
			$data['lap_laka_lantas_id'] = $lap_laka_lantas_id;
			 

			 
			// $data['tanggal'] = flipdate($data['tanggal']);

			$data['saksi_id'] = md5(microtime());
			 $res = $this->db->insert("lap_laka_saksi",$data);
			 if($res) {
			 	$ret = array("error"=>false,"message"=>"data berhasil disimpan",
			 		"mode"=>"I");
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

function saksi_edit($lap_a_id){
	$detail = $this->dm->detail($lap_a_id);

	// $detail['tanggal'] = flipdate($detail['tanggal']);
	// $detail['kp_dilaporkan_pada'] = flipdate($detail['kp_dilaporkan_pada']);
	// $detail['kp_tanggal'] = flipdate($detail['kp_tanggal']);
	$data['id'] = $this->uri->segment(4);
	$data['action']="saksi_update";
	$data['lap_a_id']=$lap_a_id; 
	$data['mode']="U";
	$data['controller'] = $this->controller;

 

	//show_array($detail);
	$content = $this->load->view("lap_a_view_detail_form_saksi",$data,true);
	$this->set_subtitle("EDIT DATA SAKSI LAPORAN NOMOR : ".$detail['nomor']);
	$this->set_title("EDIT DATA SAKSI LAPORAN NOMOR : ".$detail['nomor']);
	$this->set_content($content);
	$this->render_baru();

}



function get_lap_lantas_saksi_detail($id){
	$data = $this->dm->get_lap_lantas_saksi_detail($id);
	$data['saksi_tgl_lahir'] = flipdate($data['saksi_tgl_lahir']);
	echo json_encode($data);
}

function saksi_update($lap_a_id){
		$data=$this->input->post();

 

		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('saksi_nama','Nama','required'); 
		$this->form_validation->set_rules('saksi_id_desa','Desa','required'); 
		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');
		if($this->form_validation->run() == TRUE ) { 

			$data['id'] = $data['saksi_id'];
			unset($data['saksi_id']);
			 


			$data['saksi_tgl_lahir'] = flipdate($data['saksi_tgl_lahir']);
			$data['lap_a_id'] = $lap_a_id;
			 

			 
			// $data['tanggal'] = flipdate($data['tanggal']);
			 $this->db->where("id",$data['id']);

			 $res = $this->db->update("lap_a_saksi",$data);
			 if($res) {
			 	$ret = array("error"=>false,"message"=>"data berhasil disimpan",
			 		"mode"=>"U");
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


function saksi_hapus(){
	$data = $this->input->post();
	$this->db->where("saksi_id",$data['id']);
	$res = $this->db->delete("lap_laka_saksi");
	if($res){
		$ret = array("error"=>false,"message"=>"Data Saksi Berhasi dihapus");

	}
	else {
		$ret = array("error"=>true,"message"=>"Data gagal dihapus");
	}
	echo json_encode($ret);
}

function pengemudi_hapus(){
	$data = $this->input->post();
	$this->db->where("lap_laka_lantas_pengemudi_id",$data['id']);
	$res = $this->db->delete("lap_laka_pengemudi");
	if($res){
		
		$ret = array("error"=>false,"message"=>"Data Pengemudi Berhasi dihapus");

	}
	else {
		$ret = array("error"=>true,"message"=>"Data gagal dihapus");
	}
	echo json_encode($ret);
}





///// korban handler  

function korban_add($lap_a_id){
	$detail = $this->dm->detail($lap_a_id);
	// $detail['tanggal'] = flipdate($detail['tanggal']);
	// $detail['kp_dilaporkan_pada'] = flipdate($detail['kp_dilaporkan_pada']);
	// $detail['kp_tanggal'] = flipdate($detail['kp_tanggal']);

	$data['action']="korban_simpan";
	$data['lap_a_id']=$lap_a_id; 
	$data['mode']="I";
	$data['controller'] = $this->controller;

 

	//show_array($detail);
	$content = $this->load->view("lap_a_view_detail_form_korban",$data,true);
	$this->set_subtitle("TAMBAH DATA KORBAN LAPORAN NOMOR : ".$detail['nomor']);
	$this->set_title("TAMBAH DATA KORBAN LAPORAN NOMOR : ".$detail['nomor']);
	$this->set_content($content);
	$this->render_baru();

}



function korban_simpan($lap_laka_lantas_id){
		$data=$this->input->post();

 

		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('korban_nama','Nama','required'); 
		$this->form_validation->set_rules('korban_id_desa','Desa','required'); 
		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');
		if($this->form_validation->run() == TRUE ) { 
			unset($data['korban_id']);
			 


			$data['korban_tgl_lahir'] = flipdate($data['korban_tgl_lahir']);
			$data['lap_laka_lantas_id'] = $lap_laka_lantas_id;
			 

			 
			// $data['tanggal'] = flipdate($data['tanggal']);

			$data['korban_id'] = md5(microtime());

			 $res = $this->db->insert("lap_laka_korban",$data);
			 if($res) {
			 	$ret = array("error"=>false,"message"=>"data berhasil disimpan",
			 		"mode"=>"I");
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

function korban_edit($lap_a_id){
	$detail = $this->dm->detail($lap_a_id);

	// $detail['tanggal'] = flipdate($detail['tanggal']);
	// $detail['kp_dilaporkan_pada'] = flipdate($detail['kp_dilaporkan_pada']);
	// $detail['kp_tanggal'] = flipdate($detail['kp_tanggal']);
	$data['id'] = $this->uri->segment(4);
	$data['action']="korban_update";
	$data['lap_a_id']=$lap_a_id; 
	$data['mode']="U";
	$data['controller'] = $this->controller;

 

	//show_array($detail);
	$content = $this->load->view("lap_a_view_detail_form_korban",$data,true);
	$this->set_subtitle("EDIT DATA KORBAN LAPORAN NOMOR : ".$detail['nomor']);
	$this->set_title("EDIT DATA KORBAN LAPORAN NOMOR : ".$detail['nomor']);
	$this->set_content($content);
	$this->render_baru();

}



function get_lap_lantas_korban_detail($id){
	$data = $this->dm->get_lap_lantas_korban_detail($id);
	$data['korban_tgl_lahir'] = flipdate($data['korban_tgl_lahir'] );
	echo json_encode($data);
}

function korban_update($lap_a_id){
		$data=$this->input->post();

 

		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('korban_nama','Nama','required'); 
		$this->form_validation->set_rules('korban_id_desa','Desa','required'); 
		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');
		if($this->form_validation->run() == TRUE ) { 

			$data['id'] = $data['korban_id'];
			unset($data['korban_id']);
			 


			$data['korban_tgl_lahir'] = flipdate($data['korban_tgl_lahir']);
			$data['lap_a_id'] = $lap_a_id;
			 

			 
			// $data['tanggal'] = flipdate($data['tanggal']);
			 $this->db->where("id",$data['id']);

			 $res = $this->db->update("lap_a_korban",$data);
			 if($res) {
			 	$ret = array("error"=>false,"message"=>"data berhasil disimpan",
			 		"mode"=>"U");
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


function korban_hapus(){
	$data = $this->input->post();
	$this->db->where("korban_id",$data['id']);
	$res = $this->db->delete("lap_laka_korban");
	if($res){
		$tmpl = $this->db->last_query();
		$ret = array("error"=>false,"message"=>"Data Berhasi dihapus".$tmpl);

	}
	else {
		$ret = array("error"=>true,"message"=>"Data gagal dihapus");
	}
	echo json_encode($ret);
}

/// end of korban 







function get_lap_lantas_kendaraan($lap_laka_lantas_id) {




		$controller = get_class($this);
	 	$userdata = $this->session->userdata("userdata");
      	$draw = $_REQUEST['draw']; // get the requested page 
    	$start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:"id"; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"desc"; // get the direction if(!$sidx) $sidx =1;  
        
        // $no_rangka = $_REQUEST['columns'][5]['search']['value'];
        // $tanggal_awal = $_REQUEST['columns'][4]['search']['value'];
        // $tanggal_akhir = $_REQUEST['columns'][6]['search']['value'];
        // $status = $_REQUEST['columns'][7]['search']['value'];


      //  order[0][column]
        $req_param = array (
        		"lap_laka_lantas_id" =>  $lap_laka_lantas_id,
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null 
				 
		);     
           
        $row = $this->dm->get_lap_lantas_kendaraan($req_param)->result_array();
		
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->get_lap_lantas_kendaraan($req_param)->result_array();
        

       
        $arr_data = array();
        foreach($result as $row) : 
		//$daft_id = $row['daft_id'];
        	 
		$id = $row['id'];
         
        	$arr_data[] = array(
   		 
		
		$row['no_polisi'],
		$row['jenis'],
		$row['tipe'],
		$row['model'],
		$row['tahun_buat'],
		$row['kondisi_ban'],
 
        		  			 
        		  			  
        		  				"<div class=\"btn-group\"> 
     <a class=\"btn dropdown-toggle btn-primary\" data-toggle=\"dropdown\" href=\"#\">Proses<span class=\"caret\"></span></a>
     
     <ul class=\"dropdown-menu\">
		<li><a  href=\"javascript:kendaraan_edit('".$id."')\"><span class=\"glyphicon glyphicon-edit\"></span> Edit </a></li> 

		<li><a  href=\"javascript:kendaraan_hapus('".$id."')\"><span class=\"glyphicon glyphicon-remove\"></span> Hapus</a></li>
 	 </ul>


	</div> ");
        endforeach;

         $responce = array('draw' => $draw, // ($start==0)?1:$start,
        				  'recordsTotal' => $count, 
        				  'recordsFiltered' => $count,
        				  'data'=>$arr_data
        	);
         
        echo json_encode($responce); 
}




//// 
///// korban handler  

function kendaraan_add($lap_a_id){
	$detail = $this->dm->detail($lap_a_id);
	// $detail['tanggal'] = flipdate($detail['tanggal']);
	// $detail['kp_dilaporkan_pada'] = flipdate($detail['kp_dilaporkan_pada']);
	// $detail['kp_tanggal'] = flipdate($detail['kp_tanggal']);

	$data['action']="kendaraan_simpan";
	$data['lap_a_id']=$lap_a_id; 
	$data['mode']="I";
	$data['controller'] = $this->controller;

 

	//show_array($detail);
	$content = $this->load->view("lap_a_view_detail_form_barbuk",$data,true);
	$this->set_subtitle("TAMBAH DATA BARANG BUKTI LAPORAN NOMOR : ".$detail['nomor']);
	$this->set_title("TAMBAH DATA BARANG BUKTI LAPORAN NOMOR : ".$detail['nomor']);
	$this->set_content($content);
	$this->render_baru();

}



function kendaraan_simpan($lap_laka_lantas_id){
		$data=$this->input->post();

 

		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('no_polisi','Nomor Polisi','required'); 
		$this->form_validation->set_rules('tahun_buat','Tahun buat','required|numeric'); 


		
 		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');
		if($this->form_validation->run() == TRUE ) { 
			unset($data['id']);
			 


 			$data['lap_laka_lantas_id'] = $lap_laka_lantas_id;
			 

			 
			// $data['tanggal'] = flipdate($data['tanggal']);

 			$data['id'] = md5(microtime());
			 $res = $this->db->insert("lap_laka_kendaraan",$data);
			 if($res) {
			 	$ret = array("error"=>false,"message"=>"data berhasil disimpan",
			 		"mode"=>"I");
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

function kendaraan_edit($lap_a_id){
	$detail = $this->dm->detail($lap_a_id);

	// $detail['tanggal'] = flipdate($detail['tanggal']);
	// $detail['kp_dilaporkan_pada'] = flipdate($detail['kp_dilaporkan_pada']);
	// $detail['kp_tanggal'] = flipdate($detail['kp_tanggal']);
	$data['id'] = $this->uri->segment(4);
	$data['action']="kendaraan_update";
	$data['lap_a_id']=$lap_a_id; 
	$data['mode']="U";
	$data['controller'] = $this->controller;

 

	//show_array($detail);
	$content = $this->load->view("lap_a_view_detail_form_barbuk",$data,true);
	$this->set_subtitle("EDIT DATA BARANG BUKTI LAPORAN NOMOR : ".$detail['nomor']);
	$this->set_title("EDIT DATA BARANG BUKTI LAPORAN NOMOR : ".$detail['nomor']);
	$this->set_content($content);
	$this->render_baru();

}



function kendaraan_update($lap_a_id){
		$data=$this->input->post();

 

		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('kendaraan_nama','Nama','required'); 
 		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');
		if($this->form_validation->run() == TRUE ) { 

			$data['id'] = $data['kendaraan_id'];
			unset($data['kendaraan_id']);
			$data['lap_a_id'] = $lap_a_id;
			 

			 
			// $data['tanggal'] = flipdate($data['tanggal']);
			 $this->db->where("id",$data['id']);

			 $res = $this->db->update("lap_lantas_kendaraan",$data);
			 // echo $this->db->last_query();
			 if($res) {
			 	$ret = array("error"=>false,"message"=>"data berhasil disimpan",
			 		"mode"=>"U");
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


function kendaraan_hapus(){
	$data = $this->input->post();
	$this->db->where("id",$data['id']);
	$res = $this->db->delete("lap_laka_kendaraan");
	if($res){
		$ret = array("error"=>false,"message"=>"Dat Kendaraan Berhasi dihapus");

	}
	else {
		$ret = array("error"=>true,"message"=>"Data  gagal dihapus");
	}
	echo json_encode($ret);
}

/// end of barbuk 




function pasal_simpan($lap_laka_lantas_id){
		$data=$this->input->post();

 

		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('id_pasal','Nama','required'); 
 		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');
		if($this->form_validation->run() == TRUE ) { 
			unset($data['id']);
			 


 			$data['lap_laka_lantas_id'] = $lap_laka_lantas_id;

 			 
			 

			 
			// $data['tanggal'] = flipdate($data['tanggal']);

 			$data['id'] = md5(microtime());
			 $res = $this->db->insert("lap_laka_pasal",$data);
			 if($res) {
			 	$ret = array("error"=>false,"message"=>"data berhasil disimpan",
			 		"mode"=>"I");
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






function pengemudi_simpan($lap_laka_lantas_id){
		$data=$this->input->post();

 

		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('pengemudi_nama','Nama','required'); 
		$this->form_validation->set_rules('pengemudi_tgl_lahir','Nama','required'); 
 		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');
		if($this->form_validation->run() == TRUE ) { 
			unset($data['id']);
			 


 			$data['lap_laka_lantas_id'] = $lap_laka_lantas_id;

 			 
			 

			 
			$data['pengemudi_tgl_lahir'] = flipdate($data['pengemudi_tgl_lahir']);

 			$data['lap_laka_lantas_pengemudi_id'] = md5(microtime());
			 $res = $this->db->insert("lap_laka_pengemudi",$data);
			 if($res) {
			 	$ret = array("error"=>false,"message"=>"data berhasil disimpan",
			 		"mode"=>"I");
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



function temp_get_lap_lantas_pengemudi() {


		$controller = get_class($this);
	 	$userdata = $this->session->userdata("userdata");
      	$draw = $_REQUEST['draw']; // get the requested page 
    	$start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:"id"; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"desc"; // get the direction if(!$sidx) $sidx =1;  
        
        // $no_rangka = $_REQUEST['columns'][5]['search']['value'];
        // $tanggal_awal = $_REQUEST['columns'][4]['search']['value'];
        // $tanggal_akhir = $_REQUEST['columns'][6]['search']['value'];
        // $status = $_REQUEST['columns'][7]['search']['value'];


      //  order[0][column]
        $req_param = array (
        		"temp_lap_laka_lantas_id" => $this->session->userdata("temp_lap_laka_lantas_id"),
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null 
				 
		);     
           
        $row = $this->dm->temp_get_lap_lantas_pengemudi($req_param)->result_array();
		
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->temp_get_lap_lantas_pengemudi($req_param)->result_array();
        

       
        $arr_data = array();
        foreach($result as $row) : 
		//$daft_id = $row['daft_id'];
        	 
		$id = $row['lap_laka_lantas_pengemudi_id'];
         
        	$arr_data[] = array(
   		 
		$row['pengemudi_nama'],
		$row['pengemudi_jk'],
		flipdate($row['pengemudi_tgl_lahir']),
		$row['pekerjaan'],
		$row['agama'],
		$row['pengemudi_alamat']." - ". $row['desa']." - ".$row['kecamatan']." - ".$row['kota']." -  ".$row['provinsi'], 
		
		
        		  			 
        		  			  
        		  				"<div class=\"btn-group\"> 
     <a class=\"btn dropdown-toggle btn-primary\" data-toggle=\"dropdown\" href=\"#\">Proses<span class=\"caret\"></span></a>
     
     <ul class=\"dropdown-menu\">
		<li><a  href=\"javascript:pengemudi_edit('".$id."')\"><span class=\"glyphicon glyphicon-edit\"></span> Edit </a></li> 

		<li><a  href=\"javascript:pengemudi_hapus('".$id."')\"><span class=\"glyphicon glyphicon-remove\"></span> Hapus</a></li>
 	 </ul>


	</div> ");
        endforeach;

         $responce = array('draw' => $draw, // ($start==0)?1:$start,
        				  'recordsTotal' => $count, 
        				  'recordsFiltered' => $count,
        				  'data'=>$arr_data
        	);
         
        echo json_encode($responce); 
}







function tmp_pengemudi_simpan(){
		$data=$this->input->post();


		$lap_laka_lantas_id = $this->session->userdata("temp_lap_laka_lantas_id"); 
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('pengemudi_nama','Nama','required'); 
		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');
		if($this->form_validation->run() == TRUE ) { 
			unset($data['lap_laka_lantas_pengemudi_id']);
			 


			
			$data['pengemudi_tgl_lahir'] = flipdate($data['pengemudi_tgl_lahir']);
			$data['temp_laka_lantas_id'] = $lap_laka_lantas_id;
			 

			 
			// $data['tanggal'] = flipdate($data['tanggal']);

			 $data['lap_laka_lantas_pengemudi_id'] = md5(microtime());
			 $res = $this->db->insert("lap_laka_pengemudi",$data);
			 // echo $this->db->last_query();
			 // exit();


			 if($res) {
			 	$ret = array("error"=>false,"message"=>"Data tersangka berhasil disimpan",
			 		"mode"=>"I"
			 		);
			 }
			 else {
			 	$ret = array("error"=>true,"message"=>mysql_error()."gagal database" );
			 }
			 
		}
		else {
			$ret = array("error"=>true,"message"=>validation_errors().'validation error');
		}
		
		echo json_encode($ret);
		
	}




function tmp_pengemudi_update(){
		$data=$this->input->post();

 

		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('pengemudi_nama','Nama','required');  
		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');
		if($this->form_validation->run() == TRUE ) { 

			
		 
			// $data['tanggal'] = flipdate($data['tanggal']);
			$data['pengemudi_tgl_lahir'] = flipdate($data['pengemudi_tgl_lahir'] );
			 $this->db->where("lap_laka_lantas_pengemudi_id",$data['lap_laka_lantas_pengemudi_id']);

			 $res = $this->db->update("lap_laka_pengemudi",$data);
			 if($res) {
			 	$ret = array("error"=>false,"message"=>"data pengemudi berhasil  diupdate",
			 		"mode"=>"U");
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








/////// =========== #SAKSI SECTION ============ ///// 

function temp_get_lap_lantas_saksi() {


		$controller = get_class($this);
	 	$userdata = $this->session->userdata("userdata");
      	$draw = $_REQUEST['draw']; // get the requested page 
    	$start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:"id"; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"desc"; // get the direction if(!$sidx) $sidx =1;  
        
        // $no_rangka = $_REQUEST['columns'][5]['search']['value'];
        // $tanggal_awal = $_REQUEST['columns'][4]['search']['value'];
        // $tanggal_akhir = $_REQUEST['columns'][6]['search']['value'];
        // $status = $_REQUEST['columns'][7]['search']['value'];


      //  order[0][column]
        $req_param = array (
        		"temp_laka_lantas_id" => $this->session->userdata("temp_lap_laka_lantas_id"),
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null 
				 
		);     
           
        $row = $this->dm->temp_get_lap_lantas_saksi($req_param)->result_array();
		
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->temp_get_lap_lantas_saksi($req_param)->result_array();
        

       
        $arr_data = array();
        foreach($result as $row) : 
		//$daft_id = $row['daft_id'];
        	 
		$id = $row['saksi_id'];
         
        	$arr_data[] = array(
   		 
		$row['saksi_nama'],
		$row['saksi_jk'],
		flipdate($row['saksi_tgl_lahir']),
		$row['pekerjaan'],
		$row['agama'],
		$row['saksi_alamat']." - ". $row['desa']." - ".$row['kecamatan']." - ".$row['kota']." -  ".$row['provinsi'],
        		  			 
        		  			  
        		  				"<div class=\"btn-group\"> 
     <a class=\"btn dropdown-toggle btn-primary\" data-toggle=\"dropdown\" href=\"#\">Proses<span class=\"caret\"></span></a>
     
     <ul class=\"dropdown-menu\">
		<li><a  href=\"javascript:saksi_edit('".$id."')\"><span class=\"glyphicon glyphicon-edit\"></span> Edit </a></li> 

		<li><a  href=\"javascript:saksi_hapus('".$id."')\"><span class=\"glyphicon glyphicon-remove\"></span> Hapus</a></li>
 	 </ul>


	</div> ");
        endforeach;

         $responce = array('draw' => $draw, // ($start==0)?1:$start,
        				  'recordsTotal' => $count, 
        				  'recordsFiltered' => $count,
        				  'data'=>$arr_data
        	);
         
        echo json_encode($responce); 
}




function tmp_saksi_simpan(){
		$data=$this->input->post();


		$temp_lap_laka_lantas_id = $this->session->userdata("temp_lap_laka_lantas_id"); 
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('saksi_nama','Nama','required');  
		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');
		if($this->form_validation->run() == TRUE ) { 
			unset($data['saksi_id']);
			 


			
			$data['saksi_tgl_lahir'] = flipdate($data['saksi_tgl_lahir']);
			$data['temp_laka_lantas_id'] = $temp_lap_laka_lantas_id;
			 

			 
			// $data['tanggal'] = flipdate($data['tanggal']);

			 $data['saksi_id'] = md5(microtime());

			 $res = $this->db->insert("lap_laka_saksi",$data);
			 // echo $this->db->last_query();
			 if($res) {
			 	$ret = array("error"=>false,"message"=>"Data saksi berhasil disimpan",
			 		"mode"=>"I"
			 		);
			 }
			 else {
			 	$ret = array("error"=>true,"message"=>mysql_error()."gagal dtabase" );
			 }
			 
		}
		else {
			$ret = array("error"=>true,"message"=>validation_errors().'validation error');
		}
		
		echo json_encode($ret);
		
	}




function tmp_saksi_update(){
		$data=$this->input->post();

		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('saksi_nama','Nama','required');  
		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');
		if($this->form_validation->run() == TRUE ) { 

			$data['saksi_id'] = $data['saksi_id'];
			// unset($data['saksi_id']);
			 


			 $data['saksi_tgl_lahir'] = flipdate($data['saksi_tgl_lahir']);

			 
			// $data['tanggal'] = flipdate($data['tanggal']);
			 $this->db->where("saksi_id",$data['saksi_id']);

			 $res = $this->db->update("lap_laka_saksi",$data);
			 if($res) {
			 	$ret = array("error"=>false,"message"=>"data saksi berhasil  diupdate",
			 		"mode"=>"U");
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






/////// =========== #KORBAN SECTION ============ ///// 

function temp_get_lap_lantas_korban() {


		$controller = get_class($this);
	 	$userdata = $this->session->userdata("userdata");
      	$draw = $_REQUEST['draw']; // get the requested page 
    	$start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:"id"; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"desc"; // get the direction if(!$sidx) $sidx =1;  
        
        // $no_rangka = $_REQUEST['columns'][5]['search']['value'];
        // $tanggal_awal = $_REQUEST['columns'][4]['search']['value'];
        // $tanggal_akhir = $_REQUEST['columns'][6]['search']['value'];
        // $status = $_REQUEST['columns'][7]['search']['value'];


      //  order[0][column]
        $req_param = array (
        		"temp_laka_lantas_id" => $this->session->userdata("temp_lap_laka_lantas_id"),
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null 
				 
		);     
           
        $row = $this->dm->temp_get_lap_lantas_korban($req_param)->result_array();
		
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->temp_get_lap_lantas_korban($req_param)->result_array();
        

       
        $arr_data = array();
        foreach($result as $row) : 
		//$daft_id = $row['daft_id'];
        	 
		$id = $row['korban_id'];
         
        	$arr_data[] = array(
   		 
		$row['korban_nama'],
		$row['korban_jk'],
		flipdate($row['korban_tgl_lahir']),
		$row['pekerjaan'],
		$row['agama'],
		$row['korban_alamat']." - ". $row['desa']." - ".$row['kecamatan']." - ".$row['kota']." -  ".$row['provinsi'],
		$row['korban_cidera'],
		$row['korban_tmp_dirawat'],
        		  			 
        		  			  
        		  				"<div class=\"btn-group\"> 
     <a class=\"btn dropdown-toggle btn-primary\" data-toggle=\"dropdown\" href=\"#\">Proses<span class=\"caret\"></span></a>
     
     <ul class=\"dropdown-menu\">
		<li><a  href=\"javascript:korban_edit('".$id."')\"><span class=\"glyphicon glyphicon-edit\"></span> Edit </a></li> 

		<li><a  href=\"javascript:korban_hapus('".$id."')\"><span class=\"glyphicon glyphicon-remove\"></span> Hapus</a></li>
 	 </ul>


	</div> ");
        endforeach;

         $responce = array('draw' => $draw, // ($start==0)?1:$start,
        				  'recordsTotal' => $count, 
        				  'recordsFiltered' => $count,
        				  'data'=>$arr_data
        	);
         
        echo json_encode($responce); 
}



function get_lap_lantas_korban($lap_laka_lantas_id) {


		$controller = get_class($this);
	 	$userdata = $this->session->userdata("userdata");
      	$draw = $_REQUEST['draw']; // get the requested page 
    	$start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:"id"; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"desc"; // get the direction if(!$sidx) $sidx =1;  
        
        // $no_rangka = $_REQUEST['columns'][5]['search']['value'];
        // $tanggal_awal = $_REQUEST['columns'][4]['search']['value'];
        // $tanggal_akhir = $_REQUEST['columns'][6]['search']['value'];
        // $status = $_REQUEST['columns'][7]['search']['value'];


      //  order[0][column]
        $req_param = array (
        		"lap_laka_lantas_id" => $lap_laka_lantas_id,
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null 
				 
		);     
           
        $row = $this->dm->get_lap_lantas_korban($req_param)->result_array();
		
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->get_lap_lantas_korban($req_param)->result_array();
        

       
        $arr_data = array();
        foreach($result as $row) : 
		//$daft_id = $row['daft_id'];
        	 
		$id = $row['korban_id'];
         
        	$arr_data[] = array(
   		 
		$row['korban_nama'],
		$row['korban_jk'],
		flipdate($row['korban_tgl_lahir']),
		$row['pekerjaan'],
		$row['agama'],
		$row['korban_alamat']." - ". $row['desa']." - ".$row['kecamatan']." - ".$row['kota']." -  ".$row['provinsi'],
		$row['korban_cidera'],
		$row['korban_tmp_dirawat'],
        		  			 
        		  			  
        		  				"<div class=\"btn-group\"> 
     <a class=\"btn dropdown-toggle btn-primary\" data-toggle=\"dropdown\" href=\"#\">Proses<span class=\"caret\"></span></a>
     
     <ul class=\"dropdown-menu\">
		<li><a  href=\"javascript:korban_edit('".$id."')\"><span class=\"glyphicon glyphicon-edit\"></span> Edit </a></li> 

		<li><a  href=\"javascript:korban_hapus('".$id."')\"><span class=\"glyphicon glyphicon-remove\"></span> Hapus</a></li>
 	 </ul>


	</div> ");
        endforeach;

         $responce = array('draw' => $draw, // ($start==0)?1:$start,
        				  'recordsTotal' => $count, 
        				  'recordsFiltered' => $count,
        				  'data'=>$arr_data
        	);
         
        echo json_encode($responce); 
}




function tmp_korban_simpan(){
		$data=$this->input->post();


		$temp_laka_lantas_id = $this->session->userdata("temp_lap_laka_lantas_id"); 
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('korban_nama','Nama','required');  
		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');
		if($this->form_validation->run() == TRUE ) { 
			unset($data['korban_id']);
			 

			$data['korban_tgl_lahir'] = flipdate($data['korban_tgl_lahir']);

			$data['temp_laka_lantas_id'] = $temp_laka_lantas_id;
			 

			 
			// $data['tanggal'] = flipdate($data['tanggal']);

			 $data['korban_id'] = md5(microtime());
			 $res = $this->db->insert("lap_laka_korban",$data);
			 // echo $this->db->last_query();
			 if($res) {
			 	$ret = array("error"=>false,"message"=>"Data korban berhasil disimpan",
			 		"mode"=>"I"
			 		);
			 }
			 else {
			 	$ret = array("error"=>true,"message"=>mysql_error()."gagal dtabase" );
			 }
			 
		}
		else {
			$ret = array("error"=>true,"message"=>validation_errors().'validation error');
		}
		
		echo json_encode($ret);
		
	}




function tmp_korban_update(){
		$data=$this->input->post();

 

		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('korban_nama','Nama','required');  
		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');
		if($this->form_validation->run() == TRUE ) { 

			$data['korban_id'] = $data['korban_id'];
			// unset($data['korban_id']);
			 


			//$data['lap_a_id'] = $lap_a_id;
			 

			 
			$data['korban_tgl_lahir'] = flipdate($data['korban_tgl_lahir']);
			 $this->db->where("korban_id",$data['korban_id']);

			 $res = $this->db->update("lap_laka_korban",$data);
			 if($res) {
			 	$ret = array("error"=>false,"message"=>"data korban berhasil  diupdate",
			 		"mode"=>"U");
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


/////// =========== #BARBUK SECTION ============ ///// 

function temp_get_lap_lantas_kendaraan() {




		$controller = get_class($this);
	 	$userdata = $this->session->userdata("userdata");
      	$draw = $_REQUEST['draw']; // get the requested page 
    	$start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:"id"; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"desc"; // get the direction if(!$sidx) $sidx =1;  
        
        // $no_rangka = $_REQUEST['columns'][5]['search']['value'];
        // $tanggal_awal = $_REQUEST['columns'][4]['search']['value'];
        // $tanggal_akhir = $_REQUEST['columns'][6]['search']['value'];
        // $status = $_REQUEST['columns'][7]['search']['value'];


      //  order[0][column]
        $req_param = array (
        		"temp_laka_lantas_id" =>  $this->session->userdata("temp_lap_laka_lantas_id"),
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null 
				 
		);     
           
        $row = $this->dm->temp_get_lap_lantas_kendaraan($req_param)->result_array();
		
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->temp_get_lap_lantas_kendaraan($req_param)->result_array();
        

       
        $arr_data = array();
        foreach($result as $row) : 
		//$daft_id = $row['daft_id'];
        	 
		$id = $row['id'];
         
        	$arr_data[] = array(
   		 
		
		$row['no_polisi'],
		$row['jenis'],
		$row['tipe'],
		$row['model'],
		$row['tahun_buat'],
		$row['kondisi_ban'],
 
        		  			 
        		  			  
        		  				"<div class=\"btn-group\"> 
     <a class=\"btn dropdown-toggle btn-primary\" data-toggle=\"dropdown\" href=\"#\">Proses<span class=\"caret\"></span></a>
     
     <ul class=\"dropdown-menu\">
		<li><a  href=\"javascript:kendaraan_edit('".$id."')\"><span class=\"glyphicon glyphicon-edit\"></span> Edit </a></li> 

		<li><a  href=\"javascript:kendaraan_hapus('".$id."')\"><span class=\"glyphicon glyphicon-remove\"></span> Hapus</a></li>
 	 </ul>


	</div> ");
        endforeach;

         $responce = array('draw' => $draw, // ($start==0)?1:$start,
        				  'recordsTotal' => $count, 
        				  'recordsFiltered' => $count,
        				  'data'=>$arr_data
        	);
         
        echo json_encode($responce); 
}





function get_lap_lantas_kendaraan_detail($id){
	$data = $this->dm->get_lap_lantas_kendaraan_detail($id);
	//$data['pengemudi_tgl_lahir'] = flipdate($data['pengemudi_tgl_lahir']);
	
	echo json_encode($data);
}






function tmp_kendaraan_simpan(){
		$data=$this->input->post();


		$temp_laka_lantas_id = $this->session->userdata("temp_lap_laka_lantas_id"); 
		
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('no_polisi','Nomor Polisi','required'); 
 		$this->form_validation->set_rules('tahun_buat','Tahun buat','required|numeric');  	
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		$this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka');
		
 		$this->form_validation->set_error_delimiters('', '<br>');
		if($this->form_validation->run() == TRUE ) { 
			
			unset($data['id']);
			 


 
			$data['temp_laka_lantas_id'] = $temp_laka_lantas_id;
			 

			 
			// $data['tanggal'] = flipdate($data['tanggal']);

			 $data['id'] = md5(microtime());


			 $res = $this->db->insert("lap_laka_kendaraan",$data);
			 // echo $this->db->last_query();
			 if($res) {
			 	$ret = array("error"=>false,"message"=>"Data kendaraan berhasil disimpan",
			 		"mode"=>"I"
			 		);
			 }
			 else {
			 	$ret = array("error"=>true,"message"=>mysql_error()."gagal dtabase" );
			 }
			 
		}
		else {
			$ret = array("error"=>true,"message"=>validation_errors().'validation error');
		}
		
		echo json_encode($ret);
		
	}




function tmp_kendaraan_update(){
		$data=$this->input->post();

 

		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('no_polisi','Nama','required'); 
 		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');
		if($this->form_validation->run() == TRUE ) { 

			 
			 
			$this->db->where("id",$data['id']);

			 $res = $this->db->update("lap_laka_kendaraan",$data);
			 if($res) {
			 	$ret = array("error"=>false,"message"=>"data kendaraan berhasil  diupdate",
			 		"mode"=>"U");
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

// #PRINT SECTION 





function temp_get_lap_lantas_pasal() {


		$controller = get_class($this);
	 	$userdata = $this->session->userdata("userdata");
      	$draw = $_REQUEST['draw']; // get the requested page 
    	$start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:"id"; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"desc"; // get the direction if(!$sidx) $sidx =1;  
        
        // $no_rangka = $_REQUEST['columns'][5]['search']['value'];
        // $tanggal_awal = $_REQUEST['columns'][4]['search']['value'];
        // $tanggal_akhir = $_REQUEST['columns'][6]['search']['value'];
        // $status = $_REQUEST['columns'][7]['search']['value'];


      //  order[0][column]
        $req_param = array (
        		"temp_lap_laka_lantas_id" => $this->session->userdata("temp_lap_laka_lantas_id"),
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null 
				 
		);     
           
        $row = $this->dm->temp_get_lap_lantas_pasal($req_param)->result_array();
		
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->temp_get_lap_lantas_pasal($req_param)->result_array();
        

       
        $arr_data = array();
        foreach($result as $row) : 
		//$daft_id = $row['daft_id'];
        	 
		$id = $row['id'];
         
        	$arr_data[] = array(
   		 
		$row['pasal'],
		
 
        		  			 
        		  			  
		"<a class='btn btn-danger' href=\"javascript:pasal_hapus('".$id."')\"><span class=\"glyphicon glyphicon-remove\"></span> Hapus</a>");
        endforeach;

         $responce = array('draw' => $draw, // ($start==0)?1:$start,
        				  'recordsTotal' => $count, 
        				  'recordsFiltered' => $count,
        				  'data'=>$arr_data
        	);
         
        echo json_encode($responce); 
}



function cek_id_pasal($id_pasal) {
	$temp_lap_laka_lantas_id = $this->session->userdata("temp_lap_laka_lantas_id"); 

	if($id_pasal==""){
		$this->form_validation->set_message('cek_id_pasal', ' %s Harus diisi ');
		return false;
	}

	$this->db->where("temp_lap_laka_lantas_id",$temp_lap_laka_lantas_id);
	$this->db->where("id_pasal",$id_pasal);
	if($this->db->get("lap_laka_pasal")->num_rows() >=1 ) {
		$this->form_validation->set_message('cek_id_pasal', ' %s pasal ini sudah ada ');
		return false;
	}
}


function tmp_pasal_simpan(){
		$data=$this->input->post();


		$temp_lap_laka_lantas_id = $this->session->userdata("temp_lap_laka_lantas_id"); 
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('id_pasal','Pasal','callback_cek_id_pasal'); 
 		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');
		if($this->form_validation->run() == TRUE ) { 
			unset($data['id']);
			 
			

 
			$data['temp_lap_laka_lantas_id'] = $temp_lap_laka_lantas_id;


		 

			// show_array($data);
			 

			 
			// $data['tanggal'] = flipdate($data['tanggal']);

			$data['id'] = md5(microtime());


			 $res = $this->db->insert("lap_laka_pasal",$data);
			 // echo $this->db->last_query();
			 if($res) {
			 	$ret = array("error"=>false,"message"=>"Data pasal berhasil ditambahkan",
			 		"mode"=>"I"
			 		);
			 }
			 else {
			 	$ret = array("error"=>true,"message"=>mysql_error()."gagal dtabase" );
			 }
			 
		}
		else {
			$ret = array("error"=>true,"message"=>validation_errors());
		}
		
		echo json_encode($ret);
		
	}


function pasal_hapus(){
	$data = $this->input->post();
	$this->db->where("id",$data['id']);
	$res = $this->db->delete("lap_laka_pasal");
	// echo $this->db->last_query(); 
	if($res){
		$ret = array("error"=>false,"message"=>"Data Berhasi dihapus");

	}
	else {
		$ret = array("error"=>true,"message"=>"Data gagal dihapus");
	}
	echo json_encode($ret);
}




function get_lap_lantas_pasal($lap_laka_lantas_id) {
		$controller = get_class($this);
	 	$userdata = $this->session->userdata("userdata");
      	$draw = $_REQUEST['draw']; // get the requested page 
    	$start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:"id"; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"desc"; // get the direction if(!$sidx) $sidx =1;  
        
        // $no_rangka = $_REQUEST['columns'][5]['search']['value'];
        // $tanggal_awal = $_REQUEST['columns'][4]['search']['value'];
        // $tanggal_akhir = $_REQUEST['columns'][6]['search']['value'];
        // $status = $_REQUEST['columns'][7]['search']['value'];


      //  order[0][column]
        $req_param = array (
        		"lap_laka_lantas_id" => $lap_laka_lantas_id,
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null 
				 
		);     
           
        $row = $this->dm->get_lap_lantas_pasal($req_param)->result_array();
		
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->get_lap_lantas_pasal($req_param)->result_array();
        

       
        $arr_data = array();
        foreach($result as $row) : 
		//$daft_id = $row['daft_id'];
        	 
		$id = $row['id'];
         
        	$arr_data[] = array(
   		 
		$row['pasal'],
		 
        		  			 
        		  			  
        		  				"<a class='btn btn-danger' href=\"javascript:pasal_hapus('".$id."')\"><span class=\"glyphicon glyphicon-remove\"></span> Hapus</a>");
        endforeach;

         $responce = array('draw' => $draw, // ($start==0)?1:$start,
        				  'recordsTotal' => $count, 
        				  'recordsFiltered' => $count,
        				  'data'=>$arr_data
        	);
         
        echo json_encode($responce); 
}


function cetak_laporan($id) {
		
		$data = $this->dm->detail($id);
		// show_array($data); exit;

		$data['pengemudi'] = $this->dm->get_data_pengemudi($id);
		$data['korban'] = $this->dm->get_data_korban($id);
		$data['saksi'] = $this->dm->get_data_saksi($id);
		$data['kendaraan'] = $this->dm->get_data_kendaraan($id);
		$data['tersangka'] = $this->dm->get_data_tersangka($id);
		$data['pasal'] = $this->dm->get_data_pasal($id);
		// echo $this->db->last_query();
		// exit;

		$this->load->library('Pdf');
		$pdf = new Pdf('L', 'mm', 'F4', true, 'UTF-8', false);
		$pdf->SetTitle('LAPORAN KEPOLISIAN');
		//$pdf->SetHeaderMargin(30);
		//$pdf->SetTopMargin(10);

		
		$pdf->SetMargins(10, 20, 10);
		$pdf->SetHeaderMargin(15);
		$pdf->SetFooterMargin(15);
		$pdf->setFooterFont(Array('times', '', 8));

 		$pdf->SetAutoPageBreak(true,10);
		$pdf->SetAuthor('polda banten');
		 
			
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

	 	// show_array($data); exit;
		 
		$pdf->AddPage('P');
		//$data = array();
		$html = $this->load->view("pdf/pdf_laporan",$data,true);		 
		$pdf->writeHTML($html, true, false, true, false, '');
		 


		


		$pdf->Output('LAPORAN POLISI.pdf', 'FI');
}	

function cetak_surat_pernyataan($id) {

	$data = $this->dm->detail($id);
		// show_array($data); exit;

		// $data['tersangka'] = $this->dm->get_data_tersangka($id);
		// $data['korban'] = $this->dm->get_data_korban($id);
		// $data['saksi'] = $this->dm->get_data_saksi($id);
		// $data['barbuk'] = $this->dm->get_datlantas_kendaraan($id);
		// exit;

		$this->load->library('Pdf');
		$pdf = new Pdf('L', 'mm', 'F4', true, 'UTF-8', false);
		$pdf->SetTitle('SURAT PERNYATAAN');
		//$pdf->SetHeaderMargin(30);
		//$pdf->SetTopMargin(10);

		
		$pdf->SetMargins(10, 20, 10);
		$pdf->SetHeaderMargin(15);
		$pdf->SetFooterMargin(15);
		$pdf->setFooterFont(Array('times', '', 8));

 		$pdf->SetAutoPageBreak(true,10);
		$pdf->SetAuthor('polda banten');
		 
			
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

	 	// show_array($data); exit;
		 
		$pdf->AddPage('P');
		//$data = array();
		$html = $this->load->view("pdf/pdf_surat_pernyataan",$data,true);		 
		$pdf->writeHTML($html, true, false, true, false, '');
		 


		


		$pdf->Output('SURAT PERNYATAAN.pdf', 'FI');

}


function cetak_tanda_bukti($id){
		$data = $this->dm->detail($id);
		// $data['terlapor']= $this->dm->get_data_terlapor($id);

		// show_array($data); exit;

		// $data['tersangka'] = $this->dm->get_data_tersangka($id);
		// $data['korban'] = $this->dm->get_data_korban($id);
		// $data['saksi'] = $this->dm->get_data_saksi($id);
		// $data['barbuk'] = $this->dm->get_datlantas_kendaraan($id);
		// exit;

		$this->load->library('Pdf');
		$pdf = new Pdf('L', 'mm', 'F4', true, 'UTF-8', false);
		$pdf->SetTitle('SURAT PERNYATAAN');
		//$pdf->SetHeaderMargin(30);
		//$pdf->SetTopMargin(10);

		
		$pdf->SetMargins(10, 20, 10);
		$pdf->SetHeaderMargin(15);
		$pdf->SetFooterMargin(15);
		$pdf->setFooterFont(Array('times', '', 8));

 		$pdf->SetAutoPageBreak(true,10);
		$pdf->SetAuthor('polda banten');
		 
			
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

	 	// show_array($data); exit;
		 
		$pdf->AddPage('P');
		//$data = array();
		$html = $this->load->view("pdf/pdf_tanda_bukti",$data,true);		 
		$pdf->writeHTML($html, true, false, true, false, '');
		 


		


		$pdf->Output('TANDA BUKTI.pdf', 'FI');
}

function cetak_rekomendasi($id){
	$data = $this->dm->detail($id);
		// $data['terlapor']= $this->dm->get_data_terlapor($id);

		// show_array($data); exit;

		// $data['tersangka'] = $this->dm->get_data_tersangka($id);
		// $data['korban'] = $this->dm->get_data_korban($id);
		// $data['saksi'] = $this->dm->get_data_saksi($id);
		// $data['barbuk'] = $this->dm->get_datlantas_kendaraan($id);
		// exit;

		$this->load->library('Pdf');
		$pdf = new Pdf('L', 'mm', 'F4', true, 'UTF-8', false);
		$pdf->SetTitle('REKOMENDASI PENILAIAN');
		//$pdf->SetHeaderMargin(30);
		//$pdf->SetTopMargin(10);

		
		$pdf->SetMargins(10, 20, 10);
		$pdf->SetHeaderMargin(15);
		$pdf->SetFooterMargin(15);
		$pdf->setFooterFont(Array('times', '', 8));

 		$pdf->SetAutoPageBreak(true,10);
		$pdf->SetAuthor('polda banten');
		 
			
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

	 	// show_array($data); exit;
		 
		$pdf->AddPage('P');
		//$data = array();
		$html = $this->load->view("pdf/pdf_rekomendasi",$data,true);		 
		$pdf->writeHTML($html, true, false, true, false, '');
		 


		


		$pdf->Output('REKOMENDASI PENILAIAN.pdf', 'FI');
}

function grafik() {

	$controller = get_class($this);

	$data_array['controller'] = $controller;

	$query = "SELECT  

			  COUNT(IF(MONTH(tanggal)=1,1,NULL) ) AS Januari,
			  COUNT(IF(MONTH(tanggal)=2,1,NULL) ) AS Februari,
			  COUNT(IF(MONTH(tanggal)=3,1,NULL) ) AS Maret,
			  COUNT(IF(MONTH(tanggal)=4,1,NULL) ) AS April,
			  COUNT(IF(MONTH(tanggal)=5,1,NULL) ) AS Mei,
			  COUNT(IF(MONTH(tanggal)=6,1,NULL) ) AS Juni,
			  COUNT(IF(MONTH(tanggal)=7,1,NULL) ) AS Juli,
			  COUNT(IF(MONTH(tanggal)=8,1,NULL) ) AS Agustus,
			  COUNT(IF(MONTH(tanggal)=9,1,NULL) ) AS September,
			  COUNT(IF(MONTH(tanggal)=10,1,NULL) ) AS Oktober,
			  COUNT(IF(MONTH(tanggal)=11,1,NULL) ) AS November,
			  COUNT(IF(MONTH(tanggal)=12,1,NULL) ) AS Desember

			  FROM lap_laka_lantas
			  WHERE YEAR(tanggal) = ". date('Y');

	$data_array['query'] = $this->db->query($query)->row();
	$data_array['title'] = "GRAFIK LAPORAN LAKA LANTAS";

	$content = $this->load->view($controller."_grafik",$data_array,true);

	$this->set_subtitle("GRAFIK LAPORAN LAKA LANTAS");
	$this->set_title("GRAFIK LAPORAN  LAKA LANTAS");
	$this->set_content($content);
	$this->render_baru();

}

function get_grafik() {

	$controller = get_class($this);

	$tahun = $this->input->post('tahun');
	
	$query = "SELECT  

			  COUNT(IF(MONTH(tanggal)=1,1,NULL) ) AS Januari,
			  COUNT(IF(MONTH(tanggal)=2,1,NULL) ) AS Februari,
			  COUNT(IF(MONTH(tanggal)=3,1,NULL) ) AS Maret,
			  COUNT(IF(MONTH(tanggal)=4,1,NULL) ) AS April,
			  COUNT(IF(MONTH(tanggal)=5,1,NULL) ) AS Mei,
			  COUNT(IF(MONTH(tanggal)=6,1,NULL) ) AS Juni,
			  COUNT(IF(MONTH(tanggal)=7,1,NULL) ) AS Juli,
			  COUNT(IF(MONTH(tanggal)=8,1,NULL) ) AS Agustus,
			  COUNT(IF(MONTH(tanggal)=9,1,NULL) ) AS September,
			  COUNT(IF(MONTH(tanggal)=10,1,NULL) ) AS Oktober,
			  COUNT(IF(MONTH(tanggal)=11,1,NULL) ) AS November,
			  COUNT(IF(MONTH(tanggal)=12,1,NULL) ) AS Desember

			  FROM lap_laka_lantas
			  WHERE YEAR(tanggal) = ".$tahun;

	$data_array['query'] = $this->db->query($query)->row();
	$data_array['tahun'] = $tahun;
	$data_array['title'] = "GRAFIK LAPORAN LAKA LANTAS";

	$this->load->view($controller."_grafik_view",$data_array);

}


}
?>

