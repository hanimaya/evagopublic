  <?php
    $kode_emiten = $_GET['kode_emiten'];
    $nama_emiten = $_GET['nama_emiten'];
  ?>  
    
    <!-- BEGIN CONTENT -->
    <aside class="right-side">
      <!-- BEGIN CONTENT HEADER -->
      <section class="content-header">
        <i class="fa fa-building"></i>
        <span>ECOMONIC VALUE ADDED <?php echo $nama_emiten ?></span>
      </section>
      <!-- END CONTENT HEADER -->
      


    <section class="content">
        <div class="row">
          <!-- BEGIN BASIC DATATABLES -->
          <div class="col-md-12">
            <div class="grid no-border">
              <div class="grid-header">
                <i class="fa fa-emitenr"></i>
                <span class="grid-title">
                  <a href="index.php?mod=emiten&pg=data_emiten">
                  <button type="button" class="btn btn-primary">
                        <i class="fa fa-arrow-left"></i> Kembali
                  </button>
                  </a>
                </span>
                <div class="pull-right grid-tools">
                  <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
                  <a data-widget="reload" title="Reload"><i class="fa fa-refresh"></i></a>
                  <a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>
                </div>
              </div>
              <div class="grid-body">
              <div class="box-body table-responsive">
                <table class="data-table table table-bordered table-striped" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>
                        <a href="index.php?mod=lk&pg=data_lk&kode_emiten=<?php echo $kode_emiten; ?>&nama_emiten=<?php echo $nama_emiten ?>">
                        <div class="col-lg-3 col-md-4 col-sm-6">
                          <div class="grid widget bg-light-blue">
                            <div class="grid-body">
                              <span class="title">&nbsp;</span>
                              <span class="value">LK</span>
                              <span class="stat1 chart">&nbsp;</span>
                            </div>
                          </div>
                        </div>
                        </a>

                        <a href="index.php?mod=ri&pg=data_ri&kode_emiten=<?php echo $kode_emiten; ?>&nama_emiten=<?php echo $nama_emiten ?>">
                        <div class="col-lg-3 col-md-4 col-sm-6">
                          <div class="grid widget bg-light-blue">
                            <div class="grid-body">
                              <span class="title">&nbsp;</span>
                              <span class="value">RI</span>
                              <span class="stat1 chart">&nbsp;</span>
                            </div>
                          </div>
                        </div>
                        </a>

                        <a href="index.php?mod=beta&pg=data_beta&kode_emiten=<?php echo $kode_emiten; ?>&nama_emiten=<?php echo $nama_emiten ?>">
                        <div class="col-lg-3 col-md-4 col-sm-6">
                          <div class="grid widget bg-light-blue">
                            <div class="grid-body">
                              <span class="title">&nbsp;</span>
                              <span class="value">BETA</span>
                              <span class="stat1 chart">&nbsp;</span>
                            </div>
                          </div>
                        </div>
                        </a>

                        <a href="index.php?mod=eva&pg=data_eva&kode_emiten=<?php echo $kode_emiten; ?>&nama_emiten=<?php echo $nama_emiten ?>">
                        <div class="col-lg-3 col-md-4 col-sm-6">
                          <div class="grid widget bg-light-blue">
                            <div class="grid-body">
                              <span class="title">&nbsp;</span>
                              <span class="value">EVA</span>
                              <span class="stat1 chart">&nbsp;</span>
                            </div>
                          </div>
                        </div>
                        </a>

                         <a href="index.php?mod=emiten&pg=dashboards&kode_emiten=<?php echo $kode_emiten; ?>&nama_emiten=<?php echo $nama_emiten ?>">
                        <div class="col-lg-3 col-md-4 col-sm-6">
                          <div class="grid widget bg-light-blue">
                            <div class="grid-body">
                              <span class="title">&nbsp;</span>
                              <span class="value">GRAFIK</span>
                              <span class="stat1 chart">&nbsp;</span>
                            </div>
                          </div>
                        </div>
                        </a>

                      </th>
                    </tr>

                    
                  </thead>

                  <tbody>
                    
                  </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>
          <!-- END BASIC DATATABLES -->
        </div>
      </section>
      </aside>