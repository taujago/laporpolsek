<p>
</p>

<a href="javascript:perkembangan_baru();" class="btn btn-success"><span class="glyphicon glyphicon-add"></span>Tambah Perkembangan Kasus </a>
<p></p>

<table width="100%"  border="0" class="table table-striped 
             table-bordered table-hover dataTable no-footer" id="grid_perkembangan" role="grid">
<thead>
  <tr style="background-color:#CCC">

        <th width="15%">LIDIK/SIDIK</th>
        <th width="19%">TAHAP</th>
        <th width="19%">NO DOKUMEN</th>
        <th width="19%">TANGGAL</th>
        
        <th width="22%">KETERANGAN</th>
        <th width="5%">#</th>
         
       
    </tr>
  
</thead>
</table>




<div class="modal fade" id="perkembangan_modal" tabindex="-1" role="dialog" aria-labelledby="perkembangan_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="titleModal">Tambah Penyidik</h4>
      </div>
      <div class="modal-body">
        
<form action="" id="formulir_perkembangan" method="post" enctype="multipart/form-data">
            <table width="100%"  class='table table-bordered'>
              <tr>

                <tr><td width="30%" >APAKAH DAPAT DITINGKATKAN KE PROSES PENYIDIKAN </td>
              <TD>
              <?php 
                $arr = array(
                    "TIDAK"=>"TIDAK","YA"=>"YA");
                echo form_dropdown("proses_penyidikan",$arr,'','id="proses_penyidikan" class="form-control"');
              ?>

               </TD></tr>


               
              <tr><td>Lidik / Sidik </td>
              <TD>
              <?php 
                $arr = array(
                    'x'=>"== PILIH ==",
                    1=>"Penyidikan",2=>"Penyelidikan");
                echo form_dropdown("lidik",$arr,'','id="lidik" class="form-control"');
              ?>

               </TD></tr>


            <tr><td  >Tahap Perkembangan </td>
              <TD>
              <?php 
                echo form_dropdown("id_tahap",array(),"",'id="id_tahap" class="form-control"');
              ?>

            </TD></tr>
            

            <tr><td  >Nomor Dokumen </td>
            <TD><input type="text" name="no_dokumen" id="no_dokumen" class="form-control" placeholder="Nomor Dokumen"></TD></tr>

            <tr><td  >Tanggal proses</td>
            <TD><input type="text" name="tanggal" id="tanggal" class="form-control tanggal" placeholder="Tangal Proses" data-date-format="dd-mm-yyyy"></TD></tr>

            <tr><td  >Keterangan</td>
            <TD><textarea name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan"></textarea></TD></tr>


            <tr><td  >Pengadilan Negeri</td>
            <TD><?php 
            $arr_pn = $this->cm->get_arr_dropdown("m_pengadilan","id","pengadilan","pengadilan");
            $arr_pn = add_arr_head($arr_pn,"x","== PILIH PENGADILAN ==");

            echo form_dropdown("id_pn",$arr_pn,'','id="id_pn" class="form-control"');

            ?></TD></tr>


            <tr><td  >Lapas</td>
            <TD><?php 
            $arr_pn = $this->cm->get_arr_dropdown("m_lapas","id","lapas","lapas");
            $arr_pn = add_arr_head($arr_pn,"x","== PILIH LAPAS ==");

            echo form_dropdown("id_lapas",$arr_pn,'','id="id_lapas" class="form-control"');

            ?></TD></tr>


            <tr><td  >Upload dokumen</td>
            <TD><input type="file" name="file_dokumen" id="file_dokumen"></TD></tr>

               </table>
            <input type="hidden" name="id" value=""  id="id"  />   
            <input type="hidden" name="lap_d_id"  id="lap_d_id" value="<?php echo $lap_d_id; ?>"  /> 
            
             </form>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <!-- <button type="button" class="btn btn-primary" onclick="return perkembangan_simpan();"  >Simpan</button> -->
         <button type="button" class="btn btn-primary" onclick="return perkembangan_simpan();"  >Simpan</button>
      </div>
    </div>
  </div>
</div>