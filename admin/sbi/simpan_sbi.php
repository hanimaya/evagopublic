<?php 
  
  include "../../inc/config.php";

  $id_user  = $_POST['id_user'];  
  $bulan    = $_POST['bulan'];  
  $tahun    = $_POST['tahun'];  
  $nilai    = $_POST['nilai'];  

  
  $sql   = "INSERT INTO tbl_sbi VALUES(null,'$id_user','$bulan','$tahun','$nilai')";
  $query = mysql_query($sql);

  if ($query){
    ?>
        <script type="text/javascript">
        alert("Data berhasil disimpan");
        document.location="../index.php?mod=sbi&pg=data_sbi";
        </script>
    <?php
  }
  else{
        ?>
        <script type="text/javascript">
        alert("Data gagal disimpan");
        document.location="../index.php?mod=sbi&pg=data_sbi";
        </script>
    <?php 
  }  
  mysql_close();

 ?>