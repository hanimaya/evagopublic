<?php 
  
  include "../../inc/config.php";
 
  $kode_perusahaan  = $_POST['kode_perusahaan']; 
  $nama_perusahaan  = $_POST['nama_perusahaan']; 

  $sql   = "UPDATE tbl_perusahaan SET nama_perusahaan='$nama_perusahaan'        
            WHERE kode_perusahaan='$kode_perusahaan'";
  $query = mysql_query($sql);

  if ($query){
    ?>
        <script type="text/javascript">
        alert("Data berhasil diubah");
        document.location="../index.php?mod=perusahaan&pg=data_perusahaan";
        </script>
    <?php
  }
  else{
        ?>
        <script type="text/javascript">
        alert("Data gagal disimpan");
        document.location="../index.php?mod=perusahaan&pg=data_perusahaan";
        </script>
    <?php 
  }  
  mysql_close();

 ?>