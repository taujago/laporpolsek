<?php
class ver_model extends CI_Model {
	function ver_model(){
		parent::__construct();
	}



function arr_leasing(){

	$arr = array();
	$userdata = $this->session->userdata("userdata");
	$this->db->select('l.*')->from("m_leasing l")
	->join("polda_leasing p",'p.leasing_id=l.leasing_id');
	$this->db->where("p.id_polda",$userdata['id_polda']);
	$res = $this->db->get();
	// echo $this->db->last_query(); exit;
	foreach($res->result() as $row) : 
		$arr[$row->leasing_id] = $row->leasing_nama;
	endforeach;
	//show_array($arr);
	return $arr;
}



	function get_data($vleasing_id,$status) {
		$this->db->select("
			p.*, if(p.status=0,'DAFTAR',
				IF(p.status=2,'VER. LV2',IF(p.status=3,'VER. LV3','X'))) AS status2,
		,
   
   IF((p.approved=0 and approved_error = 0 ), 'TUNGGU BLOKIR', 
   if((p.approved=0 and approved_error = 1),'BATAL BLOKIR (NOMOR RANGKA SUDAH ADA)',
   if((p.approved=0 and approved_error = 2),'BATAL BLOKIR (BPKB sudah diblokir)',
   if((p.approved=0 and approved_error = 3),'BATAL BLOKIR (KENDARAAN SUDAH JADI BPKB)',
   IF(p.approved=1, 'BLOKIR BPKB', '-'))))) AS approved2,
			cab.cabang_nama",false);
		$this->db->where("p.leasing_id",$vleasing_id);		
		$this->db->where("id_polda",$this->session->userdata("id_polda"));
		$this->db->where("jenis_permohonan",$this->pilihan);
		$this->db->from("t_pendaftaran p");
		$this->db->join("t_cabang cab",'p.cabang_id = cab.cabang_id','left');
		$this->db->order_by("daft_id desc");
		

		// $this->session->set_userdata("tanggal_awal",$data['tanggal_awal']);
		// $this->session->set_userdata("tanggal_akhir",$data['tanggal_akhir']);

		$tanggal_awal = $this->session->userdata("tanggal_awal");
		$tanggal_akhir = $this->session->userdata("tanggal_akhir");



		if( !empty($tanggal_awal) ) {

			$tanggal_awal = flipdate($tanggal_awal);
			$tanggal_akhir = flipdate($tanggal_akhir);
			$this->db->where("daft_date between '$tanggal_awal'  and '$tanggal_akhir'");
		}

		// $this->db->where("status",$status);
		$res = $this->db->get();
		// echo "<pre>"; echo $this->db->last_query(); exit;

		return $res;
	}



	function get_list_daftar($param) {
		$controller = get_class($this);


		$this->db->select("
			p.*, if(p.status=0,'DAFTAR',
				IF(p.status=2,'VER. LV2',IF(p.status=3,'VER. LV3','X'))) AS status2,
		,
		IF((p.approved=0 and approved_error = 0 ), 'TUNGGU BLOKIR', 
   if((p.approved=0 and approved_error = 1),'BATAL BLOKIR (NOMOR RANGKA SUDAH ADA)',
   if((p.approved=0 and approved_error = 2),'BATAL BLOKIR (BPKB sudah diblokir)',
   if((p.approved=0 and approved_error = 3),'BATAL BLOKIR (KENDARAAN SUDAH JADI BPKB)',
   IF(p.approved=1, 'BLOKIR BPKB', '-'))))) AS approved2,
			cab.cabang_nama
			",false);
		$this->db->where("p.leasing_id",$param['leasing_id']);

		$userdata = $this->session->userdata("userdata");
		$this->db->where("id_polda",$userdata['id_polda']);
		$this->db->where("jenis_permohonan","L");
		

		if(!empty($param['no_rangka']) ) {
			$no_rangka = $param['no_rangka'];
			$this->db->where("(no_rangka = '$no_rangka' or no_bpkb='$no_rangka') ",null,false);
		}



		if( !empty($param['tanggal_awal']) ) {

			$tanggal_awal = flipdate($param['tanggal_awal']);
			$tanggal_akhir = flipdate($param['tanggal_akhir']);
			$this->db->where("daft_date between '$tanggal_awal'  and '$tanggal_akhir'");
		}


		// $this->db->where("status",$param['status']);

		$this->db->from("t_pendaftaran p");
		$this->db->join("t_cabang cab",'p.cabang_id = cab.cabang_id','left');


		$this->db->where(" (status = 2 or ( status = 3 and p.approved=0 and approved_error = 0   ) ) ",null,false);


		$this->db->order_by("daft_id","desc");
		$res = $this->db->get();
		// echo $this->db->last_query();
		
		$arr = array();
		if($res->num_rows() > 0 ){
			foreach($res->result() as $row) : 
				$color = ($row->approved==1)?"green":"red";


				$arr[] = array(
						"<input type=\"checkbox\" class=\"ck_data\" name=daft_id[] value=$row->daft_id />",
						$row->daft_id,
						flipdate($row->daft_date),
						$row->no_surat,
						$row->cabang_nama,
						$row->no_rangka,
						$row->no_bpkb,
						$row->nama_pengajuan_leasing,
						$row->status2 ." / <font color=$color>" .$row->approved2."</font>",
						"<div class=\"btn-group\"> 
     <a class=\"btn dropdown-toggle btn-primary\" data-toggle=\"dropdown\" href=\"#\">Proses<span class=\"caret\"></span></a>
     
     <ul class=\"dropdown-menu\">
		<li><a   href=\" " . site_url("polisi_verifikasi/detail/".$row->daft_id) ."\" ><span class=\"glyphicon glyphicon-chevron-right\"></span> Detail </a></li>
		<li><a   href=\" " . site_url("polisi_verifikasi/cetak_permohonan/".$row->daft_id) ."\" ><span class=\"glyphicon glyphicon-print\"></span> Cetak Permohonan </a></li>
		<li><a   href=\" " . site_url("polisi_verifikasi/cetak_berkas/".$row->daft_id) ."\" ><span class=\"glyphicon glyphicon-print\"></span> Cetak Surat Blokir </a></li>
		<li><a target=blank  href=\" " . site_url("polisi_verifikasi/cetak_keabsahan/".$row->daft_id) ."\" ><span class=\"glyphicon glyphicon-print\"></span> Cetak Surat Keabsahan </a></li>
		
       
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


	function get_pendaftaran_detail($vleasing_id,$daft_id) {
		$this->db->select("
			p.*, if(p.status=0,'DAFTAR',
				IF(p.status=2,'VER. LV2',IF(p.status=3,'VER. LV3','X'))) AS status2
		,
		IF((p.approved=0 and approved_error = 0 ), 'TUNGGU BLOKIR', 
   if((p.approved=0 and approved_error = 1),'BATAL BLOKIR (NOMOR RANGKA SUDAH ADA)',
   if((p.approved=0 and approved_error = 2),'BATAL BLOKIR (BPKB sudah diblokir)',
   if((p.approved=0 and approved_error = 3),'BATAL BLOKIR (KENDARAAN SUDAH JADI BPKB)',
   IF(p.approved=1, 'BLOKIR BPKB', '-'))))) AS approved,

			",false);
		$this->db->where("leasing_id",$vleasing_id);
		$this->db->where("daft_id",$daft_id);
		$this->db->where("id_polda",$this->session->userdata("id_polda"));
		$this->db->where("jenis_permohonan","B");
		$this->db->from("t_pendaftaran p");

		$ret = $this->db->get()->row_array();
		// echo $this->db->last_query(); exit;
		return $ret;
	}

	function get_pendaftaran_detail_print($daft_id) {
		$this->db->select("pol.*,
			p.`daft_id`, 
`no_surat`,`no_urut_surat`,`jenis_permohonan`,p.`leasing_id`,`no_bpkb`,`nreg_bpkb`,`no_rangka`,`no_mesin`,`tgl_bpkb`,`no_polisi`,
DATE_FORMAT(`tgl_bpkb`,'%d-%m-%Y') AS tgl_bpkb,
`nama_pemilik`,`alamat_pemilik`,p.`merk_id`,

IF((jenis_permohonan='B' and import='0'),m.merk_nama,p.`merk_nama`) AS merk_nama,
`type_kendaraan`,p.`warna_id`,
IF((jenis_permohonan='B' and import='0'),w.`warna_nama`,p.`warna_nama`) AS warna_nama,
p.`jenis_id`, id_approval,
IF((jenis_permohonan='B' and import='0'),j.`jenis_nama`,p.`jenis_nama`) AS jenis_nama,


`tahun_kendaraan`,`user_id`,`status`,`approved`,`nama_pengajuan_leasing`,`alamat_pengajuan_leasing`,p.`id_polda`,`no_blokir`,
DATE_FORMAT(`tgl_blokir`, '%d-%m-%Y')AS tgl_blokir ,
DATE_FORMAT(`tgl_blokir2`, '%d-%m-%Y')AS tgl_blokir2 ,

DATE_FORMAT(p.daft_date, '%d-%m-%Y') AS daft_date, DATE_FORMAT(p.verifikasi_date, '%d-%m-
%Y') AS verifikasi_date, DATE_FORMAT(p.daft_level2_date, '%d-%m-%Y') AS daft_level2_date, DATE_FORMAT
(p.daft_level3_date, '%d-%m-%Y') AS daft_level3_date, DATE_FORMAT(p.level2_tglsurat, '%d-%m-%Y') AS level2_tglsurat
,l.leasing_nama, l.leasing_kota, l.leasing_alamat,
			if(p.status=0,'DAFTAR',
				IF(p.status=2,'VER. LV2',IF(p.status=3,'VER. LV3','X'))) AS status2
	 
		,

		IF((p.approved=0 and approved_error = 0 ), 'TUNGGU BLOKIR', 
   if((p.approved=0 and approved_error = 1),'BATAL BLOKIR (NOMOR RANGKA SUDAH ADA)',
   if((p.approved=0 and approved_error = 2),'BATAL BLOKIR (BPKB sudah diblokir)',
   if((p.approved=0 and approved_error = 3),'BATAL BLOKIR (KENDARAAN SUDAH JADI BPKB)',
   IF(p.approved=1, 'BLOKIR BPKB', '-'))))) AS approved2,


		cab.cabang_nama, p.kontrak_no, 
		p.kontrak_date, 
		DATE_FORMAT(p.kontrak_date, '%d-%m-%Y') as kontrak_date2,
		kontrak_perihal,

		model, 
		jumlah_sumbu,
		type_kendaraan,
		jumlah_roda,
tahun_buat,
tahun_rakit,
vol_silinder,
bahan_bakar,
pemilik_pekerjaan,
pemilik_kodepos,
wilayah_samsat,
no_faktur,
tgl_faktur,
peruntukan,
jenis_daftaran,
no_pabean,
tgl_pabean,
pelabuhan,
cara_impor,
no_ckd,
keterangan_pabean,
status_blokir,
keterangan_status,
tempat_penerbitan,

		  `customer_ktp`,`customer_kelurahan`,`customer_kecamatan`,`customer_kab`,`customer_prov`,`pemilik_nama`,`pemilik_ktp`,`pemilik_alamat`,`pemilik_kelurahan`,`pemilik_kecamatan`,`pemilik_kab`,`pemilik_prov`,
		  l.leasing_penanggungjawab,
		  l.leasing_jabatan",false);


		//$this->db->where("l.leasing_id",$vleasing_id);
		$this->db->where("daft_id",$daft_id);
		$this->db->where("pol.id_polda",$this->session->userdata("id_polda"));
		$this->db->where("jenis_permohonan","L");
		$this->db->from("t_pendaftaran p");
		$this->db->join("m_polda pol","pol.id_polda= p.id_polda")
		->join("m_warna w","w.warna_id=p.warna_id",'left')
		->join("m_jenis j","j.jenis_id=p.jenis_id",'left')
		->join("m_merk m","m.merk_id=p.merk_id",'left')
		->join("t_cabang cab","cab.cabang_id = p.cabang_id",'left')
		->join("m_leasing l","l.leasing_id=p.leasing_id",'left');
		// ->join("m_type t",'t.no_rangka = SUBSTR(p.no_rangka,1,10)','LEFT');

		$ret = $this->db->get()->row_array();
		// echo $this->db->last_query(); exit;
		return $ret;
	}
	
}
?>