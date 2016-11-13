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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><U>Jl. Syekh Nawawi Al Bantani No. 76 Serang 42121</U></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
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
    <td colspan="3" align="center"><H2><U> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;TANDA BUKTI LAPOR &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</U></H2> </td>
  </tr>
  <tr>
    <td colspan="3" align="center">NOMOR : <?php echo $nomor; ?></td>
  </tr>
</table>
<p>Berdasarkan laporan polisi nomor : <?php echo $nomor; ?> tanggal <?php echo tgl_indo(flipdate($tanggal)); ?> dengan ini menerangkan bahwa : </p>
<table width="100%" border="0" cellpadding="0">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="3%">1.</td>
    <td width="26%">NAMA</td>
    <td width="2%">:</td>
    <td width="66%"><?php echo $pelapor_nama; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>2.</td>
    <td>TEMPAT / TGL. LAHIR</td>
    <td>:</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>3.</td>
    <td>JENIS KELAMIN </td>
    <td>:</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>4. </td>
    <td>PEKERJAAN</td>
    <td>: </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>5. </td>
    <td>ALAMAT</td>
    <td>:</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>6.</td>
    <td>TELAH MELAPOR DI </td>
    <td>: </td>
    <td></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>7. </td>
    <td>PERKARA</td>
    <td>: </td>
    <td> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>8.</td>
    <td>WAKTU KEJADIAN</td>
    <td>:</td>
    <td><?php echo tgl_indo(flipdate($kp_tanggal)).', '.$kp_waktu; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>9. </td>
    <td>TEMPAT  KEJADIAN</td>
    <td>:</td>
    <td><?php echo $kp_tempat_kejadian; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>10.</td>
    <td>TERLAPOR </td>
    <td>:</td>
    <td></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
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
