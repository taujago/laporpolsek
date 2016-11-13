<div class="modal fade" id="pasalmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Tambah Pasal Baru</h4>
      </div>
      <div class="modal-body">
        <form id="form_pasal" method="post" action="">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Fungsi Terkait:</label>
            <?php 

            $arr_fungsi = add_arr_head($arr_fungsi,"x","= PILIH FUNGSI TERKAIT = ");
            echo form_dropdown("",$arr_fungsi,'','id="txt_id_fungsi" class="form-control"'); ?>
          </div>
          <div class="form-group">
            <label for="txt_pasal" class="control-label">Pasal:</label>
             <?php 
            echo form_dropdown("id_pasal",array(),'','id="id_pasal" class="form-control"'); ?>
          </div>
          <input type="hidden" name="id" value="" id="id" />
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary" onclick="return pasal_simpan();"  >Simpan</button>
      </div>
    </div>
  </div>
</div>

