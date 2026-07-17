  <?php
    $kode_ri = $_GET['kode_ri'];
    $nama_ri = $_GET['nama_ri'];
  ?>  
    
    <!-- BEGIN CONTENT -->
    <aside class="right-side">
      <!-- BEGIN CONTENT HEADER -->
      <section class="content-header">
        <i class="fa fa-building"></i>
        <span>ANALISIS RASIO <?php echo $nama_ri ?></span>
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
                <table class="data-table table table-bordered table-striped" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>
                        <a href="index.php?mod=rasio_roe&pg=data_rasio_roe&kode_ri=<?php echo $kode_ri; ?>&nama_ri=<?php echo $nama_ri ?>">
                        <div class="col-lg-3 col-md-4 col-sm-6">
                          <div class="grid widget bg-light-blue">
                            <div class="grid-body">
                              <span class="title">&nbsp;</span>
                              <span class="value">ROE</span>
                              <span class="stat1 chart">&nbsp;</span>
                            </div>
                          </div>
                        </div>
                        </a>

                        <a href="index.php?mod=rasio_roi&pg=data_rasio_roi&kode_ri=<?php echo $kode_ri; ?>&nama_ri=<?php echo $nama_ri ?>">
                        <div class="col-lg-3 col-md-4 col-sm-6">
                          <div class="grid widget bg-light-blue">
                            <div class="grid-body">
                              <span class="title">&nbsp;</span>
                              <span class="value">ROI</span>
                              <span class="stat1 chart">&nbsp;</span>
                            </div>
                          </div>
                        </div>
                        </a>

                        <a href="index.php?mod=rasio_cash&pg=data_rasio_cash&kode_ri=<?php echo $kode_ri; ?>&nama_ri=<?php echo $nama_ri ?>">
                        <div class="col-lg-3 col-md-4 col-sm-6">
                          <div class="grid widget bg-light-blue">
                            <div class="grid-body">
                              <span class="title">&nbsp;</span>
                              <span class="value">CASH RATIO</span>
                              <span class="stat1 chart">&nbsp;</span>
                            </div>
                          </div>
                        </div>
                        </a>

                        <a href="index.php?mod=rasio_current&pg=data_rasio_current&kode_ri=<?php echo $kode_ri; ?>&nama_ri=<?php echo $nama_ri ?>">
                        <div class="col-lg-3 col-md-4 col-sm-6">
                          <div class="grid widget bg-light-blue">
                            <div class="grid-body">
                              <span class="title">&nbsp;</span>
                              <span class="value">CURRENT RATIO</span>
                              <span class="stat1 chart">&nbsp;</span>
                            </div>
                          </div>
                        </div>
                        </a>

                      </th>
                    </tr>

                    <tr>
                      <th>
                        <a href="index.php?mod=rasio_cp&pg=data_rasio_cp&kode_ri=<?php echo $kode_ri; ?>&nama_ri=<?php echo $nama_ri ?>">
                        <div class="col-lg-3 col-md-4 col-sm-6">
                          <div class="grid widget bg-light-blue">
                            <div class="grid-body">
                              <span class="title">&nbsp;</span>
                              <span class="value">CP</span>
                              <span class="stat1 chart">&nbsp;</span>
                            </div>
                          </div>
                        </div>
                        </a>

                        <a href="index.php?mod=rasio_pp&pg=data_rasio_pp&kode_ri=<?php echo $kode_ri; ?>&nama_ri=<?php echo $nama_ri ?>">
                        <div class="col-lg-3 col-md-4 col-sm-6">
                          <div class="grid widget bg-light-blue">
                            <div class="grid-body">
                              <span class="title">&nbsp;</span>
                              <span class="value">PP</span>
                              <span class="stat1 chart">&nbsp;</span>
                            </div>
                          </div>
                        </div>
                        </a>

                        <a href="index.php?mod=rasio_tato&pg=data_rasio_tato&kode_ri=<?php echo $kode_ri; ?>&nama_ri=<?php echo $nama_ri ?>">
                        <div class="col-lg-3 col-md-4 col-sm-6">
                          <div class="grid widget bg-light-blue">
                            <div class="grid-body">
                              <span class="title">&nbsp;</span>
                              <span class="value">TATO</span>
                              <span class="stat1 chart">&nbsp;</span>
                            </div>
                          </div>
                        </div>
                        </a>

                        <a href="index.php?mod=rasio_tms&pg=data_rasio_tms&kode_ri=<?php echo $kode_ri; ?>&nama_ri=<?php echo $nama_ri ?>">
                        <div class="col-lg-3 col-md-4 col-sm-6">
                          <div class="grid widget bg-light-blue">
                            <div class="grid-body">
                              <span class="title">&nbsp;</span>
                              <span class="value">TMS TERHADAP TA</span>
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
          <!-- END BASIC DATATABLES -->
        </div>
      </section>
      </aside>