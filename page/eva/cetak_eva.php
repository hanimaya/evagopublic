<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body onload="window.print();" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" bgcolor="#F0F0F0"><strong><h2>ECONOMIC VALUE ADDED </h2><?php echo $_GET['nama_emiten']?></strong></td>
  </tr>
  <tr>
    <td><table id="example1" width="100%" border="1" cellpadding="0" cellspacing="0" >
      <tr>
        <td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
        <td width="368" align="center">Prosedur</td>
        <?php
						include "../../inc/config.php";
						$kode_emiten  = $_GET['kode_emiten'];
						$dari_tahun   = $_GET['dari_tahun'];
    					$sampai_tahun = $_GET['sampai_tahun'];
                        $sql_tahun  = db_query( "SELECT tbl_emiten.kode_emiten,tbl_lk.tahun
                                                  FROM tbl_emiten,tbl_lk
                                                  WHERE tbl_emiten.kode_emiten=tbl_lk.kode_emiten
                                                  AND tbl_lk.tahun BETWEEN '$dari_tahun' 
                                                  AND '$sampai_tahun'
                                                  AND tbl_emiten.kode_emiten='$kode_emiten'");
                        while($data_tahun = db_fetch_assoc($sql_tahun)){ 
                      ?>
        <th style="text-align:center;"><?php echo $data_tahun['tahun'];?></th>
        <?php } ?>
      </tr>
      <tr>
        <td align="center">1</td>
        <td align="center">&nbsp;</td>
        <td>Menghitung Ongkos Modal Hutang (Cost Of Debt)</td>
        <?php 
                      $sampai = db_num_rows($sql_tahun); 
                      for ($x=1;$x<=$sampai;$x++) {
                    ?>
        <td>&nbsp;</td>
        <?php } ?>
      </tr>
      <!-- BEBAN BUNGA-->
      <tr>
        <td align="center">&nbsp;</td>
        <td align="center">1.1</td>
        <td>Beban Bunga</td>
        <?php
                      $sql1  = db_query( "SELECT bunga FROM tbl_lk 
                                             WHERE kode_emiten='$kode_emiten'
                                             AND tahun BETWEEN '$dari_tahun' 
                                             AND '$sampai_tahun'");
                      while($data1 = db_fetch_assoc($sql1)){
                    ?>
        <td align="right"><?php
                        $bunga = $data1['bunga'];
                        echo "Rp ".number_format($bunga,0,",",".");  
                      ?></td>
        <?php } ?>
      </tr>
      <!-- UTANG JANGKA PANJANG-->
      <tr>
        <td align="center">&nbsp;</td>
        <td align="center">1.2</td>
        <td>Utang Jangka Panjang</td>
        <?php
                        $sql2  = db_query( "SELECT utang FROM tbl_lk 
                                             WHERE kode_emiten='$kode_emiten'
                                             AND tahun BETWEEN '$dari_tahun' 
                                             AND '$sampai_tahun'");
                        while($data2 = db_fetch_assoc($sql2)){
                    ?>
        <td align="right"><?php
                        $utang = $data2['utang'];
                        echo "Rp ".number_format($utang,0,",",".");  
                      ?></td>
        <?php } ?>
      </tr>
      <!-- BUNGA PERSEN -->
      <tr>
        <td align="center">&nbsp;</td>
        <td align="center">1.3</td>
        <td>Bunga (%)</td>
        <?php
                        $sql3  = db_query( "SELECT bunga,utang FROM tbl_lk 
                                             WHERE kode_emiten='$kode_emiten'
                                             AND tahun BETWEEN '$dari_tahun' 
                                             AND '$sampai_tahun'");
                        while($data3 = db_fetch_assoc($sql3)){
                    ?>
        <td align="right"><?php
                        $bunga_persen = $data3['bunga'] / $data3['utang'];
                        echo number_format($bunga_persen,2,",",".")."%";  
                      ?></td>
        <?php } ?>
      </tr>
      <!-- TARIF PAJAK PENGHASILAN -->
      <tr>
        <td align="center">&nbsp;</td>
        <td align="center">1.4</td>
        <td>Tarif Pajak    Penghasilan (t)</td>
        <?php
                        $sql4  = db_query( "SELECT laba,pajak FROM tbl_lk 
                                             WHERE kode_emiten='$kode_emiten'
                                             AND tahun BETWEEN '$dari_tahun' 
                                             AND '$sampai_tahun'");
                        while($data4 = db_fetch_assoc($sql4)){
                    ?>
        <td align="right"><?php 
                        $tarif_penghasilan = $data4['pajak'] / $data4['laba'];
                        echo number_format($tarif_penghasilan,2,",",".")."%";  
                      ?></td>
        <?php } ?>
      </tr>
      <!-- FAKTOR KOREKSI -->
      <tr>
        <td align="center">&nbsp;</td>
        <td align="center">1.5</td>
        <td>Faktor Koreksi (1-t)</td>
        <?php
                        $sql5  = db_query( "SELECT laba,pajak FROM tbl_lk 
                                             WHERE kode_emiten='$kode_emiten'
                                             AND tahun BETWEEN '$dari_tahun' 
                                             AND '$sampai_tahun'");
                        while($data5 = db_fetch_assoc($sql5)){
                    ?>
        <td align="right"><?php 
                        $faktor = 1 - ($data5['pajak'] / $data5['laba']);
                        echo number_format($faktor,2,",",".")."%";  
                      ?></td>
        <?php } ?>
      </tr>
      <!-- COST OF DEBT -->
      <tr>
        <td align="center">&nbsp;</td>
        <td align="center">1.6</td>
        <td>Cost Of Debt</td>
        <?php
                        $sql6  = db_query( "SELECT kode_emiten,tahun,bunga,utang,laba,pajak FROM tbl_lk 
                                             WHERE kode_emiten='$kode_emiten'
                                             AND tahun BETWEEN '$dari_tahun' 
                                             AND '$sampai_tahun'");
                        while($data6 = db_fetch_assoc($sql6)){
                    ?>
        <td align="right"><?php
                        $kode_emiten_cost = $data6['kode_emiten']; 
                        $tahun_cost       = $data6['tahun']; 
                        $bunga_persen     = $data6['bunga'] / $data6['utang'];
                        $faktor           = 1 - ($data6['pajak'] / $data6['laba']);
                        $cost             = $faktor * $bunga_persen;
                        echo number_format($cost,2,",",".")."%";
                       

                      ?></td>
        <?php } ?>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
        <td>&nbsp;</td>
        <?php 
                      $sampai = db_num_rows($sql_tahun); 
                      for ($x=1;$x<=$sampai;$x++) {
                    ?>
        <td>&nbsp;</td>
        <?php } ?>
      </tr>
      <tr>
        <td align="center">2</td>
        <td align="center">&nbsp;</td>
        <td>Menghitung Ongkos Modal Saham (Cost Of Capital)</td>
        <?php 
                      $sampai = db_num_rows($sql_tahun); 
                      for ($x=1;$x<=$sampai;$x++) {
                    ?>
        <td>&nbsp;</td>
        <?php } ?>
      </tr>
      <!-- RF TANPA RESIKO -->
      <tr>
        <td align="center">&nbsp;</td>
        <td align="center">2.1</td>
        <td>rf (Tanpa Resiko)</td>
        <?php
                        $sql7  = db_query( "SELECT tbl_sbi.tahun,SUM(tbl_sbi.nilai) AS total_nilai 
                                              FROM tbl_sbi
                                              WHERE tbl_sbi.tahun BETWEEN '$dari_tahun'
                                              AND '$sampai_tahun'
                                              GROUP BY tahun");
                        while($data7 = db_fetch_assoc($sql7)){
                    ?>
        <td align="right"><?php 
                        $tahun_sbi   = $data7['tahun'];
                        $total_nilai = $data7['total_nilai'];
                        $total_bagi  = $total_nilai / 100;
                        $total_rf    = $total_bagi / 12;
                        echo number_format($total_rf,2,",",".");
                       
                      ?></td>
        <?php } ?>
      </tr>
      <!-- BETA -->
      <tr>
        <td width="24" align="center">&nbsp;</td>
        <td width="33" align="center">2.2</td>
        <td>Beta (ᵝ) </td>
        <?php
                        $sql7  = db_query( "SELECT tbl_ri.tahun,SUM(tbl_ihs.nilai_rm) AS total_rm,
                                              SUM(tbl_ri.nilai_ri) AS total_ri,SUM(tbl_beta.x2) 
                                              AS total_x2,SUM(tbl_beta.xy) AS total_xy,
                                              tbl_ihs.tahun AS tahun_ihs,tbl_beta.kode_emiten
                                              FROM tbl_ihs,tbl_ri,tbl_beta  
                                              WHERE tbl_ihs.bulan=tbl_ri.bulan
                                              AND tbl_ihs.tahun=tbl_ri.tahun
                                              AND tbl_ihs.bulan=tbl_beta.bulan
                                              AND tbl_ihs.tahun=tbl_beta.tahun
                                              AND tbl_ri.kode_emiten=tbl_beta.kode_emiten
                                              AND tbl_beta.kode_emiten='$kode_emiten'
                                              AND tbl_ri.tahun BETWEEN '$dari_tahun' 
                                              AND '$sampai_tahun'
                                              GROUP BY tbl_ri.tahun");
                        while($data7 = db_fetch_assoc($sql7)){
                    ?>
        <td align="right"><?php 
                        $tahun_ihs        = $data7['tahun_ihs'];
                        $kode_emiten_beta = $data7['kode_emiten'];
                        $total_rm = $data7['total_rm'];
                        $total_ri = $data7['total_ri'];
                        $total_x2 = $data7['total_x2'];
                        $total_xy = $data7['total_xy'];
                        $beta    = ((5*$total_xy)-($total_rm*$total_ri))/(5*($total_rm*$total_rm)-$total_x2);
                        echo number_format($beta,2,",","."); 
                         
                      ?></td>
        <?php } ?>
      </tr>
      <!-- RM TINGKAT BUNGA PASAR -->
      <tr>
        <td align="center">&nbsp;</td>
        <td align="center">2.3</td>
        <td>rm (Tingkat Bunga    Pasar)</td>
        <?php
                        $sql7  = db_query( "SELECT tbl_ihs.tahun,SUM(tbl_ihs.nilai_rm) AS total_nilai 
                                              FROM tbl_ihs
                                              WHERE tbl_ihs.tahun BETWEEN '$dari_tahun' 
                                              AND '$sampai_tahun'
                                              GROUP BY tahun");
                        while($data7 = db_fetch_assoc($sql7)){
                    ?>
        <td align="right"><?php 
                        $tahun_ihs   = $data7['tahun'];
                        $total_nilai = $data7['total_nilai'];
                        $total_rm  = $total_nilai / 12;
                        echo number_format($total_rm,3,",","."); 
                         
                      ?></td>
        <?php } ?>
      </tr>
      <!-- ONGKOS MODAL SAHAM -->
      <tr>
        <td align="center">&nbsp;</td>
        <td align="center">2.4</td>
        <td>Ongkos Modal Saham (KE)</td>
        <?php
                        $sql7  = db_query( "SELECT tbl_rf.tahun,tbl_rf.total_rf,
                                              tbl_totalbeta.kode_emiten,
                                              tbl_totalbeta.total_beta,
                                              tbl_rm.rata_rm
                                              FROM tbl_rf,tbl_totalbeta,tbl_rm
                                              WHERE tbl_rf.tahun=tbl_totalbeta.tahun
                                              AND tbl_rf.tahun=tbl_rm.tahun
                                              AND tbl_totalbeta.kode_emiten='$kode_emiten'
                                              AND tbl_totalbeta.tahun BETWEEN '$dari_tahun'
                                              AND '$sampai_tahun'
                                              GROUP BY tbl_rf.tahun");
                        while($data7 = db_fetch_assoc($sql7)){
                    ?>
        <td align="right"><?php
                        $kode_emiten_om    = $data7['kode_emiten'];
                        $tahun_om          = $data7['tahun'];
                        $total_rf          = $data7['total_rf'];
                        $total_beta        = $data7['total_beta'];
                        $rata_rm           = $data7['rata_rm'];
                        $ongkos            = $total_rf + $total_beta * ($rata_rm - $total_rf);
                        echo number_format($ongkos,2,",",".");

                         
                      ?></td>
        <?php } ?>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
        <td>&nbsp;</td>
        <?php 
                      $sampai = db_num_rows($sql_tahun); 
                      for ($x=1;$x<=$sampai;$x++) {
                    ?>
        <td>&nbsp;</td>
        <?php } ?>
      </tr>
      <tr>
        <td align="center">3</td>
        <td align="center">&nbsp;</td>
        <td>Struktur Modal</td>
        <?php 
                      $sampai = db_num_rows($sql_tahun); 
                      for ($x=1;$x<=$sampai;$x++) {
                    ?>
        <td>&nbsp;</td>
        <?php } ?>
      </tr>
      <!-- UTANG JANGKA PANJANG -->
      <tr>
        <td align="center">&nbsp;</td>
        <td align="center">3.1</td>
        <td>Utang Jangka Panjang</td>
        <?php
                        $sql2  = db_query( "SELECT utang FROM tbl_lk 
                                             WHERE kode_emiten='$kode_emiten'
                                             AND tahun BETWEEN '$dari_tahun' 
                                             AND '$sampai_tahun'");
                        while($data2 = db_fetch_assoc($sql2)){
                    ?>
        <td align="right"><?php
                        $utang = $data2['utang'];
                        echo "Rp ".number_format($utang,0,",",".");  
                      ?></td>
        <?php } ?>
      </tr>
      <!-- MODAL SAHAM -->
      <tr>
        <td align="center">&nbsp;</td>
        <td align="center"> 3.2 </td>
        <td> Modal Saham </td>
        <?php
                        $sql2  = db_query( "SELECT modal FROM tbl_lk 
                                             WHERE kode_emiten='$kode_emiten'
                                             AND tahun BETWEEN '$dari_tahun' 
                                             AND '$sampai_tahun'");
                        while($data2 = db_fetch_assoc($sql2)){
                    ?>
        <td align="right"><?php
                        $modal = $data2['modal'];
                        echo "Rp ".number_format($modal,0,",",".");  
                      ?></td>
        <?php } ?>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
        <td align="center">3.3</td>
        <td>Jumlah Modal</td>
        <?php
                        $sql2  = db_query( "SELECT utang,modal FROM tbl_lk 
                                             WHERE kode_emiten='$kode_emiten'
                                             AND tahun BETWEEN '$dari_tahun' 
                                             AND '$sampai_tahun'");
                        while($data2 = db_fetch_assoc($sql2)){
                    ?>
        <td align="right"><?php
                        $utang  = $data2['utang'];
                        $modal  = $data2['modal'];
                        $jumlah = $utang + $modal;
                        echo "Rp ".number_format($jumlah,0,",",".");  
                      ?></td>
        <?php } ?>
      </tr>
      <!-- KOMPOSISI UTANG -->
      <tr>
        <td align="center">&nbsp;</td>
        <td align="center">3.4</td>
        <td>Komposisi Utang</td>
        <?php
                        $sql2  = db_query( "SELECT kode_emiten,utang,modal,tahun FROM tbl_lk 
                                             WHERE kode_emiten='$kode_emiten'
                                             AND tahun BETWEEN '$dari_tahun' 
                                             AND '$sampai_tahun'");
                        while($data2 = db_fetch_assoc($sql2)){
                    ?>
        <td align="right"><?php
                        $kode_emiten_ku  = $data2['kode_emiten'];
                        $tahun_ku        = $data2['tahun'];
                        $utang           = $data2['utang'];
                        $modal           = $data2['modal'];
                        $jumlah          = $utang + $modal;
                        $jumlah_ku       = $utang / $jumlah;
                        echo number_format($jumlah_ku,2,",",".")."%";
                         

                      ?></td>
        <?php } ?>
      </tr>
      <!-- KOMPOSISI MODAL SAHAM -->
      <tr>
        <td align="center">&nbsp;</td>
        <td align="center">3.5</td>
        <td>Komposisi Modal Saham</td>
        <?php
                        $sql2  = db_query( "SELECT kode_emiten,tahun,utang,modal FROM tbl_lk 
                                             WHERE kode_emiten='$kode_emiten'
                                             AND tahun BETWEEN '$dari_tahun' 
                                             AND '$sampai_tahun'");
                        while($data2 = db_fetch_assoc($sql2)){
                    ?>
        <td align="right"><?php
                        $kode_emiten_saham  = $data2['kode_emiten'];
                        $tahun_saham        = $data2['tahun'];
                        $utang              = $data2['utang'];
                        $modal              = $data2['modal'];
                        $jumlah             = $utang + $modal;
                        $jumlah_utang       = $utang / $jumlah;
                        $jumlah_saham       = 1 - $jumlah_utang;
                        echo number_format($jumlah_saham,2,",",".")."%";
                         

                      ?></td>
        <?php } ?>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
        <td>&nbsp;</td>
        <?php 
                      $sampai = db_num_rows($sql_tahun); 
                      for ($x=1;$x<=$sampai;$x++) {
                    ?>
        <td>&nbsp;</td>
        <?php } ?>
      </tr>
      <tr>
        <td align="center">4</td>
        <td align="center">&nbsp;</td>
        <td>Ongkos Modal    Rata-rata tertimbang (WACC)</td>
        <?php 
                      $sampai = db_num_rows($sql_tahun); 
                      for ($x=1;$x<=$sampai;$x++) {
                    ?>
        <td>&nbsp;</td>
        <?php } ?>
      </tr>
      <!-- WACC -->
      <tr>
        <td align="center">&nbsp;</td>
        <td align="center">4.1</td>
        <td>WACC</td>
        <?php
                        $sql2  = db_query( "SELECT tbl_ku.kode_emiten,tbl_ku.tahun,tbl_ku.nilai_ku,
                                              tbl_cost.nilai_cost,tbl_saham.nilai_saham,tbl_om.nilai_om
                                              FROM tbl_ku,tbl_cost,tbl_saham,tbl_om
                                              WHERE tbl_ku.kode_emiten=tbl_cost.kode_emiten
                                              AND tbl_ku.tahun=tbl_cost.tahun
                                              AND tbl_ku.kode_emiten=tbl_saham.kode_emiten
                                              AND tbl_ku.tahun=tbl_saham.tahun
                                              AND tbl_ku.kode_emiten=tbl_om.kode_emiten
                                              AND tbl_ku.tahun=tbl_om.tahun
                                              AND tbl_ku.kode_emiten='$kode_emiten'
                                              AND tbl_ku.tahun BETWEEN '$dari_tahun' 
                                              AND '$sampai_tahun'");
                        while($data2 = db_fetch_assoc($sql2)){
                    ?>
        <td align="right"><?php
                        $kode_emiten_wacc   = $data2['kode_emiten'];
                        $tahun_wacc         = $data2['tahun'];
                        $nilai_ku           = $data2['nilai_ku'];
                        $nilai_cost         = $data2['nilai_cost'];
                        $nilai_saham        = $data2['nilai_saham'];
                        $nilai_om           = $data2['nilai_om'];
                        $jumlah_wacc        = ($nilai_ku * $nilai_cost) + ($nilai_saham *$nilai_om);
                        echo number_format($jumlah_wacc,3,",",".");
                         
                      ?></td>
        <?php } ?>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
        <td>&nbsp;</td>
        <?php 
                      $sampai = db_num_rows($sql_tahun); 
                      for ($x=1;$x<=$sampai;$x++) {
                    ?>
        <td>&nbsp;</td>
        <?php } ?>
      </tr>
      <tr>
        <td align="center">5</td>
        <td align="center">&nbsp;</td>
        <td>Economic Value Added    (EVA)</td>
        <?php 
                      $sampai = db_num_rows($sql_tahun); 
                      for ($x=1;$x<=$sampai;$x++) {
                    ?>
        <td>&nbsp;</td>
        <?php } ?>
      </tr>
      <!-- LABA SEBELUM PAJAK -->
      <tr>
        <td align="center">&nbsp;</td>
        <td align="center"> 5.1 </td>
        <td> Laba Sebelum Pajak </td>
        <?php
                        $sql_laba  = db_query( "SELECT laba FROM tbl_lk 
                                             WHERE kode_emiten='$kode_emiten'
                                             AND tahun BETWEEN '$dari_tahun' 
                                             AND '$sampai_tahun'");
                        while($data_laba = db_fetch_assoc($sql_laba)){
                    ?>
        <td align="right"><?php 
                        $laba = $data_laba['laba'];
                        echo "Rp ".number_format($laba,0,",",".");  
                      ?></td>
        <?php } ?>
      </tr>
      <!-- BEBAN BUNGA -->
      <tr>
        <td align="center">&nbsp;</td>
        <td align="center">5.2</td>
        <td>Beban Bunga</td>
        <?php
                      $sql1  = db_query( "SELECT bunga FROM tbl_lk 
                                             WHERE kode_emiten='$kode_emiten'
                                             AND tahun BETWEEN '$dari_tahun' 
                                             AND '$sampai_tahun'");
                      while($data1 = db_fetch_assoc($sql1)){
                    ?>
        <td align="right"><?php
                        $bunga = $data1['bunga'];
                        echo "Rp ".number_format($bunga,0,",",".");  
                      ?></td>
        <?php } ?>
      </tr>
      <!-- LABA  SEBELUM BUNGA -->
      <tr>
        <td align="center">&nbsp;</td>
        <td align="center">5.3</td>
        <td>Laba Sebelum Bunga    &amp; Pajak</td>
        <?php
                      $sql1  = db_query( "SELECT laba,bunga FROM tbl_lk 
                                             WHERE kode_emiten='$kode_emiten'
                                             AND tahun BETWEEN '$dari_tahun' 
                                             AND '$sampai_tahun'");
                      while($data1 = db_fetch_assoc($sql1)){
                    ?>
        <td align="right"><?php
                        $laba  = $data1['laba'];
                        $bunga = $data1['bunga'];
                        $laba_sebelum = $laba + $bunga;
                        echo "Rp ".number_format($laba_sebelum,0,",",".");  
                      ?></td>
        <?php } ?>
      </tr>
      <!-- BEBAN PAJAK -->
      <tr>
        <td align="center">&nbsp;</td>
        <td align="center"> 5.4 </td>
        <td> Beban Pajak </td>
        <?php
                      $sql1  = db_query( "SELECT pajak FROM tbl_lk 
                                             WHERE kode_emiten='$kode_emiten'
                                             AND tahun BETWEEN '$dari_tahun' 
                                             AND '$sampai_tahun'");
                      while($data1 = db_fetch_assoc($sql1)){
                    ?>
        <td align="right"><?php
                        $pajak = $data1['pajak'];
                        echo "Rp ".number_format($pajak,0,",",".");  
                      ?></td>
        <?php } ?>
      </tr>
      <!-- WACC -->
      <tr>
        <td align="center">&nbsp;</td>
        <td align="center">5.5</td>
        <td>WACC</td>
        <?php
                      $sql_wacc  = db_query( "SELECT * FROM tbl_wacc 
                                             WHERE kode_emiten='$kode_emiten'
                                             AND tahun BETWEEN '$dari_tahun' 
                                             AND '$sampai_tahun'");
                      while($data_wacc = db_fetch_assoc($sql_wacc)){
                    ?>
        <td align="right"><?php
                        $data_waccnya = $data_wacc['nilai_wacc'];
                        echo number_format($data_waccnya,2,",",".");  
                      ?></td>
        <?php } ?>
      </tr>
      <!-- EVA -->
      <tr>
        <td align="center">&nbsp;</td>
        <td align="center">5.6</td>
        <td>EVA</td>
        <?php
                      $sql1  = db_query( "SELECT tbl_lk.*,tbl_wacc.nilai_wacc 
                                            FROM tbl_lk,tbl_wacc 
                                            WHERE tbl_lk.kode_emiten=tbl_wacc.kode_emiten
                                            AND tbl_lk.tahun=tbl_wacc.tahun
                                            AND tbl_lk.kode_emiten='$kode_emiten'
                                            AND tbl_lk.tahun BETWEEN '$dari_tahun' 
                                            AND '$sampai_tahun'");
                      while($data1 = db_fetch_assoc($sql1)){
                    ?>
        <td align="right"><?php
                        $kode_emiten_eva  = $data1['kode_emiten'];
                        $tahun_eva        = $data1['tahun'];
                        $laba             = $data1['laba'];
                        $laba             = $data1['laba'];
                        $bunga            = $data1['bunga'];
                        $pajak            = $data1['pajak'];
                        $wacc             = $data1['nilai_wacc'];
                        $laba_sebelum     = $laba + $bunga;
                        $jumlah_eva       = $laba_sebelum - $pajak - $wacc;
                        echo "Rp ".number_format($jumlah_eva,2,",",".");

                        
                      ?></td>
        <?php } ?>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>