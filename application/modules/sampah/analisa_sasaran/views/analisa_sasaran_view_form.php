<form id="formulir" method="post" action="<?php echo site_url("$controller/$action"); ?>">
<table width="100%" border="0" class="table">
    <tr><td>Tanggal </td>
            <td><input type="text" class="form-control tanggal" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" data-date-format="dd-mm-yyyy" />
        </td>
    <tr>
      <td>Sasaran </td>
            <td><textarea class="form-control" rows="3" name="sasaran" id="sasaran" placeholder="Sasaran"><?php echo $sasaran; ?></textarea>
        </td></tr>
	    <tr>
	      <td>Kondisi </td>
            <td><textarea class="form-control" rows="3" name="kondisi" id="kondisi" placeholder="Kondisi"><?php echo $kondisi; ?></textarea>
        </td></tr>
	    <tr>
	      <td>Kekuatan </td>
            <td><input type="text" class="form-control" name="kekuatan" id="kekuatan" placeholder="Kekuatan" value="<?php echo $kekuatan; ?>" />
        </td>
	    <tr>
	      <td>Kelemahan </td>
            <td><input type="text" class="form-control" name="kelemahan" id="kelemahan" placeholder="Kelemahan" value="<?php echo $kelemahan; ?>" />
        </td>
	    <tr>
	      <td>Kehendak </td>
            <td><input type="text" class="form-control" name="kehendak" id="kehendak" placeholder="Kehendak" value="<?php echo $kehendak; ?>" />
        </td>
	    <tr>
	      <td>Oposisi Aktif </td>
            <td><input type="text" class="form-control" name="oposisi_aktif" id="oposisi_aktif" placeholder="Oposisi Aktif" value="<?php echo $oposisi_aktif; ?>" />
        </td>
	    <tr>
	      <td>Oposisi Pasif </td>
            <td><input type="text" class="form-control" name="oposisi_pasif" id="oposisi_pasif" placeholder="Oposisi Pasif" value="<?php echo $oposisi_pasif; ?>" />
        </td>
<tr><td>Oposisi Pendukung </td>
            <td><input type="text" class="form-control" name="oposisi_pendukung" id="oposisi_pendukung" placeholder="Oposisi Pendukung" value="<?php echo $oposisi_pendukung; ?>" />
        </td></tr>
   <!-- <tr>
      <td align="left" valign="middle">Yang  membuat laporan </td>
      <td><?php echo form_dropdown("pelaksana_id",$arr_pelaksana,$pelaksana_id,'id="pelaksana_id" class="form-control"') ?></td>
    </tr> -->   
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
<p>&nbsp;</p>
<?php $this->load->view($controller."_view_form_js");?>