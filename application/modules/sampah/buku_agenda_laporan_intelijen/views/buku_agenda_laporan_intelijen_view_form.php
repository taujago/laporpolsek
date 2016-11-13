<form id="formulir" method="post" action="<?php echo site_url("$controller/$action"); ?>">
<table width="100%" border="0" class="table">
    <tr><td>Nomor <?php echo form_error('nomor') ?></td>
            <td><input type="text" class="form-control" name="nomor" id="nomor" placeholder="Nomor" value="<?php echo $nomor; ?>" />
        </td>
	    <tr><td>Tanggal <?php echo form_error('tanggal') ?></td>
            <td><input type="text" class="form-control tanggal" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>"  data-date-format="dd-mm-yyyy" />
        </td>
	    <tr><td>Perihal <?php echo form_error('perihal') ?></td>
            <td><input type="text" class="form-control" name="perihal" id="perihal" placeholder="Perihal" value="<?php echo $perihal; ?>" />
        </td>
	    <tr><td>Lampiran <?php echo form_error('lampiran') ?></td>
            <td><input type="text" class="form-control" name="lampiran" id="lampiran" placeholder="Lampiran" value="<?php echo $lampiran; ?>" />
        </td>
	    <tr><td>Kode <?php echo form_error('kode') ?></td>
            <td><input type="text" class="form-control" name="kode" id="kode" placeholder="Kode" value="<?php echo $kode; ?>" />
        </td>
	    <tr><td>Keterangan <?php echo form_error('keterangan') ?></td>
            <td><input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" />
        </td>
        </tr>
    <tr>
      <td width="26%" align="right" valign="middle">&nbsp;</td>
      <td width="74%"><input class="btn btn-lg btn-primary" type="submit" name="Submit" id="button" value="Simpan">
        <a class="btn btn-lg btn-danger" href="<?php echo site_url("$controller"); ?>" >Kembali 
        <input type="hidden" name="mode" id="mode" value="<?php echo isset($mode)?$mode:""; ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
       </a></td>
    </tr> 
</table>
</form>
<?php $this->load->view($controller."_view_form_js");?>