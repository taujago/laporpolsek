<?php
class admindik_laka_model extends CI_Model {
	function admindik_laka_model(){
		parent::__construct();
	}

 

function data($param){

	// show_array($param);

	$arr_column = array("nomor",
						"tanggal",
						"kp_tempat_kejadian",
						"kp_tanggal",
						"pelapor_nama",
						"nama_penyidik");

 


	$sort_by = $arr_column[$param['sort_by']];

	$this->db->select('*')->from('v_lap_laka'); 


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
	 $this->db->select('a.*, 
	 	 
pel_pangkat.pangkat as pelapor_pangkat,

meng_pangkat.pangkat as meng_pangkat,

				desa.desa, 
				kec.id as kp_kec_id, 
				kec.kecamatan, 
				kota.id as kp_kota_id, 
				kota.kota, 
				prov.id as kp_prov_id, 
				prov.provinsi, 
				sat.kesatuan as pelapor_kesatuan,
				



u.nama as pengguna ')
->from("lap_laka_lantas a")

->join("m_pangkat pel_pangkat","pel_pangkat.id_pangkat = a.pelapor_id_pangkat ",'left')

->join("m_pangkat meng_pangkat","meng_pangkat.id_pangkat = a.pengetahui_id_pangkat",'left')
->join("pengguna u","u.id = a.user_id",'left')
->join('tiger_desa desa','desa.id = a.kp_id_desa ','left')
->join('tiger_kecamatan kec','kec.id = desa.id_kecamatan ','left')
->join('tiger_kota kota','kota.id = kec.id_kota ','left')
->join('tiger_provinsi prov','prov.id = kota.id_provinsi','left')
->join('m_kesatuan sat','sat.id_kesatuan = a.pelapor_id_kesatuan','left')

->where("a.lap_laka_lantas_id",$id);

$res = $this->db->get(); 


$data = $res->row_array();

return $data;


}

 

function get_pasal($lap_laka_lantas_id) {

	$this->db->select('*')
	->from("lap_laka_pasal a")
	->join("m_pasal b","a.id_pasal = b.id")
	->where("lap_laka_lantas_id",$lap_laka_lantas_id);

	$res = $this->db->get(); 
	return $res;
}



function get_pengemudi($lap_laka_lantas_id) {
	$this->db->select(
		't.* ,  a.agama, 
				k.pekerjaan, 
				desa.desa, 
				kec.id as pengemudi_kec_id, 
				kec.kecamatan, 
				kota.id as pengemudi_kota_id, 
				kota.kota, 
				prov.id as pengemudi_prov_id, 
				prov.provinsi, a.agama,
				p.pendidikan '
		)->from('lap_laka_pengemudi t')
	// ->join('m_suku suku','suku.id_suku = t.pengemudi_id_suku','left')
	->join('m_pekerjaan k','k.id_pekerjaan = t.pengemudi_id_pekerjaan ','left')
	->join('tiger_desa desa','desa.id = t.pengemudi_id_desa ','left')

	->join('tiger_kecamatan kec','kec.id = desa.id_kecamatan ','left')
	->join('tiger_kota kota','kota.id = kec.id_kota ','left')
	->join('tiger_provinsi prov','prov.id = kota.id_provinsi','left')
	->join('m_agama a','a.id_agama = t.pengemudi_id_agama','left')
	->join('m_pendidikan p','p.id_pendidikan = t.pengemudi_id_pendidikan','left')
	->where("lap_laka_lantas_id",$lap_laka_lantas_id);
	$res = $this->db->get();
	return $res;
}



function get_saksi($lap_laka_lantas_id) {
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
		)->from('lap_laka_saksi t')
	->join('m_suku suku','suku.id_suku = t.saksi_id_suku','left')
	->join('m_pekerjaan k','k.id_pekerjaan = t.saksi_id_pekerjaan ','left')
	->join('tiger_desa desa','desa.id = t.saksi_id_desa ','left')

	->join('tiger_kecamatan kec','kec.id = desa.id_kecamatan ','left')
	->join('tiger_kota kota','kota.id = kec.id_kota ','left')
	->join('tiger_provinsi prov','prov.id = kota.id_provinsi','left')
	->join('m_agama a','a.id_agama = t.saksi_id_agama','left')
	->join('m_pendidikan p','p.id_pendidikan = t.saksi_id_pendidikan','left')
	->where("lap_laka_lantas_id",$lap_laka_lantas_id);
	$res = $this->db->get();
	return $res;
}




function get_korban($lap_laka_lantas_id) {
	$this->db->select(
		't.* ,  
				k.pekerjaan, 
				desa.desa, 
				kec.id as korban_kec_id, 
				kec.kecamatan, 
				kota.id as korban_kota_id, 
				kota.kota, 
				prov.id as korban_prov_id, 
				prov.provinsi, a.agama ,
				p.pendidikan '
		)->from('lap_laka_korban t')
	// ->join('m_suku suku','suku.id_suku = t.korban_id_suku','left')
	->join('m_pekerjaan k','k.id_pekerjaan = t.korban_id_pekerjaan ','left')
	->join('tiger_desa desa','desa.id = t.korban_id_desa ','left')

	->join('tiger_kecamatan kec','kec.id = desa.id_kecamatan ','left')
	->join('tiger_kota kota','kota.id = kec.id_kota ','left')
	->join('tiger_provinsi prov','prov.id = kota.id_provinsi','left')
	->join('m_agama a','a.id_agama = t.korban_id_agama','left')
	->join('m_pendidikan p','p.id_pendidikan = t.korban_id_pendidikan','left')
	->where("lap_laka_lantas_id",$lap_laka_lantas_id);

	$res = $this->db->get();
	// echo $this->db->last_query();  exit;
	return $res;
}




function get_kendaraan($lap_laka_lantas_id) {
	$this->db->select(
		't.*,

				desa.desa, 
				kec.id as korban_kec_id, 
				kec.kecamatan, 
				kota.id as korban_kota_id, 
				kota.kota, 
				prov.id as korban_prov_id, 
				prov.provinsi

		')->from("lap_laka_kendaraan t")

	->join('tiger_desa desa','desa.id = t.pemilik_id_desa ','left')

	->join('tiger_kecamatan kec','kec.id = desa.id_kecamatan ','left')
	->join('tiger_kota kota','kota.id = kec.id_kota ','left')
	->join('tiger_provinsi prov','prov.id = kota.id_provinsi','left')


	->where("lap_laka_lantas_id",$lap_laka_lantas_id);
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
	->join("lap_laka_penyidik lp","lp.id_penyidik=a.id","left")
	->where("lp.lap_laka_lantas_id",$param['lap_laka_lantas_id']);

	 
	

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



function get_perkembangan($lap_laka_lantas_id){
	$this->db->select('a.*,b.tahap')->from('lap_laka_perkembangan a'); 
	$this->db->join("m_tahap b","a.id_tahap = b.id","left");
    $this->db->where("a.lap_laka_lantas_id",$lap_laka_lantas_id);
    $res = $this->db->get();
    return $res;
}


	
}
?>