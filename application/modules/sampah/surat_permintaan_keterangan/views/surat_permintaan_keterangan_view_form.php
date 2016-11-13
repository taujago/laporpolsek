<form id="formulir" method="post" action="<?php echo site_url("$controller/$action"); ?>">
<table width="100%" border="0" class="table">
     <tr><td>Tanggal </td>
            <td><input type="text" class="form-control tanggal" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" data-date-format="dd-mm-yyyy" />
        </td>
    <tr><td>Nomor </td>
            <td><input type="text" class="form-control" name="nomor" id="nomor" placeholder="Nomor" value="<?php echo $nomor; ?>" />
        </td>
    <tr><td>Sifat </td>
            <td><input type="text" class="form-control" name="sifat" id="sifat" placeholder="Sifat" value="<?php echo $sifat; ?>" />
        </td>
    <tr><td>Lampiran </td>
            <td><input type="text" class="form-control" name="lampiran" id="lampiran" placeholder="Lampiran" value="<?php echo $lampiran; ?>" />
        </td>
    <tr><td>Kepada </td>
            <td><input type="text" class="form-control" name="kepada" id="kepada" placeholder="Kepada" value="<?php echo $kepada; ?>" />
        </td>
    <tr>
	      <td>Di </td>
            <td><input type="text" class="form-control" name="di" id="di" placeholder="Di" value="<?php echo $di; ?>" />
        </td>
	    <tr>
	      <td> Tanggal </td>
            <td><input type="text" class="form-control tanggal" name="isi_tanggal" id="isi_tanggal" placeholder=" Tanggal" value="<?php echo $isi_tanggal; ?>" data-date-format="dd-mm-yyyy" />
        </td>
	    <tr>
	      <td>Jam </td>
            <td><input type="text" class="form-control" name="isi_jam" id="isi_jam" placeholder=" Jam" value="<?php echo $isi_jam; ?>" />
        </td>
	    <tr>
	      <td>Tempat </td>
            <td><input type="text" class="form-control" name="tempat" id="tempat" placeholder="Tempat" value="<?php echo $tempat; ?>" />
        </td>
	    <tr>
	      <td>Bertemu Dengan *</td>
            <td><textarea class="form-control" rows="3" name="bertemu_dengan" id="bertemu_dengan" placeholder="Bertemu Dengan"><?php echo $bertemu_dengan; ?></textarea>
        </td></tr>
    <tr><td>Untuk </td>
            <td><textarea class="form-control" rows="3" name="untuk" id="untuk" placeholder="Untuk"><?php echo $untuk; ?></textarea>
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
<p>*) gunakan tanda # sebagai pemisah. contoh  nara sumber : John Doe#Jane Doe<br />
</p>
<?php $this->load->view($controller."_view_form_js");?>