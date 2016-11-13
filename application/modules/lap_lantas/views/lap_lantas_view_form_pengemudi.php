
<div class="modal fade" id="pengemudi_modal" tabindex="-1" role="dialog" aria-labelledby="pengemudiModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="pengemudiModal">Tambah Pengemudi</h4>
      </div>
      <div class="modal-body">
        <form action="" id="form_pengemudi" method="post">
          <table width="100%"  class='table table-bordered'>
            <tr>  
              <tr>
                <td width="30%" >Nama Pengemudi</td>
                <TD>
                  <input type="text" class="form-control" name="pengemudi_nama" id="pengemudi_nama" placeholder="Nama Pengemudi" />                </TD>
              </tr>


              <tr>
                <td width="30%" >Kendaraan yang dikendarai</td>
                <TD>
                  <input type="text" class="form-control" name="kendaraan" id="kendaraan" placeholder="Kendaraan" />   </TD>
              </tr>

              <tr>
                <td >Jenis Kelamin</td>
                <TD>
                  <?php $arr_jk = array("L"=>"Laki-laki","P"=>"Perempuan");
                  echo form_dropdown("pengemudi_jk",$arr_jk,'','id="pengemudi_jk" class="form-control"'); ?>                </TD>
              </tr>
              <tr>
                <td width="30%" >Tanggal Lahir </td>
                <TD>
                  <input type="text" class="tanggal form-control" name="pengemudi_tgl_lahir" id="pengemudi_tgl_lahir" placeholder="Tanggal lahir" data-date-format="dd-mm-yyyy" />                </TD>
              </tr>
              <tr>
                <td>Agama </td>
                <TD>
                  <?php $arr_agama = $this->cm->get_arr_dropdown("m_agama", "id_agama","agama",'id_agama');
                    echo form_dropdown("pengemudi_id_agama",$arr_agama,'','id="pengemudi_id_agama" class="form-control"'); ?>                </TD>
              </tr>
              <tr>
                <td>Pekerjaan</td>
                <TD>
                  <?php $arr_pekerjaan = $this->cm->get_arr_dropdown("m_pekerjaan", "id_pekerjaan","pekerjaan",'pekerjaan');
                  echo form_dropdown("pengemudi_id_pekerjaan",$arr_pekerjaan,'','id="pengemudi_id_pekerjaan" class="form-control"');?>                </TD>
              </tr>


        <tr><td>Pendidikan </td>
              <TD>
              <?php 
                  $arr_pendidikan = $this->cm->get_arr_dropdown("m_pendidikan", 
                "id_pendidikan","pendidikan",'pendidikan');

                  echo form_dropdown("pengemudi_id_pendidikan",$arr_pendidikan,'','id="pengemudi_id_pendidikan" class="form-control"'); 



                ?>
                  
                </TD></tr>

                <tr><td>Warga Negara </td>
              <TD><input type="text" class="form-control" name="pengemudi_wn" id="pengemudi_wn" placeholder="Warga negara" /></TD></tr>

              <tr><td>No. KTP</td>
              <TD><input type="text" class="form-control" name="pengemudi_nik" id="pengemudi_nik" placeholder="Nomor KTP" /></TD></tr>

              <tr><td>No. Passport</td>
              <TD><input type="text" class="form-control" name="pengemudi_no_passport" id="pengemudi_no_passport" placeholder="Nomor Passport" /></TD></tr>


              <tr><td>No. Kitas</td>
              <TD><input type="text" class="form-control" name="pengemudi_no_kitas" id="pengemudi_no_kitas" placeholder="Nomor KItas" /></TD></tr>

              


              <tr>
                <td width="30%" >Cedera</td>
                <TD>                  
                  <?php 
                  $arr_cidera = $this->dm->arr_cidera;
                  $arr_cidera = add_arr_head($arr_cidera,"x","= PILIH STATUS CIDERA =");
                  echo form_dropdown("pengemudi_cidera",$arr_cidera,'','id="pengemudi_cidera" class="form-control"');
                  ?>
                </TD>
              </tr>

              <tr>
                <td width="30%" >Diduga pelaku ? </td>
                <TD>                  
                  <?php 
                  $arr_pelaku = array("TIDAK"=>"TIDAK","YA"=>"YA");
                  echo form_dropdown("pengemudi_pelaku",$arr_pelaku,'','id="pengemudi_pelaku" class="form-control"');
                  ?>
                </TD>
              </tr>



              <tr>
                <td>Alamat </td>
                <TD>
                  <input type="text" class="form-control" name="pengemudi_alamat" id="pengemudi_alamat" placeholder="Alamat" />
                  <input type="hidden" name="lap_laka_lantas_pengemudi_id" value=""  id="lap_laka_lantas_pengemudi_id"  />                </TD>
              </tr>
             <tr><td>Provinsi </td>
              <TD>
          <?php 
                  $arr_provinsi = $this->cm->get_arr_dropdown("tiger_provinsi", 
      "id","provinsi",'provinsi');

                  echo form_dropdown("",$arr_provinsi,'','id="pengemudi_id_provinsi" class="form-control" onchange="get_kota(this,\'#pengemudi_id_kota\',1)"'); 



                ?>


                <tr><td>Kabupaten / Kota </td>
              <TD>
          <?php 
                  

                  echo form_dropdown("",array(),'','id="pengemudi_id_kota" class="form-control" onchange="get_kecamatan(this,\'#pengemudi_id_kecamatan\',1)"'); 
                ?>


              </TD></tr>

               <tr><td>Kecamatan </td>
              <TD>
          <?php 
                  

                  echo form_dropdown("",array(),'','id="pengemudi_id_kecamatan" class="form-control" onchange="get_desa(this,\'#pengemudi_id_desa\',1)"'); 
                ?>


              </TD></tr>


              <tr><td>Desa / Kelurahan </td>
              <TD>
          <?php 
                  

                  echo form_dropdown("pengemudi_id_desa",array(),'','id="pengemudi_id_desa" class="form-control" '); 
                ?>

                
              </TD></tr>
            </table>   
        </form>   
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary" onclick="return pengemudi_simpan();"  >Simpan</button>
        </div>
      </div>
    </div>
  </div>