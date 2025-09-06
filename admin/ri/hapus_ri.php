<?php 

    include "../../inc/config.php";

    $kode_emiten = $_GET['kode_emiten'];
    $nama_emiten = $_GET['nama_emiten'];
    $id_ri = $_GET['id_ri'];

    $sql   = "DELETE FROM tbl_ri WHERE id_ri='$id_ri'";
    $query = mysql_query($sql);

    echo "<script>document.location.href='../index.php?mod=ri&pg=data_ri&kode_emiten=$kode_emiten&nama_emiten=$nama_emiten'</script>";
 ?>