<?php
class admindik_lap_b_model extends CI_Model {
	function admindik_lap_b_model(){
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



function detail($id){
	 $this->db->select('a.*,gk.golongan_kejahatan, 
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
->join('m_agama agama','a.pelapor_id_agama=agama.id_agama','left')
->join('m_pendidikan pdk','a.pelapor_id_pendidikan=pdk.id_pendidikan','left')
->join('m_warga_negara wn','a.pelapor_id_warga_negara=wn.id_warga_negara','left')


->where("a.lap_b_id",$id);
$res = $this->db->get(); 


$data = $res->row_array();

return $data;




	 


	// lok.id_jenis_lokasi  = a.id_jenis_lokasi
}



function get_pasal($lap_b_id) {

	$this->db->select('*')
	->from("lap_b_pasal a")
	->join("m_pasal b","a.id_pasal = b.id")
	->where("lap_b_id",$lap_b_id);

	$res = $this->db->get(); 
	return $res;
}



function get_tersangka($lap_b_id) {
	$this->db->select(
		't.* , suku.suku, 
				k.pekerjaan, 
				desa.desa, 
				kec.id as tersangka_kec_id, 
				kec.kecamatan, 
				kota.id as tersangka_kota_id, 
				kota.kota, 
				prov.id as tersangka_prov_id, 
				prov.provinsi, a.agama,
				p.pendidikan '
		)->from('lap_b_tersangka t')
	->join('m_suku suku','suku.id_suku = t.tersangka_id_suku','left')
	->join('m_pekerjaan k','k.id_pekerjaan = t.tersangka_id_pekerjaan ','left')
	->join('tiger_desa desa','desa.id = t.tersangka_id_desa ','left')

	->join('tiger_kecamatan kec','kec.id = desa.id_kecamatan ','left')
	->join('tiger_kota kota','kota.id = kec.id_kota ','left')
	->join('tiger_provinsi prov','prov.id = kota.id_provinsi','left')
	->join('m_agama a','a.id_agama = t.tersangka_id_agama','left')
	->join('m_pendidikan p','p.id_pendidikan = t.tersangka_id_pendidikan','left')
	->where("lap_b_id",$lap_b_id);
	$res = $this->db->get();
	return $res;
}



function get_saksi($lap_b_id) {
	$this->db->select(
		't.* , suku.suku, 
				k.pekerjaan, 
				desa.desa, 
				kec.id as saksi_kec_id, 
				kec.kecamatan, 
				kota.id as saksi_kota_id, 
				kota.kota, 
				prov.id as saksi_prov_id, 
				prov.provinsi, a.agama,
				p.pendidikan '
		)->from('lap_b_saksi t')
	->join('m_suku suku','suku.id_suku = t.saksi_id_suku','left')
	->join('m_pekerjaan k','k.id_pekerjaan = t.saksi_id_pekerjaan ','left')
	->join('tiger_desa desa','desa.id = t.saksi_id_desa ','left')

	->join('tiger_kecamatan kec','kec.id = desa.id_kecamatan ','left')
	->join('tiger_kota kota','kota.id = kec.id_kota ','left')
	->join('tiger_provinsi prov','prov.id = kota.id_provinsi','left')
	->join('m_agama a','a.id_agama = t.saksi_id_agama','left')
	->join('m_pendidikan p','p.id_pendidikan = t.saksi_id_pendidikan','left')
	->where("lap_b_id",$lap_b_id);
	$res = $this->db->get();
	return $res;
}




function get_korban($lap_b_id) {
	$this->db->select(
		't.* , suku.suku, 
				k.pekerjaan, 
				desa.desa, 
				kec.id as korban_kec_id, 
				kec.kecamatan, 
				kota.id as korban_kota_id, 
				kota.kota, 
				prov.id as korban_prov_id, 
				prov.provinsi, a.agama ,
				p.pendidikan '
		)->from('lap_b_korban t')
	->join('m_suku suku','suku.id_suku = t.korban_id_suku','left')
	->join('m_pekerjaan k','k.id_pekerjaan = t.korban_id_pekerjaan ','left')
	->join('tiger_desa desa','desa.id = t.korban_id_desa ','left')

	->join('tiger_kecamatan kec','kec.id = desa.id_kecamatan ','left')
	->join('tiger_kota kota','kota.id = kec.id_kota ','left')
	->join('tiger_provinsi prov','prov.id = kota.id_provinsi','left')
	->join('m_agama a','a.id_agama = t.korban_id_agama','left')
	->join('m_pendidikan p','p.id_pendidikan = t.korban_id_pendidikan','left')
	->where("lap_b_id",$lap_b_id);

	$res = $this->db->get();
	// echo $this->db->last_query(); 
	return $res;
}




function get_barbuk($lap_b_id) {
	$this->db->select(
		't.*')->from("lap_b_barbuk t")
	->where("lap_b_id",$lap_b_id);
	$res = $this->db->get();
	return $res;
}


function get_data_penyidik($param){

	// show_array($param);

	$arr_column = array("user_id",
						"nama",
						"nomor_hp","email",
						"pangkat",
						"level"
		);

	$sort_by = $arr_column[$param['sort_by']];

	$this->db->select("a.*, b.pangkat, l.level  as level2,
	   res.nama_polres, sek.nama_polsek,lp.id as idlp
	 ")->from('pengguna a',false)
	->join('m_pangkat b','a.id_pangkat=b.id_pangkat','left')
	->join("m_polres res","res.id_polres = a.id_polres",'left')
	->join("m_polsek sek","sek.id_polsek=a.id_polsek","left")
	->join("m_level l",'l.id=a.level','left')
	->join("lap_b_penyidik lp","lp.id_penyidik=a.id","left")
	->where("lp.lap_b_id",$param['lap_b_id']);

	 
	

	($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
    // ($param['sort_by'] != null) ? $this->db->order_by($sort_by,$param['sort_direction']) :'';
        
	$res = $this->db->get();
		// echo $this->db->last_query();
 	return $res;
 	

	 

}

function get_arr_data_penyidik(){
	 

	$this->db->where("level","2");
	$this->db->order_by("nama");
	$res = $this->db->get("pengguna a");


	$arr = array();
	foreach($res->result() as $row ) : 
		$arr[$row->id] = $row->nama. " (".$row->user_id.")";
	endforeach;
	return $arr;

}



function get_perkembangan($lap_b_id){
	$this->db->select('a.*,b.tahap')->from('lap_b_perkembangan a'); 
	$this->db->join("m_tahap b","a.id_tahap = b.id","left");

				// "tanggal_awall" => $tanggal_awal, 
				// "tanggal_akhir" => $tanggal_akhir,
				// "id_fungsi" => $id_fungsi 

    

    
    $this->db->where("a.lap_b_id",$lap_b_id);
    $res = $this->db->get("lap_b_perkembangan");
    return $res;
}


	
}
?>