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
<p>&nbsp;</p>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th width="49%" align="center" scope="col">&nbsp;</th>
    <th width="51%" align="center" scope="col"><strong>KEPALA KEJAKSAAN NEGERI MAKASSAR</strong></th>
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
    <th align="center" scope="col"><strong><u><?php echo $setting->kajaksa_nama; ?></u></strong></th>
  </tr>
  <tr>
    <th align="center" scope="col">&nbsp;</th>
    <th align="center" scope="col"><?php echo $setting->kajaksa_pangkat; ?></th>
  </tr>
  <tr>
    <th align="center" scope="col">&nbsp;</th>
    <th align="center" scope="col">NIP : <?php echo $setting->kajaksa_nip; ?></th>
  </tr>
  <tr>
    <th align="center" scope="col">&nbsp;</th>
    <th align="center" scope="col">NRP. <?php echo $setting->kajaksa_nrp; ?></th>
  </tr>
</table>
<p>&nbsp;</p>
<p><strong><u>TEMBUSAN</u></strong><strong> :</strong><strong> </strong></p>
<p>1.   YTH. KEPALA KEJAKSAAN TINGGI SULAWESI SELATAN;<br />
  2.   YTH. WAKIL KEPALA KEJAKSAAN TINGGI SULAWESI SELATAN;<br />
  3.   YTH. ASISTEN INTELIJEN KEJAKSAAN TINGGI SULAWESI SELATAN;<br />
  4.   YTH. ASISTEN PENGAWASAN KEJAKSAAN TINGGI SULAWESI SELATAN; <br />
  5.   <u>A  R  S  I  P.</u></p>
