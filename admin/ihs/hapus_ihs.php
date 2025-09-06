<?php 

    include "../../inc/config.php";

    $id_ihs = $_GET['id_ihs'];

    $sql   = "DELETE FROM tbl_ihs WHERE id_ihs='$id_ihs'";
    $query = mysql_query($sql);

    echo "<script>document.location.href='../index.php?mod=ihs&pg=data_ihs'</script>";
 ?>