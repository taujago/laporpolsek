<p>
</p>
<table class='table table-bordered' width="100%">
      <tr class="separator"> <td colspan="3"><strong>NOMOR LP</strong></td> 
      </tr>

      

        <tr>
          <td colspan="2">Tanggal </td>
          <td width="64%"><?php echo $tanggal ?>        </td>
      <tr>
        <td colspan="2">Nomor </td>
        <td><?php echo $nomor ?> </td>
      <tr>
        <td colspan="3"><strong>A. TEMPAT KEJADIAN/WAKTU</strong></td>
        <tr>
          <td width="3%">1.</td>
            <td width="33%">Apa yang terjadi</td>
          <td><?php echo $kejadian_apa ?> </td>
      <tr>
            <td>2. </td>
            <td>Tempat</td>
        <td><?php echo $kejadian_tempat; ?> </td>
      <tr>
        <td>3.</td>
        <td>Situasi tempat kejadian </td>
        <td>&nbsp;</td>
      <tr>
            <td>&nbsp;</td>
            <td>a. Daerah ramai atau sepi </td>
        <td><?php echo $kejadian_ramai_sepi ?> </td>
      <tr>
            <td>&nbsp;</td>
            <td>b. Kondisi Bangunan </td>
        <td><?php echo $kejadian_kondisi_bangunan ?> </td>
      <tr>
            <td>4. </td>
            <td>Tanggal Kejadian </td>
        <td><?php echo $kejadian_tanggal ?> </td>
      <tr>
        <td>5. </td>
        <td> Apa Yang Terbakar </td>
        <td><?php echo $kejadian_apa_yang_terbakar; ?></td>
      <tr>
            <td>6.</td>
            <td>Daerah / Bagian yang terbakar </td>
        <td><?php echo $kajadian_bagian_yang_terbakar ?></td>
      <tr>
        <td>7.</td>
        <td> Tempat Timbul Api </td>
        <td><?php echo $kejadian_tempat_timbul_api ?></td>
      <tr>
            <td>8.</td>
            <td>Cara Meluas Api </td>
        <td><?php echo $kejadian_cara_meluas_api ?></td>
      <tr>
        <td>9.</td>
        <td> Luas Terbakar </td>
        <td><?php echo $kejadian_luas_terbakar; ?></td>
      <tr class="separator"> <td colspan="3"> <strong> B. CARA MENGATASI / MEMADAMKAN </strong></td> 
      </tr>
        <tr>
          <td>1.</td>
          <td> Dengan alat pemadam kebakaran</td>
          <td><?php echo $mengatasi_dengan_damkar ?> </td>
      <tr>
        <td>2.</td>
        <td>Cara biasa dengan air / pasir, dll. </td>
        <td><?php echo $mengatasi_cara_biasa ?> </td>
      <tr>
            <td>3.</td>
            <td>Jumlah unit barisan pemadam</td>
        <td><?php echo $mengatasi_unit_damkar; ?> </td>
      <tr class="separator"> <td colspan="3"> <strong> C. KORBAN / KERUGIAN </strong></td> 
      </tr>
       
        <tr>
          <td>1</td>
          <td> a. Pemilik Rumah / Kos </td>
          <td><?php echo $korban_pemilik_rumah ?> </td>
      <tr>
        <td>&nbsp;</td>
        <td> b. Penghuni Rumah </td>
        <td><?php echo $korban_penghuni_rumah; ?> </td>
      <tr>
            <td>2.</td>
            <td>a. Mati </td>
            <td><table width="100%" border="0" cellpadding="0">
              <tr>
                <td width="6%">Laki:</td>
                <td width="12%"><?php echo $korban_mati_l ?></td>
                <td width="14%">Perempuan</td>
                <td width="68%"><?php echo $korban_mati_p; ?></td>
              </tr>
            </table></td>
      <tr>
            <td>&nbsp;</td>
            <td>b. Luka Berat </td>
            <td><table width="100%" border="0" cellpadding="0">
                <tr>
                  <td width="6%">Laki:</td>
                  <td width="12%"><?php echo $korban_luka_berat_l; ?></td>
                  <td width="14%">Perempuan</td>
                  <td width="68%"><?php echo $korban_luka_berat_p; ?></td>
                </tr>
              </table></td>
      <tr>
            <td>&nbsp;</td>
            <td>c. Luka Ringan </td>
            <td><table width="100%" border="0" cellpadding="0">
                <tr>
                  <td width="6%">Laki:</td>
                  <td width="12%"><?php echo $korban_luka_ringan_l ?></td>
                  <td width="14%">Perempuan</td>
                  <td width="68%"><?php echo $korban_luka_ringan_p ?></td>
                </tr>
              </table></td>
      <tr>
            <td>3. </td>
            <td>Sebab Meninggal </td>
        <td><?php echo $korban_sebab_mati ?> </td>
      <tr>
        <td>4.</td>
        <td colspan="2">Kerugian Lainnya </td>
      <tr>
            <td>&nbsp;</td>
            <td>a. Hewan ternak / Material / Barang / Uang </td>
        <td><?php echo $korban_rugi_hewan ?> </td>
      <tr>
            <td>&nbsp;</td>
            <td>b. Seluruhnya dalam Jumlah </td>
        <td><?php echo $korban_seluruh_jumlah ?> </td>
      <tr>
            <td>5</td>
            <td>Diasuransikan / Tdk. diasuransikan (Tgl asuransi ) </td>
        <td><?php echo $korban_asuransi ?> </td>
         <tr class="separator"> <td colspan="3"> <strong> D. APAKAH TIDAKAN POLISI </strong></td> 
         </tr>
        <tr>
          <td>1.</td>
            <td>Tindakan Polisi </td>
          <td><?php echo $tindakan_polisi ?> </td>
      <tr>
            <td>2.</td>
            <td>  Petugas yang mendatangi </td>
        <td><?php echo $tindakan_petugas ?> </td>
      <tr>
            <td>3.</td>
            <td> Memeriksa saksi - saksi </td>
        <td><?php echo $tindakan_memeriksa_saksi ?></td>
         <tr class="separator"> <td colspan="3"> <b> E. TINDAKAN - TINDAKAN LAIN </b>  </td> 
         </tr>
        <tr>
          <td>&nbsp;</td>
          <td>1. Tindakan Lain </td>
            <td><?php echo $tindakan_lain ?> </td>
      <tr>
        <td>&nbsp;</td>
        <td>2. Menampung korban sementara </td>
            <td><?php echo $tindakan_lain_penampungan_korban ?> </td>
      <tr>
        <td>&nbsp;</td>
        <td>3. Pemberian bantuan Supply korban </td>
            <td><?php echo $tindakan_lain_bantu_supply_korban ?> </td>
        <tr class="separator"> <td colspan="3"> <strong> F. SEBAB - SEBAB KEBAKARAN </strong></td> 
        </tr>
        <tr>
          <td>1.</td>
          <td colspan="2">Kesengajaan </td>
        <tr>
          <td>&nbsp;</td>
          <td> a. Sabotase / Subversi / Politik </td>
            <td><?php echo $sebab_sengaja ?> </td>
      <tr>
        <td>&nbsp;</td>
        <td>  b. Balas Dendam </td>
            <td><?php echo $sebab_sengaja_balas_dendam ?> </td>
      <tr>
        <td>&nbsp;</td>
        <td>c Menghilangkan Jejak </td>
        <td><?php echo $sebab_sengaja_menghilangkan_jejak ?> </td>
      <tr>
        <td>&nbsp;</td>
        <td>c Karena Penyakit </td>
        <td><?php echo $sebab_sengaja_penyakit ?> </td>
        <tr>
          <td>2. </td>
          <td>Kelalaian </td>
          <td>&nbsp;</td>
        <tr>
          <td>&nbsp;</td>
            <td>  a. Sebab - sebab aliran listrik </td>
          <td><?php echo $sebab_lalai_listrik ?> </td>
      <tr>
        <td>&nbsp;</td>
        <td>  b. Kompor / Kompor gas / Lilin / Rokok / Korek api </td>
        <td><?php echo $sebab_lalai_kompor ?> </td>
      <tr>
        <td>&nbsp;</td>
        <td>  c Dapur / Tungku </td>
        <td><?php echo $sebab_lalai_dapur ?> </td>
      <tr>
        <td>&nbsp;</td>
        <td>d. Barang Mudah Terbakar / Kimia </td>
        <td><?php echo $sebab_lalai_barang_mudah_terbakar ?> </td>
      <tr>
            <td>&nbsp;</td>
            <td>  e. Sebab - sebab lainnya</td>
        <td><?php echo $sebab_lalai_lain ?> </td>
        <tr>
          <td>3.</td>
          <td>Sebab - sebab alam </td>
          <td>&nbsp;</td>
        <tr>
          <td>&nbsp;</td>
          <td> a. Petir </td>
          <td><?php echo $sebab_alam_petir ?> </td>
      <tr>
        <td>&nbsp;</td>
        <td> b. Matahari </td>
        <td><?php echo $sebab_alam_matahari ?> </td>
      <tr>
            <td>&nbsp;</td>
            <td>c. Menyala dengan sendirinya </td>
        <td><?php echo $sebab_alam_menyala_sendiri ?> </td>
      <tr>
        <td>4. </td>
        <td> Tidak diketahui </td>
        <td><?php echo $sebab_tidak_diketahui ?> </td>
        <tr class="separator"> <td colspan="3"> <strong> G. BUKTI - BUKTI / KETERANGAN YANG DIPEROLEH SERTA SAKSI SAKSI YANG DIDAPAT </strong></td> 
        </tr>
        <tr>
          <td>1.</td>
          <td> Bekas - bekas yang tertinggal </td>
          <td><?php echo $bukti_bekas_tertinggal ?> </td>
      <tr>
        <td>2.</td>
        <td>Alat yang diperkirakan untuk membakar s</td>
        <td><?php echo $bukti_alat_pembakar ?> </td>
      <tr>
        <td>3. </td>
        <td>Bahan bahan yang mudah terbakar </td>
        <td><?php echo $bukti_alat_mudah_terbakar ?> </td>
        <tr>
          <td>4.</td>
          <td colspan="2">Adakah bahan yang tidak sesuai </td>
        <tr>
          <td>&nbsp;</td>
          <td>a. Alat Menyala </td>
          <td><?php echo $bukti_tidak_sesuai_alat_menyala ?> </td>
      <tr>
        <td>&nbsp;</td>
        <td>b. Alat Mudah Terbakar </td>
        <td><?php echo $bukti_tidak_sesuai_alat_mudah_terbakar ?> </td>
      <tr>
        <td>&nbsp;</td>
        <td> c. Kertas / lain - lain mudah terbakar </td>
        <td><?php echo $bukti_tidak_sesuai_kertas ?> </td>
      <tr>
        <td>&nbsp;</td>
        <td> d. Alat / Bhn Kimia / Farmasi / dll </td>
        <td><?php echo $bukti_tidak_sesuai_bhn_kimia ?> </td>
      <tr>
        <td>4. </td>
        <td>Saksi yang didapat / pertama melihat </td>
        <td><?php echo $bukti_saksi_pertama ?> </td>
        <tr class="separator"> <td colspan="3"> <b> PENERIMA LAPORAN</b>  </td> </tr>
       
        <tr>
          <td colspan="2"> Nama </td>
          <td><?php echo $pen_lapor_nama ?> </td>
      <tr>
        <td colspan="2">Pangkat </td>
        <td><?php echo $pen_lapor_pangkat; ?></td>
      <tr>
        <td colspan="2">NRP </td>
        <td><?php echo $pen_lapor_nrp ?> </td>
      <tr>
        <td colspan="2">Jabatan </td>
        <td><?php echo $pen_lapor_jabatan; ?> </td>
        </table>