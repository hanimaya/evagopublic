<?php
session_start(); 
error_reporting(E_ALL);
$pg = '';

 //include "inc/config.php";
 //include "inc/function.php";
 include "inc/config.php";
 include "inc/header.php";
 

if(!isset($_GET['pg'])) {
	include "inc/slider.php";
    include ('page/beranda/beranda.php');
  } else {
        $mod=$_GET['mod'];
        $pg = $_GET['pg'];
        include  $mod."/". $pg . ".php"; }
include "inc/footer.php";
?>

            
                                                                         
              
