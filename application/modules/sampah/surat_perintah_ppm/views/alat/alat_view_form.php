<form id="formulir" method="post" action="<?php echo site_url("$controller/$action"); ?>">
<table width="100%" border="0" class="table">
 <tr>
            <td width="24%">Nama Peralatan </td>
            <td width="76%"><input type="text" class="form-control" name="nama_unit" id="nama_unit" placeholder="Nama Unit" value="<?php echo $nama_unit; ?>" />
      </td>
	    <tr><td>Jumlah Unit </td>
            <td><input type="text" class="form-control" name="jumlah_unit" id="jumlah_unit" placeholder="Jumlah Unit" value="<?php echo $jumlah_unit; ?>" />
        </td>
	   
	    
    
    <tr>
      <td align="right" valign="middle">&nbsp;</td>
      <td><input class="btn btn-lg btn-primary" type="submit" name="Submit" id="button" value="Simpan">
        <a class="btn btn-lg btn-danger" href="<?php echo $back_link ?>" >Kembali 
        
       
      </a> <input type="hidden" name="id" id="id" value="<?php echo isset($id)?$id:""; ?>" />
       <input type="hidden" name="mode" id="mode" value="<?php echo isset($mode)?$mode:""; ?>">
       <input type="hidden" name="surat_kmpi_id" id="surat_kmpi_id" value="<?php echo isset($surat_kmpi_id)?$surat_kmpi_id:""; ?>" /></td>
    </tr> 
</table>
</form>
<?php $this->load->view($controller."_view_form_js");?>