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
        
                
        <table width="100%" class="table table-bordered">
       
	     <tr><td width="25%">Tanggal</td><td width="75%"><?php echo flipdate($tanggal); ?></td></tr>
	    <tr><td>Waktu</td><td><?php echo substr($waktu,0,5); ?></td></tr>
	    <tr><td>Identitas</td><td><?php echo $identitas; ?></td></tr>
	    <tr><td>Nama Organisasi</td><td><?php echo $nama_organisasi; ?></td></tr>
	    <tr>
	      <td>Informasi yang disampaikan </td><td><?php echo $informasi; ?></td></tr>
	    <tr>
	      <td>Surat / Dokumen yang disampaikan</td><td><?php echo $surat_dokumen; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    
	    </table>
       
</div>
                    </div>
       
            </div><!-- /.col -->
          </div><!-- /.row -->