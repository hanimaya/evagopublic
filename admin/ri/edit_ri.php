<?php 
  error_reporting(0);
  include "../../inc/config.php";
 
  $id_ri        = $_POST['id_ri'];  
  $kode_emiten  = $_POST['kode_emiten'];  
  $nama_emiten  = $_POST['nama_emiten'];
  $bulan        = $_POST['bulan'];  
  $tahun        = $_POST['tahun'];
  $nilai_pi     = $_POST['nilai_pi'];

  if ($bulan=='Januari'){
    $tahun_lalu = $tahun - 1;
    $sql1     = mysql_query("SELECT nilai_pi FROM tbl_ri 
                             WHERE kode_emiten='$kode_emiten'
                             AND bulan='Desember' AND tahun='$tahun_lalu'");
    $data1    = mysql_fetch_assoc($sql1);
    $pi_lalu  = $data1['nilai_pi'];
    $nilai_ri = ($nilai_pi - $pi_lalu) / $pi_lalu;
  } 

    else if ($bulan=='Februari'){
      $sql1     = mysql_query("SELECT nilai_pi FROM tbl_ri 
                               WHERE kode_emiten='$kode_emiten'
                               AND bulan='Januari' AND tahun='$tahun'");
      $data1    = mysql_fetch_assoc($sql1);
      $pi_lalu  = $data1['nilai_pi'];
      $nilai_ri = ($nilai_pi - $pi_lalu) / $pi_lalu;
  } 

    else if ($bulan=='Maret'){
      $sql1     = mysql_query("SELECT nilai_pi FROM tbl_ri 
                               WHERE kode_emiten='$kode_emiten'
                               AND bulan='Februari' AND tahun='$tahun'");
      $data1    = mysql_fetch_assoc($sql1);
      $pi_lalu  = $data1['nilai_pi'];
      $nilai_ri = ($nilai_pi - $pi_lalu) / $pi_lalu;
  } 

    else if ($bulan=='April'){
      $sql1     = mysql_query("SELECT nilai_pi FROM tbl_ri 
                               WHERE kode_emiten='$kode_emiten'
                               AND bulan='Maret' AND tahun='$tahun'");
      $data1    = mysql_fetch_assoc($sql1);
      $pi_lalu  = $data1['nilai_pi'];
      $nilai_ri = ($nilai_pi - $pi_lalu) / $pi_lalu;
  } 

    else if ($bulan=='Mei'){
      $sql1     = mysql_query("SELECT nilai_pi FROM tbl_ri 
                               WHERE kode_emiten='$kode_emiten'
                               AND bulan='April' AND tahun='$tahun'");
      $data1    = mysql_fetch_assoc($sql1);
      $pi_lalu  = $data1['nilai_pi'];
      $nilai_ri = ($nilai_pi - $pi_lalu) / $pi_lalu;
  } 

    else if ($bulan=='Juni'){
      $sql1     = mysql_query("SELECT nilai_pi FROM tbl_ri 
                               WHERE kode_emiten='$kode_emiten'
                               AND bulan='Mei' AND tahun='$tahun'");
      $data1    = mysql_fetch_assoc($sql1);
      $pi_lalu  = $data1['nilai_pi'];
      $nilai_ri = ($nilai_pi - $pi_lalu) / $pi_lalu;
  } 

    else if ($bulan=='Juli'){
      $sql1     = mysql_query("SELECT nilai_pi FROM tbl_ri 
                               WHERE kode_emiten='$kode_emiten'
                               AND bulan='Juni' AND tahun='$tahun'");
      $data1    = mysql_fetch_assoc($sql1);
      $pi_lalu  = $data1['nilai_pi'];
      $nilai_ri = ($nilai_pi - $pi_lalu) / $pi_lalu;
  } 

    else if ($bulan=='Agustus'){
      $sql1     = mysql_query("SELECT nilai_pi FROM tbl_ri 
                               WHERE kode_emiten='$kode_emiten'
                               AND bulan='Juli' AND tahun='$tahun'");
      $data1    = mysql_fetch_assoc($sql1);
      $pi_lalu  = $data1['nilai_pi'];
      $nilai_ri = ($nilai_pi - $pi_lalu) / $pi_lalu;
  } 

    else if ($bulan=='September'){
      $sql1     = mysql_query("SELECT nilai_pi FROM tbl_ri 
                               WHERE kode_emiten='$kode_emiten'
                               AND bulan='Agustus' AND tahun='$tahun'");
      $data1    = mysql_fetch_assoc($sql1);
      $pi_lalu  = $data1['nilai_pi'];
      $nilai_ri = ($nilai_pi - $pi_lalu) / $pi_lalu;
  } 

    else if ($bulan=='Oktober'){
      $sql1     = mysql_query("SELECT nilai_pi FROM tbl_ri 
                               WHERE kode_emiten='$kode_emiten'
                               AND bulan='September' AND tahun='$tahun'");
      $data1    = mysql_fetch_assoc($sql1);
      $pi_lalu  = $data1['nilai_pi'];
      $nilai_ri = ($nilai_pi - $pi_lalu) / $pi_lalu;
  } 

    else if ($bulan=='November'){
      $sql1     = mysql_query("SELECT nilai_pi FROM tbl_ri 
                               WHERE kode_emiten='$kode_emiten'
                               AND bulan='Oktober' AND tahun='$tahun'");
      $data1    = mysql_fetch_assoc($sql1);
      $pi_lalu  = $data1['nilai_pi'];
      $nilai_ri = ($nilai_pi - $pi_lalu) / $pi_lalu;
  } 

    else if ($bulan=='Desember'){
      $sql1     = mysql_query("SELECT nilai_pi FROM tbl_ri 
                               WHERE kode_emiten='$kode_emiten'
                               AND bulan='November' AND tahun='$tahun'");
      $data1    = mysql_fetch_assoc($sql1);
      $pi_lalu  = $data1['nilai_pi'];
      $nilai_ri = ($nilai_pi - $pi_lalu) / $pi_lalu;
  }

  $sql   = "UPDATE tbl_ri SET bulan='$bulan',tahun='$tahun',nilai_pi='$nilai_pi',nilai_ri='$nilai_ri'
            WHERE id_ri='$id_ri'";
  $query = mysql_query($sql);

  if ($query){
    ?>
        <script type="text/javascript">
        alert("Data berhasil diubah");
        document.location="../index.php?mod=ri&pg=data_ri&kode_emiten=<?php echo $kode_emiten?>&nama_emiten=<?php echo $nama_emiten?>";
        </script>
    <?php
  }
  else{
        ?>
        <script type="text/javascript">
        alert("Data gagal disimpan");
        document.location="../index.php?mod=ri&pg=data_ri&kode_emiten=<?php echo $kode_emiten?>&nama_emiten=<?php echo $nama_emiten?>";
        </script>
    <?php 
  }  
  mysql_close();

 ?>