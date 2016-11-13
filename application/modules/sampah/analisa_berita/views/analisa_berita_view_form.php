<form id="formulir" method="post" action="<?php echo site_url("$controller/$action"); ?>">
<table width="100%" border="0" class="table">
     <tr><td>Tanggal </td>
            <td><input type="text" class="form-control tanggal" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" data-date-format="dd-mm-yyyy" />
        </td>
    <tr><td>Judul </td>
            <td><input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" value="<?php echo $judul; ?>" />
        </td>
    <tr>
      <td>Topik Utama </td>
            <td><input type="text" class="form-control" name="topik_utama" id="topik_utama" placeholder="Topik Utama" value="<?php echo $topik_utama; ?>" />
        </td>
    <tr>
      <td>Narasumber *</td>
            <td><input type="text" class="form-control" name="nara_sumber" id="nara_sumber" placeholder="Nara Sumber" value="<?php echo $nara_sumber; ?>" />
        </td>
    <tr>
      <td>Narasumber yang banyak dikutip </td>
      <td><input type="text" class="form-control" name="nara_sumber_kutip" id="nara_sumber_kutip" placeholder="Nara Sumber yang paling banyak dikutip" value="<?php echo $nara_sumber_kutip; ?>" /></td>
    </tr>
    <tr>
	      <td>Inti Pemberitaan *<br /></td>
            <td><textarea class="form-control" rows="3" name="inti_pemberitaan" id="inti_pemberitaan" placeholder="Inti Pemberitaan"><?php echo $inti_pemberitaan; ?></textarea>
        </td></tr>
	    <tr>
	      <td>Nilai Pemberitaan </td>
            <td><textarea class="form-control" rows="3" name="nilai_pemberitaan" id="nilai_pemberitaan" placeholder="Nilai Pemberitaan"><?php echo $nilai_pemberitaan; ?></textarea>
        </td></tr>
<tr>
<td>Langkah Antisipasi *</td>
            <td><textarea class="form-control" rows="3" name="langkah_antisipasi" id="langkah_antisipasi" placeholder="Langkah Antisipasi"><?php echo $langkah_antisipasi; ?></textarea>
        </td></tr>
    <tr>
      <td align="left" valign="middle">Yang  membuat laporan </td>
      <td><?php echo form_dropdown("pelaksana_id",$arr_pelaksana,$pelaksana_id,'id="pelaksana_id" class="form-control"') ?></td>
    </tr>
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