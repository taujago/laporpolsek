<?php 


class general extends CI_Controller {

	function general(){
		parent::__construct();
	}


	function  get_polres(){
		$id_polda = $this->input->post('id_polda');
		$this->db->where("id_provinsi",$id_polda);
		$this->db->order_by("kota");
		$res = $this->db->get("tiger_kota");
		$html = "";
		foreach($res->result() as $row): 
			$html .= "<option value=$row->id> $row->kota </option> ";
		endforeach;
		echo $html;
	}


	function get_polres_polda(){
		$id_polda = $this->input->post('id_polda');
		$id_polres = $this->input->post('id_polres');
		$this->db->where("id_provinsi",$id_polda);
		$this->db->order_by("kota");
		$res = $this->db->get("tiger_kota");
		$html = "";
		foreach($res->result() as $row): 
			$sel = ($row->id == $id_polres)?"selected":"";
			$html .= "<option value=$row->id $sel> $row->kota </option> ";
		endforeach;
		echo $html;
	}


	function get_pasal() {

		$tmp = $this->input->post();
		$id_fungsi= $tmp['id_fungsi'];
		$this->db->where("id_fungsi",$id_fungsi);
		$html ="";
		$res  = $this->db->get("m_pasal");
		// echo $this->db->last_query();

		foreach($res->result() as $row): 
			$html .="<option value=$row->id>$row->pasal </option>";
		endforeach;
		echo $html;
	}




	function get_tiger_kota($id_provinsi) {
		$form = $this->uri->segment(4);
		$sel="";
		$id_kota = $this->uri->segment(4);
		$this->db->where("id_provinsi",$id_provinsi);
		$this->db->order_by("kota");
		$res = $this->db->get("tiger_kota");
		//echo $this->db->last_query();
		if($form<>0) {
		$str .="<option value=x> - Pilih Kab/Kota - </option> "; }
		else {
			$str .="<option value=x> - Semua Kab/Kota - </option> ";
		}
		foreach($res->result() as $row) :
			if($id_kota!='') {
				$sel = ($row->id == $id_kota)?"selected":"";
			}
			 $str .= "<option value=\"$row->id\" $sel> $row->kota </option> \n";
		endforeach;
		echo $str;
	}
	
	function get_tiger_kecamatan($id_kota) {
		$str="";
		$form = $this->uri->segment(4);
		$sel="";
		$id_kecamatan = $this->uri->segment(4);
		$this->db->where("id_kota",$id_kota);
		$this->db->order_by("kecamatan");
		$res = $this->db->get("tiger_kecamatan");
		//echo $this->db->last_query();
		if($form<>0) {
		$str .="<option value=x> - Pilih Kecamatan - </option> "; }
		else {
			$str .="<option value=x> - Semua Kecamatan - </option> ";
		}
		foreach($res->result() as $row) :
			if($id_kecamatan!='') {
				$sel = ($row->id == $id_kecamatan)?"selected":"";
			}
			 $str .= "<option value=\"$row->id\" $sel> $row->kecamatan </option> \n";
		endforeach;
		echo $str;
	}

	function get_tiger_desa($id_kota) {
		$form = $this->uri->segment(4);
		$sel="";
		$id_desa = $this->uri->segment(4);
		$this->db->where("id_kecamatan",$id_kota);
		$this->db->order_by("desa");
		$res = $this->db->get("tiger_desa");
		//echo $this->db->last_query();
		$str = "";
		if($form<>0) {
		$str .="<option value=x> - Pilih Desa - </option> "; }
		else {
			$str .="<option value=x> - Semua Desa - </option> ";
		}
		foreach($res->result() as $row) :
			if($id_desa!='') {
				$sel = ($row->id == $id_desa)?"selected":"";
			}
			 $str .= "<option value=\"$row->id\" $sel> $row->desa </option> \n";
		endforeach;
		echo $str;
	}


