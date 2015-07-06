<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Galery Model</title>
    <link href="<?php echo base_url("assets/eshopper"); ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url("assets/eshopper"); ?>/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url("assets/eshopper"); ?>/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo base_url("assets/eshopper"); ?>/css/price-range.css" rel="stylesheet">
    <link href="<?php echo base_url("assets/eshopper"); ?>/css/animate.css" rel="stylesheet">
	<link href="<?php echo base_url("assets/eshopper"); ?>/css/main.css" rel="stylesheet">
	<link href="<?php echo base_url("assets/eshopper"); ?>/css/responsive.css" rel="stylesheet">
	<script src="<?php echo base_url("assets/eshopper"); ?>/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/fancy_box"); ?>/source/jquery.fancybox.js?v=2.1.4"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/fancy_box"); ?>/source/jquery.fancybox.css?v=2.1.4" media="screen" />
	<script>
		$(document).ready(function(){
			$(".fancybox").fancybox();
		});
	</script>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">

			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<!--<a href="index.html"><img src="<?php echo base_url("assets/eshopper"); ?>/images/home/logo.png" alt="" /></a>-->
							<div class="companyinfo" style="margin-top:0;">
								<h2><span>Gallery</span> Model</h2>
							</div>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">

						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->

		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="<?php echo site_url(); ?>"><span class="fa fa-home"></span> Home</a></li>
								<li><a href="<?php echo site_url("news"); ?>"><span class="fa fa-volume-up"></span> News</a></li>
								<li><a href="<?php echo site_url("event"); ?>"><span class="fa fa-volume-up"></span> Event</a></li>
								<li><a href="<?php echo site_url ("daftar_agency"); ?>"><span class="fa fa-users"></span> Daftar Agency</a></li>
								<li><a href="<?php echo site_url("gallery"); ?>"><span class="fa fa-picture-o"></span> Gallery</a></li>
								<?php
								if($this->session->userdata("role") == 1 || $this->session->userdata("role") == 2){
								?>
								<li><a href="<?php echo site_url("panel"); ?>"><span class="fa fa-picture-o"></span> Panel</a></li>
								<?php
								}
								if($this->session->userdata("role")){
								?>
								<li><a href="<?php echo site_url("panel/logout"); ?>"><span class="fa fa-unlock-alt"></span> Logout</a></li>
								<?php
								} else {
								?>
								<li><a href="<?php echo site_url("login"); ?>"><span class="fa fa-unlock-alt"></span> Login</a></li>
                                <?php
								}
								?>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

	<?php
	if(isset($content))
		echo $content;
	?>

	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">

					<div class="col-sm-7">
						&nbsp;

					</div>
	                    <div class="companyinfo" style="margin-top:0;">
							<h2><span>Gallery</span> Model</h2>
						</div>
				</div>
			</div>
		</div>


		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<!--<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>-->
					&nbsp;
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	<script src="<?php echo base_url("assets/eshopper"); ?>/js/price-range.js"></script>
    <script src="<?php echo base_url("assets/eshopper"); ?>/js/jquery.scrollUp.min.js"></script>
	<script src="<?php echo base_url("assets/eshopper"); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url("assets/eshopper"); ?>/js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo base_url("assets/eshopper"); ?>/js/main.js"></script>
</body>
</html>