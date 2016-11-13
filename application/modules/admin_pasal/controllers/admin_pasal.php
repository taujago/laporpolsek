<?php
class admin_pasal extends admin_controller {

	var $controller ;

	function admin_pasal(){
		parent::__construct();
		// $this->load->model("core_model","cm");
		$this->load->model("coremodel","cm");
		$this->load->helper("tanggal");
		$this->load->model("admin_pasal_model","dm");
		$this->controller = get_class($this);

	}

	function index(){
		// echo "fuckkk.."; exit;
		$userdata = $this->session->userdata("userdata");

		$controller = get_class($this);

 
		$data_array['controller'] = $controller;	 
 		 
		$content = $this->load->view($controller."_view",$data_array,true);

		$this->set_subtitle("DATA PASAL ");
		$this->set_title("DATA PASAL ");
		$this->set_content($content);
		$this->render_admin();
	}


function get_data(){
		$controller = get_class($this);
	 	$userdata = $this->session->userdata("userdata");
      	$draw = $_REQUEST['draw']; // get the requested page 
    	$start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:"nama_polsek"; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"asc"; // get the direction if(!$sidx) $sidx =1;  
        
        $nama = (isset($_REQUEST['columns'][1]['search']['value']))?$_REQUEST['columns'][1]['search']['value']:"";
        $id_fungsi = (isset($_REQUEST['columns'][1]['search']['value']))?$_REQUEST['columns'][2]['search']['value']:"";
       
        // $tanggal_awal = $_REQUEST['columns'][4]['search']['value'];
        // $tanggal_akhir = $_REQUEST['columns'][6]['search']['value'];
        // $status = $_REQUEST['columns'][7]['search']['value'];


      //  order[0][column]
        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null,
				"nama" =>$nama,
				"id_fungsi" => $id_fungsi 
				 
				 
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
        		 
        		  			 	
        		  				$row['pasal'], 
        		  				$row['fungsi'],
        		  				 
        		  				 
        		  			  
        		  				"<div class=\"btn-group\"> 
     <a class=\"btn dropdown-toggle btn-primary\" data-toggle=\"dropdown\" href=\"#\">Proses<span class=\"caret\"></span></a>
     
     <ul class=\"dropdown-menu\">
		<li><a '#'  onclick=\"edit('". $id ."')\" ><span class=\"glyphicon glyphicon-edit\"></span> Edit </a></li>
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


 
 
function cek_user_id($user_id) {
	$this->db->where("user_id",$user_id);
	$res = $this->db->get("pengguna");
	if($res->num_rows() > 0 ) {
		$this->form_validation->set_message('cek_user_id', ' %s Sudah Ada');
		return false;
	}
}

function simpan(){
		$data=$this->input->post();
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('id_fungsi','Fungsi','required');  
		$this->form_validation->set_rules('pasal','Pasal','required'); 
		 		
		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');
		if($this->form_validation->run() == TRUE ) { 

			 
			unset($data['id']);

			$data['id'] = md5(microtime()); 
			 

			 
			 $res = $this->db->insert("m_pasal",$data);
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




 

function update(){
		$data=$this->input->post();
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_fungsi','Fungsi','required');  
		$this->form_validation->set_rules('pasal','Pasal','required'); 	 		
		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');
		if($this->form_validation->run() == TRUE ) { 

			 
			 
			 



			 $this->db->where("id",$data['id']);
			 $res = $this->db->update("m_pasal",$data);
			 if($res) {
			 	$ret = array("error"=>false,"message"=>"data berhasil disimpan");
			 }
			 else {
			 	$ret = array("error"=>true,"message"=>$this->db->_error_message(),"mode"=>"U");
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
	$res = $this->db->delete("m_pasal");
	if($res){
		$ret = array("error"=>false,"message"=>"Data Berhasi dihapus");

	}
	else {
		$ret = array("error"=>true,"message"=>"Data gagal dihapus");
	}
	echo json_encode($ret);
}

function get_json_detail($id){
	$data = $this->dm->detail($id)->row_array();
	// show_array($data);
	echo json_encode($data);
}

}
?>
