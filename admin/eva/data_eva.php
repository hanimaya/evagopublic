  <?php
    $kode_emiten  = $_GET['kode_emiten'];
    $nama_emiten  = $_GET['nama_emiten'];
    $dari_tahun   = $_POST['dari_tahun'];
    $sampai_tahun = $_POST['sampai_tahun'];
  ?>  

    
    <!-- BEGIN CONTENT -->
    <aside class="right-side">
      <!-- BEGIN CONTENT HEADER -->
      <section class="content-header">
        <i class="fa fa-user"></i>
        <span>Data EVA <?php echo $nama_emiten ?> <?php echo $dari_tahun." - ".$sampai_tahun ?></span>
        
      </section>
      <!-- END CONTENT HEADER -->
      


    <section class="content">
        <div class="row">
          <!-- BEGIN BASIC DATATABLES -->
          <div class="col-md-12">
            <div class="grid no-border">
              <div class="grid-header">
                <i class="fa fa-rir"></i>
                <span class="grid-title">
                  <a href="index.php?mod=emiten&pg=detail_emiten&kode_emiten=<?php echo $kode_emiten ?>&nama_emiten=<?php echo $nama_emiten ?>">
                  <button type="button" class="btn btn-primary">
                        <i class="fa fa-arrow-left"></i> Kembali
                  </button>
                  </a>
                  <!--
                  <a href="index.php?mod=ri&pg=form_input_ri&kode_emiten=<?php //echo $kode_emiten ?>&nama_emiten=<?php //echo $nama_emiten ?>">
                  <button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Input</button>
                  </a>
                  -->
                </span>
                <div class="pull-right grid-tools">
                  <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
                  <a data-widget="reload" title="Reload"><i class="fa fa-refresh"></i></a>
                  <a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>
                </div>
              </div>
              <div class="grid-body">
              <form class="form-horizontal" role="form" action="" method="post" id="form_combo" name="form1">
                  
                  
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Dari Tahun</label>
                    <div class="col-sm-3">
                      <select name="dari_tahun" class="form-control" required="">
                          <?php 
                            if (empty($dari_tahun)){
                          ?>
                          <option value="">--Pilih--</option>
                          <?php } else { ?>
                            <option value="<?php echo $dari_tahun?>"><?php echo $dari_tahun?></option>
                          <?php } ?>
                          <?php 
                            for ($tahun=1990;$tahun<=2025;$tahun++){
                          ?>
                          <option value="<?php echo $tahun;?>"><?php echo $tahun;?></option>
                          <?php 
                            }
                          ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Sampai Tahun</label>
                    <div class="col-sm-3">
                      <select name="sampai_tahun" class="form-control" required="">
                          <?php 
                            if (empty($sampai_tahun)){
                          ?>
                          <option value="">--Pilih--</option>
                          <?php } else { ?>
                            <option value="<?php echo $sampai_tahun?>"><?php echo $sampai_tahun?></option>
                          <?php } ?>
                          <?php 
                            for ($tahun2=1990;$tahun2<=2025;$tahun2++){
                          ?>
                          <option value="<?php echo $tahun2;?>"><?php echo $tahun2;?></option>
                          <?php 
                            }
                          ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="btn-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Cari</button>
                        <?php 
                          if (empty($dari_tahun)){
                        ?>
                        <a href="" onclick="return confirm('Cari Tahun terlebih dahulu')">
                        <button type="button" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</button>
                        </a>
                        <?php } else { ?>
                        <a href="../page/eva/cetak_eva.php?kode_emiten=<?php echo $kode_emiten?>&amp;nama_emiten=<?php echo $nama_emiten?>&amp;dari_tahun=<?php echo $dari_tahun?>&amp;sampai_tahun=<?php echo $sampai_tahun?>" target="_blank">
                        <button type="button" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</button>
                        <?php } ?>
                      </a>                      </div>
                    </div>
                  </div>
              </form>
              <div class="box-body table-responsive">
                <table class="data-table table table-bordered table-striped" cellspacing="0" width="100%">
                  <tr>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td width="368" align="center">Prosedur</td>
                    <?php
                        $sql_tahun  = mysql_query("SELECT tbl_emiten.kode_emiten,tbl_lk.tahun
                                                  FROM tbl_emiten,tbl_lk
                                                  WHERE tbl_emiten.kode_emiten=tbl_lk.kode_emiten
                                                  AND tbl_lk.tahun BETWEEN '$dari_tahun' 
                                                  AND '$sampai_tahun'
                                                  AND tbl_emiten.kode_emiten='$kode_emiten'
                                                  AND tbl_lk.id_user='$id_user'");
                        while($data_tahun = mysql_fetch_assoc($sql_tahun)){ 
                      ?>
                      <th style="text-align:center;"><?php echo $data_tahun['tahun'];?></th>
                      <?php } ?>
                  </tr>
                  <tr>
                    <td align="center">1</td>
                    <td align="center">&nbsp;</td>
                    <td>Menghitung Ongkos Modal Hutang (Cost Of Debt)</td>
                    <?php 
                      $sampai = mysql_num_rows($sql_tahun); 
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
                      $sql1  = mysql_query("SELECT bunga FROM tbl_lk 
                                             WHERE kode_emiten='$kode_emiten'
                                             AND tahun BETWEEN '$dari_tahun' 
                                             AND '$sampai_tahun'
                                             AND id_user='$id_user'");
                      while($data1 = mysql_fetch_assoc($sql1)){
                    ?>
                    <td align="right">
                      <?php
                        $bunga = $data1['bunga'];
                        echo "Rp ".number_format($bunga,0,",",".");  
                      ?>
                    </td>
                    <?php } ?>
                  </tr>

                  <!-- UTANG JANGKA PANJANG-->
                  <tr>
                    <td align="center">&nbsp;</td>
                    <td align="center">1.2</td>
                    <td>Utang Jangka Panjang</td>
                    <?php
                        $sql2  = mysql_query("SELECT utang FROM tbl_lk 
                                             WHERE kode_emiten='$kode_emiten'
                                             AND tahun BETWEEN '$dari_tahun' 
                                             AND '$sampai_tahun'
                                             AND id_user='$id_user'");
                        while($data2 = mysql_fetch_assoc($sql2)){
                    ?>
                    <td align="right">
                      <?php
                        $utang = $data2['utang'];
                        echo "Rp ".number_format($utang,0,",",".");  
                      ?>
                    </td>
                    <?php } ?>
                  </tr>

                  <!-- BUNGA PERSEN -->
                  <tr>
                    <td align="center">&nbsp;</td>
                    <td align="center">1.3</td>
                    <td>Bunga (%)</td>
                    <?php
                        $sql3  = mysql_query("SELECT bunga,utang FROM tbl_lk 
                                             WHERE kode_emiten='$kode_emiten'
                                             AND tahun BETWEEN '$dari_tahun' 
                                             AND '$sampai_tahun'
                                             AND id_user='$id_user'");
                        while($data3 = mysql_fetch_assoc($sql3)){
                    ?>
                    <td align="right">
                      <?php
                        $bunga_persen = $data3['bunga'] / $data3['utang'];
                        echo number_format($bunga_persen,2,",",".");  
                      ?>
                    </td>
                    <?php } ?>
                  </tr>

                  <!-- TARIF PAJAK PENGHASILAN -->
                  <tr>
                    <td align="center">&nbsp;</td>
                    <td align="center">1.4</td>
                    <td>Tarif Pajak    Penghasilan (t)</td>
                    <?php
                        $sql4  = mysql_query("SELECT laba,pajak FROM tbl_lk 
                                             WHERE kode_emiten='$kode_emiten'
                                             AND tahun BETWEEN '$dari_tahun' 
                                             AND '$sampai_tahun'
                                             AND id_user='$id_user'");
                        while($data4 = mysql_fetch_assoc($sql4)){
                    ?>
                    <td align="right">
                      <?php 
                        $tarif_penghasilan = $data4['pajak'] / $data4['laba'];
                        echo number_format($tarif_penghasilan,2,",",".");  
                      ?>
                    </td>
                    <?php } ?>
                  </tr>

                  <!-- FAKTOR KOREKSI -->
                  <tr>
                    <td align="center">&nbsp;</td>
                    <td align="center">1.5</td>
                    <td>Faktor Koreksi (1-t)</td>
                    <?php
                        $sql5  = mysql_query("SELECT laba,pajak FROM tbl_lk 
                                             WHERE kode_emiten='$kode_emiten'
                                             AND tahun BETWEEN '$dari_tahun' 
                                             AND '$sampai_tahun'
                                             AND id_user='$id_user'");
                        while($data5 = mysql_fetch_assoc($sql5)){
                    ?>
                    <td align="right">
                      <?php 
                        $faktor = 1 - ($data5['pajak'] / $data5['laba']);
                        echo number_format($faktor,2,",",".");  
                      ?>
                    </td>
                    <?php } ?>
                  </tr>

                  <!-- COST OF DEBT -->
                  <tr>
                    <td align="center">&nbsp;</td>
                    <td align="center">1.6</td>
                    <td>Cost Of Debt</td>
                    <?php
                        $sql6  = mysql_query("SELECT kode_emiten,tahun,bunga,utang,laba,pajak FROM tbl_lk 
                                             WHERE kode_emiten='$kode_emiten'
                                             AND tahun BETWEEN '$dari_tahun' 
                                             AND '$sampai_tahun'
                                             AND id_user='$id_user'");
                        while($data6 = mysql_fetch_assoc($sql6)){
                    ?>
                    <td align="right">
                      <?php
                        $kode_emiten_cost = $data6['kode_emiten']; 
                        $tahun_cost       = $data6['tahun']; 
                        $bunga_persen     = $data6['bunga'] / $data6['utang'];
                        $faktor           = 1 - ($data6['pajak'] / $data6['laba']);
                        $cost             = $faktor * $bunga_persen;
                        echo number_format($cost,2,",",".");
                        $sql_cost  = mysql_query("SELECT * FROM tbl_cost
                                                  WHERE kode_emiten='$kode_emiten_cost' 
                                                  AND tahun='$tahun_cost'
                                                  AND id_user='$id_user'"); 
                            $data_cost = mysql_num_rows($sql_cost);
                            if ($data_cost==0){
                              $sql_cost2 = mysql_query("INSERT INTO tbl_cost 
                                                        VALUES (null,'$kode_emiten_cost','$id_user','$tahun_cost',
                                                        '$cost')");
                            } else if ($data_cost > 0) {
                              $sql_cost2 = mysql_query("UPDATE tbl_cost SET nilai_cost='$cost'
                                                        WHERE kode_emiten='$kode_emiten_cost' 
                                                        AND tahun='$tahun_cost'
                                                        AND id_user='$id_user'");
                            }

                      ?>
                    </td>
                    <?php } ?>
                  </tr>

                  <tr>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td>&nbsp;</td>
                    <?php 
                      $sampai = mysql_num_rows($sql_tahun); 
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
                      $sampai = mysql_num_rows($sql_tahun); 
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
                        $sql7  = mysql_query("SELECT tbl_sbi.tahun,SUM(tbl_sbi.nilai) AS total_nilai 
                                              FROM tbl_sbi
                                              WHERE tbl_sbi.tahun BETWEEN '$dari_tahun'
                                              AND '$sampai_tahun'
                                              AND id_user='$id_user'
                                              GROUP BY tahun");
                        while($data7 = mysql_fetch_assoc($sql7)){
                    ?>
                    <td align="right">
                      <?php 
                        $tahun_sbi   = $data7['tahun'];
                        $total_nilai = $data7['total_nilai'];
                        $total_bagi  = $total_nilai / 100;
                        $total_rf    = $total_bagi / 12;
                        echo number_format($total_rf,2,",",".");
                        $sql_rf  = mysql_query("SELECT * FROM tbl_rf 
                                                WHERE tahun='$tahun_sbi'
                                                AND id_user='$id_user'"); 
                            $data_rf = mysql_num_rows($sql_rf);
                            if ($data_rf==0){
                              $sql_rf2 = mysql_query("INSERT INTO tbl_rf 
                                                      VALUES (null,'$id_user','$tahun_sbi','$total_rf')");
                            } else if ($data_rf > 0) {
                              $sql_rf2 = mysql_query("UPDATE tbl_rf SET total_rf='$total_rf' 
                                                      WHERE tahun='$tahun_sbi'
                                                      AND id_user='$id_user'");
                            }   
                      ?>
                    </td>
                    <?php } ?>
                  </tr>

                  <!-- BETA -->
                  <tr>
                    <td width="24" align="center">&nbsp;</td>
                    <td width="33" align="center">2.2</td>
                    <td>Beta (ᵝ) </td>
                    <?php
                        $sql7  = mysql_query("SELECT tbl_ri.tahun,SUM(tbl_ihs.nilai_rm) AS total_rm,
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
                                              AND tbl_ihs.id_user='$id_user'
                                              GROUP BY tbl_ri.tahun");
                        while($data7 = mysql_fetch_assoc($sql7)){
                    ?>
                    <td align="right">
                      <?php 
                        $tahun_ihs        = $data7['tahun_ihs'];
                        $kode_emiten_beta = $data7['kode_emiten'];
                        $total_rm = $data7['total_rm'];
                        $total_ri = $data7['total_ri'];
                        $total_x2 = $data7['total_x2'];
                        $total_xy = $data7['total_xy'];
                        $beta    = ((5*$total_xy)-($total_rm*$total_ri))/(5*($total_rm*$total_rm)-$total_x2);
                        echo number_format($beta,2,",","."); 
                         $sql_beta  = mysql_query("SELECT * FROM tbl_totalbeta 
                                                      WHERE kode_emiten='$kode_emiten_beta' 
                                                      AND tahun='$tahun_ihs'
                                                      AND id_user='$id_user'"); 
                            $data_beta = mysql_num_rows($sql_beta);
                            if ($data_beta==0){
                              $sql_beta2 = mysql_query("INSERT INTO tbl_totalbeta VALUES (null,'$kode_emiten_beta','$id_user','$tahun_ihs','$beta')");
                            } else if ($data_beta > 0) {
                              $sql_beta2 = mysql_query("UPDATE tbl_totalbeta SET total_beta='$beta' 
                                                        WHERE kode_emiten='$kode_emiten_beta'
                                                        AND tahun='$tahun_ihs'
                                                        AND id_user='$id_user'");
                            } 
                      ?>
                    </td>
                    <?php } ?>
                  </tr>


                  <!-- RM TINGKAT BUNGA PASAR -->
                  <tr>
                    <td align="center">&nbsp;</td>
                    <td align="center">2.3</td>
                    <td>rm (Tingkat Bunga    Pasar)</td>
                    <?php
                        $sql7  = mysql_query("SELECT tbl_ihs.tahun,SUM(tbl_ihs.nilai_rm) AS total_nilai 
                                              FROM tbl_ihs
                                              WHERE tbl_ihs.tahun BETWEEN '$dari_tahun' 
                                              AND '$sampai_tahun'
                                              AND id_user='$id_user'
                                              GROUP BY tahun");
                        while($data7 = mysql_fetch_assoc($sql7)){
                    ?>
                    <td align="right">
                      <?php 
                        $tahun_ihs   = $data7['tahun'];
                        $total_nilai = $data7['total_nilai'];
                        $total_rm  = $total_nilai / 12;
                        echo number_format($total_rm,3,",","."); 
                        $sql_rm  = mysql_query("SELECT * FROM tbl_rm 
                                                  WHERE tahun='$tahun_ihs'
                                                  AND id_user='$id_user'"); 
                            $data_rm = mysql_num_rows($sql_rm);
                            if ($data_rm==0){
                              $sql_rm2 = mysql_query("INSERT INTO tbl_rm 
                                                      VALUES (null,'$id_user','$tahun_ihs','$total_rm')");
                            } else if ($data_rm > 0) {
                              $sql_rm2 = mysql_query("UPDATE tbl_rm SET rata_rm='$total_rm' 
                                                      WHERE tahun='$tahun_ihs'
                                                      AND id_user='$id_user'");
                            }  
                      ?>
                    </td>
                    <?php } ?>
                  </tr>

                  <!-- ONGKOS MODAL SAHAM -->
                  <tr>
                    <td align="center">&nbsp;</td>
                    <td align="center">2.4</td>
                    <td>Ongkos Modal Saham (KE)</td>
                    <?php
                        $sql7  = mysql_query("SELECT tbl_rf.tahun,tbl_rf.total_rf,
                                              tbl_totalbeta.kode_emiten,
                                              tbl_totalbeta.total_beta,
                                              tbl_rm.rata_rm
                                              FROM tbl_rf,tbl_totalbeta,tbl_rm
                                              WHERE tbl_rf.tahun=tbl_totalbeta.tahun
                                              AND tbl_rf.tahun=tbl_rm.tahun
                                              AND tbl_totalbeta.kode_emiten='$kode_emiten'
                                              AND tbl_totalbeta.tahun BETWEEN '$dari_tahun'
                                              AND '$sampai_tahun'
                                              AND tbl_rf.id_user='$id_user'
                                              GROUP BY tbl_rf.tahun");
                        while($data7 = mysql_fetch_assoc($sql7)){
                    ?>
                    <td align="right">
                      <?php
                        $kode_emiten_om    = $data7['kode_emiten'];
                        $tahun_om          = $data7['tahun'];
                        $total_rf          = $data7['total_rf'];
                        $total_beta        = $data7['total_beta'];
                        $rata_rm           = $data7['rata_rm'];
                        $ongkos            = $total_rf + $total_beta * ($rata_rm - $total_rf);
                        echo number_format($ongkos,2,",",".");

                        $sql_om  = mysql_query("SELECT * FROM tbl_om 
                                                WHERE kode_emiten='$kode_emiten_om' 
                                                AND tahun='$tahun_om'
                                                AND id_user='$id_user'"); 
                            $data_om = mysql_num_rows($sql_om);
                            if ($data_om==0){
                              $sql_om2 = mysql_query("INSERT INTO tbl_om 
                                                      VALUES (null,'$kode_emiten_om','$id_user','$tahun_om',
                                                      '$ongkos')");
                            } else if ($data_om > 0) {
                              $sql_om2 = mysql_query("UPDATE tbl_om SET nilai_om='$ongkos' 
                                                      WHERE kode_emiten='$kode_emiten_om'
                                                      AND tahun='$tahun_om'
                                                      AND id_user='$id_user'");
                            }  
                      ?>
                    </td>
                    <?php } ?>
                  </tr>
                  <tr>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td>&nbsp;</td>
                    <?php 
                      $sampai = mysql_num_rows($sql_tahun); 
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
                      $sampai = mysql_num_rows($sql_tahun); 
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
                        $sql2  = mysql_query("SELECT utang FROM tbl_lk 
                                             WHERE kode_emiten='$kode_emiten'
                                             AND tahun BETWEEN '$dari_tahun' 
                                             AND '$sampai_tahun'
                                             AND id_user='$id_user'");
                        while($data2 = mysql_fetch_assoc($sql2)){
                    ?>
                    <td align="right">
                      <?php
                        $utang = $data2['utang'];
                        echo "Rp ".number_format($utang,0,",",".");  
                      ?>
                    </td>
                    <?php } ?>
                  </tr>

                  <!-- MODAL SAHAM -->
                  <tr>
                    <td align="center">&nbsp;</td>
                    <td align="center"> 3.2 </td>
                    <td> Modal Saham </td>
                    <?php
                        $sql2  = mysql_query("SELECT modal FROM tbl_lk 
                                             WHERE kode_emiten='$kode_emiten'
                                             AND tahun BETWEEN '$dari_tahun' 
                                             AND '$sampai_tahun'
                                             AND id_user='$id_user'");
                        while($data2 = mysql_fetch_assoc($sql2)){
                    ?>
                    <td align="right">
                      <?php
                        $modal = $data2['modal'];
                        echo "Rp ".number_format($modal,0,",",".");  
                      ?>
                    </td>
                    <?php } ?>
                  </tr>
                  <tr>
                    <td align="center">&nbsp;</td>
                    <td align="center">3.3</td>
                    <td>Jumlah Modal</td>
                    <?php
                        $sql2  = mysql_query("SELECT utang,modal FROM tbl_lk 
                                             WHERE kode_emiten='$kode_emiten'
                                             AND tahun BETWEEN '$dari_tahun' 
                                             AND '$sampai_tahun'
                                             AND id_user='$id_user'");
                        while($data2 = mysql_fetch_assoc($sql2)){
                    ?>
                    <td align="right">
                      <?php
                        $utang  = $data2['utang'];
                        $modal  = $data2['modal'];
                        $jumlah = $utang + $modal;
                        echo "Rp ".number_format($jumlah,0,",",".");  
                      ?>
                    </td>
                    <?php } ?>
                  </tr>

                  <!-- KOMPOSISI UTANG -->
                  <tr>
                    <td align="center">&nbsp;</td>
                    <td align="center">3.4</td>
                    <td>Komposisi Utang</td>
                    <?php
                        $sql2  = mysql_query("SELECT kode_emiten,utang,modal,tahun FROM tbl_lk 
                                             WHERE kode_emiten='$kode_emiten'
                                             AND tahun BETWEEN '$dari_tahun' 
                                             AND '$sampai_tahun'
                                             AND id_user='$id_user'");
                        while($data2 = mysql_fetch_assoc($sql2)){
                    ?>
                    <td align="right">
                      <?php
                        $kode_emiten_ku  = $data2['kode_emiten'];
                        $tahun_ku        = $data2['tahun'];
                        $utang           = $data2['utang'];
                        $modal           = $data2['modal'];
                        $jumlah          = $utang + $modal;
                        $jumlah_ku       = $utang / $jumlah;
                        echo number_format($jumlah_ku,2,",",".");
                        $sql_ku  = mysql_query("SELECT * FROM tbl_ku 
                                                WHERE kode_emiten='$kode_emiten_ku'
                                                AND tahun='$tahun_ku'
                                                AND id_user='$id_user'"); 
                            $data_ku = mysql_num_rows($sql_ku);
                            if ($data_ku==0){
                              $sql_ku2 = mysql_query("INSERT INTO tbl_ku 
                                                      VALUES (null,'$kode_emiten_ku','$id_user','$tahun_ku',
                                                      '$jumlah_ku')");
                            } else if ($data_ku > 0) {
                              $sql_ku2 = mysql_query("UPDATE tbl_ku SET nilai_ku='$jumlah_ku' 
                                                      WHERE kode_emiten='$kode_emiten_ku'
                                                      AND tahun='$tahun_ku'
                                                      AND id_user='$id_user'");
                            } 

                      ?>
                    </td>
                    <?php } ?>
                  </tr>

                  <!-- KOMPOSISI MODAL SAHAM -->
                  <tr>
                    <td align="center">&nbsp;</td>
                    <td align="center">3.5</td>
                    <td>Komposisi Modal Saham</td>
                    <?php
                        $sql2  = mysql_query("SELECT kode_emiten,tahun,utang,modal FROM tbl_lk 
                                             WHERE kode_emiten='$kode_emiten'
                                             AND tahun BETWEEN '$dari_tahun' 
                                             AND '$sampai_tahun'
                                             AND id_user='$id_user'");
                        while($data2 = mysql_fetch_assoc($sql2)){
                    ?>
                    <td align="right">
                      <?php
                        $kode_emiten_saham  = $data2['kode_emiten'];
                        $tahun_saham        = $data2['tahun'];
                        $utang              = $data2['utang'];
                        $modal              = $data2['modal'];
                        $jumlah             = $utang + $modal;
                        $jumlah_utang       = $utang / $jumlah;
                        $jumlah_saham       = 1 - $jumlah_utang;
                        echo number_format($jumlah_saham,2,",",".");
                         $sql_saham  = mysql_query("SELECT * FROM tbl_saham 
                                                    WHERE kode_emiten='$kode_emiten_saham'
                                                    AND tahun='$tahun_saham'
                                                    AND id_user='$id_user'"); 
                            $data_saham = mysql_num_rows($sql_saham);
                            if ($data_saham==0){
                              $sql_saham2 = mysql_query("INSERT INTO tbl_saham 
                                                         VALUES (null,'$kode_emiten_saham','$id_user','$tahun_saham',
                                                         '$jumlah_saham')");
                            } else if ($data_saham > 0) {
                              $sql_saham2 = mysql_query("UPDATE tbl_saham SET nilai_saham='$jumlah_saham' 
                                                         WHERE kode_emiten='$kode_emiten_saham'
                                                         AND tahun='$tahun_saham'
                                                         AND id_user='$id_user'");
                            } 

                      ?>
                    </td>
                    <?php } ?>
                  </tr>
                  <tr>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td>&nbsp;</td>
                    <?php 
                      $sampai = mysql_num_rows($sql_tahun); 
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
                      $sampai = mysql_num_rows($sql_tahun); 
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
                        $sql2  = mysql_query("SELECT tbl_ku.kode_emiten,tbl_ku.tahun,tbl_ku.nilai_ku,
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
                                              AND '$sampai_tahun'
                                              AND tbl_ku.id_user='$id_user'");
                        while($data2 = mysql_fetch_assoc($sql2)){
                    ?>
                    <td align="right">
                      <?php
                        $kode_emiten_wacc   = $data2['kode_emiten'];
                        $tahun_wacc         = $data2['tahun'];
                        $nilai_ku           = $data2['nilai_ku'];
                        $nilai_cost         = $data2['nilai_cost'];
                        $nilai_saham        = $data2['nilai_saham'];
                        $nilai_om           = $data2['nilai_om'];
                        $jumlah_wacc        = ($nilai_ku * $nilai_cost) + ($nilai_saham *$nilai_om);
                        echo number_format($jumlah_wacc,3,",",".");
                         $sql_wacc  = mysql_query("SELECT * FROM tbl_wacc 
                                                   WHERE kode_emiten='$kode_emiten_wacc'
                                                   AND tahun='$tahun_wacc'
                                                   AND id_user='$id_user'"); 
                         $data_wacc = mysql_num_rows($sql_wacc);
                            if ($data_wacc==0){
                              $sql_wacc2 = mysql_query("INSERT INTO tbl_wacc 
                                                         VALUES (null,'$kode_emiten_wacc','$id_user','$tahun_wacc',
                                                         '$jumlah_wacc')");
                            } else if ($data_wacc > 0) {
                              $sql_wacc2 = mysql_query("UPDATE tbl_wacc SET nilai_wacc='$jumlah_wacc' 
                                                         WHERE kode_emiten='$kode_emiten_wacc'
                                                         AND tahun='$tahun_wacc'
                                                         AND id_user='$id_user'");
                            } 

                      ?>
                    </td>
                    <?php } ?>
                  </tr>
                  <tr>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td>&nbsp;</td>
                    <?php 
                      $sampai = mysql_num_rows($sql_tahun); 
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
                      $sampai = mysql_num_rows($sql_tahun); 
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
                        $sql_laba  = mysql_query("SELECT laba FROM tbl_lk 
                                             WHERE kode_emiten='$kode_emiten'
                                             AND tahun BETWEEN '$dari_tahun' 
                                             AND '$sampai_tahun'
                                             AND id_user='$id_user'");
                        while($data_laba = mysql_fetch_assoc($sql_laba)){
                    ?>
                    <td align="right">
                      <?php 
                        $laba = $data_laba['laba'];
                        echo "Rp ".number_format($laba,0,",",".");  
                      ?>
                    </td>
                    <?php } ?>
                  </tr>

                   <!-- BEBAN BUNGA -->
                  <tr>
                    <td align="center">&nbsp;</td>
                    <td align="center">5.2</td>
                    <td>Beban Bunga</td>
                    <?php
                      $sql1  = mysql_query("SELECT bunga FROM tbl_lk 
                                             WHERE kode_emiten='$kode_emiten'
                                             AND tahun BETWEEN '$dari_tahun' 
                                             AND '$sampai_tahun'
                                             AND id_user='$id_user'");
                      while($data1 = mysql_fetch_assoc($sql1)){
                    ?>
                    <td align="right">
                      <?php
                        $bunga = $data1['bunga'];
                        echo "Rp ".number_format($bunga,0,",",".");  
                      ?>
                    </td>
                    <?php } ?>
                  </tr>

                   <!-- LABA  SEBELUM BUNGA -->
                  <tr>
                    <td align="center">&nbsp;</td>
                    <td align="center">5.3</td>
                    <td>Laba Sebelum Bunga    &amp; Pajak</td>
                    <?php
                      $sql1  = mysql_query("SELECT laba,bunga FROM tbl_lk 
                                             WHERE kode_emiten='$kode_emiten'
                                             AND tahun BETWEEN '$dari_tahun' 
                                             AND '$sampai_tahun'
                                             AND id_user='$id_user'");
                      while($data1 = mysql_fetch_assoc($sql1)){
                    ?>
                    <td align="right">
                      <?php
                        $laba  = $data1['laba'];
                        $bunga = $data1['bunga'];
                        $laba_sebelum = $laba + $bunga;
                        echo "Rp ".number_format($laba_sebelum,0,",",".");  
                      ?>
                    </td>
                    <?php } ?>
                  </tr>

                   <!-- BEBAN PAJAK -->
                  <tr>
                    <td align="center">&nbsp;</td>
                    <td align="center"> 5.4 </td>
                    <td> Beban Pajak </td>
                    <?php
                      $sql1  = mysql_query("SELECT pajak FROM tbl_lk 
                                             WHERE kode_emiten='$kode_emiten'
                                             AND tahun BETWEEN '$dari_tahun' 
                                             AND '$sampai_tahun'
                                             AND id_user='$id_user'");
                      while($data1 = mysql_fetch_assoc($sql1)){
                    ?>
                    <td align="right">
                      <?php
                        $pajak = $data1['pajak'];
                        echo "Rp ".number_format($pajak,0,",",".");  
                      ?>
                    </td>
                    <?php } ?>
                  </tr>

                   <!-- WACC -->
                  <tr>
                    <td align="center">&nbsp;</td>
                    <td align="center">5.5</td>
                    <td>WACC</td>
                    <?php
                      $sql_wacc  = mysql_query("SELECT * FROM tbl_wacc 
                                             WHERE kode_emiten='$kode_emiten'
                                             AND tahun BETWEEN '$dari_tahun' 
                                             AND '$sampai_tahun'
                                             AND id_user='$id_user'");
                      while($data_wacc = mysql_fetch_assoc($sql_wacc)){
                    ?>
                    <td align="right">
                      <?php
                        $data_waccnya = $data_wacc['nilai_wacc'];
                        echo number_format($data_waccnya,2,",",".");  
                      ?>
                    </td>
                    <?php } ?>
                  </tr>

                   <!-- EVA -->
                  <tr>
                    <td align="center">&nbsp;</td>
                    <td align="center">5.6</td>
                    <td>EVA</td>
                    <?php
                      $sql1  = mysql_query("SELECT tbl_lk.*,tbl_wacc.nilai_wacc 
                                            FROM tbl_lk,tbl_wacc 
                                            WHERE tbl_lk.kode_emiten=tbl_wacc.kode_emiten
                                            AND tbl_lk.tahun=tbl_wacc.tahun
                                            AND tbl_lk.kode_emiten='$kode_emiten'
                                            AND tbl_lk.tahun BETWEEN '$dari_tahun' 
                                            AND '$sampai_tahun'
                                            AND tbl_lk.id_user='$id_user'");
                      while($data1 = mysql_fetch_assoc($sql1)){
                    ?>
                    <td align="right">
                      <?php
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

                        $sql_eva  = mysql_query("SELECT * FROM tbl_eva 
                                                 WHERE kode_emiten='$kode_emiten_eva'
                                                 AND tahun='$tahun_eva'
                                                 AND id_user='$id_user' ORDER BY kode_emiten"); 
                        $data_eva = mysql_num_rows($sql_eva);
                            if ($data_eva==0){
                              $sql_eva2 = mysql_query("INSERT INTO tbl_eva 
                                                       VALUES (null,'$kode_emiten_eva','$id_user','$tahun_eva',
                                                       '$jumlah_eva')");
                            } else if ($data_eva > 0) {
                              $sql_eva2 = mysql_query("UPDATE tbl_eva SET nilai_eva='$jumlah_eva' 
                                                       WHERE kode_emiten='$kode_emiten_eva'
                                                       AND tahun='$tahun_eva'
                                                       AND id_user='$id_user'");
                            }   
                      ?>
                    </td>
                    <?php } ?>
                  </tr>
                </table>
                </div>
              </div>
            </div>
          </div>
          <!-- END BASIC DATATABLES -->
        </div>
      </section>
      </aside>