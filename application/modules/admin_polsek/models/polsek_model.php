<?php
class polsek_model extends CI_Model {
	function polsek_model(){
		parent::__construct();
	}

 

function data($param){

	//show_array($param);

	$arr_column = array("nama_polres","nama_polres");

	$sort_by = $arr_column[$param['sort_by']];

	$this->db->select('*')
	->from("m_polsek a ")
	->join("m_polres b","a.id_polres = b.id_polres","left");

	if($param['nama'] <> '') {
		$this->db->like('nama_polsek',$param['nama']);
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
	$this->db->where("id_polsek",$id);
	$ret = $this->db->get('m_polsek');
	return $ret;
}

	
}
?>