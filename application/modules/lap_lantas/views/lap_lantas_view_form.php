<link href="<?php echo base_url("assets") ?>/css/jquery.dataTables.css" rel="stylesheet">
<link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">

<script src="<?php echo base_url("assets") ?>/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url("assets") ?>/js/jquery.loadJSON.js"></script>


<style type="text/css">
      .umur {
            width: 100px;
      }

   .dataTables_filter {
      display: none;
    }

.datepicker{z-index:9999 !important}
</style>

<form id="formulir" method="post" action="<?php echo site_url("$controller/$action"); ?>">
  <table class="table table-bordered">
    <tr class="separator">
      <td colspan="2"><b> LP - Laka Lantas <b></td>
    </tr>
    <tr>
      <td width="161">Tanggal LP</td>
      <td width="516"><input type="text" class="tanggal form-control" name="tanggal" id="tanggal" placeholder="Tanggal (HH-BB-TTTT)" data-date-format="dd-mm-yyyy"/></td>
    </tr>
    <tr>
      <td width="161">Nomor</td>
      <td width="516"><input readonly="readonly" type="text" class="form-control" name="nomor" id="nomor" placeholder="(auto generated)" /></td>
    </tr>
    <tr>
      <td width="161">Jam Dilaporkan</td>
      <td width="516"><input type="text" class="form-control" name="jam_dilaporkan" id="jam_dilaporkan" placeholder="Jam Dilaporkan (JJ:MM:DD)" /></td>
    </tr>
    <tr class="separator">
      <td colspan="2"><b> Pelapor <b></td>
    </tr>
    <tr>
      <td width="161">Nama Pelapor</td>
      <td width="516"><input type="text" class="form-control" name="pelapor_nama" id="pelapor_nama" placeholder="Nama Pelapor" /></td>
    </tr>
    <tr>
      <td width="161">Pangkat Pelapor</td>
      <td width="516"><?php echo form_dropdown("pelapor_id_pangkat",$arr_pangkat,'','id="pelapor_id_pangkat" class="form-control"') ?></td>
    </tr>
    <tr>
      <td width="161">NRP</td>
      <td width="516"><input type="text" class="form-control" name="pelapor_nrp" id="pelapor_nrp" placeholder="NRP (Hanya Angka)" /></td>
    </tr>
    <tr>
      <td width="161">Pelapor Jabatan</td>
      <td width="516"><input type="text" class="form-control" name="pelapor_jabatan" id="pelapor_jabatan" placeholder="Pelapor Jabatan" /></td>
    </tr>
    <tr>
      <td width="161">Pelapor Kesatuan</td>
      <td width="516"><?php 

            $arr_kesatuan = $this->cm->get_arr_dropdown("m_kesatuan","id_kesatuan","kesatuan","kesatuan");
           
            echo form_dropdown("pelapor_id_kesatuan",$arr_kesatuan,'',
              'id="pelapor_id_kesatuan" class="form-control" '); 


           
            ?></td>
    </tr>


