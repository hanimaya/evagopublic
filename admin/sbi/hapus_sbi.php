<?php 

    include "../../inc/config.php";

    $id_sbi = $_GET['id_sbi'];

    $sql   = "DELETE FROM tbl_sbi WHERE id_sbi='$id_sbi'";
    $query = mysql_query($sql);

    echo "<script>document.location.href='../index.php?mod=sbi&pg=data_sbi'</script>";
 ?>