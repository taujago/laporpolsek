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
    <td width="50%" align="right">R.IN.30</td>
  </tr>
</table><br />

 

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100%" align="center"><p align="center"><strong>LEMBAR KLIPPING PERS</strong></p></td>
  </tr>
  <tr>
    <td align="center"><strong>BULAN <?php echo $bulan; ?> TAHUN <?php echo $tahun; ?> </strong></td>
  </tr>
</table>
<br /><br />
<table width="100%"  cellspacing="0" cellpadding="7" class="cetak">
  <tr>
    <th width="7%" height="30%" align="center" scope="col"><strong><br />
    NO.</strong></th>
    <th width="14%" align="center" scope="col"><strong>SUMBER PENERBITAN</strong></th>
    <th width="27%" align="center" scope="col"><strong>JUDUL</strong></th>
    <th width="19%" align="center" scope="col"><strong>URAIAN SINGKAT PERISTIWA</strong></th>
    <th width="13%" align="center" scope="col"><strong>BENTUK DAN KODE PENYIMPANAN</strong></th>
    <th width="20%" align="center" scope="col"><strong><br />
    KETERANGAN</strong></th>
  </tr>
  <tr>
    <th width="7%" height="30%" align="center" bgcolor="#999999" scope="col">1</th>
    <th width="14%" align="center" bgcolor="#999999" scope="col">2</th>
    <th width="27%" align="center" bgcolor="#999999" scope="col">3</th>
    <th width="19%" align="center" bgcolor="#999999" scope="col">4</th>
    <th width="13%" align="center" bgcolor="#999999" scope="col">5</th>
    <th width="20%" align="center" bgcolor="#999999" scope="col">6</th>
  </tr>
   <?php  
  $n=0;
  foreach($rec_agenda->result() as $row) : 
  $n++;
  ?>
  <tr>
    <td width="7%" scope="col"><?php echo $n; ?></td>
    <td width="14%" scope="col"><?php echo $row->sumber; ?></td>
    <td width="27%" scope="col"><?php echo $row->judul; ?></td>
    <td width="19%" scope="col" align="justify"><?php echo $row->uraian; ?></td>
    <td width="13%" scope="col"><?php echo $row->bentuk; ?></td>
    <td width="20%" scope="col" align="justify"><?php echo $row->keterangan; ?></td>
  </tr>
  
  <?php endforeach; ?>
</table>
<p>&nbsp;</p>
