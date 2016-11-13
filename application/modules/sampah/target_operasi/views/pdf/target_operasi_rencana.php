<?php 
$setting = $this->cm->get_setting();

?>
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

<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td width="50%" align="left"><strong><u>KEJAKSAAN NEGERI MAKASSAR</u></strong></td>
    <td width="50%" align="right">IN.5</td>
  </tr>
</table><br />

 

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="4" align="center"><strong><u>TARGET OPERASI</u></strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="31%">&nbsp;</td>
    <td width="16%"><p>NOMOR</p></td>
    <td width="1%">:</td>
    <td width="52%"><?php echo tgl_indo(flipdate($tanggal)); ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>TANGGAL</td>
    <td>:</td>
    <td><?php echo tgl_indo(flipdate($tanggal)); ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>MASALAH POKOK</td>
    <td>:</td>
    <td><?php echo $masalah; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>PELAKSANA</td>
    <td>: </td>
    <td><?php echo $rec_pelaksana->pelaksana_nama; ?></td>
  </tr>
</table>
<br /><br />
<table width="100%"  cellspacing="0" cellpadding="7" class="cetak">
 
  <tr>
    <th width="7%" align="center" scope="col"><strong>NO. </strong></th>
    <th width="36%" align="center" scope="col"><strong>UNSUR-UNSUR UTAMA KETERANGAN (UUK)
DAN
KETERANGAN INFORMASI LAIN (KIL)
    </strong></th>
    <th width="26%" align="center" scope="col"><strong>DATA AWAL OPERASI</strong></th>
    <th width="20%" align="center" scope="col"><span align="center"><strong>INSTRUKSI / PERMINTAAN</span></p></th>
    <th width="11%" align="center" scope="col"><strong>KETERANGAN</strong></th>
  </tr>
  <tr>
    <th align="center" bgcolor="#999999" scope="col"><strong>1</strong></th>
    <th align="center" bgcolor="#999999" scope="col"><strong>2</strong></th>
    <th align="center" bgcolor="#999999" scope="col"><strong>3</strong></th>
    <th align="center" bgcolor="#999999" scope="col"><strong>5</strong></th>
    <th align="center" bgcolor="#999999" scope="col"><strong>5</strong></th>
  </tr>
 
  <?php
  $x=0;  
  foreach($rec_rencana->result() as $row) : 
  $x++;
  ?>
  <tr>
    <td align="center" scope="col"><?php echo $x; ?></td>
    <td scope="col"><span align="justify"><?php echo $row->unsur; ?></span></td>
    <td scope="col"><span align="justify"><?php echo $row->data_awal; ?></span></td>
    <td scope="col"><span align="justify"><?php echo $row->instruksi; ?></span></td>
    <td scope="col"><span align="justify"><?php echo $row->keterangan; ?></span></td>
  </tr>
  
  <?php endforeach; ?>
</table>
<p>&nbsp;</p>
