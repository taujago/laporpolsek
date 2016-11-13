
  <div class="modal fade" id="kendaraan_modal" tabindex="-1" role="dialog" aria-labelledby="kendaraanModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="kendaraanModal">Tambah Data Kendaraan</h4>
      </div>
      <div class="modal-body">
        <form action="" id="form_kendaraan" method="post">
          <table width="100%"  class='table table-bordered'>
            <tr><td>No Polisi </td>
            <td><input type="text" class="form-control" name="no_polisi" id="no_polisi" placeholder="No Polisi" />        </td>

            <tr><td>Nama Pemilik </td>
            <td><input type="text" class="form-control" name="pemilik_nama" id="pemilik_nama" placeholder="Nama Pemilik" />        </td>


            <tr><td>Alamat Pemilik </td>
            <td><input type="text" class="form-control" name="pemilik_alamat" id="pemilik_alamat" placeholder="Alamat Pemilik" /> </td>


<tr><td>Provinsi </td>
              <TD>
          <?php 
                  $arr_provinsi = $this->cm->get_arr_dropdown("tiger_provinsi", 
      "id","provinsi",'provinsi');

                  echo form_dropdown("",$arr_provinsi,'','id="pemilik_id_provinsi" class="form-control" onchange="get_kota(this,\'#pemilik_id_kota\',1)"'); 



                ?>
                <tr><td>Kabupaten / Kota </td>
              <TD>
          <?php 
                  

                  echo form_dropdown("",array(),'','id="pemilik_id_kota" class="form-control" onchange="get_kecamatan(this,\'#pemilik_id_kecamatan\',1)"'); 
                ?>              </TD></tr>

               <tr><td>Kecamatan </td>
              <TD>
          <?php 
                  

                  echo form_dropdown("",array(),'','id="pemilik_id_kecamatan" class="form-control" onchange="get_desa(this,\'#pemilik_id_desa\',1)"'); 
                ?>              </TD></tr>


              <tr><td>Desa / Kelurahan </td>
              <TD>
          <?php 
                  

                  echo form_dropdown("pemilik_id_desa",array(),'','id="pemilik_id_desa" class="form-control" '); 
                ?>              </TD></tr> 





	    <tr><td>No Stnk </td>
            <td><input type="text" class="form-control" name="no_stnk" id="no_stnk" placeholder="No Stnk" />        </td>
	    <tr><td>Jenis </td>
            <td><input type="text" class="form-control" name="jenis" id="jenis" placeholder="Jenis" />        </td>
	    <tr><td>Model </td>
            <td><input type="text" class="form-control" name="model" id="model" placeholder="Model" />        </td>
	    <tr><td>Merk </td>
            <td><input type="text" class="form-control" name="merk" id="merk" placeholder="Merk" />        </td>
	    <tr><td>Tipe </td>
            <td><input type="text" class="form-control" name="tipe" id="tipe" placeholder="Tipe" />        </td>
	    <tr><td>Tahun Buat </td>
            <td><input type="text" class="form-control" name="tahun_buat" id="tahun_buat" placeholder="Tahun Buat" />        </td>
	    <tr><td>Vol Silinder </td>
            <td><input type="text" class="form-control" name="vol_silinder" id="vol_silinder" placeholder="Vol Silinder" />        </td>
	    <tr><td>No Rangka </td>
            <td><input type="text" class="form-control" name="no_rangka" id="no_rangka" placeholder="No Rangka" />        </td>
	    <tr><td>No Mesin </td>
            <td><input type="text" class="form-control" name="no_mesin" id="no_mesin" placeholder="No Mesin" />        </td>
	    <tr><td>Warna Tnkb </td>
            <td><input type="text" class="form-control" name="warna_tnkb" id="warna_tnkb" placeholder="Warna Tnkb" />        </td>
	    <tr><td>Kondisi Ban </td>
            <td><input type="text" class="form-control" name="kondisi_ban" id="kondisi_ban" placeholder="Kondisi Ban" />        </td>



            </table>  
            <input type="hidden" name="id" id="id" /> 
          </form>   
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary" onclick="return kendaraan_simpan();"  >Simpan</button>
        </div>
      </div>
    </div>
  </div>