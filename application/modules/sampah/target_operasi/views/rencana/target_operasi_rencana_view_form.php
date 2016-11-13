<form id="formulir" method="post" action="<?php echo site_url("$controller/$action"); ?>">
<table width="100%" border="0" class="table">
 <tr><td>Unsur <?php echo form_error('unsur') ?></td>
            <td><textarea class="form-control" rows="3" name="unsur" id="unsur" placeholder="Unsur"><?php echo $unsur; ?></textarea>
        </td></tr>
	    <tr><td>Data Awal <?php echo form_error('data_awal') ?></td>
            <td><input type="text" class="form-control" name="data_awal" id="data_awal" placeholder="Data Awal" value="<?php echo $data_awal; ?>" />
        </td>
	    <tr><td>Instruksi <?php echo form_error('instruksi') ?></td>
            <td><input type="text" class="form-control" name="instruksi" id="instruksi" placeholder="Instruksi" value="<?php echo $instruksi; ?>" />
        </td>
	    <tr><td>Keterangan <?php echo form_error('keterangan') ?></td>
            <td><textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea>
        </td></tr>
	    
	   
	    
    
    <tr>
      <td align="right" valign="middle">&nbsp;</td>
      <td><input class="btn btn-lg btn-primary" type="submit" name="Submit" id="button" value="Simpan">
        <a class="btn btn-lg btn-danger" href="<?php echo $back_link ?>" >Kembali 
        
       
      </a> <input type="hidden" name="id" id="id" value="<?php echo isset($id)?$id:""; ?>" />
       <input type="hidden" name="mode" id="mode" value="<?php echo isset($mode)?$mode:""; ?>">
       <input type="hidden" name="to_id" id="to_id" value="<?php echo isset($to_id)?$to_id:""; ?>" /></td>
    </tr> 
</table>
</form>
<?php $this->load->view($controller."_view_form_js");?>