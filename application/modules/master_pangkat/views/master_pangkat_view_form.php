<form id="formulir" method="post" action="<?php echo site_url("$controller/$action"); ?>">
<table width="100%" border="0" class="table">
  <tr>
    <td width="15%" align="right" valign="middle">Pangkat</td>
    <td width="85%"><input  name="pangkat" type="text" class="form-control" id="pangkat" placeholder="Nama Pangkat" 
    value="<?php echo isset($pangkat)?$pangkat:""; ?>" /></td>
  </tr>
  <tr>
    <td align="right" valign="middle">&nbsp;</td>
    <td><input class="btn btn-lg btn-primary" type="submit" name="Submit" id="button" value="Simpan">
      <a class="btn btn-lg btn-danger" href="<?php echo site_url("$controller"); ?>" >Kembali 
        <input type="hidden" name="mode" id="mode" value="<?php echo isset($mode)?$mode:""; ?>">
        <input type="hidden" name="id_pangkat" id="id_pangkat"  value="<?php echo isset($id_pangkat)?$id_pangkat:""; ?>" />
      </a></td>
  </tr>
</table>
</form>
<?php $this->load->view($controller."_view_form_js");?>