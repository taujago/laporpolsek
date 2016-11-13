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
    <td width="50%" align="right">&nbsp;</td>
  </tr>
</table><br />

 

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100%" align="center"><p align="center"><strong>DATA SURAT PERMINTAAN KETERANGAN</strong></p></td>
  </tr>
  <tr>
    <td align="center"><strong>BULAN <?php echo $bulan; ?> TAHUN <?php echo $tahun; ?> </strong></td>
  </tr>
</table>
<br /><br />
<table width="100%"  cellspacing="0" cellpadding="7" class="cetak">
  <tr>
    <th width="5%" height="30%" align="center" scope="col"><strong><br />
    NO.</strong></th>
    <th width="10%" align="center" scope="col"><strong>TANGGAL</strong></th>
    <th width="11%" align="center" scope="col"><strong>NOMOR</strong></th>
    <th width="8%" align="center" scope="col"><strong>SIFAT</strong></th>
    <th width="13%" align="center" scope="col"><strong>DITUJUKAN KEPADA</strong></th>
    <th width="12%" align="center" scope="col"><strong>WAKTU </strong></th>
    <th width="14%" align="center" scope="col"><strong>BERTEMU DENGAN </strong></th>
    <th width="27%" align="center" scope="col"><strong>UNTUK</strong></th>
  </tr>
  <tr>
    <th width="5%" height="30%" align="center" bgcolor="#999999" scope="col">1</th>
    <th width="10%" align="center" bgcolor="#999999" scope="col">2</th>
    <th width="11%" align="center" bgcolor="#999999" scope="col">3</th>
    <th width="8%" align="center" bgcolor="#999999" scope="col">&nbsp;</th>
    <th width="13%" align="center" bgcolor="#999999" scope="col">4</th>
    <th width="12%" align="center" bgcolor="#999999" scope="col">5</th>
    <th width="14%" align="center" bgcolor="#999999" scope="col">6</th>
    <th width="27%" align="center" bgcolor="#999999" scope="col">7</th>
  </tr>
   <?php  
  $n=0;
  foreach($rec_agenda->result() as $row) : 
  $n++;
  ?>
  <tr>
    <td width="5%" align="center" scope="col"><?php echo $n; ?></td>
    <td width="10%" scope="col"><?php echo flipdate($row->tanggal); ?></td>
    <td width="11%" scope="col"><?php echo $row->nomor; ?></td>
    <td width="8%" scope="col" align="justify"><?php echo $row->sifat; ?></td>
    <td width="13%" scope="col" align="justify"><?php echo $row->kepada; ?></td>
    <td width="12%" scope="col"><?php echo flipdate($row->isi_tanggal) . substr($row->isi_jam,0,5); ?></td>
    <td width="14%" scope="col"><?php echo str_replace("#",",",$row->bertemu_dengan); ?></td>
    <td width="27%" scope="col"><?php echo $row->untuk; ?></td>
  </tr>
  
  <?php endforeach; ?>
</table>
<p>&nbsp;</p>
