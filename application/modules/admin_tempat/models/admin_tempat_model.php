<?php
class admin_tempat_model extends CI_Model {
	function admin_tempat_model(){
		parent::__construct();
	}

 

function data($param){

	//show_array($param);

	$arr_column = array("jenis_lokasi");

	$sort_by = $arr_column[$param['sort_by']];

	$this->db->select('*')
	->from("m_jenis_lokasi");

	if($param['nama'] <> '') {
		$this->db->like('jenis_lokasi',$param['nama']);
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
	$this->db->where("id_jenis_lokasi",$id);
	$ret = $this->db->get('m_jenis_lokasi');
	return $ret;
}

	
}
?>