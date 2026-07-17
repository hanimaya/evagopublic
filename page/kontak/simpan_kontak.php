<?php 
  
  include "../../inc/config.php";

  $nama   = $_POST['nama'];
  $email  = $_POST['email'];
  $pesan  = $_POST['pesan'];

 

  $sql   = "INSERT INTO tbl_kontak VALUES(null,'$nama','$email','$pesan')";
  $query = db_query( $sql);

  if ($query){
    ?>
        <script type="text/javascript">
        alert("Pesan berhasil dikirim");
        document.location="../../index.php?mod=page/kontak&pg=kontak";
        </script>
    <?php
  }
  else{
        ?>
        <script type="text/javascript">
        alert("Pesan gagal dikirim");
        document.location="../../index.php?mod=page/kontak&pg=kontak";
        </script>
    <?php 
  }  
  mysqli_close($conn);

 ?>