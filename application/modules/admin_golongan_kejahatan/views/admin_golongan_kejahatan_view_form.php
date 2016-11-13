<div class="modal fade" id="pengguna_modal" tabindex="-1" role="dialog" aria-labelledby="saksiModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="titleModal">Tambah Pengguna Baru</h4>
      </div>
      <div class="modal-body">
        
<form action="" id="formulir" method="post">
            <table width="100%"  class='table table-bordered'>
              <tr>


              <tr><td width="30%" >Kelompok </td>
              <TD>
              <?php 
                $arr_kelompok = $this->cm->get_arr_dropdown("m_kelompok_kejahatan","id_kelompok","kelompok","kelompok");

                
                $arr_kelompok = add_arr_head($arr_kelompok,"","== PILIH KELOMPOK ==");


                echo form_dropdown("id_kelompok",$arr_kelompok,'','id="id_kelompok"  class="form-control" ');
              ?>

              </TD></tr>


               
              <tr><td width="30%" >Golongan Kejahatan</td>
              <TD><input type="text" class="form-control" name="golongan_kejahatan" id="golongan_kejahatan" placeholder="Golongan Kejahatan" /> </TD></tr>


              



                 

                
              
            </table>
            <input type="hidden" name="id" value=""  id="id"  />
       
            
             </form>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary" onclick="return pengguna_simpan();"  >Simpan</button>
      </div>
    </div>
  </div>
</div>
