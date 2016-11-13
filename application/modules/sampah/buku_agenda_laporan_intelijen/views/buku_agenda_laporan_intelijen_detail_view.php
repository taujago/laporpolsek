   <a href="<?php echo site_url("$controller");  ?>" class="btn btn-danger"><span class="glyphicon glyphicon-arrow-left"></span> Kembali </a>  <br /><br />


  
  
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
                        <h3 class="panel-title">DETAIL DATA BUKU AGENDA LAPORAN INTELIJEN</h3>
      </div>
                      <div class="panel-body">    
        
                
        <table width="100%" class="table table-bordered">
	     <tr><td>Nomor</td><td><?php echo $nomor; ?></td></tr>
	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
	    <tr><td>Perihal</td><td><?php echo $perihal; ?></td></tr>
	    <tr><td>Lampiran</td><td><?php echo $lampiran; ?></td></tr>
	    <tr><td>Kode</td><td><?php echo $kode; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    </table>
       
</div>
                    </div>
       
            </div><!-- /.col -->
          </div><!-- /.row -->