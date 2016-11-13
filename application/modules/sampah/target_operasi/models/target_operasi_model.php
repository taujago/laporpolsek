<?php
class target_operasi_model extends CI_Model {
	function target_operasi_model(){
		parent::__construct();
	}

 

function data($param){

	$arr_column = array("a.id","tanggal","masalah","pelaksana_nama");

	$sort_by = $arr_column[$param['sort_by']];

	$this->db->select('*, a.id xid')->from('target_operasi a')
	->join('target_operasi_pelaksana c','a.id=c.to_id','left')
	->join('pelaksana p','c.pelaksana_id = p.pelaksana_id','left');

	// if($param['nama'] <> '') {
	// 	$this->db->like('pelaksana_nama',$param['nama']);
	// }

	if(!empty($param['tgl_awal']) and !empty($param['tgl_akhir']) ){
		$tgl_awal = flipdate($param['tgl_awal']); 
		$tgl_akhir = flipdate($param['tgl_akhir']); 
		$this->db->where(" a.tanggal between '$tgl_awal' and '$tgl_akhir'",null,false);
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

function rencana_data($param){

	$arr_column = array("id","unsur","data_awal","instruksi","keterangan");

	$sort_by = $arr_column[$param['sort_by']];

	$this->db->select('*')->from('target_operasi_rencana')
	->where('to_id',$param['id']);

	 
	 


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

	$this->db->select('*')->from('target_operasi_pelaksana a')
	->join("pelaksana b",'a.pelaksana_id = b.pelaksana_id')
	->where('a.to_id',$param['id']);

	 
	 


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
	$ret = $this->db->get('target_operasi');
	// echo $this->db->last_query(); 
	return $ret;
}


function detail_rencana($id){
	$this->db->where("id",$id);
	$ret = $this->db->get('target_operasi_rencana');
	return $ret;
}

function detail_pelaksana($id){
	$this->db->where("id",$id);
	$ret = $this->db->get('target_operasi_pelaksana');
	return $ret;
}
	
}
?>