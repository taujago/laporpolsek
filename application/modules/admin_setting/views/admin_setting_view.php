<link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
<link href="<?php echo base_url("assets") ?>/css/jquery.dataTables.css" rel="stylesheet">

<script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>

<script src="<?php echo base_url("assets") ?>/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url("assets") ?>/js/jquery.loadJSON.js"></script>
<link href="<?php echo base_url("assets") ?>/css/eblokir.css" rel="stylesheet">

<style>

legend {
  color: #80aaff;
}

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

<!-- <div class="row" style="margin-bottom:20px;">
       <div class="col-md-6">

    
        <div class="input-group">
        <div class="col-md-12"  style="padding-left: 0px; padding-right: 2px;">
            <input id="txt_cari" type="text" Placeholder="Cari nama" class="form-control"   /></div>
             <div class="col-md-6"  style="padding-left: 0px; padding-right: 0px;">
            <?php 
            $arr_level = $this->cm->get_arr_dropdown("m_level","id","level","id");

            $arr_level = $this->cm->add_arr_head($arr_level,"x","== SEMUA LEVEL ==");

            echo form_dropdown("txt_level",$arr_level,'','id="txt_level" class="form-control"');
            ?>
           </div>  
            <span id="btn_cari" class="input-group-addon btn" >
            <span class="glyphicon glyphicon-search"></span> Cari</span>
            <span id="btn_reset" class="input-group-addon btn" >
            <span class="glyphicon glyphicon-ban-circle"></span> Reset</span>
        </div>
        </div>
    <div class="col-md-2">
         
        <a href="javascript:baru();" class="btn btn-success"><span class="glyphicon glyphicon-add"></span>Tambah Baru </a>
    </div>
</div> -->
 
<div class="row">
<div class="col-md-12">
 
  <div class='right-button-margin'> 
 
<form id="formulir" action="<?php echo site_url("admin_setting/simpan") ?>" method="post" >

<legend>Penandatangan</legend>

<div class="form-group">
    <label for="ttd_nama">Nama</label>
    <input type="text" class="form-control" id="ttd_nama" placeholder="Nama" name="ttd_nama" value="<?php echo $ttd_nama ?>" />
</div>


<div class="form-group">
    <label for="ttd_pangkat">Pangkat</label>
    <input type="text" class="form-control" id="ttd_pangkat" placeholder="Pangkat" name="ttd_pangkat" value="<?php echo $ttd_pangkat ?>">
</div>



<div class="form-group">
    <label for="ttd_nrp">NRP</label>
    <input type="text" class="form-control" id="ttd_nrp" placeholder="NRP" name="ttd_nrp" value="<?php echo $ttd_nrp ?>">
</div>


<div class="form-group">
    <label for="ttd_jabatan">Jabatan</label>
    <input type="text" class="form-control" id="ttd_jabatan" placeholder="Jabatan" name="ttd_jabatan" value="<?php echo $ttd_jabatan ?>">
</div>



<legend>Nama Polsek</legend>

<div class="form-group">
    <label for="id_polres">Polres</label>
   
    <?php 
              $arr_polres = $this->cm->get_arr_dropdown("m_polres","id_polres","nama_polres","nama_polres");


              $arr_polres = $this->cm->add_arr_head($arr_polres,"x","== PILIH POLRES ==");
              echo form_dropdown("id_polres",$arr_polres,$id_polres,'class="form-control" id="id_polres" onchange="get_data_polres(this,\'#id_polsek\',1)"');
    ?>

</div>



<div class="form-group">
    <label for="id_polres">Polsek</label>
   
   <?php 
              
              echo form_dropdown("id_polsek",$arr_polsek,$id_polsek,'class="form-control" id="id_polsek"');
              ?>

</div>


<legend>Webservice URL</legend>

<div class="form-group">
    <label for="service_url">Webservice URL</label>
    <input type="text" class="form-control" id="service_url" placeholder="Webservice URL" name="service_url" value="<?php echo $service_url ?>">
</div>

<a href="javascript:simpan();" class="btn btn-primary"><span class="glyphicon glyphicon-add"></span>SIMPAN PENGATURAN</a>

</form>
</div>    
     





<?php 
$this->load->view($controller."_view_form"); 
$this->load->view($controller."_view_js"); 
$this->load->view("js/general_js"); 

?>
