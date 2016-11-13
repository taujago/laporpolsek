<link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
<link href="<?php echo base_url("assets") ?>/css/jquery.dataTables.css" rel="stylesheet">

<script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>

<script src="<?php echo base_url("assets") ?>/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url("assets") ?>/js/jquery.loadJSON.js"></script>
<link href="<?php echo base_url("assets") ?>/css/eblokir.css" rel="stylesheet">

 <style type="text/css">
    .dataTables_filter {
      display: none;
    }

.datepicker{z-index:9999 !important}


 </style>

 <a class="btn btn-danger" href="<?php echo site_url("$this->controller") ?>"><span class="glyphicon glyphicon-arrow-left"></span></i> Kembali </a>
<a target="blank" class="btn btn-success" href="<?php echo site_url("$controller/cetak_laporan/$lap_c_id") ?>"><span class="glyphicon glyphicon-print"></span></i> Cetak Laporan Polisi </a>
<a target="blank" class="btn btn-success" href="<?php echo site_url("$controller/cetak_surat_pernyataan/$lap_c_id") ?>"><span class="glyphicon glyphicon-print"></span></i> Cetak Surat Pernyataan </a>
<a target="blank" class="btn btn-success" href="<?php echo site_url("$controller/cetak_tanda_bukti/$lap_c_id") ?>"><span class="glyphicon glyphicon-print"></span></i> Cetak Tanda Bukti Lapor </a>
<a target="blank" class="btn btn-success" href="<?php echo site_url("$controller/cetak_rekomendasi/$lap_c_id") ?>"><span class="glyphicon glyphicon-print"></span></i> Cetak Rekomendasi Penilaian Laporan  Polisi </a>
<hr /> 
<br />

<table class='table table-bordered'>
      <tr class="separator"> <td colspan="2"> <b> LAP C</b>  </td> </tr>

     <tr><td width="161">Tanggal LP </td>
            <td width="516"><?php echo $tanggal; ?>  </td>
      <tr><td>Nomor </td>
            <td><?php echo $nomor; ?>        </td>
        

               
   <tr class="separator"> <td colspan="2"> <b> PELAPOR</b>  </td> </tr>
   <tr>
     <td> Nama </td>
            <td><?php echo $pelapor_nama; ?> 
        </td>
      <tr><td> Jk </td>
            <td><?php echo $pelapor_jk; ?> </td>
      <tr><td> Tmp Lahir </td>
            <td><?php echo $pelapor_tmp_lahir; ?> 
        </td>
      <tr><td> Tgl Lahir </td>
            <td><?php echo $pelapor_tgl_lahir; ?> 
        </td>
      <tr><td>Warga Negara </td>
            <td><?php echo $warga_negara; ?> 


        </td>
      <tr><td>Agama </td>
            <td><?php echo $agama; ?> 
        </td>
      <tr><td>Pekerjaan </td>
            <td><?php echo $pekerjaan; ?> 
        </td>
     
      <tr><td> Alamat </td>
            <td><?php echo $pelapor_alamat." ".$desa." ".$kecamatan." ".$kota." ".$provinsi; ?>
        
        </td>
      <tr>
       
            





   <tr class="separator"> <td colspan="2"> <b> PERISTIWA YANG DILAPORKAN </b>  </td> </tr>



      <tr>
            <td>Uraian Kejadian </td>
            <td><?php echo $kejadian_uraian; ?> 
        </td>
      <tr><td>Jam Dilaporkan </td>
            <td><?php echo $kejadian_jam_lapor; ?> 
        </td></tr>


<tr class="separator"> <td colspan="2"> <b> TANGGAL KEJADIAN DAN TEMPAT KEJADIAN </b>  </td> </tr>


 <tr><td>Tanggal Kejadian </td>
            <td><?php echo $kejadian_tanggal; ?> 
        </td>
      <tr><td>Jam Kejadian </td>
            <td><?php echo $kejadian_jam; ?> 
        </td>
      <tr><td>Tempat Kejadian </td>
            <td><?php echo $kejadian_tempat; ?> 
        </td>
        </tr>


 
 <tr class="separator"> <td colspan="2"> <b> PENERIMA LAPORAN </b>  </td> </tr>
<tr>
<td>Nama </td>
            <td><?php echo $pen_lapor_nama; ?> 
        </td>
      <tr><td>Pangkat </td>
            <td><?php echo $penerima_pangkat; ?>  
        </td>
      <tr>
            <td>NRP </td>
            <td><?php echo $pen_lapor_nrp; ?> 
        </td>
     
      <tr><td>Jabatan </td>
            <td><?php echo $pen_lapor_jabatan; ?> 
        </td>
     
       
  
    </table>



     

