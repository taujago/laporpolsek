<link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
<link href="<?php echo base_url("assets") ?>/css/jquery.dataTables.css" rel="stylesheet">

<script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>

<script src="<?php echo base_url("assets") ?>/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url("assets") ?>/js/jquery.loadJSON.js"></script>
<link href="<?php echo base_url("assets") ?>/css/eblokir.css" rel="stylesheet">


<style type="text/css">
      .umur {
            width: 100px;
      }


</style>


   <!-- 
<tr class="separator"> <td colspan="2"> <b> TERLAPOR / TERSANGKA </b>  </td> </tr>
  <tr > <td colspan="2">
TABEL TERSANGKA --> 

   <table id="terlapor" class='table table-bordered'>
   <tr><TH>NAMA</TH>
   <TH>JK</TH>
   <TH>TMP LAHIR</TH>
   <TH>TGL LAHIR</TH>
   <TH>PEKERJAAN</TH>
   <TH>ALAMAT</TH>
   </tr>
   </table>

<!-- 


<table class='table table-bordered'>
      <tr class="separator"> <td colspan="2"> <b> LAP A</b>  </td> </tr>

     <tr><td width="161">Tanggal LP </td>
            <td width="516">   

            <?php echo $tanggal; ?>
            </td>
      <tr><td>Nomor </td>
            <td><?php echo $nomor; ?> </td>
      <tr><td>Golongan Kejahatan </td>
            <td> <?php echo $golongan_kejahatan ?>

               </td>


      <tr><td>Kategori Tempat Kejahatan</td>
            <td>
 
            <?php echo $jenis_lokasi ?>
               </td>


      <tr><td>Tindak Pidana </td>
            <td> <?php echo $tindak_pidana ?>  </td>
      <tr><td>Pasal </td>
            <td><?php echo $pasal ?>   </td>
      <tr><td>Fungsi Terkait </td>
            <td>
                   
                  <?php echo $fungsi ?>
               </td>
 

              </td>
            </tr>
   <tr class="separator"> <td colspan="2"> <b> PELAPOR</b>  </td> </tr>
      <tr><td> Nama Pelapor</td>
            <td><?php echo $pelapor_nama ?>    </td>
      <tr><td>Pangkat </td>
            <td> 
             <?php echo $pelapor_pangkat; ?>

            </td>
      <tr><td>Nrp </td>
            <td> <?php echo $pelapor_nrp ?>    </td>
      <tr><td>Kesatuan </td>
            <td>  <?php echo $pelapor_kesatuan ?>   </td>       
      <tr><td>Telpon </td>
            <td><?php echo $pelapor_tel ?>    </td>

   <tr class="separator"> <td colspan="2"> <b> PERISTIWA YANG TERJADI </b>  </td> </tr>

      <tr><td>Waktu Kejadian</td>
            <td> <?php echo $kp_wktu ?> </td>
      <tr><td>Tanggal Kejadian</td>
            <td><?php echo $kp_tanggal ?>      </td>
      <tr><td>Tempat Kejadian</td>
            <td><?php echo $kp_tempat_kejadian ?>    </td>
      <tr><td>Apa Yang Terjadi </td>
            <td> <?php echo $kp_apa_yang_terjadi ?>   </td>
      <tr><td>Bagaimana Terjadi </td>
            <td><?php echo $kp_bagaimana_terjadi ?>    </td>
      <tr><td>Uraian Singkat </td>
            <td><?php echo $kp_uraian_singkat ?>     </td>
      <tr><td> Dilaporkan Pada </td>
            <td><?php echo $kp_dilaporkan_pada ?> </td>
      <tr><td>Jam Dilaporkan </td>
            <td><?php echo $kp_jam_dilaporkan ?>    </td>
      <tr><td>Tempat Melaporkan </td>
            <td><?php echo $kp_tempat_melaporkan; ?>
                 </td>
      <tr><td>Motif Kejahatan </td>
            <td> 
               <?php echo $motif ?>                

            </td>

      </tr>


      <tr class="separator"> <td colspan="2"> <b> TINDAKAN YANG DILAKUKAN </b>  </td> </tr>
      <tr><td>Tindakan Yang Dilakukan </td>
            <td><?php echo $tindakan_yang_dilakukan ?>     </td>
      </tr>
     <tr class="separator"> <td colspan="2"> <b> PENERIMA LAPORAN </b>  </td> </tr>
      <tr><td>Nama </td>
            <td><?php echo $pen_lapor_nama ?>    </td>
      <tr><td>Pangkat  </td>
              
<td>     <?php echo $penerima_pangkat ?>
                  
            </td>
      <tr><td>NRP </td>
            <td> <?php echo $pen_lapor_nrp ?>    </td>
      <tr><td>Kesatuan </td>
            <td><?php echo $pen_lapor_kesatuan ?>  </td>
      <tr><td>Jabatan </td>
            <td><?php echo $pen_lapor_jabatan ?> </td>
      <tr><td>Telpon </td>
            <td><?php echo $pen_lapor_telpon ?>  </td>
            </tr>


  

 



  </td></tr>



      <tr class="separator"> <td colspan="2"> <b> MENGETAHUI </b>  </td> </tr>
      <tr><td>Nama </td>
            <td> <?php echo $mengetahui_nama ?> </td>
      <tr><td>Pangkat </td>
            <td><?php echo $mengetahui_pangkat ?></td>

          
      <tr><td>NRP </td>
            <td><?php echo $mengetahui_nrp ?>  </td>
      <tr><td>Jabatan </td>
            <td><?php echo $mengetahui_jabatan ?>   </td>
     
       
  
    </table>  -->
<?php echo $this->load->view("lap_a_view_detail_js") ?>
 