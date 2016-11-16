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
    <td>&nbsp;</td>
    <td>&nbsp; </td>
  </tr>
  <tr>
    <td>&quot;PROJUSTITIA&quot;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center"><img width="60px" height="60px" src="<?php  echo base_url(); ?>assets/images/logo.png" /></td>
  </tr>
  <tr>
    <td colspan="3" align="center"><H2><U> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;LAPORAN POLISI &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</U></H2> </td>
  </tr>
  <tr>
    <td colspan="3" align="center">NOMOR : <?php echo $nomor; ?></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="100%" border="0" cellpadding="0">
  <tr>
    <td width="100%">-- Pada hari ini <?php echo flipdate($tanggal)." sekitar jam ".$jam_dilaporkan ?> WIB, Saya : </td>
  </tr>
  <tr>
    <td align="center"><strong><?php echo $mengetahui_nama ?></strong></td>
  </tr>
  <tr>
    <td>Pangkat <?php echo $meng_pangkat." NRP ".$mengetahui_nrp." Sebagai ".$mengetahui_jabatan." Pada ".$pelapor_kesatuan ?> pada kantor tersebut diatas telah menerima Laporan Kecelakaan Lalu Lintas dari <?php echo $pelapor_pangkat.' '.$pelapor_nama.' Anggota PJR Induk Serang dengan hasil sebagai berikut.'; ?>.</td>
  </tr>
