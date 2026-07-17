<?php
session_start();
error_reporting(0);  
if(!isset($_SESSION["level"])){
		echo "<script>document.location.href='../index.php';</script>";
}else{

$level   = $_SESSION['level'];
$id_user = $_SESSION['id_user'];
 include "../inc/config.php";
 include "../inc/header-admin.php";
 include "../inc/sidebar-admin.php";


$pg = '';
if(!isset($_GET['pg'])) {
	
   include ('beranda/dashboard.php');
  } else if(($_GET['pg']=='dashboards')) {
	
   include ('beranda/dashboards.php');
  } else {
        $mod=$_GET['mod'];
        $pg = $_GET['pg'];
        include  $mod."/". $pg . ".php"; 
		include "../inc/footer-admin.php";

    }
}
?>