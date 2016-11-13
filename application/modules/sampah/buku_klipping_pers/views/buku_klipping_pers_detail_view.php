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
                        <h3 class="panel-title">DETAIL DATA <?php echo $this->title; ?></h3>
      </div>
                      <div class="panel-body">    
        
                
       <table class="table table-bordered">
	    <tr><td width="206">Tanggal</td><td width="486"><?php echo $tanggal; ?></td></tr>
	    <tr>
	      <td>Sumber penerbitan</td><td><?php echo $sumber; ?></td></tr>
	    <tr><td>Judul</td><td><?php echo $judul; ?></td></tr>
	    <tr>
	      <td>Uraian singkat peristiwa</td><td><?php echo $uraian; ?></td></tr>
	    <tr>
	      <td>Bentuk dan kode penyimpanan</td><td><?php echo $bentuk; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	     
	</table>
       
</div>
                    </div>
       
            </div><!-- /.col -->
          </div><!-- /.row -->