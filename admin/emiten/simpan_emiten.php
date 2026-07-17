<?php 
  
  include "../../inc/config.php";

  $kode_emiten  = $_POST['kode_emiten']; 
  $nama_emiten  = $_POST['nama_emiten']; 
  $tgl_ipo      = $_POST['tgl_ipo']; 

  $sql1   = db_query( "SELECT kode_emiten FROM tbl_emiten 
                         WHERE kode_emiten='$kode_emiten'");
  $query1 = db_num_rows($sql1); 
  if ($query1>=1){
    ?>
        <script type="text/javascript">
        alert("Kode emiten sudah terdaftar");
        document.location="../index.php?mod=emiten&pg=form_input_emiten&kode_emiten=<?php echo $kode_emiten?>&nama_emiten=<?php echo $nama_emiten?>";
        </script>
    <?php
  } else {

  $sql   = "INSERT INTO tbl_emiten VALUES('$kode_emiten','$nama_emiten','$tgl_ipo')";
  $query = db_query( $sql);

  if ($query){
    ?>
        <script type="text/javascript">
        alert("Data berhasil disimpan");
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
  mysqli_close($conn);
}
 ?>