<tr><td>Subdit  </td>
            <td>
              <?php 
                $arr = array(
                            "1" =>"1",
                            "2" =>"2",
                            "3" =>"3",
                            "4" =>"4",
                            "5" =>"5",
                            "GAKUM" =>"GAKUM",
                            "LAKA" =>"LAKA",
                            "UNIT KAPAL" =>"UNIT KAPAL"
                                              );
                echo form_dropdown("pelapor_subdit",$arr,'','id="pelapor_subdit" class="form-control"');
              ?>

            </td></tr>

            <tr><td>Unit  </td>
            <td>
              <?php 
                $arr = array(
                            "1" =>"1",
                            "2" =>"2",
                            "3" =>"3",
                            "4" =>"4",
                            "5" =>"5",
                            "6" =>"6");

                echo form_dropdown("pelapor_unit",$arr,'','id="pelapor_unit" class="form-control"');
              ?>

            </td></tr>

            <tr><td>Email </td>
            <td><input type="text" class="form-control" name="pelapor_email" id="pelapor_email" placeholder="Email Pelapor" /></td></tr>


    <tr class="separator">
      <td colspan="2"><b> Peristiwa Yang Terjadi <b></td>
    </tr>
    <tr>
      <td width="161">Tanggal Kejadian</td>
      <td width="516"><input type="text" class="tanggal form-control" name="kp_tanggal" id="kp_tanggal" placeholder="Tanggal Kejadian (HH-BB-TTTT)" data-date-format="dd-mm-yyyy"/></td>
    </tr>
    <tr>
      <td width="161">Waktu Kejadian</td>
      <td width="516"><input type="text" class="form-control" name="kp_waktu" id="kp_waktu" placeholder="Waktu Kejadian (JJ:MM:DD)" /></td>
    </tr>
    <tr>
      <td width="161">Tempat Kejadian</td>
      <td width="516"><textarea class="form-control" name="kp_tempat_kejadian" id="kp_tempat_kejadian" placeholder="Tempat Kejadian . . ." ></textarea></td></td>
    </tr>



    <tr><td>Provinsi </td>
              <TD>
          <?php 
                  $arr_provinsi = $this->cm->get_arr_dropdown("tiger_provinsi", 
      "id","provinsi",'provinsi');

                  echo form_dropdown("",$arr_provinsi,'','id="kp_id_provinsi" class="form-control" onchange="get_kota(this,\'#kp_id_kota\',1)"'); 
                  ?>
                  <tr><td>Kabupaten / Kota </td>
              <TD>
          <?php
          echo form_dropdown("",array(),'','id="kp_id_kota" class="form-control" onchange="get_kecamatan(this,\'#kp_id_kecamatan\',1)"'); 
                ?></TD></tr>

               <tr><td>Kecamatan </td>
              <TD><?php echo form_dropdown("",array(),'','id="kp_id_kecamatan" class="form-control" onchange="get_desa(this,\'#kp_id_desa\',1)"'); 
                ?></TD></tr>
              <tr><td>Desa / Kelurahan </td>
              <TD>
              <?php 
                  

                  echo form_dropdown("kp_id_desa",array(),'','id="kp_id_desa" class="form-control" '); 
                ?>
                </TD>
                </tr>




    <tr>
      <td width="161">Apa Yang Terjadi</td>
      <td width="516"><textarea class="form-control" name="kp_apa_yang_terjadi" id="kp_apa_yang_terjadi" placeholder="Apa Yang Terjadi . . . " ></textarea></td></td>
    </tr>
    <tr>
      <td width="161">Keadaan Jalan/Cuaca</td>
      <td width="516"><textarea class="form-control" name="kp_keadaan_jalan_cuaca" id="kp_keadaan_jalan_cuaca" placeholder="Keadaan Jalan/Cuaca . . ." ></textarea></td></td>
    </tr>
    <tr>
      <td width="161">Pengendara Motor / Pengemudi Mobil serta penumpang</td>
      <td width="516"><textarea class="form-control" name="kp_pengendara_mobil_motor" id="kp_pengendara_mobil_motor" placeholder="Pengendara Motor / Pengemudi Mobil serta penumpang . . . " ></textarea></td></td>
    </tr>
    <tr>
      <td width="161">Kerusakan Benda/Kendaraan</td>
      <td width="516"><textarea class="form-control" name="kp_kerusakan" id="kp_kerusakan" placeholder="Kerusakan Benda/Kendaraan . . ." ></textarea></td></td>
    </tr>
    <tr>
      <td width="161">Perkiraan Kerugian (Rp).</td>
      <td width="516"><input type="text" class="form-control" name="kp_perkiraan_rugi" id="kp_perkiraan_rugi" placeholder="Perkiraan Kerugian (Rp)"/></td>
    </tr>
    <tr>
      <td width="161">Uraian Singkat yang dilaporkan:</td>
      <td width="516"><textarea class="form-control" name="kp_uraian" id="kp_uraian" placeholder="Uraian Singkat yang dilaporkan: . . ." ></textarea></td></td>
    </tr>
    <tr>
      <td width="161">Kesimpulan Sementara</td>
      <td width="516"><textarea class="form-control" name="kp_kesimpulan" id="kp_kesimpulan" placeholder="Kesimpulan Sementara . . ." ></textarea></td></td>
    </tr>
    <tr>
      <td width="161">Tipe Kecelakaan</td>
      <td width="516"><input type="text" class="form-control" name="kp_tipe_kecelakaan" id="kp_tipe_kecelakaan" placeholder="Tipe Kecelakaan" /></td>
    </tr>
    <tr>
      <td width="161">Pengendara/Pembonceng Pakai Helm?</td>
      <td width="516"><input type="text" class="form-control" name="kp_pengedara_helm" id="kp_pengedara_helm" placeholder="Apakah Pengendara/Pembonceng Menggunakan Helm?" /></td>
    </tr>
    <!-- <tr>
      <td width="161">Pasal </td>
      <td width="516"><input type="text" class="form-control" name="  kp_pasal" id="  kp_pasal" placeholder="Pasal"  /></td>
    </tr> -->
    <tr>
      <td width="161">Orang Yang ditahan:</td>
      <td width="516"><textarea class="form-control" name="kp_orang_ditahan" id="kp_orang_ditahan" placeholder="Orang Yang ditahan: . . ." ></textarea></td></td>
    </tr>


 <tr class="separator">
<td colspan="2"> <b> PASAL</b>  </td> </tr>


      <tr> 
            <td colspan="2">
               
<a href="javascript:pasal_add();" id="xadd_pasal" class="btn btn-primary">Tambah Data Pasal</a>
<br><br>

<table width="100%"  border="0" class="table table-striped 
             table-bordered table-hover dataTable no-footer" id="pasallap" role="grid">
<thead>
   <tr >

         
        <th width="90%">PASAL</th>
        <th width="10%">PROS</th>
      
    </tr>
   
