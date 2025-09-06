<?php 

    include "../../inc/config.php";

    $id_perusahaan = $_GET['id_perusahaan'];

    $sql   = "DELETE FROM tbl_perusahaan WHERE id_perusahaan='$id_perusahaan'";
    $query = mysql_query($sql);

    echo "<script>document.location.href='../index.php?mod=perusahaan&pg=data_perusahaan'</script>";
 ?>