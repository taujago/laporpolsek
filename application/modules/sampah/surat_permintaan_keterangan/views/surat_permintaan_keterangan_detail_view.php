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
         <tr><td width="146">Tanggal</td><td width="464"><?php echo $tanggal; ?></td></tr>
	    <tr><td>Nomor</td><td><?php echo $nomor; ?></td></tr>
	    <tr><td>Sifat</td><td><?php echo $sifat; ?></td></tr>
	    <tr><td>Lampiran</td><td><?php echo $lampiran; ?></td></tr>
	    <tr><td>Kepada</td><td><?php echo $kepada; ?></td></tr>
	    <tr><td>Di</td><td><?php echo $di; ?></td></tr>
	    <tr><td>Isi Tanggal</td><td><?php echo $isi_tanggal; ?></td></tr>
	    <tr><td>Isi Jam</td><td><?php echo $isi_jam; ?></td></tr>
	    <tr><td>Tempat</td><td><?php echo $tempat; ?></td></tr>
	    <tr><td>Bertemu Dengan</td><td><?php 
		$arr_ns  = explode("#",$bertemu_dengan);
		foreach($arr_ns as $index => $value) : 
		echo ($index + 1 ) . ". ".$value."<br />";
		endforeach; 
		
		?></td></tr>
	    <tr><td>Untuk</td><td><?php echo $untuk; ?></td></tr>
       
   
	</table>
       
</div>
              </div>
       
            </div><!-- /.col -->
          </div><!-- /.row -->