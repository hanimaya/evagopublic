    <?php
    $kode_emiten = $_GET['kode_emiten'];
    $nama_emiten = $_GET['nama_emiten'];
  ?>  
    
    <!-- BEGIN CONTENT -->
    <aside class="right-side">
      <!-- BEGIN CONTENT HEADER -->
      <section class="content-header">
        <i class="fa fa-user"></i>
        <span>Data BETA <?php echo $nama_emiten ?></span>
        
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
                <table id="dataTables1" class="data-table table table-bordered table-striped" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Bulan</th>
                      <th>Tahun</th>
                      <th>Nilai Rm(X)</th>
                      <th>Nilai Ri(Y)</th>
                      <th>Nilai (X.Y)</th>
                      <th>Nilai (X2)</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php 
                        $sql = mysql_query("SELECT tbl_emiten.kode_emiten,tbl_ihs.nilai_rm,tbl_ri.bulan,
                                            tbl_ri.tahun,tbl_ri.nilai_ri 
                                            FROM tbl_emiten,tbl_ihs,tbl_ri
                                            WHERE tbl_emiten.kode_emiten=tbl_ri.kode_emiten
                                            AND tbl_ihs.bulan=tbl_ri.bulan
                                            AND tbl_ihs.tahun=tbl_ri.tahun
                                            AND tbl_emiten.kode_emiten='$kode_emiten'
                                            AND tbl_ri.id_user='$id_user'");
                        $no  = 1;
                        while($data=mysql_fetch_array($sql)){
                          $kode_emiten  = $data['kode_emiten'];
                          $bulan        = $data['bulan'];
                          $tahun        = $data['tahun'];
                     ?>
                    <tr>
                      <td><?php echo $no++;?></td>
                      <td><?php echo $data['bulan'];?></td>
                      <td><?php echo $data['tahun'];?></td>
                      <td>
                        <?php
                          $nilai_rm = $data['nilai_rm'];
                          echo number_format($nilai_rm,3,",",".");
                        ?>
                      </td>
                      <td>
                        <?php
                          $nilai_ri = $data['nilai_ri'];  
                          echo number_format($nilai_ri,3,",",".");
                        ?>
                      </td>
                      <td>
                        <?php
                          $xy = $nilai_rm * $nilai_ri; 
                          echo number_format($xy,5,",",".");
                        ?>
                      </td>
                      <td>
                        <?php
                          $x2 = $nilai_rm * $nilai_rm; 
                          echo number_format($x2,6,",",".");

                            $sql_beta  = mysql_query("SELECT * FROM tbl_beta 
                                                      WHERE kode_emiten='$kode_emiten' 
                                                      AND bulan='$bulan'
                                                      AND tahun='$tahun'");
                            $data_beta = mysql_num_rows($sql_beta);
                            if ($data_beta==0){
                              $sql_beta2 = mysql_query("INSERT INTO tbl_beta VALUES (null,'$kode_emiten','$id_user','$bulan','$tahun','$xy','$x2')");
                            } else if ($data_beta > 0) {
                              $sql_beta2 = mysql_query("UPDATE tbl_beta SET xy='$xy',x2='$x2' 
                                                        WHERE kode_emiten='$kode_emiten' 
                                                        AND bulan='$bulan' 
                                                        AND tahun='$tahun'");
                            }
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