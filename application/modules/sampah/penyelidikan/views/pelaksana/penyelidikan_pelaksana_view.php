<link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
<link href="<?php echo base_url("assets") ?>/css/jquery.dataTables.css" rel="stylesheet">

<script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>

<script src="<?php echo base_url("assets") ?>/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url("assets") ?>/js/jquery.loadJSON.js"></script>
<link href="<?php echo base_url("assets") ?>/css/eblokir.css" rel="stylesheet">

<style>

</style>
  
<div class="row" style="margin-bottom:20px;">
     
     
<div class="col-md-3">
   <a href="<?php echo $back_link  ?>" class="btn btn-danger"><span class="glyphicon glyphicon-arrow-left"></span> Kembali </a>      
        <a href="<?php echo $baru_link  ?>" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Tambah Baru </a>
    </div>
</div>
 
<div class="row">
<div class="col-md-12">
 
  <div class='right-button-margin'> 
 
<table width="100%"  border="0" class="table table-striped 
             table-bordered table-hover dataTable no-footer" id="leasing" role="grid">
<thead>
	<tr style="background-color:#CCC">
	  <th width="8%">NO.</th>

        <th width="16%">NIP</th>
        <th width="18%">NRP</th>
        <th width="23%">NAMA</th>
        <th width="23%">JABATAN</th>
        <th width="12%">PROSES</th>
    </tr>
	
</thead>
</table>

</div>    
     


 



<?php $this->load->view($controller."_pelaksana_view_js") ?>
