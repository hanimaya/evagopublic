<?php 
  
  include "../../inc/config.php";
 
  $kode_emiten  = $_POST['kode_emiten']; 
  $nama_emiten  = $_POST['nama_emiten']; 

  $sql   = "UPDATE tbl_emiten SET nama_emiten='$nama_emiten'        
            WHERE kode_emiten='$kode_emiten'";
  $query = mysql_query($sql);

  if ($query){
    ?>
        <script type="text/javascript">
        alert("Data berhasil diubah");
        document.location="../index.php?mod=emiten&pg=data_emiten";
        </script>
    <?php
  }
  else{
        ?>
        <script type="text/javascript">
        alert("Data gagal disimpan");
        document.location="../index.php?mod=emiten&pg=data_emiten";
        </script>
    <?php 
  }  
  mysql_close();

 ?>