<div class="modal fade" id="modal_tersangka" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
  <div id="modal-dialog" class="modal-dialog modal-vertical-centered" style="width:50%; min-height:600px;">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" 
               data-dismiss="modal" aria-hidden="true">
                  &times;
            </button>
            <h4 class="modal-title" id="modal_tersangka_judul">
              VERIFIKASI PENDAFTARAN KENDARAAN
            </h4>
         </div>
         <div class="modal-body">
            <!-- Add some text here --> 

            <form action="" id="form_tersangka" method="post">
            <table width="100%" cellpadding="2">
              <tr>
               
              <tr><td width="30%" >Nama Tersangka </td>
              <TD>:</TD><TD><input type="text" class="form-control" name="tersangka_nama" id="tersangka_nama" placeholder="Nama Tersangka" /> </TD></tr>


              <tr><td >Jenis Kelamin</td>
              <TD>:</TD><TD>
              <?php 
                $arr_jk = array("L"=>"Laki-laki","P"=>"Perempuan");
                echo form_dropdown("tersangka_jk",$arr_jk,'','id="tersangja_jk" class="form-control"');
              ?>
              </TD></tr>


              <tr><td>Suku </td>
              <TD>:</TD><TD>
                <?php 
                  $arr_suku = $this->cm->get_arr_dropdown("m_suku", 
      "id_suku","suku",'suku');

                  echo form_dropdown("tersangka_id_suku",$arr_suku,'','id="tersangka_id_suku" class="form-control"'); 



                ?>

              </TD></tr>


                <tr><td>Tempat Lahir </td>
              <TD>:</TD><TD><input type="text" class="form-control" name="tersangka_tmp_lahir" id="tersangka_tmp_lahir" placeholder="Tempat Lahir" /></TD></tr>

               <tr><td>Tanggal Lahir </td>
              <TD>:</TD><TD><input type="text" class="tanggal form-control" name="tersangka_tgl_lahir" id="tersangka_tgl_lahir" placeholder="Tanggal Lahir" data-date-format="dd-mm-yyyy" /></TD></tr>

                <tr><td>Agama </td>
              <TD>:</TD><TD>
 <?php 
                  $arr_agama = $this->cm->get_arr_dropdown("m_agama", 
      "id_agama","agama",'id_agama');

                  echo form_dropdown("tersangka_id_agama",$arr_agama,'','id="tersangka_id_agama" class="form-control"'); 



                ?>
              </TD></tr>



                <tr><td>Pekerjaan</td>
              <TD>:</TD><TD>
<?php 
                  $arr_pekerjaan = $this->cm->get_arr_dropdown("m_pekerjaan", 
      "id_pekerjaan","pekerjaan",'pekerjaan');

                  echo form_dropdown("tersangka_id_pekerjaan",$arr_pekerjaan,'','id="tersangka_id_pekerjaan" class="form-control"'); 



                ?>

               </TD></tr>


                <tr><td>Alamat </td>
              <TD>:</TD><TD><input type="text" class="form-control" name="tersangka_alamat" id="tersangka_alamat" placeholder="Alamat" /></TD></tr>


                <tr><td>Provinsi </td>
              <TD>:</TD><TD>
          <?php 
                  $arr_provinsi = $this->cm->get_arr_dropdown("tiger_provinsi", 
      "id","provinsi",'provinsi');

                  echo form_dropdown("",$arr_provinsi,'','id="tersangka_id_provinsi" class="form-control" onchange="get_kota(this,\'#tersangka_id_kota\',1)"'); 



                ?>


                <tr><td>Kabupaten / Kota </td>
              <TD>:</TD><TD>
          <?php 
                  

                  echo form_dropdown("",array(),'','id="tersangka_id_kota" class="form-control" onchange="get_kecamatan(this,\'#tersangka_id_kecamatan\',1)"'); 
                ?>


              </TD></tr>

               <tr><td>Kecamatan </td>
              <TD>:</TD><TD>
          <?php 
                  

                  echo form_dropdown("",array(),'','id="tersangka_id_kecamatan" class="form-control" onchange="get_desa(this,\'#tersangka_id_desa\',1)"'); 
                ?>


              </TD></tr>


              <tr><td>Desa / Kelurahan </td>
              <TD>:</TD><TD>
          <?php 
                  

                  echo form_dropdown("tersangka_id_desa",array(),'','id="tersangka_id_desa" class="form-control" '); 
                ?>

                <input type="hidden" name="tersangka_id" value=""  id="tersangka_id"  />
              </TD></tr>
            </table>
            
        <br />
            <center>  
            <a id="batal" href="javascript:tutup('#modal_tersangka')" class="btn btn-md btn-danger">BATAL </a> 
             <input  type="submit" value="SIMPAN TERSANGKA" class="tombol btn btn-md btn-primary">
           
            </center>
             </form>
            
            
            
         </div> <!-- end of modal body  --> 
         <!--<div class="modal-footer">
            <button type="button" class="btn btn-default" 
               data-dismiss="modal">Close
            </button>
            <button type="button" class="btn btn-primary">
               Submit changes
            </button>
         </div>-->
      </div><!-- /.modal-content -->
</div><!-- /.modal -->


 <!-- end of modal tersangka --> 


  

