<?php
class admindik_lap_d_model extends CI_Model {
	function admindik_lap_d_model(){
		parent::__construct();
	}

 

function data($param){

	
	// show_array($param);

	$arr_column = array(
			"nomor",
			"tanggal",
			"kejadian_apa",
			"kejadian_tanggal",
			"nama_penyidik"); 

		 

	$sort_by = $arr_column[$param['sort_by']];

	$this->db->select('c.*,u.nama as operator')->from('v_lap_d c')
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




	 


	// lok.id_jenis_lokasi  = a.id_jenis_lokasi
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
	->join("lap_d_penyidik lp","lp.id_penyidik=a.id","left")
	->where("lp.lap_d_id",$param['lap_d_id']);

	 
	

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



function get_perkembangan($lap_d_id){
	$this->db->select('a.*,b.tahap')->from('lap_d_perkembangan a'); 
	$this->db->join("m_tahap b","a.id_tahap = b.id","left");

				// "tanggal_awall" => $tanggal_awal, 
				// "tanggal_akhir" => $tanggal_akhir,
				// "id_fungsi" => $id_fungsi 

    

    
    $this->db->where("a.lap_d_id",$lap_d_id);
    $res = $this->db->get("lap_d_perkembangan");
    return $res;
}


	
}
?>