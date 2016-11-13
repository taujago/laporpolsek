 <tr><td>Pendidikan </td>
              <TD>
              <?php 
                  $arr_pendidikan = $this->cm->get_arr_dropdown("m_pendidikan", 
                "id_pendidikan","pendidikan",'pendidikan');

                  echo form_dropdown("saksi_id_pendidikan",$arr_pendidikan,'','id="saksi_id_pendidikan" class="form-control"'); 



                ?>
                  
                </TD></tr>

                <tr><td>Warga Negara </td>
              <TD><input type="text" class="form-control" name="saksi_wn" id="saksi_wn" placeholder="Warga negara" /></TD></tr>

              <tr><td>No. KTP</td>
              <TD><input type="text" class="form-control" name="saksi_nik" id="saksi_nik" placeholder="Nomor KTP" /></TD></tr>

              <tr><td>No. Passport</td>
              <TD><input type="text" class="form-control" name="saksi_no_passport" id="saksi_no_passport" placeholder="Nomor Passport" /></TD></tr>


              <tr><td>No. Kitas</td>
              <TD><input type="text" class="form-control" name="saksi_no_kitas" id="saksi_no_kitas" placeholder="Nomor KItas" /></TD></tr>

              <tr><td>Residivis ? </td>
              <TD>
              <?php 
                  $arr_rsdv = array("ya"=>"Ya","tidak"=>"Tidak");

                  echo form_dropdown("saksi_residivis",$arr_rsdv,'','id="tesangka_residivis" class="form-control"');                ?>
                
              </TD></tr>


              <tr><td>Jika Ya, Apa </td>
              <TD>
              <?php 
                  $arr_rsdv = array(
                      ""=>"TIDAK ADA ",
                      "PRODUSEN" => "PRODUSEN",
                      "BANDAR" => "BANDAR",
                      "PENGEDAR" => "PENGEDAR",
                      "PENGGUNA" => "PENGGUNA"

                    );

                  echo form_dropdown("saksi_klasifikasi",$arr_rsdv,'','id="  saksi_klasifikasi" class="form-control"');                ?>
                
              </TD></tr>






