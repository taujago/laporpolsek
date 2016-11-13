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
    

      <li role="presentation"><a href="#penyidik" aria-controls="penyidik" role="tab" data-toggle="tab">Penyidik</a></li>
    

     <li role="presentation"><a href="#perkembagan" aria-controls="perkembagan" role="tab" data-toggle="tab">Perkembangan kasus</a></li>
    
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="detail"> 

    <?php $this->load->view($this->controller."_view_detail_detail"); ?>
    </div>  
    
    
    
    <div role="tabpanel" class="tab-pane" id="penyidik">
        <H5>PENYIDIK </H5>
    <?php  $this->load->view($this->controller."_view_detail_penyidik"); ?>  

    </div>
    <div role="tabpanel" class="tab-pane" id="perkembagan">
    <H5>PERKEMBANGAN KASUS </H5>
   <?php   $this->load->view($this->controller."_view_detail_perkembangan"); ?>  

    </div>
  </div>

</div>
 





<?php  $this->load->view($controller."_view_detail_js") ?>


