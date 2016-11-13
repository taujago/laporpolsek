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


              <tr><td width="30%" >Nama Polres </td>
              <TD>
              <?php 
                $arr_polres = $this->cm->get_arr_dropdown("m_polres","id_polres","nama_polres","nama_polres");
                echo form_dropdown("id_polres",$arr_polres,'','id="id_polres"  class="form-control" ');
              ?>

              </TD></tr>


               
              <tr><td width="30%" >Nama Polsek </td>
              <TD><input type="text" class="form-control" name="nama_polsek" id="nama_polsek" placeholder="Nama Polsek" /> </TD></tr>


              



                 

                
              
            </table>
            <input type="hidden" name="id_polsek" value=""  id="id_polsek"  />
       
            
             </form>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary" onclick="return pengguna_simpan();"  >Simpan</button>
      </div>
    </div>
  </div>
</div>
