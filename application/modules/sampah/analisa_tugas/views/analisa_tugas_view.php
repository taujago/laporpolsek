<link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
<link href="<?php echo base_url("assets") ?>/css/jquery.dataTables.css" rel="stylesheet">

<script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>

<script src="<?php echo base_url("assets") ?>/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url("assets") ?>/js/jquery.loadJSON.js"></script>
<link href="<?php echo base_url("assets") ?>/css/eblokir.css" rel="stylesheet">

<style>

</style>



<div class="row">
  <div id="salah" class="col-lg-12" style="display:none">
            <div class="alert alert-danger" role="alert" id="message">
            	
            </div>
        </div>
    </div>
    
  <div class="row">
  <div id="benar" class="col-lg-12" style="display:none">
            <div class="alert alert-success" role="alert" id="message2">
            	
            </div>
        </div>
    </div> 

<div class="row" style="margin-bottom:20px;">
     
    <div class="col-md-2" style="padding-right: 0px;">
    	<input data-date-format="dd-mm-yyyy"   id="tgl_awal" type="text" Placeholder="Tanggal Awal" class="form-control tanggal"   />
    </div>
    
     
  <div class="col-md-4" style="padding-left: 2px;">
    <div class="input-group">
      <input data-date-format="dd-mm-yyyy"  id="tgl_akhir" type="text" Placeholder="Tanggal Akhir" class="form-control tanggal "   />
           
            <span id="btn_cari" class="input-group-addon btn" >
            <span class="glyphicon glyphicon-search"></span> Cari</span>
            <span id="btn_reset" class="input-group-addon btn" >
            <span class="glyphicon glyphicon-ban-circle"></span> Reset</span>
        </div>
    </div>
    <div class="col-md-4">
         
        <a href="<?php echo site_url("$controller/baru"); ?>" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Tambah Baru </a>
        <a onclick="cetak();" href="#" class="btn btn-info"><span class="glyphicon glyphicon-print"></span> Cetak Buku Agenda </a>
    </div>
</div>
 
<div class="row">
<div class="col-md-12">
 
  <div class='right-button-margin'> 
 
<table width="100%"  border="0" class="table table-striped 
             table-bordered table-hover dataTable no-footer" id="leasing" role="grid">
<thead>
	<tr style="background-color:#CCC">
	  <th width="5%" align="center">NO.</th>

        <th width="10%" align="center">TANGGAL</th>
        <th width="42%" align="center">IDENTIFIKASI TUGAS</th>
        <th width="35%" align="center">URAIAN TUGAS</th>
        <th width="8%" align="center">PELAKSANA</th>
        <th width="8%" align="center">PROSES</th>
    </tr>
	
</thead>
</table>

</div>    
     


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">PILIH PERIODE CETAK</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="control-label">BULAN:</label>
            <?php 
			$bulan = intval(date("m"));
			echo form_dropdown("bulan",$arr_bulan,$bulan,'id="bulan" class="form-control"');
			?>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">TAHUN:</label>
            <input type="text" class="form-control" id="tahun" value="<?php echo date("Y"); ?>">
          </div>
           
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button onclick="cetak_go();" type="button" class="btn btn-primary">Cetak</button>
      </div>
    </div>
  </div>
</div>

 



<?php $this->load->view($controller."_view_js") ?>
