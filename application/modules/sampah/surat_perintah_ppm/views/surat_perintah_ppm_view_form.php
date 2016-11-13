<form id="formulir" method="post" action="<?php echo site_url("$controller/$action"); ?>">
<table width="100%" border="0" class="table">
 <tr>
            <td width="26%">Tanggal</td>
            <td width="74%"><input type="text" class="form-control tanggal" name="tanggal" id="tanggal" placeholder=" Daftar" value="<?php echo $tanggal; ?>"  data-date-format="dd-mm-yyyy"  />
        </td>
    <tr><td>Nomor <?php echo form_error('nomor') ?></td>
            <td><input type="text" class="form-control" name="nomor" id="nomor" placeholder="Nomor" value="<?php echo $nomor; ?>" />
        </td>
    <tr><td>Penandatangan  <?php echo form_error('penandatangan_id') ?></td>
            <td><?php
			 	echo form_dropdown('penandatangan_id',$arr_pelaksana,$pelaksana_id,'id="pelaksana_id" class="form-control"');
			  ?></td>
    <tr><td>Pelaksana  <?php echo form_error('pelaksana_id') ?></td>
            <td><?php
			 	echo form_dropdown('pelaksana_id',$arr_pelaksana,$pelaksana_id,'id="pelaksana_id" class="form-control"');
			  ?>
        </td>
    <tr><td>Tujuan <?php echo form_error('tujuan') ?></td>
            <td><input type="text" class="form-control" name="tujuan" id="tujuan" placeholder="Tujuan" value="<?php echo $tujuan; ?>" /></td>
    <tr>
      <td align="right" valign="middle">&nbsp;</td>
      <td><input class="btn btn-lg btn-primary" type="submit" name="Submit" id="button" value="Simpan">
        <a class="btn btn-lg btn-danger" href="<?php echo site_url("$controller"); ?>" >Kembali       </a> <input type="hidden" name="mode" id="mode" value="<?php echo isset($mode)?$mode:""; ?>" />
        <input type="hidden" name="id" id="id" value="<?php echo isset($id)?$id:""; ?>" /></td>
    </tr> 
</table>
</form>
<?php $this->load->view($controller."_view_form_js");?>