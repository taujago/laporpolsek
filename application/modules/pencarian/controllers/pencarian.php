<?php
class pencarian extends master_controller {
// kesehatan,kekuatan, keturunan, masuk surga
	var $controller ;

	function pencarian(){
		parent::__construct();
		// $this->load->model("core_model","cm");
		$this->load->model("coremodel","cm");
		$this->load->helper("tanggal");
		$this->load->model("pencarian_model","dm");
		$this->controller = get_class($this);

		$this->userdata = $_SESSION['userdata'];

	}

	function index(){


// "operators" => array('equal', 'contains')
// "operators" => array('equal')

		$array = array(

			array(
		   	"id" => "pelapor_nama",
			"label" => "Nama pelapor / pemohon",
			"type" => "string",
			"operators" => array('equal', 'contains')
		   	), 

			array(
		   	"id" => "id_fungsi",
			"label" => "Fungsi Terkait",
			"type" => "string",
			"input" => "select",
			"values" => $this->cm->get_arr_dropdown("m_fungsi","id_fungsi","fungsi",'fungsi')
			,
			"operators" => array('equal')
			 
		   	), 


		   	array(
		   	"id" => "id_pasal",
			"label" => "Pasal",
			"type" => "string",
			"input" => "select",
			"values" => $this->cm->get_arr_dropdown("m_pasal","id","pasal",'pasal')
			,
			"operators" => array('equal')
			 
		   	), 

		   

		    array(
		   	"id" => "nomor",
			"label" => "Nomor Laporan",
			"type" => "string",
			"operators" => array('equal', 'contains')
		   	), 

		   	array(
		   	"id" => "id_gol_kejahatan",
			"label" => "Golongan Kejahatan",
			"type" => "string",
			"input" => "select",
			"values" => $this->cm->get_arr_dropdown("m_golongan_kejahatan","id","golongan_kejahatan",'golongan_kejahatan')
			,
			"operators" => array('equal')
			 
		   	), 

		   	array(
		   	"id" => "id_jenis_lokasi",
			"label" => "Lokasi Kejahatan",
			"type" => "string",
			"input" => "select",
			"values" => $this->cm->get_arr_dropdown("m_jenis_lokasi","id_jenis_lokasi","jenis_lokasi",'jenis_lokasi'),
			"operators" => array('equal')
		   	), 

		   	array(
		   	"id" => "tindak_pidana",
			"label" => "Tindak Pidana",
			"type" => "string",
			"operators" => array('equal', 'contains')
		   	),


		  


		 //   	array(
		 //   	"id" => "kp_tempat_kejadian",
			// "label" => "Tempat Kejadian Perkara",
			// "type" => "string",
			// "operators" => array('equal', 'contains')
		 //   	),


		   	array(
		   	"id" => "kp_id_motif_kejahatan",
			"label" => "Motif Kejahatan",
			"type" => "string",
			"input" => "select",
			"values" => $this->cm->get_arr_dropdown("m_motif","id_motif","motif",'motif'),
			"operators" => array('equal')
		   	) ,



		   	array(
		   	"id" => "kp_tanggal",
			"label" => "Tanggal Kejadian",
			"type" => "string",
			"operators" => array('equal', 'contains')
		   	), 


		   	array(
		   	"id" => "bulan_kejadian",
			"label" => "Bulan Kejadian",
			"type" => "string",
			"input" => "select",
			"values" => array(1=>"Januari","Februari","Maret","April","Mei","Juni",
						"Juli","Agustus","September","Oktober","November","Desember"),
			"operators" => array('equal')
		   	) ,


		   	array(
		   	"id" => "tahun_kejadian",
			"label" => "Tahun Kejadian",
			"type" => "string",
			"operators" => array('equal')			 
		   	)  ,


		   	array(
		   	"id" => "tanggal",
			"label" => "Tanggal laporan",
			"type" => "string",
			"operators" => array('equal', 'contains')
		   	), 



		   	array(
		   	"id" => "tanggal_awal",
			"label" => "Tanggal Pelaporan Minimal",
			"type" => "string",
			"operators" => array('equal')			 
		   	)  , 

		   	array(
		   	"id" => "tanggal_akhir",
			"label" => "Tanggal Pelaporan Maksimal",
			"type" => "string",
			"operators" => array('equal')			 
		   	)  


		   	,

		   	array(
		   	"id" => "kp_tempat_kejadian",
			"label" => "Tempat kejadian perkara",
			"type" => "string",
			"operators" => array('equal', 'contains')
		   	)

		   	,

		   	array(
		   	"id" => "kejadian_desa",
			"label" => "Desa/Kelurahan tempat kejadian perkara",
			"type" => "string",
			"operators" => array('equal', 'contains')
		   	)

		   	,

		   	array(
		   	"id" => "kejadian_kecamatan",
			"label" => "Kecamatan tempat kejadian perkara",
			"type" => "string",
			"operators" => array('equal', 'contains')
		   	)


		   	,

		   	array(
		   	"id" => "kejadian_kota",
			"label" => "Kota/Kabupaten tempat kejadian perkara",
			"type" => "string",
			"operators" => array('equal', 'contains')
		   	)

		   	,

		   	array(
		   	"id" => "kejadian_provinsi",
			"label" => "Provinsi tempat kejadian perkara",
			"type" => "string",
			"operators" => array('equal', 'contains')
		   	)

		   	,



		   	array(
		   	"id" => "merk",
			"label" => "Merk Kendaraan",
			"type" => "string",
			"operators" => array('equal', 'contains')
		   	)


		   	,

		   	array(
		   	"id" => "tersangka_nama",
			"label" => "Nama tersangka",
			"type" => "string",
			"operators" => array('equal', 'contains')
		   	)

		   	,

		   	array(
		   	"id" => "saksi_nama",
			"label" => "Nama saksi",
			"type" => "string",
			"operators" => array('equal', 'contains')
		   	)

		   	,

		   	array(
		   	"id" => "korban_nama",
			"label" => "Nama korban",
			"type" => "string",
			"operators" => array('equal', 'contains')
		   	)

		   	,

		   	array(
		   	"id" => "barbuk_nama",
			"label" => "Barang bukti",
			"type" => "string",
			"operators" => array('equal', 'contains')
		   	)

		   	,

		   	array(
		   	"id" => "pengemudi_nama",
			"label" => "Nama pengemudi",
			"type" => "string",
			"operators" => array('equal', 'contains')
		   	)

		   	,

		   	array(
		   	"id" => "no_polisi",
			"label" => "Nomor polisi",
			"type" => "string",
			"operators" => array('equal', 'contains')
		   	)


			);
		 


		$data_array['rules'] = json_encode($array); 

		// show_array($array); 
		// echo json_encode($array); 
		// exit;

		$controller = get_class($this);


		// $data['leasing_id'] = $userdata['leasing_id'];
		 


	 
		//show_array($data_array); exit;
		$data_array['controller'] = $controller;

		//show_array($data_array); exit;

	 
 
		$content = $this->load->view($controller."_view",$data_array,true);

		$this->set_subtitle("PENCARIAN");
		$this->set_title("PENCARIAN");
		$this->set_content($content);
		$this->render_baru();
	}



function cari(){
	$post = $this->input->post();
	// show_array($post['json_data']); 
	//exit;

	$json_data = $post['json_data'];

	 

	$i = 0;

	$str = "";
	foreach($post['json_data']['rules'] as $filter) : 
		extract($filter);	 

		$str .= ($i==0)?" where ":" ".$post['json_data']['condition']." ";

		


		if( !isset($filter['rules']) ) { 

			if($operator =='equal') {
				
				// if($field=="bulan") {
				// 	$str .=" month(kp_tanggal) = '$value' " ;
				// }
				// else if ($field=="tahun"){
				// 	$str .=" year(kp_tanggal) = '$value' " ;
				// }
				 if ($field=="tanggal_awal"){
					$str .=" tanggal  >= '$value' " ;
				}
				else if ($field=="tanggal_akhir"){
					$str .=" tanggal <= '$value' " ;
				}
				else { 
				$str .= " $field = '$value' ";
				}
			}
			else {
				$str .= " $field like  '%$value%' ";
			}

		}
		else {
			$str .= "( ";

			$j = 1; 
			$jumlah = count($filter['rules']); 
			foreach($filter['rules'] as $sub_filter) : 
				// $str .=" ".$sub_filter[''];

				if($sub_filter['operator'] =='equal') {
					

					// if($sub_filter['field']=="bulan") {
					// 	$str .=" month(kp_tanggal) = '".$sub_filter['value']."' ";
					// }
					// else if ($sub_filter['field']=="tahun"){
					// 	$str .=" year(kp_tanggal) = '".$sub_filter['value']."' ";
					// }
					if ($sub_filter['field']=="tanggal_awal"){ 
						$str .=" tanggal >= '".$sub_filter['value']."' ";
					}
					else if ($sub_filter['field']=="tanggal_akhir"){ 
						$str .=" tanggal <= '".$sub_filter['value']."' ";
					}
					else { 
						$str .= " ". $sub_filter['field'] . " = '".$sub_filter['value']."' ";
					}


				}
				else {
					$str .= " ". $sub_filter['field'] . " like  '%".$sub_filter['value']."%' ";
				}

				if($j < $jumlah) {
					$str .=" ". $filter['condition']. " ";
				}

				$j++;

			endforeach;
			$str .= " )  ";
		}


		// $str .= $filter['id'] 
		$i++;
	endforeach;
	$sql = "select * from v_pencarian ". $str; 

	$sql.=" group by laporan, id";

	//echo $sql; 

	// exit;

	$res = $this->db->query($sql); 
	$data['record'] = $res;

	$this->load->view($this->controller."_hasil_view",$data);
	// echo $str;

} 
	 

}
?>
