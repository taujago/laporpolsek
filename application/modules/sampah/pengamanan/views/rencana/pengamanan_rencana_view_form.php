<form id="formulir" method="post" action="<?php echo site_url("$controller/$action"); ?>">
<table width="100%" border="0" class="table">
 <tr><td  width="26%">No Urut </td>
            <td width="74%"><input type="text" class="form-control" name="no_urut" id="no_urut" placeholder="No Urut" value="<?php echo $no_urut; ?>" style="width:100px" />
        </td></tr>
 
 <tr>
            <td>Sasaran Pengamanan</td>
            <td ><input type="text" class="form-control" name="pokok_masalah" id="pokok_masalah" placeholder="Sasaran Pengamanan" value="<?php echo $pokok_masalah; ?>" />
        </td>
	    <tr>
            <td>Indikasi Informasi Sasaran Keamanan</td>
            <td><input type="text" class="form-control" name="indikasi" id="indikasi" placeholder="Indikasi Informasi Sasaran Keamanan" value="<?php echo $indikasi; ?>" />
        </td>
	    <tr>
            <td>Kegitan yang dilakukan </td>
            <td><input type="text" class="form-control" name="info_yangdiperlukan" id="info_yangdiperlukan" placeholder="Kegitan yang dilakukan" value="<?php echo $info_yangdiperlukan; ?>" />
        </td>
	    <tr>
            <td>Keterangan</td>
            <td><input type="text" class="form-control" name="badan_pengumpul" id="badan_pengumpul" placeholder="Keterangan" value="<?php echo $badan_pengumpul; ?>" />
        </td>
	    
	    
	   
	    
    
    <tr>
      <td align="right" valign="middle">&nbsp;</td>
      <td><input class="btn btn-lg btn-primary" type="submit" name="Submit" id="button" value="Simpan">
        <a class="btn btn-lg btn-danger" href="<?php echo $back_link ?>" >Kembali 
        
       
      </a> <input type="hidden" name="id" id="id" value="<?php echo isset($id)?$id:""; ?>" />
       <input type="hidden" name="mode" id="mode" value="<?php echo isset($mode)?$mode:""; ?>">
       <input type="hidden" name="penyelidikan_id" id="penyelidikan_id" value="<?php echo isset($penyelidikan_id)?$penyelidikan_id:""; ?>" /></td>
    </tr> 
</table>
</form>
<?php $this->load->view($controller."_view_form_js");?>