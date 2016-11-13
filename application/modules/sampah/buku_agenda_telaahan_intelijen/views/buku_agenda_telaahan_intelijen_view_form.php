<form id="formulir" method="post" action="<?php echo site_url("$controller/$action"); ?>">
<table width="100%" border="0" class="table">
    <tr><td>Tanggal </td>
            <td><input type="text" class="form-control tanggal" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" data-date-format="dd-mm-yyyy"  />
        </td>
    <tr><td>Nomor </td>
            <td><input type="text" class="form-control" name="nomor" id="nomor" placeholder="Nomor" value="<?php echo $nomor; ?>" />
        </td>
<tr><td>Pembuat </td>
            <td><input type="text" class="form-control" name="pembuat" id="pembuat" placeholder="Pembuat" value="<?php echo $pembuat; ?>" />
        </td>
	    <tr><td>Perihal </td>
            <td><input type="text" class="form-control" name="perihal" id="perihal" placeholder="Perihal" value="<?php echo $perihal; ?>" />
        </td>
	    <tr><td>Lampiran </td>
            <td><input type="text" class="form-control" name="lampiran" id="lampiran" placeholder="Lampiran" value="<?php echo $lampiran; ?>" />
        </td>
    <tr>
      <td>Tindak Lanjut </td>
            <td><input type="text" class="form-control" name="tindak_lanjut" id="tindak_lanjut" placeholder="Tindak Lanjut" value="<?php echo $tindak_lanjut; ?>" />
        </td>
    <tr><td>Keterangan </td>
            <td><input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" />
        </td>
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