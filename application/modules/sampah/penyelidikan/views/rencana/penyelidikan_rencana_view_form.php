<form id="formulir" method="post" action="<?php echo site_url("$controller/$action"); ?>">
<table width="100%" border="0" class="table">
 <tr><td  width="26%">No Urut </td>
            <td width="74%"><input type="text" class="form-control" name="no_urut" id="no_urut" placeholder="No Urut" value="<?php echo $no_urut; ?>" style="width:100px" />
        </td></tr>
 
 <tr><td>Pokok Masalah </td>
            <td ><input type="text" class="form-control" name="pokok_masalah" id="pokok_masalah" placeholder="Pokok Masalah" value="<?php echo $pokok_masalah; ?>" />
        </td>
	    <tr><td>Indikasi </td>
            <td><input type="text" class="form-control" name="indikasi" id="indikasi" placeholder="Indikasi" value="<?php echo $indikasi; ?>" />
        </td>
	    <tr>
            <td>Info Yang diperlukan </td>
            <td><input type="text" class="form-control" name="info_yangdiperlukan" id="info_yangdiperlukan" placeholder="Info Yang diperlukan" value="<?php echo $info_yangdiperlukan; ?>" />
        </td>
	    <tr><td>Badan Pengumpul </td>
            <td><input type="text" class="form-control" name="badan_pengumpul" id="badan_pengumpul" placeholder="Badan Pengumpul" value="<?php echo $badan_pengumpul; ?>" />
        </td>
	    <tr><td>Sumber Informasi </td>
            <td><input type="text" class="form-control" name="sumber_informasi" id="sumber_informasi" placeholder="Sumber Informasi" value="<?php echo $sumber_informasi; ?>" />
        </td>
	    <tr><td>Waktu </td>
            <td><input type="text" class="form-control tanggal" name="waktu" id="waktu" placeholder="Waktu" value="<?php echo $waktu; ?>" data-date-format="dd-mm-yyyy"  />
        </td>
	    <tr><td>Tempat </td>
            <td><input type="text" class="form-control" name="tempat" id="tempat" placeholder="Tempat" value="<?php echo $tempat; ?>" />
        </td>
	    <tr><td>Catatan </td>
            <td><textarea class="form-control" rows="3" name="catatan" id="catatan" placeholder="Catatan"><?php echo $catatan; ?></textarea>
        </td></tr>
	    
	   
	    
    
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