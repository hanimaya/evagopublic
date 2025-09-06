<?php 
  
  include "../../inc/config.php";
 
  $id_lk        = $_POST['id_lk'];  
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

  
  $sql   = "UPDATE tbl_lk SET tahun='$tahun',bunga='$bunga',utang='$utang',modal='$modal',laba='$laba',
            pajak='$pajak',hasil_bunga='$hasil_bunga',hasil_utang='$hasil_utang',
            hasil_modal='$hasil_modal',hasil_laba='$hasil_laba',hasil_pajak='$hasil_pajak'
            WHERE id_lk='$id_lk'";
  $query = mysql_query($sql);

  if ($query){
    ?>
        <script type="text/javascript">
        alert("Data berhasil diubah");
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