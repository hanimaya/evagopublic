<?php 
  error_reporting(0);
  include "../../inc/config.php";

  $id_ihs     = $_POST['id_ihs'];  
  $bulan      = $_POST['bulan'];  
  $tahun      = $_POST['tahun'];  
  $nilai_cp   = $_POST['nilai_cp'];

  if ($bulan=='Januari'){
    $tahun_lalu = $tahun - 1;
    $sql1     = mysql_query("SELECT nilai_cp FROM tbl_ihs WHERE bulan='Desember' AND tahun='$tahun_lalu'");
    $data1    = mysql_fetch_assoc($sql1);
    $cp_lalu  = $data1['nilai_cp'];
    $nilai_rm = ($nilai_cp - $cp_lalu) / $cp_lalu;
  } 

    else if ($bulan=='Februari'){
      $sql1     = mysql_query("SELECT nilai_cp FROM tbl_ihs WHERE bulan='Januari' AND tahun='$tahun'");
      $data1    = mysql_fetch_assoc($sql1);
      $cp_lalu  = $data1['nilai_cp'];
      $nilai_rm = ($nilai_cp - $cp_lalu) / $cp_lalu;
  } 

    else if ($bulan=='Maret'){
      $sql1     = mysql_query("SELECT nilai_cp FROM tbl_ihs WHERE bulan='Februari' AND tahun='$tahun'");
      $data1    = mysql_fetch_assoc($sql1);
      $cp_lalu  = $data1['nilai_cp'];
      $nilai_rm = ($nilai_cp - $cp_lalu) / $cp_lalu;
  } 

    else if ($bulan=='April'){
      $sql1     = mysql_query("SELECT nilai_cp FROM tbl_ihs WHERE bulan='Maret' AND tahun='$tahun'");
      $data1    = mysql_fetch_assoc($sql1);
      $cp_lalu  = $data1['nilai_cp'];
      $nilai_rm = ($nilai_cp - $cp_lalu) / $cp_lalu;
  } 

    else if ($bulan=='Mei'){
      $sql1     = mysql_query("SELECT nilai_cp FROM tbl_ihs WHERE bulan='April' AND tahun='$tahun'");
      $data1    = mysql_fetch_assoc($sql1);
      $cp_lalu  = $data1['nilai_cp'];
      $nilai_rm = ($nilai_cp - $cp_lalu) / $cp_lalu;
  } 

    else if ($bulan=='Juni'){
      $sql1     = mysql_query("SELECT nilai_cp FROM tbl_ihs WHERE bulan='Mei' AND tahun='$tahun'");
      $data1    = mysql_fetch_assoc($sql1);
      $cp_lalu  = $data1['nilai_cp'];
      $nilai_rm = ($nilai_cp - $cp_lalu) / $cp_lalu;
  } 

    else if ($bulan=='Juli'){
      $sql1     = mysql_query("SELECT nilai_cp FROM tbl_ihs WHERE bulan='Juni' AND tahun='$tahun'");
      $data1    = mysql_fetch_assoc($sql1);
      $cp_lalu  = $data1['nilai_cp'];
      $nilai_rm = ($nilai_cp - $cp_lalu) / $cp_lalu;
  } 

    else if ($bulan=='Agustus'){
      $sql1     = mysql_query("SELECT nilai_cp FROM tbl_ihs WHERE bulan='Juli' AND tahun='$tahun'");
      $data1    = mysql_fetch_assoc($sql1);
      $cp_lalu  = $data1['nilai_cp'];
      $nilai_rm = ($nilai_cp - $cp_lalu) / $cp_lalu;
  } 

    else if ($bulan=='September'){
      $sql1     = mysql_query("SELECT nilai_cp FROM tbl_ihs WHERE bulan='Agustus' AND tahun='$tahun'");
      $data1    = mysql_fetch_assoc($sql1);
      $cp_lalu  = $data1['nilai_cp'];
      $nilai_rm = ($nilai_cp - $cp_lalu) / $cp_lalu;
  } 

    else if ($bulan=='Oktober'){
      $sql1     = mysql_query("SELECT nilai_cp FROM tbl_ihs WHERE bulan='September' AND tahun='$tahun'");
      $data1    = mysql_fetch_assoc($sql1);
      $cp_lalu  = $data1['nilai_cp'];
      $nilai_rm = ($nilai_cp - $cp_lalu) / $cp_lalu;
  } 

    else if ($bulan=='November'){
      $sql1     = mysql_query("SELECT nilai_cp FROM tbl_ihs WHERE bulan='Oktober' AND tahun='$tahun'");
      $data1    = mysql_fetch_assoc($sql1);
      $cp_lalu  = $data1['nilai_cp'];
      $nilai_rm = ($nilai_cp - $cp_lalu) / $cp_lalu;
  } 

    else if ($bulan=='Desember'){
      $sql1     = mysql_query("SELECT nilai_cp FROM tbl_ihs WHERE bulan='November' AND tahun='$tahun'");
      $data1    = mysql_fetch_assoc($sql1);
      $cp_lalu  = $data1['nilai_cp'];
      $nilai_rm = ($nilai_cp - $cp_lalu) / $cp_lalu;
  }
  
  
  $sql   = "UPDATE tbl_ihs SET bulan='$bulan',tahun='$tahun',nilai_cp='$nilai_cp',nilai_rm='$nilai_rm'
            WHERE id_ihs='$id_ihs'";
  $query = mysql_query($sql);

  if ($query){
    ?>
        <script type="text/javascript">
        alert("Data berhasil diubah");
        document.location="../index.php?mod=ihs&pg=data_ihs";
        </script>
    <?php
  }
  else{
        ?>
        <script type="text/javascript">
        alert("Data gagal disimpan");
        document.location="../index.php?mod=ihs&pg=data_ihs";
        </script>
    <?php 
  }  
  mysql_close();

 ?>