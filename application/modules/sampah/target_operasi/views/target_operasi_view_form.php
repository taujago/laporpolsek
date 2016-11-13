<form id="formulir" method="post" action="<?php echo site_url("$controller/$action"); ?>">
<table width="100%" border="0" class="table">
 <tr>
            <td width="26%">Tanggal</td>
            <td width="74%"><input type="text" class="form-control tanggal" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>"  data-date-format="dd-mm-yyyy"  />
        </td>
     <tr><td>Nomor </td>
            <td><input type="text" class="form-control" name="nomor" id="nomor" placeholder="Nomor" value="<?php echo $nomor; ?>" />
        </td>
	    <tr><td>Masalah </td>
            <td><input type="text" class="form-control" name="masalah" id="masalah" placeholder="Masalah" value="<?php echo $masalah; ?>" />
        </td>
    <tr>
    <td align="right" valign="middle">&nbsp;</td>
    <td><input class="btn btn-lg btn-primary" type="submit" name="Submit" id="button" value="Simpan">
      <a class="btn btn-lg btn-danger" href="<?php echo site_url("$controller"); ?>" >Kembali 
        
       </a><input type="hidden" name="mode" id="mode" value="<?php echo isset($mode)?$mode:""; ?>">
       <input type="hidden" name="id" id="id" value="<?php echo isset($id)?$id:""; ?>"></td>
  </tr> 
</table>
</form>
<?php $this->load->view($controller."_view_form_js");?>