<?php
class lap_d_model extends CI_Model {
	function lap_d_model(){
		parent::__construct();
	}

 

function data($param){

	// show_array($param);

	$arr_column = array("nomor","tanggal","kejadian_apa","kejadian_tempat","kejadian_tanggal");

	$sort_by = $arr_column[$param['sort_by']];

	$this->db->select('c.*,u.nama as operator')->from('lap_d c')
	->join('pengguna u','u.id=c.user_id','left');


				// "tanggal_awall" => $tanggal_awal, 
				// "tanggal_akhir" => $tanggal_akhir,
				// "id_fungsi" => $id_fungsi 

    if($param['tanggal_awal']<> '') {
    	$tanggal_awal = flipdate($param['tanggal_awal']); 
    	$tanggal_akhir = flipdate($param['tanggal_akhir']); 
    	$this->db->where("tanggal between '$tanggal_awal' and '$tanggal_akhir'",null,false);
    }

    // if($param['id_fungsi'] > 0 ){
    // 	$this->db->where("id_fungsi",$param['id_fungsi']);
    // }




	($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
    ($param['sort_by'] != null) ? $this->db->order_by($sort_by, $param['sort_direction']) :'';
        
	$res = $this->db->get();
		// echo $this->db->last_query();
 	return $res;


	 

}


	function get_list_daftar($param) {
		 
		// echo $this->db->last_query();

		$this->db->select('*')->from('pangkat'); 
		$res = $this->db->get();
		
		$arr = array();
		if($res->num_rows() > 0 ){
			foreach($res->result() as $row) : 
				$color = ($row->approved==1)?"green":"red";


				$arr[] = array(
						 $row->pangkat_id,
						 $rot->pangkat_nama,
						"<div class=\"btn-group\"> 
     <a class=\"btn dropdown-toggle btn-primary\" data-toggle=\"dropdown\" href=\"#\">Proses<span class=\"caret\"></span></a>
     
     <ul class=\"dropdown-menu\">
		<li><a   href=\" " . site_url("baru_verifikasi/detail/".$row->daft_id) ."\" ><span class=\"glyphicon glyphicon-chevron-right\"></span> Edit </a></li>
		<li><a   href=\" " . site_url("baru_verifikasi/cetak_permohonan/".$row->daft_id) ."\" ><span class=\"glyphicon glyphicon-print\"></span> Hapus </a></li>
		 
		
       
	</ul>


	</div> "
					);
			endforeach;
			$ret = array("error"=>false,"message"=>$arr);
		}
		else {
			$ret = array("error"=>true,"message"=>"DATA TIDAK DITEMUKAN");
		}
		return $ret;
	}

 
function detail($id){
 
	 $this->db->select('lp.*, p.pangkat as pen_lapor_pangkat,
	 			desa.desa, 
				kec.id as kejadian_kec_id, 
				kec.kecamatan, 
				kota.id as kejadian_kota_id, 
				kota.kota, 
				prov.id as kejadian_prov_id, 
				prov.provinsi, 
	  ')
	 ->from("lap_d lp")
	 ->join("m_pangkat p","lp.pen_lapor_id_pangkat = p.id_pangkat","left")

	 ->join('tiger_desa desa','desa.id = lp.kejadian_id_desa ','left')
	->join('tiger_kecamatan kec','kec.id = desa.id_kecamatan ','left')
	->join('tiger_kota kota','kota.id = kec.id_kota ','left')
	->join('tiger_provinsi prov','prov.id = kota.id_provinsi','left')
	 ;

	 $this->db->where("lp.lap_d_id",$id);
	 $data = $this->db->get()->row_array();
	 return $data;
 
}

 
	
}
?>