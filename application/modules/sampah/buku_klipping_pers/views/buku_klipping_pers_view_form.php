<form id="formulir" method="post" action="<?php echo site_url("$controller/$action"); ?>">
<table width="100%" border="0" class="table">
     <tr>
       <td>Tanggal </td>
            <td><input type="text" class="form-control tanggal" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" data-date-format="dd-mm-yyyy" />
        </td>
    <tr>
      <td>Sumber Penerbitan</td>
            <td><input type="text" class="form-control" name="sumber" id="sumber" placeholder="Sumber" value="<?php echo $sumber; ?>" />
        </td>
    <tr><td>Judul </td>
            <td><input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" value="<?php echo $judul; ?>" />
        </td>
	    <tr>
            <td>Uraian singkat peristiwa</td>
            <td><textarea class="form-control" rows="3" name="uraian" id="uraian" placeholder="Uraian"><?php echo $uraian; ?></textarea>
        </td></tr>
	    <tr>
            <td>Bentuk dan kode penyimpanan</td>
            <td><input type="text" class="form-control" name="bentuk" id="bentuk" placeholder="Bentuk" value="<?php echo $bentuk; ?>" />
        </td>
	    <tr><td>Keterangan </td>
            <td><textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea>
        </td></tr>
    <tr>
      <td width="19%" align="right" valign="middle">&nbsp;</td>
      <td width="81%"><input class="btn btn-lg btn-primary" type="submit" name="Submit" id="button" value="Simpan">
        <a class="btn btn-lg btn-danger" href="<?php echo site_url("$controller"); ?>" >Kembali 
        <input type="hidden" name="mode" id="mode" value="<?php echo isset($mode)?$mode:""; ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
       </a></td>
    </tr> 
</table>
</form>
<?php $this->load->view($controller."_view_form_js");?>