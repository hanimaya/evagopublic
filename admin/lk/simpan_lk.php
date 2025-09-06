<?php 
  
  include "../../inc/config.php";
 
  $id_user      = $_POST['id_user'];  
  $kode_emiten  = $_POST['kode_emiten'];  
  $nama_emiten  = $_POST['nama_emiten'];  
  $tahun        = $_POST['tahun'];  
  $bunga        = $_POST['bunga'];  
  $utang        = $_POST['utang'];  
  $modal        = $_POST['modal'];  
  $laba         = $_POST['laba'];  
  $pajak        = $_POST['pajak'];

  $hasil_bunga  = $bunga / 1000;  
  $hasil_utang  = $utang / 1000;  
  $hasil_modal  = $modal / 1000;  
  $hasil_laba   = $laba  / 1000;  
  $hasil_pajak  = $pajak / 1000;  

  
  $sql   = "INSERT INTO tbl_lk VALUES(null,'$kode_emiten','$id_user','$tahun','$bunga','$utang','$modal','$laba',
            '$pajak','$hasil_bunga','$hasil_utang','$hasil_modal','$hasil_laba','$hasil_pajak')";
  $query = mysql_query($sql);

  if ($query){
    ?>
        <script type="text/javascript">
        alert("Data berhasil disimpan");
        document.location="../index.php?mod=lk&pg=data_lk&kode_emiten=<?php echo $kode_emiten?>&nama_emiten=<?php echo $nama_emiten?>";
        </script>
    <?php
  }
  else{
        ?>
        <script type="text/javascript">
        alert("Data gagal disimpan");
        document.location="../index.php?mod=lk&pg=data_lk&kode_emiten=<?php echo $kode_emiten?>&nama_emiten=<?php echo $nama_emiten?>";
        </script>
    <?php 
  }  
  mysql_close();

 ?>