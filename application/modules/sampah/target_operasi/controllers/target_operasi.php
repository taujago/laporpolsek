<?php
class target_operasi extends master_controller {

	var $controller ;

	function target_operasi(){
		parent::__construct();
		// $this->load->model("core_model","cm");
		$this->load->model("coremodel","cm");
		$this->load->helper("tanggal");
		$this->load->model("target_operasi_model","dm");
		$this->controller = get_class($this);
		$this->table_name = "target_operasi";
		$this->title = "TARGET OPERASI";

	}

	function index(){
		// echo "fuckkk.."; exit;
		$userdata = $this->session->userdata("userdata");

		$controller = get_class($this);

 		$data_array['arr_bulan'] = arr_bulan();
		$data_array['controller'] = $controller;	 
 		 
		$content = $this->load->view($controller."_view",$data_array,true);

		$this->set_subtitle("DATA $this->title");
		$this->set_title("DATA $this->title");
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
        	 
			$id = $row['xid'];
         
        	$arr_data[] = array(
        		 
        		  			 	 
        		  				flipdate($row['tanggal']),         		  				 
        		  				$row['nomor'],     
        		  				$row['masalah'],      		  				 
        		  				$row['pelaksana_nama'], 
        		  				 
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
			"id"=>"",
			"nomor"=>"",
			"tanggal" =>"",
			"masalah" =>"",
		 );



		$data['action']="simpan";
		$data['mode']="I";
		 
		
		$data['controller'] = $this->controller;
		$content = $this->load->view($this->controller."_view_form",$data,true);
		$this->set_subtitle("INPUT DATA TARGET OPERASI");
		$this->set_title("TARGET OPERASI");
		$this->set_content($content);
		$this->render_baru();
	 
} 


function simpan(){
		$data=$this->input->post();
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('tanggal','Tanggal ','required');	 
		$this->form_validation->set_rules('nomor','Nomor ','required');	 
		// $this->form_validation->set_rules('pelaksana_nip','NIP','required');			
		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');

 		$data['tanggal'] = flipdate($data['tanggal']);
 		 
 		//show_array($data);

		if($this->form_validation->run() == TRUE ) { 
			unset($data['mode']);
			unset($data['id']);
			 $res = $this->db->insert("target_operasi",$data);
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
		 
		
		$data['controller'] = $this->controller;
		$content = $this->load->view($this->controller."_view_form",$data,true);
		
		$this->set_subtitle("EDIT DATA TARGET OPERASI");
		$this->set_title("EDIT DATA TARGET OPERASI");
		$this->set_content($content);
		$this->render_baru();
	}


function update(){
		$data=$this->input->post();
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('tanggal','Tanggal ','required');	 
		$this->form_validation->set_rules('nomor','Nomor ','required');	 	 	
		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');
		if($this->form_validation->run() == TRUE ) { 
			

 		$data['tanggal'] = flipdate($data['tanggal']);
 		 



			unset($data['mode']);			 
			$this->db->where("id",$data['id']);
			 $res = $this->db->update("target_operasi",$data);
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
	$this->db->where("id",$data['id']);
	$res = $this->db->delete("target_operasi");
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
		
		$this->set_subtitle("DETAIL DATA TARGERT OPERASI");
		$this->set_title("DETAIL DATA TARGERT OPERASI");
		$this->set_content($content);
		$this->render_baru();

}


function rencana($id){
		$data = $this->dm->detail($id)->row_array(); 
		$data['tanggal'] = flipdate($data['tanggal']);
 		
 		$data['to_id']  =  $id;
		$data['controller'] = $this->controller;
		$data['baru_link'] = site_url("$this->controller/rencana_baru/$id");
		$data['back_link'] = site_url("$this->controller/detail/$id");
		$content = $this->load->view("rencana/".$this->controller."_rencana_view",$data,true);
		
		
		$this->set_subtitle("DATA RENCANA PENYELIDIKAN : ". $data['nomor']);
		$this->set_title("DATA RENCANA PENYELIDIKAN : ". $data['nomor']);
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
				 
				"id" =>$id 
				 
		);     
           
        $row = $this->dm->rencana_data($req_param)->result_array();
		
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->rencana_data($req_param)->result_array();
        

       
        $arr_data = array();
        $n=0;
        foreach($result as $row) : 
		//$daft_id = $row['daft_id'];
        	$n++;
        	 
		$id = $row['id'];
         
        	$arr_data[] = array(
        						$n,
        		 
        		  				$row['unsur'],        
        		  				$row['data_awal'],         		  				 
        		  				$row['instruksi'], 
        		  				$row['keterangan'],         		  				 
        		  				 
        		  			  
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
		
		$data = array(
				"unsur" => "",
				"data_awal" => "",
				"instruksi" => "",
				"keterangan" => "",
				"to_id" => "",
				"id" => ""
				);


		// show_array($data); exit;

		$data['action']="rencana_simpan";
		$data['to_id']=$datax['id'];
		$data['mode']="I";
 		$data['back_link'] = site_url("$this->controller/rencana/$id");
		$data['controller'] = $this->controller;
		$content = $this->load->view("rencana/".$this->controller."_rencana_view_form",$data,true);
		$this->set_subtitle("INPUT DATA RENCANA TARGET OPERASI ". $datax['nomor']);
		$this->set_title("INPUT DATA RENCANA TARGET OPERASI ". $datax['nomor']);
		$this->set_content($content);
		$this->render_baru();
	 
} 


function rencana_simpan(){
		$data=$this->input->post();
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('unsur','Unsur','required');	 
		$this->form_validation->set_rules('data_awal','Data Awal','required');
		// $this->form_validation->set_rules('pelaksana_nip','NIP','required');			
		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');

 		 
 		 

 		//show_array($data);

		if($this->form_validation->run() == TRUE ) { 
			unset($data['mode']);
			unset($data['id']);
			 $res = $this->db->insert("target_operasi_rencana",$data);
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
		$data_penyelidikan = $this->dm->detail($data['id'])->row_array();

		 
		
	 

		$data['action']="rencana_update";
		$data['to_id']=$data['id'];
		$data['mode']="U";
 		$data['back_link'] = site_url("$this->controller/rencana/".$data['id']);
		$data['controller'] = $this->controller;
		$content = $this->load->view("rencana/".$this->controller."_rencana_view_form",$data,true);
		$this->set_subtitle("EDIT DATA RENCANA TARGET OPERASI ". $data_penyelidikan['nomor']);
		$this->set_title("EDIT DATA RENCANA TARGET OPERASI ". $data_penyelidikan['nomor']);
		$this->set_content($content);
		$this->render_baru();
	}

	
function rencana_update(){
		$data=$this->input->post();
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('unsur','Unsur','required');	 
		$this->form_validation->set_rules('data_awal','Data Awal','required');
		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');
		if($this->form_validation->run() == TRUE ) { 
			

 	 



			unset($data['mode']);			 
			$this->db->where("id",$data['id']);
			 $res = $this->db->update("target_operasi_rencana",$data);
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
	$res = $this->db->delete("target_operasi_rencana");
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
		 
 		$data['tanggal'] = flipdate($data['tanggal']);
 		$data['id']  =  $id;
		$data['controller'] = $this->controller;
		$data['baru_link'] = site_url("$this->controller/pelaksana_baru/$id");
		$data['back_link'] = site_url("$this->controller/detail/$id");
		$content = $this->load->view("pelaksana/".$this->controller."_pelaksana_view",$data,true);
		
		
		$this->set_subtitle("DATA PELAKSANA OPERASI : ". $data['nomor']);
		$this->set_title("DATA PELAKSANA OPERASI : ". $data['nomor']);
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
				 
				"id" =>$id 
				 
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
		
		$data = array("to_id"=>$id,
			"no_urut"=>"","pelaksana_id"=>"","jabatan"=>""
		 );


		// show_array($data); exit;
		$data['arr_pelaksana'] = $this->cm->get_arr_dropdown("pelaksana", "pelaksana_id","pelaksana_nama","pelaksana_nama");
		
		$data['action']="pelaksana_simpan";
		$data['mode']="I";
 		$data['back_link'] = site_url("$this->controller/pelaksana/$id");
		$data['controller'] = $this->controller;
		$content = $this->load->view("pelaksana/".$this->controller."_pelaksana_view_form",$data,true);
		$this->set_subtitle("INPUT DATA PELAKSANA PENYELIDIKAN ". $datax['nomor']);
		$this->set_title("INPUT DATA PELAKSANA PENYELIDIKAN ". $datax['nomor']);
		$this->set_content($content);
		$this->render_baru();
	 
} 


function cek_pelaksana($pelaksana_id) {
	$id = $_POST['to_id'];
	$this->db->where("to_id",$id);
	$this->db->where("pelaksana_id",$pelaksana_id);
	$res = $this->db->get("target_operasi_pelaksana");
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
			 $res = $this->db->insert("target_operasi_pelaksana",$data);
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
		$data_penyelidikan = $this->dm->detail($data['to_id'])->row_array();

		

		
	 
		$data['arr_pelaksana'] = $this->cm->get_arr_dropdown("pelaksana", "pelaksana_id","pelaksana_nama","pelaksana_nama");
		$data['action']="pelaksana_update";
		$data['mode']="U";
 		$data['back_link'] = site_url("$this->controller/pelaksana/".$data['to_id']);
		$data['controller'] = $this->controller;
		$content = $this->load->view("pelaksana/".$this->controller."_pelaksana_view_form",$data,true);
		$this->set_subtitle("EDIT DATA PELAKSANA TARGET OPERASI ". $data_penyelidikan['nomor']);
		$this->set_title("EDIT DATA PELAKSANA TARGET OPERASI ". $data_penyelidikan['nomor']);
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
			 $res = $this->db->update("target_operasi_pelaksana",$data);
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
	$res = $this->db->delete("target_operasi_pelaksana");
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
	 	$data = $this->db->get("penyelidikan")->row_array();


	 	$this->db->select('*')->from('penyelidikan_pelaksana a')
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

		$pdf->SetMargins(10, 30, 10);
		$pdf->SetHeaderMargin(15);
		$pdf->SetFooterMargin(15);
		$pdf->setFooterFont(Array('times', '', 8));

 		$pdf->SetAutoPageBreak(true,10);
		$pdf->SetAuthor('Author');
		 
			
		$pdf->setPrintHeader(true);
		$pdf->setPrintFooter(true);

	 
		for($i=1; $i<=5; $i++) : 
		$data['i'] = $i;
		$pdf->AddPage('P');
		$html = $this->load->view("pdf/penyelidikan_surat_tugas",$data,true);		 
		$pdf->writeHTML($html, true, false, true, false, '');
		endfor;


		 $pdf->startTransaction();

		 $halaman  = $pdf->getPage();
		 

		 $y = $pdf->getY();
		 
		 $html = $this->load->view("pdf/penyelidikan_ttd",$data,true);
		 $pdf->writeHTML($html, true, false, true, false, '');

		 if( $halaman <> $pdf->getPage() ) {
		 	$pdf->rollbackTransaction(true);

		 	$pdf->AddPage('L');
		 	// $html = $this->load->view("pdf/penyelidikan_surat_tugas_head",$data,true);
		 	// $pdf->writeHTML($html, true, false, true, false, '');

		 	$html = $this->load->view("pdf/penyelidikan_ttd",$data,true);
		 	$pdf->writeHTML($html, true, false, true, false, '');

		 }

		 else if( $y < 20 ) {
		 	$pdf->rollbackTransaction(true);

		 	//$pdf->AddPage();
		 	// $html = $this->load->view("pdf/penyelidikan_surat_tugas_head",$data,true);
		 	// $pdf->writeHTML($html, true, false, true, false, '');

		 	$html = $this->load->view("pdf/penyelidikan_ttd",$data,true);
		 	$pdf->writeHTML($html, true, false, true, false, '');

		 }


		$pdf->Output('Surat Penyelidikan .pdf', 'I');

	}



function cetak_rencana($id){
	 
	 	$this->db->where("id",$id);
	 	$data = $this->db->get("target_operasi")->row_array();


	 	$this->db->select('*')->from('target_operasi_rencana');		
		//$this->db->order_by("no_urut");

		$data['rec_rencana'] = $this->db->get();


		// $this->db->select('*')->from('target_operasi_pelaksana a')
		// ->join("pelaksana b",'a.pelaksana_id = b.pelaksana_id')
		// ->join("pangkat c","c.pangkat_id = b.pangkat_id")
		// ->where('a.to_id',$id);
		// $this->db->order_by("no_urut");
		$sql="select group_concat(pelaksana_nama separator '<br />') as pelaksana_nama
				from pelaksana p join target_operasi_pelaksana t on p.pelaksana_id = t.pelaksana_id
				where t.to_id = '$id'";

		$data['rec_pelaksana'] = $this->db->query($sql)->row();

		// echo $this->db->last_query(); exit;
		 
 		 
 		$this->load->library('Pdf');
		$pdf = new Pdf('L', 'mm', 'F4', true, 'UTF-8', false);
		$pdf->SetTitle('Surat Rencana target operasi');
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
		$html = $this->load->view("pdf/target_operasi_rencana",$data,true);		 
		$pdf->writeHTML($html, true, false, true, false, '');
		 


		 $pdf->startTransaction();

		 $halaman  = $pdf->getPage();
		 

		 $y = $pdf->getY();
		 
		 $html = $this->load->view("pdf/target_operasi_rencana_ttd",$data,true);
		 $pdf->writeHTML($html, true, false, true, false, '');

		 if( $halaman <> $pdf->getPage() ) {
		 	$pdf->rollbackTransaction(true);

		 	$pdf->AddPage('L');
		 	// $html = $this->load->view("pdf/penyelidikan_rencana_head",$data,true);
		 	// $pdf->writeHTML($html, true, false, true, false, '');

		 	$html = $this->load->view("pdf/target_operasi_rencana_ttd",$data,true);
		 	$pdf->writeHTML($html, true, false, true, false, '');

		 }

		 else if( $y < 20 ) {
		 	$pdf->rollbackTransaction(true);

		 	//$pdf->AddPage();
		 	// $html = $this->load->view("pdf/penyelidikan_rencana_head",$data,true);
		 	// $pdf->writeHTML($html, true, false, true, false, '');

		 	$html = $this->load->view("pdf/target_operasi_rencana_ttd",$data,true);
		 	$pdf->writeHTML($html, true, false, true, false, '');

		 }


		$pdf->Output('Surat Rencana Penyelidikan .pdf', 'I');

	}


function cetak_agenda($id){

	 


		$tahun = $this->uri->segment(3); 
		$bulan = $this->uri->segment(4); 

	 
	 	// $this->db->where("year(tanggal) = $tahun",null,false);
	 	// $this->db->where("month(tanggal) = $bulan",null,false);
	 	// $res = $this->db->get("target_operasi");

	 	$sql="SELECT t.*, GROUP_CONCAT(p.pelaksana_nama SEPARATOR '<br />') AS pelaksana_nama 
				FROM target_operasi t  
				JOIN target_operasi_pelaksana top  
				ON t.id = top.to_id
				JOIN pelaksana p ON p.pelaksana_id = top.pelaksana_id 
				-- WHERE t.id='$id'
				where year(tanggal) = '$tahun '
				and month(tanggal) = '$bulan'
				GROUP BY t.id "; 

		$res = $this->db->query($sql);
	 	// echo $this->db->last_query(); // exit;
	 	 
	 	// show_array($data);
		$data['rec_agenda'] = $res ;
		$data['tahun'] = $tahun;
		$arr_bulan = arr_bulan();
		$data['bulan'] = $arr_bulan[$bulan];

		// echo $this->db->last_query(); exit;
		 
 		 
 		$this->load->library('Pdf');
		$pdf = new Pdf('L', 'mm', 'F4', true, 'UTF-8', false);
		$pdf->SetTitle('Buku agenda target operasi');
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
		$html = $this->load->view("pdf/target_operasi_agenda",$data,true);		 
		$pdf->writeHTML($html, true, false, true, false, '');
		 


		 $pdf->startTransaction();

		 $halaman  = $pdf->getPage();
		 

		 $y = $pdf->getY();
		 
		 $html = $this->load->view("pdf/target_operasi_agenda_ttd",$data,true);
		 $pdf->writeHTML($html, true, false, true, false, '');

		 if( $halaman <> $pdf->getPage() ) {
		 	$pdf->rollbackTransaction(true);

		 	$pdf->AddPage('L');
		 	// $html = $this->load->view("pdf/penyelidikan_agenda_head",$data,true);
		 	// $pdf->writeHTML($html, true, false, true, false, '');

		 	$html = $this->load->view("pdf/target_operasi_agenda_ttd",$data,true);
		 	$pdf->writeHTML($html, true, false, true, false, '');

		 }

		 else if( $y < 20 ) {
		 	$pdf->rollbackTransaction(true);

		 	//$pdf->AddPage();
		 	// $html = $this->load->view("pdf/penyelidikan_agenda_head",$data,true);
		 	// $pdf->writeHTML($html, true, false, true, false, '');

		 	$html = $this->load->view("pdf/target_operasi_agenda_ttd",$data,true);
		 	$pdf->writeHTML($html, true, false, true, false, '');

		 }


		$pdf->Output('Surat Agenda target operasi .pdf', 'I');

	}




}
?>
