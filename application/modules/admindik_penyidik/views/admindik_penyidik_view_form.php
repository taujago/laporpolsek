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
               
              <tr><td width="30%" >Username / NRP </td>
              <TD><input type="text" class="form-control" name="user_id" id="user_id" placeholder="Username / NRP" /> </TD></tr>


              <tr><td >Nama</td>
              <TD><input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" /> </TD></tr>


               <tr><td>Password</td>
              <TD><input type="password" class="form-control" name="user_pass" id="user_pass" placeholder="Password" /></TD></tr>

               <tr><td>Ulangi Password</td>
              <TD><input type="password" class="form-control" name="user_pass2" id="user_pass2" placeholder="Ulangi Password" /></TD></tr>

               <tr><td>Nomor HP</td>
              <TD><input type="text" class="form-control" name="nomor_hp" id="nomor_hp" placeholder="Nomor Handphone" /></TD></tr>


             <tr><td>Email</td>
              <TD><input type="text" class="form-control" name="email" id="email" placeholder="Email" /></TD></tr>

              <tr><td>Pangkat</td>
              <TD>
              <?php 
              $arr_pangkat = $this->cm->get_arr_dropdown("m_pangkat", 
      "id_pangkat","pangkat",'pangkat');
              echo form_dropdown("id_pangkat",$arr_pangkat,'','class="form-control" id="id_pangkat"');
              ?>
              </TD></tr>


               


              



                 

                
              
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
