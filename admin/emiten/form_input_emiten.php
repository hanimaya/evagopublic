<?php
    @$kode_emiten = $_GET['kode_emiten'];
    @$nama_emiten = $_GET['nama_emiten'];
?>
    
    <!-- BEGIN CONTENT -->
    <aside class="right-side">
      <!-- BEGIN CONTENT HEADER -->
      <section class="content-header">
        <i class="fa fa-user"></i>
        <span>Input emiten</span>
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
                <form class="form-horizontal" role="form" action="emiten/simpan_emiten.php" method="post">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Kode</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="kode_emiten" value="<?php echo $kode_emiten?>" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nama Emiten</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama_emiten" value="<?php echo $nama_emiten?>" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Tanggal IPO</label>
                    <div class="col-sm-3">
                      <div class="input-group date form_date" data-date-format="yyyy-mm-dd" data-link-field="dtp_input3">
                        <input type="text" class="form-control" name="tgl_ipo" >
                        <span class="input-group-addon"><i class="fa fa-th"></i></span>
                      </div>
                      <input type="hidden" id="dtp_input3" value="" />
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
    
