<form id="formulir" method="post" action="<?php echo site_url("$controller/$action"); ?>">
<table width="100%" border="0" class="table">
     <tr>
       <td>Sifat Surat</td>
       <td><?php 
			$arr = array("biasa"=>"BIASA","rahasia"=>"RAHASIA");
				echo form_dropdown("sifat",$arr,$sifat,'id="sifat" class="form-control"');
			?></td>
     <tr>
       <td> Tanggal Terima</td>
            <td><input type="text" class="form-control tanggal" name="terima_tanggal" id="terima_tanggal" placeholder="Tanggal Terima" value="<?php echo $terima_tanggal; ?>" data-date-format="dd-mm-yyyy"  />
        </td>
    <tr>
            <td>Jam Terima  </td>
            <td><input type="text" class="form-control" name="terima_jam" id="terima_jam" placeholder="Jam Terima " value="<?php echo $terima_jam; ?>" />
        </td>
	    <tr>
            <td>Nomor Surat</td>
            <td><input type="text" class="form-control" name="nomor" id="nomor" placeholder="Nomor" value="<?php echo $nomor; ?>" />
        </td>
	    <tr>
            <td>Tanggal Surat</td>
            <td><input type="text" class="form-control tanggal" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" data-date-format="dd-mm-yyyy"  />
        </td>
	    <tr><td>Asal Surat </td>
            <td><input type="text" class="form-control" name="asal_surat" id="asal_surat" placeholder="Asal Surat" value="<?php echo $asal_surat; ?>" />
        </td>
	    <tr><td>Perihal </td>
            <td><input type="text" class="form-control" name="perihal" id="perihal" placeholder="Perihal" value="<?php echo $perihal; ?>" />
        </td>
	    <tr>
            <td>Tanggal Disposisi  </td>
            <td><input type="text" class="form-control tanggal" name="disposisi_tanggal" id="disposisi_tanggal" placeholder="Tanggal Disposisi " value="<?php echo $disposisi_tanggal; ?>" data-date-format="dd-mm-yyyy"  />
        </td>
	    <tr>
	      <td>Isi Disposisi  </td>
            <td><input type="text" class="form-control" name="disposisi_isi" id="disposisi_isi" placeholder="Isi Disposisi " value="<?php echo $disposisi_isi; ?>" />
        </td>
	    <tr><td>Keterangan </td>
            <td><input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" />
        </td>
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