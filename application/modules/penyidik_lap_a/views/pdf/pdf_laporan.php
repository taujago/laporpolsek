<style>
* {
font-size : 10px;
}

.garisbawah {
	border-bottom : #000 solid 2px;
}

</style>
<?php 
$setting = $this->cm->get_setting();
?>
<table width="100%" border="0" cellpadding="3">
  <tr>
    <td width="57%" align="center">KEPOLISIAN NEGARA REPUBLIK INDONESIA</td>
    <td width="16%">KEJAHATAN</td>
    <td width="27%">:</td>
  </tr>
  <tr>
    <td align="center">DAERAH BANTEN</td>
    <td>PELANGGARAN </td>
    <td>: YANG DITERIMA</td>
  </tr>
  <tr>
    <td align="center"><U>Jl. Syekh Nawawi Al Bantani No. 76 Serang 42121</U></td>
    <td>LAIN - LAIN </td>
    <td>: </td>
  </tr>
  <tr>
    <td>&quot;PROJUSTITIA&quot;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center"><img width="60px" height="60px" src="<?php  echo FCPATH; ?>/assets/images/logo.png>" /></td>
  </tr>
  <tr>
    <td colspan="3" align="center"><H2><U> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;LAPORAN POLISI &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</U></H2> </td>
  </tr>
  <tr>
    <td colspan="3" align="center">NOMOR : <?php echo $nomor; ?></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0">
  <tr>
    <td width="31%"><U>YANG MELAPORKAN</U></td>
    <td width="3%">&nbsp;</td>
    <td width="66%">&nbsp;</td>
  </tr>
  <tr>
    <td>NAMA</td>
    <td>:</td>
    <td><?php echo $pelapor_nama; ?></td>
  </tr>
  <tr>
    <td>TEMPAT / TGL. LAHIR</td>
    <td>:</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>JENIS KELAMIN </td>
    <td>:</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>PEKERJAAN</td>
    <td>: </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>AGAMA </td>
    <td>:</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>ALAMAT </td>
    <td>: </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>TEL / FAX / EMAIL </td>
    <td>: </td>
    <td><?php echo $pelapor_tel; ?> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><u>PERISTIWA YANG DILAPORKAN</u></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>1. WAKTU KAJADIAN</td>
    <td>:</td>
    <td><?php echo $kp_wktu ?></td>
  </tr>
  <tr>
    <td>2. TEMPAT KEJADIAN </td>
    <td>:</td>
    <td><?php echo $kp_tempat_kejadian ?></td>
  </tr>
  <tr>
    <td>3. APA YANG TERJADI </td>
    <td>:</td>
    <td><?php echo $kp_apa_yang_terjadi; ?></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0">
  <tr>
    <td width="2%">&nbsp;</td>
    <td width="29%">&nbsp;</td>
    <td width="3%">&nbsp;</td>
    <td width="66%">&nbsp;</td>
  </tr>
  <tr>
    <td>4.</td>
    <td><u>TERLAPOR</u> </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?php foreach($tersangka->result() as $row) :  ?>
  <tr>
    <td>&nbsp;</td>
    <td>NAMA</td>
    <td>:</td>
    <td><?php echo $row->tersangka_nama; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>TMP/ TGL. LAHIR / UMUR </td>
    <td>:</td>
    <td><?php echo $row->tersangka_tmp_lahir; ?> / <?php echo flipdate($row->tersangka_tgl_lahir); ?> / <?php echo umur($row->tersangka_tgl_lahir); ?> Tahun </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>JENIS KELAMIN </td>
    <td>:</td>
    <td><?php echo $row->tersangka_jk; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>PEKERJAAN</td>
    <td>:</td>
    <td><?php echo $row->pekerjaan; ?></td>
  </tr>
  
  
  
  <tr>
    <td>&nbsp;</td>
    <td>ALAMAT</td>
    <td>:</td>
    <td><?php echo $row->tersangka_alamat; ?> - <?php echo $row->desa ?> - <?php echo $row->kecamatan; ?> - <?php echo $row->kota; ?> -  <?php echo $row->provinsi; ?></td>
  </tr>
  
  <?php endforeach; ?>
  
  
  <tr>
    <td width="2%">&nbsp;</td>
    <td width="29%">&nbsp;</td>
    <td width="3%">&nbsp;</td>
    <td width="66%">&nbsp;</td>
  </tr>
  <tr>
    <td>5.</td>
    <td><u>KORBAN</u> </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?php foreach($korban->result() as $row) :  ?>
  <tr>
    <td>&nbsp;</td>
    <td>NAMA</td>
    <td>:</td>
    <td><?php echo $row->korban_nama; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>TMP/ TGL. LAHIR / UMUR </td>
    <td>:</td>
    <td><?php echo $row->korban_tmp_lahir; ?> / <?php echo flipdate($row->korban_tgl_lahir); ?> / <?php echo umur($row->korban_tgl_lahir); ?> Tahun </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>JENIS KELAMIN </td>
    <td>:</td>
    <td><?php echo $row->korban_jk; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>PEKERJAAN</td>
    <td>:</td>
    <td><?php echo $row->pekerjaan; ?></td>
  </tr>
  
  
  
  <tr>
    <td>&nbsp;</td>
    <td>ALAMAT</td>
    <td>:</td>
    <td><?php echo $row->korban_alamat; ?> - <?php echo $row->desa ?> - <?php echo $row->kecamatan; ?> - <?php echo $row->kota; ?> -  <?php echo $row->provinsi; ?></td>
  </tr>
  
  <?php endforeach; ?>
  

