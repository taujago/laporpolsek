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
    <td width="50%" align="right">R.IN.3</td>
  </tr>
</table><br />

 

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100%" align="center"><p align="center"><strong>BUKU KERJA INTELIJEN (BKI)</strong></p></td>
  </tr>
  <tr>
    <td align="center" ><strong>RUBRIK :   <?php 
	$arr_jenis = $this->jenis;
	echo strtoupper($arr_jenis[$sifat]); ?> </strong></td>
  </tr>
  <tr>
    <td align="center"><strong>BULAN <?php echo $bulan; ?> TAHUN <?php echo $tahun; ?> </strong></td>
  </tr>
</table>
<br /><br />
<table width="100%"  cellspacing="0" cellpadding="7" class="cetak">
  <tr>
    <th width="5%" height="30%" align="center" scope="col"><strong>NO.</strong></th>
    <th width="12%" align="center" scope="col"><strong>WAKTU TERIMA</strong></th>
    <th width="15%" align="center" scope="col"><strong>SUMBER /BAPUL</strong></th>
    <th width="11%" align="center" scope="col"><strong>NILAI DATA/ INFORMASI</strong></th>
    <th width="22%" align="center" scope="col"><strong>URAIAN PERISTIWA / MASALAH </strong></th>
    <th width="9%" align="center" scope="col"><strong>CATATAN</strong></th>
    <th width="13%" align="center" scope="col"><strong>DISPOSISI / TINDAKAN</strong></th>
    <th width="13%" align="center" scope="col"><strong>KETERANGAN</strong></th>
  </tr>
  <tr>
    <th width="5%" height="30%" align="center" bgcolor="#999999" scope="col">1</th>
    <th width="12%" align="center" bgcolor="#999999" scope="col">2</th>
    <th width="15%" align="center" bgcolor="#999999" scope="col">3</th>
    <th width="11%" align="center" bgcolor="#999999" scope="col">4</th>
    <th width="22%" align="center" bgcolor="#999999" scope="col">5</th>
    <th width="9%" align="center" bgcolor="#999999" scope="col">6</th>
    <th width="13%" align="center" bgcolor="#999999" scope="col">7</th>
    <th width="13%" align="center" bgcolor="#999999" scope="col">8</th>
  </tr>
   <?php  
  $n=0;
  foreach($rec_agenda->result() as $row) : 
  $n++;
  ?>
  <tr>
    <td width="5%" scope="col"><?php echo $n; ?></td>
    <td width="12%" scope="col"><br />      <?php echo flipdate($row->tanggal). " ". substr($row->waktu,0,5) ; ?></td>
    <td width="15%" scope="col"><?php echo $row->sumber ?></td>
    <td width="11%" scope="col"><?php echo $row->nilai_data; ?></td>
    <td width="22%" scope="col"><?php echo $row->uraian; ?></td>
    <td width="9%" scope="col"><?php echo $row->catatan; ?></td>
    <td width="13%" scope="col"><?php echo $row->disposisi; ?></td>
    <td width="13%" scope="col"><?php echo $row->keterangan; ?></td>
  </tr>
  
  <?php endforeach; ?>
</table>
<p>&nbsp;</p>
