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
<p>&nbsp;</p>
<p align="center"><H2>SURAT PERNYATAAN</H2></p>
<table width="100%" border="0" cellpadding="0">
  <tr>
    <td width="18%">NAMA</td>
    <td width="1%">:</td>
    <td width="81%"><?php echo $pelapor_nama; ?></td>
  </tr>
  <tr>
    <td>TMPT / TGL. LAHIR</td>
    <td>:</td>
    <td><?php echo $pelapor_tmp_lahir; ?> / <?php echo tgl_indo(flipdate($pelapor_tgl_lahir)); ?></td>
  </tr>
  <tr>
    <td>JENIS KELAMIN</td>
    <td>:</td>
    <td><?php echo $pelapor_jk; ?></td>
  </tr>
  <tr>
    <td>PEKERJAAN</td>
    <td>:</td>
    <td><?php echo $pekerjaan; ?></td>
  </tr>
  <tr>
    <td>AGAMA </td>
    <td>:</td>
    <td><?php echo $agama; ?></td>
  </tr>
  <tr>
    <td>ALAMAT</td>
    <td>:</td>
    <td><?php echo $pelapor_alamat; ?> - <?php echo $desa; ?> - <?php echo $kecamatan; ?> - <?php echo $kota; ?> - <?php echo $provinsi; ?></td>
  </tr>
  <tr>
    <td>TEL/FAX/EMAIL</td>
    <td>:</td>
    <td><?php echo $pelapor_telpon; ?></td>
  </tr>
</table>
<p>Sehubungan dengan laporan polisi <?php echo $nomor  ?> tanggal <?php echo tgl_indo(flipdate($tanggal));  ?> tentang <?php echo $tindak_pidana; ?></p>
<p>Dengan ini menyatakan : </p>
<table width="100%" border="0" cellpadding="0">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="4%">1. </td>
    <td width="93%">Perkara yang pelapor laporkan belum pernah dilaporkan ke Kepolisian manapun ; </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>2. </td>
    <td>Di seluruh Kepolisian Republik Indonesia pelapor bukan sebagai terlapor dalam perkara yang berkaitan dengan laporan pelapor tersebut; </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>3. </td>
    <td>Perkara yang pelapor laporkan belum pernah dihentikan penyidikannya oleh penyidik manapun;</td>
  </tr>
</table>
<p>Demikian pernyataan ini pelapor buat dengan sebenar-benarnya tanpa ada paksaan dari siapapun. Dan apabila di kemudian hari diketahui laporan pelapor tidak benar atau palsu maka bersedia dituntut sesuai ketentuan hukum yang berlaku </p>
<table width="100%" border="0" cellpadding="0">
  <tr>
    <td width="58%">&nbsp;</td>
    <td width="42%" align="center">Serang, <?php echo tgl_indo(flipdate($tanggal));  ?> </td>
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
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center"><?php echo $pelapor_nama; ?></td>
  </tr>
</table>
<p>&nbsp;</p>
