
  <div class="modal fade" id="korban_modal" tabindex="-1" role="dialog" aria-labelledby="korbanModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="korbanModal">Tambah Korban</h4>
      </div>
      <div class="modal-body">
        <form action="" id="form_korban" method="post">
          <table width="100%"  class='table table-bordered'>
            <tr>  
              <tr>
                <td width="30%" >Nama Korban</td>
                <TD>
                  <input type="text" class="form-control" name="korban_nama" id="korban_nama" placeholder="Nama Korban" />
                </TD>
              </tr>
              <tr>
                <td >Jenis Kelamin</td>
                <TD>
                  <?php $arr_jk = array("L"=>"Laki-laki","P"=>"Perempuan");
                  echo form_dropdown("korban_jk",$arr_jk,'','id="korban_jk" class="form-control"'); ?>
                </TD>
              </tr>
              <tr>
                <td width="30%" >Tanggal Lahir </td>
                <TD>
                  <input type="text" class="tanggal form-control" name="korban_tgl_lahir" id="korban_tgl_lahir" placeholder="Tanggal lahir "  data-date-format="dd-mm-yyyy" /> 
                </TD>
              </tr>
              <tr>
                <td>Agama </td>
                <TD>
                  <?php $arr_agama = $this->cm->get_arr_dropdown("m_agama", "id_agama","agama",'id_agama');
                    echo form_dropdown("korban_id_agama",$arr_agama,'','id="korban_id_agama" class="form-control"'); ?>
                </TD>
              </tr>
              <tr>
                <td>Pekerjaan</td>
                <TD>
                  <?php $arr_pekerjaan = $this->cm->get_arr_dropdown("m_pekerjaan", "id_pekerjaan","pekerjaan",'pekerjaan');
                  echo form_dropdown("korban_id_pekerjaan",$arr_pekerjaan,'','id="korban_id_pekerjaan" class="form-control"');?>
                </TD>
              </tr>


<tr><td>Pendidikan </td>
              <TD>
              <?php 
                  $arr_pendidikan = $this->cm->get_arr_dropdown("m_pendidikan", 
                "id_pendidikan","pendidikan",'pendidikan');

                  echo form_dropdown("korban_id_pendidikan",$arr_pendidikan,'','id="korban_id_pendidikan" class="form-control"'); 



                ?>
                  
                </TD></tr>

                <tr><td>Warga Negara </td>
              <TD><input type="text" class="form-control" name="korban_wn" id="korban_wn" placeholder="Warga negara" /></TD></tr>

              <tr><td>No. KTP</td>
              <TD><input type="text" class="form-control" name="korban_nik" id="korban_nik" placeholder="Nomor KTP" /></TD></tr>

              <tr><td>No. Passport</td>
              <TD><input type="text" class="form-control" name="korban_no_passport" id="korban_no_passport" placeholder="Nomor Passport" /></TD></tr>


              <tr><td>No. Kitas</td>
              <TD><input type="text" class="form-control" name="korban_no_kitas" id="korban_no_kitas" placeholder="Nomor KItas" /></TD></tr>


              <tr>
                <td>Alamat </td>
                <TD>
                  <input type="text" class="form-control" name="korban_alamat" id="korban_alamat" placeholder="Alamat" />
                  <input type="hidden" name="korban_id" value=""  id="korban_id"  />
                </TD>
              </tr>
              

 </tr>
              <tr><td>Provinsi </td>
              <TD>
          <?php 
                  $arr_provinsi = $this->cm->get_arr_dropdown("tiger_provinsi", 
      "id","provinsi",'provinsi');

                  echo form_dropdown("",$arr_provinsi,'','id="korban_id_provinsi" class="form-control" onchange="get_kota(this,\'#korban_id_kota\',1)"'); 



                ?>
                <tr><td>Kabupaten / Kota </td>
              <TD>
          <?php 
                  

                  echo form_dropdown("",array(),'','id="korban_id_kota" class="form-control" onchange="get_kecamatan(this,\'#korban_id_kecamatan\',1)"'); 
                ?>              </TD></tr>

               <tr><td>Kecamatan </td>
              <TD>
          <?php 
                  

                  echo form_dropdown("",array(),'','id="korban_id_kecamatan" class="form-control" onchange="get_desa(this,\'#korban_id_desa\',1)"'); 
                ?>              </TD></tr>


              <tr><td>Desa / Kelurahan </td>
              <TD>
          <?php 
                  

                  echo form_dropdown("korban_id_desa",array(),'','id="korban_id_desa" class="form-control" '); 
                ?>              </TD></tr> 
              
              
              
              
              <tr>
                <td width="30%" >Cedera</td>
                <TD>                  
                  <?php 
                  $arr_cidera = $this->dm->arr_cidera;
                  $arr_cidera = add_arr_head($arr_cidera,"x","= PILIH STATUS CIDERA =");
                  echo form_dropdown("korban_cidera",$arr_cidera,'','id="korban_cidera" class="form-control"');
                  ?>
                </TD>
              </tr>
              <tr>
                <td width="30%" >Tempat Dirawat</td>
                <TD>
                  <input type="text" class="form-control" name="korban_tmp_dirawat" id="korban_tmp_dirawat" placeholder="Tempat Dirawat" />
                </TD>
              </tr>
            </table>   
          </form>   
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary" onclick="return korban_simpan();"  >Simpan</button>
        </div>
      </div>
    </div>
  </div>