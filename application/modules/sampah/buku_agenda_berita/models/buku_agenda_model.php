<?php
class buku_agenda_model extends CI_Model {
	function buku_agenda_model(){
		parent::__construct();
	}

 

function data($param){

	// show_array($param);
	// exit;
	$arr_column = array("tanggal","berita_tanggal","dari","kepada","berita_jam","sifat");

	$sort_by = $arr_column[$param['sort_by']];

	$this->db->select('*')->from('buku_agenda_berita');
	$this->db->where("jenis",$param['jenis']);
	if($param['sifat'] <> '') {
		$this->db->where("sifat",$param['sifat']);
	}

	

	// if($param['nama'] <> '') {
	// 	$this->db->like('pelaksana_nama',$param['nama']);
	// }

	if(!empty($param['tgl_awal']) and !empty($param['tgl_akhir']) ){
		$tgl_awal = flipdate($param['tgl_awal']); 
		$tgl_akhir = flipdate($param['tgl_akhir']); 
		$this->db->where(" tanggal between '$tgl_awal' and '$tgl_akhir'",null,false);
	}


	($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
    ($param['sort_by'] != null) ? $this->db->order_by($sort_by, $param['sort_direction']) :'';
        
	$res = $this->db->get();
		// echo $this->db->last_query(); exit;
 	return $res;


	$res = $this->db->get();

}



// function rencana_get_data

function rencana_data($param){

	$arr_column = array("no_urut","indikasi","pokok_masalah");

	$sort_by = $arr_column[$param['sort_by']];

	$this->db->select('*')->from('penyelidikan_rencana')
	->where('penyelidikan_id',$param['penyelidikan_id']);

	 
	 


	($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
    ($param['sort_by'] != null) ? $this->db->order_by($sort_by, $param['sort_direction']) :'';
        
	$res = $this->db->get();
		// echo $this->db->last_query();
 	return $res;


	$res = $this->db->get();

}
	 


function pelaksana_data($param){

	$arr_column = array("no_urut","pelaksana_nip","pelaksana_nrp","pelaksana_nama","jabatan");

	$sort_by = $arr_column[$param['sort_by']];

	$this->db->select('*')->from('penyelidikan_pelaksana a')
	->join("pelaksana b",'a.pelaksana_id = b.pelaksana_id')
	->where('a.penyelidikan_id',$param['penyelidikan_id']);

	 
	 


	($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
    ($param['sort_by'] != null) ? $this->db->order_by($sort_by, $param['sort_direction']) :'';
        
	$res = $this->db->get();
		// echo $this->db->last_query();
 	return $res;


	$res = $this->db->get();

}

 
function detail($id){
	$this->db->where("id",$id);
	$ret = $this->db->get('buku_agenda_berita');
	return $ret;
}


function detail_rencana($id){
	$this->db->where("id",$id);
	$ret = $this->db->get('penyelidikan_rencana');
	return $ret;
}

function detail_pelaksana($id){
	$this->db->where("id",$id);
	$ret = $this->db->get('penyelidikan_pelaksana');
	return $ret;
}
	
}
?>