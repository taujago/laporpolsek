<form id="formulir" method="post" action="<?php echo site_url("$controller/$action"); ?>">
<table width="100%" border="0" class="table">
     <tr>
       <td>Rubrik</td>
       <td><?php 
			 
				echo form_dropdown("jenis",$this->jenis,$jenis,'id="sifat" class="form-control"');
			?></td>
<tr><td>Tanggal <?php echo form_error('tanggal') ?></td>
            <td><input type="text" class="form-control tanggal" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" data-date-format="dd-mm-yyyy" />
        </td>
	    <tr><td>Waktu <?php echo form_error('waktu') ?></td>
            <td><input type="text" class="form-control" name="waktu" id="waktu" placeholder="Waktu" value="<?php echo $waktu; ?>" />
        </td>
	    <tr><td>Sumber <?php echo form_error('sumber') ?></td>
            <td><input type="text" class="form-control" name="sumber" id="sumber" placeholder="Sumber" value="<?php echo $sumber; ?>" />
        </td>
	    <tr><td>Nilai Data <?php echo form_error('nilai_data') ?></td>
            <td><input type="text" class="form-control" name="nilai_data" id="nilai_data" placeholder="Nilai Data" value="<?php echo $nilai_data; ?>" />
        </td>
	    <tr><td>Uraian <?php echo form_error('uraian') ?></td>
            <td><textarea class="form-control" rows="3" name="uraian" id="uraian" placeholder="Uraian"><?php echo $uraian; ?></textarea>
        </td></tr>
	    <tr><td>Catatan <?php echo form_error('catatan') ?></td>
            <td><input type="text" class="form-control" name="catatan" id="catatan" placeholder="Catatan" value="<?php echo $catatan; ?>" />
        </td>
	    <tr><td>Disposisi <?php echo form_error('disposisi') ?></td>
            <td><input type="text" class="form-control" name="disposisi" id="disposisi" placeholder="Disposisi" value="<?php echo $disposisi; ?>" />
        </td>
	    <tr><td>Keterangan <?php echo form_error('keterangan') ?></td>
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