<div class="modal fade" id="modal_saksi" tabindex="-2" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
  <div id="modal-dialog" class="modal-dialog modal-vertical-centered" style="width:50%; min-height:600px;">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" 
               data-dismiss="modal" aria-hidden="true">
                  &times;
            </button>
            <h4 class="modal-title" id="modal_saksi_judul">
              VERIFIKASI PENDAFTARAN KENDARAAN
            </h4>
         </div>
         <div class="modal-body">
            <!-- Add some text here --> 

            <form action="" id="form_saksi" method="post">
            <table width="100%">
              <tr>
               
              <tr><td width="30%" >Nama saksi </td>
              <TD>:</TD><TD><input type="text" class="form-control" name="saksi_nama" id="saksi_nama" placeholder="Nama saksi" /> </TD></tr>


              <tr><td >Jenis Kelamin</td>
              <TD>:</TD><TD>
              <?php 
                $arr_jk = array("L"=>"Laki-laki","P"=>"Perempuan");
                echo form_dropdown("saksi_jk",$arr_jk,'','id="tersangja_jk" class="form-control"');
              ?>
              </TD></tr>


              <tr><td>Suku </td>
              <TD>:</TD><TD>
                <?php 
                  $arr_suku = $this->cm->get_arr_dropdown("m_suku", 
      "id_suku","suku",'suku');

                  echo form_dropdown("saksi_id_suku",$arr_suku,'','id="saksi_id_suku" class="form-control"'); 



                ?>

              </TD></tr>


                <tr><td>Tempat Lahir </td>
              <TD>:</TD><TD><input type="text" class="form-control" name="saksi_tmp_lahir" id="saksi_tmp_lahir" placeholder="Tempat Lahir" /></TD></tr>

               <tr><td>Tanggal Lahir </td>
              <TD>:</TD><TD><input type="text" class="tanggal form-control" name="saksi_tgl_lahir" id="saksi_tgl_lahir" placeholder="Tanggal Lahir" data-date-format="dd-mm-yyyy" /></TD></tr>

                <tr><td>Agama </td>
              <TD>:</TD><TD>
 <?php 
                  $arr_agama = $this->cm->get_arr_dropdown("m_agama", 
      "id_agama","agama",'id_agama');

                  echo form_dropdown("saksi_id_agama",$arr_agama,'','id="saksi_id_agama" class="form-control"'); 



                ?>
              </TD></tr>



                <tr><td>Pekerjaan</td>
              <TD>:</TD><TD>
<?php 
                  $arr_pekerjaan = $this->cm->get_arr_dropdown("m_pekerjaan", 
      "id_pekerjaan","pekerjaan",'pekerjaan');

                  echo form_dropdown("saksi_id_pekerjaan",$arr_pekerjaan,'','id="saksi_id_pekerjaan" class="form-control"'); 



                ?>

               </TD></tr>


                <tr><td>Alamat </td>
              <TD>:</TD><TD><input type="text" class="form-control" name="saksi_alamat" id="saksi_alamat" placeholder="Alamat" /></TD></tr>


                <tr><td>Provinsi </td>
              <TD>:</TD><TD>
          <?php 
                  $arr_provinsi = $this->cm->get_arr_dropdown("tiger_provinsi", 
      "id","provinsi",'provinsi');

                  echo form_dropdown("",$arr_provinsi,'','id="saksi_id_provinsi" class="form-control" onchange="get_kota(this,\'#saksi_id_kota\',1)"'); 



                ?>


                <tr><td>Kabupaten / Kota </td>
              <TD>:</TD><TD>
          <?php 
                  

                  echo form_dropdown("",array(),'','id="saksi_id_kota" class="form-control" onchange="get_kecamatan(this,\'#saksi_id_kecamatan\',1)"'); 
                ?>


              </TD></tr>

               <tr><td>Kecamatan </td>
              <TD>:</TD><TD>
          <?php 
                  

                  echo form_dropdown("",array(),'','id="saksi_id_kecamatan" class="form-control" onchange="get_desa(this,\'#saksi_id_desa\',1)"'); 
                ?>


              </TD></tr>


              <tr><td>Desa / Kelurahan </td>
              <TD>:</TD><TD>
          <?php 
                  

                  echo form_dropdown("saksi_id_desa",array(),'','id="saksi_id_desa" class="form-control" '); 
                ?>

                <input type="hidden" name="saksi_id" value=""  id="saksi_id"  />
              </TD></tr>
            </table>
            
        <br />
            <center>  
            <a id="batal" href="javascript:tutup('#modal_saksi')" class="btn btn-md btn-danger">BATAL </a> 
             <input  type="submit" value="SIMPAN TERSANGKA" class="tombol btn btn-md btn-primary">
           
            </center>
             </form>
            
            
            
         </div> <!-- end of modal body  --> 
         <!--<div class="modal-footer">
            <button type="button" class="btn btn-default" 
               data-dismiss="modal">Close
            </button>
            <button type="button" class="btn btn-primary">
               Submit changes
            </button>
         </div>-->
      </div><!-- /.modal-content -->
</div><!-- /.modal -->


 <!-- end of modal tersangka --> 





<?php //$this->load->view($controller."_view_detail_js") ?>


