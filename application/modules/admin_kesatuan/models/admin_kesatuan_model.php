<?php
class admin_kesatuan_model extends CI_Model {
	function admin_kesatuan_model(){
		parent::__construct();
	}

 

function data($param){

	//show_array($param);

	$arr_column = array("kesatuan");

	$sort_by = $arr_column[$param['sort_by']];

	$this->db->select('*')
	->from("m_kesatuan");

	if($param['nama'] <> '') {
		$this->db->like('kesatuan',$param['nama']);
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
	$this->db->where("id_kesatuan",$id);
	$ret = $this->db->get('m_kesatuan');
	return $ret;
}

	
}
?>