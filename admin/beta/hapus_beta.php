<?php 

    include "../../inc/config.php";

    $kode_ri = $_GET['kode_ri'];

    $sql   = "DELETE FROM tbl_ri WHERE kode_ri='$kode_ri'";
    $query = mysql_query($sql);

    echo "<script>document.location.href='../index.php?mod=ri&pg=data_ri'</script>";
 ?>