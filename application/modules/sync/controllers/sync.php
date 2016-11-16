<?php
class sync extends master_controller {

	var $controller ;

	function sync(){
		parent::__construct();
		// $this->load->model("core_model","cm");
		$this->load->model("coremodel","cm");
		$this->load->helper("tanggal");
		//$this->load->model("admin_setting_model","dm");
		$this->controller = get_class($this);

	}

	function index(){
		// echo "fuckkk.."; exit;
		$userdata = $this->session->userdata("userdata");

		$controller = get_class($this);

 


 		// $data_array['arr_polsek'] = $this->db->get("m_polsek")->row_array();
		$setting = $this->cm->get_setting();


		$data_array['controller'] = $controller;	 
		$data_array['setting'] = $setting;	
		$data_array['url_test'] = $setting->service_url."index.php/sync/test";	
		$data_array['url_send'] = $setting->service_url."index.php/sync/send";


 		 
		$content = $this->load->view($controller."_view",$data_array,true);

		$this->set_subtitle("SINGKRONIASI DATA KE SERVER POLDA");
		$this->set_title("SINGKRONIASI DATA KE SERVER POLDA");
		$this->set_content($content);
		$this->render_baru();
	}


function test(){
	$setting = $this->cm->get_setting();
	$url = $setting->service_url."/index.php/sync/test";
	$ret = $this->execute_service($url,'test');
	// show_array($ret);

	if($ret['error']==false && $ret['data']['error']== false) {
		$arr = array("error"=>false,'message'=>"Koneksi ke server oke");	
	}
	else {
		$arr = array("error"=>true,'message'=>"Koneksi ke server gagal");
	}
	echo json_encode($arr);
}



function send(){

	$arr = array();
	// pengguna section 

	$this->db->where("sync",0);
	$this->db->where("user_id <> 'admin'",null,false);
	$res = $this->db->get("pengguna");
	if($res->num_rows() > 0 ) {

		foreach($res->result_array() as $row ) : 
			unset($row['sync']);
			$arr['pengguna'][] = $row;
		endforeach;

	}

	// pasal section 
	$this->db->where("sync",0);
	$res = $this->db->get("m_pasal");
	if($res->num_rows() > 0 ) {

		foreach($res->result_array() as $row ) : 
			unset($row['sync']);
			$arr['pasal'][] = $row;
		endforeach;

	}

	// lap_a section 
	$this->db->where("sync",0);
	$res = $this->db->get("lap_a");
	if($res->num_rows() > 0 ) {

		$x = 0; 
		foreach($res->result_array() as $row ) : 
			unset($row['sync']);
			$arr['lap_a'][$x] = $row;

			// proses tersangka 
			$this->db->where("lap_a_id",$row['lap_a_id']);
			$res_tersangka = $this->db->get("lap_a_tersangka");
			if($res_tersangka->num_rows() > 0 ) {
				foreach($res_tersangka->result_array() as $row_tersangka): 
					$arr['lap_a'][$x]['lap_a_tersangka'][] = $row_tersangka;
				endforeach; 
			}


			$this->db->where("lap_a_id",$row['lap_a_id']);
			$res_saksi = $this->db->get("lap_a_saksi");
			if($res_saksi->num_rows() > 0 ) {
				foreach($res_saksi->result_array() as $row_saksi): 
					$arr['lap_a'][$x]['lap_a_saksi'][] = $row_saksi;
				endforeach; 
			}

			$this->db->where("lap_a_id",$row['lap_a_id']);
			$res_korban = $this->db->get("lap_a_korban");
			if($res_korban->num_rows() > 0 ) {
				foreach($res_korban->result_array() as $row_korban): 
					$arr['lap_a'][$x]['lap_a_korban'][] = $row_korban;
				endforeach; 
			}


			$this->db->where("lap_a_id",$row['lap_a_id']);
			$res_barbuk = $this->db->get("lap_a_barbuk");
			if($res_barbuk->num_rows() > 0 ) {

				foreach($res_barbuk->result_array() as $row_barbuk): 
					$arr['lap_a'][$x]['lap_a_barbuk'][] = $row_barbuk;
				endforeach; 
			}


			$this->db->where("lap_a_id",$row['lap_a_id']);
			$res_penyidik = $this->db->get("lap_a_penyidik");
			if($res_penyidik->num_rows() > 0 ) {

				foreach($res_penyidik->result_array() as $row_penyidik): 
					$arr['lap_a'][$x]['lap_a_penyidik'][] = $row_penyidik;
				endforeach; 
			}

			$this->db->where("lap_a_id",$row['lap_a_id']);
			$res_perkembangan = $this->db->get("lap_a_perkembangan");
			if($res_perkembangan->num_rows() > 0 ) {

				foreach($res_perkembangan->result_array() as $row_perkembangan): 
					$arr['lap_a'][$x]['lap_a_perkembangan'][] = $row_perkembangan;
				endforeach; 
			}







			$x++;
		endforeach;

	} // end of lap a section 




	// lap_b section 
	$this->db->where("sync",0);
	$res = $this->db->get("lap_b");
	if($res->num_rows() > 0 ) {

		$x = 0; 
		foreach($res->result_array() as $row_b ) : 
			unset($row_b['sync']);
			$arr['lap_b'][$x] = $row_b;

			// proses tersangka 
			$this->db->where("lap_b_id",$row_b['lap_b_id']);
			$res_tersangka = $this->db->get("lap_b_tersangka");
			if($res_tersangka->num_rows() > 0 ) {
				foreach($res_tersangka->result_array() as $row_b_tersangka): 
					$arr['lap_b'][$x]['lap_b_tersangka'][] = $row_b_tersangka;
				endforeach; 
			}


			$this->db->where("lap_b_id",$row_b['lap_b_id']);
			$res_saksi = $this->db->get("lap_b_saksi");
			if($res_saksi->num_rows() > 0 ) {
				foreach($res_saksi->result_array() as $row_b_saksi): 
					$arr['lap_b'][$x]['lap_b_saksi'][] = $row_b_saksi;
				endforeach; 
			}

			$this->db->where("lap_b_id",$row_b['lap_b_id']);
			$res_korban = $this->db->get("lap_b_korban");
			if($res_korban->num_rows() > 0 ) {
				foreach($res_korban->result_array() as $row_b_korban): 
					$arr['lap_b'][$x]['lap_b_korban'][] = $row_b_korban;
				endforeach; 
			}


			$this->db->where("lap_b_id",$row_b['lap_b_id']);
			$res_barbuk = $this->db->get("lap_b_barbuk");
			if($res_barbuk->num_rows() > 0 ) {

				foreach($res_barbuk->result_array() as $row_b_barbuk): 
					$arr['lap_b'][$x]['lap_b_barbuk'][] = $row_b_barbuk;
				endforeach; 
			}


			$this->db->where("lap_b_id",$row_b['lap_b_id']);
			$res_penyidik = $this->db->get("lap_b_penyidik");
			if($res_penyidik->num_rows() > 0 ) {

				foreach($res_penyidik->result_array() as $row_b_penyidik): 
					$arr['lap_b'][$x]['lap_b_penyidik'][] = $row_b_penyidik;
				endforeach; 
			}

			$this->db->where("lap_b_id",$row_b['lap_b_id']);
			$res_perkembangan = $this->db->get("lap_b_perkembangan");
			if($res_perkembangan->num_rows() > 0 ) {

				foreach($res_perkembangan->result_array() as $row_b_perkembangan): 
					$arr['lap_b'][$x]['lap_b_perkembangan'][] = $row_b_perkembangan;
				endforeach; 
			}







			$x++;
		endforeach;

	} // end of lap b section 



	// lap_c section 
	$this->db->where("sync",0);
	$res = $this->db->get("lap_c");
	if($res->num_rows() > 0 ) {

		$x = 0; 
		foreach($res->result_array() as $row_c ) : 
			unset($row_c['sync']);
			$arr['lap_c'][$x] = $row_c;		 


			$this->db->where("lap_c_id",$row_c['lap_c_id']);
			$res_penyidik = $this->db->get("lap_c_penyidik");
			if($res_penyidik->num_rows() > 0 ) {

				foreach($res_penyidik->result_array() as $row_c_penyidik): 
					$arr['lap_c'][$x]['lap_c_penyidik'][] = $row_c_penyidik;
				endforeach; 
			}

			$this->db->where("lap_c_id",$row_c['lap_c_id']);
			$res_perkembangan = $this->db->get("lap_c_perkembangan");
			if($res_perkembangan->num_rows() > 0 ) {

				foreach($res_perkembangan->result_array() as $row_c_perkembangan): 
					$arr['lap_c'][$x]['lap_c_perkembangan'][] = $row_c_perkembangan;
				endforeach; 
			}







			$x++;
		endforeach;

	} // end of lap c section 



	// lap_d section 
	$this->db->where("sync",0);
	$res = $this->db->get("lap_d");
	if($res->num_rows() > 0 ) {

		$x = 0; 
		foreach($res->result_array() as $row_d ) : 
			unset($row_d['sync']);
			$arr['lap_d'][$x] = $row_d;		 


			$this->db->where("lap_d_id",$row_d['lap_d_id']);
			$res_penyidik = $this->db->get("lap_d_penyidik");
			if($res_penyidik->num_rows() > 0 ) {

				foreach($res_penyidik->result_array() as $row_d_penyidik): 
					$arr['lap_d'][$x]['lap_d_penyidik'][] = $row_d_penyidik;
				endforeach; 
			}

			$this->db->where("lap_d_id",$row_d['lap_d_id']);
			$res_perkembangan = $this->db->get("lap_d_perkembangan");
			if($res_perkembangan->num_rows() > 0 ) {

				foreach($res_perkembangan->result_array() as $row_d_perkembangan): 
					$arr['lap_d'][$x]['lap_d_perkembangan'][] = $row_d_perkembangan;
				endforeach; 
			}







			$x++;
		endforeach;

	} // end of lap d section 



	// lap_laka section 
	$this->db->where("sync",0);
	$res = $this->db->get("lap_laka_lantas");
	if($res->num_rows() > 0 ) {

		$x = 0; 
		foreach($res->result_array() as $row ) : 
			unset($row['sync']);
			$arr['lap_laka_lantas'][$x] = $row;

			// proses tersangka 


			$this->db->where("lap_laka_lantas_id",$row['lap_laka_lantas_id']);
			$res_pasal = $this->db->get("lap_laka_pasal");
			if($res_pasal->num_rows() > 0 ) {
				foreach($res_pasal->result_array() as $row_pasal): 
					$arr['lap_laka_lantas'][$x]['lap_laka_pasal'][] = $row_pasal;
				endforeach; 
			}




			$this->db->where("lap_laka_lantas_id",$row['lap_laka_lantas_id']);
			$res_tersangka = $this->db->get("lap_laka_pengemudi");
			if($res_tersangka->num_rows() > 0 ) {
				foreach($res_tersangka->result_array() as $row_tersangka): 
					$arr['lap_laka_lantas'][$x]['lap_laka_pengemudi'][] = $row_tersangka;
				endforeach; 
			}


			$this->db->where("lap_laka_lantas_id",$row['lap_laka_lantas_id']);
			$res_saksi = $this->db->get("lap_laka_saksi");
			if($res_saksi->num_rows() > 0 ) {
				foreach($res_saksi->result_array() as $row_saksi): 
					$arr['lap_laka_lantas'][$x]['lap_laka_saksi'][] = $row_saksi;
				endforeach; 
			}

			$this->db->where("lap_laka_lantas_id",$row['lap_laka_lantas_id']);
			$res_korban = $this->db->get("lap_laka_korban");
			if($res_korban->num_rows() > 0 ) {
				foreach($res_korban->result_array() as $row_korban): 
					$arr['lap_laka_lantas'][$x]['lap_laka_korban'][] = $row_korban;
				endforeach; 
			}


			$this->db->where("lap_laka_lantas_id",$row['lap_laka_lantas_id']);
			$res_barbuk = $this->db->get("lap_laka_kendaraan");
			if($res_barbuk->num_rows() > 0 ) {

				foreach($res_barbuk->result_array() as $row_barbuk): 
					$arr['lap_laka_lantas'][$x]['lap_laka_kendaraan'][] = $row_barbuk;
				endforeach; 
			}


			$this->db->where("lap_laka_lantas_id",$row['lap_laka_lantas_id']);
			$res_penyidik = $this->db->get("lap_laka_penyidik");
			if($res_penyidik->num_rows() > 0 ) {

				foreach($res_penyidik->result_array() as $row_penyidik): 
					$arr['lap_laka_lantas'][$x]['lap_laka_penyidik'][] = $row_penyidik;
				endforeach; 
			}

			$this->db->where("lap_laka_lantas_id",$row['lap_laka_lantas_id']);
			$res_perkembangan = $this->db->get("lap_laka_perkembangan");
			if($res_perkembangan->num_rows() > 0 ) {

				foreach($res_perkembangan->result_array() as $row_perkembangan): 
					$arr['lap_laka_lantas'][$x]['lap_laka_perkembangan'][] = $row_perkembangan;
				endforeach; 
			}







			$x++;
		endforeach;

	} // end of lap laka section 



	// show_array($arr); 
	// // echo json_encode($arr);

	$json_data = json_encode($arr);

	$setting = $this->cm->get_setting();
	$url = $setting->service_url."/index.php/sync/send";
	$ret = $this->execute_service($url,$json_data);
	// show_array($ret); exit;

	if($ret['error']== true && $ret['data']['error']==true)
	{
		$arr = array("error"=>true,'message'=>"Koneksi ke server gagal");
	}
	else {
		
		foreach($ret['data']['data'] as $tbname => $arr_value): 

			// echo "table name $tbname <br />";
			// show_array($arr_value);

			foreach($arr_value as $key => $column_data ) :
				// echo "key $key <br />";
				// show_array($column_data);

				foreach($column_data as $value) :

					$this->db->where($key,$value);

					$row_data = array("sync"=>1);
					$this->db->update($tbname,$row_data);
					// echo $this->db->last_query(). "<br />";

				endforeach;

			endforeach;


		endforeach;

		$arr = array("error"=>false,'message'=>"Singkronisasi Selesai");


	}

	echo json_encode($arr);

	// show_array($arr);
	// echo $ret;

	// if($ret['error']==false && $ret['data']['error']== false) {
	// 	$arr = array("error"=>false,'message'=>"Koneksi ke server oke");	
	// }
	// else {
	// 	$arr = array("error"=>true,'message'=>"Koneksi ke server gagal");
	// }
	// echo json_encode($arr);


}


  
function execute_service($url,$json_data) {

	 
	$req_url = $url;
	 
 	$ch = curl_init();

	//set the url, number of POST vars, POST data
	curl_setopt($ch,CURLOPT_URL, $req_url);
	curl_setopt($ch,CURLOPT_POST, 1);
	curl_setopt($ch,CURLOPT_POSTFIELDS, "data=$json_data");
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

	//execute post
	$result = curl_exec($ch);
	// echo $result;  

	$obj  = json_decode($result);
	$array = (array) $obj;

	$info = curl_getinfo($ch);

	$error = ($info['http_code']=="200")?false:true;
	// show_array($array); exit;
	curl_close($ch);
	return array("data"=>$array,"error"=>$error);
}

function execute_service2($url,$json_data) {

	 
	$req_url = $url;
	 
 	$ch = curl_init();

	//set the url, number of POST vars, POST data
	curl_setopt($ch,CURLOPT_URL, $req_url);
	curl_setopt($ch,CURLOPT_POST, 1);
	curl_setopt($ch,CURLOPT_POSTFIELDS, "data=$json_data");
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

	//execute post
	$result = curl_exec($ch);
	echo $result;  


	//$obj  = json_decode($result);

	 
	curl_close($ch);

}


  

}
?>
