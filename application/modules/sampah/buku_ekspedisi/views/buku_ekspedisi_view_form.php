<form id="formulir" method="post" action="<?php echo site_url("$controller/$action"); ?>">
<table width="100%" border="0" class="table">
     <tr>
       <td>Sifat Surat</td>
       <td><?php 
			$arr = array("biasa"=>"BIASA","rahasia"=>"RAHASIA");
				echo form_dropdown("sifat",$arr,$sifat,'id="sifat" class="form-control"');
			?></td>
<tr><td>Nomor </td>
            <td><input type="text" class="form-control" name="nomor" id="nomor" placeholder="Nomor" value="<?php echo $nomor; ?>" />
        </td>
	    <tr><td>Tanggal </td>
            <td><input type="text" class="form-control tanggal" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" data-date-format="dd-mm-yyyy" />
        </td>
	    <tr><td>Kepada </td>
            <td><input type="text" class="form-control" name="kepada" id="kepada" placeholder="Kepada" value="<?php echo $kepada; ?>" />
        </td>
	    <tr><td>Perihal </td>
            <td><input type="text" class="form-control" name="perihal" id="perihal" placeholder="Perihal" value="<?php echo $perihal; ?>" />
        </td>
	    <tr><td>Lampiran </td>
            <td><input type="text" class="form-control" name="lampiran" id="lampiran" placeholder="Lampiran" value="<?php echo $lampiran; ?>" />
        </td>
	    <tr>
	      <td>Waktu Terima  </td>
            <td><input type="text" class="form-control tanggal" name="terima_waktu" id="terima_waktu" placeholder="Waktu Terima " value="<?php echo $terima_waktu; ?>" data-date-format="dd-mm-yyyy" />
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