<?php
class lap_d extends master_controller {
// kesehatan,kekuatan, keturunan, masuk surga
	var $controller ;

	function lap_d(){
		parent::__construct();
		// $this->load->model("core_model","cm");
		$this->load->model("coremodel","cm");
		$this->load->helper("tanggal");
		$this->load->model("lap_d_model","dm");
		$this->controller = get_class($this);

		$this->userdata = $_SESSION['userdata'];

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

		$this->set_subtitle("LAPORAN POLISI MODEL-D");
		$this->set_title("LAPORAN  POLISI MODEL-D");
		$this->set_content($content);
		$this->render_baru();
	}


function get_data(){
		$controller = get_class($this);
	 	$userdata = $this->session->userdata("userdata");
      	$draw = $_REQUEST['draw']; // get the requested page 
    	$start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:"tanggal"; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"desc"; // get the direction if(!$sidx) $sidx =1;  
        
        // $no_rangka = $_REQUEST['columns'][5]['search']['value'];
        $tanggal_awal = $_REQUEST['columns'][1]['search']['value'];
        $tanggal_akhir = $_REQUEST['columns'][2]['search']['value'];
        // $id_fungsi = $_REQUEST['columns'][3]['search']['value'];


      //  order[0][column]
        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null,
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
        	 
		$id = $row['lap_d_id'];
         
        	$arr_data[] = array(
        		 
								$row['nomor'],
								flipdate($row['tanggal']),
								$row['kejadian_apa'],
								$row['kejadian_tempat'],
								flipdate($row['kejadian_tanggal']),
								
								$row['operator'],
        		  			 
        		  			  
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

		$data['action']="simpan";
		$data['lap_d_id']="";
		$data['mode']="I";
		$data['controller'] = $this->controller;


	 

		$data['arr_pangkat'] = $this->cm->get_arr_dropdown("m_pangkat", 
			"id_pangkat","pangkat",'pangkat');

		 
		$content = $this->load->view($this->controller."_view_form",$data,true);
		$this->set_subtitle("INPUT LAPORAN POLISI MODEL-D");
		$this->set_title("INPUT LAPORAN POLISI MODEL-D");
		$this->set_content($content);
		$this->render_baru();
	 
} 


function simpan(){
		$data=$this->input->post();

 

		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('tanggal','Tanggal','required'); 
		// $this->form_validation->set_rules('id_pasal','Pasal','required');
		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');
		if($this->form_validation->run() == TRUE ) { 
			unset($data['mode']);
			unset($data['lap_d_id']);


			$data['tanggal'] = flipdate($data['tanggal']);
			$data['kejadian_tanggal'] = flipdate($data['kejadian_tanggal']);
			// $data['kejadian_tanggal'] = flipdate($data['kejadian_tanggal']);
			// $data['kejadian_tanggal_lapor'] = flipdate($data['kejadian_tanggal_lapor']);
			 
			$userdata = $this->userdata;
			$data['user_id'] = $userdata['id'];
			$data['nomor'] = $this->cm->get_lap_number($this->controller,$data); 

			$data['lap_d_id'] = md5(microtime());
			 $res = $this->db->insert("lap_d",$data);
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
		 
		$data = $this->dm->detail($id); 

		// show_array($data);


		// $data['tanggal'] = flipdate($data['tanggal']);
		// $data['kp_dilaporkan_pada'] = flipdate($data['kp_dilaporkan_pada']);
		// $data['kp_tanggal'] = flipdate($data['kp_tanggal']);

		// show_array($data); exit;
		//$data = $arr['message'];
		$data['action']="update";
		$data['mode']="U";
		$data['controller'] = $this->controller;


		$data['arr_gol_kejahatan'] = $this->cm->get_arr_dropdown("m_golongan_kejahatan", 
			"id","golongan_kejahatan",'golongan_kejahatan');

		$data['arr_jenis_lokasi'] = $this->cm->get_arr_dropdown("m_jenis_lokasi", 
			"id_jenis_lokasi","jenis_lokasi",'jenis_lokasi');

		$data['arr_fungsi'] = $this->cm->get_arr_dropdown("m_fungsi", 
			"id_fungsi","fungsi",'id_fungsi');


		$data['arr_pangkat'] = $this->cm->get_arr_dropdown("m_pangkat", 
			"id_pangkat","pangkat",'pangkat');

		$data['arr_motif'] = $this->cm->get_arr_dropdown("m_motif", 
			"id_motif","motif",'motif');

		$data['arr_pekerjaan'] = $this->cm->get_arr_dropdown("m_pekerjaan", 
			"id_pekerjaan","pekerjaan",'pekerjaan');

		$data['arr_agama'] = $this->cm->get_arr_dropdown("m_agama", 
			"id_agama","agama",'agama');
		$data['arr_pendidikan'] = $this->cm->get_arr_dropdown("m_pendidikan", 
			"id_pendidikan","pendidikan",'pendidikan');

		$data['arr_warga_negara'] = $this->cm->get_arr_dropdown("m_warga_negara", 
			"id_warga_negara","warga_negara",'warga_negara');
		
		$data['arr_jk'] = array("L"=>"Laki-laki","P"=>"Perempuan");


		$content = $this->load->view($this->controller."_view_form",$data,true);
		
		$this->set_subtitle("EDIT DATA LAPORAN TIPE B");
		$this->set_title("EDIT DATA LAPORAN TIPE B");
		$this->set_content($content);
		$this->render_baru();
	}
function update(){
		$data=$this->input->post();
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('tanggal','Tanggal','required'); 
		// $this->form_validation->set_rules('id_pasal','Pasal','required');
 		
		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');
		if($this->form_validation->run() == TRUE ) { 
			
			unset($data['mode']);		

			$data['tanggal'] = flipdate($data['tanggal']);
			$data['kejadian_tanggal'] = flipdate($data['kejadian_tanggal']);
			// $data['kejadian_tanggal'] = flipdate($data['kejadian_tanggal']);



			$this->db->where("lap_d_id",$data['lap_d_id']);
			 $res = $this->db->update("lap_d",$data);
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
	$this->db->where("lap_d_id",$data['id']);
	$res = $this->db->delete("lap_d");
	if($res){
		$ret = array("error"=>false,"message"=>"Data Berhasi dihapus");

	}
	else {
		$ret = array("error"=>true,"message"=>"Data gagal dihapus");
	}
	echo json_encode($ret);
}

function detail($id){

	$data = $this->dm->detail($id);
	$data['tanggal'] = flipdate($data['tanggal']);
	 
	$data['kejadian_tanggal'] = flipdate($data['kejadian_tanggal']);

	$data['tanggal'] = flipdate($data['tanggal']);
 	$data['kejadian_tanggal'] = flipdate($data['kejadian_tanggal']);
	
	$data['controller'] = $this->controller;


	//show_array($detail);
	$content = $this->load->view("lap_d_view_detail",$data,true);
	$this->set_subtitle("DETAIL LAPORAN POLISI MODEL-D NOMOR : ".$data['nomor']);
	$this->set_title("DETAIL  LAPORAN  POLISI MODEL-D NOMOR : ".$data['nomor']);
	$this->set_content($content);
	$this->render_baru();


}

function get_detail_json($id) {
	$data = $this->dm->detail($id);

	$data['tanggal'] = flipdate($data['tanggal']);
	$data['kejadian_tanggal'] = flipdate($data['kejadian_tanggal']);
	 
	// show_array($detail); exit;
	echo json_encode($data);
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






function pasal_simpan(){
		$data=$this->input->post();

 

		
		$this->load->library('form_validation');


		
		$this->form_validation->set_rules('txt_id_fungsi','Fungsi Terkait','required'); 
		$this->form_validation->set_rules('txt_pasal','Pasal','required');
 		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');
		if($this->form_validation->run() == TRUE ) { 
			
			 

			$arr_pasal['id_fungsi'] = $data['txt_id_fungsi'];
			$arr_pasal['pasal'] = $data['txt_pasal'];

 			
			 

			 
			// $data['tanggal'] = flipdate($data['tanggal']);


			 $res = $this->db->insert("m_pasal",$arr_pasal);
			 if($res) {
			 	$ret = array("error"=>false,"message"=>"data pasal berhasil disimpan",
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
			  
			  FROM lap_d
			  WHERE YEAR(tanggal) = ". date('Y');

	$data_array['query'] = $this->db->query($query)->row();
	$data_array['title'] = "GRAFIK LAPORAN POLISI MODEL-D";

	$content = $this->load->view($controller."_grafik",$data_array,true);

	$this->set_subtitle("GRAFIK LAPORAN POLISI MODEL-D");
	$this->set_title("GRAFIK LAPORAN  POLISI MODEL-D");
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

			  FROM lap_d
			  WHERE YEAR(tanggal) = ".$tahun;

	$data_array['query'] = $this->db->query($query)->row();
	$data_array['tahun'] = $tahun;
	$data_array['title'] = "GRAFIK LAPORAN POLISI MODEL-D";

	$this->load->view($controller."_grafik_view",$data_array);

}



function cetak_laporan($id) {
		
		$data = $this->dm->detail($id);
		// show_array($data); exit;

		// $data['tersangka'] = $this->dm->get_data_tersangka($id);
		// $data['korban'] = $this->dm->get_data_korban($id);
		// $data['saksi'] = $this->dm->get_data_saksi($id);
		// $data['barbuk'] = $this->dm->get_data_barbuk($id);
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
		 


		


		$pdf->Output('LAPORAN POLISI.pdf', 'I');
}	

function cetak_surat_pernyataan($id) {

	$data = $this->dm->detail($id);
		// show_array($data); exit;

		// $data['tersangka'] = $this->dm->get_data_tersangka($id);
		// $data['korban'] = $this->dm->get_data_korban($id);
		// $data['saksi'] = $this->dm->get_data_saksi($id);
		// $data['barbuk'] = $this->dm->get_data_barbuk($id);
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
		 


		


		$pdf->Output('SURAT PERNYATAAN.pdf', 'I');

}


function cetak_tanda_bukti($id){
		$data = $this->dm->detail($id);
		// $data['terlapor']= $this->dm->get_data_terlapor($id);

		// show_array($data); exit;

		// $data['tersangka'] = $this->dm->get_data_tersangka($id);
		// $data['korban'] = $this->dm->get_data_korban($id);
		// $data['saksi'] = $this->dm->get_data_saksi($id);
		// $data['barbuk'] = $this->dm->get_data_barbuk($id);
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
		 


		


		$pdf->Output('TANDA BUKTI.pdf', 'I');
}

function cetak_rekomendasi($id){
	$data = $this->dm->detail($id);
		// $data['terlapor']= $this->dm->get_data_terlapor($id);

		// show_array($data); exit;

		// $data['tersangka'] = $this->dm->get_data_tersangka($id);
		// $data['korban'] = $this->dm->get_data_korban($id);
		// $data['saksi'] = $this->dm->get_data_saksi($id);
		// $data['barbuk'] = $this->dm->get_data_barbuk($id);
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
		 


		


		$pdf->Output('REKOMENDASI PENILAIAN.pdf', 'I');
}

}
?>
