<?php 
  
  include "../../inc/config.php";

  $nama             = $_POST['nama'];
  $email            = $_POST['email'];
  $password         = md5($_POST['password']);
  $password2        = md5($_POST['password2']);

  $q = db_query( "SELECT * FROM tbl_user where email='$email'");
  if ($password != $password2){

  // check existing user
  $existing = db_fetch_array($q);

  if ($password != $password2){
    ?>
        <script type="text/javascript">
        document.location="../../index.php?mod=page/daftar&pg=daftar&act=1";
        </script>
    <?php 
  }
  else if($existing){
  ?>
        <script type="text/javascript">
        document.location="../../index.php?mod=page/daftar&pg=daftar&act=2";
        </script>
    <?php 
  } else {
    
  $sql   = "INSERT INTO tbl_user VALUES(null,'$nama','$email','$password','user')";
  $query = db_query( $sql);

  if ($query){
    ?>
        <script type="text/javascript">
        alert("Data berhasil disimpan");
        document.location="../../index.php?mod=page/daftar&pg=daftar&act=3";
        </script>
    <?php
  }
  else{
        ?>
        <script type="text/javascript">
        alert("Data gagal disimpan ");
        document.location="../../index.php?mod=page/daftar&pg=daftar";
        </script>
    <?php 
  }  
  mysqli_close($conn);
}
 ?>