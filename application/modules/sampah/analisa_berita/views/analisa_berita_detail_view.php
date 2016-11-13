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
	    <tr><td width="159">Tanggal</td><td width="451"><?php echo $tanggal; ?></td></tr>
	    <tr><td>Judul</td><td><?php echo $judul; ?></td></tr>
	    <tr><td>Topik Utama</td><td><?php echo $topik_utama; ?></td></tr>
	    <tr><td>Nama Sumber</td><td><?php 
		$arr_ns  = explode("#",$nara_sumber);
		foreach($arr_ns as $index => $value) : 
		echo ($index + 1 ) . ". ".$value."<br />";
		endforeach; 
		
		?></td></tr>
	    <tr><td>Inti Pemberitaan</td><td><?php //echo $inti_pemberitaan; 
		$arr_ns  = explode("#",$inti_pemberitaan);
		foreach($arr_ns as $index => $value) : 
		echo ($index + 1 ) . ". ".$value."<br />";
		endforeach; 
		?></td></tr>
	    <tr><td>Nilai Pemberitaan</td><td><?php echo $nilai_pemberitaan; ?></td></tr>
	    <tr><td>Langkah Antisipasi</td><td><?php 
		
		//echo $langkah_antisipasi; 
		$arr_ns  = explode("#",$langkah_antisipasi);
		foreach($arr_ns as $index => $value) : 
		echo ($index + 1 ) . ". ".$value."<br />";
		endforeach; 
		?></td></tr>
	</table>
       
</div>
              </div>
       
            </div><!-- /.col -->
          </div><!-- /.row -->