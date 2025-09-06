<?php 
  
  include "../../inc/config.php";

  $kode_perusahaan  = $_POST['kode_perusahaan']; 
  $nama_perusahaan  = $_POST['nama_perusahaan']; 

  $sql1   = mysql_query("SELECT kode_perusahaan FROM tbl_perusahaan 
                         WHERE kode_perusahaan='$kode_perusahaan'");
  $query1 = mysql_num_rows($sql1); 
  if ($query1>=1){
    ?>
        <script type="text/javascript">
        alert("Kode perusahaan sudah terdaftar");
        document.location="../index.php?mod=perusahaan&pg=form_input_perusahaan&kode_perusahaan=<?php echo $kode_perusahaan?>&nama_perusahaan=<?php echo $nama_perusahaan?>";
        </script>
    <?php
  } else {

  $sql   = "INSERT INTO tbl_perusahaan VALUES('$kode_perusahaan','$nama_perusahaan')";
  $query = mysql_query($sql);

  if ($query){
    ?>
        <script type="text/javascript">
        alert("Data berhasil disimpan");
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
}
 ?>