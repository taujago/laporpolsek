<form id="formulir" method="post" action="<?php echo site_url("$controller/$action"); ?>">
<table width="100%" border="0" class="table">

 <tr>
   <td width="19%">NIP</td>
            <td width="81%"><input type="text" class="form-control" name="pelaksana_nip" id="pelaksana_nip" placeholder="Nip" value="<?php echo isset($pelaksana_nip)?$pelaksana_nip:""; ?>" />
        </td>
      <tr>
        <td>NRP</td>
        <td><input type="text" class="form-control" name="pelaksana_nrp" id="pelaksana_nip2" placeholder="NRP" value="<?php echo isset($pelaksana_nrp)?$pelaksana_nrp:""; ?>" /></td>
      <tr>
            <td> Nama </td>
            <td><input type="text" class="form-control" name="pelaksana_nama" id="pelaksana_nama" placeholder="Nama" value="<?php echo isset($pelaksana_nama)?$pelaksana_nama:"";  ?>" />
        </td>
      <tr><td>Pangkat   </td>
            <td> <?php 
            $sel = isset($pangkat_id)?$pangkat_id:"";
            echo form_dropdown("pangkat_id",$arr_pangkat,$sel,'id="pangkat_id"  class="form-control"'); ?>
        </td>
      <tr><td>No Hp </td>
            <td><input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No Hp" value="<?php echo  isset($no_hp)?$no_hp:""; ?>" />
        </td>
      <tr><td>Alamat </td>
            <td><input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo isset($alamat)?$alamat:"";   ?>" />
        </td>
      <input type="hidden" name="pelaksana_id" value="<?php  echo isset($pelaksana_id)?$pelaksana_id:"";  ?>" /> 
     <tr>
    <td align="right" valign="middle">&nbsp;</td>
    <td><input class="btn btn-lg btn-primary" type="submit" name="Submit" id="button" value="Simpan">
      <a class="btn btn-lg btn-danger" href="<?php echo site_url("$controller"); ?>" >Kembali 
        <input type="hidden" name="mode" id="mode" value="<?php echo isset($mode)?$mode:""; ?>">
       </a></td>
  </tr> 
  <!-- <tr>
    <td width="15%" align="right" valign="middle">Pangkat</td>
    <td width="85%"><input  name="pangkat_nama" type="text" class="form-control" id="pangkat_nama" placeholder="Nama Pangkat" 
    value="<?php echo isset($pangkat_nama)?$pangkat_nama:""; ?>" /></td>
  </tr>
  -->
</table>
</form>
<?php $this->load->view($controller."_view_form_js");?>