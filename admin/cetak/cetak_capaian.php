<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body onload="window.print() ">
<table width="100%" border="0">
  <tr>
    <td width="15%" rowspan="3"><img src="../../assets/front-end/images/logo.png" width="70%" height="70%" /></td>
    <td width="70%">&nbsp;</td>
    <td width="15%">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" bgcolor="#D6D6D6"><h1>LAPORAN DATA CAPAIAN TARGET</h1></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><table width="100%" border="1" cellspacing="0" class="data-table table table-bordered table-striped" id="dataTables1">
                  <thead>
                    <tr>
                      <th bgcolor="#CCCCCC">No</th>
                      <th bgcolor="#CCCCCC">Nama Marketing</th>
                      <th bgcolor="#CCCCCC">Jumlah Konsumen</th>
                      <th bgcolor="#CCCCCC">Tanggal</th>
                      <th bgcolor="#CCCCCC">Status</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php 
					  include "../../inc/config.php";
					  $dari_tanggal   = $_GET['dari_tanggal'];
        			  $sampai_tanggal = $_GET['sampai_tanggal'];
                      if (empty($dari_tanggal)){
                          $sql   = "SELECT tbl_pinjaman.id_marketing,COUNT(tbl_pinjaman.id_konsumen) 
                                    AS jumlah,MAX(tbl_pinjaman.tgl_pinjaman) 
                                    AS tgl_pinjaman,tbl_marketing.nama
                                    FROM tbl_pinjaman,tbl_marketing
                                    WHERE tbl_marketing.id_marketing=tbl_pinjaman.id_marketing
                                    GROUP BY tbl_pinjaman.id_marketing
                                    ORDER BY jumlah DESC";
                      } else {
                          $sql   = "SELECT tbl_pinjaman.id_marketing,COUNT(tbl_pinjaman.id_konsumen) 
                                    AS jumlah,MAX(tbl_pinjaman.tgl_pinjaman) 
                                    AS tgl_pinjaman,tbl_marketing.nama
                                    FROM tbl_pinjaman,tbl_marketing
                                    WHERE tbl_marketing.id_marketing=tbl_pinjaman.id_marketing
                                    AND tbl_pinjaman.tgl_pinjaman BETWEEN '$dari_tanggal' 
                                    AND '$sampai_tanggal'
                                    GROUP BY tbl_pinjaman.id_marketing
                                    ORDER BY jumlah DESC";
                      }      
                        $query = mysql_query($sql)  or die(mysql_error());
                        $no  = 1;
                        while($data=mysql_fetch_array($query)){
                     ?>
                    <tr>
                      <td align="center"><?php echo $no++;?></td>
                      <td><?php echo $data['nama'];?></td>
                      <td align="center"><?php echo $data['jumlah'];?></td>
                      <td align="center"><?php echo $data['tgl_pinjaman'];?></td>
                      <td align="center">
                        <?php
                          if ($data['jumlah'] < 25){
                            echo "Belum Mencapai Target";
                          } else {
                            echo "Sudah Mencapai Target";
                          }
                        ?>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><table width="100%" border="0">
      <tr>
        <td width="79%">&nbsp;</td>
        <td width="21%">Bandarlampung, <?php echo date('Y-m-d');?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><strong>Pimpinan</strong></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>