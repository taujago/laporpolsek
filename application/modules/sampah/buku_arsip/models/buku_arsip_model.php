<?php
class buku_arsip_model extends CI_Model {
	function buku_arsip_model(){
		parent::__construct();
	}

 

function data($param){

	$arr_column = array(
		"id",
		 
		"tanggal","dari","surat_tanggal","surat_nomor","perihal","lampiran","kode_penyimpanan",
		"keterangan");

	$sort_by = $arr_column[$param['sort_by']];

	$this->db->select('*')->from('buku_arsip');

	
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
		// echo $this->db->last_query();
 	return $res;


	$res = $this->db->get();

}


 
function detail($id){
	$this->db->where("id",$id);
	$ret = $this->db->get('buku_arsip');
	return $ret;
}

 
	
}
?>