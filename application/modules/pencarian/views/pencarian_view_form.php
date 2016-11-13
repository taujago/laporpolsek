<style type="text/css">
      .umur {
            width: 100px;
      }


</style>
<form id="formulir" method="post" action="<?php echo site_url("$controller/$action"); ?>">
<table class='table table-bordered' width="100%">
      <tr class="separator"> <td colspan="2"> <b> LAP C</b>  </td> </tr>

     <tr><td width="161">Tanggal LP </td>
            <td width="516"><input type="text" class="tanggal form-control" name="tanggal" id="tanggal" placeholder="Tanggal" data-date-format="dd-mm-yyyy" 
            

              />        </td>
      <tr><td>Nomor </td>
            <td><input readonly="readonly" type="text" class="form-control" name="nomor" id="nomor" placeholder="(auto generated)" />        </td>
        

               
   <tr class="separator"> <td colspan="2"> <b> PELAPOR</b>  </td> </tr>
   <tr>
     <td> Nama </td>
            <td><input type="text" class="form-control" name="pelapor_nama" id="pelapor_nama" placeholder=" Nama" />
        </td>
      <tr><td> Jk </td>
            <td>
            <?php 
            
            echo form_dropdown("pelapor_jk",$arr_jk,'','id="pelapor_jk" class="form-control"');

            ?>
        </td>
      <tr><td> Tmp Lahir </td>
            <td><input type="text" class="form-control" name="pelapor_tmp_lahir" id="pelapor_tmp_lahir" placeholder=" Tmp Lahir" />
        </td>
      <tr><td> Tgl Lahir </td>
            <td><input type="text" class="tanggal form-control" name="pelapor_tgl_lahir" id="pelapor_tgl_lahir" placeholder=" Tgl Lahir" data-date-format="dd-mm-yyyy" />
        </td>
      <tr><td>Warga Negara </td>
            <td><?php 
            
            echo form_dropdown("pelapor_id_warga_negara",$arr_warga_negara,'','id="pelapor_id_warga_negara" class="form-control"');

            ?>
        </td>
      <tr><td>Agama </td>
            <td><?php 
            
            echo form_dropdown("pelapor_id_agama",$arr_agama,'','id="pelapor_id_agama" class="form-control"');

            ?>
        </td>
      <tr><td>Pekerjaan </td>
            <td>
            <?php 
            
            echo form_dropdown("pelapor_id_pekerjaan",$arr_pekerjaan,'','id="pelapor_id_pekerjaan" class="form-control"');

            ?>
        </td>
     
      <tr><td> Alamat </td>
            <td><input type="text" class="form-control" name="pelapor_alamat" id="pelapor_alamat" placeholder=" Alamat" />
        </td>
      <tr>
       <tr><td>Provinsi </td>
              <TD>
          <?php 
                  $arr_provinsi = $this->cm->get_arr_dropdown("tiger_provinsi", 
      "id","provinsi",'provinsi');

                  echo form_dropdown("",$arr_provinsi,'','id="pelapor_id_provinsi" class="form-control" onchange="get_kota(this,\'#pelapor_id_kota\',1)"'); 



                ?>


                <tr><td>Kabupaten / Kota </td>
              <TD>
          <?php 
                  

                  echo form_dropdown("",array(),'','id="pelapor_id_kota" class="form-control" onchange="get_kecamatan(this,\'#pelapor_id_kecamatan\',1)"'); 
                ?>


              </TD></tr>

               <tr><td>Kecamatan </td>
              <TD>
          <?php 
                  

                  echo form_dropdown("",array(),'','id="pelapor_id_kecamatan" class="form-control" onchange="get_desa(this,\'#pelapor_id_desa\',1)"'); 
                ?>


              </TD></tr>


              <tr><td>Desa / Kelurahan </td>
              <TD>
          <?php 
                  

                  echo form_dropdown("pelapor_id_desa",array(),'','id="pelapor_id_desa" class="form-control" '); 
                ?>
                </TD></tr>

            





   <tr class="separator"> <td colspan="2"> <b> PERISTIWA YANG DILAPORKAN </b>  </td> </tr>



      <tr>
            <td>Uraian Kejadian </td>
            <td><input type="text" class="form-control" name="kejadian_uraian" id="kejadian_uraian" placeholder="Uraian Kejadian" />
        </td>
      <tr><td>Jam Dilaporkan </td>
            <td><input type="text" class="form-control" name="kejadian_jam_lapor" id="kejadian_jam_lapor" placeholder="Jam Dilaporkan" />
        </td></tr>


<tr class="separator"> <td colspan="2"> <b> TANGGAL KEJADIAN DAN TEMPAT KEJADIAN </b>  </td> </tr>


 <tr><td>Tanggal Kejadian </td>
            <td><input type="text" class="tanggal form-control" name="kejadian_tanggal" id="kejadian_tanggal" placeholder="Tanggal Kejadian" data-date-format="dd-mm-yyyy" />
        </td>
      <tr><td>Jam Kejadian </td>
            <td><input type="text" class="form-control" name="kejadian_jam" id="kejadian_jam" placeholder="Jam Kejadian" />
        </td>
      <tr><td>Tempat Kejadian </td>
            <td><input type="text" class="form-control" name="kejadian_tempat" id="kejadian_tempat" placeholder="Tempat Kejadian" />
        </td>
        </tr>


 
 <tr class="separator"> <td colspan="2"> <b> PENERIMA LAPORAN </b>  </td> </tr>
<tr>
<td>Nama </td>
            <td><input type="text" class="form-control" name="pen_lapor_nama" id="pen_lapor_nama" placeholder="Nama"  />
        </td>
      <tr><td>Pangkat </td>
            <td>
            <?php echo form_dropdown("pen_lapor_id_pangkat",$arr_pangkat,'','id="pen_lapor_id_pangkat" class="form-control"') ?>
        </td>
      <tr>
            <td>NRP </td>
            <td><input type="text" class="form-control" name="pen_lapor_nrp" id="pen_lapor_nrp" placeholder="NRP"   />
        </td>
     
      <tr><td>Jabatan </td>
            <td><input type="text" class="form-control" name="pen_lapor_jabatan" id="pen_lapor_jabatan" placeholder="Jabatan"   />
        </td>
      


     
      <tr><td colspan='2'><button type="submit" class="btn btn-primary">SIMPAN </button> 
      <a href="<?php echo site_url('lap_c') ?>" class="btn btn-default">Cancel</a>
      <input type="hidden" name="mode" id="mode" value="<?php echo isset($mode)?$mode:""; ?>">
      <input type="hidden" name="lap_c_id" id="lap_c_id" value="<?php echo $lap_c_id; ?>" /> 
      </td></tr>
  
    </table></form>
 



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