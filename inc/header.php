<!DOCTYPE HTML>
<html>

<!-- Mirrored from www.slashdown.nl/starhotel/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Nov 2014 17:40:50 GMT -->
<head>
<meta charset="utf-8">
<title>Aplikasi Perhitungan EVA Perusahaan</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="shortcut icon" href="assets/front-end/images/logo.ico">

<!-- Stylesheets -->
<link rel="stylesheet" href="assets/front-end/css/animate.css">
<link rel="stylesheet" href="assets/front-end/css/bootstrap.css">
<link rel="stylesheet" href="assets/front-end/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/front-end/css/dataTables.bootstrap.css">
<link rel="stylesheet" href="assets/front-end/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/front-end/css/owl.carousel.css">
<link rel="stylesheet" href="assets/front-end/css/owl.theme.css">
<link rel="stylesheet" href="assets/front-end/css/prettyPhoto.css">
<link rel="stylesheet" href="assets/front-end/css/smoothness/jquery-ui-1.10.4.custom.min.css">
<link rel="stylesheet" href="assets/front-end/rs-plugin/css/settings.css">
<link rel="stylesheet" href="assets/front-end/css/theme.css">
<link rel="stylesheet" href="assets/front-end/css/colors/turquoise.css" id="switch_style">
<link rel="stylesheet" href="assets/front-end/css/responsive.css">
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600,700">

<!-- Javascripts --> 
<script type="text/javascript" src="assets/front-end/js/jquery-1.11.1.min.js"></script> 
<script type="text/javascript" src="assets/front-end/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/front-end/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/front-end/js/dataTables.bootstrap.js"></script>  
        <script type="text/javascript">
            $(function() {
                $('#example1').dataTable();
            });
        </script> 
<script type="text/javascript" src="assets/front-end/js/bootstrap-hover-dropdown.min.js"></script> 
<script type="text/javascript" src="assets/front-end/js/owl.carousel.min.js"></script> 
<script type="text/javascript" src="assets/front-end/js/jquery.parallax-1.1.3.js"></script>
<script type="text/javascript" src="assets/front-end/js/jquery.nicescroll.js"></script>  
<script type="text/javascript" src="assets/front-end/js/jquery.prettyPhoto.js"></script> 
<script type="text/javascript" src="assets/front-end/js/jquery-ui-1.10.4.custom.min.js"></script> 
<script type="text/javascript" src="assets/front-end/js/jquery.jigowatt.js"></script> 
<script type="text/javascript" src="assets/front-end/js/jquery.sticky.js"></script> 
<script type="text/javascript" src="assets/front-end/js/waypoints.min.js"></script> 
<script type="text/javascript" src="assets/front-end/js/jquery.isotope.min.js"></script> 
<script type="text/javascript" src="assets/front-end/js/jquery.gmap.min.js"></script> 
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="assets/front-end/rs-plugin/js/jquery.themepunch.plugins.min.js"></script> 
<script type="text/javascript" src="assets/front-end/rs-plugin/js/jquery.themepunch.revolution.min.js"></script> 
<script type="text/javascript" src="assets/front-end/js/switch.js"></script> 
<script type="text/javascript" src="assets/front-end/js/custom.js"></script> 
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-50960990-1', 'slashdown.nl');
  ga('send', 'pageview');
</script>
</head>

<body>

<header>
  <!-- Navigation -->
  <div class="navbar yamm navbar-default" id="sticky">
    <div class="container">
      <div class="navbar-header">
        <button type="button" data-toggle="collapse" data-target="#navbar-collapse-grid" class="navbar-toggle"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

        <a href="index.php" class="navbar-brand">         
        <!-- Logo -->
      <div id="logo"> 
      <img id="default-logo" src="assets/front-end/images/logo.png" style="height:50px;"> </div>
        </a> 
        
      </div>
      <div id="navbar-collapse-grid" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">

          <?php 
          	$pg = isset($_GET['pg']) ? $_GET['pg'] : '';
          	if ($pg==''){
          		$beranda = "active";
          	}else if ($pg=='tentang') {
              $tentang = "active";
            }else if ($pg=='eva' || $pg=='rincian_eva') {
              $eva = "active";
            }else if ($_GET['pg']=='kontak') {
              $kontak = "active";
            }else if ($_GET['pg']=='daftar') {
              }else if ($pg=='kontak') {
                $kontak = "active";
              }else if ($pg=='daftar') {
              $daftar = "active";
            }else{
          		$login = "active";
          	}
          ?>
          <li class="dropdown <?php echo $beranda;?>"> <a href="index.php">Beranda</a>
          </li>
          <li class="dropdown <?php echo $tentang;?>"> <a href="index.php?mod=page/tentang&pg=tentang">Tentang Kami</a>
          <li class="dropdown <?php echo $eva;?>"> <a href="index.php?mod=page/eva&pg=eva">EVA Perusahaan</a>
           
          </li>
          <li class="dropdown <?php echo $daftar;?>"> <a href="index.php?mod=page/daftar&pg=daftar">Daftar</a>
          </li>
          <li class="dropdown <?php echo $login;?>"> <a href="index.php?mod=page/login&pg=form_login">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</header>