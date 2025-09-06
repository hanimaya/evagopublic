<?php $kode_perusahaan = $_GET['kode_perusahaan']; ?>    
<?php $nama_perusahaan = $_GET['nama_perusahaan']; ?>    
<?php $dari_tahun      = $_POST['dari_tahun']; ?>    
<?php $sampai_tahun    = $_POST['sampai_tahun']; ?>    
    
    <!-- BEGIN CONTENT -->
    <aside class="right-side">
      <!-- BEGIN CONTENT HEADER -->
      <section class="content-header">
        <i class="fa fa-user"></i>
        <span>Rincian Penilaian <?php echo $nama_perusahaan ?></span>
        
      </section>
      <!-- END CONTENT HEADER -->
      


    <section class="content">
        <div class="row">
          <!-- BEGIN BASIC DATATABLES -->
          <div class="col-md-12">
            <div class="grid no-border">
              <div class="grid-header">
                <i class="fa fa-perusahaanr"></i>
                <span class="grid-title">
                  <button type="button" class="btn btn-primary" onclick="self.history.back()">
                        <i class="fa fa-arrow-left"></i> Kembali
                  </button>
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
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="btn-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Cari</button>
                        <button type="button" class="btn btn-success"> <i class="fa fa-print"></i> Cetak</button>
                      </div>
                    </div>
                  </div>
                </form>
                <table id="dataTables1" class="data-table table table-bordered table-striped" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>Tahun</th>
                      <th>Indikator</th>
                      <th>Hasil</th>
                      <th>Interval</th>
                      <th>Skor Non Infra</th>
                      <th>Bobot</th>
                      <th>Total Bobot</th>
                      <th>Nilai</th>
                      <th>Predikat</th>
                      <th>Ketegori</th>
                    </tr>
                  </thead>

                  <tbody>
                  <?php
                    if (empty($dari_tahun)){
                      $sql  = mysql_query("SELECT tbl_perusahaan.kode_perusahaan AS kode, 
                                         tbl_perusahaan.nama_perusahaan,tbl_rasio_roe.* 
                                         FROM tbl_perusahaan,tbl_rasio_roe 
                                         WHERE tbl_perusahaan.kode_perusahaan=tbl_rasio_roe.kode_perusahaan
                                         AND tbl_perusahaan.kode_perusahaan='$kode_perusahaan'");
                    } else {
                      $sql  = mysql_query("SELECT tbl_perusahaan.kode_perusahaan AS kode, 
                                         tbl_perusahaan.nama_perusahaan,tbl_rasio_roe.* 
                                         FROM tbl_perusahaan,tbl_rasio_roe 
                                         WHERE tbl_perusahaan.kode_perusahaan=tbl_rasio_roe.kode_perusahaan
                                         AND tbl_perusahaan.kode_perusahaan='$kode_perusahaan'
                                         AND tbl_rasio_roe.tahun BETWEEN '$dari_tahun' 
                                         AND '$sampai_tahun'");
                    }
                    while($data = mysql_fetch_array($sql)){
                      $kode  = $data['kode_perusahaan'];
                      $tahun = $data['tahun'];
                  ?>
                    <tr>
                      <td>
                        <?php 
                          $sql1  = mysql_query("SELECT tahun FROM tbl_rasio_roe WHERE kode_perusahaan='$kode' AND tahun='$tahun'");
                          $data1 = mysql_fetch_assoc($sql1);
                          echo $data_tahun = $data1['tahun'];
                        ?>
                      </td>
                      <td>ROE<br>
                          ROI<br>
                          Cash Ratio<br>
                          Current Ratio<br>
                          Collection Periods<br>
                          Perputaran Persediaan<br>
                          TATO<br>
                          TMS Terhadap TA<br><hr style="border-color:black">
                          <b style="font-weight:bold;color:blue">TOTAL</b>
                      </td>
                      <td>
                        <?php 
                          $sql2  = mysql_query("SELECT hasil_roe FROM tbl_rasio_roe WHERE kode_perusahaan='$kode' AND tahun='$tahun'");
                          $data2 = mysql_fetch_assoc($sql2);
                          $hasil_roe = $data2['hasil_roe'];
                          echo number_format($hasil_roe,2,",",".")."%";

                        ?>
                        <br>

                        <?php 
                          $sql3  = mysql_query("SELECT hasil_roi FROM tbl_rasio_roi WHERE kode_perusahaan='$kode' AND tahun='$tahun'");
                          $data3 = mysql_fetch_assoc($sql3);
                          $hasil_roi = $data3['hasil_roi'];
                          echo number_format($hasil_roi,2,",",".")."%";
                        ?>
                        <br>

                        <?php 
                          $sql4  = mysql_query("SELECT hasil_cash FROM tbl_rasio_cash WHERE kode_perusahaan='$kode' AND tahun='$tahun'");
                          $data4 = mysql_fetch_assoc($sql4);
                          $hasil_cash = $data4['hasil_cash'];
                          echo number_format($hasil_cash,2,",",".")."%";
                        ?>
                        <br>

                        <?php 
                          $sql5  = mysql_query("SELECT hasil_current 
                                                FROM tbl_rasio_cash,tbl_rasio_current 
                                                WHERE tbl_rasio_cash.id_rasio_cash=tbl_rasio_current.id_rasio_cash 
                                                AND tbl_rasio_cash.kode_perusahaan='$kode'
                                                AND tbl_rasio_cash.tahun='$tahun'");
                          $data5 = mysql_fetch_assoc($sql5);
                          $hasil_current = $data5['hasil_current'];
                          echo number_format($hasil_current,2,",",".")."%";
                        ?>                        
                        <br>

                        <?php 
                          $sql6  = mysql_query("SELECT hasil_cp 
                                                FROM tbl_rasio_roi,tbl_rasio_cp 
                                                WHERE tbl_rasio_roi.id_rasio_roi=tbl_rasio_cp.id_rasio_roi
                                                AND tbl_rasio_roi.kode_perusahaan='$kode'
                                                AND tbl_rasio_roi.tahun='$tahun'");
                          $data6 = mysql_fetch_assoc($sql6);
                          $hasil_cp = $data6['hasil_cp'];
                          echo number_format($hasil_cp,0,",",".")." Hari";
                        ?>
                        <br>
                        
                        <?php 
                          $sql7  = mysql_query("SELECT hasil_pp 
                                                FROM tbl_rasio_roi,tbl_rasio_pp 
                                                WHERE tbl_rasio_roi.id_rasio_roi=tbl_rasio_pp.id_rasio_roi
                                                AND tbl_rasio_roi.kode_perusahaan='$kode'
                                                AND tbl_rasio_roi.tahun='$tahun'");
                          $data7 = mysql_fetch_assoc($sql7);
                          $hasil_pp = $data7['hasil_pp'];
                          echo number_format($hasil_pp,0,",",".")." Hari";
                        ?>
                        <br>
                        
                        <?php 
                          $sql8  = mysql_query("SELECT hasil_tato 
                                                FROM tbl_rasio_roi,tbl_rasio_tato 
                                                WHERE tbl_rasio_roi.id_rasio_roi=tbl_rasio_tato.id_rasio_roi
                                                AND tbl_rasio_roi.kode_perusahaan='$kode'
                                                AND tbl_rasio_roi.tahun='$tahun'");
                          $data8 = mysql_fetch_assoc($sql8);
                          $hasil_tato = $data8['hasil_tato'];
                          echo number_format($data8['hasil_tato'],2,",",".")."%";
                        ?>
                        <br>


                         <?php 
                          $sql9  = mysql_query("SELECT tbl_perusahaan.*,tbl_rasio_roe.modal,
                                                tbl_rasio_roi.total_aktiva,tbl_rasio_roe.tahun as tahunya
                                                FROM tbl_perusahaan,tbl_rasio_roe,tbl_rasio_roi
                                                WHERE tbl_perusahaan.kode_perusahaan=tbl_rasio_roe.kode_perusahaan
                                                AND tbl_perusahaan.kode_perusahaan=tbl_rasio_roi.kode_perusahaan
                                                AND tbl_rasio_roe.kode_perusahaan='$kode_perusahaan'
                                                AND tbl_rasio_roe.tahun=tbl_rasio_roi.tahun
                                                AND tbl_rasio_roe.tahun='$tahun'");
                          $data9 = mysql_fetch_assoc($sql9);
                          $hasil_tms = $data9['modal'] / $data9['total_aktiva'] * 100;
                          echo number_format($hasil_tms,2,",",".")."%";
                          ?>
                        <br><hr style="border-color:black">
                      </td>
                      <td>
                          <?php 
                            if ($hasil_roe > 15){
                            $interval_roe = "15 < ROE";
                            $infra_roe = 20;
                          } else if ($hasil_roe > 13){
                            $interval_roe = "13 < ROE <=15";
                            $infra_roe = 18;
                          } else if ($hasil_roe > 11){
                            $interval_roe = "11 < ROE <= 13";
                            $infra_roe = 16;
                          } else if ($hasil_roe > 9){
                            $interval_roe = "9 < ROE <=11";
                            $infra_roe = 14;
                          } else if ($hasil_roe > 7.9){
                            $interval_roe = "7.9 < ROE <=9";
                            $infra_roe = 12;
                          } else if ($hasil_roe > 6.6){
                            $interval_roe = "6.6 < ROE <=7.9";
                            $infra_roe = 10;
                          } else if ($hasil_roe > 5.3){
                            $interval_roe = "5.3 < ROE <=6.6";
                            $infra_roe = 8.5;
                          } else if ($hasil_roe > 4){
                            $interval_roe = "4 < ROE <=5.3";
                            $infra_roe = 7;
                          } else if ($hasil_roe > 2.5){
                            $interval_roe = "2.5 < ROE <=4";
                            $infra_roe = 5.5;
                          } else if ($hasil_roe > 1){
                            $interval_roe = "1 < ROE <=2.5";
                            $infra_roe = 4;
                          } else if ($hasil_roe > 0){
                            $interval_roe = "0 < ROE <=1";
                            $infra_roe = 2;
                          } else {
                            $interval_roe = "ROE < 0";
                            $infra_roe = 0;
                          }

                          echo $interval_roe;
                          ?>
                          <br>
                          
                          <?php 
                            if ($hasil_roi > 18){
                            $interval_roi = "18 < ROI";
                            $infra_roi = 15;
                          } else if ($hasil_roi > 15){
                            $interval_roi = "15 < ROI <=18";
                            $infra_roi = 13.5;
                          } else if ($hasil_roi > 13){
                            $interval_roi = "13 < ROI <= 15";
                            $infra_roi = 12;
                          } else if ($hasil_roi > 12){
                            $interval_roi = "12 < ROI <=13";
                            $infra_roi = 10.5;
                          } else if ($hasil_roi > 10.5){
                            $interval_roi = "10.5 < ROI <=12";
                            $infra_roi = 9;
                          } else if ($hasil_roi > 9){
                            $interval_roi = "9 < ROI <=10.5";
                            $infra_roi = 7.5;
                          } else if ($hasil_roi > 7){
                            $interval_roi = "7 < ROI <=9";
                            $infra_roi = 6;
                          } else if ($hasil_roi > 5){
                            $interval_roi = "5 < ROI <=7";
                            $infra_roi = 5;
                          } else if ($hasil_roi > 3){
                            $interval_roi = "3 < ROI <=5";
                            $infra_roi = 4;
                          } else if ($hasil_roi > 1){
                            $interval_roi = "1 < ROI <=3";
                            $infra_roi = 3;
                          } else if ($hasil_roi > 0){
                            $interval_roi = "0 < ROI <=1";
                            $infra_roi = 2;
                          } else {
                            $interval_roi = "ROI < 0";
                            $infra_roi = 1;
                          }

                          echo $interval_roi;
                          ?>
                          <br>


                          <?php 
                            if ($hasil_cash >= 35){
                            $interval_cash = "x >= 35";
                            $infra_cash = 5;
                          } else if ($hasil_cash >= 25){
                            $interval_cash = "25 <=x < 35";
                            $infra_cash = 4;
                          } else if ($hasil_cash >= 15){
                            $interval_cash = "15 <=x < 25";
                            $infra_cash = 3;
                          } else if ($hasil_cash >= 10){
                            $interval_cash = "10 <= x < 15";
                            $infra_cash = 2;
                          } else if ($hasil_cash >= 5){
                            $interval_cash = "5 <=x < 10";
                            $infra_cash = 1;
                          } else {
                            $interval_cash = "0 <=x < 5";
                            $infra_cash = 0;
                          }

                          echo $interval_cash;
                          ?>
                          <br>


                          <?php 
                            if ($hasil_current >= 125){
                            $interval_current = "125 <=x";
                            $infra_current = 5;
                          } else if ($hasil_current >= 110){
                            $interval_current = "110 <=x < 125";
                            $infra_current = 4;
                          } else if ($hasil_current >= 100){
                            $interval_current = "100 <=x < 110";
                            $infra_current = 3;
                          } else if ($hasil_current >= 95){
                            $interval_current = "95 <=x < 100";
                            $infra_current = 2;
                          } else if ($hasil_current >= 90){
                            $interval_current = "90 <=x < 95";
                            $infra_current = 1;
                          } else {
                            $interval_current = "x < 90";
                            $infra_current = 0;
                          }

                          echo $interval_current;
                          ?>
                          <br>
                          

                          <?php 
                            if ($hasil_cp <= 60){
                            $interval_cp = "x <= 60";
                            $infra_cp = 5;
                          } else if ($hasil_cp <= 90){
                            $interval_cp = "60 < x <=90";
                            $infra_cp = 4.5;
                          } else if ($hasil_cp <= 120){
                            $interval_cp = "90 < x <= 120";
                            $infra_cp = 4;
                          } else if ($hasil_cp <= 150){
                            $interval_cp = "120 < x <=150";
                            $infra_cp = 3.5;
                          } else if ($hasil_cp <= 180){
                            $interval_cp = "150 < x <=180";
                            $infra_cp = 3;
                          } else if ($hasil_cp <= 210){
                            $interval_cp = "180 < x <=210";
                            $infra_cp = 2.4;
                          } else if ($hasil_cp <= 240){
                            $interval_cp = "210 < x <=240";
                            $infra_cp = 1.8;
                          } else if ($hasil_cp <= 270){
                            $interval_cp = "240 < x <=270";
                            $infra_cp = 1.2;
                          } else if ($hasil_cp <= 300){
                            $interval_cp = "270 < x <=300";
                            $infra_cp = 0.6;
                          }  else {
                            $interval_cp = "300 < x";
                            $infra_cp = 0;
                          }

                          echo $interval_cp;
                          ?>
                          <br>


                          <?php 
                            if ($hasil_pp <= 60){
                            $interval_pp = "x <= 60";
                            $infra_pp = 5;
                          } else if ($hasil_pp <= 90){
                            $interval_pp = "60 < x <=90";
                            $infra_pp = 4.5;
                          } else if ($hasil_pp <= 120){
                            $interval_pp = "90 < x <= 120";
                            $infra_pp = 4;
                          } else if ($hasil_pp <= 150){
                            $interval_pp = "120 < x <=150";
                            $infra_pp = 3.5;
                          } else if ($hasil_pp <= 180){
                            $interval_pp = "150 < x <=180";
                            $infra_pp = 3;
                          } else if ($hasil_pp <= 210){
                            $interval_pp = "180 < x <=210";
                            $infra_pp = 2.4;
                          } else if ($hasil_pp <= 240){
                            $interval_pp = "210 < x <=240";
                            $infra_pp = 1.8;
                          } else if ($hasil_pp <= 270){
                            $interval_pp = "240 < x <=270";
                            $infra_pp = 1.2;
                          } else if ($hasil_pp <= 300){
                            $interval_pp = "270 < x <=300";
                            $infra_pp = 0.6;
                          }  else {
                            $interval_pp = "300 < x";
                            $infra_pp = 0;
                          }

                          echo $interval_pp;
                          ?>
                          <br>
                          

                          <?php 
                            if ($hasil_tato > 120){
                            $interval_tato = "120 < x";
                            $infra_tato = 5;
                          } else if ($hasil_tato > 105){
                            $interval_tato = "105 < x <=120";
                            $infra_tato = 4.5;
                          } else if ($hasil_tato > 90){
                            $interval_tato = "90 < x <= 105";
                            $infra_tato = 4;
                          } else if ($hasil_tato > 75){
                            $interval_tato = "75 < x <=90";
                            $infra_tato = 3.5;
                          } else if ($hasil_tato > 60){
                            $interval_tato = "60 < x <=75";
                            $infra_tato = 3;
                          } else if ($hasil_tato > 40){
                            $interval_tato = "40 < x <=60";
                            $infra_tato = 2.5;
                          } else if ($hasil_tato > 20){
                            $interval_tato = "20 < x <=40";
                            $infra_tato = 2;
                          } else {
                            $interval_tato = "x <=20";
                            $infra_tato = 1.5;
                          }

                          echo $interval_tato;
                          ?>
                          <br>
                          
                          <?php 
                            if ($hasil_tms < 0){
                            $interval_tms = "x < 0";
                            $infra_tms = 0;
                          } else if ($hasil_tms >= 90){
                            $interval_tms = "90 <=x < 100";
                            $infra_tms = 6.5;
                          } else if ($hasil_tms >= 80){
                            $interval_tms = "80 <=x < 90";
                            $infra_tms = 7;
                          } else if ($hasil_tms >= 70){
                            $interval_tms = "70 <=x < 80";
                            $infra_tms = 7.5;
                          } else if ($hasil_tms >= 60){
                            $interval_tms = "60 <=x < 70";
                            $infra_tms = 8;
                          } else if ($hasil_tms >= 50){
                            $interval_tms = "50 <=x < 60";
                            $infra_tms = 8.5;
                          } else if ($hasil_tms >= 40){
                            $interval_tms = "40 <=x < 50";
                            $infra_tms = 9;
                          } else if ($hasil_tms >= 30){
                            $interval_tms = "30 <=x < 40";
                            $infra_tms = 10;
                          } else if ($hasil_tms >= 20){
                            $interval_tms = "20 <=x < 30";
                            $infra_tms = 7.25;
                          } else if ($hasil_tms >= 10){
                            $interval_tms = "10 <=x < 20";
                            $infra_tms = 6;
                          } else if ($hasil_tms >= 0){
                            $interval_tms = "0 <=x < 10";
                            $infra_tms = 4;
                          } else {
                            $interval_tms = "x < 0";
                            $infra_tms = 0;
                          }

                          echo $interval_tms;
                          ?>
                          <br><hr style="border-color:black">
                      </td>
                      <td align="center"> 
                          <?php
                            echo $infra_roe;
                          ?>
                          <br>

                          <?php
                            echo $infra_roi;
                          ?>
                          <br>

                          <?php
                            echo $infra_cash;
                          ?>
                          <br>

                          <?php
                            echo $infra_current;
                          ?>
                          <br>

                          <?php
                            echo $infra_cp;
                          ?>
                          <br>

                          <?php
                            echo $infra_pp;
                          ?>
                          <br>

                          <?php
                            echo $infra_tato;
                          ?>
                          <br>

                          <?php
                            echo $infra_tms;
                          ?>
                          <br><hr style="border-color:black">
                          <?php
                            $total_infra = $infra_roe + $infra_roi + $infra_cash + $infra_current + 
                                           $infra_cp + $infra_pp + $infra_tato + $infra_tms;
                            echo $total_infra;
                          ?>
                      </td>
                      <td align="center">
                          <?php
                            echo $bobot_roe = 20;
                          ?>
                          <br>

                          <?php
                            echo $bobot_roi = 15;
                          ?>
                          <br>

                          <?php
                            echo $bobot_cash = 5;
                          ?>
                          <br>

                          <?php
                            echo $bobot_current = 5;
                          ?>
                          <br>

                          <?php
                            echo $bobot_cp = 5;
                          ?>
                          <br>

                          <?php
                            echo $bobot_pp = 5;
                          ?>
                          <br>

                          <?php
                            echo $bobot_tato = 5;
                          ?>
                          <br>

                          <?php
                            echo $bobot_tms = 10;
                          ?>
                          <br><hr style="border-color:black">
                          <?php
                            $total_bobot = $bobot_roe + $bobot_roi + $bobot_cash + $bobot_current + 
                                           $bobot_cp + $bobot_pp + $bobot_tato + $bobot_tms;
                            echo $total_bobot;
                          ?>
                      </td>
                      <td align="center">

                          <?php
                            $bobot_seluruh = $total_infra / ($total_bobot / 100);
                            echo number_format($bobot_seluruh,2,",",".");
                            $sql_nilai  = mysql_query("SELECT * FROM tbl_nilai WHERE kode_perusahaan='$kode' AND tahun='$data_tahun'");
                            $data_nilai4 = mysql_num_rows($sql_nilai);
                            echo $data_nilainya = $data_nilai4['id_nilai'];
                            if ($data_nilai4==0){
                              $sql_nilai2 = mysql_query("INSERT INTO tbl_nilai VALUES (null,'$kode','$data_tahun','$bobot_seluruh')");
                            } else if ($data_nilai4 > 0) {
                              $sql_nilai2 = mysql_query("UPDATE tbl_nilai SET bobot_seluruh='$bobot_seluruh'
                                WHERE kode_perusahaan='$kode' AND tahun='$data_tahun'");
                            }
                          ?>
                          
                      </td>
                      <td>
                          <?php
                            if($bobot_seluruh > 95){
                              $nilai = ">95";
                              $predikat = "AAA";
                              $kategori = "Sehat";
                            } else if ($bobot_seluruh > 80){
                              $nilai = "80 < TS <=95";
                              $predikat = "AA";
                              $kategori = "Sehat";
                            } else if ($bobot_seluruh > 65){
                              $nilai = "65 < TS < =80";
                              $predikat = "A";
                              $kategori = "Sehat";
                            } else if ($bobot_seluruh > 50){
                              $nilai = "50 < TS < =65";
                              $predikat = "BBB";
                              $kategori = "Kurang Sehat";
                            } else if ($bobot_seluruh > 40){
                              $nilai = "40 < TS < =50";
                              $predikat = "BB";
                              $kategori = "Kurang Sehat";
                            } else if ($bobot_seluruh > 30){
                              $nilai = "30 < TS < =40";
                              $predikat = "BB";
                              $kategori = "Kurang Sehat";
                            } else if ($bobot_seluruh > 20){
                              $nilai = "20 < TS < =30";
                              $predikat = "CCC";
                              $kategori = "Tidak Sehat";
                            } else if ($bobot_seluruh > 10){
                              $nilai = "10 < TS < =20";
                              $predikat = "CC";
                              $kategori = "Tidak Sehat";
                            } else {
                              $nilai = "TS < =10";
                              $predikat = "C";
                              $kategori = "Tidak Sehat";
                            }
                            
                            echo $nilai;
                          ?>
                      </td>
                      <td>
                          <?php
                            echo $predikat;
                          ?>
                      </td>
                      <td>
                          <?php
                            echo $kategori;
                          ?>
                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- END BASIC DATATABLES -->
        </div>
      </section>
      </aside>