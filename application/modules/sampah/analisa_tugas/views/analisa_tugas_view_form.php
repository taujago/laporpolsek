<form id="formulir" method="post" action="<?php echo site_url("$controller/$action"); ?>">
  <table width="100%" border="0" class="table">
    <tr>
      <td>Tanggal </td>
      <td><input type="text" class="form-control tanggal" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" data-date-format="dd-mm-yyyy" /></td>
    </tr>
    <tr>
      <td>Identifikasi tugas</td>
      <td><textarea class="form-control" rows="3" name="identifikasi" id="identifikasi" placeholder="Identifikasi"><?php echo $identifikasi; ?></textarea></td>
    </tr>
    <tr>
      <td>Uraian tugas</td>
      <td><textarea class="form-control" rows="3" name="uraian" id="uraian" placeholder="Uraian"><?php echo $uraian; ?></textarea></td>
    </tr>
    <tr>
      <td>Pelaksana tugas</td>
      <td><textarea class="form-control" rows="3" name="pelaksana" id="pelaksana" placeholder="Pelaksana"><?php echo $pelaksana; ?></textarea></td>
    </tr>
    <tr>
      <td>Sasaran pendukung</td>
      <td><textarea class="form-control" rows="3" name="sasaran" id="sasaran" placeholder="Sasaran"><?php echo $sasaran; ?></textarea></td>
    </tr>
    <tr>
      <td>Komunikasi dan koordinasi</td>
      <td><textarea class="form-control" rows="3" name="komunikasi" id="komunikasi" placeholder="Komunikasi"><?php echo $komunikasi; ?></textarea></td>
    </tr>
    <tr>
      <td>Pelaporan dan evaluasi</td>
      <td><textarea class="form-control" rows="3" name="pelaporan" id="pelaporan" placeholder="Pelaporan"><?php echo $pelaporan; ?></textarea></td>
    </tr>
    <tr>
      <td width="19%" align="right" valign="middle">&nbsp;</td>
      <td width="81%"><input class="btn btn-lg btn-primary" type="submit" name="Submit" id="button" value="Simpan" />
        <a class="btn btn-lg btn-danger" href="<?php echo site_url("$controller"); ?>" >Kembali
          <input type="hidden" name="mode" id="mode" value="<?php echo isset($mode)?$mode:""; ?>" />
          <input type="hidden" name="id" value="<?php echo $id; ?>" />
        </a></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
<?php $this->load->view($controller."_view_form_js");?>