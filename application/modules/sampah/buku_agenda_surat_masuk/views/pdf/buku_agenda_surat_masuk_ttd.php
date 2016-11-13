<style>
* {
	font-size:8px;
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
    <th align="center" scope="col">&nbsp;</th>
    <th align="center" scope="col">Makassar, <?php echo tgl_indo(flipdate(date('Y-m-d'))); ?></th>
  </tr>
  <tr>
    <th align="center" scope="col">M e n g e t a h u i; </th>
    <th align="center" scope="col">Pelaksana, </th>
  </tr>
  <tr>
    <th align="center" scope="col"><strong>KEPALA KEJAKSAAN NEGERI MAKASSAR</strong></th>
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
    <th align="center" scope="col"><strong><u><?php echo $setting->kajaksa_nama; ?></u></strong></th>
    <th align="center" scope="col"><strong><u><?php echo $setting->kasijen_nama; ?></u></strong></th>
  </tr>
  <tr>
    <th align="center" scope="col"><?php echo $setting->kajaksa_pangkat; ?></th>
    <th align="center" scope="col"><?php echo $setting->kasijen_pangkat; ?></th>
  </tr>
  <tr>
    <th align="center" scope="col">NIP : <?php echo $setting->kajaksa_nip; ?></th>
    <th align="center" scope="col">NIP : <?php echo $setting->kasijen_nip; ?></th>
  </tr>
  <tr>
    <th align="center" scope="col">NRP. <?php echo $setting->kajaksa_nrp; ?></th>
    <th align="center" scope="col">NRP. <?php echo $setting->kasijen_nrp; ?></th>
  </tr>
</table>
