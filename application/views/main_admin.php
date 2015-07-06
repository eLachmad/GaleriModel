<?php
session_start();
if($this->session->userdata("role") == 1 || $this->session->userdata("role") == 2){
	// echo "coba";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Agency</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <script src="<?php echo base_url(); ?>assets/todo_admin/js/jquery.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/todo_admin/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/todo_admin/css/animate.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/todo_admin/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/todo_admin/css/font.css" type="text/css" cache="false" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/todo_admin/css/plugin.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/todo_admin/css/app.css" type="text/css" />
  <!--[if lt IE 9]>
    <script src="js/ie/respond.min.js" cache="false"></script>
    <script src="js/ie/html5.js" cache="false"></script>
    <script src="js/ie/fix.js" cache="false"></script>
  <![endif]-->
</head>
<body>
  <section class="hbox stretch">
    <!-- .aside -->
    <aside class="aside aside-custom bg-dark dker nav-vertical" id="nav">
      <section class="vbox">
        <header class="bg-black nav-bar">
          <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav">
            <i class="fa fa-bars"></i>
          </a>
          <a href="#" class="nav-brand" data-toggle="fullscreen">Agency</a>
          <a class="btn btn-link visible-xs" data-toggle="collapse" data-target=".navbar-collapse">
            <i class="fa fa-comment-o"></i>
          </a>
        </header>
        <section>
          <!-- nav -->
          <nav class="nav-primary hidden-xs">
            <ul class="nav">
              <li>
                <a href="<?php echo site_url("home"); ?>">
                  <i class="fa fa-home"></i>
                  <span>Home</span>
                </a>
              </li>
			  <?php
			  if($this->session->userdata("role") == 1){
			  ?>
			  <li class="dropdown-submenu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-shopping-cart"></i>
                  <span>Master User</span>
                </a>
                <ul class="dropdown-menu">                
                  <li>
                    <a href="<?php echo site_url("user/member"); ?>">Daftar Member</a>                    
                  </li>
                  <li>
                    <a href="<?php echo site_url("user/agency"); ?>">Daftar Agency</a>              
                  </li>
                </ul>
              </li>
			  <?php
			  } else {
			  ?>
              <li>
                <a href="<?php echo site_url("model"); ?>">
                  <i class="fa fa-book"></i>
                  <span>Model</span>
                </a>
              </li>
			  <li>
                <a href="<?php echo site_url("news_event"); ?>">
                  <i class="fa fa-book"></i>
                  <span>News & Event</span>
                </a>
              </li>
			  <?php
			  }
			  ?>
              <!--<li class="dropdown-submenu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-shopping-cart"></i>
                  <span></span>
                </a>
                <ul class="dropdown-menu">                
                  <li>
                    <a href="<?php echo base_url("pemesanan"); ?>">Pemesanan Produk</a>                    
                  </li>
                  <li>
                    <a href="<?php echo base_url("pemesanan/terbayar"); ?>">Pemesanan Sudah Terbayar</a>              
                  </li>
                </ul>
              </li>-->
              <!--<li>
                <a href="<?php echo base_url(); ?>user">
                  <i class="fa fa-user"></i>
                  <span>Data User</span>
                </a>
              </li>-->
			  <!--<li>
                <a href="<?php echo base_url("pemesanan/report"); ?>">
                  <i class="fa fa-print"></i>
                  <span>Cetak Laporan Penjualan</span>
                </a>
              </li>-->
            </ul>
          </nav>
          <!-- / nav -->
        </section>
        <footer class="footer bg-gradient hidden-xs">
          <a href="<?php echo site_url("panel/logout"); ?>" class="btn btn-sm btn-link m-r-n-xs pull-right">
            <i class="fa fa-power-off"></i>
          </a>
          <a href="#nav" data-toggle="class:nav-vertical" class="btn btn-sm btn-link m-l-n-sm">
            <i class="fa fa-bars"></i>
          </a>
        </footer>
      </section>
    </aside>
    <!-- /.aside -->
    <!-- .vbox -->
    <section id="content">
      <section class="vbox">
        <header class="header bg-black navbar navbar-inverse">
          <div class="collapse navbar-collapse pull-in">
            <ul class="nav navbar-nav navbar-right">
              <li class="hidden-xs">
                <!--<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o text-white"></i>
                  <span class="badge up bg-info m-l-n-sm">2</span>
                </a>
                <section class="dropdown-menu animated fadeInUp input-s-lg">
                  <section class="panel bg-white">
                    <header class="panel-heading">
                      <strong>You have <span class="count-n">2</span> notifications</strong>
                    </header>
                    <div class="list-group">
                      <a href="#" class="media list-group-item">
                        <span class="pull-left thumb-sm">
                          <img src="<?php echo base_url(); ?>assets/todo_admin/images/avatar.jpg" alt="John said" class="img-circle">
                        </span>
                        <span class="media-body block m-b-none">
                          Use awesome animate.css<br>
                          <small class="text-muted">28 Aug 13</small>
                        </span>
                      </a>
                      <a href="#" class="media list-group-item">
                        <span class="media-body block m-b-none">
                          1.0 initial released<br>
                          <small class="text-muted">27 Aug 13</small>
                        </span>
                      </a>
                    </div>
                    <footer class="panel-footer text-sm">
                      <a href="#" class="pull-right"><i class="fa fa-cog"></i></a>
                      <a href="#">See all the notifications</a>
                    </footer>
                  </section>
                </section>-->
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!--<span class="thumb-sm avatar pull-left m-t-n-xs m-r-xs">
                    <img src="<?php echo base_url(); ?>assets/todo_admin/images/avatar.jpg">
                  </span>-->
                  <?php echo $this->session->userdata("username"); ?> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu animated fadeInLeft">
                  <!--<li>
                    <a href="<?php echo site_url("user/ubah_password"); ?>">Ubah Password</a>
                  </li>-->
                  <li>
                    <a href="<?php echo site_url("panel/logout"); ?>">Logout</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </header>
        <section class="scrollable" id="pjax-container">
		
			<div class="col-sm-12">
				<?php
				if(isset($content)){
					echo $content;
				}
				?>
			</div>
        </section>
      </section>
      <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
    </section>
    <!-- /.vbox -->
  </section>  
  <!-- Bootstrap -->
  <script src="<?php echo base_url(); ?>assets/todo_admin/js/bootstrap.js"></script>
  <!-- Sparkline Chart -->
  <script src="<?php echo base_url(); ?>assets/todo_admin/js/charts/sparkline/jquery.sparkline.min.js"></script>
  <!-- App -->
  <script src="<?php echo base_url(); ?>assets/todo_admin/js/app.js"></script>
  <script src="<?php echo base_url(); ?>assets/todo_admin/js/app.plugin.js"></script>
  <script src="<?php echo base_url(); ?>assets/todo_admin/js/libs/jquery.pjax.js" cache="false"></script>
  <!-- Sparkline Chart -->
  <script src="<?php echo base_url(); ?>assets/todo_admin/js/charts/sparkline/jquery.sparkline.min.js"></script>
  <!-- Easy Pie Chart -->
  <script src="<?php echo base_url(); ?>assets/todo_admin/js/charts/easypiechart/jquery.easy-pie-chart.js"></script>
  <!-- Morris -->
  <script src="<?php echo base_url(); ?>assets/todo_admin/js/charts/morris/raphael-min.js" cache="false"></script>
  <script src="<?php echo base_url(); ?>assets/todo_admin/js/charts/morris/morris.min.js" cache="false"></script>
</body>
</html>
<?php
} else {
	redirect(site_url("login"));
	// echo $this->session->userdata("username");
	// echo "tefsdsdf";
}
?>