<?php
class agk_model extends CI_Model {
	function agk_model(){
		parent::__construct();
	}

 

function data($param){

	// show_array($param);

	$arr_column = array("golongan_kejahatan","kelompok");

	$sort_by = $arr_column[$param['sort_by']];

	$this->db->select('a.golongan_kejahatan, b.kelompok, a.*')
	->from("m_golongan_kejahatan a ")
	->join("m_kelompok_kejahatan b","a.id_kelompok = b.id_kelompok","left");

	if($param['nama'] <> '') {
		$this->db->like('golongan_kejahatan',$param['nama']);
	}

	if($param['id_kelompok']<> '') {
		$this->db->where("a.id_kelompok",$param['id_kelompok']);
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
	$ret = $this->db->get('m_golongan_kejahatan');
	return $ret;
}

	
}
?>