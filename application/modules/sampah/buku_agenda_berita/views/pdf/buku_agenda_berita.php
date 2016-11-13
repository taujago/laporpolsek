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
    <td width="50%" align="right"><?php echo $kode; ?></td>
  </tr>
</table><br />

 

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100%" align="center"><p align="center"><strong>BUKU AGENDA BERITA <?php echo $this->ket_jenis; ?></strong></p></td>
  </tr>
  <tr>
    <td align="center"><p align="center" style="letter-spacing:2px;" ><strong>( <?php echo strtoupper($sifat); ?> )</strong></p></td>
  </tr>
  <tr>
    <td align="center"><strong>BULAN <?php echo $bulan; ?> TAHUN <?php echo $tahun; ?> </strong></td>
  </tr>
</table>
<br /><br />
<table width="100%"  cellspacing="0" cellpadding="7" class="cetak">
   <tr>
    <th width="4%" align="center" scope="col"><strong>NO.</strong></th>
    <th width="7%" align="center" scope="col"><strong>TANGGAL</strong></th>
    <th width="12%" align="center" scope="col"><strong>NOMOR &amp; TANGGAL BERITA</strong></th>
    <th width="11%" align="center" scope="col"><strong>DARI</strong></th>
    <th width="12%" align="center" scope="col"><strong>KEPADA</strong></th>
    <th width="17%" align="center" scope="col"><strong>PERIHAL</strong></th>
    <th width="7%" align="center" scope="col"><strong>JAM/TGL BEITA</strong></th>
    <th width="7%" align="center" scope="col"><strong>JML. HALAMAN</strong></th>
    <th width="10%" align="center" scope="col"><strong>NAMA PETUGAS</strong></th>
    <th width="13%" align="center" scope="col"><strong>KETERANGAN</strong></th>
  </tr>
  <tr>
    <th width="4%" align="center" bgcolor="#999999" scope="col">1</th>
    <th width="7%" align="center" bgcolor="#999999" scope="col">2</th>
    <th width="12%" align="center" bgcolor="#999999" scope="col">3</th>
    <th width="11%" align="center" bgcolor="#999999" scope="col">4</th>
    <th width="12%" align="center" bgcolor="#999999" scope="col">5</th>
    <th width="17%" align="center" bgcolor="#999999" scope="col">6</th>
    <th width="7%" align="center" bgcolor="#999999" scope="col">7</th>
    <th width="7%" align="center" bgcolor="#999999" scope="col">&nbsp;</th>
    <th width="10%" align="center" bgcolor="#999999" scope="col">&nbsp;</th>
    <th width="13%" align="center" bgcolor="#999999" scope="col">8</th>
  </tr>
   <?php  
  $n=0;
  foreach($rec_agenda->result() as $row) : 
  $n++;
  ?>
  <tr>
    <td width="4%" scope="col"><?php echo $n; ?></td>
    <td width="7%" scope="col"><?php echo flipdate($row->tanggal); ?></td>
    <td width="12%" scope="col"><?php echo $row->berita_nomor."<br />". flipdate($row->berita_tanggal); ?></td>
    <td width="11%" scope="col"><?php echo $row->dari; ?></td>
    <td width="12%" scope="col"><?php echo $row->kepada; ?></td>
    <td width="17%" scope="col"><?php echo $row->perihal; ?></td>
    <td width="7%" scope="col"><?php echo $row->berita_jam; ?></td>
    <td width="7%" scope="col"><?php echo $row->jumlah_halaman; ?></td>
    <td width="10%" scope="col"><?php echo $row->nama_petugas; ?></td>
    <td width="13%" scope="col"><?php echo $row->keterangan; ?></td>
  </tr>
  
  <?php endforeach; ?>
</table>
<p>&nbsp;</p>
