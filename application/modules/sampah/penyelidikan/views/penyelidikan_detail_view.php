   <a href="<?php echo site_url("$controller");  ?>" class="btn btn-danger"><span class="glyphicon glyphicon-arrow-left"></span> Kembali </a>  <br /><br />


<div class="row">
	<div class="col-md-5 center-block">
      				<div class="panel panel-default ">
                      <div class="panel-heading">
                        <h3 class="panel-title">PELAKSANA & RENCANA PENYELIDIKAN</h3>
                      </div>
                      <div class="panel-body">
                    <div class="btn-group btn-group-justified" 
                    role="group" aria-label="...">
  <div class="btn-group" role="group">
    <a  class="btn btn-primary" href="<?php echo site_url("$controller/rencana/$penyelidikan_id"); ?>"><span class="glyphicon glyphicon-list"></span>  Rencana Penyelidikan</a>
  </div>
  <div class="btn-group" role="group">
    <a class="btn btn-primary" href="<?php echo site_url("$controller/pelaksana/$penyelidikan_id"); ?>"><span class="glyphicon glyphicon-user"></span>  Pelaksana Penyelidikan</a>
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
    <a target="_blank" class="btn btn-success" href="<?php echo site_url("$controller/cetak_rencana/$penyelidikan_id"); ?>"><span class="glyphicon glyphicon-print"></span> Cetak Rencana Penyelidikan</a>
  </div>
  <div class="btn-group" role="group">
    <a target="_blank" class="btn btn-success"  href="<?php echo site_url("$controller/cetak_surat_perintah/$penyelidikan_id"); ?>"><span class="glyphicon glyphicon-print"></span>  Cetak Surat Perintah</a>
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
                        <h3 class="panel-title">DETAIL DATA PENYELIDIKAN</h3>
                      </div>
                      <div class="panel-body">    
        
                
        <table width="100%" class="table table-bordered">
	    <tr><td width="286"> Tgl Daftar</td><td width="683"><?php echo $penyelidikan_tgl_daftar; ?></td></tr>
	    <tr>
	      <td>Tentang </td>
	      <td><?php echo $penyelidikan_tentang; ?></td>
	      </tr>
	    <tr><td> Tgl Terima Perintah</td><td><?php echo $penyelidikan_tgl_terima_perintah; ?></td></tr>
	    <tr>
	      <td> Nomor Surat </td><td><?php echo $penyelidikan_nomor; ?></td></tr>
	    <tr>
	      <td> Tgl Surat Penyelidikan</td><td><?php echo $penyelidikan_tgl; ?></td></tr>
	    <tr><td> Hasil Pelaksanaan</td><td><?php echo $penyelidikan_hasil_pelaksanaan; ?></td></tr>
	    <tr><td> Waktu Pelaporan</td><td><?php echo $penyelidikan_waktu_pelaporan; ?></td></tr>
	    <tr><td> Keterangan</td><td><?php echo $penyelidikan_keterangan; ?></td></tr>
	    <tr><td> Isi Perintah</td><td><?php echo $penyelidikan_isi_perintah; ?></td></tr>
	    <tr>
	      <td>Dasar Hukum Point 3</td>
	      <td><?php echo $dasar_point_3; ?></td>
	      </tr>
	    <tr>
	      <td>Dasar Hukum Point 7 </td>
	      <td><?php echo $dasar_point_7; ?></td>
	      </tr>
	    <tr>
	      <td>Pertimbangan Point a. </td>
	      <td><?php echo $pertimbangan_point_a; ?></td>
	      </tr>
	    </table>
       
</div>
                    </div>
       
            </div><!-- /.col -->
          </div><!-- /.row -->