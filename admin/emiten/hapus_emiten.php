<?php 

    include "../../inc/config.php";

    $kode_emiten = $_GET['kode_emiten'];

    $sql   = "DELETE FROM tbl_emiten WHERE kode_emiten='$kode_emiten'";
    $query = mysql_query($sql);

    echo "<script>document.location.href='../index.php?mod=emiten&pg=data_emiten'</script>";
 ?>