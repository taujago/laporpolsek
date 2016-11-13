<?php
class basin_model extends CI_Model {
	function basin_model(){
		parent::__construct();
	}

 

function data($param){

	$arr_column = array(
		"id",
		"terima_tanggal",
		"terima_jam","nomor","tanggal","asal_surat","perihal","disposisi_tanggal","disposisi_isi",
		"keterangan");

	$sort_by = $arr_column[$param['sort_by']];

	$this->db->select('*')->from('buku_agenda_surat_masuk');

	if($param['sifat'] <> '') {
	$this->db->where("sifat",$param['sifat']);
	}
	// if($param['nama'] <> '') {
	// 	$this->db->like('pelaksana_nama',$param['nama']);
	// }

	if(!empty($param['tgl_awal']) and !empty($param['tgl_akhir']) ){
		$tgl_awal = flipdate($param['tgl_awal']); 
		$tgl_akhir = flipdate($param['tgl_akhir']); 
		$this->db->where(" terima_tanggal between '$tgl_awal' and '$tgl_akhir'",null,false);
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
	$this->db->where("id",$id);
	$ret = $this->db->get('buku_agenda_surat_masuk');
	return $ret;
}

 
	
}
?>