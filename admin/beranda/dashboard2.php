<?php 
      $karyawan_tetap    = "SELECT COUNT(tbl_karyawan.id_karyawan) AS karyawan_tetap FROM tbl_karyawan WHERE id_status='1'";
      $karyawan_kontrak    = "SELECT COUNT(tbl_karyawan.id_karyawan) AS karyawan_kontrak FROM tbl_karyawan WHERE id_status='2'";

      $query1 = mysql_query($karyawan_tetap);
      $query2 = mysql_query($karyawan_kontrak);
      $query3 = mysql_query($karyawan_outsourcing);
      $query4 = mysql_query($karyawan_training);
      $data1 = mysql_fetch_array($query1);
      $data2 = mysql_fetch_array($query2);
 ?>
 <!-- BEGIN CONTENT -->
    <aside class="right-side">
      <!-- BEGIN CONTENT HEADER -->   
      <section class="content-header">
        <i class="fa fa-home"></i>
        <span>Dashboard</span>
        <ol class="breadcrumb">
          <li><a href="index-2.html">Home</a></li>
          <li><a href="#">Dashboard</a></li>
        </ol>
      </section>
      <!-- END CONTENT HEADER -->
      
      <!-- BEGIN MAIN CONTENT -->
      <section class="content">
        <div class="row">
          <!-- BEGIN WIDGET -->
          <div class="col-sm-12">
            <div class="row">
              <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="grid widget bg-light-blue">
                  <div class="grid-body">
                    <span class="title">Karyawan Tetap</span>
                    <span class="value"><?php echo $data1['karyawan_tetap']?></span>
                    <span class="stat1 chart"><i class="fa fa-user"></i></span>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="grid widget bg-green">
                  <div class="grid-body">
                    <span class="title">Karyawan Kontrak</span>
                    <span class="value"><?php echo $data2['karyawan_kontrak']?></span>
                    <span class="stat2 chart"><i class="fa fa-user"></i></span>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
          <div class="col-md-12">
            <div class="grid">
              <div class="grid-header">
                <i class="fa fa-align-left"></i>
                <span class="grid-title">Form</span>
                <div class="pull-right grid-tools">
                  <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
                  <a data-widget="reload" title="Reload"><i class="fa fa-refresh"></i></a>
                  <a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>
                </div>
              </div>
              <div class="grid-body">
                <form class="form-horizontal" role="form" action="" method="post" id="form_combo" name="form1">
                  
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Bagian</label>
                    <div class="col-sm-2">
                      <select class="form-control" name="id_bagian" id="id_bagian" required="" onchange='showKab()'>
                        <option value="">--Pilih--</option>
                        <?php
                          $sql1 = mysql_query("SELECT * FROM tbl_bagian");
                          while($data1=mysql_fetch_array($sql1)){
                        ?>
                        <option value="<?php echo $data1['id_bagian']?>"><?php echo $data1['bagian']?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Jabatan</label>
                    <div class="col-sm-2">
                      <select class="form-control" name="id_jabatan" id="id_jabatan" required="">
                        <option value="">--Pilih--</option>
                        <option value=""></option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="btn-group">
                        <button type="submit" class="btn btn-primary">Cari</button>
                        <button type="reset" class="btn btn-default">Bersih</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- END WIDGET -->
<?php 
              $id_bagian  = $_POST['id_bagian'];
              $id_jabatan = $_POST['id_jabatan'];
              $nama_bagian  = mysql_query("SELECT bagian FROM tbl_bagian WHERE id_bagian='$id_bagian'");
              $nama_bagian1 = mysql_fetch_array($nama_bagian);

              $nama_jabatan  = mysql_query("SELECT jabatan FROM tbl_jabatan WHERE id_jabatan='$id_jabatan'");
              $nama_jabatan1 = mysql_fetch_array($nama_jabatan);

              //tetap
              $sql_tetap = mysql_query("SELECT COUNT(id_status) AS jumlah_status FROM tbl_karyawan
                  WHERE id_bagian='$id_bagian' AND id_jabatan='$id_jabatan' 
                  AND id_status=1");
              $data_tetap = mysql_fetch_array($sql_tetap);
                 $data_tetap['jumlah_status'];

              //kontrak
              $sql_kontrak = mysql_query("SELECT COUNT(id_status) AS jumlah_status FROM tbl_karyawan
                  WHERE id_bagian='$id_bagian' AND id_jabatan='$id_jabatan' 
                  AND id_status=2");
              $data_kontrak = mysql_fetch_array($sql_kontrak);
                 $data_kontrak['jumlah_status'];


              //HASIL
              //tetap
              $sql_tetap2 = mysql_query("SELECT tbl_karyawan.id_karyawan,COUNT(tbl_karyawan.id_status) 
                AS jumlah_status,tbl_nilaiakhir.bobot
                FROM tbl_bagian,tbl_jabatan,tbl_status,tbl_nilaiakhir,tbl_karyawan
                WHERE tbl_nilaiakhir.id_karyawan=tbl_karyawan.id_karyawan
                AND tbl_karyawan.id_bagian=tbl_bagian.id_bagian
                AND tbl_karyawan.id_jabatan=tbl_jabatan.id_jabatan
                AND tbl_karyawan.id_status=tbl_status.id_status
                AND tbl_karyawan.id_bagian='$id_bagian'
                AND tbl_karyawan.id_jabatan='$id_jabatan'
                AND tbl_karyawan.id_status=1
                AND tbl_nilaiakhir.bobot='A'");
              $data_tetap2 = mysql_fetch_array($sql_tetap2);
                 $data_tetap2['jumlah_status'];

              //kontrak
              $sql_kontrak2 = mysql_query("SELECT tbl_karyawan.id_karyawan,COUNT(tbl_karyawan.id_status) 
                AS jumlah_status,tbl_nilaiakhir.bobot
                FROM tbl_bagian,tbl_jabatan,tbl_status,tbl_nilaiakhir,tbl_karyawan
                WHERE tbl_nilaiakhir.id_karyawan=tbl_karyawan.id_karyawan
                AND tbl_karyawan.id_bagian=tbl_bagian.id_bagian
                AND tbl_karyawan.id_jabatan=tbl_jabatan.id_jabatan
                AND tbl_karyawan.id_status=tbl_status.id_status
                AND tbl_karyawan.id_bagian='$id_bagian'
                AND tbl_karyawan.id_jabatan='$id_jabatan'
                AND tbl_karyawan.id_status=2
                AND tbl_nilaiakhir.bobot='A'");
              $data_kontrak2 = mysql_fetch_array($sql_kontrak2);
                 $data_kontrak2['jumlah_status'];

              
          ?>
          <div class="col-md-6">
            <div class="grid visitor">
              <div class="grid-body full">
                <h3 style="text-align:center"><b>Grafik Jumlah</b><br> Bagian <?php echo $nama_bagian1['bagian'] ?> Jabatan <?php echo $nama_jabatan1['jabatan'] ?></h3>
                <div id="chart-donut" class="chart" style="width:100%; height:250px;"></div>
              </div>
              <div class="footer">
                <div class="row">
                  
                  <div class="col-md-6" style="background-color:blue;color:white">
                    <span class="os"><i class="fa fa-user"></i><br> TETAP</span>
                    <span class="percent"><?php echo $data_tetap['jumlah_status']; ?></span>
                  </div>
                  <div class="col-md-6" style="background-color:green;color:white">
                    <span class="os"><i class="fa fa-user"></i><br>KONTRAK</span>
                    <span class="percent"><?php echo $data_kontrak['jumlah_status']; ?></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="grid visitor">
              <div class="grid-body full">
                <h3 style="text-align:center"><b>Grafik Hasil</b> <br> Bagian <?php echo $nama_bagian1['bagian'] ?> Jabatan <?php echo $nama_jabatan1['jabatan'] ?></h3>
                <div id="chart-donut2" class="chart" style="width:100%; height:250px;"></div>
              </div>
              <div class="footer">
                <div class="row">
                  
                  <div class="col-md-6" style="background-color:blue;color:white">
                    <span class="os"><i class="fa fa-user"></i><br> TETAP</span>
                    <span class="percent"><?php echo $data_tetap2['jumlah_status']; ?></span>
                  </div>
                  <div class="col-md-6" style="background-color:green;color:white">
                    <span class="os"><i class="fa fa-user"></i><br>KONTRAK</span>
                    <span class="percent"><?php echo $data_kontrak2['jumlah_status']; ?></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </section>
    </aside>
    <!-- END CONTENT -->
  <script src="../assets/back-end/assets/plugins/jquery-2.1.0.min.js"></script>
  <script src="../assets/back-end/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
  <script src="../assets/back-end/assets/plugins/jquery-flot/jquery.flot.min.js"></script>
  <script src="../assets/back-end/assets/plugins/jquery-flot/jquery.flot.pie.min.js"></script>
  <script src="../assets/back-end/assets/plugins/pace/pace.min.js"></script>
  <script src="../assets/back-end/assets/plugins/jquery-totemticker/jquery.totemticker.min.js"></script>
  <script src="../assets/back-end/assets/plugins/jquery-resize/jquery.ba-resize.min.js"></script>
  <script src="../assets/back-end/assets/plugins/jquery-blockui/jquery.blockUI.min.js"></script>
  <script src="../assets/back-end/assets/plugins/icheck/icheck.min.js"></script>
  <script src="../assets/back-end/assets/plugins/switchery/switchery.min.js"></script>
  <script src="../assets/back-end/assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
  <script src="../assets/back-end/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
  <script src="../assets/back-end/assets/plugins/select2/select2.js"></script>
  <script src="../assets/back-end/assets/plugins/bootstrap-slider/js/bootstrap-slider.js"></script>
  <script src="../assets/back-end/assets/js/form.js"></script>
  <script src="../assets/back-end/assets/plugins/jquery-datatables/js/jquery.dataTables.min.js"></script>
  <script src="../assets/back-end/assets/plugins/jquery-datatables/js/dataTables.bootstrap.js"></script>
  <script src="../assets/back-end/assets/js/datatables.js"></script>
  <!-- END JS PLUGIN -->
<script language='javascript'>
  function showKab(){
  <?php
    $query = "SELECT * FROM tbl_bagian";
    $hasil = mysql_query($query);
    while ($data = mysql_fetch_array($hasil))
    {
      $prov = $data["id_bagian"];
      echo "if (document.form1.id_bagian.value == \"".$prov."\")";
      echo "{";
      $query2 = "SELECT * FROM tbl_jabatan WHERE id_bagian = '$prov'";
      $hasil2 = mysql_query($query2);
      $content = "document.getElementById('id_jabatan').innerHTML = \"";
      while ($data2 = mysql_fetch_array($hasil2))
      {
        $content .= "<option value='".$data2['id_jabatan']."''>".$data2['jabatan']."</option>";
      }
        $content .= "\"";
        echo $content;
        echo "}\n";
    }
  ?>
}
</script>
  <!-- BEGIN JS TEMPLATE -->
  <script src="../assets/back-end/assets/js/main.js"></script>
 <script type="text/javascript">

/* FLOT CHART */
function initFlot(){
 
  
  var dataSet4 = [
    { label: "Label 1", data: [1,<?php echo $data_tetap['jumlah_status']; ?>], color: "blue" },
    { label: "Label 2", data: [1,<?php echo $data_kontrak['jumlah_status']; ?>], color: "green" }
  ];
  var dataSet5 = [
    { label: "Label 1", data: [1,<?php echo $data_tetap2['jumlah_status']; ?>], color: "blue" },
    { label: "Label 2", data: [1,<?php echo $data_kontrak2['jumlah_status']; ?>], color: "green" }
  ]

  /* FLOT CHART 1 */
  var donut_chart = $.plot($("#chart-donut"), dataSet4, {
    series: {
      pie: {
        show: true,
        innerRadius: 0.4,
        radius: 0.9,
        label: {
          show: false,
          radius: 1
        }
      }
    },
    legend: {
      show: false
    },
    grid: {
      hoverable: true
    }
  });

  /* FLOT CHART 2 */
  var donut_chart = $.plot($("#chart-donut2"), dataSet5, {
    series: {
      pie: {
        show: true,
        innerRadius: 0.4,
        radius: 0.9,
        label: {
          show: false,
          radius: 1
        }
      }
    },
    legend: {
      show: false
    },
    grid: {
      hoverable: true
    }
  });
}


$(function() {
  "use strict";
  
  initFlot();
  
});
</script>
    
    