<?php 
$setting = $this->cm->get_setting();

?>
<style>
* {
	font-size:10px;
	margin:0px;
	padding:0px;
}
</style>

<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td width="50%" align="left"><strong><u>KEJAKSAAN NEGERI MAKASSAR</u></strong></td>
    <td width="50%" align="right">IN.2</td>
  </tr>
</table><br />

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="65%">&nbsp;</td>
    <td width="17%">COPY KE</td>
    <td width="18%">: <?php echo $i; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>DARI </td>
    <td>: 5 (Lima) Copies</td>
  </tr>
</table>
<p>&nbsp;</p>
<p align="center"><strong><u>SURAT PERINTAH OPERASI INTELIJEN</u></strong><br />
<strong>(PENGGALANGAN)</strong><br />
Nomor : <?php echo $penyelidikan_nomor; ?><br /><br />
<strong><u>KEPALA KEJAKSAAN NEGERI MAKASSAR</u></strong>
</p>
<br />
<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td width="13%">Dasar</td>
    <td width="1%">:</td>
    <td width="3%">1.</td>
    <td width="83%"><p align="justify">Undang-Undang Nomor 16 Tahun 2004 tentang Kejaksaan Republik Indonesia (Lembaran Negara Republik Indonesia Tahun 2004 Nomor 76, Tambahan Lembaran Negara Republik Indonesia Nomor 4401);</p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>2.</td>
    <td><p align="justify">Undang-Undang Republik Indonesia Nomor 17 Tahun 2011 tentang Intelijen Negara (Lembaran Negara Republik Indonesia Tahun 2011 Nomor 105, Tambahan Lembaran Negara Republik Indonesia Nomor 5249);</p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>3.</td>
    <td><p align="justify"><?php echo $dasar_point_3; ?></p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>4.</td>
    <td><p align="justify">Peraturan Presiden Nomor 38 Tahun 2010 tentang Organisasi dan Tata Kerja Kejaksaan Republik Indonesia;</p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>5.</td>
    <td><p align="justify">Peraturan Jaksa Agung Republik Indonesia Nomor : PER-009/A/JA/01/2011 Tahun 2011 sebagaimana telah diubah dengan Peraturan Jaksa Agung Republik Indonesia Nomor : PER-006/A/JA/3/2011 Tahun 2011 tentang Perubahan atas PER-009/A/JA/01/2011 tentang Organisasi dan Tata Kerja Kejaksaan Republik Indonesia;</p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>6.</td>
    <td><p align="justify">Peraturan Jaksa Agung Republik Indonesia Nomor : PER-024/A/JA/08/2014 Tahun 2014 tentang Administrasi Intelijen Kejaksaan Republik Indonesia;</p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>7.</td>
    <td><p align="justify"><?php echo $dasar_point_7; ?></p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Pertimbangan </td>
    <td>:</td>
    <td>a.</td>
    <td><p align="justify"><?php echo $pertimbangan_point_a; ?></p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>b.</td>
    <td><p align="justify">Bahwa untuk mendapatkan informasi/bahan keterangan/data tersebut, maka perlu dilakukan pengumpulan informasi/bahan keterangan/data;</p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>c.</td>
    <td><p align="justify">Bahwa untuk mewujudkan hal tersebut di atas, maka dipandang perlu dikeluarkan Surat Perintah Operasi Intelijen (Penyelidikan) Kepala Kejaksaan Negeri Makassar.</p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="center"><p align="center"><strong>M E M E R I N T A H K A N</strong></p></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
<?php 
$n=0;
foreach($rec_pelaksana->result() as $row) :  
$n++;
?>
  
  <tr>
    <td width="13%"><?php echo ($n==1)?"Kepada":""; ?> </td>
    <td width="2%"><?php echo ($n==1)?":":""; ?></td>
    <td width="3%"><?php echo $n; ?>. </td>
    <td width="12%">Nama</td>
    <td width="1%">:</td>
    <td width="69%"><?php echo $row->pelaksana_nama; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Pangkat</td>
    <td>:</td>
    <td><?php echo $row->pangkat_nama; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>NIP / NRP</td>
    <td>:</td>
    <td><?php echo $row->pelaksana_nip."/".$row->pelaksana_nrp; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Jabatan</td>
    <td>:</td>
    <td><?php echo $row->jabatan; 
	echo ($n>1)?" merangkap anggota tim":"";
	?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?php endforeach; ?>
</table>
<p>&nbsp;</p>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td width="13%">Untuk</td>
    <td width="1%">:</td>
    <td width="3%">1.</td>
    <td width="83%"><p align="justify">Melakukan penggalangan atas pengumpulan informasi bahan/ data keterangan (puldata / pulbaket) secara terbuka dan/atau tertutup (surveylance) terhadap kegiatan tersebut di atas;</p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>2.</td>
    <td><p align="justify">Melakukan penggalangan terhadap kegiatan wawancara, interogasi, pemeriksaan ataupun teknik intelijen lainnya dalam mencari informasi kepada pihak-pihak yang berkaitan dengan adanya informasi tersebut;</p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>3.</td>
    <td><p align="justify">Melakukan koordinasi dengan instansi terkait;</p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>4.</td>
    <td><p align="justify">Melaporkan hasil perkembangannya kepada Kepala Kejaksaan Negeri Makassar;</p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>5.</td>
    <td><p align="justify">Melaksanakan Surat Perintah Operasi Intelijen (Penggalangan) ini dalam waktu 30 (tiga puluh) hari kerja sejak tanggal dikeluarkan;</p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>6.</td>
    <td><p align="justify">Melaporkan hasil pelaksanaannya dalam tenggang waktu 7 (tujuh) hari kerja setelah Surat Perintah Operasi Intelijen (Penggalangan) selesai dilaksanakan.</p></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="16%">Kepada </td>
    <td width="2%">:</td>
    <td width="49%">Yang bersangkutan </td>
    <td width="13%">Dikeluarkan di </td>
    <td width="2%">: </td>
    <td width="18%">Makassar</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Untuk dilaksanakan</td>
    <td>Pada Tanggal</td>
    <td>:</td>
    <td><?php echo flipdate($penyelidikan_tgl); ?></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td width="59%">&nbsp;</td>
    <td width="41%" align="center"><strong>KEPALA KEJAKSAAN NEGERI MAKASSAR</strong></td>
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
    <td align="center"><strong><u><?php echo $setting->kajaksa_nama; ?></u></strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center"><?php echo $setting->kajaksa_pangkat; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">NIP : <?php echo $setting->kajaksa_nip; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">NRP : <?php echo $setting->kajaksa_nrp; ?></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2"><STRONG><U>TEMBUSAN</U></STRONG></td>
  </tr>
  <tr>
    <td width="3%">1. </td>
    <td width="97%"><p>YTH. KEPALA KEJAKSAAN TINGGI SULAWESI SELATAN;</p></td>
  </tr>
  <tr>
    <td>2.</td>
    <td><p>YTH. WAKIL KEPALA KEJAKSAAN TINGGI SULAWESI SELATAN;</p></td>
  </tr>
  <tr>
    <td>3.</td>
    <td><p>YTH. ASISTEN INTELIJEN KEJATI SULSEL;</p></td>
  </tr>
  <tr>
    <td>4.</td>
    <td><p>YTH. ASISTEN PENGAWASAN KEJATI SULSEL; </p></td>
  </tr>
  <tr>
    <td>5.</td>
    <td><strong><u>A R S I P</u></strong></td>
  </tr>
</table>
<p>&nbsp;</p>
