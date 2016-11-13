<link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
<link href="<?php echo base_url("assets") ?>/css/jquery.dataTables.css" rel="stylesheet">

<script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>

<script src="<?php echo base_url("assets") ?>/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url("assets") ?>/js/jquery.loadJSON.js"></script>
<link href="<?php echo base_url("assets") ?>/css/eblokir.css" rel="stylesheet">

 <style type="text/css">
    .dataTables_filter {
      display: none;
    }

.datepicker{z-index:9999 !important}


 </style>

<a class="btn btn-danger" href="<?php echo site_url("$controller") ?>"><span class="glyphicon glyphicon-arrow-left"></span></i> Kembali </a>
<br />
<hr />


<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#detail" aria-controls="detail" role="tab" data-toggle="tab">Detail</a></li>
    <li role="presentation"><a href="#pasal" aria-controls="pasal" role="tab" data-toggle="tab">Pasal</a></li>

    <li role="presentation"><a href="#tersangka" aria-controls="tersangka" role="tab" data-toggle="tab">Tersangka</a></li>

     <li role="presentation"><a href="#saksi" aria-controls="saksi" role="tab" data-toggle="tab">Saksi</a></li>

     <li role="presentation"><a href="#korban" aria-controls="korban" role="tab" data-toggle="tab">Korban</a></li>

      <li role="presentation"><a href="#barangbukti" aria-controls="barangbukti" role="tab" data-toggle="tab">Barang bukti</a></li>

      <li role="presentation"><a href="#penyidik" aria-controls="penyidik" role="tab" data-toggle="tab">Penyidik</a></li>
    

     <li role="presentation"><a href="#perkembagan" aria-controls="perkembagan" role="tab" data-toggle="tab">Perkembangan kasus</a></li>
    
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="detail"> 
     

    
     <?php $this->load->view($this->controller."_view_detail_detail"); ?>
    </div>  
    <div role="tabpanel" class="tab-pane" id="pasal">
    
    
    <?php   $this->load->view($this->controller."_view_detail_pasal"); ?>

    </div>
    <div role="tabpanel" class="tab-pane" id="tersangka">
    
    <?php  $this->load->view($this->controller."_view_detail_tersangka"); ?>
       

    </div>

    <div role="tabpanel" class="tab-pane" id="saksi">

    <?php  $this->load->view($this->controller."_view_detail_saksi"); ?>
         

    </div>

    <div role="tabpanel" class="tab-pane" id="korban">
      <?php  $this->load->view($this->controller."_view_detail_korban"); ?>

    </div>

    <div role="tabpanel" class="tab-pane" id="barangbukti">

    <?php   $this->load->view($this->controller."_view_detail_barbuk"); ?>

    </div>
    <div role="tabpanel" class="tab-pane" id="penyidik">

    <?php  $this->load->view($this->controller."_view_detail_penyidik"); ?>  

    </div>
    <div role="tabpanel" class="tab-pane" id="perkembagan">

   <?php   $this->load->view($this->controller."_view_detail_perkembangan"); ?>  

    </div>
  </div>

</div>
 





<?php  $this->load->view($controller."_view_detail_js") ?>


