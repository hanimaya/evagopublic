  <?php
    $kode_emiten = $_GET['kode_emiten'];
    $nama_emiten = $_GET['nama_emiten'];
  ?> 
    <!-- BEGIN CONTENT -->
    <aside class="right-side">
      <!-- BEGIN CONTENT HEADER -->
      <section class="content-header">
        <i class="fa fa-user"></i>
        <span>Input Data Laporan Keuangan</span>
      </section>
      <!-- END CONTENT HEADER -->
      
      <!-- BEGIN MAIN CONTENT -->
      <section class="content">
        <div class="row">
          
          <!-- BEGIN HORIZONTAL FORM -->
          <div class="col-md-12">
            <div class="grid">
              <div class="grid-header">
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
                <form class="form-horizontal" role="form" action="lk/simpan_lk.php" method="post">
                  <input type="hidden" class="form-control" name="id_user" value="<?php echo $id_user ?>" />
                  <input type="hidden" class="form-control" name="kode_emiten" value="<?php echo $kode_emiten ?>" />
                  <input type="hidden" class="form-control" name="nama_emiten" value="<?php echo $nama_emiten ?>" />

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Tahun</label>
                    <div class="col-sm-3">
                      <select class="form-control" name="tahun">
                        <option value="">--Pilih--</option>
                        <?php
                          for ($tahun=1990;$tahun<=2030;$tahun++){
                        ?>
                        <option value="<?php echo $tahun;?>"><?php echo $tahun;?></option>
                        <?php } ?>                        
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Beban Bunga</label>
                    <div class="col-sm-3">
                      <input type="number" step="any" class="form-control" name="bunga" value="" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Utang Jangka Panjang</label>
                    <div class="col-sm-3">
                      <input type="number" step="any" class="form-control" name="utang" value="" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Modal Saham</label>
                    <div class="col-sm-3">
                      <input type="number" step="any" class="form-control" name="modal" value="" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Laba Sebelum Pajak</label>
                    <div class="col-sm-3">
                      <input type="number" step="any" class="form-control" name="laba" value="" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Beban Pajak</label>
                    <div class="col-sm-3">
                      <input type="number" step="any" class="form-control" name="pajak" value="" />
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="btn-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-default">Bersih</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- END HORIZONTAL FORM -->
        </div>
        
        
       
      </section>
      <!-- END MAIN CONTENT -->
    </aside>
    <!-- END CONTENT -->
    
