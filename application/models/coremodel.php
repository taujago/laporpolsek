<?php
class coremodel extends CI_Model {
        function coremodel() {
                parent::__construct();
        }
        
        function get_arr_leasing(){
                // get data leasing
                $data['method']='get_data_leasing';
                $url = service_url($data);
                
                $xml = file_get_contents($url);
                $arr = xml_to_array($xml);
                echo "<pre>";
                print_r($arr);
                echo "</pre>";
        }

  var  $arr_status =  array(
            0=>"Pilih Status",
            "Level 2",
            "Menunggu Blokir",
            "Gagal Blokir",
            "Berhasil Blokir");

  var  $arr_status2 =  array(
            0=>"- SEMUA STATUS - ",
            "Level 2",
            "Menunggu Blokir",
            "Gagal Blokir",
            "Berhasil Blokir");

        function arr_dropdown($vTable, $vINDEX, $vVALUE, $vORDERBY){
                $this->db->order_by($vORDERBY);
                $res  = $this->db->get($vTable);
		//echo $this->db->last_query(); exit;

                $ret = array();
                foreach($res->result_array() as $row) : 
                        $ret[$row[$vINDEX]] = $row[$vVALUE];
                endforeach;
                return $ret;

        }

        function arr_level() {
                $arr = array(1=>"Level 1","Level 2","Level 3");
                return $arr;
        }


 
function get_setting(){
  $res =  $this->db->get("setting");
  return $res->row();
}


function get_arr_dropdown($tbname, $index,$value,$sorter) {
  $ret = array();
  $this->db->order_by($sorter);
  $res = $this->db->get($tbname);
  //echo $this->db->last_query(); exit;
  foreach($res->result_array() as $row) : 
    $ret[$row[$index]]  = $row[$value];
  endforeach;
  //show_array($ret); exit;
  return $ret;
}



function get_lap_number($jenis,$data){

  $userdata = $_SESSION['userdata']; 

  $arr_jenis = array("lap_a"=>"A",
                    "lap_b"=>"B",
                    "lap_c"=>"C",
                    "lap_d"=>"D",
                    "lap_lantas"=>"LANTAS"
    );

  $kode = $arr_jenis[$jenis];



  if($userdata['jenis'] == "polsek") {
    $data['id'] = $userdata['id_polsek'];
    $data['jenis'] =  $userdata['jenis']; 
    $fungsi = "SEK.".$userdata['nama_polsek']; 
  }
  else if ($userdata['jenis'] == "polres") {
    $data['id'] = $userdata['id_polres'];
    $data['jenis'] =  $userdata['jenis']; 
    $fungsi = "RES.".$userdata['nama_polres']; 
  }
  else {
    $data['id'] = 1;
    $data['jenis'] =  $userdata['jenis']; 
    $fungsi = "POLDA.BANTEN";

  }

  $fungsi = str_replace(" ", "", $fungsi);



  $tmp = explode("-",$data['tanggal']);
  $tahun = intval($tmp[0]);
  $bulan = intval($tmp[1]);
 
   
  $id = $data['id'];

  $this->db->where("id",$id);  
  $this->db->where("bulan",$bulan);
  $this->db->where("tahun",$tahun);
  $this->db->where("jenis",$data['jenis']);
  $this->db->where("kode",$kode);

  $rs = $this->db->get("lap_a_numbering");
  if($rs->num_rows() == 0) {
    $arr = array("id"=>$id,
                "bulan"=>$bulan,
                "kode"=>$kode,
                "tahun"=>$tahun,
                "jenis"=>$data['jenis'],
                "nomor"=>1);
    $this->db->insert("lap_a_numbering",$arr);
  }
  // cek isinya. 
  $this->db->where("id",$id);  
  $this->db->where("bulan",$bulan);
  $this->db->where("tahun",$tahun);
  $this->db->where("jenis",$data['jenis']);
  $this->db->where("kode",$kode);

  $d_cek  = $this->db->get("lap_a_numbering")->row();

  $seq = $d_cek->nomor;

  // update nomor isinya 
  $nomor =  $seq +1 ;
  $arr2 = array("id"=>$id,
                "bulan"=>$bulan,
                "tahun"=>$tahun,
                "kode" =>$kode,
                "jenis"=>$data['jenis'],
                "nomor"=> $nomor);

  $this->db->where("id",$id);  
  $this->db->where("bulan",$bulan);
  $this->db->where("tahun",$tahun);
  $this->db->where("kode",$kode);
  $this->db->where("jenis",$data['jenis']);


  $this->db->update("lap_a_numbering",$arr2);

  // echo "sequence $seq <br />";
  $xarr = array(
    1=>"000",
    2=>"00",
    3=>"0",
    4=>""
    );

  $seq = $xarr[strlen($seq)].$seq;


  $return = "LAP/$kode/$seq/".$this->get_bulan_romawi($bulan)."/$tahun/BNT/".$fungsi;
  
  return $return;
}


function get_bulan_romawi($angka) {
  $arr = array(1=>"I","II","III","IV","V","VI","VII","VIII","IX","X","XI","XII");
  return $arr[$angka];
}




function get_lap_b_number($data){
  $tmp = explode("-",$data['tanggal']);
  $tahun = intval($tmp[0]);
  $bulan = intval($tmp[1]);
// explode(delimiter, string)
  // echo "tahun $tahun bulan $bulan";

  // show_array($tmp); 
  // exit;

  $id_fungsi = $data['id_fungsi'];

  $this->db->where("id_fungsi",$id_fungsi);

  $fungsi_x = $this->db->get("m_fungsi")->row();
  $fungsi = str_replace("SAT","DIT",str_replace(" ","",strtoupper($fungsi_x->fungsi)));
  // echo $this->db->last_query(); 
  // exit;


  $this->db->where("id_fungsi",$id_fungsi);  
  $this->db->where("bulan",$bulan);
  $this->db->where("tahun",$tahun);
  $rs = $this->db->get("lap_b_numbering");
  if($rs->num_rows() == 0) {
    $arr = array("id_fungsi"=>$id_fungsi,
                "bulan"=>$bulan,
                "tahun"=>$tahun,
                "nomor"=>1);
    $this->db->insert("lap_b_numbering",$arr);
  }
  // cek isinya. 
  $this->db->where("id_fungsi",$id_fungsi);  
  $this->db->where("bulan",$bulan);
  $this->db->where("tahun",$tahun);

  $d_cek  = $this->db->get("lap_b_numbering")->row();

  $seq = $d_cek->nomor;

  // update nomor isinya 
  $nomor =  $seq +1 ;
  $arr2 = array("id_fungsi"=>$id_fungsi,
                "bulan"=>$bulan,
                "tahun"=>$tahun,
                "nomor"=> $nomor);

  $this->db->where("id_fungsi",$id_fungsi);  
  $this->db->where("bulan",$bulan);
  $this->db->where("tahun",$tahun);
  $this->db->update("lap_b_numbering",$arr2);

  $return = "LAP/B/$seq/".$this->get_bulan_romawi($bulan)."/$tahun/BNT/$fungsi";
  // echo $return; 
  // exit;
  return $return;

  // LAP/A/5/V/1/BNT/DITKRIMSUS


}


function get_lap_c_number($data){

  $tmp = explode("-",$data['tanggal']);
  $tahun = intval($tmp[0]);
  $bulan = intval($tmp[1]);

  $this->db->where("bulan",$bulan);
  $this->db->where("tahun",$tahun);
  $rs = $this->db->get("lap_c_numbering");
  if($rs->num_rows() == 0) {
    $arr = array(
                "bulan"=>$bulan,
                "tahun"=>$tahun,
                "nomor"=>1);
    $this->db->insert("lap_c_numbering",$arr);
  }
  // cek isinya. 
   $this->db->where("bulan",$bulan);
  $this->db->where("tahun",$tahun);

  $d_cek  = $this->db->get("lap_c_numbering")->row();

  $seq = $d_cek->nomor;

  // update nomor isinya 
  $nomor =  $seq +1 ;
  $arr2 = array(
                "bulan"=>$bulan,
                "tahun"=>$tahun,
                "nomor"=> $nomor);

   $this->db->where("bulan",$bulan);
  $this->db->where("tahun",$tahun);
  $this->db->update("lap_c_numbering",$arr2);

  $return = "LAP/C/$seq/".$this->get_bulan_romawi($bulan)."/$tahun/BNT/DITRESKRIMSUS";
  // echo $return; 
  // exit;
  return $return;
}

function add_arr_head($arr,$index,$str) {
  $res[$index] = $str;
  foreach($arr as $x => $y) : 
  $res[$x] = $y;
  endforeach;
  return $res;
}

function arr_penyidik() {
  $this->db->where("level","2");
  $res = $this->db->get("pengguna");
  $html ="";
  $arr = array();
  foreach($res->result() as $row) : 
    $arr[$row->id] = $row->nama; 
  endforeach;
  return $arr;
}

}
?>
