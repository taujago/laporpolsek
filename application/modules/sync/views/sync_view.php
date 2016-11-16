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

<legend>Syncronisasi</legend>
 
URL : <BR />
<?php 
echo $setting->service_url;
?>

<br />
<br />

<a href="javascript:test();" class="btn btn-success"><span class="glyphicon glyphicon-add"></span>TEST KONEKSI </a> <a href="javascript:send();" class="btn btn-primary"><span class="glyphicon glyphicon-add"></span>KIRIM DATA</a>

</form>
</div>    
     





<?php 
 
$this->load->view($controller."_view_js"); 
 

?>
