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
    <td width="50%" align="right">R.IN.29</td>
  </tr>
</table><br />

 

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100%" align="center"><p align="center"><strong>BUKU TAMU POS PELAYANAN HUKUM</strong></p></td>
  </tr>
  <tr>
    <td align="center" ><strong>DAN PENERIMAAN PENGADUAN MASYARAKAT (PPH &amp; PPM)</strong></td>
  </tr>
  <tr>
    <td align="center"><strong>BULAN <?php echo $bulan; ?> TAHUN <?php echo $tahun; ?> </strong></td>
  </tr>
</table>
<br /><br />
<table width="100%"  cellspacing="0" cellpadding="7" class="cetak">
  <tr>
    <th width="5%" rowspan="2" align="center" scope="col"><strong><br />
    NO.</strong></th>
    <th colspan="3" width="20%" align="center" scope="col"><strong>WAKTU</strong></th>
    <th width="12%" rowspan="2" align="center" scope="col"><strong><br />
    IDENTITAS</strong></th>
    <th width="15%" rowspan="2" align="center" scope="col"><strong><br />
    NAMA ORGANISASI</strong></th>
    <th width="12%" rowspan="2" align="center" scope="col"><strong><br />
    INFORMASI YANG DISAMPAIKAN</strong></th>
    <th width="14%" rowspan="2" align="center" scope="col"><strong><br />
    SURAT / DOKUMEN YANG DISAMPAIKAN</strong></th>
    <th width="7%" rowspan="2" align="center" scope="col"><strong><br />
    TANDA TANGAN</strong></th>
    <th width="15%" rowspan="2" align="center" scope="col"><strong><br />
    KETERANGAN</strong></th>
  </tr>
  <tr>
    <th width="8%" height="30%" align="center" scope="col"><strong>HARI</strong></th>
    <th width="7%" align="center" scope="col"><strong>TANGGAL</strong></th>
    <th width="5%" align="center" scope="col"><strong>JAM</strong></th>
  </tr>
  <tr>
    <th width="5%" height="30%" align="center" bgcolor="#999999" scope="col">1</th>
    <th width="8%" align="center" bgcolor="#999999" scope="col">2</th>
    <th width="7%" align="center" bgcolor="#999999" scope="col">3</th>
    <th width="5%" align="center" bgcolor="#999999" scope="col">4</th>
    <th width="12%" align="center" bgcolor="#999999" scope="col">5</th>
    <th width="15%" align="center" bgcolor="#999999" scope="col">6</th>
    <th width="12%" align="center" bgcolor="#999999" scope="col">7</th>
    <th width="14%" align="center" bgcolor="#999999" scope="col">8</th>
    <th width="7%" align="center" bgcolor="#999999" scope="col">9</th>
    <th width="15%" align="center" bgcolor="#999999" scope="col">10</th>
  </tr>
   <?php  
  $n=0;
  foreach($rec_agenda->result() as $row) : 
  $n++;
  ?>
  <tr>
    <td width="5%" scope="col"><?php echo $n; ?></td>
    <td width="8%" scope="col"><?php echo hari($row->tanggal); ?><br /></td>
    <td width="7%" scope="col"><?php echo flipdate($row->tanggal); ?></td>
    <td width="5%" scope="col"><?php echo substr($row->waktu,0,5); ?></td>
    <td width="12%" scope="col"><?php echo $row->identitas; ?></td>
    <td width="15%" scope="col"><?php echo $row->nama_organisasi; ?></td>
    <td width="12%" scope="col"><?php echo $row->informasi; ?></td>
    <td width="14%" scope="col"><?php echo $row->surat_dokumen; ?></td>
    <td width="7%" scope="col">&nbsp;</td>
    <td width="15%" scope="col"><?php echo $row->keterangan; ?></td>
  </tr>
  
  <?php endforeach; ?>
</table>
<p>&nbsp;</p>
