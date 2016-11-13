<?php
class surat_kmpi_model extends CI_Model {
	function surat_kmpi_model(){
		parent::__construct();
	}

 

function data($param){

	$arr_column = array("id","tanggal","tujuan",'ttd.pelaksana_nama','plks.pelaksana_nama');

	$sort_by = $arr_column[$param['sort_by']];

	$this->db->select('s.*,
		plks.pelaksana_nip as pelaksana_nip,
		plks.pelaksana_nrp as pelaksana_nrp,
		plks.pelaksana_nama as pelaksana_nama, 
		p1.pangkat_nama  as pelaksana_pangkat,

		ttd.pelaksana_nip as ttd_nip,
		ttd.pelaksana_nrp as  ttd_nrp,
		ttd.pelaksana_nama as ttd_nama, 
		p2.pangkat_nama  as ttd_pangkat


		')
	->from('surat_kmpi s')
	->join('pelaksana plks','plks.pelaksana_id = s.pelaksana_id')
	->join('pangkat p1','p1.pangkat_id = plks.pangkat_id')
	->join('pelaksana ttd','ttd.pelaksana_id = s.penandatangan_id')
	->join('pangkat p2','p2.pangkat_id = ttd.pangkat_id');

	// if($param['nama'] <> '') {
	// 	$this->db->like('pelaksana_nama',$param['nama']);
	// }

	if(!empty($param['tgl_awal']) and !empty($param['tgl_akhir']) ){
		$tgl_awal = flipdate($param['tgl_awal']); 
		$tgl_akhir = flipdate($param['tgl_akhir']); 
		$this->db->where(" penyelidikan_tgl_daftar between '$tgl_awal' and '$tgl_akhir'",null,false);
	}


	($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
    ($param['sort_by'] != null) ? $this->db->order_by($sort_by, $param['sort_direction']) :'';
        
	$res = $this->db->get();
		// echo $this->db->last_query();
 	return $res;


	$res = $this->db->get();

}



// function rencana_get_data

function unit_data($param){

	$arr_column = array("no_urut","indikasi","pokok_masalah");

	$sort_by = $arr_column[$param['sort_by']];

	$this->db->select('*')->from('surat_kmpi_detail')
	->where('id',$param['id']);

	 
	 


	($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
    ($param['sort_by'] != null) ? $this->db->order_by($sort_by, $param['sort_direction']) :'';
        
	$res = $this->db->get();
		// echo $this->db->last_query();
 	return $res;


	$res = $this->db->get();

}
	 

 

 
function detail($id){
	$this->db->select('s.*,
		plks.pelaksana_nip as pelaksana_nip,
		plks.pelaksana_nrp as pelaksana_nrp,
		plks.pelaksana_nama as pelaksana_nama, 
		p1.pangkat_nama  as pelaksana_pangkat,

		ttd.pelaksana_nip as ttd_nip,
		ttd.pelaksana_nrp as  ttd_nrp,
		ttd.pelaksana_nama as ttd_nama, 
		p2.pangkat_nama  as ttd_pangkat,


		')
	->from('surat_kmpi s')
	->join('pelaksana plks','plks.pelaksana_id = s.pelaksana_id')
	->join('pangkat p1','p1.pangkat_id = plks.pangkat_id')
	->join('pelaksana ttd','ttd.pelaksana_id = s.penandatangan_id')
	->join('pangkat p2','p2.pangkat_id = ttd.pangkat_id');
	$this->db->where("s.id",$id);
	$ret = $this->db->get();
	return $ret;
}

 

function detail_alat($id){
	$this->db->where("surat_kmpi_id",$id);
	$ret = $this->db->get('surat_kmpi_detail');
	return $ret;
}



function alat_data($param){

	$arr_column = array("id","nama_unit","jumlah");

	$sort_by = $arr_column[$param['sort_by']];

	$this->db->select('*')
	->from('surat_kmpi_detail');
	 

	// if($param['nama'] <> '') {
	// 	$this->db->like('pelaksana_nama',$param['nama']);
	// }

	 


	($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
    ($param['sort_by'] != null) ? $this->db->order_by($sort_by, $param['sort_direction']) :'';
        
	$res = $this->db->get();
		// echo $this->db->last_query();
 	return $res;


	$res = $this->db->get();

}

function get_alat($id){
	$this->db->where("surat_kmpi_id",$id); 
	$res = $this->db->get("surat_kmpi_detail");
	return $res;
}

	
}
?>