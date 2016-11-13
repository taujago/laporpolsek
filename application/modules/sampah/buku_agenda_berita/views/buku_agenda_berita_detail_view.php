   <a href="<?php echo site_url("$controller/index/$this->jenis");  ?>" class="btn btn-danger"><span class="glyphicon glyphicon-arrow-left"></span> Kembali </a>  <br /><br />


  
  
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
                        <h3 class="panel-title">DETAIL DATA BUKU AGENDA BERITA <?php echo $this->ket_jenis; ?></h3>
                      </div>
                      <div class="panel-body">    
        
                
        <table width="100%" class="table table-bordered">
        <tr><td width="23%">Sifat</td><td width="77%"><?php echo $sifat; ?></td></tr>
	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
	    <tr><td>Berita Nomor</td><td><?php echo $berita_nomor; ?></td></tr>
	    <tr><td>Berita Tanggal</td><td><?php echo $berita_tanggal; ?></td></tr>
	    <tr><td>Dari</td><td><?php echo $dari; ?></td></tr>
	    <tr><td>Kepada</td><td><?php echo $kepada; ?></td></tr>
	    <tr><td>Perihal</td><td><?php echo $perihal; ?></td></tr>
	    <tr><td>Berita Jam</td><td><?php echo $berita_jam; ?></td></tr>
	    <tr><td>Jumlah Halaman</td><td><?php echo $jumlah_halaman; ?></td></tr>
	    <tr><td>Nama Petugas</td><td><?php echo $nama_petugas; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td>Jenis</td><td><?php echo $jenis; ?></td></tr>
	    
	     
	</table>
       
</div>
                    </div>
       
            </div><!-- /.col -->
          </div><!-- /.row -->