</thead>
</table>



            </td> </tr>   




    <tr class="separator">
      <td colspan="2"><b> Identitas Pengemudi <b></td>
    </tr>
    <tr> 
      <td colspan="2">
        <a href="javascript:pengemudi_add();" id="add_pengemudi" class="btn btn-primary">Tambah Data Pengemudi </a><br><br>
        <table width="100%"  border="0" class="table table-striped table-bordered table-hover dataTable no-footer" id="pengemudi" role="grid">
          <thead>
            <tr >
              <th width="15%">NAMA</th>
              <th width="5%">JK</th>
              <th width="10%">TGL. LAHIR</th>
              <th width="15%">PEKERJAAN</th>
              <th width="10%">AGAMA</th>
              <th width="25%">ALAMAT</th>
              <th width="10%">#</th>
              </tr>   
          </thead>
        </table>
      </td>
    </tr>
    <tr class="separator">
      <td colspan="2"><b> Saksi <b></td>
    </tr>
    <tr> 
      <td colspan="2">
        <a href="javascript:saksi_add();" id="add_saksi" class="btn btn-primary">Tambah Data Saksi </a><br><br>
        <table width="100%"  border="0" class="table table-striped table-bordered table-hover dataTable no-footer" id="saksi" role="grid">
          <thead>
            <tr >
              <th width="15%">NAMA</th>
              <th width="5%">JK</th>
              <th width="10%">TGL. LAHIR</th>
              <th width="15%">PEKERJAAN</th>
              <th width="10%">AGAMA</th>
              <th width="25%">ALAMAT</th>
              <th width="10%">#</th>
              </tr>   
          </thead>
        </table>
      </td>
    </tr>
    <tr class="separator">
      <td colspan="2"><b> Korban <b></td>
    </tr>
    <tr> 
      <td colspan="2">
        <a href="javascript:korban_add();" id="add_korban" class="btn btn-primary">Tambah Data Korban </a><br><br>
        <table width="100%"  border="0" class="table table-striped table-bordered table-hover dataTable no-footer" id="korban" role="grid">
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
              <th width="10%">#</th>
              </tr>   
          </thead>
        </table>
      </td>
    </tr>
    
    
   <tr class="separator">
      <td colspan="2"><b> Identitas Kendaraan yang terlibat Laka <b></td>
    </tr>
    <tr> 
      <td colspan="2">
        <a href="javascript:kendaraan_add();" id="add_korban" class="btn btn-primary">Tambah Data Kendaraan </a><br>
        <br>
        <table width="100%"  border="0" class="table table-striped table-bordered table-hover dataTable no-footer" id="kendaraan" role="grid">
          <thead>
            <tr >
              <th width="14%">NOPOL</th>
              <th width="11%">JENIS</th>
              <th width="10%">TIPE </th>
              <th width="13%">MODEL</th>
              <th width="20%">TAHUN BUAT</th>
              <th width="18%">KONDISI BAN</th>
              <th width="14%">#</th>
            </tr>   
          </thead>
        </table>
      </td>
    </tr>  
    
    
    
    <tr class="separator">
      <td colspan="2"><b> Mengetahui <b></td>
    </tr>
    <tr>
      <td width="161">Nama </td>
      <td width="516"><input type="text" class="form-control" name="mengetahui_nama" id="mengetahui_nama" placeholder="Nama"  /></td>
    </tr>
    <tr>
      <td width="161">Pangkat </td>
      <td width="516"><?php echo form_dropdown("pengetahui_id_pangkat",$arr_pangkat,'','id="pengetahui_id_pangkat" class="form-control"') ?></td>
    </tr>
    <tr>
      <td width="161">NRP </td>
      <td width="516"><input type="text" class="form-control" name="mengetahui_nrp" id="mengetahui_nrp" placeholder="NRP"  /></td>
    </tr>
    <tr>
      <td width="161">Jabatan </td>
      <td width="516"><input type="text" class="form-control" name="mengetahui_jabatan" id="mengetahui_jabatan" placeholder="Jabatan"  /></td>
    </tr>
    <tr>
      <td colspan='2'>
        <button type="submit" class="btn btn-primary">SIMPAN</button>
        <a href="<?php echo site_url('lap_lantas') ?>" class="btn btn-default">Cancel</a>
        <input type="hidden" name="mode" id="mode" value="<?php echo isset($mode)?$mode:""; ?>">
        <input type="hidden" name="lap_laka_lantas_id" id="lap_laka_lantas_id"  /> 
      </td>
    </tr>
  </table>
</form>


<!-- Modal Add Pengemudi -->


<!-- Modal Saksi -->



<!-- End Modal -->
<?php $this->load->view($controller."_view_form_pasal");?>
<?php $this->load->view($controller."_view_form_pengemudi");?>
<?php $this->load->view($controller."_view_form_saksi");?>
<?php $this->load->view($controller."_view_form_korban");?>
<?php $this->load->view($controller."_view_form_kendaraan");?>


<?php $this->load->view($controller."_view_form_js");?>
<?php $this->load->view("js/general_js");?>
