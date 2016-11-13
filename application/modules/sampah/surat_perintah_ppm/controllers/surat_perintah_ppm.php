<?php
class surat_kmpi  extends master_controller {

	var $controller ;

	function surat_kmpi (){
		parent::__construct();
		// $this->load->model("core_model","cm");
		$this->load->model("coremodel","cm");
		$this->load->helper("tanggal");
		$this->load->model("surat_kmpi_model","dm");
		$this->controller = get_class($this);
		$this->table_name = "surat_kmpi";
		$this->title = "SURAT KETERANGAN MEMBAWA PERALATAN INTELIJEN";

	}

	function index(){
		// echo "fuckkk.."; exit;
		$userdata = $this->session->userdata("userdata");

		$controller = get_class($this);

 		$data_array['arr_bulan'] = arr_bulan();
		$data_array['controller'] = $controller;	 
 		 
		$content = $this->load->view($controller."_view",$data_array,true);

		$this->set_subtitle("DATA SURAT PERINTAH");
		$this->set_title("DATA SURAT PERINTAH");
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
        	 
$id = $row['id'];
         
        	$arr_data[] = array(
        		 
        		  			 	
        		  				 
        		  				flipdate($row['tanggal']),         		  				 
        		  				$row['nomor'],     
        		  				$row['tujuan'],       		  				 
        		  				$row['ttd_nama'] . "<br />". $row['ttd_nip']  , 
        		  				$row['pelaksana_nama'] . "<br />". $row['pelaksana_nip']  ,
        		  			  
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

		$data = array(
					"nomor"  =>"",
					"penandatangan_id"  =>"",
					"pelaksana_id"  =>"",
					"tujuan"  =>"",
					"tanggal"  =>"",
					"id"  =>""
					);



		$data['action']="simpan";
		$data['mode']="I";
		$data['arr_pelaksana'] = $this->cm->get_arr_dropdown('pelaksana','pelaksana_id','pelaksana_nama','pelaksana_nama');
		
		$data['controller'] = $this->controller;
		$content = $this->load->view($this->controller."_view_form",$data,true);
		$this->set_subtitle("INPUT DATA SURAT PERINTAH");
		$this->set_title("SURAT PERINTAH");
		$this->set_content($content);
		$this->render_baru();
	 
} 


function simpan(){
		$data=$this->input->post();
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('tanggal','Tanggal','required');	 
		$this->form_validation->set_rules('nomor','Nomor surat','required');	 
		// $this->form_validation->set_rules('pelaksana_nip','NIP','required');			
		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');

 		$data['tanggal'] = flipdate($data['tanggal']);
 		 



 		//show_array($data);

		if($this->form_validation->run() == TRUE ) { 
			unset($data['mode']);
			unset($data['id']);
			 $res = $this->db->insert("surat_kmpi",$data);
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
		$data['tanggal'] = flipdate($data['tanggal']);
 		 
 
 		$data['action']="update";
		$data['mode']="U";
		$data['arr_pelaksana'] = $this->cm->get_arr_dropdown('pelaksana','pelaksana_id','pelaksana_nama','pelaksana_nama'); 
		
		$data['controller'] = $this->controller;
		$content = $this->load->view($this->controller."_view_form",$data,true);
		
		$this->set_subtitle("EDIT $this->title");
		$this->set_title("EDIT $this->title");
		$this->set_content($content);
		$this->render_baru();
	}


function update(){
		$data=$this->input->post();
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('tanggal','Tanggal','required');	 
		$this->form_validation->set_rules('nomor','Nomor surat','required');	 	 	
		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');
		if($this->form_validation->run() == TRUE ) { 
			

 		$data['tanggal'] = flipdate($data['tanggal']);
 		

			unset($data['mode']);			 
			$this->db->where("id",$data['id']);
			 $res = $this->db->update("surat_kmpi",$data);
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
	$res = $this->db->delete("perintah");
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
		$data['tanggal'] = flipdate($data['tanggal']);
		$data['id']  =  $id;
		$data['controller'] = $this->controller;
		$content = $this->load->view($this->controller."_detail_view",$data,true);

		$this->set_subtitle("DETAIL DATA $this->title");
		$this->set_title("DETAIL DATA $this->title");
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
		
		
		$this->set_subtitle("DATA RENCANA SURAT PERINTAH : ". $data['penyelidikan_nomor']);
		$this->set_title("DATA RENCANA SURAT PERINTAH : ". $data['penyelidikan_nomor']);
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
        		  				$row['sumber_informasi'],         		  				 
        		  				flipdate($row['waktu']) .", ". $row['tempat'],         		  				 
        		  				$row['catatan'], 
        		  			  
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
		$this->set_subtitle("INPUT DATA RENCANA SURAT PERINTAH ". $datax['penyelidikan_nomor']);
		$this->set_title("INPUT DATA RENCANA SURAT PERINTAH ". $datax['penyelidikan_nomor']);
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

 		$data['waktu'] = flipdate($data['waktu']);
 		 

 		//show_array($data);

		if($this->form_validation->run() == TRUE ) { 
			unset($data['mode']);
			unset($data['id']);
			 $res = $this->db->insert("penyelidikan_rencana",$data);
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
		$this->set_subtitle("EDIT DATA RENCANA SURAT PERINTAH ". $data_penyelidikan['penyelidikan_nomor']);
		$this->set_title("EDIT DATA RENCANA SURAT PERINTAH ". $data_penyelidikan['penyelidikan_nomor']);
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
			

 		$data['waktu'] = flipdate($data['waktu']);



			unset($data['mode']);			 
			$this->db->where("id",$data['id']);
			 $res = $this->db->update("penyelidikan_rencana",$data);
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
	$res = $this->db->delete("penyelidikan_rencana");
	if($res){
		$ret = array("error"=>false,"message"=>"Data Berhasi dihapus");

	}
	else {
		$ret = array("error"=>true,"message"=>"Data gagal dihapus");
	}
	echo json_encode($ret);
}	

////////// BEGIN OF PELAKSANA 


function alat($id){
		$data = $this->dm->detail($id)->row_array(); 
		$data['tanggal'] = flipdate($data['tanggal']);
 		 
 		$data['penyelidikan_id']  =  $id;
		$data['controller'] = $this->controller;
		$data['baru_link'] = site_url("$this->controller/alat_baru/$id");
		$data['back_link'] = site_url("$this->controller/detail/$id");
		$content = $this->load->view("alat/alat_view",$data,true);
		
		
		$this->set_subtitle("DATA $this->title : ". $data['nomor']. " | DATA PERALATAN");
		$this->set_title("DATA $this->title: ". $data['nomor']. " | DATA PERALATAN");
		$this->set_content($content);
		$this->render_baru();
}

function alat_get_data($id){
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
				 
				"surat_kmpi_id" =>$id 
				 
		);     
           
        $row = $this->dm->alat_data($req_param)->result_array();
		
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->alat_data($req_param)->result_array();
        

       
        $arr_data = array();
        $x=0;
        foreach($result as $row) : 
		//$daft_id = $row['daft_id'];
        	$x++;
        	 
		$id = $row['id'];
         
        	$arr_data[] = array(
        		 				$x, 
        		  				$row['nama_unit'],        
        		  				$row['jumlah_unit'],         		  				 
        		  			 
        		  			  
        		  				"<div class=\"btn-group\"> 
     <a class=\"btn dropdown-toggle btn-primary\" data-toggle=\"dropdown\" href=\"#\">Proses<span class=\"caret\"></span></a>
     
     <ul class=\"dropdown-menu\">
		<li><a  href=\" " . site_url("$controller/alat_edit/".$id) ."\" ><span class=\"glyphicon glyphicon-edit\"></span> Edit </a></li>
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


function alat_baru($id){

		$datax = $this->dm->detail($id)->row_array(); 
		
		$data = array("id"=>$id,
			"nama_unit"=>"","jumlah_unit"=>""
		 );


		// show_array($data); exit;
		 
		
		$data['action']="alat_simpan";
		$data['mode']="I";
		$data['surat_kmpi_id'] = $id;
 		$data['back_link'] = site_url("$this->controller/alat/$id");
		$data['controller'] = $this->controller;
		$content = $this->load->view("alat/alat_view_form",$data,true);
		$this->set_subtitle("INPUT DATA PERALATAN INTELIJEN ". $datax["nomor"]);
		$this->set_title("INPUT DATA PERALATAN INTELIJEN ". $datax["nomor"]);
		$this->set_content($content);
		$this->render_baru();
	 
} 


 


function alat_simpan(){
		$data=$this->input->post();
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_unit','Peralatan','required');	 
		$this->form_validation->set_rules('jumlah_unit','Jumlah','required|number');	 
 		// $this->form_validation->set_rules('pelaksana_nip','NIP','required');			
		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		$this->form_validation->set_message('number', ' %s Harus diisi dengan angka ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');

 	 
 		 

 		//show_array($data);

		if($this->form_validation->run() == TRUE ) { 
			unset($data['mode']);
			unset($data['id']);
			 $res = $this->db->insert("surat_kmpi_detail",$data);
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



function alat_edit($id){
		 
	 	 

		$data = $this->dm->detail_alat($id)->row_array(); 

		//show_array($data); 
		$datax = $this->dm->detail($data['id'])->row_array();

		

		
	 
		 
		$data['action']="alat_update";
		$data['mode']="U";
 		$data['back_link'] = site_url("$this->controller/alat/".$data['id']);
		$data['controller'] = $this->controller;
		$content = $this->load->view("alat/alat_view_form",$data,true);
		$this->set_subtitle("EDIT DATA $this->title ". $datax["nomor"]);
		$this->set_title("EDIT DATA $this->title ". $datax["nomor"]);
		$this->set_content($content);
		$this->render_baru();
	}

	
function alat_update(){
		$data=$this->input->post();
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_unit','Peralatan','required');	 
		$this->form_validation->set_rules('jumlah_unit','Jumlah','required|number');	 
 		// $this->form_validation->set_rules('pelaksana_nip','NIP','required');			
		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		$this->form_validation->set_message('number', ' %s Harus diisi dengan angka ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');
		if($this->form_validation->run() == TRUE ) { 
			

 	 



			unset($data['mode']);			 
			$this->db->where("id",$data['id']);
			 $res = $this->db->update("surat_kmpi_detail",$data);
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

function alat_hapus(){
	$data = $this->input->post();
	$this->db->where("id",$data['id']);
	$res = $this->db->delete("surat_kmpi_detail");
	if($res){
		$ret = array("error"=>false,"message"=>"Data Berhasi dihapus");

	}
	else {
		$ret = array("error"=>true,"message"=>"Data gagal dihapus");
	}
	echo json_encode($ret);
}	



function cetak_surat($id){
	 
	 	 
	 	$data = $this->dm->detail($id)->row_array();

	 	//show_array($data); exit;


	 	 
	 	$this->db->where("surat_kmpi_id",$id);
		$data['rec_alat'] = $this->db->get("surat_kmpi_detail");

		// echo $this->db->last_query(); exit;
		 
 		 
 		$this->load->library('Pdf');
		$pdf = new Pdf('P', 'mm', 'F4', true, 'UTF-8', false);
		$pdf->SetTitle('Surat Keterangan Peralatan Intelijen');
		//$pdf->SetHeaderMargin(30);
		//$pdf->SetTopMargin(10);

		$pdf->SetMargins(10, 30, 10);
		$pdf->SetHeaderMargin(15);
		$pdf->SetFooterMargin(15);
		$pdf->setFooterFont(Array('times', '', 8));

 		$pdf->SetAutoPageBreak(true,20);
		$pdf->SetAuthor('Author');
		 
			
		$pdf->setPrintHeader(true);
		$pdf->setPrintFooter(true);

	 
		/*for($i=1; $i<=5; $i++) : 
		$data['i'] = $i;*/
		$pdf->AddPage('P');
		$html = $this->load->view("pdf/$this->controller"."_surat",$data,true);		 
		$pdf->writeHTML($html, true, false, true, false, '');
		// endfor;


		 $pdf->startTransaction();

		 $halaman  = $pdf->getPage();
		 

		 $y = $pdf->getY();
		 
		 $html = $this->load->view("pdf/$this->controller"."_surat_ttd",$data,true);		
		 $pdf->writeHTML($html, true, false, true, false, '');

		 if( $halaman <> $pdf->getPage() ) {
		 	$pdf->rollbackTransaction(true);

		 	$pdf->AddPage('P');
		 	// $html = $this->load->view("pdf/penyelidikan_surat_tugas_head",$data,true);
		 	// $pdf->writeHTML($html, true, false, true, false, '');

		 	$html = $this->load->view("pdf/$this->controller"."_surat_ttd",$data,true);	
		 	$pdf->writeHTML($html, true, false, true, false, '');

		 }

		 else if( $y < 20 ) {
		 	$pdf->rollbackTransaction(true);

		 	//$pdf->AddPage();
		 	// $html = $this->load->view("pdf/penyelidikan_surat_tugas_head",$data,true);
		 	// $pdf->writeHTML($html, true, false, true, false, '');

		 	$html = $this->load->view("pdf/$this->controller"."_surat_ttd",$data,true);	
		 	$pdf->writeHTML($html, true, false, true, false, '');

		 }


		$pdf->Output('Surat Penyelidikan .pdf', 'I');

	}



function cetak_rencana($id){
	 
	 	$this->db->where("penyelidikan_id",$id);
	 	$data = $this->db->get("penyelidikan")->row_array();


	 	$this->db->select('*')->from('penyelidikan_rencana');		
		$this->db->order_by("no_urut");

		$data['rec_rencana'] = $this->db->get();

		// echo $this->db->last_query(); exit;
		 
 		 
 		$this->load->library('Pdf');
		$pdf = new Pdf('L', 'mm', 'F4', true, 'UTF-8', false);
		$pdf->SetTitle('Surat Rencana Penyelidikan');
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
		$html = $this->load->view("pdf/penyelidikan_rencana",$data,true);		 
		$pdf->writeHTML($html, true, false, true, false, '');
		 


		 $pdf->startTransaction();

		 $halaman  = $pdf->getPage();
		 

		 $y = $pdf->getY();
		 
		 $html = $this->load->view("pdf/penyelidikan_rencana_ttd",$data,true);
		 $pdf->writeHTML($html, true, false, true, false, '');

		 if( $halaman <> $pdf->getPage() ) {
		 	$pdf->rollbackTransaction(true);

		 	$pdf->AddPage('L');
		 	// $html = $this->load->view("pdf/penyelidikan_rencana_head",$data,true);
		 	// $pdf->writeHTML($html, true, false, true, false, '');

		 	$html = $this->load->view("pdf/penyelidikan_rencana_ttd",$data,true);
		 	$pdf->writeHTML($html, true, false, true, false, '');

		 }

		 else if( $y < 20 ) {
		 	$pdf->rollbackTransaction(true);

		 	//$pdf->AddPage();
		 	// $html = $this->load->view("pdf/penyelidikan_rencana_head",$data,true);
		 	// $pdf->writeHTML($html, true, false, true, false, '');

		 	$html = $this->load->view("pdf/penyelidikan_rencana_ttd",$data,true);
		 	$pdf->writeHTML($html, true, false, true, false, '');

		 }


		$pdf->Output('Surat Rencana Penyelidikan .pdf', 'I');

	}


function cetak_agenda($id){

	 


		$tahun = $this->uri->segment(3); 
		$bulan = $this->uri->segment(4); 

	 
	 	$this->db->select('s.*,
		plks.pelaksana_nip as pelaksana_nip,
		plks.pelaksana_nrp as pelaksana_nrp,
		plks.pelaksana_nama as pelaksana_nama, 
		p1.pangkat_nama  as pelaksana_pangkat,

		ttd.pelaksana_nip as ttd_nip,
		ttd.pelaksana_nrp as  ttd_nrp,
		ttd.pelaksana_nama as ttd_nama, 
		p2.pangkat_nama  as ttd_pangkat,


		')
		->from('surat_kmpi s')
		->join('pelaksana plks','plks.pelaksana_id = s.pelaksana_id')
		->join('pangkat p1','p1.pangkat_id = plks.pangkat_id')
		->join('pelaksana ttd','ttd.pelaksana_id = s.penandatangan_id')
		->join('pangkat p2','p2.pangkat_id = ttd.pangkat_id');

	 	$this->db->where("year(tanggal) = $tahun",null,false);
	 	$this->db->where("month(tanggal) = $bulan",null,false);
	 	$res = $this->db->get();

	 	// echo $this->db->last_query(); // exit;
	 	 
	 	// show_array($data);
		$data['rec_agenda'] = $res ;
		$data['tahun'] = $tahun;
		$arr_bulan = arr_bulan();
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

	 	// show_array($data); exit;
		 
		$pdf->AddPage('L');
		$html = $this->load->view("pdf/surat_kmpi_agenda",$data,true);		 
		$pdf->writeHTML($html, true, false, true, false, '');
		 


		 $pdf->startTransaction();

		 $halaman  = $pdf->getPage();
		 

		 $y = $pdf->getY();
		 
		 $html = $this->load->view("pdf/surat_kmpi_agenda_ttd",$data,true);
		 $pdf->writeHTML($html, true, false, true, false, '');

		 if( $halaman <> $pdf->getPage() ) {
		 	$pdf->rollbackTransaction(true);

		 	$pdf->AddPage('L');
		 	// $html = $this->load->view("pdf/penyelidikan_agenda_head",$data,true);
		 	// $pdf->writeHTML($html, true, false, true, false, '');

		 	$html = $this->load->view("pdf/surat_kmpi_agenda_ttd",$data,true);
		 	$pdf->writeHTML($html, true, false, true, false, '');

		 }

		 else if( $y < 20 ) {
		 	$pdf->rollbackTransaction(true);

		 	//$pdf->AddPage();
		 	// $html = $this->load->view("pdf/penyelidikan_agenda_head",$data,true);
		 	// $pdf->writeHTML($html, true, false, true, false, '');

		 	$html = $this->load->view("pdf/surat_kmpi_agenda_ttd",$data,true);
		 	$pdf->writeHTML($html, true, false, true, false, '');

		 }


		$pdf->Output('Surat Agenda Penyelidikan .pdf', 'I');

	}




}
?>
