<?php 
					$userdata =$this->session->userdata("userdata");
//show_array($userdata);			
					?>
<!DOCTYPE html>
<html lang="en">



<head>
<link rel="shortcut icon" href="<?php echo base_url("assets/images/favicon.ico"); ?>" />
<style type="text/css">

  #page-header {
  background-image:url('<?php echo base_url("assets/images/Admindik.png") ?>');
   height:168px;
   background-size:cover;
   border-radius : 6px;
   margin : 0px auto;
   padding: 10px;
}

.dropdown-submenu {
    position: relative;
}

.dropdown-submenu>.dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -6px;
    margin-left: -1px;
    -webkit-border-radius: 0 6px 6px 6px;
    -moz-border-radius: 0 6px 6px;
    border-radius: 0 6px 6px 6px;
}

.dropdown-submenu:hover>.dropdown-menu {
    display: block;
}

.dropdown-submenu>a:after {
    display: block;
    content: " ";
    float: right;
    width: 0;
    height: 0;
    border-color: transparent;
    border-style: solid;
    border-width: 5px 0 5px 5px;
    border-left-color: #ccc;
    margin-top: 5px;
    margin-right: -10px;
}

.dropdown-submenu:hover>a:after {
    border-left-color: #fff;
}

.dropdown-submenu.pull-left {
    float: none;
}

.dropdown-submenu.pull-left>.dropdown-menu {
    left: -100%;
    margin-left: 10px;
    -webkit-border-radius: 6px 0 6px 6px;
    -moz-border-radius: 6px 0 6px 6px;
    border-radius: 6px 0 6px 6px;
}

.separator {
  background-color: #ccc;
}


#myPleaseWait {
    z-index: 999999;
}

</style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PUSIKNAS <?php echo $title; ?></title>
<!-- 
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/jseasyui/themes/default/easyui.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/jseasyui/themes/icon.css">
 -->
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url("assets") ?>/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url("assets") ?>/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?php echo base_url("assets") ?>/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url("assets") ?>/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url("assets") ?>/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url("assets") ?>/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->




<script src="<?php echo base_url("assets") ?>/bower_components/jquery/dist/jquery.min.js"></script>
<!--<script type="text/javascript" src="<?php echo base_url(); ?>assets/jseasyui/jquery.easyui.min.js"></script>
-->
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url("assets") ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url("assets") ?>/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
   <!-- <script src="<?php echo base_url("assets") ?>/bower_components/raphael/raphael-min.js"></script>
    <script src="<?php echo base_url("assets") ?>/bower_components/morrisjs/morris.min.js"></script>
    <script src="<?php echo base_url("assets") ?>/js/morris-data.js"></script>-->

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url("assets") ?>/dist/js/sb-admin-2.js"></script>


    <link href="<?php echo base_url("assets") ?>/css/eblokir.css" rel="stylesheet">

 <script src="<?php echo base_url("assets") ?>/dist/js/sb-admin-2.js"></script>
 
 <link href="<?php echo base_url("assets") ?>/css/bootstrap-dialog.min.css" rel="stylesheet" type="text/css">

 <script src="<?php echo base_url("assets") ?>/js/bootstrap-dialog.min.js"></script>
<link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">

<script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url("assets") ?>/js/jquery.loadJSON.js"></script>

<!--  <link href="<?php echo base_url("assets") ?>/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css">
 -->


</head>

<body>

<div class="modal fade bs-example-modal-sm" id="myPleaseWait" tabindex="-1"
    role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <span class="glyphicon glyphicon-time">
                    </span>Sedang memproses. Harap Tunggu...
                 </h4>
            </div>
            <div class="modal-body">
                <div class="progress">
                    <div class="progress-bar progress-bar-info
                    progress-bar-striped active"
                    style="width: 100%">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal ends Here -->

 

    
<div class="container" >

 <div class="page-header" id="page-header">
 <!-- <H1> SISTEM PENCATATAN LAPORAN POLISI & PENYIDIKAN </H1>

 <h3> PUSIKNAS BARESKRIM POLRI  </H3> -->
</div>
 
 <!-- navigation start here --> 
 
 
<div class="navbar navbar-inverse" role="navigation">
  <div class="container">
    
    <div class="collapse navbar-collapse" style="padding-left: 0px;">       
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo site_url("index_admindik"); ?>">HOME</a></li>
        <!-- <li>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          DATA MASTER<b class="caret"></b></a>
          <ul class="dropdown-menu multi-level">
                <li><a href="<?php echo site_url("master_pangkat"); ?>">PANGKAT</a></li>
                <li><a href="<?php echo site_url("admin_polres"); ?>">POLRES</a></li>
                <li><a href="<?php echo site_url("admin_polsek"); ?>">POLSEK</a></li>
                
           </ul>
        </li> -->
        
        <li>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">LAPORAN<b class="caret"></b></a>
          <ul class="dropdown-menu multi-level">
            <li><a href="<?php echo site_url("admindik_lap_a"); ?>">LAPORAN POLISI MODEL A</a></li>
            <li><a href="<?php echo site_url("admindik_lap_b"); ?>">LAPORAN POLISI MODEL B</a></li>
            <li><a href="<?php echo site_url("admindik_lap_c"); ?>">LAPORAN POLISI MODEL C</a></li>
            <li><a href="<?php echo site_url("admindik_lap_d"); ?>">LAPORAN POLISI MODEL D</a></li>
            <li><a href="<?php echo site_url("admindik_laka"); ?>">LAPORAN LAKA LANTAS</a></li>
           </ul>
            
        </li>
        <li><a href="<?php echo site_url("admindik_penyidik"); ?>">PENYIDIK</a></li> 
        <li><a href="<?php echo site_url("login/logout"); ?>">KELUAR</a></li> 
</div>
  </div>
  </div>
 
 

<!--
<div class="container">
  <div class="navbar-template text-center">
    <h1>Bootstrap NavBar</h1>
    <p class="lead text-info">NavBar with too many childs.</p>
    <a target="_blank" href="http://bootsnipp.com/snippets/featured/multi-level-dropdown-menu-bs3">Thanks to msurguy (Multi level dropdown menu BS3)</a>
  </div>
</div>   -->    
       
       
       <!-- end of dropdown section  --> 
       
 
 <!-- end of navigation --> 
 


<div class="row">
    <div class="col-md-12">

 

        <div class="panel panel panel-success">
            <div class="panel-heading"><strong><?php echo $subtitle; ?></strong></div>            

            <div id="homepage" class="panel-body" style="min-height:300px;">
                    <?php echo $content; ?>
            </div>
        </div>
    </div>
</div>
</div>

<!-- loading page --> 


</body>

</html>
<script type="text/javascript">
 
</script>
