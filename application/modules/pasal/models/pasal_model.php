<?php
class pasal_model extends CI_Model {
	function pasal_model(){
		parent::__construct();
	}

 

function data($param){

	// show_array($param);

	$arr_column = array("pasal","fungsi");

	$sort_by = $arr_column[$param['sort_by']];

	$this->db->select('a.pasal, b.fungsi, a.*')
	->from("m_pasal a ")
	->join("m_fungsi b","a.id_fungsi = b.id_fungsi","left");

	if($param['nama'] <> '') {
		$this->db->like('pasal',$param['nama']);
	}

	if($param['id_fungsi']<> '') {
		$this->db->where("a.id_fungsi",$param['id_fungsi']);
	}

	 

	

	($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
    ($param['sort_by'] != null) ? $this->db->order_by($sort_by,$param['sort_direction']) :'';
        
	$res = $this->db->get();
		// echo $this->db->last_query();
 	return $res;


	$res = $this->db->get();

}


	 

 
function detail($id){
	$this->db->where("id",$id);
	$ret = $this->db->get('m_pasal');
	return $ret;
}

	
}
?>