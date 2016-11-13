<?php
class pelaksana_model extends CI_Model {
	function pelaksana_model(){
		parent::__construct();
	}

 

function data($param){

	$arr_column = array("pelaksana_id","pelaksana_nama","pangkat_nama","no_hp","alamat");

	$sort_by = $arr_column[$param['sort_by']];

	$this->db->select('*')->from('pelaksana a')
	->join('pangkat b','a.pangkat_id=b.pangkat_id');

	if($param['nama'] <> '') {
		$this->db->like('pelaksana_nama',$param['nama']);
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
	$this->db->where("pelaksana_id",$id);
	$ret = $this->db->get('pelaksana');
	return $ret;
}

	
}
?>