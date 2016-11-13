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
    <td width="50%" align="right">R.IN.25</td>
  </tr>
</table><br />

 

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100%" align="center"><p align="center"><strong>BUKU EKSPEDISI BERITA</strong></p></td>
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
    <th width="5%" height="30%" align="center" scope="col">NO.</th>
    <th width="25%" align="center" scope="col">NOMOR BERITA</th>
    <th width="16%" align="center" scope="col">KEPADA</th>
    <th width="30%" align="center" scope="col">NAMA DAN TANDA TANGAN PENERIMA</th>
    <th width="23%" align="center" scope="col">KETERANGAN</th>
  </tr>
  <tr>
    <th width="5%" height="30%" align="center" bgcolor="#999999" scope="col">1</th>
    <th width="25%" align="center" bgcolor="#999999" scope="col">2</th>
    <th width="16%" align="center" bgcolor="#999999" scope="col">3</th>
    <th width="30%" align="center" bgcolor="#999999" scope="col">4</th>
    <th width="23%" align="center" bgcolor="#999999" scope="col">8</th>
  </tr>
   <?php  
  $n=0;
  foreach($rec_agenda->result() as $row) : 
  $n++;
  ?>
  <tr>
    <td width="5%" scope="col"><?php echo $n; ?></td>
    <td width="25%" scope="col"><br />      <?php echo $row->nomor; ?></td>
    <td width="16%" scope="col"><?php echo $row->kepada ?></td>
    <td width="30%" scope="col">&nbsp;</td>
    <td width="23%" scope="col"><?php echo $row->keterangan; ?></td>
  </tr>
  
  <?php endforeach; ?>
</table>
<p>&nbsp;</p>
