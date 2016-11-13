<?php
class lap_c_model extends CI_Model {
	function lap_c_model(){
		parent::__construct();
	}

 

function data($param){

	// show_array($param);

	$arr_column = array("nomor","tanggal","pelapor_nama","operator");

	$sort_by = $arr_column[$param['sort_by']];

	$this->db->select('c.*,u.nama as operator')->from('lap_c c')
	->join('pengguna u','u.id=c.user_id','left');


				// "tanggal_awall" => $tanggal_awal, 
				// "tanggal_akhir" => $tanggal_akhir,
				// "id_fungsi" => $id_fungsi 

    if($param['tanggal_awal']<> '') {
    	$tanggal_awal = flipdate($param['tanggal_awal']); 
    	$tanggal_akhir = flipdate($param['tanggal_akhir']); 
    	$this->db->where("tanggal between '$tanggal_awal' and '$tanggal_akhir'",null,false);
    }

    // if($param['id_fungsi'] > 0 ){
    // 	$this->db->where("id_fungsi",$param['id_fungsi']);
    // }




	($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
    ($param['sort_by'] != null) ? $this->db->order_by($sort_by, $param['sort_direction']) :'';
        
	$res = $this->db->get();
		// echo $this->db->last_query();
 	return $res;


	 

}


	function get_list_daftar($param) {
		 
		// echo $this->db->last_query();

		$this->db->select('*')->from('pangkat'); 
		$res = $this->db->get();
		
		$arr = array();
		if($res->num_rows() > 0 ){
			foreach($res->result() as $row) : 
				$color = ($row->approved==1)?"green":"red";


				$arr[] = array(
						 $row->pangkat_id,
						 $rot->pangkat_nama,
						"<div class=\"btn-group\"> 
     <a class=\"btn dropdown-toggle btn-primary\" data-toggle=\"dropdown\" href=\"#\">Proses<span class=\"caret\"></span></a>
     
     <ul class=\"dropdown-menu\">
		<li><a   href=\" " . site_url("baru_verifikasi/detail/".$row->daft_id) ."\" ><span class=\"glyphicon glyphicon-chevron-right\"></span> Edit </a></li>
		<li><a   href=\" " . site_url("baru_verifikasi/cetak_permohonan/".$row->daft_id) ."\" ><span class=\"glyphicon glyphicon-print\"></span> Hapus </a></li>
		 
		
       
	</ul>


	</div> "
					);
			endforeach;
			$ret = array("error"=>false,"message"=>$arr);
		}
		else {
			$ret = array("error"=>true,"message"=>"DATA TIDAK DITEMUKAN");
		}
		return $ret;
	}

 
function detail($id){
	 $this->db->select('a.*,
pen_pangkat.pangkat as penerima_pangkat, 

				desa.desa, 
				kec.id as pelapor_kec_id, 
				kec.kecamatan, 
				kota.id as pelapor_kota_id, 
				kota.kota, 
				prov.id as pelapor_prov_id, 
				prov.provinsi, 



				kejadian_desa.desa as kejadian_desa, 
				kejadian_kec.id as kejadian_kec_id, 
				kejadian_kec.kecamatan as kejadian_kecamatan, 
				kejadian_kota.id as kejadian_kota_id, 
				kejadian_kota.kota as kejadian_kota, 
				kejadian_prov.id as kejadian_prov_id, 
				kejadian_prov.provinsi as kejadian_provinsi,





kerja.pekerjaan, 
agama.agama,
wn.warga_negara,

u.nama as pengguna ')
->from("lap_c a")
->join("m_pangkat pen_pangkat","pen_pangkat.id_pangkat = a.pen_lapor_id_pangkat ",'left')
->join("pengguna u","u.id = a.user_id",'left')
->join('tiger_desa desa','desa.id = a.pelapor_id_desa ','left')
->join('tiger_kecamatan kec','kec.id = desa.id_kecamatan ','left')
->join('tiger_kota kota','kota.id = kec.id_kota ','left')
->join('tiger_provinsi prov','prov.id = kota.id_provinsi','left')
->join('m_pekerjaan kerja','a.pelapor_id_pekerjaan','kerja.id_pekerjaan')
->join('m_agama agama','a.pelapor_id_agama=agama.id_agama')
->join('m_warga_negara wn','a.pelapor_id_warga_negara=wn.id_warga_negara')



->join('tiger_desa kejadian_desa','kejadian_desa.id = a.kejadian_id_desa ','left')
->join('tiger_kecamatan kejadian_kec','kejadian_kec.id = kejadian_desa.id_kecamatan ','left')
->join('tiger_kota kejadian_kota','kejadian_kota.id = kejadian_kec.id_kota ','left')
->join('tiger_provinsi kejadian_prov','kejadian_prov.id = kejadian_kota.id_provinsi','left')


->where("a.lap_c_id",$id);
$res = $this->db->get(); 


$data = $res->row_array();

return $data;

 
}

 
	
}
?>