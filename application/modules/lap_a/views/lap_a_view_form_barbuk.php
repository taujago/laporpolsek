
<div class="modal fade" id="barbuk_modal" tabindex="-1" role="dialog" aria-labelledby="barbukModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="barbukModal">Tambah Barang Bukti Baru</h4>
      </div>
      <div class="modal-body">
        


<form action="<?php echo site_url("$controller/$action/$lap_a_id") ?>" id="form_barbuk" method="post">
            <table width="100%"  class='table table-bordered'>
              <tr>
               
              <tr><td width="30%" >Barang bukti </td>
              <TD>
               <input type="text" class="form-control" name="barbuk_nama" id="barbuk_nama" placeholder="Barang bukti" /> </TD>
              </TD></tr>

           


             


              <tr><td>Jumlah </td>
              <TD>
              <input type="text" class="form-control" name="barbuk_jumlah" id="barbuk_jumlah" placeholder="Jumlah" /> </TD>
              </tr>

              <tr><td>Satuan </td>
              <TD>
              <input type="text" class="form-control" name="barbuk_satuan" id="barbuk_satuan" placeholder="Satuan" /> </TD>
              </tr>



              </table>
        <input type="hidden" name="barbuk_id" value=""  id="barbuk_id"  />
             </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary" onclick="return barbuk_simpan();"  >Simpan</button>
      </div>
    </div>
  </div>
</div>