</table>
<br/>&nbsp;
<br/>&nbsp;
<table width="100%" border="0.4" cellpadding="3">
  <tr>
    <td width="4%">01</td>
    <td width="26%" align="justify">Hari, Tanggal, Jam, TKP Terjadinya Kecelakaan Lalu Lintas.</td>
    <td width="70%"><?php echo flipdate($kp_tanggal).' sekira jam '.$kp_waktu.' WIB, di '.$kp_tempat_kejadian.' Desa/Kel. '.$desa.' Kec. '.$kecamatan.' Kota '.$kota  ?></td>
  </tr>
  <tr>
    <td width="4%">02</td>
    <td width="26%" align="justify">Kendaraan Yang Terlibat Laka Lantas (Identitas Ran. : No. Pol. No. STNK, Jenis, Model, Merk, Type, Tahun Pembuatan, CC Slinder, No. Rangka, No. Rangka, No. Mesin, Plat Dasar, Kondisi Ban (Baik, Gundul, Vulknisir, Pecah).</td>
    <td width="70%">
      <table width="100%" border="0" cellpadding="3">

      <?php 
      $no = 0;
      foreach($kendaraan->result() as $row) :  
        $no++;
        ?>
        <tr>
          <td width="5%"><?php echo $no ?></td>
          <td width="95%"><b>Kend. <?php echo $row->merk.' '.$row->tipe ?></b></td>
        </tr>
        <tr>
          <td width="5%">&nbsp;</td>
          <td width="95%"><?php echo $row->no_polisi.', '.$row->no_stnk.', '.$row->jenis.', '.$row->model.', '.$row->merk.', '.$row->tipe.', '.$row->tahun_buat.', '.$row->vol_silinder.', '.$row->no_rangka.', '.$row->no_mesin.', '.$row->warna_tnkb.', '.$row->kondisi_ban ?></td>
        </tr>
        <?php endforeach; ?>
      </table>
    </td>
  </tr>
  <tr>
    <td width="4%">03</td>
    <td width="26%" align="justify">Identitas Pengemudi Yang Terlibat Kecelakaan Lalu Lintas (Nama, Jenis Kelamin, Tempat/Tanggal Lahir, Kewarganegaraan, Agama, Pekerjaan, Pendidikan Terakhir, Alamat Sekarang).</td>
    <td width="70%">
      <table width="100%" border="0" cellpadding="3">

      <?php 
      $no = 0;
      foreach($pengemudi->result() as $row) :  
        $no++;
        if ($row->pengemudi_jk=='L') {
          $gender = "Laki-laki";
        }else{
          $gender = "Perempuan";
        }
        ?>
        <tr>
          <td width="5%"><?php echo $no ?></td>
          <td width="95%"><b>&nbsp;</b></td>
        </tr>
        <tr>
          <td width="5%">&nbsp;</td>
          <td width="95%"><?php echo '<b>'.$row->pengemudi_nama.'</b>, '.$gender.', '.flipdate($row->pengemudi_tgl_lahir).', '.$row->pengemudi_wn.', '.$row->agama.', '.$row->pekerjaan.', '.$row->pendidikan.', '.$row->pengemudi_alamat.' Desa/Kel. '.$row->desa.' Kec. '.$row->kecamatan.' Kabupaten/Kota '.$row->kota.' Provinsi. '.$row->provinsi.' ' ?></td>
        </tr>
        <?php endforeach; ?>
      </table>
    </td>
  </tr>
  <tr>
    <td width="4%">04</td>
    <td width="26%" align="justify">Identitas Korban akibat Laka Lantas Nama, Jenis Kelamin, Tempat/Tanggal Lahir, Agama, Pekerjaan, Kewarganegaraan, Alamat Sekarang, <b>MD</b>, <b>LB</b>, <b>LR</b>.</td>
    <td width="70%">
      <table width="100%" border="0" cellpadding="3">

      <?php 
      $no = 0;
      foreach($korban->result() as $row) :  
        $no++;
        if ($row->korban_jk=='L') {
          $gender = "Laki-laki";
        }else{
          $gender = "Perempuan";
        }
        ?>
        <tr>
          <td width="5%"><?php echo $no ?></td>
          <td width="95%"><?php echo '<b>'.$row->korban_nama.'</b>, '.$gender.', '.flipdate($row->korban_tgl_lahir).', '.$row->korban_wn.', '.$row->agama.', '.$row->pekerjaan.', '.$row->pendidikan.', '.$row->korban_alamat.' Desa/Kel. '.$row->desa.' Kec. '.$row->kecamatan.' Kabupaten/Kota '.$row->kota.' Provinsi. '.$row->provinsi.'. (<b>'.$row->korban_cidera.'</b>)' ?></td>
        </tr>
        
        <?php endforeach; ?>
      </table>
    </td>
  </tr>
  <tr>
    <td width="4%">05</td>
    <td width="26%" align="justify">Keadaan Jasmani dan Rohani Pengemudi Sebelum Terjadi Laka Lantas.</td>
    <td width="70%"></td>
  </tr>
  <tr>
    <td width="4%">06</td>
    <td width="26%" align="justify">Keadaan Lingkungan, Jalan, Cuaca, dan Arus Lalu Lintas ditempat kejadian Laka Lantas, sewaktu kejadian.</td>
    <td width="70%"><?php echo $kp_keadaan_jalan_cuaca ?></td>
  </tr>
  <tr>
    <td width="4%">07</td>
    <td width="26%" align="justify">Administrasi pengemudi dan kelengkapan dan kondisi kendaraan sebelum terjadi Laka Lantas (SIM, STNK, dsb).</td>
    <td width="70%"></td>
  </tr>
  <tr>
    <td width="4%">08</td>
    <td width="26%" align="justify">Bentuk Kecelakaan Lalu Lintas.</td>
    <td width="70%">1. Tabrak Depan 2. Tabrak Sisi 3. Tabrak Massal/Beruntun 4. Lepas Kendali 5. Tabrak Menyudut 6. Tabrak Lari 7. Tabrak Belakang</td>
  </tr>
  <tr>
    <td width="4%">09</td>
    <td width="26%" align="justify">Modus Operandi.</td>
    <td width="70%">1. Mendahului 2. Tidak Jaga Jarak 3. Kecepatan Tinggi 4. Melanggar</td>
  </tr>
  <tr>
    <td width="4%">10</td>
    <td width="26%" align="justify">Saksi-saksi : <br/> Nama, Jenis Kelamin, Tempat/tanggal Lahir, Agama, Pekerjaan Kewarganegaraan, Alamat Sekarang.</td>
    <td width="70%">
      <table width="100%" border="0" cellpadding="3">

      <?php 
      $no = 0;
      foreach($saksi->result() as $row) :  
        $no++;
        if ($row->saksi_jk=='L') {
          $gender = "Laki-laki";
        }else{
          $gender = "Perempuan";
        }
        ?>
        <tr>
          <td width="5%"><?php echo $no ?></td>
          <td width="95%"><?php echo '<b>'.$row->saksi_nama.'</b>, '.$gender.', '.flipdate($row->saksi_tgl_lahir).', '.$row->saksi_wn.', '.$row->agama.', '.$row->pekerjaan.', '.$row->saksi_alamat.' Desa/Kel. '.$row->desa.' Kec. '.$row->kecamatan.' Kabupaten/Kota '.$row->kota.' Provinsi. '.$row->provinsi ?></td>
        </tr>
        
        <?php endforeach; ?>
      </table>
    </td>
  </tr>
  <tr>
    <td width="4%">11</td>
    <td width="26%" align="justify">Tersangka <br/>Nama, Jenis Kelamin, Tempat/tanggal Lahir, Agama, Pekerjaan, Kewarganegaraan, Pendidikan Terakhir, Alamat Sekarang.</td>
    <td width="70%">
      <table width="100%" border="0" cellpadding="3">

      <?php 
      $no = 0;
      foreach($tersangka->result() as $row) :  
        $no++;
        if ($row->pengemudi_jk=='L') {
          $gender = "Laki-laki";
        }else{
          $gender = "Perempuan";
        }
        ?>
        <tr>
          <td width="5%"><?php echo $no ?></td>
          <td width="95%"><?php echo '<b>'.$row->pengemudi_nama.'</b>, '.$gender.', '.flipdate($row->pengemudi_tgl_lahir).', '.$row->pengemudi_wn.', '.$row->agama.', '.$row->pekerjaan.', '.$row->pendidikan.', '.$row->pengemudi_alamat.' Desa/Kel. '.$row->desa.' Kec. '.$row->kecamatan.' Kabupaten/Kota '.$row->kota.' Provinsi. '.$row->provinsi ?></td>
        </tr>
        
        <?php endforeach; ?>
      </table>
    </td>
  </tr>
  <tr>
    <td width="4%">12</td>
    <td width="96%" align="justify" colspan="2"><b>Uraian Singkat Kejadian Laka Lantas</b><br/> <?php echo $kp_uraian ?></td>
  </tr>
  <tr>
    <td width="4%">13</td>
    <td width="26%" align="justify">Kerusakan Kendaraan Akibat Kecelakaan Lalulintas, atau benda lain (Rumah, Tiang Listrik dan Telepon)</td>
    <td width="70%"><?php echo $kp_kerusakan ?></td>
  </tr>
  <tr>
    <td width="4%">14</td>
    <td width="26%" align="justify">Kerugian dinilai dengan Uang</td>
    <td width="70%">Rp. <?php echo $kp_perkiraan_rugi ?></td>
  </tr>
  <tr>
    <td width="4%">15</td>
    <td width="26%" align="justify">Barang Bukti yang disita</td>
    <td width="70%"></td>
  </tr>
  <tr>
    <td width="4%">16</td>
    <td width="26%" align="justify">Melanggar Pasal</td>
    <td width="70%">
      <table width="100%" border="0" cellpadding="3">

      <?php 
      $no = 0;
      foreach($pasal->result() as $row) :  
        ?>
        <tr>
          <td width="100%"><?php echo $row->pasal ?></td>
        </tr>
        
        <?php endforeach; ?>
      </table>
    </td>
  </tr>
  <tr>
    <td width="4%">17</td>
    <td width="26%" align="justify">Orang yang ditahan</td>
    <td width="70%"><?php $kp_orang_ditahan ?></td>
  </tr>
</table>
<br/>
<table width="100%" border="0" cellpadding="3">
  <tr>
    <td width="100%">Demikian Laopran Polisi ini dibuat dengan sebenarnya atas kekuatan sumpah jabatan, kemudian ditutup dan ditanda tangani di Serang pada hari, tanggal, bulan dan tahun tesebut diatas</td>
  </tr>
</table>




<table width="100%" border="0" cellpadding="0">
  <tr>
    <td width="47%">&nbsp;</td>
    <td width="53%" align="center">Yang Membuat Laporan Polisi</td>
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
    <td align="center">Serang, <?php echo tgl_indo(flipdate($tanggal)) ?></td>
    <td align="center">&nbsp; </td>
  </tr>
  <tr>
    <td align="center">a.n DIREKTUR LALU LINTAS POLDA BANTEN</td>
    <td align="center"><u><?php echo $mengetahui_nama; ?></u></td>
  </tr>
  <tr>
    <td align="center">u.b</td>
    <td align="center"><?php echo $meng_pangkat.' NRP. '.$mengetahui_nrp; ?></td>
  </tr>
  <tr>
    <td align="center"><?php echo $setting->ttd_jabatan; ?></td>
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
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><u><?php echo $setting->ttd_nama; ?></u></td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><?php echo $setting->ttd_nrp; ?></td>
    <td align="center">&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
