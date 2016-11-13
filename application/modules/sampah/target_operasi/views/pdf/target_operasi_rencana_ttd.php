<?php 
$setting = $this->cm->get_setting();

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th width="51%" align="center" scope="col">&nbsp;</th>
    <th width="49%" align="center" scope="col">Makassar, <?php echo tgl_indo(flipdate($tanggal)); ?></th>
  </tr>
  <tr>
    <th align="center" scope="col">&nbsp;</th>
    <th align="center" scope="col">Pelaksana, </th>
  </tr>
  <tr>
    <th align="center" scope="col">&nbsp;</th>
    <th align="center" scope="col"><strong>KEPALA SEKSI INTELIJEN</strong></th>
  </tr>
  <tr>
    <th align="center" scope="col">&nbsp;</th>
    <th align="center" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th align="center" scope="col">&nbsp;</th>
    <th align="center" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th align="center" scope="col">&nbsp;</th>
    <th align="center" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th align="center" scope="col">&nbsp;</th>
    <th align="center" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th align="center" scope="col">&nbsp;</th>
    <th align="center" scope="col"><strong><u><?php echo $setting->kasijen_nama; ?></u></strong></th>
  </tr>
  <tr>
    <th align="center" scope="col">&nbsp;</th>
    <th align="center" scope="col"><?php echo $setting->kasijen_pangkat; ?></th>
  </tr>
  <tr>
    <th align="center" scope="col">&nbsp;</th>
    <th align="center" scope="col">NIP : <?php echo $setting->kasijen_nip; ?></th>
  </tr>
  <tr>
    <th align="center" scope="col">&nbsp;</th>
    <th align="center" scope="col">NRP. <?php echo $setting->kasijen_nrp; ?></th>
  </tr>
</table>
