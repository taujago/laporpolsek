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
    <td width="50%" align="right">IN.6</td>
  </tr>
</table><br />

 

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="4" align="center"><strong><u>RENCANA PENYELIDIKAN</u></strong></td>
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
    <td width="52%"><?php echo $penyelidikan_nomor; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>TENTANG</td>
    <td>:</td>
    <td><?php echo $penyelidikan_tentang; ?></td>
  </tr>
</table>
<br /><br />
<table width="100%"  cellspacing="0" cellpadding="7" class="cetak">
 
  <tr>
    <th align="center" scope="col"><strong>MASALAH POKOK</strong></th>
    <th align="center" scope="col"><strong>INDIKASI</strong></th>
    <th align="center" scope="col"><strong>INFO YANG DIPERLUKAN </strong></th>
    <th align="center" scope="col"><strong>BADANG PENGUMPUL (BAPUL)</strong></th>
    <th align="center" scope="col"><strong>SUMBER INFORMASI</strong></th>
    <th align="center" scope="col"><strong>WAKTU DAN TEMPAT</strong></th>
    <th align="center" scope="col"><strong>CATATAN</strong></th>
  </tr>
  <tr>
    <th align="center" bgcolor="#999999" scope="col">1</th>
    <th align="center" bgcolor="#999999" scope="col">2</th>
    <th align="center" bgcolor="#999999" scope="col">3</th>
    <th align="center" bgcolor="#999999" scope="col">4</th>
    <th align="center" bgcolor="#999999" scope="col">5</th>
    <th align="center" bgcolor="#999999" scope="col">6</th>
    <th align="center" bgcolor="#999999" scope="col">7</th>
  </tr>
 
  <?php  
  foreach($rec_rencana->result() as $row) : 
  ?>
  <tr>
    <td scope="col"><?php echo $row->pokok_masalah; ?></td>
    <td scope="col"><?php echo $row->indikasi; ?></td>
    <td scope="col"><?php echo $row->info_yangdiperlukan; ?></td>
    <td scope="col"><?php echo $row->badan_pengumpul; ?></td>
    <td scope="col"><?php echo $row->sumber_informasi; ?></td>
    <td scope="col"><?php echo flipdate($row->waktu)."<br />".$row->tempat; ?></td>
    <td scope="col"><?php echo $row->catatan; ?></td>
  </tr>
  
  <?php endforeach; ?>
</table>
<p>&nbsp;</p>
