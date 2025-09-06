<?php 
  
  include "../../inc/config.php";

  $id_sbi = $_POST['id_sbi'];  
  $bulan  = $_POST['bulan'];  
  $tahun  = $_POST['tahun'];  
  $nilai  = $_POST['nilai'];  

  
  $sql   = "UPDATE tbl_sbi SET bulan='$bulan',tahun='$tahun',nilai='$nilai'
            WHERE id_sbi='$id_sbi'";
  $query = mysql_query($sql);

  if ($query){
    ?>
        <script type="text/javascript">
        alert("Data berhasil diubah");
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