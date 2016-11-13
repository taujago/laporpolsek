   <a href="<?php echo site_url("$controller");  ?>" class="btn btn-danger"><span class="glyphicon glyphicon-arrow-left"></span> Kembali </a>  <br /><br />


<div class="row">
	<div class="col-md-5 center-block">
      				<div class="panel panel-default ">
                      <div class="panel-heading">
                        <h3 class="panel-title">PERALATAN INTELIJEN </h3>
                      </div>
                      <div class="panel-body">
                    <div class="btn-group btn-group-justified" 
                    role="group" aria-label="...">
  
  <div class="btn-group" role="group">
    <a class="btn btn-primary" href="<?php echo site_url("$controller/alat/$id"); ?>"><span class="glyphicon glyphicon-wrench"></span> Data Peralatan Intelijen</a>
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
    <a target="_blank" class="btn btn-success"  href="<?php echo site_url("$controller/cetak_surat/$id"); ?>"><span class="glyphicon glyphicon-print"></span>  Cetak Surat</a>
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
                        <h3 class="panel-title">DETAIL <?php echo $this->title; ?></h3>
                      </div>
                      <div class="panel-body">    
        
                
        <table width="100%" class="table table-bordered">
	     <tr><td width="20%">Tanggal</td><td width="80%"><?php echo $tanggal; ?></td></tr>
	    <tr><td>Nomor</td><td><?php echo $nomor; ?></td></tr>
	    <tr>
	      <td>Penandatangan </td><td><?php echo $ttd_nama; ?></td></tr>
	    <tr><td>Pelaksana Id</td><td><?php echo $pelaksana_nama; ?></td></tr>
	    <tr><td>Tujuan</td><td><?php echo $tujuan; ?></td></tr>
	    </table>
       
</div>
                    </div>
       
            </div><!-- /.col -->
          </div><!-- /.row -->