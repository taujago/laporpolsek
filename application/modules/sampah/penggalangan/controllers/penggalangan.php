<?php
class penggalangan extends master_controller {

	var $controller ;

	function penggalangan(){
		parent::__construct();
		// $this->load->model("core_model","cm");
		$this->load->model("coremodel","cm");
		$this->load->helper("tanggal");
		$this->load->model("penggalangan_model","dm");
		$this->controller = get_class($this);

	}

	function index(){
		// echo "fuckkk.."; exit;
		$userdata = $this->session->userdata("userdata");

		$controller = get_class($this);

 		$data_array['arr_bulan'] = arr_bulan();
		$data_array['controller'] = $controller;	 
 		 
		$content = $this->load->view($controller."_view",$data_array,true);

		$this->set_subtitle("DATA PENGGALANGAN");
		$this->set_title("DATA PENGGALANGAN");
		$this->set_content($content);
		$this->render_baru();
	}


function get_data(){
		$controller = get_class($this);
	 	$userdata = $this->session->userdata("userdata");
      	$draw = $_REQUEST['draw']; // get the requested page 
    	$start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:"pelaksana_id"; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"asc"; // get the direction if(!$sidx) $sidx =1;  
        
        $tgl_awal = (isset($_REQUEST['columns'][1]['search']['value']))?$_REQUEST['columns'][1]['search']['value']:"";
        $tgl_akhir = (isset($_REQUEST['columns'][2]['search']['value']))?$_REQUEST['columns'][2]['search']['value']:"";
        // $tanggal_awal = $_REQUEST['columns'][4]['search']['value'];
        // $tanggal_akhir = $_REQUEST['columns'][6]['search']['value'];
        // $status = $_REQUEST['columns'][7]['search']['value'];
        


      //  order[0][column]
        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null,
				"tgl_awal" =>$tgl_awal, 
				"tgl_akhir" =>$tgl_akhir 
				 
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
        	 
$id = $row['penyelidikan_id'];
         
        	$arr_data[] = array(
        		 
        		  			 	
        		  				 
        		  				flipdate($row['penyelidikan_tgl_daftar']), 
        		  				flipdate($row['penyelidikan_tgl']) ."<br />". $row['penyelidikan_nomor'], 
        		  				$row['penyelidikan_isi_perintah'], 
        		  				flipdate($row['penyelidikan_tgl_terima_perintah']), 
        		  				$row['penyelidikan_hasil_pelaksanaan'], 
        		  			  
        		  				"<div class=\"btn-group\"> 
     <a class=\"btn dropdown-toggle btn-primary\" data-toggle=\"dropdown\" href=\"#\">Proses<span class=\"caret\"></span></a>
     
     <ul class=\"dropdown-menu\">
		<li><a  href=\" " . site_url("$controller/edit/".$id) ."\" ><span class=\"glyphicon glyphicon-edit\"></span> Edit </a></li>
		<li><a  href=\" " . site_url("$controller/detail/".$id) ."\" ><span class=\"glyphicon glyphicon-eye-open\"></span> Detail </a></li>
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

		$data = array(	"dasar_point_3"=>"",
			"dasar_point_7"=>"",
			"pertimbangan_point_a" =>"","penyelidikan_id"=>"","penyelidikan_tentang"=>"",
		"penyelidikan_tgl_daftar"=>"","penyelidikan_tgl_terima_perintah"=>"",
		"penyelidikan_nomor"=>"","penyelidikan_tgl"=>"","penyelidikan_hasil_pelaksanaan"=>"",
		"penyelidikan_waktu_pelaporan"=>"","penyelidikan_keterangan"=>"","penyelidikan_isi_perintah"=>"");



		$data['action']="simpan";
		$data['mode']="I";
		$data['arr_pangkat'] = $this->cm->get_arr_dropdown('pangkat','pangkat_id','pangkat_nama','pangkat_nama');
		
		$data['controller'] = $this->controller;
		$content = $this->load->view($this->controller."_view_form",$data,true);
		$this->set_subtitle("INPUT DATA PENGGALANGAN");
		$this->set_title("PENGGALANGAN");
		$this->set_content($content);
		$this->render_baru();
	 
} 


function simpan(){
		$data=$this->input->post();
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('penyelidikan_tgl_daftar','Tanggal Daftar','required');	 
		// $this->form_validation->set_rules('pelaksana_nip','NIP','required');			
		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');

 		$data['penyelidikan_tgl_daftar'] = flipdate($data['penyelidikan_tgl_daftar']);
 		$data['penyelidikan_tgl_terima_perintah'] = flipdate($data['penyelidikan_tgl_terima_perintah']);
 		$data['penyelidikan_tgl'] = flipdate($data['penyelidikan_tgl']);
 		$data['penyelidikan_waktu_pelaporan'] = flipdate($data['penyelidikan_waktu_pelaporan']);

 		//show_array($data);

		if($this->form_validation->run() == TRUE ) { 
			unset($data['mode']);
			unset($data['penyelidikan_id']);
			 $res = $this->db->insert("penggalangan",$data);
			 // echo $this->db->last_query(); exit;
			 if($res) {
			 	$ret = array("error"=>false,"message"=>"data berhasil disimpan");
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
		 
		$data = $this->dm->detail($id)->row_array(); 
		$data['penyelidikan_tgl_daftar'] = flipdate($data['penyelidikan_tgl_daftar']);
 		$data['penyelidikan_tgl_terima_perintah'] = flipdate($data['penyelidikan_tgl_terima_perintah']);
 		$data['penyelidikan_tgl'] = flipdate($data['penyelidikan_tgl']);
 		$data['penyelidikan_waktu_pelaporan'] = flipdate($data['penyelidikan_waktu_pelaporan']);
 
 		$data['action']="update";
		$data['mode']="U";
		$data['arr_pangkat'] = $this->cm->get_arr_dropdown('pangkat','pangkat_id','pangkat_nama','pangkat_nama');
		
		$data['controller'] = $this->controller;
		$content = $this->load->view($this->controller."_view_form",$data,true);
		
		$this->set_subtitle("EDIT DATA PENGGALANGAN");
		$this->set_title("EDIT DATA PENGGALANGAN");
		$this->set_content($content);
		$this->render_baru();
	}


function update(){
		$data=$this->input->post();
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('penyelidikan_tgl_daftar','Tanggal Daftar','required');	 	
		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');
		if($this->form_validation->run() == TRUE ) { 
			

 		$data['penyelidikan_tgl_daftar'] = flipdate($data['penyelidikan_tgl_daftar']);
 		$data['penyelidikan_tgl_terima_perintah'] = flipdate($data['penyelidikan_tgl_terima_perintah']);
 		$data['penyelidikan_tgl'] = flipdate($data['penyelidikan_tgl']);
 		$data['penyelidikan_waktu_pelaporan'] = flipdate($data['penyelidikan_waktu_pelaporan']);



			unset($data['mode']);			 
			$this->db->where("penyelidikan_id",$data['penyelidikan_id']);
			 $res = $this->db->update("penggalangan",$data);
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
	$this->db->where("penyelidikan_id",$data['id']);
	$res = $this->db->delete("penggalangan");
	if($res){
		$ret = array("error"=>false,"message"=>"Data Berhasi dihapus");

	}
	else {
		$ret = array("error"=>true,"message"=>"Data gagal dihapus");
	}
	echo json_encode($ret);
}


function detail($id){
	$data = $this->dm->detail($id)->row_array(); 
	$data['penyelidikan_tgl_daftar'] = flipdate($data['penyelidikan_tgl_daftar']);
 		$data['penyelidikan_tgl_terima_perintah'] = flipdate($data['penyelidikan_tgl_terima_perintah']);
 		$data['penyelidikan_tgl'] = flipdate($data['penyelidikan_tgl']);
 		$data['penyelidikan_waktu_pelaporan'] = flipdate($data['penyelidikan_waktu_pelaporan']);
 		$data['penyelidikan_id']  =  $id;
$data['controller'] = $this->controller;
		$content = $this->load->view($this->controller."_detail_view",$data,true);
		
		$this->set_subtitle("DETAIL DATA PENGGALANGAN");
		$this->set_title("DETAIL DATA PENGGALANGAN");
		$this->set_content($content);
		$this->render_baru();

}


function rencana($id){
		$data = $this->dm->detail($id)->row_array(); 
		$data['penyelidikan_tgl_daftar'] = flipdate($data['penyelidikan_tgl_daftar']);
 		$data['penyelidikan_tgl_terima_perintah'] = flipdate($data['penyelidikan_tgl_terima_perintah']);
 		$data['penyelidikan_tgl'] = flipdate($data['penyelidikan_tgl']);
 		$data['penyelidikan_waktu_pelaporan'] = flipdate($data['penyelidikan_waktu_pelaporan']);
 		$data['penyelidikan_id']  =  $id;
		$data['controller'] = $this->controller;
		$data['baru_link'] = site_url("$this->controller/rencana_baru/$id");
		$data['back_link'] = site_url("$this->controller/detail/$id");
		$content = $this->load->view("rencana/".$this->controller."_rencana_view",$data,true);
		
		
		$this->set_subtitle("DATA RENCANA PENGGALANGAN : ". $data['penyelidikan_nomor']);
		$this->set_title("DATA RENCANA PENGGALANGAN : ". $data['penyelidikan_nomor']);
		$this->set_content($content);
		$this->render_baru();
}

function rencana_get_data($id){
		$controller = get_class($this);
	 	$userdata = $this->session->userdata("userdata");
      	$draw = $_REQUEST['draw']; // get the requested page 
    	$start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:"pelaksana_id"; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"asc"; // get the direction if(!$sidx) $sidx =1;  
        
        // $tgl_awal = (isset($_REQUEST['columns'][1]['search']['value']))?$_REQUEST['columns'][1]['search']['value']:"";
        // $tgl_akhir = (isset($_REQUEST['columns'][2]['search']['value']))?$_REQUEST['columns'][2]['search']['value']:"";
        // // $tanggal_awal = $_REQUEST['columns'][4]['search']['value'];
        // $tanggal_akhir = $_REQUEST['columns'][6]['search']['value'];
        // $status = $_REQUEST['columns'][7]['search']['value'];
        


      //  order[0][column]
        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null,
				 
				"penyelidikan_id" =>$id 
				 
		);     
           
        $row = $this->dm->rencana_data($req_param)->result_array();
		
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->rencana_data($req_param)->result_array();
        

       
        $arr_data = array();
        foreach($result as $row) : 
		//$daft_id = $row['daft_id'];
        	 
		$id = $row['id'];
         
        	$arr_data[] = array(
        		 
        		  				$row['no_urut'],        
        		  				$row['pokok_masalah'],         		  				 
        		  				$row['indikasi'], 
        		  				$row['info_yangdiperlukan'],         		  				 
        		  				$row['badan_pengumpul'], 
        		  				 
        		  				"<div class=\"btn-group\"> 
     <a class=\"btn dropdown-toggle btn-primary\" data-toggle=\"dropdown\" href=\"#\">Proses<span class=\"caret\"></span></a>
     
     <ul class=\"dropdown-menu\">
		<li><a  href=\" " . site_url("$controller/rencana_edit/".$id) ."\" ><span class=\"glyphicon glyphicon-edit\"></span> Edit </a></li>
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


function rencana_baru($id){

		$datax = $this->dm->detail($id)->row_array(); 
		
		$data = array("pokok_masalah"=>"","indikasi"=>"","info_yangdiperlukan"=>"",
			"penyelidikan_id"=>$id,"badan_pengumpul"=>"","id"=>"",
		"sumber_informasi"=>"","waktu"=>"","tempat"=>"","catatan"=>"","no_urut"=>"");


		// show_array($data); exit;

		$data['action']="rencana_simpan";
		$data['mode']="I";
 		$data['back_link'] = site_url("$this->controller/rencana/$id");
		$data['controller'] = $this->controller;
		$content = $this->load->view("rencana/".$this->controller."_rencana_view_form",$data,true);
		$this->set_subtitle("INPUT DATA RENCANA PENGGALANGAN ". $datax['penyelidikan_nomor']);
		$this->set_title("INPUT DATA RENCANA PENGGALANGAN ". $datax['penyelidikan_nomor']);
		$this->set_content($content);
		$this->render_baru();
	 
} 


function rencana_simpan(){
		$data=$this->input->post();
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('pokok_masalah','Pokok Masalah','required');	 
		$this->form_validation->set_rules('indikasi','Indikasi','required');
		// $this->form_validation->set_rules('pelaksana_nip','NIP','required');			
		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');

 		//$data['waktu'] = flipdate($data['waktu']);
 		 

 		//show_array($data);

		if($this->form_validation->run() == TRUE ) { 
			unset($data['mode']);
			unset($data['id']);
			 $res = $this->db->insert("penggalangan_rencana",$data);
			 // echo $this->db->last_query(); exit;
			 if($res) {
			 	$ret = array("error"=>false,"message"=>"data berhasil disimpan");
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



function rencana_edit($id){
		 
	 	 

		$data = $this->dm->detail_rencana($id)->row_array(); 

		//show_array($data); 
		$data_penyelidikan = $this->dm->detail($data['penyelidikan_id'])->row_array();

		$data['waktu'] = flipdate($data['waktu']);
		
	 

		$data['action']="rencana_update";
		$data['mode']="U";
 		$data['back_link'] = site_url("$this->controller/rencana/".$data['penyelidikan_id']);
		$data['controller'] = $this->controller;
		$content = $this->load->view("rencana/".$this->controller."_rencana_view_form",$data,true);
		$this->set_subtitle("EDIT DATA RENCANA PENGGALANGAN ". $data_penyelidikan['penyelidikan_nomor']);
		$this->set_title("EDIT DATA RENCANA PENGGALANGAN ". $data_penyelidikan['penyelidikan_nomor']);
		$this->set_content($content);
		$this->render_baru();
	}

	
function rencana_update(){
		$data=$this->input->post();
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('pokok_masalah','Pokok Masalah','required');	 
		$this->form_validation->set_rules('indikasi','Indikasi','required'); 	
		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');
		if($this->form_validation->run() == TRUE ) { 
			

 		//$data['waktu'] = flipdate($data['waktu']);



			unset($data['mode']);			 
			$this->db->where("id",$data['id']);
			 $res = $this->db->update("penggalangan_rencana",$data);
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

function rencana_hapus(){
	$data = $this->input->post();
	$this->db->where("id",$data['id']);
	$res = $this->db->delete("penggalangan_rencana");
	if($res){
		$ret = array("error"=>false,"message"=>"Data Berhasi dihapus");

	}
	else {
		$ret = array("error"=>true,"message"=>"Data gagal dihapus");
	}
	echo json_encode($ret);
}	

////////// BEGIN OF PELAKSANA 


function pelaksana($id){
		$data = $this->dm->detail($id)->row_array(); 
		$data['penyelidikan_tgl_daftar'] = flipdate($data['penyelidikan_tgl_daftar']);
 		$data['penyelidikan_tgl_terima_perintah'] = flipdate($data['penyelidikan_tgl_terima_perintah']);
 		$data['penyelidikan_tgl'] = flipdate($data['penyelidikan_tgl']);
 		$data['penyelidikan_waktu_pelaporan'] = flipdate($data['penyelidikan_waktu_pelaporan']);
 		$data['penyelidikan_id']  =  $id;
		$data['controller'] = $this->controller;
		$data['baru_link'] = site_url("$this->controller/pelaksana_baru/$id");
		$data['back_link'] = site_url("$this->controller/detail/$id");
		$content = $this->load->view("pelaksana/".$this->controller."_pelaksana_view",$data,true);
		
		
		$this->set_subtitle("DATA PELAKSANA PENGGALANGAN : ". $data['penyelidikan_nomor']);
		$this->set_title("DATA PELAKSANA PENGGALANGAN : ". $data['penyelidikan_nomor']);
		$this->set_content($content);
		$this->render_baru();
}

function pelaksana_get_data($id){
	$controller = get_class($this);
	 	$userdata = $this->session->userdata("userdata");
      	$draw = $_REQUEST['draw']; // get the requested page 
    	$start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:"no_urut"; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"asc"; // get the direction if(!$sidx) $sidx =1;  
        
        // $tgl_awal = (isset($_REQUEST['columns'][1]['search']['value']))?$_REQUEST['columns'][1]['search']['value']:"";
        // $tgl_akhir = (isset($_REQUEST['columns'][2]['search']['value']))?$_REQUEST['columns'][2]['search']['value']:"";
        // // $tanggal_awal = $_REQUEST['columns'][4]['search']['value'];
        // $tanggal_akhir = $_REQUEST['columns'][6]['search']['value'];
        // $status = $_REQUEST['columns'][7]['search']['value'];
        


      //  order[0][column]
        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null,
				 
				"penyelidikan_id" =>$id 
				 
		);     
           
        $row = $this->dm->pelaksana_data($req_param)->result_array();
		
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->pelaksana_data($req_param)->result_array();
        

       
        $arr_data = array();
        foreach($result as $row) : 
		//$daft_id = $row['daft_id'];
        	 
		$id = $row['id'];
         
        	$arr_data[] = array(
        		 
        		  				$row['no_urut'],        
        		  				$row['pelaksana_nip'],         		  				 
        		  				$row['pelaksana_nrp'], 
        		  				$row['pelaksana_nama'],         		  				 
        		  				$row['jabatan'],         		  				
        		  			  
        		  				"<div class=\"btn-group\"> 
     <a class=\"btn dropdown-toggle btn-primary\" data-toggle=\"dropdown\" href=\"#\">Proses<span class=\"caret\"></span></a>
     
     <ul class=\"dropdown-menu\">
		<li><a  href=\" " . site_url("$controller/pelaksana_edit/".$id) ."\" ><span class=\"glyphicon glyphicon-edit\"></span> Edit </a></li>
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


function pelaksana_baru($id){

		$datax = $this->dm->detail($id)->row_array(); 
		
		$data = array("penyelidikan_id"=>$id,
			"no_urut"=>"","pelaksana_id"=>"","jabatan"=>""
		 );


		// show_array($data); exit;
		$data['arr_pelaksana'] = $this->cm->get_arr_dropdown("pelaksana", "pelaksana_id","pelaksana_nama","pelaksana_nama");
		
		$data['action']="pelaksana_simpan";
		$data['mode']="I";
 		$data['back_link'] = site_url("$this->controller/pelaksana/$id");
		$data['controller'] = $this->controller;
		$content = $this->load->view("pelaksana/".$this->controller."_pelaksana_view_form",$data,true);
		$this->set_subtitle("INPUT DATA PELAKSANA PENGGALANGAN ". $datax['penyelidikan_nomor']);
		$this->set_title("INPUT DATA PELAKSANA PENGGALANGAN ". $datax['penyelidikan_nomor']);
		$this->set_content($content);
		$this->render_baru();
	 
} 


function cek_pelaksana($pelaksana_id) {
	$penyelidikan_id = $_POST['penyelidikan_id'];
	$this->db->where("penyelidikan_id",$penyelidikan_id);
	$this->db->where("pelaksana_id",$pelaksana_id);
	$res = $this->db->get("penyelidikan_pelaksana");
	if($res->num_rows() > 0) {
		$this->form_validation->set_message('cek_pelaksana', ' %s Untuk Penyelidikan ini sudah terdaftar ');
		return false;
	}



}


function pelaksana_simpan(){
		$data=$this->input->post();
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('pelaksana_id','Pelaksana','callback_cek_pelaksana');	 
 		// $this->form_validation->set_rules('pelaksana_nip','NIP','required');			
		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');

 	 
 		 

 		//show_array($data);

		if($this->form_validation->run() == TRUE ) { 
			unset($data['mode']);
			unset($data['id']);
			 $res = $this->db->insert("penggalangan_pelaksana",$data);
			 // echo $this->db->last_query(); exit;
			 if($res) {
			 	$ret = array("error"=>false,"message"=>"data berhasil disimpan");
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



function pelaksana_edit($id){
		 
	 	 

		$data = $this->dm->detail_pelaksana($id)->row_array(); 

		//show_array($data); 
		$data_penyelidikan = $this->dm->detail($data['penyelidikan_id'])->row_array();

		

		
	 
		$data['arr_pelaksana'] = $this->cm->get_arr_dropdown("pelaksana", "pelaksana_id","pelaksana_nama","pelaksana_nama");
		$data['action']="pelaksana_update";
		$data['mode']="U";
 		$data['back_link'] = site_url("$this->controller/pelaksana/".$data['penyelidikan_id']);
		$data['controller'] = $this->controller;
		$content = $this->load->view("pelaksana/".$this->controller."_pelaksana_view_form",$data,true);
		$this->set_subtitle("EDIT DATA PELAKSANA PENGGALANGAN ". $data_penyelidikan['penyelidikan_nomor']);
		$this->set_title("EDIT DATA PELAKSANA PENGGALANGAN ". $data_penyelidikan['penyelidikan_nomor']);
		$this->set_content($content);
		$this->render_baru();
	}

	
function pelaksana_update(){
		$data=$this->input->post();
		
		$this->load->library('form_validation');
		// $this->form_validation->set_rules('pokok_masalah','Pokok Masalah','required');	 
		// $this->form_validation->set_rules('indikasi','Indikasi','required'); 	
		$this->form_validation->set_rules('jabatan','Jabatan','callback_cek_pelaksana');	  
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');
		if($this->form_validation->run() == TRUE ) { 
			

 	 



			unset($data['mode']);			 
			$this->db->where("id",$data['id']);
			 $res = $this->db->update("penggalangan_pelaksana",$data);
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

function pelaksana_hapus(){
	$data = $this->input->post();
	$this->db->where("id",$data['id']);
	$res = $this->db->delete("penggalangan_pelaksana");
	if($res){
		$ret = array("error"=>false,"message"=>"Data Berhasi dihapus");

	}
	else {
		$ret = array("error"=>true,"message"=>"Data gagal dihapus");
	}
	echo json_encode($ret);
}	



function cetak_surat_perintah($id){
	 
	 	$this->db->where("penyelidikan_id",$id);
	 	$data = $this->db->get("penggalangan")->row_array();


	 	$this->db->select('*')->from('penggalangan_pelaksana a')
		->join("pelaksana b",'a.pelaksana_id = b.pelaksana_id')
		->join("pangkat c","c.pangkat_id = b.pangkat_id")
		->where('a.penyelidikan_id',$id);
		$this->db->order_by("no_urut");

		$data['rec_pelaksana'] = $this->db->get();

		// echo $this->db->last_query(); exit;
		 
 		 
 		$this->load->library('Pdf');
		$pdf = new Pdf('P', 'mm', 'F4', true, 'UTF-8', false);
		$pdf->SetTitle('Surat Perintah');
		//$pdf->SetHeaderMargin(30);
		//$pdf->SetTopMargin(10);

		$pdf->SetMargins(10, 30, 20);
		$pdf->SetHeaderMargin(15);
		$pdf->SetFooterMargin(20);
		$pdf->setFooterFont(Array('times', '', 8));

 		$pdf->SetAutoPageBreak(true,20);
		$pdf->SetAuthor('Author');
		 
			
		$pdf->setPrintHeader(true);
		$pdf->setPrintFooter(true);

	 
		for($i=1; $i<=5; $i++) : 
		$data['i'] = $i;
		$pdf->AddPage('P');
		$html = $this->load->view("pdf/penggalangan_surat_tugas",$data,true);		 
		$pdf->writeHTML($html, true, false, true, false, '');
		endfor;


		 // $pdf->startTransaction();

		 // $halaman  = $pdf->getPage();
		 

		 // $y = $pdf->getY();
		 
		 // $html = $this->load->view("pdf/penyelidikan_ttd",$data,true);
		 // $pdf->writeHTML($html, true, false, true, false, '');

		 // if( $halaman <> $pdf->getPage() ) {
		 // 	$pdf->rollbackTransaction(true);

		 // 	$pdf->AddPage('L');
		 // 	$html = $this->load->view("pdf/penyelidikan_surat_tugas_head",$data,true);
		 // 	$pdf->writeHTML($html, true, false, true, false, '');

		 // 	$html = $this->load->view("pdf/penyelidikan_ttd",$data,true);
		 // 	$pdf->writeHTML($html, true, false, true, false, '');

		 // }

		 // else if( $y < 20 ) {
		 // 	$pdf->rollbackTransaction(true);

		 // 	//$pdf->AddPage();
		 // 	$html = $this->load->view("pdf/penyelidikan_surat_tugas_head",$data,true);
		 // 	$pdf->writeHTML($html, true, false, true, false, '');

		 // 	$html = $this->load->view("pdf/penyelidikan_ttd",$data,true);
		 // 	$pdf->writeHTML($html, true, false, true, false, '');

		 // }


		$pdf->Output('Surat Penyelidikan .pdf', 'I');

	}



function cetak_rencana($id){
	 
	 	$this->db->where("penyelidikan_id",$id);
	 	$data = $this->db->get("penggalangan")->row_array();


	 	$this->db->select('*')->from('penggalangan_rencana');		
		$this->db->order_by("no_urut");

		$data['rec_rencana'] = $this->db->get();

		// echo $this->db->last_query(); exit;
		 
 		 
 		$this->load->library('Pdf');
		$pdf = new Pdf('L', 'mm', 'F4', true, 'UTF-8', false);
		$pdf->SetTitle('Surat Rencana Pengamanan');
		//$pdf->SetHeaderMargin(30);
		//$pdf->SetTopMargin(10);

		$pdf->SetMargins(10, 30, 10);
		$pdf->SetHeaderMargin(15);
		$pdf->SetFooterMargin(15);
		$pdf->setFooterFont(Array('times', '', 8));

 		$pdf->SetAutoPageBreak(true,10);
		$pdf->SetAuthor('Author');
		 
			
		$pdf->setPrintHeader(true);
	 
		 
		$pdf->AddPage('L');
		$html = $this->load->view("pdf/penggalangan_rencana",$data,true);		 
		$pdf->writeHTML($html, true, false, true, false, '');
		 


		 $pdf->startTransaction();

		 $halaman  = $pdf->getPage();
		 

		 $y = $pdf->getY();
		 
		 $html = $this->load->view("pdf/penggalangan_rencana_ttd",$data,true);
		 $pdf->writeHTML($html, true, false, true, false, '');

		 if( $halaman <> $pdf->getPage() ) {
		 	$pdf->rollbackTransaction(true);

		 	$pdf->AddPage('L');
		 	// $html = $this->load->view("pdf/penggalangan_rencana_head",$data,true);
		 	// $pdf->writeHTML($html, true, false, true, false, '');

		 	$html = $this->load->view("pdf/penggalangan_rencana_ttd",$data,true);
		 	$pdf->writeHTML($html, true, false, true, false, '');

		 }

		 else if( $y < 20 ) {
		 	$pdf->rollbackTransaction(true);

		 	//$pdf->AddPage();
		 	// $html = $this->load->view("pdf/pengamana_rencana_head",$data,true);
		 	// $pdf->writeHTML($html, true, false, true, false, '');

		 	$html = $this->load->view("pdf/pengamana_rencana_ttd",$data,true);
		 	$pdf->writeHTML($html, true, false, true, false, '');

		 }


		$pdf->Output('Surat Rencana Pengamanan .pdf', 'I');

	}


function cetak_agenda($id){

	 


		$tahun = $this->uri->segment(3); 
		$bulan = $this->uri->segment(4); 

	 
	 	$this->db->where("year(penyelidikan_tgl_daftar) = $tahun",null,false);
	 	$this->db->where("month(penyelidikan_tgl_daftar) = $bulan",null,false);
	 	$res = $this->db->get("v_penggalangan");

	 	// echo $this->db->last_query(); // exit;
	 	 
	 	// show_array($data);
		$data['rec_agenda'] = $res ;

		$arr_bulan = arr_bulan();

		$data['tahun'] = $tahun;
		$data['bulan'] = $arr_bulan[$bulan];

		// echo $this->db->last_query(); exit;
		 
 		 
 		$this->load->library('Pdf');
		$pdf = new Pdf('L', 'mm', 'F4', true, 'UTF-8', false);
		$pdf->SetTitle('Buku Agenda Penyelidikan');
		//$pdf->SetHeaderMargin(30);
		//$pdf->SetTopMargin(10);

		
		$pdf->SetMargins(10, 30, 10);
		$pdf->SetHeaderMargin(15);
		$pdf->SetFooterMargin(15);
		$pdf->setFooterFont(Array('times', '', 8));

 		$pdf->SetAutoPageBreak(true,10);
		$pdf->SetAuthor('Author');
		 
			
		$pdf->setPrintHeader(true);
		$pdf->setPrintFooter(true);
		 
		$pdf->AddPage('L');
		$html = $this->load->view("pdf/penggalangan_agenda",$data,true);		 
		$pdf->writeHTML($html, true, false, true, false, '');
		 


		 $pdf->startTransaction();

		 $halaman  = $pdf->getPage();
		 

		 $y = $pdf->getY();
		 
		 $html = $this->load->view("pdf/penggalangan_agenda_ttd",$data,true);
		 $pdf->writeHTML($html, true, false, true, false, '');

		 if( $halaman <> $pdf->getPage() ) {
		 	$pdf->rollbackTransaction(true);

		 	$pdf->AddPage('L');
		 	// $html = $this->load->view("pdf/penggalangan_agenda_head",$data,true);
		 	// $pdf->writeHTML($html, true, false, true, false, '');

		 	$html = $this->load->view("pdf/penggalangan_agenda_ttd",$data,true);
		 	$pdf->writeHTML($html, true, false, true, false, '');

		 }

		 else if( $y < 20 ) {
		 	$pdf->rollbackTransaction(true);

		 	//$pdf->AddPage();
		 	// $html = $this->load->view("pdf/penggalangan_agenda_head",$data,true);
		 	// $pdf->writeHTML($html, true, false, true, false, '');

		 	$html = $this->load->view("pdf/penggalangan_agenda_ttd",$data,true);
		 	$pdf->writeHTML($html, true, false, true, false, '');

		 }


		$pdf->Output('Surat Agenda Penggalangan .pdf', 'I');

	}




}
?>
