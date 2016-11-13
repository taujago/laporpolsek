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
        <tr>
          <td width="30%">Rubrik</td><td width="70%"><?php echo strtoupper($jenis); ?></td></tr>
	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
	    <tr><td>Waktu</td><td><?php echo $waktu; ?></td></tr>
	    <tr><td>Sumber</td><td><?php echo $sumber; ?></td></tr>
	    <tr><td>Nilai Data</td><td><?php echo $nilai_data; ?></td></tr>
	    <tr><td>Uraian</td><td><?php echo $uraian; ?></td></tr>
	    <tr><td>Catatan</td><td><?php echo $catatan; ?></td></tr>
	    <tr><td>Disposisi</td><td><?php echo $disposisi; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    
	    </table>
       
</div>
                    </div>
       
            </div><!-- /.col -->
          </div><!-- /.row -->