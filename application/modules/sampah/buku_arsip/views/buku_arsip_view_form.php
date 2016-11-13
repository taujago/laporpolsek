<form id="formulir" method="post" action="<?php echo site_url("$controller/$action"); ?>">
<table width="100%" border="0" class="table">
    <tr>
      <td>Tanggal Terima</td>
            <td><input type="text" class="form-control tanggal" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>"  data-date-format="dd-mm-yyyy"  />
        </td>
<tr>
            <td>Jam Terima</td>
            <td><input type="text" class="form-control" name="jam" id="jam" placeholder="Jam" value="<?php echo $jam; ?>" />
        </td>
<tr><td>Dari </td>
            <td><input type="text" class="form-control" name="dari" id="dari" placeholder="Dari" value="<?php echo $dari; ?>" />
        </td>
	    <tr>
	      <td>Tanggal Surat</td>
            <td><input type="text" class="form-control tanggal" name="surat_tanggal" id="surat_tanggal" placeholder="Tanggal Surat " value="<?php echo $surat_tanggal; ?>" data-date-format="dd-mm-yyyy" />
        </td>
	    <tr>
	      <td>Nomor Surat  </td>
            <td><input type="text" class="form-control" name="surat_nomor" id="surat_nomor" placeholder="Nomor Surat " value="<?php echo $surat_nomor; ?>" />
        </td>
<tr><td>Perihal </td>
            <td><input type="text" class="form-control" name="perihal" id="perihal" placeholder="Perihal" value="<?php echo $perihal; ?>" />
        </td>
	    <tr><td>Lampiran </td>
            <td><input type="text" class="form-control" name="lampiran" id="lampiran" placeholder="Lampiran" value="<?php echo $lampiran; ?>" />
        </td>
    <tr><td>Kode Penyimpanan </td>
            <td><input type="text" class="form-control" name="kode_penyimpanan" id="kode_penyimpanan" placeholder="Kode Penyimpanan" value="<?php echo $kode_penyimpanan; ?>" />
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