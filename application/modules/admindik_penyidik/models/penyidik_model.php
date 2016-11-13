<?php
class penyidik_model extends CI_Model {
	function penyidik_model(){
		parent::__construct();
	}

 

function data($param){

	// show_array($param);

	$arr_column = array("user_id",
						"nama",
						"nomor_hp","email",
						"pangkat",
						"level"
		);

	$sort_by = $arr_column[$param['sort_by']];

	$this->db->select("a.*, b.pangkat, l.level  as level2,
	   res.nama_polres, sek.nama_polsek
	 ")->from('pengguna a',false)
	->join('m_pangkat b','a.id_pangkat=b.id_pangkat','left')
	->join("m_polres res","res.id_polres = a.id_polres",'left')
	->join("m_polsek sek","sek.id_polsek=a.id_polsek","left")
	->join("m_level l",'l.id=a.level','left');

	if($param['nama'] <> '') {
		$this->db->like('nama',$param['nama']);
	}

	extract($param); 

	//echo "level = $level";

	// if($level <> 'x' ) {
		
		$this->db->where("a.level","2");
	// } 
	// else {
	// 	$this->db->where("a.level <> '0'",null,false);
	// }

	

	($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
    // ($param['sort_by'] != null) ? $this->db->order_by($sort_by,$param['sort_direction']) :'';
        
	$res = $this->db->get();
		// echo $this->db->last_query();
 	return $res;
 	

	 

}


	 

 
function detail($id){
	$this->db->where("id",$id);
	$ret = $this->db->get('pengguna');
	return $ret;
}

	
}
?>