<tr>
    <td width="2%">&nbsp;</td>
    <td width="29%">&nbsp;</td>
    <td width="3%">&nbsp;</td>
    <td width="66%">&nbsp;</td>
  </tr>
  <tr>
    <td>6.</td>
    <td><u>SAKSI - SAKSI</u> </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?php 
  $no = 1;
  foreach($saksi->result() as $row) :  ?>
  <tr>
    <td>&nbsp;</td>
    <td><?php echo $no; ?>) NAMA</td>
    <td>:</td>
    <td><?php echo $row->saksi_nama; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp; &nbsp;  TMP/ TGL. LAHIR / UMUR </td>
    <td>:</td>
    <td><?php echo $row->saksi_tmp_lahir; ?> / <?php echo flipdate($row->saksi_tgl_lahir); ?> / <?php echo umur($row->saksi_tgl_lahir); ?> Tahun </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp; &nbsp;  JENIS KELAMIN </td>
    <td>:</td>
    <td><?php echo $row->saksi_jk; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp; &nbsp;  PEKERJAAN</td>
    <td>:</td>
    <td><?php echo $row->pekerjaan; ?></td>
  </tr>
  
  
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp; &nbsp;   ALAMAT</td>
    <td>:</td>
    <td><?php echo $row->saksi_alamat; ?> - <?php echo $row->desa ?> - <?php echo $row->kecamatan; ?> - <?php echo $row->kota; ?> -  <?php echo $row->provinsi; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp; &nbsp;   TELP / FAX / EMAIL </td>
    <td>:</td>
    <td><?php echo $row->saksi_telpon; ?> - <?php echo $row->saksi_email ?></td>
</tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?php 
  $no++; 
  endforeach; ?>  
  
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="100%" border="1" cellpadding="3">
  <tr>
    <td align="center">URAIAN KEJADIAN</td>
  </tr>
  <tr>
    <td><?php echo $kp_uraian_singkat; ?></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="100%" border="0" cellpadding="3">
  <tr>
    <td width="54%" align="center">&nbsp;</td>
    <td width="46%" align="center">Pelapor</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center"><u><?php echo $pelapor_nama; ?></u></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="100%" border="0" cellpadding="0">
  <tr>
    <td width="4%">&nbsp;</td>
    <td width="4%">&nbsp;</td>
    <td width="92%">&nbsp;</td>
  </tr>
  <tr>
    <td>1.</td>
    <td colspan="2">TINDAKAN YANG DIAMBIL : </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><?php echo $tindakan_yang_dilakukan; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>2.</td>
    <td colspan="2">TINDAK PIDANA APA : </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><?php echo $tindak_pidana; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>3.</td>
    <td colspan="2">BARANG BUKTI</td>
  </tr>
  <?php 
  $no = 1;
  foreach($barbuk->result() as $row) : 
  ?>
  <tr>
    <td></td>
    <td>- <?php //echo $no; ?></td>
    <td><?php echo $row->barbuk_nama; ?></td>
  </tr>
  <?php 
  $no++;
  endforeach; ?>
</table>
<table width="100%" border="0" cellpadding="0">
  <tr>
    <td width="47%">&nbsp;</td>
    <td width="53%">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">Serang, <?php echo tgl_indo(flipdate($tanggal)) ?> </td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">a.n Kepala KEPALA KEPOLISIAN DAERAH BANTEN </td>
  </tr>
  <tr>
    <td align="center">PELAPOR</td>
    <td align="center"><?php echo $setting->ttd_jabatan; ?></td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center"><u><?php echo $setting->ttd_nama; ?></u></td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center"><?php echo $setting->ttd_nrp; ?></td>
  </tr>
</table>
<p>&nbsp;</p>
