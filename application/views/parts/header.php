<!DOCTYPE html>
<html lang="en">

<head>
	<title>SIM Tenis Meja</title>
	<!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 10]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="Tracer study" />
	<meta name="keywords" content="SMKN1 talang padang">
	<meta name="author" content="Tapisdev" />
	<!-- Favicon icon -->
	<link rel="icon" href="<?php echo base_url();  ?>asset/assets/images/favicon.ico" type="image/x-icon">
	<!-- Google font-->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
	<!-- Required Fremwork -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/bower_components/bootstrap/css/bootstrap.min.css">
	<!-- waves.css -->
	<link rel="stylesheet" href="<?php echo base_url();  ?>asset/assets/pages/waves/css/waves.min.css" type="text/css" media="all">
	<!-- feather icon -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/assets/icon/feather/css/feather.css">
	<!-- Style.css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/assets/css/pages.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/bower_components/sweetalert/css/sweetalert.css">

	<!--  jquery-->
	<script type="text/javascript" src="<?php echo base_url();  ?>asset/bower_components/jquery/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();  ?>asset/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();  ?>asset/bower_components/sweetalert/js/sweetalert.min.js">
    </script>

	   <!-- star theme css -->
	   <link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/bower_components/jquery-bar-rating/css/bars-1to10.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/bower_components/jquery-bar-rating/css/bars-horizontal.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/bower_components/jquery-bar-rating/css/bars-movie.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/bower_components/jquery-bar-rating/css/bars-pill.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/bower_components/jquery-bar-rating/css/bars-reversed.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/bower_components/jquery-bar-rating/css/bars-square.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/bower_components/jquery-bar-rating/css/css-stars.css">
	
	 <!-- slick css -->
	 <link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/bower_components/slick-carousel/css/slick.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/bower_components/slick-carousel/css/slick-theme.css">
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/assets/icon/icofont/css/icofont.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/assets/icon/font-awesome/css/font-awesome.min.css">

    <!-- light-box css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/bower_components/ekko-lightbox/css/ekko-lightbox.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/bower_components/lightbox2/css/lightbox.css">

    <!-- jpro forms css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/assets/pages/j-pro/css/demo.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/assets/pages/j-pro/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/assets/pages/j-pro/css/j-pro-modern.css">

	 <!-- Data Table Css -->
	 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
</head>

<body >
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-bar"></div>
	</div>
	<div id="pcoded" class="pcoded">
      <div class="pcoded-overlay-box"></div>
      <div class="pcoded-container navbar-wrapper">
          <nav class="navbar header-navbar pcoded-header" header-theme="theme1">
              <div class="navbar-wrapper">
                  <div class="navbar-logo">
                      <div class="mobile-search waves-effect waves-light">
                          <div class="header-search">
                              <div class="main-search morphsearch-search">
                                  <div class="input-group">
                                      <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                      <input type="text" class="form-control" placeholder="Enter Keyword">
                                      <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                
                  <div class="navbar-container container-fluid">
                      <ul class="nav-left">

					  </ul>

                  </div>
              </div>
          </nav>
      </div>
        <?php
        $session = $this->session->userdata();
        ?>
