<?php
class lap_b_model extends CI_Model {
	function lap_b_model(){
		parent::__construct();
	}

 

function data($param){

	// show_array($param);

	$arr_column = array("nomor","tanggal","pelapor_nama","terlapor","tindak_pidana","operator");

	$sort_by = $arr_column[$param['sort_by']];

	$this->db->select('*')->from('v_lap_b'); 


				// "tanggal_awall" => $tanggal_awal, 
				// "tanggal_akhir" => $tanggal_akhir,
				// "id_fungsi" => $id_fungsi 

    if($param['tanggal_awal']<> '') {
    	$tanggal_awal = flipdate($param['tanggal_awal']); 
    	$tanggal_akhir = flipdate($param['tanggal_akhir']); 
    	$this->db->where("tanggal between '$tanggal_awal' and '$tanggal_akhir'",null,false);
    }

    if($param['id_fungsi'] > 0 ){
    	$this->db->where("id_fungsi",$param['id_fungsi']);
    }




	($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
    ($param['sort_by'] != null) ? $this->db->order_by($sort_by, $param['sort_direction']) :'';
        
	$res = $this->db->get();
		// echo $this->db->last_query();
 	return $res;


	$res = $this->db->get();

}


function get_lap_b_terlapor($param){
	$arr_column = array(
		"tersangka_nama",
		"tersangka_tgl_lahir",
		"tersangka_tmp_lahir",
		"agama",
		"suku",
		"pekerjaan",
		"alamat"
	);

	$sort_by = $arr_column[$param['sort_by']];
 
	$this->db->select(
		't.* , suku.suku, 
				k.pekerjaan, 
				desa.desa, 
				kec.id as tersangka_kec_id, 
				kec.kecamatan, 
				kota.id as tersangka_kota_id, 
				kota.kota, 
				prov.id as tersangka_prov_id, 
				prov.provinsi, a.agama '
		)->from('lap_b_tersangka t')
	->join('m_suku suku','suku.id_suku = t.tersangka_id_suku','left')
	->join('m_pekerjaan k','k.id_pekerjaan = t.tersangka_id_pekerjaan ','left')
	->join('tiger_desa desa','desa.id = t.tersangka_id_desa ','left')

	->join('tiger_kecamatan kec','kec.id = desa.id_kecamatan ','left')
	->join('tiger_kota kota','kota.id = kec.id_kota ','left')
	->join('tiger_provinsi prov','prov.id = kota.id_provinsi','left')
	->join('m_agama a','a.id_agama = t.tersangka_id_agama','left')
	->where("lap_b_id",$param['lap_b_id']);

	($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
    ($param['sort_by'] != null) ? $this->db->order_by($sort_by, $param['sort_direction']) :'';
        
	$res = $this->db->get();
		// echo $this->db->last_query();
 	return $res;


	// $res = $this->db->get();
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
	 $this->db->select('a.*,gk.golongan_kejahatan, 
	 	gk.id_kelompok,
	 	pasal.pasal, 
lok.jenis_lokasi, 
f.fungsi, 
motif.motif, 
pen_pangkat.pangkat as penerima_pangkat, 
meng_pangkat.pangkat as mengetahui_pangkat,

				desa.desa, 
				kec.id as pelapor_kec_id, 
				kec.kecamatan, 
				kota.id as pelapor_kota_id, 
				kota.kota, 
				prov.id as pelapor_prov_id, 
				prov.provinsi, 



				k_desa.desa as kejadian_desa, 
				k_kec.id as kejadian_kec_id, 
				k_kec.kecamatan as kejadian_kecamatan , 
				k_kota.id as kejadian_kota_id, 
				k_kota.kota as kejadian_kota , 
				k_prov.id as kejadian_prov_id, 
				k_prov.provinsi as kejadian_provinsi , 



kerja.pekerjaan, 
agama.agama,
pdk.pendidikan,
wn.warga_negara,

u.nama as pengguna ')
->from("lap_b a")
->join("m_golongan_kejahatan gk","a.id_gol_kejahatan = gk.id",'left')
->join("m_jenis_lokasi lok","lok.id_jenis_lokasi  = a.id_jenis_lokasi",'left')
->join("m_fungsi f","f.id_fungsi = a.id_fungsi ",'left')
->join("m_motif motif","motif.id_motif = a.kejadian_id_motif_kejahatan ",'left')
->join("m_pangkat pen_pangkat","pen_pangkat.id_pangkat = a.pen_lapor_id_pangkat ",'left')
->join("m_pangkat meng_pangkat","meng_pangkat.id_pangkat = a.mengetahui_id_pangkat",'left')
->join("pengguna u","u.id = a.user_id",'left')
->join("m_pasal pasal","pasal.id = a.id_pasal",'left') 
->join('tiger_desa desa','desa.id = a.pelapor_id_desa ','left')
->join('tiger_kecamatan kec','kec.id = desa.id_kecamatan ','left')
->join('tiger_kota kota','kota.id = kec.id_kota ','left')
->join('tiger_provinsi prov','prov.id = kota.id_provinsi','left')
->join('m_pekerjaan kerja','a.pelapor_id_pekerjaan','kerja.id_pekerjaan')
->join('m_agama agama','a.pelapor_id_agama=agama.id_agama')
->join('m_pendidikan pdk','a.pelapor_id_pendidikan=pdk.id_pendidikan')
->join('m_warga_negara wn','a.pelapor_id_warga_negara=wn.id_warga_negara')


->join('tiger_desa k_desa','k_desa.id = a.pelapor_id_desa ','left')
->join('tiger_kecamatan k_kec','k_kec.id = k_desa.id_kecamatan ','left')
->join('tiger_kota k_kota','k_kota.id = k_kec.id_kota ','left')
->join('tiger_provinsi k_prov','k_prov.id = k_kota.id_provinsi','left')


->where("a.lap_b_id",$id);
$res = $this->db->get(); 


$data = $res->row_array();

return $data;




	 


	// lok.id_jenis_lokasi  = a.id_jenis_lokasi
}


function get_lap_b_tersangka_detail($id){

	$this->db->select(
		't.* , suku.suku, 
				k.pekerjaan, 
				desa.desa, 
				kec.id as tersangka_kec_id, 
				kec.kecamatan, 
				kota.id as tersangka_kota_id, 
				kota.kota, 
				prov.id as tersangka_prov_id, 
				prov.provinsi, a.agama '
		)->from('lap_b_tersangka t')
	->join('m_suku suku','suku.id_suku = t.tersangka_id_suku','left')
	->join('m_pekerjaan k','k.id_pekerjaan = t.tersangka_id_pekerjaan ','left')
	->join('tiger_desa desa','desa.id = t.tersangka_id_desa ','left')

	->join('tiger_kecamatan kec','kec.id = desa.id_kecamatan ','left')
	->join('tiger_kota kota','kota.id = kec.id_kota ','left')
	->join('tiger_provinsi prov','prov.id = kota.id_provinsi','left')
	->join('m_agama a','a.id_agama = t.tersangka_id_agama','left');
	$this->db->where("t.id",$id);
	$res = $this->db->get();
	return $res->row_array();
}




function get_lap_b_saksi_detail($id){

	$this->db->select(
		't.* , suku.suku, 
				k.pekerjaan, 
				desa.desa, 
				kec.id as saksi_kec_id, 
				kec.kecamatan, 
				kota.id as saksi_kota_id, 
				kota.kota, 
				prov.id as saksi_prov_id, 
				prov.provinsi, a.agama '
		)->from('lap_b_saksi t')
	->join('m_suku suku','suku.id_suku = t.saksi_id_suku','left')
	->join('m_pekerjaan k','k.id_pekerjaan = t.saksi_id_pekerjaan ','left')
	->join('tiger_desa desa','desa.id = t.saksi_id_desa ','left')

	->join('tiger_kecamatan kec','kec.id = desa.id_kecamatan ','left')
	->join('tiger_kota kota','kota.id = kec.id_kota ','left')
	->join('tiger_provinsi prov','prov.id = kota.id_provinsi','left')
	->join('m_agama a','a.id_agama = t.saksi_id_agama','left');
	$this->db->where("t.id",$id);
	$res = $this->db->get();
	return $res->row_array();
}

function get_lap_b_saksi($param){
	$arr_column = array(
		"saksi_nama",
		"saksi_tgl_lahir",
		"saksi_tmp_lahir",
		"agama",
		"suku",
		"pekerjaan",
		"alamat"
	);

	$sort_by = $arr_column[$param['sort_by']];
 
	$this->db->select(
		't.* , suku.suku, 
				k.pekerjaan, 
				desa.desa, 
				kec.id as saksi_kec_id, 
				kec.kecamatan, 
				kota.id as saksi_kota_id, 
				kota.kota, 
				prov.id as saksi_prov_id, 
				prov.provinsi, a.agama '
		)->from('lap_b_saksi t')
	->join('m_suku suku','suku.id_suku = t.saksi_id_suku','left')
	->join('m_pekerjaan k','k.id_pekerjaan = t.saksi_id_pekerjaan ','left')
	
	->join('tiger_desa desa','desa.id = t.saksi_id_desa ','left')

	->join('tiger_kecamatan kec','kec.id = desa.id_kecamatan ','left')
	->join('tiger_kota kota','kota.id = kec.id_kota ','left')
	->join('tiger_provinsi prov','prov.id = kota.id_provinsi','left')
	->join('m_agama a','a.id_agama = t.saksi_id_agama','left')
	->where("lap_b_id",$param['lap_b_id']);

	($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
    ($param['sort_by'] != null) ? $this->db->order_by($sort_by, $param['sort_direction']) :'';
        
	$res = $this->db->get();
		// echo $this->db->last_query();
 	return $res;


	$res = $this->db->get();
}




function get_lap_b_korban($param){
	$arr_column = array(
		"korban_nama",
		"korban_tgl_lahir",
		"korban_tmp_lahir",
		"agama",
		"suku",
		"pekerjaan",
		"alamat"
	);

	$sort_by = $arr_column[$param['sort_by']];
 
	$this->db->select(
		't.* , suku.suku, 
				k.pekerjaan, 
				desa.desa, 
				kec.id as korban_kec_id, 
				kec.kecamatan, 
				kota.id as korban_kota_id, 
				kota.kota, 
				prov.id as korban_prov_id, 
				prov.provinsi, a.agama '
		)->from('lap_b_korban t')
	->join('m_suku suku','suku.id_suku = t.korban_id_suku','left')
	->join('m_pekerjaan k','k.id_pekerjaan = t.korban_id_pekerjaan ','left')
	->join('tiger_desa desa','desa.id = t.korban_id_desa ','left')

	->join('tiger_kecamatan kec','kec.id = desa.id_kecamatan ','left')
	->join('tiger_kota kota','kota.id = kec.id_kota ','left')
	->join('tiger_provinsi prov','prov.id = kota.id_provinsi','left')
	->join('m_agama a','a.id_agama = t.korban_id_agama','left')
	->where("lap_b_id",$param['lap_b_id']);

	($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
    ($param['sort_by'] != null) ? $this->db->order_by($sort_by, $param['sort_direction']) :'';
        
	$res = $this->db->get();
		// echo $this->db->last_query();
 	return $res;


	$res = $this->db->get();
}




function get_lap_b_korban_detail($id){

	$this->db->select(
		't.* , suku.suku, 
				k.pekerjaan, 
				desa.desa, 
				kec.id as korban_kec_id, 
				kec.kecamatan, 
				kota.id as korban_kota_id, 
				kota.kota, 
				prov.id as korban_prov_id, 
				prov.provinsi, a.agama '
		)->from('lap_b_korban t')
	->join('m_suku suku','suku.id_suku = t.korban_id_suku','left')
	->join('m_pekerjaan k','k.id_pekerjaan = t.korban_id_pekerjaan ','left')
	->join('tiger_desa desa','desa.id = t.korban_id_desa ','left')

	->join('tiger_kecamatan kec','kec.id = desa.id_kecamatan ','left')
	->join('tiger_kota kota','kota.id = kec.id_kota ','left')
	->join('tiger_provinsi prov','prov.id = kota.id_provinsi','left')
	->join('m_agama a','a.id_agama = t.korban_id_agama','left');
	$this->db->where("t.id",$id);
	$res = $this->db->get();
	return $res->row_array();
}


function get_lap_b_barbuk_detail($id){

	$this->db->select(
		't.*')->from('lap_b_barbuk t');
	 
	$this->db->where("t.id",$id);
	$res = $this->db->get();
	return $res->row_array();
}

function get_lap_b_barbuk($param){
	$arr_column = array(
		"barbuk_nama"
		 
	);

	$sort_by = $arr_column[$param['sort_by']];
 
	$this->db->select(
		't.*')->from("lap_b_barbuk t")
	->where("lap_b_id",$param['lap_b_id']);

	($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
    ($param['sort_by'] != null) ? $this->db->order_by($sort_by, $param['sort_direction']) :'';
        
	$res = $this->db->get();
		// echo $this->db->last_query();
 	return $res;


	$res = $this->db->get();
}



function get_lap_b_pasal($param){
	$arr_column = array(
		"pasal"
		 
	);

	$sort_by = $arr_column[$param['sort_by']];
 
	$this->db->select(
		't.*,pasal.pasal')->from("lap_b_pasal t")
	->join("m_pasal pasal","t.id_pasal = pasal.id","left")
	->where("lap_b_id",$param['lap_b_id']);

	($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
    ($param['sort_by'] != null) ? $this->db->order_by($sort_by, $param['sort_direction']) :'';
        
	$res = $this->db->get();
		// echo $this->db->last_query();
 	return $res;


	$res = $this->db->get();
}



////  #TEMP MODEL 

function temp_get_lap_b_terlapor($param){
	$arr_column = array(
		"tersangka_nama",
		"tersangka_tgl_lahir",
		"tersangka_tmp_lahir",
		"agama",
		"suku",
		"pekerjaan",
		"alamat"
	);

	$sort_by = $arr_column[$param['sort_by']];
 
	$this->db->select(
		't.* , suku.suku, 
				k.pekerjaan, 
				desa.desa, 
				kec.id as tersangka_kec_id, 
				kec.kecamatan, 
				kota.id as tersangka_kota_id, 
				kota.kota, 
				prov.id as tersangka_prov_id, 
				prov.provinsi, a.agama '
		)->from('lap_b_tersangka t')
	->join('m_suku suku','suku.id_suku = t.tersangka_id_suku','left')
	->join('m_pekerjaan k','k.id_pekerjaan = t.tersangka_id_pekerjaan ','left')
	->join('tiger_desa desa','desa.id = t.tersangka_id_desa ','left')

	->join('tiger_kecamatan kec','kec.id = desa.id_kecamatan ','left')
	->join('tiger_kota kota','kota.id = kec.id_kota ','left')
	->join('tiger_provinsi prov','prov.id = kota.id_provinsi','left')
	->join('m_agama a','a.id_agama = t.tersangka_id_agama','left')
	->where("temp_lap_b_id",$param['temp_lap_b_id']);

	($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
    ($param['sort_by'] != null) ? $this->db->order_by($sort_by, $param['sort_direction']) :'';
        
	$res = $this->db->get();
		// echo $this->db->last_query();
 	return $res;


	// $res = $this->db->get();
}




function temp_get_lap_b_saksi($param){
	$arr_column = array(
		"saksi_nama",
		"saksi_tgl_lahir",
		"saksi_tmp_lahir",
		"agama",
		"suku",
		"pekerjaan",
		"alamat"
	);

	$sort_by = $arr_column[$param['sort_by']];
 
	$this->db->select(
		't.* , suku.suku, 
				k.pekerjaan, 
				desa.desa, 
				kec.id as saksi_kec_id, 
				kec.kecamatan, 
				kota.id as saksi_kota_id, 
				kota.kota, 
				prov.id as saksi_prov_id, 
				prov.provinsi, a.agama '
		)->from('lap_b_saksi t')
	->join('m_suku suku','suku.id_suku = t.saksi_id_suku','left')
	->join('m_pekerjaan k','k.id_pekerjaan = t.saksi_id_pekerjaan ','left')
	->join('tiger_desa desa','desa.id = t.saksi_id_desa ','left')

	->join('tiger_kecamatan kec','kec.id = desa.id_kecamatan ','left')
	->join('tiger_kota kota','kota.id = kec.id_kota ','left')
	->join('tiger_provinsi prov','prov.id = kota.id_provinsi','left')
	->join('m_agama a','a.id_agama = t.saksi_id_agama','left')
	->where("temp_lap_b_id",$param['temp_lap_b_id']);

	($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
    ($param['sort_by'] != null) ? $this->db->order_by($sort_by, $param['sort_direction']) :'';
        
	$res = $this->db->get();
		// echo $this->db->last_query();
 	return $res;


	$res = $this->db->get();
}




function temp_get_lap_b_korban($param){
	$arr_column = array(
		"korban_nama",
		"korban_tgl_lahir",
		"korban_tmp_lahir",
		"agama",
		"suku",
		"pekerjaan",
		"alamat"
	);

	$sort_by = $arr_column[$param['sort_by']];
 
	$this->db->select(
		't.* , suku.suku, 
				k.pekerjaan, 
				desa.desa, 
				kec.id as korban_kec_id, 
				kec.kecamatan, 
				kota.id as korban_kota_id, 
				kota.kota, 
				prov.id as korban_prov_id, 
				prov.provinsi, a.agama '
		)->from('lap_b_korban t')
	->join('m_suku suku','suku.id_suku = t.korban_id_suku','left')
	->join('m_pekerjaan k','k.id_pekerjaan = t.korban_id_pekerjaan ','left')
	->join('tiger_desa desa','desa.id = t.korban_id_desa ','left')

	->join('tiger_kecamatan kec','kec.id = desa.id_kecamatan ','left')
	->join('tiger_kota kota','kota.id = kec.id_kota ','left')
	->join('tiger_provinsi prov','prov.id = kota.id_provinsi','left')
	->join('m_agama a','a.id_agama = t.korban_id_agama','left')
	->where("temp_lap_b_id",$param['temp_lap_b_id']);

	($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
    ($param['sort_by'] != null) ? $this->db->order_by($sort_by, $param['sort_direction']) :'';
        
	$res = $this->db->get();
		// echo $this->db->last_query();
 	return $res;


	$res = $this->db->get();
}




function temp_get_lap_b_barbuk($param){
	$arr_column = array(
		"barbuk_nama",
		"barbuk_jumlah",
		"barbuk_satuan"
		 
	);

	$sort_by = $arr_column[$param['sort_by']];
 
	$this->db->select(
		't.barbuk_nama,t.barbuk_jumlah,t.barbuk_satuan,t.*')->from("lap_b_barbuk t")
	->where("temp_lap_b_id",$param['temp_lap_b_id']);

	($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
    ($param['sort_by'] != null) ? $this->db->order_by($sort_by, $param['sort_direction']) :'';
        
	$res = $this->db->get();
		// echo $this->db->last_query();
 	return $res;


	$res = $this->db->get();
}





function temp_get_lap_b_pasal($param){
	$arr_column = array(
		"pasal" 
		 
		 
	);

	$sort_by = $arr_column[$param['sort_by']];
 
	$this->db->select(
		't.*,p.pasal')->from("lap_b_pasal t")
	->join("m_pasal p","p.id = t.id_pasal")
	->where("temp_lap_b_id",$param['temp_lap_b_id']);

	($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
    ($param['sort_by'] != null) ? $this->db->order_by($sort_by, $param['sort_direction']) :'';
        
	$res = $this->db->get();
		// echo $this->db->last_query();
 	return $res;


	$res = $this->db->get();
}



function get_data_tersangka($lap_b_id) {
	$this->db->select(
		't.* , suku.suku, 
				k.pekerjaan, 
				desa.desa, 
				kec.id as tersangka_kec_id, 
				kec.kecamatan, 
				kota.id as tersangka_kota_id, 
				kota.kota, 
				prov.id as tersangka_prov_id, 
				prov.provinsi, a.agama '
		)->from('lap_b_tersangka t')
	->join('m_suku suku','suku.id_suku = t.tersangka_id_suku','left')
	->join('m_pekerjaan k','k.id_pekerjaan = t.tersangka_id_pekerjaan ','left')
	->join('tiger_desa desa','desa.id = t.tersangka_id_desa ','left')

	->join('tiger_kecamatan kec','kec.id = desa.id_kecamatan ','left')
	->join('tiger_kota kota','kota.id = kec.id_kota ','left')
	->join('tiger_provinsi prov','prov.id = kota.id_provinsi','left')
	->join('m_agama a','a.id_agama = t.tersangka_id_agama','left')
	->where("lap_b_id",$lap_b_id);

	$res = $this->db->get();
	// echo $this->db->last_query(); 
	return $res;
}


function get_data_korban($lap_b_id) {
	$this->db->select(
		't.* , suku.suku, 
				k.pekerjaan, 
				desa.desa, 
				kec.id as korban_kec_id, 
				kec.kecamatan, 
				kota.id as korban_kota_id, 
				kota.kota, 
				prov.id as korban_prov_id, 
				prov.provinsi, a.agama '
		)->from('lap_b_korban t')
	->join('m_suku suku','suku.id_suku = t.korban_id_suku','left')
	->join('m_pekerjaan k','k.id_pekerjaan = t.korban_id_pekerjaan ','left')
	->join('tiger_desa desa','desa.id = t.korban_id_desa ','left')

	->join('tiger_kecamatan kec','kec.id = desa.id_kecamatan ','left')
	->join('tiger_kota kota','kota.id = kec.id_kota ','left')
	->join('tiger_provinsi prov','prov.id = kota.id_provinsi','left')
	->join('m_agama a','a.id_agama = t.korban_id_agama','left')
	->where("lap_b_id",$lap_b_id);

	$res = $this->db->get();
	// echo $this->db->last_query(); 
	return $res;
}


function get_data_saksi($lap_b_id) {
	$this->db->select(
		't.* , suku.suku, 
				k.pekerjaan, 
				desa.desa, 
				kec.id as saksi_kec_id, 
				kec.kecamatan, 
				kota.id as saksi_kota_id, 
				kota.kota, 
				prov.id as saksi_prov_id, 
				prov.provinsi, a.agama '
		)->from('lap_b_saksi t')
	->join('m_suku suku','suku.id_suku = t.saksi_id_suku','left')
	->join('m_pekerjaan k','k.id_pekerjaan = t.saksi_id_pekerjaan ','left')
	->join('tiger_desa desa','desa.id = t.saksi_id_desa ','left')

	->join('tiger_kecamatan kec','kec.id = desa.id_kecamatan ','left')
	->join('tiger_kota kota','kota.id = kec.id_kota ','left')
	->join('tiger_provinsi prov','prov.id = kota.id_provinsi','left')
	->join('m_agama a','a.id_agama = t.saksi_id_agama','left')
	->where("lap_b_id",$lap_b_id);

	$res = $this->db->get();
	// echo $this->db->last_query(); exit;
	return $res;
}

function get_data_barbuk($lap_b_id) {
	$this->db->select(
		't.*')->from("lap_b_barbuk t")
	->where("lap_b_id",$lap_b_id);
	$res = $this->db->get();
	return $res;
}

function get_data_terlapor($lap_b_id) {
	$this->db->where("lap_b_id",$lap_b_id); 
	$data = $this->db->get("v_lap_b")->row();
	return $data->terlapor;
}
	
}
?>