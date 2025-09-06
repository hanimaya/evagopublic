<?php 
      $jumlah_emiten    = "SELECT COUNT(tbl_emiten.kode_emiten) AS jumlah_emiten 
                              FROM tbl_emiten";

      $jumlah_user    = "SELECT COUNT(tbl_user.id_user) AS jumlah_user FROM tbl_user";

      $query1 = mysql_query($jumlah_emiten);
      $query4 = mysql_query($jumlah_user);

      $data1 = mysql_fetch_array($query1);
      $data4 = mysql_fetch_array($query4);

      $dari_tahun   = $_POST['dari_tahun'];
      $sampai_tahun   = $_POST['sampai_tahun'];
 ?>
 <!-- BEGIN CONTENT -->
    <aside class="right-side">
      <!-- BEGIN CONTENT HEADER -->   
      <section class="content-header">
        <i class="fa fa-home"></i>
        <span>Dashboard</span>
        <ol class="breadcrumb">
          <li><a href="http://localhost/eva/index.php">Home</a></li>
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
                    <span class="title">JUMLAH EMITEN</span>
                    <span class="value"><?php echo $data1['jumlah_emiten']?></span>
                    <span class="stat1 chart"><i class="fa fa-user"></i></span>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="grid widget bg-light-blue">
                  <div class="grid-body">
                    <span class="title">JUMLAH USER</span>
                    <span class="value"><?php echo $data4['jumlah_user']?></span>
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
                    <div class="col-sm-offset-2 col-sm-2">
                      <div class="btn-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Cari</button>
                      </div>
                    </div>
                  </div>
                </form>
                  <div id='container'></div>
                  
              </div>
            </div>
          </div>
          <!-- END WIDGET -->
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
  <script src="../assets/back-end/assets/js/highcharts.js"></script>
  <script src="../assets/back-end/assets/plugins/jquery-datatables/js/jquery.dataTables.min.js"></script>
  <script src="../assets/back-end/assets/plugins/jquery-datatables/js/dataTables.bootstrap.js"></script>
  <script src="../assets/back-end/assets/js/datatables.js"></script>
  <!-- END JS PLUGIN -->
  
  <!-- BEGIN JS TEMPLATE -->
  <script src="../assets/back-end/assets/js/main.js"></script>
 <script type="text/javascript">
  $(function () {
    $('#container').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'PERHITUNGAN EVA PERUSAHAAN'
        },
        subtitle: {
            text: ''
        },
        xAxis: {

            categories: [
                          <?php 
                            $sql3  = mysql_query("SELECT nama_emiten FROM tbl_emiten,tbl_eva
                                                  WHERE tbl_eva.kode_emiten=tbl_emiten.kode_emiten
                                                  GROUP BY nama_emiten ORDER BY id_eva");
                            while($data3 = mysql_fetch_assoc($sql3)){
                          ?>
                          '<?php echo $data3['nama_emiten'] ?>',
                          <?php } ?>
                        ],
            title: {
                text: 'NAMA EMITEN',
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Perhitungan EVA',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' Rupiah'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 80,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [
        <?php 
              if (!empty($dari_tahun)){
              $sql   = "SELECT * FROM tbl_eva 
                        WHERE tahun BETWEEN '$dari_tahun' AND '$sampai_tahun'
                        GROUP BY tahun";
              } else {
                $sql   = "SELECT * FROM tbl_eva 
                        GROUP BY tahun";
              }
              $query = mysql_query( $sql )  or die(mysql_error());
              while( $ret = mysql_fetch_array( $query ) ){
              $id_eva=$ret['id_eva'];                  
              $kode_emiten=$ret['kode_emiten'];                  
              $tahun=$ret['tahun'];

                             
                  ?>
                  { 
                      name: '<?php echo $tahun; ?>',
                      data: [
                              <?php
                                $sql = mysql_query("SELECT * FROM tbl_eva WHERE tahun='$tahun'");
                                while($datanya=mysql_fetch_assoc($sql)){
                                  $jumlah1 = $datanya['nilai_eva'];
                              ?>
                              <?php echo $jumlah1; ?>,
                              <?php } ?>
                            ]
                  },
                  <?php } ?>
                  ]
    });
});  
</script>

