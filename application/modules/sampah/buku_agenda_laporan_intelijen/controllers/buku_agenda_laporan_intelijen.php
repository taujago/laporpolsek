<?php
class buku_agenda_laporan_intelijen extends master_controller {

	var $controller ;

	function buku_agenda_laporan_intelijen(){
		parent::__construct();
		// $this->load->model("core_model","cm");
		$this->load->model("coremodel","cm");
		$this->load->helper("tanggal");
		$this->load->model("bali_model","dm");
		$this->controller = get_class($this);

	}

	function index(){
		// echo "fuckkk.."; exit;
		$userdata = $this->session->userdata("userdata");

		$controller = get_class($this);

 		$data_array['arr_bulan'] = arr_bulan();
		$data_array['controller'] = $controller;	 
 		 
		$content = $this->load->view($controller."_view",$data_array,true);

		$this->set_subtitle("DATA BUKU AGENDA LAPORAN INTELIJEN");
		$this->set_title("DATA BUKU AGENDA LAPORAN INTELIJEN");
		$this->set_content($content);
		$this->render_baru();
	}


function get_data(){
		$controller = get_class($this);
	 	$userdata = $this->session->userdata("userdata");
      	$draw = $_REQUEST['draw']; // get the requested page 
    	$start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:"id"; // get index row - i.e. user click to sort 
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
        $n=0;
        foreach($result as $row) : 
		//$daft_id = $row['daft_id'];
        	$n++;
        	 
$id = $row['id'];
         
        	$arr_data[] = array(
        		 
        		  			 	
        		  				$n, 
        		  				$row['nomor'], 
        		  				flipdate($row['tanggal']), 
        		  			 	$row['perihal'],         		  				 
        		  				$row['lampiran'], 
        		  				$row['kode'], 
        		  				$row['keterangan'], 
        		  			  
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
"nomor"			=> "",
"tanggal"			=> "",
"perihal"			=> "",
"lampiran"			=> "",
"kode"			=> "",
"keterangan"			=> "",
"id"			=> ""	

			);



		$data['action']="simpan";
		$data['mode']="I";
		// $data['arr_pangkat'] = $this->cm->get_arr_dropdown('pangkat','pangkat_id','pangkat_nama','pangkat_nama');
		
		$data['controller'] = $this->controller;
		$content = $this->load->view($this->controller."_view_form",$data,true);
		$this->set_subtitle("INPUT DATA AGENDA LAPORAN INTELIJEN");
		$this->set_title("AGENDA LAPORAN INTELIJEN");
		$this->set_content($content);
		$this->render_baru();
	 
} 


function simpan(){
		$data=$this->input->post();
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nomor','Nomor','required');	 
		$this->form_validation->set_rules('tanggal','Tanggal','required');	
		// $this->form_validation->set_rules('pelaksana_nip','NIP','required');			
		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');

 		$data['tanggal'] = flipdate($data['tanggal']);
 		 

 		//show_array($data);

		if($this->form_validation->run() == TRUE ) { 
			unset($data['mode']);
			unset($data['id']);
			 $res = $this->db->insert("buku_agenda_laporan_intelijen",$data);
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
		
		$this->set_subtitle("EDIT DATA BUKU AGENDA LAPORAN INTELIJEN");
		$this->set_title("EDIT DATA BUKU AGENDA LAPORAN INTELIJEN");
		$this->set_content($content);
		$this->render_baru();
	}


function update(){
		$data=$this->input->post();
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nomor','Nomor','required');	 	
		$this->form_validation->set_rules('tanggal','Tanggal','required');	 
		 
		$this->form_validation->set_message('required', ' %s Harus diisi ');
		
 		$this->form_validation->set_error_delimiters('', '<br>');
		if($this->form_validation->run() == TRUE ) { 
			

 		$data['tanggal'] = flipdate($data['tanggal']);



			unset($data['mode']);			 
			$this->db->where("id",$data['id']);
			 $res = $this->db->update("buku_agenda_laporan_intelijen",$data);
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
	$res = $this->db->delete("buku_agenda_laporan_intelijen");
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
		// show_array($data); exit;
		$content = $this->load->view($this->controller."_detail_view",$data,true);
		
		$this->set_subtitle("DETAIL DATA BUKU AGENDA LAPORAN INTELIJEN");
		$this->set_title("DETAIL DATA BUKU AGENDA LAPORAN INTELIJEN");
		$this->set_content($content);
		$this->render_baru();

}

 

function cetak_agenda($id){

	 


		$tahun = $this->uri->segment(3); 
		$bulan = $this->uri->segment(4); 

	 
	 	$this->db->where("year(tanggal) = $tahun",null,false);
	 	$this->db->where("month(tanggal) = $bulan",null,false);
	 	$res = $this->db->get("buku_agenda_laporan_intelijen");

	 	// echo $this->db->last_query(); // exit;
	 	 
	 	// show_array($data);
		$data['rec_agenda'] = $res ;
		$data['tahun'] = $tahun;
		$arr_bulan = arr_bulan();
		$data['bulan'] = $arr_bulan[$bulan];

		// echo $this->db->last_query(); exit;
		 
 		 
 		$this->load->library('PdfTable');
		$pdf = new PdfTable('L', 'mm', 'F4', true, 'UTF-8', false);
		$pdf->SetTitle('Buku Agenda Laporan Intelijen');
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
		$html = $this->load->view("pdf/buku_agenda_laporan_intelijen_agenda",$data,true);		 
		$pdf->writeHTML($html, true, false, true, false, '');
		 


		 $pdf->startTransaction();

		 $halaman  = $pdf->getPage();
		 

		 $y = $pdf->getY();
		 
		 $html = $this->load->view("pdf/buku_agenda_laporan_intelijen_ttd",$data,true);
		 $pdf->writeHTML($html, true, false, true, false, '');

		 if( $halaman <> $pdf->getPage() ) {
		 	$pdf->rollbackTransaction(true);

		 	$pdf->AddPage('L');
		 	// $html = $this->load->view("pdf/penyelidikan_agenda_head",$data,true);
		 	// $pdf->writeHTML($html, true, false, true, false, '');

		 	$html = $this->load->view("pdf/buku_agenda_laporan_intelijen_ttd",$data,true);
		 	$pdf->writeHTML($html, true, false, true, false, '');

		 }

		 else if( $y < 20 ) {
		 	$pdf->rollbackTransaction(true);

		 	//$pdf->AddPage();
		 	// $html = $this->load->view("pdf/penyelidikan_agenda_head",$data,true);
		 	// $pdf->writeHTML($html, true, false, true, false, '');

		 	$html = $this->load->view("pdf/buku_agenda_laporan_intelijen_ttd",$data,true);
		 	$pdf->writeHTML($html, true, false, true, false, '');

		 }


		$pdf->Output('Buku Agenda Laporan Intelijen.pdf', 'I');

	}




}
?>
