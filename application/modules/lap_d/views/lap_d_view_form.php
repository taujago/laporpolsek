<style type="text/css">
      .umur {
            width: 100px;
      }


</style>
<form id="formulir" method="post" action="<?php echo site_url("$controller/$action"); ?>">
<table class='table table-bordered' width="100%">
      <tr class="separator"> <td colspan="3"><strong>NOMOR LP</strong></td> 
      </tr>

      

        <tr>
          <td colspan="2">Tanggal </td>
          <td width="64%"><input type="text" class="tanggal form-control" name="tanggal" id="tanggal" placeholder="Tanggal" data-date-format="dd-mm-yyyy" />        </td>
      <tr>
        <td colspan="2">Nomor </td>
        <td><input readonly="readonly" type="text" class="form-control" name="nomor" id="nomor" placeholder="(auto generated)" />   </td>
      <tr>
        <td colspan="3"><strong>A. TEMPAT KEJADIAN/WAKTU</strong></td>
        <tr>
          <td width="3%">1.</td>
            <td width="33%">Apa yang terjadi</td>
            <td><input type="text" class="form-control" name="kejadian_apa" id="kejadian_apa" placeholder="Apa" />        </td>
      <tr>
            <td>2. </td>
            <td>Tempat</td>
            <td><input type="text" class="form-control" name="kejadian_tempat" id="kejadian_tempat" placeholder="Tempat" />        </td>

            <tr>
        <td> </td>
        <td>Provinsi </td>
        <td>
          <?php 
                  $arr_provinsi = $this->cm->get_arr_dropdown("tiger_provinsi", 
      "id","provinsi",'provinsi');

                  $arr_provinsi = add_arr_head($arr_provinsi,"x","= PILIH PROVINSI =");

                  echo form_dropdown("",$arr_provinsi,'','id="kejadian_id_provinsi" class="form-control" onchange="get_kota(this,\'#kejadian_id_kota\',1)"'); 
                  ?></td>

      <tr>
        <td> </td>
        <td>Kabupaten / Kota </td>
        <td>
            <?php
          echo form_dropdown("",array(),'','id="kejadian_id_kota" class="form-control" onchange="get_kecamatan(this,\'#kejadian_id_kecamatan\',1)"'); 
                ?>

          </td>

      <tr>
        <td> </td>
        <td>Kecamatan </td>
        <td>
            <?php echo form_dropdown("",array(),'','id="kejadian_id_kecamatan" class="form-control" onchange="get_desa(this,\'#kejadian_id_desa\',1)"'); 
                ?>

          </td>    

     <tr>
        <td> </td>
        <td>Desa / Kelurahan </td>
        <td>
            <?php 
                  

                  echo form_dropdown("kejadian_id_desa",array(),'','id="kejadian_id_desa" class="form-control" '); 
                ?>

          </td>  

            
      <tr>
        <td>3.</td>
        <td>Situasi tempat kejadian </td>
        <td>&nbsp;</td>

             



      <tr>
            <td>&nbsp;</td>
            <td>a. Daerah ramai atau sepi </td>
            <td><input type="text" class="form-control" name="kejadian_ramai_sepi" id="kejadian_ramai_sepi" placeholder="Kondisi Ramai / Sepi " />        </td>
      <tr>
            <td>&nbsp;</td>
            <td>b. Kondisi Bangunan </td>
            <td><input type="text" class="form-control" name="kejadian_kondisi_bangunan" id="kejadian_kondisi_bangunan" placeholder="Kondisi Bangunan " />        </td>
      <tr>
            <td>4. </td>
            <td>Tanggal Kejadian </td>
            <td><input type="text" class="tanggal form-control" name="kejadian_tanggal" id="kejadian_tanggal" placeholder="Tanggal Kejadian" data-date-format="dd-mm-yyyy" />        </td>
      <tr>
        <td>5. </td>
        <td> Apa Yang Terbakar </td>
            <td><textarea class="form-control" name="kejadian_apa_yang_terbakar" id="kejadian_apa_yang_terbakar"></textarea></td>
      <tr>
            <td>6.</td>
            <td>Daerah / Bagian yang terbakar </td>
            <td><textarea class="form-control" name="kajadian_bagian_yang_terbakar" id="kajadian_bagian_yang_terbakar"></textarea></td>
      <tr>
        <td>7.</td>
        <td> Tempat Timbul Api </td>
            <td><textarea class="form-control" name="kejadian_tempat_timbul_api" id="kejadian_tempat_timbul_api"></textarea></td>
      <tr>
            <td>8.</td>
            <td>Cara Meluas Api </td>
            <td><textarea class="form-control" name="kejadian_cara_meluas_api" id="kejadian_cara_meluas_api"></textarea></td>
      <tr>
        <td>9.</td>
        <td> Luas Terbakar </td>
            <td><textarea class="form-control" name="kejadian_luas_terbakar" id="kejadian_luas_terbakar"></textarea></td>
      <tr class="separator"> <td colspan="3"> <strong> B. CARA MENGATASI / MEMADAMKAN </strong></td> 
      </tr>
        <tr>
          <td>1.</td>
          <td> Dengan alat pemadam kebakaran</td>
            <td><input type="text" class="form-control" name="mengatasi_dengan_damkar" id="mengatasi_dengan_damkar" placeholder="Dengan Damkar" />        </td>
      <tr>
        <td>2.</td>
        <td>Cara biasa dengan air / pasir, dll. </td>
            <td><input type="text" class="form-control" name="mengatasi_cara_biasa" id="mengatasi_cara_biasa" placeholder="Cara Biasa" />        </td>
      <tr>
            <td>3.</td>
            <td>Jumlah unit barisan pemadam</td>
            <td><input type="text" class="form-control" name="mengatasi_unit_damkar" id="mengatasi_unit_damkar" placeholder="Jumlah Unit Damkar" />        </td>
      <tr class="separator"> <td colspan="3"> <strong> C. KORBAN / KERUGIAN </strong></td> 
      </tr>
       
        <tr>
          <td>1</td>
          <td> a. Pemilik Rumah / Kos </td>
            <td><input type="text" class="form-control" name="korban_pemilik_rumah" id="korban_pemilik_rumah" placeholder="Pemilik Rumah" />        </td>
      <tr>
        <td>&nbsp;</td>
        <td> b. Penghuni Rumah </td>
            <td><input type="text" class="form-control" name="korban_penghuni_rumah" id="korban_penghuni_rumah" placeholder="Penghuni Rumah" />        </td>
      <tr>
            <td>2.</td>
            <td>a. Mati </td>
            <td><table width="100%" border="0" cellpadding="0">
              <tr>
                <td width="6%">Laki:</td>
                <td width="12%"><input name="korban_mati_l" type="text" class="form-control" id="korban_mati_l"  value="0"  placeholder="Korban Mati Laki - Laki" style="width:50px;" /></td>
                <td width="14%">Perempuan</td>
                <td width="68%"><input name="korban_mati_p" type="text" class="form-control" id="korban_mati_p" value="0" maxlength="10" placeholder="Korban Mati Perempuan "  style="width:50px;"  /></td>
              </tr>
            </table></td>
      <tr>
            <td>&nbsp;</td>
            <td>b. Luka Berat </td>
            <td><table width="100%" border="0" cellpadding="0">
                <tr>
                  <td width="6%">Laki:</td>
                  <td width="12%"><input type="text" class="form-control" name="korban_luka_berat_l" id="korban_luka_berat_l" placeholder="Korban Luka Berat Laki - laki"  value="0"  style="width:50px;"/></td>
                  <td width="14%">Perempuan</td>
                  <td width="68%"><input type="text" class="form-control" name="korban_luka_berat_p" id="korban_luka_berat_p" placeholder="Korban Luka Berat Perempuan" value="0"  style="width:50px;" /></td>
                </tr>
              </table></td>
      <tr>
            <td>&nbsp;</td>
            <td>c. Luka Ringan </td>
            <td><table width="100%" border="0" cellpadding="0">
                <tr>
                  <td width="6%">Laki:</td>
                  <td width="12%"><input type="text" class="form-control" name="korban_luka_ringan_l" id="korban_luka_ringan_l" placeholder="Korban Luka Berat Laki - laki"  value="0"  style="width:50px;"/></td>
                  <td width="14%">Perempuan</td>
                  <td width="68%"><input type="text" class="form-control" name="korban_luka_ringan_p" id="korban_luka_ringan_p" placeholder="Korban Luka Berat Perempuan" value="0"  style="width:50px;" /></td>
                </tr>
              </table></td>
      <tr>
            <td>3. </td>
            <td>Sebab Meninggal </td>
            <td><input type="text" class="form-control" name="korban_sebab_mati" id="korban_sebab_mati" placeholder="Sebab Meninggal" />        </td>
      <tr>
        <td>4.</td>
        <td colspan="2">Kerugian Lainnya </td>
      <tr>
            <td>&nbsp;</td>
            <td>a. Hewan ternak / Material / Barang / Uang </td>
            <td><input type="text" class="form-control" name="korban_rugi_hewan" id="korban_rugi_hewan" placeholder="Kerugian Hewan " />        </td>
      <tr>
            <td>&nbsp;</td>
            <td>b. Seluruhnya dalam Jumlah </td>
            <td><input type="text" class="form-control" name="korban_seluruh_jumlah" id="korban_seluruh_jumlah" placeholder="Jumlah Keseluruhan" />        </td>
      <tr>
            <td>5</td>
            <td>Diasuransikan / Tdk. diasuransikan (Tgl asuransi ) </td>
            <td><input type="text" class="form-control" name="korban_asuransi" id="korban_asuransi" placeholder="Korban Memiliki Asuransi" />        </td>
         <tr class="separator"> <td colspan="3"> <strong> D. APAKAH TIDAKAN POLISI </strong></td> 
         </tr>
        <tr>
          <td>1.</td>
            <td>Tindakan Polisi </td>
            <td><input name="tindakan_polisi" type="text" class="form-control" id="tindakan_polisi" value="Mendatangi TKP, Mengamankan TKP, Mencari Saksi" placeholder="Jumlah Polisi" />        </td>
      <tr>
            <td>2.</td>
            <td>  Petugas yang mendatangi </td>
            <td><input name="tindakan_petugas" type="text" class="form-control" id="tindakan_petugas" value="Ka SPKT dan anggota jaga, piket Reskrim dan Piket Intelkam" placeholder="Jumlah  Petugas " />        </td>
      <tr>
            <td>3.</td>
            <td> Memeriksa saksi - saksi </td>
            <td><textarea class="form-control" name="tindakan_memeriksa_saksi" id="tindakan_memeriksa_saksi"></textarea></td>
         <tr class="separator"> <td colspan="3"> <b> E. TINDAKAN - TINDAKAN LAIN </b>  </td> 
         </tr>
        <tr>
          <td>&nbsp;</td>
          <td>1. Tindakan Lain </td>
            <td><input type="text" class="form-control" name="tindakan_lain" id="tindakan_lain" placeholder="Tindakan Lain" />        </td>
      <tr>
        <td>&nbsp;</td>
        <td>2. Menampung korban sementara </td>
            <td><input type="text" class="form-control" name="tindakan_lain_penampungan_korban" id="tindakan_lain_penampungan_korban" placeholder="Penampungan Korban" />        </td>
      <tr>
        <td>&nbsp;</td>
        <td>3. Pemberian bantuan Supply korban </td>
            <td><input type="text" class="form-control" name="tindakan_lain_bantu_supply_korban" id="tindakan_lain_bantu_supply_korban" placeholder="Bantu Supply Korban " />        </td>
        <tr class="separator"> <td colspan="3"> <strong> F. SEBAB - SEBAB KEBAKARAN </strong></td> 
        </tr>
        <tr>
          <td>1.</td>
          <td colspan="2">Kesengajaan </td>
        <tr>
          <td>&nbsp;</td>
          <td> a. Sabotase / Subversi / Politik </td>
            <td><input type="text" class="form-control" name="sebab_sengaja" id="sebab_sengaja" placeholder="Sengaja" />        </td>
      <tr>
        <td>&nbsp;</td>
        <td>  b. Balas Dendam </td>
            <td><input type="text" class="form-control" name="sebab_sengaja_balas_dendam" id="sebab_sengaja_balas_dendam" placeholder="Balas Dendam " />        </td>
      <tr>
        <td>&nbsp;</td>
        <td>c Menghilangkan Jejak </td>
            <td><input type="text" class="form-control" name="sebab_sengaja_menghilangkan_jejak" id="sebab_sengaja_menghilangkan_jejak" placeholder="Menghilangkan Jejak" />        </td>
      <tr>
        <td>&nbsp;</td>
        <td>c Karena Penyakit </td>
            <td><input type="text" class="form-control" name="sebab_sengaja_penyakit" id="sebab_sengaja_penyakit" placeholder="Penyakit" />        </td>
        <tr>
          <td>2. </td>
          <td>Kelalaian </td>
          <td>&nbsp;</td>
        <tr>
          <td>&nbsp;</td>
            <td>  a. Sebab - sebab aliran listrik </td>
            <td><input type="text" class="form-control" name="sebab_lalai_listrik" id="sebab_lalai_listrik" placeholder="Listrik" />        </td>
      <tr>
        <td>&nbsp;</td>
        <td>  b. Kompor / Kompor gas / Lilin / Rokok / Korek api </td>
            <td><input type="text" class="form-control" name="sebab_lalai_kompor" id="sebab_lalai_kompor" placeholder="Kompor" />        </td>
      <tr>
        <td>&nbsp;</td>
        <td>  c Dapur / Tungku </td>
            <td><input type="text" class="form-control" name="sebab_lalai_dapur" id="sebab_lalai_dapur" placeholder="Dapur" />        </td>
      <tr>
        <td>&nbsp;</td>
        <td>d. Barang Mudah Terbakar / Kimia </td>
            <td><input type="text" class="form-control" name="sebab_lalai_barang_mudah_terbakar" id="sebab_lalai_barang_mudah_terbakar" placeholder="Barang Mudah Terbakar" />        </td>
      <tr>
            <td>&nbsp;</td>
            <td>  e. Sebab - sebab lainnya</td>
            <td><input type="text" class="form-control" name="sebab_lalai_lain" id="sebab_lalai_lain" placeholder="Lainnya" />        </td>
        <tr>
          <td>3.</td>
          <td>Sebab - sebab alam </td>
          <td>&nbsp;</td>
        <tr>
          <td>&nbsp;</td>
          <td> a. Petir </td>
            <td><input type="text" class="form-control" name="sebab_alam_petir" id="sebab_alam_petir" placeholder="Petir" />        </td>
      <tr>
        <td>&nbsp;</td>
        <td> b. Matahari </td>
            <td><input type="text" class="form-control" name="sebab_alam_matahari" id="sebab_alam_matahari" placeholder="Matahari" />        </td>
      <tr>
            <td>&nbsp;</td>
            <td>c. Menyala dengan sendirinya </td>
            <td><input type="text" class="form-control" name="sebab_alam_menyala_sendiri" id="sebab_alam_menyala_sendiri" placeholder="Menyala Sendiri" />        </td>
      <tr>
        <td>4. </td>
        <td> Tidak diketahui </td>
            <td><input type="text" class="form-control" name="sebab_tidak_diketahui" id="sebab_tidak_diketahui" placeholder="Tidak Diketahui" />        </td>
        <tr class="separator"> <td colspan="3"> <strong> G. BUKTI - BUKTI / KETERANGAN YANG DIPEROLEH SERTA SAKSI SAKSI YANG DIDAPAT </strong></td> 
        </tr>
        <tr>
          <td>1.</td>
          <td> Bekas - bekas yang tertinggal </td>
            <td><input type="text" class="form-control" name="bukti_bekas_tertinggal" id="bukti_bekas_tertinggal" placeholder="Bekas Tertinggal" />        </td>
      <tr>
        <td>2.</td>
        <td>Alat yang diperkirakan untuk membakar s</td>
            <td><input type="text" class="form-control" name="bukti_alat_pembakar" id="bukti_alat_pembakar" placeholder="Alat Pembakar" />        </td>
      <tr>
        <td>3. </td>
        <td>Bahan bahan yang mudah terbakar </td>
            <td><input type="text" class="form-control" name="bukti_alat_mudah_terbakar" id="bukti_alat_mudah_terbakar" placeholder="Alat Mudah Terbakar" />        </td>
        <tr>
          <td>4.</td>
          <td colspan="2">Adakah bahan yang tidak sesuai </td>
        <tr>
          <td>&nbsp;</td>
          <td>a. Alat Menyala </td>
            <td><input type="text" class="form-control" name="bukti_tidak_sesuai_alat_menyala" id="bukti_tidak_sesuai_alat_menyala" placeholder="Alat Menyala" />        </td>
      <tr>
        <td>&nbsp;</td>
        <td>b. Alat Mudah Terbakar </td>
            <td><input type="text" class="form-control" name="bukti_tidak_sesuai_alat_mudah_terbakar" id="bukti_tidak_sesuai_alat_mudah_terbakar" placeholder="Alat Mudah Terbakar" />        </td>
      <tr>
        <td>&nbsp;</td>
        <td> c. Kertas / lain - lain mudah terbakar </td>
            <td><input type="text" class="form-control" name="bukti_tidak_sesuai_kertas" id="bukti_tidak_sesuai_kertas" placeholder="Kertas" />        </td>
      <tr>
        <td>&nbsp;</td>
        <td> d. Alat / Bhn Kimia / Farmasi / dll </td>
            <td><input type="text" class="form-control" name="bukti_tidak_sesuai_bhn_kimia" id="bukti_tidak_sesuai_bhn_kimia" placeholder="Bhn Kimia" />        </td>
      <tr>
        <td>4. </td>
        <td>Saksi yang didapat / pertama melihat </td>
            <td><input type="text" class="form-control" name="bukti_saksi_pertama" id="bukti_saksi_pertama" placeholder="Saksi Pertama" />        </td>
        <tr class="separator"> <td colspan="3"> <b> PENERIMA LAPORAN</b>  </td> </tr>
       
        <tr>
          <td colspan="2"> Nama </td>
          <td><input type="text" class="form-control" name="pen_lapor_nama" id="pen_lapor_nama" placeholder="Nama" />        </td>
      <tr>
        <td colspan="2">Pangkat </td>
        <td> <?php 
            echo form_dropdown("pen_lapor_id_pangkat",$arr_pangkat,'','class="form-control" id="pen_lapor_id_pangkat"');
            ?>            </td>
      <tr>
        <td colspan="2">NRP </td>
        <td><input type="text" class="form-control" name="pen_lapor_nrp" id="pen_lapor_nrp" placeholder="NRP" />        </td>
      <tr>
        <td colspan="2">Jabatan </td>
        <td><input type="text" class="form-control" name="pen_lapor_jabatan" id="pen_lapor_jabatan" placeholder="Jabatan" />        </td>
    <tr><td colspan='3'><button type="submit" class="btn btn-primary">SIMPAN </button> 
      <a href="<?php echo site_url('lap_d') ?>" class="btn btn-default">Cancel</a>
      <input type="hidden" name="mode" id="mode" value="<?php echo isset($mode)?$mode:""; ?>">
      <input type="hidden" name="lap_d_id" id="lap_d_id" value="<?php echo $lap_d_id; ?>" /> 
      </td></tr>
    </table>
     
</form>
 



<div class="modal fade" id="pasalmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Tambah Pasal Baru</h4>
      </div>
      <div class="modal-body">
        <form id="frmModalPasal" method="post" action="<?php echo site_url("$controller/pasal_simpan") ?>">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Fungsi Terkait:</label>
            <?php echo form_dropdown("txt_id_fungsi",$arr_fungsi,'','id="txt_id_fungsi" class="form-control"'); ?>
          </div>
          <div class="form-group">
            <label for="txt_pasal" class="control-label">Pasal:</label>
            <textarea class="form-control" id="txt_pasal" name="txt_pasal"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary" onclick="return pasal_simpan();"  >Simpan</button>
      </div>
    </div>
  </div>
</div>



<?php $this->load->view($controller."_view_form_js");?>
<?php $this->load->view("js/general_js") ?> 