<form id="formulir" method="post" action="<?php echo site_url("$controller/$action"); ?>">
<table width="100%" border="0" class="table">
     <tr><td>Tanggal </td>
            <td><input type="text" class="form-control tanggal" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>"  data-date-format="dd-mm-yyyy" />
        </td>
	    <tr>
            <td>Jam </td>
            <td><input type="text" class="form-control" name="waktu" id="waktu" placeholder="Waktu" value="<?php echo $waktu; ?>" />
        </td>
	    <tr><td>Identitas </td>
            <td><input type="text" class="form-control" name="identitas" id="identitas" placeholder="Identitas" value="<?php echo $identitas; ?>" />
        </td>
	    <tr><td>Nama Organisasi </td>
            <td><input type="text" class="form-control" name="nama_organisasi" id="nama_organisasi" placeholder="Nama Organisasi" value="<?php echo $nama_organisasi; ?>" />
        </td>
	    <tr>
            <td>Informasi yang disampaikan</td>
            <td><input type="text" class="form-control" name="informasi" id="informasi" placeholder="Informasi" value="<?php echo $informasi; ?>" />
        </td>
<tr>
            <td>Surat / Dokumen yang disampaikan</td>
            <td><input type="text" class="form-control" name="surat_dokumen" id="surat_dokumen" placeholder="Surat Dokumen" value="<?php echo $surat_dokumen; ?>" />
        </td>
	    <tr><td>Keterangan </td>
            <td><textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea>
        </td></tr>
    <tr>
      <td width="23%" align="right" valign="middle">&nbsp;</td>
      <td width="77%"><input class="btn btn-lg btn-primary" type="submit" name="Submit" id="button" value="Simpan">
        <a class="btn btn-lg btn-danger" href="<?php echo site_url("$controller"); ?>" >Kembali 
        <input type="hidden" name="mode" id="mode" value="<?php echo isset($mode)?$mode:""; ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
       </a></td>
    </tr> 
</table>
</form>
<?php $this->load->view($controller."_view_form_js");?>