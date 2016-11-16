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
    <td width="16%">&nbsp;</td>
    <td width="27%">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">DAERAH BANTEN</td>
    <td>&nbsp; </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><U>Jl. Syekh Nawawi Al Bantani No. 76 Serang 42121</U></td>
    <td>&nbsp; </td>
    <td align="right">MODEL A</td>
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
    <td colspan="3" align="center"><b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;LAPORAN POLISI &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</b> </td>
  </tr>
  <tr>
    <td colspan="3" align="center"><b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Tentang &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</b> </td>
  </tr>
  <tr>
    <td colspan="3" align="center"><b><U> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;KEJAHATAN/PELANGGARAN YANG DIKETEMUKAN &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</U></b> </td>
  </tr>
  <tr>
    <td colspan="3" align="center">NOMOR : <?php echo $nomor; ?></td>
  </tr>
</table>
<br />&nbsp;
<hr />&nbsp;
<br />&nbsp;
<table width="100%" border="0" cellpadding="0">
  <tr>
    <td width="31%"><U><b>PERISTIWA YANG TERJADI</b></U></td>
    <td width="3%">:</td>
    <td width="66%"> <?php echo $tindak_pidana; ?></td>
  </tr>
  <tr>
    <td>Waktu kejadian</td>
    <td>:</td>
    <td><?php echo flipdate($kp_tanggal).' '.$kp_wktu; ?></td>
  </tr>
  <tr>
    <td>Tempat kejadian</td>
    <td>:</td>
    <td><?php echo $kp_tempat_kejadian; ?></td>
  </tr>
  <tr>
    <td>Apa yang terjadi </td>
    <td>:</td>
    <td><?php echo $kp_apa_yang_terjadi; ?></td>
  </tr>
  <tr>
    <td>Siapa&nbsp;&nbsp;&nbsp;&nbsp;  a. Terlapor</td>
    <td>:</td>
    <td><?php echo ''; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  b. Korban</td>
    <td>:</td>
    <td><?php echo ''; ?></td>
  </tr>
  <tr>
    <td>Bagaimana Terjadi</td>
    <td>: </td>
    <td><?php echo $kp_bagaimana_terjadi; ?></td>
  </tr>
  <tr>
    <td>Dilaporkan pada </td>
    <td>:</td>
    <td><?php echo flipdate($kp_dilaporkan_pada).' '.$kp_jam_dilaporkan; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>
  <br />&nbsp;
  <hr />&nbsp;
  <br />&nbsp;
  <table>
  <tr>
    <td width="48%" align="center"><b><u>TINDAK PIDANA</u></b></td>
    <td width="2%">&nbsp;</td>
    <td width="48%" align="center"><b><u>SAKSI-SAKSI</u></b></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $tindak_pidana ?></td>
    <td>&nbsp;</td>
    <td>
    <table>
  <?php foreach($saksi->result() as $row) :  ?>
    <tr>
      <td width="10%" height="2px"> - </td>
      <td width="90%" height="2px"><?php echo $row->saksi_nama; ?></td>
    </tr>
  <?php endforeach; ?>
    </table>
    </td>
  </tr>
  </table>
  <br />&nbsp;
  <hr />&nbsp;
  <br />&nbsp;
  <table>
  <tr>
    <td width="48%" align="center"><b><u>BARBUK</u></b></td>
    <td width="2%">&nbsp;</td>
    <td width="48%" align="center"><b><u>URAIAN KEJADIAN</u></b></td>
  </tr>
  <tr>
    <td>
      <table>
      <?php foreach($barbuk->result() as $row) :  ?>
  <tr>
    <td width="2%">-</td>
    <td width="98%"><?php echo $row->barbuk_nama; ?></td>
  </tr>
  <?php endforeach; ?>
    </table>
    </td>
    <td>&nbsp;</td>
    <td><?php echo $kp_uraian_singkat ?></td>
  </tr>
  </table>
  <br />&nbsp;
  <hr />&nbsp;

  <table>
  <tr>
    <td width="30%"><B>TINDAKAN YANG DIAMBIL</B></td>
    <td width="3%">&nbsp;</td>
    <td width="67%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp; </td>
    <td>&nbsp;</td>
    <td>1. Membuat Laporan Polisi</td>
  </tr>
  <tr>
    <td>&nbsp; </td>
    <td>&nbsp;</td>
    <td>2. Melaksanakan Penyelidikan</td>
  </tr>
  <tr>
    <td>&nbsp; </td>
    <td>&nbsp;</td>
    <td>3. Memeriksa Para Saksi</td>
  </tr>
</table>




<table width="100%" border="0" cellpadding="0">
  <tr>
    <td width="60%">&nbsp;</td>
    <td width="20">&nbsp;</td>
    <td width="20%">&nbsp;</td>
  </tr>
  
  <tr>
    <td align="center">a.n KEPALA KEPOLISIAN DAERAH BANTEN</td>
    <td colspan="2">Tanggal, <?php echo $kp_dilaporkan_pada ?></td>
  </tr>
  <tr>
    <td align="center"><?php echo $setting->ttd_jabatan; ?></td>
    <td width="20%">Pelapor</td>
    <td width="20%">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td width="20%">Tanda Tangan</td>
    <td width="20%">. . . . . . . . . . </td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td width="20%">Nama</td>
    <td width="20%">: <?php echo $pelapor_nama ?></td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td width="20%">Pangkat/NRP</td>
    <td width="20%">: <?php echo $pelapor_pangkat.' / '.$pelapor_nrp ?></td>
  </tr>
  <tr>
    <td >&nbsp;</td>
    <td width="20%">Kesatuan</td>
    <td width="20%">: <?php echo $pelapor_kesatuan ?></td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td >&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><u><?php echo $setting->ttd_nama; ?></u></td>
    <td align="center">&nbsp;</td>
    <td >&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><?php echo $setting->ttd_nrp; ?></td>
    <td align="center">&nbsp;</td>
    <td >&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
