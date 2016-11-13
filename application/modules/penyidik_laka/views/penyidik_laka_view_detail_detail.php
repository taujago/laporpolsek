<p> </p>
  <table class="table table-bordered">
    <tr class="separator">
      <td colspan="2"><b> LP - Laka Lantas <b></td>
    </tr>
    <tr>
      <td width="161">Tanggal LP</td>
      <td width="516"><?php echo $tanggal; ?></td>
    </tr>
    <tr>
      <td width="161">Nomor</td>
      <td width="516"><?php echo $nomor ?></td>
    </tr>
    <tr>
      <td width="161">Jam Dilaporkan</td>
      <td width="516"><?php echo $jam_dilaporkan ?></td>
    </tr>
    <tr class="separator">
      <td colspan="2"><b> Pelapor <b></td>
    </tr>
    <tr>
      <td width="161">Nama Pelapor</td>
      <td width="516"><?php echo $pelapor_nama ?></td>
    </tr>
    <tr>
      <td width="161">Pangkat Pelapor</td>
      <td width="516"><?php echo $pelapor_pangkat; ?></td>
    </tr>
    <tr>
      <td width="161">NRP</td>
      <td width="516"><?php echo $pelapor_nrp; ?></td>
    </tr>
    <tr>
      <td width="161">Pelapor Jabatan</td>
      <td width="516"><?php echo $pelapor_jabatan ?></td>
    </tr>
    <tr>
      <td width="161">Pelapor Kesatuan</td>
      <td width="516"><?php  echo $pelapor_kesatuan; ?></td>
    </tr>
    <tr class="separator">
      <td colspan="2"><b>Peristiwa Yang Terjadi <b> </td>
    </tr>
    <tr>
      <td width="161">Tanggal Kejadian</td>
      <td width="516"><?php echo $kp_tanggal ?></td>
    </tr>
    <tr>
      <td width="161">Waktu Kejadian</td>
      <td width="516"><?php echo $kp_waktu ?></td>
    </tr>
    <tr>
      <td width="161">Tempat Kejadian</td>
      <td width="516"><?php echo $kp_tempat_kejadian ." - ". $desa." - ". $kecamatan." - ". $kota." - ". $provinsi; ?></td></td>
    </tr>
    <tr>
      <td width="161">Apa Yang Terjadi</td>
      <td width="516"><?php echo $kp_apa_yang_terjadi; ?></td></td>
    </tr>
    <tr>
      <td width="161">Keadaan Jalan/Cuaca</td>
      <td width="516"><?php echo $kp_keadaan_jalan_cuaca; ?></td></td>
    </tr>
    <tr>
      <td width="161">Pengendara Motor / Pengemudi Mobil serta penumpang</td>
      <td width="516"><?php echo $kp_pengendara_mobil_motor; ?></td></td>
    </tr>
    <tr>
      <td width="161">Kerusakan Benda/Kendaraan</td>
      <td width="516"><?php echo $kp_kerusakan ?></td></td>
    </tr>
    <tr>
      <td width="161">Perkiraan Kerugian (Rp).</td>
      <td width="516"><?php echo $kp_perkiraan_rugi; ?></td>
    </tr>
    <tr>
      <td width="161">Uraian Singkat yang dilaporkan:</td>
      <td width="516"><?php echo $kp_uraian ?></td></td>
    </tr>
    <tr>
      <td width="161">Kesimpulan Sementara</td>
      <td width="516"><?php echo $kp_kesimpulan ?></td></td>
    </tr>
    <tr>
      <td width="161">Tipe Kecelakaan</td>
      <td width="516"><?php echo $kp_tipe_kecelakaan ?></td>
    </tr>
    <tr>
      <td width="161">Pengendara/Pembonceng Pakai Helm?</td>
      <td width="516"><?php echo $kp_pengedara_helm ?></td>
    </tr>
    <tr>
      <td width="161">Pasal </td>
      <td width="516"><?php echo $kp_pasal ?></td>
    </tr>
    <tr>
      <td width="161">Orang Yang ditahan:</td>
      <td width="516"><?php echo $kp_orang_ditahan ?></td></td>
    </tr>
    <tr class="separator">
      <td colspan="2"><b> Identitas Pengemudi <b></td>
    </tr>
    <tr> 
      <td colspan="2"><br><br>
        <table width="100%"  border="0" class="table table-striped table-bordered table-hover dataTable no-footer" id="pengemudi2" role="grid">
          <thead>
            <tr >
              <th width="15%">NAMA</th>
              <th width="5%">JK</th>
              <th width="10%">TGL. LAHIR</th>
              <th width="15%">PEKERJAAN</th>
              <th width="10%">AGAMA</th>
              <th width="25%">ALAMAT</th>
               
              </tr>   
          </thead>
        </table>      </td>
    </tr>
    <tr class="separator">
      <td colspan="2"><b> Saksi <b></td>
    </tr>
    <tr> 
      <td colspan="2"><br><br>
        <table width="100%"  border="0" class="table table-striped table-bordered table-hover dataTable no-footer" id="saksi2" role="grid">
          <thead>
            <tr >
              <th width="15%">NAMA</th>
              <th width="5%">JK</th>
              <th width="10%">TGL. LAHIR</th>
              <th width="15%">PEKERJAAN</th>
              <th width="10%">AGAMA</th>
              <th width="25%">ALAMAT</th>
               
              </tr>   
          </thead>
        </table>      </td>
    </tr>
    <tr class="separator">
      <td colspan="2"><b> Korban <b></td>
    </tr>
    <tr> 
      <td colspan="2"><br><br>
        <table width="100%"  border="0" class="table table-striped table-bordered table-hover dataTable no-footer" id="korban2" role="grid">
          <thead>
            <tr >
              <th width="15%">NAMA</th>
              <th width="5%">JK</th>
              <th width="10%">TGL. LAHIR</th>
              <th width="15%">PEKERJAAN</th>
              <th width="10%">AGAMA</th>
              <th width="25%">ALAMAT</th>
              <th width="25%">Cedera</th>
              <th width="25%">Tempat Dirawat</th>
               
              </tr>   
          </thead>
        </table>      </td>
    </tr>
    
    
   <tr class="separator">
      <td colspan="2"><b> Identitas Kendaraan yang terlibat Laka <b></td>
    </tr>
    <tr> 
      <td colspan="2"><br>
        <br>
        <table width="100%"  border="0" class="table table-striped table-bordered table-hover dataTable no-footer" id="kendaraan2" role="grid">
          <thead>
            <tr >
              <th width="14%">NOPOL</th>
              <th width="11%">JENIS</th>
              <th width="10%">TIPE </th>
              <th width="13%">MODEL</th>
              <th width="20%">TAHUN BUAT</th>
              <th width="18%">KONDISI BAN</th>
               
            </tr>   
          </thead>
        </table>      </td>
    </tr>  
    
    
    
    <tr class="separator">
      <td colspan="2"><b> Mengetahui <b></td>
    </tr>
    <tr>
      <td width="161">Nama </td>
      <td width="516"><?php echo $mengetahui_nama ?></td>
    </tr>
    <tr>
      <td width="161">Pangkat </td>
      <td width="516"><?php // echo $pen_lapor_pangkat; ?></td>
    </tr>
    <tr>
      <td width="161">NRP </td>
      <td width="516"><?php echo $mengetahui_nrp; ?></td>
    </tr>
    <tr>
      <td width="161">Jabatan </td>
      <td width="516"><?php echo $mengetahui_jabatan; ?></td>
    </tr>
    <tr>
      <td colspan='2'>&nbsp;</td>
    </tr>
  </table>


<!-- Modal Add Pengemudi -->
<!-- Modal Saksi -->
<div class="modal fade" id="saksi_modal" tabindex="-1" role="dialog" aria-labelledby="saksiModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header"></div>
    </div>
  </div>
</div>


  <div class="modal fade" id="kendaraan_modal" tabindex="-1" role="dialog" aria-labelledby="kendaraanModal"><div class="modal-dialog" role="document"><div class="modal-content"></div>
    </div>
  </div>

<?php 
// $this->load->view($controller."_view_form_js");

?>

