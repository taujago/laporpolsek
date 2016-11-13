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
<table class='table table-bordered'>
      <tr class="separator"> <td colspan="2"> <b> LAP A</b>  </td> </tr>

     <tr><td width="161">Tanggal LP </td>
            <td width="516"><input type="text" class="tanggal form-control" name="tanggal" id="tanggal" placeholder="Tanggal" data-date-format="dd-mm-yyyy" 
            

              />        </td>
      <tr><td>Nomor </td>
            <td><input readonly="readonly" type="text" class="form-control" name="nomor" id="nomor" placeholder="(auto generated)" />        </td>
     
      <tr><td>Golongan Kejahatan </td>
            <td>  

            <?php 

            $arr_kelompok_kejahan = $this->cm->get_arr_dropdown("m_kelompok_kejahatan","id_kelompok","kelompok","kelompok");

            $arr_kelompok_kejahan = add_arr_head($arr_kelompok_kejahan,"x","= PILIH GOLONGAN KEJAHATAN =");
           
            echo form_dropdown("",$arr_kelompok_kejahan,'',
              'id="id_kelompok" class="form-control" 
               onchange="get_data_kejahatan(this,\'#id_gol_kejahatan\',1)"

              '); 


           
            ?>
      </td>



      <tr><td> </td>
            <td>  

            <?php echo form_dropdown("id_gol_kejahatan",array(),'','id="id_gol_kejahatan" class="form-control"') ?>

      </td>


      <tr><td>Tempat Kejadian Perkara</td>
            <td>

            <?php 
            $arr_jenis_lokasi = add_arr_head($arr_jenis_lokasi,"","= PILIH LOKASI =");
            echo form_dropdown("id_jenis_lokasi",$arr_jenis_lokasi,'','id="id_jenis_lokasi" class="form-control"') ?>

               </td>


     
     
      <tr><td>Fungsi Terkait </td>
            <td>
                  <?php echo form_dropdown("id_fungsi",$arr_fungsi,'','id="id_fungsi" class="form-control"') ?>

               </td>
 

              
            </tr>

      <tr><td>Tindak Pidana </td>
            <td><!-- <input type="text" class="form-control" name="tindak_pidana" id="tindak_pidana" placeholder="Tindak Pidana" />    -->     

            <textarea name="tindak_pidana" class="form-control"></textarea>

            </td></tr>

      

<tr> <td colspan="2"> <b> PASAL</b>  </td> </tr>


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




   <tr> <td colspan="2"> <b> PELAPOR</b>  </td> </tr>
      <tr><td> Nama Pelapor</td>
            <td><input type="text" class="form-control" name="pelapor_nama" id="pelapor_nama" placeholder="Pelapor Nama" />        </td>
      <tr><td>Pangkat </td>
            <td> 
            <?php echo form_dropdown("pelapor_id_pangkat",$arr_pangkat,'','id="pelapor_id_pangkat" class="form-control"') ?>

            </td>
      <tr><td>NRP </td>
            <td><input type="text" class="form-control" name="pelapor_nrp" id="pelapor_nrp" placeholder="NRP" />        </td>
      <tr><td>Kesatuan </td>
            <td>
            <!-- <input type="text" class="form-control" name="pelapor_kesatuan" id="pelapor_kesatuan" placeholder="Kesatuan" />      --> 

            <?php 

            $arr_kesatuan = $this->cm->get_arr_dropdown("m_kesatuan","id_kesatuan","kesatuan","kesatuan");
           
            echo form_dropdown("pelapor_id_kesatuan",$arr_kesatuan,'',
              'id="pelapor_id_kesatuan" class="form-control" '); 


           
            ?>  


            </td>       

            <tr><td>Telpon </td>
            <td><input type="text" class="form-control" name="pelapor_tel" id="pelapor_tel" placeholder="Telpon Pelapor" /></td></tr>


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


   <tr class="separator"> <td colspan="2"> <b> PERISTIWA YANG TERJADI </b>  </td> </tr>

      <tr><td>Waktu Kejadian</td>
            <td><input type="text" class="form-control" name="kp_wktu" id="kp_wktu" placeholder="Waktu Kejadian" />        </td>
      <tr><td>Tanggal Kejadian</td>
            <td><input type="text" class="tanggal form-control" name="kp_tanggal" id="kp_tanggal" placeholder="Tanggal Kejadian" data-date-format="dd-mm-yyyy" />        </td>
      <tr><td>Tempat Kejadian</td>
            <td><input type="text" class="form-control" name="kp_tempat_kejadian" id="kp_tempat_kejadian" placeholder="Tempat Kejadian" />        </td>



    <tr><td>Provinsi  </td>
              <TD>
          <?php 
                  $arr_provinsi = $this->cm->get_arr_dropdown("tiger_provinsi", 
      "id","provinsi",'provinsi');

                  echo form_dropdown("",$arr_provinsi,'','id="kp_tempat_id_provinsi" class="form-control" onchange="get_kota(this,\'#kp_tempat_id_kota\',1)"'); 



                ?>


                <tr><td> Kabupaten / Kota  </td>
              <TD>
          <?php 
                  

                  echo form_dropdown("",array(),'','id="kp_tempat_id_kota" class="form-control" onchange="get_kecamatan(this,\'#kp_tempat_id_kecamatan\',1)"'); 
                ?>


              </TD></tr>

               <tr><td>  Kecamatan </td>
              <TD>
          <?php 
                  

                  echo form_dropdown("",array(),'','id="kp_tempat_id_kecamatan" class="form-control" onchange="get_desa(this,\'#kp_tempat_id_desa\',1)"'); 
                ?>


              </TD></tr>


              <tr><td>Desa / Kelurahan </td>
              <TD>
          <?php 
                  

                  echo form_dropdown("kp_tempat_id_desa",array(),'','id="kp_tempat_id_desa" class="form-control" '); 
                ?>





      <tr><td>Apa Yang Terjadi </td>
            <td>
            <!-- <input type="text" class="form-control" name="kp_apa_yang_terjadi" id="kp_apa_yang_terjadi" placeholder="Apa Yang Terjadi" />    -->     

            <textarea class="form-control" name="kp_apa_yang_terjadi" id="kp_apa_yang_terjadi" placeholder="Apa Yang Terjadi" ></textarea></td>
      <tr><td>Bagaimana Terjadi </td>
            <td><!-- <input type="text" class="form-control" name="kp_bagaimana_terjadi" id="kp_bagaimana_terjadi" placeholder="Bagaimana Terjadi" />    -->     
               <textarea  class="form-control" name="kp_bagaimana_terjadi" id="kp_bagaimana_terjadi" placeholder="Bagaimana Terjadi" ></textarea>

            </td>
      <tr><td>Uraian Singkat </td>
            <td><!-- <input type="text" class="form-control" name="kp_uraian_singkat" id="kp_uraian_singkat" placeholder="Uraian Singkat" />    -->     
              <textarea   class="form-control" name="kp_uraian_singkat" id="kp_uraian_singkat" placeholder="Uraian Singkat" ></textarea>

            </td>
      <tr><td> Dilaporkan Pada </td>
            <td><input type="text" class="tanggal form-control" name="kp_dilaporkan_pada" id="kp_dilaporkan_pada" placeholder="Dilaporkan Pada" data-date-format="dd-mm-yyyy" />        </td>
      <tr><td>Jam Dilaporkan </td>
            <td><input type="text" class="form-control" name="kp_jam_dilaporkan" id="kp_jam_dilaporkan" placeholder="Jam Dilaporkan" />        </td>
      <tr><td>Tempat Melaporkan </td>
            <td><input type="text" class="form-control" name="kp_tempat_melaporkan" id="kp_tempat_melaporkan" placeholder="Tempat Melaporkan" />        </td>
      <tr><td>Motif Kejahatan </td>
            <td> 


                  <?php echo form_dropdown("kp_id_motif_kejahatan",$arr_motif,'','id="kp_id_motif_kejahatan" class="form-control"') ?>

            </td>

      </tr>


      <tr><td>Modus Operandi </td>
            <td><!-- <input type="text" class="form-control" name="kp_uraian_singkat" id="kp_uraian_singkat" placeholder="Uraian Singkat" />    -->     
              <textarea   class="form-control" name="modus_operandi" id="modus_operandi" placeholder="Modus Operandi" ></textarea>

            </td>




 <!-- BEGIN OF FORM -->


 <tr class="separator"> <td colspan="2"> <b> TERLAPOR/TERSANGKA </b>  </td> </tr>
 <tr> <td colspan="2">

<a href="javascript:tersangka_add();" id="add_tersangka" class="btn btn-primary">Tambah Data Tersangka </a><br><br>

<!-- <a href="javascript:tambah_pasal();"> [+] Tambah Pasal  </a> -->

<table width="100%"  border="0" class="table table-striped 
             table-bordered table-hover dataTable no-footer" id="terlapor" role="grid">
<thead>
   <tr >

        <th width="10%">NAMA</th>
        <th width="12%">TGL. LAHIR</th>
        <th width="15%">TMP. LAHIR</th>
        <th width="10%">AGAMA</th>
        <th width="10%">SUKU</th>
        <th width="12%">PEKERJAAN</th>
        <th width="30%">ALAMAT</th>
        <th width="10%">PROS</th>
      
    </tr>
   
</thead>
</table>

 </td> </tr>



 <tr class="separator"> <td colspan="2"> <b> SAKSI </b>  </td> </tr>
 <tr> <td colspan="2">
<a href="javascript:saksi_add();" id="add_saksi" class="btn btn-primary">Tambah Data Saksi </a><br><br>

<table width="100%"  border="0" class="table table-striped 
             table-bordered table-hover dataTable no-footer" id="saksi" role="grid">
<thead>
   <tr >

        <th width="10%">NAMA</th>
        <th width="12%">TGL. LAHIR</th>
        <th width="15%">TMP. LAHIR</th>
        <th width="10%">AGAMA</th>
        <th width="10%">SUKU</th>
        <th width="12%">PEKERJAAN</th>
        <th width="30%">ALAMAT</th>
        <th width="10%">PROS</th>
      
    </tr>
   
</thead>
</table>

 </td> </tr> 



 <tr class="separator"> <td colspan="2"> <b> KORBAN </b>  </td> </tr>
 <tr> <td colspan="2">
<a href="javascript:korban_add();" id="add_korban" class="btn btn-primary">Tambah Data Korban </a><br><br>

<table width="100%"  border="0" class="table table-striped 
             table-bordered table-hover dataTable no-footer" id="korban" role="grid">
<thead>
   <tr >

        <th width="10%">NAMA</th>
        <th width="12%">TGL. LAHIR</th>
        <th width="15%">TMP. LAHIR</th>
        <th width="10%">AGAMA</th>
        <th width="10%">SUKU</th>
        <th width="12%">PEKERJAAN</th>
        <th width="30%">ALAMAT</th>
        <th width="10%">PROS</th>
      
    </tr>
   
</thead>
</table>

 </td> </tr> 






 <tr class="separator"> <td colspan="2"> <b> BARANG BUKTI </b>  </td> </tr>
 <tr> <td colspan="2">
<a href="javascript:barbuk_add();" id="add_korban" class="btn btn-primary">Tambah Data Barang Bukti </a><br><br>

<table width="100%"  border="0" class="table table-striped 
             table-bordered table-hover dataTable no-footer" id="barbuk" role="grid">
<thead>
   <tr >

        <th width="70%">BARANG BUKTI</th>         
        <th width="10%">JUMLAH</th>     
        <th width="10%">SATUAN</th>     
        <th width="10%">PROS</th>
      
    </tr>
   
</thead>
</table>

 </td> </tr> 





 <!-- END OF FORM -->








       <tr class="separator"> <td colspan="2"> <b> TINDAKAN YANG DILAKUKAN </b>  </td> </tr>
      <tr><td>Tindakan Yang Dilakukan </td>
            <td><!-- <input type="text" class="form-control" name="tindakan_yang_dilakukan" id="tindakan_yang_dilakukan" placeholder="Tindakan Yang Dilakukan" />   -->      
            <textarea  class="form-control" name="tindakan_yang_dilakukan" id="tindakan_yang_dilakukan" placeholder="Tindakan Yang Dilakukan" ></textarea>


            </td>
      </tr>
     <tr class="separator"> <td colspan="2"> <b> PENERIMA LAPORAN </b>  </td> </tr>
      <tr><td>Nama </td>
            <td><input type="text" class="form-control" name="pen_lapor_nama" id="pen_lapor_nama" placeholder="Nama" />        </td>
      <tr><td>Pangkat  </td>
              
<td>
                   <?php echo form_dropdown("pen_lapor_id_pangkat",$arr_pangkat,'','id="pen_lapor_id_pangkat" class="form-control"') ?>
            </td>
      <tr><td>NRP </td>
            <td><input type="text" class="form-control" name="pen_lapor_nrp" id="pen_lapor_nrp" placeholder="NRP" />        </td>
      <tr><td>Kesatuan </td>
            <td>
            <!-- <input type="text" class="form-control" name="pen_lapor_kesatuan" id="pen_lapor_kesatuan" placeholder="Kesatuan" />   -->      
            <?php 

            $arr_kesatuan = $this->cm->get_arr_dropdown("m_kesatuan","id_kesatuan","kesatuan","kesatuan");
           
            echo form_dropdown("pen_lapor_id_kesatuan",$arr_kesatuan,'',
              'id="pen_lapor_id_kesatuan" class="form-control" '); 


           
            ?>  

            </td>
      <tr><td>Jabatan </td>
            <td><input type="text" class="form-control" name="pen_lapor_jabatan" id="pen_lapor_jabatan" placeholder="Jabatan" />        </td>
      <tr><td>Telpon </td>
            <td><input type="text" class="form-control" name="pen_lapor_telpon" id="pen_lapor_telpon" placeholder="Telpon" />        </td>
            </tr>

      <tr class="separator"> <td colspan="2"> <b> MENGETAHUI </b>  </td> </tr>
      <tr><td>Nama </td>
            <td><input type="text" class="form-control" name="mengetahui_nama" id="mengetahui_nama" placeholder="Nama" />        </td>
      <tr><td>Pangkat </td>
            <td> 

                   <?php echo form_dropdown("mengetahui_id_pangkat",$arr_pangkat,'','id="mengetahui_id_pangkat" class="form-control"') ?>
            </td>

              </td>
      <tr><td>NRP </td>
            <td><input type="text" class="form-control" name="mengetahui_nrp" id="mengetahui_nrp" placeholder="NRP" />        </td>
      <tr><td>Jabatan </td>
            <td><input type="text" class="form-control" name="mengetahui_jabatan" id="mengetahui_jabatan" placeholder="Jabatan" />        </td>
     
      <tr><td colspan='2'><button type="submit" class="btn btn-primary">SIMPAN </button> 
      <a href="<?php echo site_url('lap_a') ?>" class="btn btn-default">Cancel</a>
      <input type="hidden" name="mode" id="mode" value="<?php echo isset($mode)?$mode:""; ?>">
      <input type="hidden" name="lap_a_id" id="lap_a_id" value="<?php echo $lap_a_id; ?>" /> 
      </td></tr>
  
    </table></form>

 



<?php $this->load->view($controller."_view_form_tersangka");?>
<?php $this->load->view($controller."_view_form_saksi");?>
<?php $this->load->view($controller."_view_form_korban");?>
<?php $this->load->view($controller."_view_form_barbuk");?>
<?php $this->load->view($controller."_view_form_pasal");?>

<?php $this->load->view($controller."_view_form_js");?>
<?php $this->load->view("js/general_js") ?>