<?php
class penyidik_lap_c extends penyidik_controller {
 	var $controller ;

	function penyidik_lap_c(){
		parent::__construct();
		 
		$this->load->model("coremodel","cm");
		$this->load->helper("tanggal");
		$this->load->model("admindik_lap_c_model","dm");
        $this->load->model("penyidik_lap_c_model","am");
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

		$this->set_subtitle("LAPORAN POLISI MODEL-C");
		$this->set_title("LAPORAN  POLISI MODEL-C");
		$this->set_content($content);
		$this->render_admin();
	}


function get_data(){
		$controller = get_class($this);
        $userdata = $this->userdata;
        $draw = $_REQUEST['draw']; // get the requested page 
        $start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:"level"; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"desc"; // get the direction if(!$sidx) $sidx =1;  
        
        // $no_rangka = $_REQUEST['columns'][5]['search']['value'];
        $tanggal_awal = $_REQUEST['columns'][1]['search']['value'];
        $tanggal_akhir = $_REQUEST['columns'][2]['search']['value'];
        $id_fungsi = $_REQUEST['columns'][3]['search']['value'];


 


      //  order[0][column]
        $req_param = array (
                "sort_by" => $sidx,
                "sort_direction" => $sord,
                "limit" => null ,
                "tanggal_awal" => $tanggal_awal, 
                "tanggal_akhir" => $tanggal_akhir, 
                "id_fungsi" => $id_fungsi ,
                "id_penyidik" => $userdata['id']
                 
        );     
           
        $row = $this->am->data($req_param)->result_array();
        
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->am->data($req_param)->result_array();
        

       
        $arr_data = array();
        foreach($result as $row) : 
        //$daft_id = $row['daft_id'];
             
            $id = $row['lap_c_id'];
         
            $arr_data[] = array(
                 
                                $row['nomor'],
                                flipdate($row['tanggal']),
                                $row['kejadian_uraian'],
                                $row['pelapor_nama'],
                                ($row['nama_penyidik']=="")?"<span style='color:red;'>BELUM ADA</span>":$row['nama_penyidik'], 
                              
                                " 
     <a class=\"btn btn-primary\" href=\" " . site_url("$controller/detail/".$id) ."\" >Detail </a>");
        endforeach;

         $responce = array('draw' => $draw, // ($start==0)?1:$start,
                          'recordsTotal' => $count, 
                          'recordsFiltered' => $count,
                          'data'=>$arr_data
            );
         
        echo json_encode($responce); 
    }


 
function detail($id){

	$detail = $this->dm->detail($id);
	$detail['tanggal'] = flipdate($detail['tanggal']);
	// $detail['kp_dilaporkan_pada'] = flipdate($detail['kp_dilaporkan_pada']);
	// $detail['kp_tanggal'] = flipdate($detail['kp_tanggal']);

    $detail['lap_c_id'] = $id;

    // show_array($detail); exit;

	
	$detail['controller'] = $this->controller;

	


	

	//show_array($detail);
	$content = $this->load->view($this->controller."_view_detail",$detail,true);
	$this->set_subtitle("DETAIL LAPORAN POLISI MODEL-C NOMOR : ".$detail['nomor']);
	$this->set_title("DETAIL  LAPORAN  POLISI MODEL-C NOMOR : ".$detail['nomor']);
	$this->set_content($content);
	$this->render_admin();


}
 
   

/// korban section 


function get_data_penyidik($lap_c_id){
        $controller = get_class($this);
        $userdata = $this->session->userdata("userdata");
        $draw = $_REQUEST['draw']; // get the requested page 
        $start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:"nama"; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"asc"; // get the direction if(!$sidx) $sidx =1;  
        
        // $nama = (isset($_REQUEST['columns'][1]['search']['value']))?$_REQUEST['columns'][1]['search']['value']:"";
        // $level = (isset($_REQUEST['columns'][1]['search']['value']))?$_REQUEST['columns'][2]['search']['value']:"x";
        // $tanggal_awal = $_REQUEST['columns'][4]['search']['value'];
        $nama = $_REQUEST['columns'][1]['search']['value'];
        $level = $_REQUEST['columns'][2]['search']['value'];


      //  order[0][column]
        $req_param = array (
                "sort_by" => $sidx,
                "sort_direction" => $sord,
                "limit" => null,
                "lap_c_id" => $lap_c_id
                
                 
        );     
           
        $row = $this->dm->get_data_penyidik($req_param)->result_array();
        
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->get_data_penyidik($req_param)->result_array();
        

       
        $arr_data = array();
        
        foreach($result as $row) : 
        //$daft_id = $row['daft_id'];
             
            $id = $row['idlp'];
            $polres_polsek = "";

            //echo "jenis =". $row['jenis'] . "<br />";
            if($row['jenis']=='polsek') {

                //echo "WATTTDEFAAAAKKK"; 
                $polres_polsek = "POLSEK - ". $row['nama_polsek'];
            }
            else if($row['jenis']=='polres') {
                $polres_polsek = "POLRES - ". $row['nama_polres'];
            }
            else {
            $polres_polsek   = "POLDA ";
            }
         
            $arr_data[] = array(
                 
                                
                                 
                                $row['user_id'], 
                                $row['nama'], 
                                $row['pangkat'],

                                $polres_polsek,

                                $row['nomor_hp'], 
                                $row['email'], 
                                 
                                 
                              
                                " 
         <a class='btn btn-danger'   href=\"javascript:penyidik_hapus('". $id ."')\" ><span class=\"glyphicon glyphicon-remove\"></span> Hapus</a> "
                                );
        endforeach;

         $responce = array('draw' => $draw, // ($start==0)?1:$start,
                          'recordsTotal' => $count, 
                          'recordsFiltered' => $count,
                          'data'=>$arr_data
            );
         
        echo json_encode($responce); 
    }
 





function get_data_perkembangan($lap_c_id){
        $controller = get_class($this);
        $userdata = $this->session->userdata("userdata");
        $draw = $_REQUEST['draw']; // get the requested page 
        $start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:"nama"; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"asc"; // get the direction if(!$sidx) $sidx =1;  
        
        // $nama = (isset($_REQUEST['columns'][1]['search']['value']))?$_REQUEST['columns'][1]['search']['value']:"";
        // $level = (isset($_REQUEST['columns'][1]['search']['value']))?$_REQUEST['columns'][2]['search']['value']:"x";
        // $tanggal_awal = $_REQUEST['columns'][4]['search']['value'];
        $nama = $_REQUEST['columns'][1]['search']['value'];
        $level = $_REQUEST['columns'][2]['search']['value'];


      //  order[0][column]
        $req_param = array (
                "sort_by" => $sidx,
                "sort_direction" => $sord,
                "limit" => null,
                "lap_c_id" => $lap_c_id
                
                 
        );     
           
        $row = $this->am->get_data_perkembangan($req_param)->result_array();
        
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->am->get_data_perkembangan($req_param)->result_array();
        

       
        $arr_data = array();
        
        foreach($result as $row) : 
        
             
            $id = $row['id'];
            $row['lidik']  = ($row['lidik']=="1")?"Penyidikan":"Penyelidikan";
         
            $arr_data[] = array(
                $row['lidik'], 
                $row['tahap'], 
                $row['no_dokumen'],            
                flipdate($row['tanggal']), 
                $row['keterangan'], 
                                 
                                 
                              
                               "<div class=\"btn-group\"> 
     <a class=\"btn dropdown-toggle btn-primary\" data-toggle=\"dropdown\" href=\"#\">Proses<span class=\"caret\"></span></a>
     
     <ul class=\"dropdown-menu\">
        <li><a '#'  onclick=\"perkembangan_edit('". $id ."')\" ><span class=\"glyphicon glyphicon-edit\"></span> Edit </a></li>
        <li><a  href='#' onclick=\"perkembangan_hapus('". $id ."')\" ><span class=\"glyphicon glyphicon-remove\"></span> Hapus</a></li>
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




function perkembangan_simpan(){
        $data=$this->input->post();

 

        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('tanggal','Tanggal','required'); 
        // $this->form_validation->set_rules('id_pasal','Pasal','required');
         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');
        if($this->form_validation->run() == TRUE ) { 
            



            /// upload the file 
            if(! empty($_FILES['file_dokumen']['name']) ) {
                    $config['upload_path'] = './documents/';
                    $config['allowed_types'] = 'txt|pdf|doc|docx|xls|xlsx';
                    $config['max_size'] = '1000000';
                    $config['max_width']  = '1024000';
                    $config['max_height']  = '76800000';
                    $this->load->library('upload',$config);
                    if ( ! $this->upload->do_upload('file_dokumen'))
                    {    
                        $error = array('error' => $this->upload->display_errors()); 
                         
                        $ret = array("success"=>false,
                                    "pesan"=>"Gambar terlalu besar atau file bukan file gambar. Silahkan pilih gambar yang lain",
                                    "operation" =>"insert");
                        echo json_encode($ret);
                        exit;
                    }
                    else {
                        $arr = $this->upload->data();
                     
                        
                         
                        $data['file_dokumen'] = $arr['file_name'];
                         
                    }
            }

            // end of upload file 








            unset($data['id']);


            $data['tanggal'] = flipdate($data['tanggal']);
           
            //$data['user_id'] = $userdata['id'];

            
            $data['id'] = md5(microtime(). rand(0,999999) );
             $res = $this->db->insert("lap_c_perkembangan",$data);

             // $lap_c_id = $this->db->insert_id();

             if($res) {

                 $ret = array("error"=>false,"message"=>"data perkembangan berhasil disimpan");
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


function perkembangan_update(){
        $data=$this->input->post();

 

        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('tanggal','Tanggal','required'); 
        // $this->form_validation->set_rules('id_pasal','Pasal','required');
         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');
        if($this->form_validation->run() == TRUE ) { 
            



            /// upload the file 
            if(! empty($_FILES['file_dokumen']['name']) ) {
                    $config['upload_path'] = './documents/';
                    $config['allowed_types'] = 'txt|pdf|doc|docx|xls|xlsx';
                    $config['max_size'] = '1000000';
                    $config['max_width']  = '1024000';
                    $config['max_height']  = '76800000';
                    $this->load->library('upload',$config);
                    if ( ! $this->upload->do_upload('file_dokumen'))
                    {    
                        $error = array('error' => $this->upload->display_errors()); 
                         
                        $ret = array("success"=>false,
                                    "pesan"=>"Gambar terlalu besar atau file bukan file gambar. Silahkan pilih gambar yang lain",
                                    "operation" =>"insert");
                        echo json_encode($ret);
                        exit;
                    }
                    else {
                        $arr = $this->upload->data();
                     
                        
                         
                        $data['file_dokumen'] = $arr['file_name'];
                         
                    }
            }
            else {
                unset($data['file_dokumen']);
            }

            // end of upload file 








          


            $data['tanggal'] = flipdate($data['tanggal']);
           
            //$data['user_id'] = $userdata['id'];

            
            $this->db->where("id",$data['id']);
             $res = $this->db->update("lap_c_perkembangan",$data);

             // echo $this->db->last_query(); exit;

             

             if($res) {

                 $ret = array("error"=>false,"message"=>"data perkembangan berhasil disimpan");
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

    
function perkembangan_hapus(){
    $data = $this->input->post();
    $this->db->where("id",$data['id']);
    $res = $this->db->delete("lap_c_perkembangan");
    if($res){
        $ret = array("error"=>false,"message"=>"Data Berhasi dihapus");

    }
    else {
        $ret = array("error"=>true,"message"=>"Data gagal dihapus");
    }
    echo json_encode($ret);
}


function get_perkembangan_detail_json($id){
    $detail = $this->am->get_perkembangan_detail_json($id);
    // show_array($detail);
    $detail['tanggal'] = flipdate($detail['tanggal']);
    echo json_encode($detail);
}


}
?>
