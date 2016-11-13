   <a href="<?php echo site_url("$controller");  ?>" class="btn btn-danger"><span class="glyphicon glyphicon-arrow-left"></span> Kembali </a>  
   <a target="_blank" href="<?php echo site_url("$controller/cetak_surat/$id");  ?>" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span> Cetak Surat  </a>
   
   <br /><br />


  
  
  <!--
  <div class="row">
                <div class="col-md-5">
                
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h3 class="panel-title">PELAKSANA DAN RENCANA PENYELIDIKAN</h3>
                      </div>
                      <div class="panel-body">
                        Panel content
                      </div>
                    </div>
                </div>
                <div class="col-md-5">
                
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h3 class="panel-title">CETAK DOKUMEN</h3>
                      </div>
                      <div class="panel-body">
                        Panel content
                      </div>
                    </div>

        
        
        </div>-->
  <div class='row'>
            <div class='col-xs-12'>
              
    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h3 class="panel-title">DETAIL DATA <?php echo $this->title; ?></h3>
      </div>
                      <div class="panel-body">    
        
                
       <table width="622" class="table table-bordered">
	    <tr><td width="186">Tanggal</td><td width="424"><?php echo $tanggal; ?></td></tr>
	    <tr>
	      <td>Identifikasi tugas</td><td><?php echo $identifikasi; ?></td></tr>
	    <tr>
	      <td> Uraian tugas</td><td><?php echo $uraian; ?></td></tr>
	    <tr>
	      <td>Pelaksana tugas</td><td><?php echo $pelaksana; ?></td></tr>
	    <tr>
	      <td>Sasaran pendukung</td><td><?php echo $sasaran; ?></td></tr>
	    <tr>
	      <td> Komunikasi dan koordinasi </td><td><?php echo $komunikasi; ?></td></tr>
	    <tr>
	      <td>Pelaporan dan evaluasi </td><td><?php echo $pelaporan; ?></td></tr>
	</table>
       
</div>
              </div>
       
            </div><!-- /.col -->
          </div><!-- /.row -->