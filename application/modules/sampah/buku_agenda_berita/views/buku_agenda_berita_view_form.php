<form id="formulir" method="post" action="<?php echo site_url("$controller/$action"); ?>">
<table width="100%" border="0" class="table">
<tr>
  <td width="22%">Sifat </td>
            <td width="78%"><?php
			echo form_dropdown("sifat",$arr_sifat,$sifat,'id="sifat" class="form-control"');
			 ?>
        </td>
    </tr>
<tr><td>Tanggal </td>
            <td><input type="text" class="form-control tanggal" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" data-date-format="dd-mm-yyyy" />
        </td>
	    <tr><td>Berita Nomor </td>
            <td><input type="text" class="form-control" name="berita_nomor" id="berita_nomor" placeholder="Berita Nomor" value="<?php echo $berita_nomor; ?>" />
        </td>
	    <tr><td>Berita Tanggal </td>
            <td><input type="text" class="form-control tanggal" name="berita_tanggal" id="berita_tanggal" placeholder="Berita Tanggal" value="<?php echo $berita_tanggal; ?>" data-date-format="dd-mm-yyyy" />
        </td>
	    <tr><td>Dari </td>
            <td><input type="text" class="form-control" name="dari" id="dari" placeholder="Dari" value="<?php echo $dari; ?>" />
        </td>
	    <tr><td>Kepada </td>
            <td><input type="text" class="form-control" name="kepada" id="kepada" placeholder="Kepada" value="<?php echo $kepada; ?>" />
        </td>
	    <tr><td>Perihal </td>
            <td><input type="text" class="form-control" name="perihal" id="perihal" placeholder="Perihal" value="<?php echo $perihal; ?>" />
        </td>
	    <tr><td>Berita Jam </td>
            <td><input type="text" class="form-control" name="berita_jam" id="berita_jam" placeholder="Berita Jam" value="<?php echo $berita_jam; ?>" />
        </td>
	    <tr><td>Jumlah Halaman </td>
            <td><input type="text" class="form-control" name="jumlah_halaman" id="jumlah_halaman" placeholder="Jumlah Halaman" value="<?php echo $jumlah_halaman; ?>" />
        </td>
	    <tr><td>Nama Petugas </td>
            <td><input type="text" class="form-control" name="nama_petugas" id="nama_petugas" placeholder="Nama Petugas" value="<?php echo $nama_petugas; ?>" />
        </td>
	    <tr><td>Keterangan </td>
            <td><textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea></td></tr>
	    
    
    <tr>
    <td align="right" valign="middle">&nbsp;</td>
    <td><input class="btn btn-lg btn-primary" type="submit" name="Submit" id="button" value="Simpan">
      <a class="btn btn-lg btn-danger" href="<?php echo site_url("$controller/index/$this->jenis"); ?>" >Kembali         
       <input type="hidden" name="mode" id="mode" value="<?php echo isset($mode)?$mode:""; ?>" />
       <input type="hidden" name="id" id="id" value="<?php echo isset($id)?$id:""; ?>" />
       <input type="hidden" name="jenis" id="jenis" value="<?php echo $this->jenis; ?>" />
      </a></td>
  </tr> 
</table>
</form>
<?php $this->load->view($controller."_view_form_js");?>