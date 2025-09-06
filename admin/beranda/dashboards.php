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
   <?php
    $kode_emiten = $_GET['kode_emiten'];
    $nama_emiten = $_GET['nama_emiten'];
  ?>  
    
 <!-- BEGIN CONTENT -->
    <aside class="right-side">
      <!-- BEGIN CONTENT HEADER -->   
      <section class="content-header">
        <i class="fa fa-bar-chart-o"></i>
        <span>Grafik EVA</span>
      </section>
      <!-- END CONTENT HEADER -->
      
      <!-- BEGIN MAIN CONTENT -->
      <section class="content">
        <div class="row">
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
  var chart1; // globally available
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'container',
            type: 'column'
         },   
         title: {
            text: 'Grafik Penilaian EVA <?php echo $nama_emiten?>'
         },
         tooltip: {
            valueSuffix: 'Rupiah'
        },
         plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
         xAxis: {
            categories: ['Periode EVA']
         },
         yAxis: {
            title: {
               text: 'Jumlah Nilai'
            }
         },
              series:             
            [
            <?php 
             $sql   = "SELECT tahun  FROM tbl_eva where kode_emiten='$kode_emiten'";
            $query = mysql_query( $sql )  or die(mysql_error());
            while( $ret = mysql_fetch_array( $query ) ){
              $merek=$ret['tahun'];                     
                 $sql_jumlah   = "SELECT nilai_eva FROM tbl_eva WHERE tahun='$merek' and kode_emiten='$kode_emiten'";        
                 $query_jumlah = mysql_query( $sql_jumlah ) or die(mysql_error());
                 while( $data = mysql_fetch_array( $query_jumlah ) ){
                    $jumlah = $data['nilai_eva'];                 
                  }             
                  ?>
                  {
                      name: '<?php echo $merek; ?>',
                      data: [<?php echo $jumlah; ?>]
                  },
                  <?php } ?>
            ]
      });
   });  
</script>

