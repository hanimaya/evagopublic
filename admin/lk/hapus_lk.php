<?php 

    include "../../inc/config.php";

    $kode_emiten = $_GET['kode_emiten'];
    $nama_emiten = $_GET['nama_emiten'];
    $id_lk = $_GET['id_lk'];

    $sql   = "DELETE FROM tbl_lk WHERE id_lk='$id_lk'";
    $query = mysql_query($sql);

    echo "<script>document.location.href='../index.php?mod=lk&pg=data_lk&kode_emiten=$kode_emiten&nama_emiten=$nama_emiten'</script>";
 ?>