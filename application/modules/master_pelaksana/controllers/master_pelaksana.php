<?php
class master_pelaksana extends master_controller {

	var $controller ;

	function master_pelaksana(){
		parent::__construct();
		// $this->load->model("core_model","cm");
		$this->load->model("coremodel","cm");
		$this->load->helper("tanggal");
		$this->load->model("pelaksana_model","dm");
		$this->controller = get_class($this);

	}

	function index(){
		// echo "fuckkk.."; exit;
		$userdata = $this->session->userdata("userdata");

		$controller = get_class($this);

 
		$data_array['controller'] = $controller;	 
 		 
		$content = $this->load->view($controller."_view",$data_array,true);

		$this->set_subtitle("DATA PELAKSANA");
		$this->set_title("DATA PELAKSANA");
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
        
        $nama = (isset($_REQUEST['columns'][1]['search']['value']))?$_REQUEST['columns'][1]['search']['value']:"";
        // $tanggal_awal = $_REQUEST['columns'][4]['search']['value'];
        // $tanggal_akhir = $_REQUEST['columns'][6]['search']['value'];
        // $status = $_REQUEST['columns'][7]['search']['value'];


      //  order[0][column]
        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null,
				"nama" =>$nama 
				 
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
        	 
$id = $row['pelaksana_id'];
         
        	$arr_data[] = array(
        		 
        		  			 	
        		  				 
        		  				$row['pelaksana_nip'], 
        		  				$row['pelaksana_nama'], 
        		  				$row['pangkat_nama'], 
        		  				$row['no_hp'], 
        		  				$row['alamat'], 
        		  			  
        		  				"<div class=\"btn-group\"> 
     <a class=\"btn dropdown-toggle btn-primary\" data-toggle=\"dropdown\" href=\"#\">Proses<span class=\"caret\"></span></a>
     
     <ul class=\"dropdown-menu\">
		<li><a  href=\" " . site_url("$controller/edit/".$id) ."\" ><span class=\"glyphicon glyphicon-edit\"></span> Edit </a></li>
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

		$data['action']="simpan";
		$data['mode']="I";
		$data['arr_pangkat'] = $this->cm->get_arr_dropdown('pangkat','pangkat_id','pangkat_nama','pangkat_nama');
		
		$data['controller'] = $this->controller;
		$content = $this->load->view($this->controller."_view_form",$data,true);
		$this->set_subtitle("INPUT DATA PANGKAT");
		$this->set_title("PANGKAT");
		$this->set_content($content);
		$this->render_baru();
	 
} 


function simpan(){
		$data=$this->input->post();
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('pelaksana_nama','Nama','required');	 
		$this->form_validation->set_rules('pelaksana_nip','NIP','required');			
		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');
		if($this->form_validation->run() == TRUE ) { 
			unset($data['mode']);
			unset($data['petugas_id']);
			 $res = $this->db->insert("pelaksana",$data);
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
		//$data = $arr['message'];
		$data['action']="update";
		$data['mode']="U";
		$data['arr_pangkat'] = $this->cm->get_arr_dropdown('pangkat','pangkat_id','pangkat_nama','pangkat_nama');
		
		$data['controller'] = $this->controller;
		$content = $this->load->view($this->controller."_view_form",$data,true);
		
		$this->set_subtitle("EDIT DATA PELAKSANA");
		$this->set_title("EDIT DATA PELAKSANA");
		$this->set_content($content);
		$this->render_baru();
	}
function update(){
		$data=$this->input->post();
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('pelaksana_nip','NIP','required');
		$this->form_validation->set_rules('pelaksana_nama','Nama','required');
 		
		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');
		if($this->form_validation->run() == TRUE ) { 
			
			unset($data['mode']);			 
			$this->db->where("pelaksana_id",$data['pelaksana_id']);
			 $res = $this->db->update("pelaksana",$data);
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
	$this->db->where("pelaksana_id",$data['id']);
	$res = $this->db->delete("pelaksana");
	if($res){
		$ret = array("error"=>false,"message"=>"Data Berhasi dihapus");

	}
	else {
		$ret = array("error"=>true,"message"=>"Data gagal dihapus");
	}
	echo json_encode($ret);
}

}
?>
