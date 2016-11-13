<style>
* {
	font-size:10px;
	margin:0px;
	padding:0px;
}


table.cetak th {
	border : 1px solid #000;
/*	border:#000 solid 3px;
	border-style:double;*/
	padding:5px;
}

table.cetak td {
	 
	border:0.5px solid #000;
	padding:5px;
	
} 

hr {
	margin:10px 0px;
}
</style>
<?php 
$setting = $this->cm->get_setting();

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="58%">&nbsp;</td>
    <td width="42%" align="center">Makassar, <?php echo tgl_indo(flipdate($tanggal)); ?></td>
  </tr>
  <tr>
    <td >&nbsp;</td>
    <td align="center"><strong>YANG MEMBUAT LAPORAN</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center"><strong><u><?php echo $pelaksana_nama; ?></u></strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center"><?php echo $pangkat_nama; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">NIP : <?php echo $pelaksana_nip; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">NRP : <?php echo $pelaksana_nrp; ?></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th width="46%" align="center" scope="col">Makassar, <?php echo tgl_indo(flipdate(date('Y-m-d'))); ?></th>
    <th width="54%" align="center" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th align="center" scope="col">Pelaksana, </th>
    <th align="center" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th align="center" scope="col"><strong>KEPALA SEKSI INTELIJEN</strong></th>
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
    <th align="center" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th align="center" scope="col"><strong><u><?php echo $setting->kasijen_nama; ?></u></strong></th>
    <th align="center" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th align="center" scope="col"><?php echo $setting->kasijen_pangkat; ?></th>
    <th align="center" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th align="center" scope="col">NIP : <?php echo $setting->kasijen_nip; ?></th>
    <th align="center" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th align="center" scope="col">NRP. <?php echo $setting->kasijen_nrp; ?></th>
    <th align="center" scope="col">&nbsp;</th>
  </tr>
</table>
