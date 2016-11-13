<?php 
$setting = $this->cm->get_setting();

?>
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

<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td width="50%" align="left"><strong><u>KEJAKSAAN NEGERI MAKASSAR</u></strong></td>
    <td width="50%" align="right">R.IN.1</td>
  </tr>
</table><br />

 

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100%" align="center"><p align="center"><strong>BUKU AGENDA SURAT MASUK</strong></p></td>
  </tr>
  <tr>
    <td align="center" style="letter-spacing:2px"><strong>( <?php echo strtoupper($sifat); ?> )</strong></td>
  </tr>
  <tr>
    <td align="center"><strong>BULAN <?php echo $bulan; ?> TAHUN <?php echo $tahun; ?> </strong></td>
  </tr>
</table>
<br /><br />
<table width="100%"  cellspacing="0" cellpadding="7" class="cetak">
   <tr>
    <th width="5%" rowspan="2" align="center" scope="col"><strong><br />
      <br />
      <br />
      NO.</strong></th>
    <th colspan="2" width="13%" align="center" scope="col"><strong>WAKTU PENERIMAAN SURAT</strong></th>
    <th colspan="2" width="21%" align="center" scope="col"><strong>SURAT MASUK</strong></th>
    <th width="11%" rowspan="2" align="center" scope="col"><strong><br />
      <br />
     ASAL SURAT</strong></th>
    <th width="17%" rowspan="2" align="center" scope="col"><strong><br />
      <br />
     PERIHAL</strong></th>
    <th colspan="2" width="19%" align="center" scope="col"><strong>DISPOSISI</strong></th>
    <th width="13%" rowspan="2" align="center" scope="col"><strong><br />
     KETERANGAN</strong></th>
  </tr>
  <tr>
     <th width="7%" height="30%" align="center" scope="col"><strong>TANGGAL</strong></th>
     <th width="6%" align="center" scope="col"><strong>JAM</strong></th>
     <th width="14%" align="center" scope="col"><strong>NOMOR</strong></th>
     <th width="7%" align="center" scope="col"><strong>TANGGAL</strong></th>
     <th width="7%" align="center" scope="col"><strong>TANGGAL </strong></th>
     <th width="12%" align="center" scope="col"><strong>ISI</strong></th>
  </tr>
  <tr>
    <th width="5%" height="30%" align="center" bgcolor="#999999" scope="col">1</th>
    <th width="7%" align="center" bgcolor="#999999" scope="col">2</th>
    <th width="6%" align="center" bgcolor="#999999" scope="col">3</th>
    <th width="14%" align="center" bgcolor="#999999" scope="col">4</th>
    <th width="7%" align="center" bgcolor="#999999" scope="col">5</th>
    <th width="11%" align="center" bgcolor="#999999" scope="col">6</th>
    <th width="17%" align="center" bgcolor="#999999" scope="col">7</th>
    <th width="7%" align="center" bgcolor="#999999" scope="col">8</th>
    <th width="12%" align="center" bgcolor="#999999" scope="col">9</th>
    <th width="13%" align="center" bgcolor="#999999" scope="col">10</th>
  </tr>
   <?php  
  $n=0;
  foreach($rec_agenda->result() as $row) : 
  $n++;
  ?>
  <tr>
    <td width="5%" align="center" scope="col"><?php echo $n; ?></td>
    <td width="7%" scope="col"><?php echo flipdate($row->terima_tanggal); ?></td>
    <td width="6%" scope="col"><?php echo substr($row->terima_jam,0,5); ?></td>
    <td width="14%" scope="col"><?php echo $row->nomor; ?></td>
    <td width="7%" scope="col"><?php echo flipdate($row->tanggal); ?></td>
    <td width="11%" scope="col"><?php echo $row->asal_surat; ?></td>
    <td width="17%" scope="col"><span align="justify"><?php echo $row->perihal; ?></span></td>
    <td width="7%" scope="col"><?php echo flipdate($row->disposisi_tanggal); ?></td>
    <td width="12%" scope="col"><?php echo $row->disposisi_isi ?></td>
    <td width="13%" scope="col"><?php echo $row->keterangan; ?></td>
  </tr>
  
  <?php endforeach; ?>
</table>
<p>&nbsp;</p>
