   <a href="<?php echo site_url("$controller");  ?>" class="btn btn-danger"><span class="glyphicon glyphicon-arrow-left"></span> Kembali </a>  <br /><br />


<div class="row">
	<div class="col-md-5 center-block">
      				<div class="panel panel-default ">
                      <div class="panel-heading">
                        <h3 class="panel-title">PELAKSANA & RENCANA OPERASI</h3>
                      </div>
                      <div class="panel-body">
                    <div class="btn-group btn-group-justified" 
                    role="group" aria-label="...">
  <div class="btn-group" role="group">
    <a  class="btn btn-primary" href="<?php echo site_url("$controller/rencana/$id"); ?>"><span class="glyphicon glyphicon-list"></span>  Rencana Operasi</a>
  </div>
  <div class="btn-group" role="group">
    <a class="btn btn-primary" href="<?php echo site_url("$controller/pelaksana/$id"); ?>"><span class="glyphicon glyphicon-user"></span>  Pelaksana </a>
  </div>  
</div>
                      
                      </div>
                    </div>
    </div>
    
    
    <div class="col-md-5 center-block">
      				<div class="panel panel-default">
                      <div class="panel-heading">
                        <h3 class="panel-title">CETAK DOKUMEN</h3>
                      </div>
                      <div class="panel-body">
                       
                       
                                           <div class="btn-group btn-group-justified" 
                    role="group" aria-label="...">
 
  <div class="btn-group" role="group">
    <a target="_blank" class="btn btn-success"  href="<?php echo site_url("$controller/cetak_rencana/$id"); ?>"><span class="glyphicon glyphicon-print"></span>  Cetak Dokumen Target Operasi</a>
  </div>  
</div>
                       
                       
                      </div>
                    </div>
    </div>
    
</div>  
  
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
                        <h3 class="panel-title">DETAIL DATA TARGET OPERASI</h3>
                      </div>
                      <div class="panel-body">    
        
                
        <table width="100%" class="table table-bordered">
	       <tr><td>Nomor</td><td><?php echo $nomor; ?></td></tr>
	    <tr><td>Tanggal</td><td><?php echo flipdate($tanggal); ?></td></tr>
	    <tr><td>Masalah</td><td><?php echo $masalah; ?></td></tr>
	    </table>
       
</div>
                    </div>
       
            </div><!-- /.col -->
          </div><!-- /.row -->