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
	   <tr><td width="184">Tanggal</td><td width="426"><?php echo $tanggal; ?></td></tr>
	    <tr><td>Sasaran</td><td><?php echo $sasaran; ?></td></tr>
	    <tr><td>Kondisi</td><td><?php echo $kondisi; ?></td></tr>
	    <tr><td>Kekuatan</td><td><?php echo $kekuatan; ?></td></tr>
	    <tr><td>Kelemahan</td><td><?php echo $kelemahan; ?></td></tr>
	    <tr><td>Kehendak</td><td><?php echo $kehendak; ?></td></tr>
	    <tr><td>Oposisi Aktif</td><td><?php echo $oposisi_aktif; ?></td></tr>
	    <tr><td>Oposisi Pasif</td><td><?php echo $oposisi_pasif; ?></td></tr>
	    <tr><td>Oposisi Pendukung</td><td><?php echo $oposisi_pendukung; ?></td></tr>
	</table>
       
</div>
              </div>
       
            </div><!-- /.col -->
          </div><!-- /.row -->