	function get_dropdown_kota_by_prop(){
		$post = $this->input->post();

		$this->db->where("id_provinsi",$post['id_prop']);
		$this->db->order_by("kota");

		$res = $this->db->get("tiger_kota");
		// echo $this->db->last_query(); 
		$html = "";
		foreach($res->result() as $row ) :
			$sel = ($row->id == $post['id_kota'])?"selected":"";
			$html .= "<option value=$row->id $sel> $row->kota </option>"; 
		endforeach;

		echo $html;

	}



function get_dropdown_kec_by_kota(){
		$post = $this->input->post();

		$this->db->where("id_kota",$post['id_kota']);
		$this->db->order_by("kecamatan");

		$res = $this->db->get("tiger_kecamatan");
		// echo $this->db->last_query(); 
		$html = "";
		foreach($res->result() as $row ) :
			$sel = ($row->id == $post['id_kec'])?"selected":"";
			$html .= "<option value=$row->id $sel> $row->kecamatan </option>"; 
		endforeach;

		echo $html;

	}



function get_dropdown_desa_by_kec(){
		$post = $this->input->post();

		$this->db->where("id_kecamatan",$post['id_kec']);
		$this->db->order_by("desa");

		$res = $this->db->get("tiger_desa");
		// echo $this->db->last_query(); 
		$html = "";
		foreach($res->result() as $row ) :
			$sel = ($row->id == $post['id_desa'])?"selected":"";
			$html .= "<option value=$row->id $sel> $row->desa </option>"; 
		endforeach;

		echo $html;

	}

function get_data_polres($id_polres){
		//$id_polres = $this->input->post('id_polres');
		$this->db->where("id_polres",$id_polres);
		$this->db->order_by("nama_polsek");
		$res = $this->db->get("m_polsek");
		// echo $this->db->last_query();
		$html = "";
		foreach($res->result() as $row): 
			$html .= "<option value=$row->id_polsek > $row->nama_polsek </option> ";
		endforeach;
		echo $html;
	}





function get_data_polres_edit(){
		$post = $this->input->post();

		$this->db->where("id_polres",$post['id_polres']);
		$this->db->order_by("nama_polsek");

		$res = $this->db->get("m_polsek");
		// echo $this->db->last_query(); 
		$html = "";
		foreach($res->result() as $row ) :
			$sel = ($row->id_polsek == $post['id_polsek'])?"selected":"";
			$html .= "<option value=$row->id_polsek $sel> $row->nama_polsek </option>"; 
		endforeach;

		echo $html;

	}



function get_data_kejahatan($id) {
	$this->db->where("id_kelompok",$id);
	$res = $this->db->get("m_golongan_kejahatan");
	foreach($res->result() as $row ) :
			 
			$html .= "<option value=$row->id > $row->golongan_kejahatan </option>"; 
	endforeach;
	echo $html;

}

function get_dropdown_gol_kejahatan(){
		$post = $this->input->post();

		$this->db->where("id_kelompok",$post['id_kelompok']);
		$this->db->order_by("golongan_kejahatan");

		$res = $this->db->get("m_golongan_kejahatan");
		// echo $this->db->last_query(); 
		$html = "";
		foreach($res->result() as $row ) :
			$sel = ($row->id_kelompok == $post['id_kelompok'])?"selected":"";
			$html .= "<option value=$row->id $sel> $row->golongan_kejahatan </option>"; 
		endforeach;

		echo $html;

}





function get_dropdown_tahap(){
		$post = $this->input->post();

		$this->db->where("id_lidik",$post['lidik']);
		$this->db->order_by("tahap");

		$res = $this->db->get("m_tahap");
		// echo $this->db->last_query(); 
		$html = "";
		foreach($res->result() as $row ) :
			$sel = ($row->id == $post['id_tahap'])?"selected":"";
			$html .= "<option value=$row->id $sel> $row->tahap </option>"; 
		endforeach;

		echo $html;

}


function get_tahap($id) {
	$this->db->where("id_lidik",$id);
	$res = $this->db->get("m_tahap");
	$html = "";
	foreach($res->result() as $row ) :
			 
			$html .= "<option value=$row->id > $row->tahap </option>"; 
	endforeach;
	echo $html;

}


}