

                <?php 
                    $id_lk       = $_GET['id_lk'];
                    $kode_emiten = $_GET['kode_emiten'];
                    $nama_emiten = $_GET['nama_emiten'];
                    $sql         = "SELECT * FROM tbl_lk WHERE id_lk='$id_lk'";
                    $query       = mysql_query($sql);
                    $data        = mysql_fetch_array($query); 

                ?>
     
    <!-- BEGIN CONTENT -->
    <aside class="right-side">
      <!-- BEGIN CONTENT HEADER -->
      <section class="content-header">
        <i class="fa fa-user"></i>
        <span>Edit Data Laporan Keuangan</span>
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
                <form class="form-horizontal" role="form" action="lk/edit_lk.php" method="post">
                  <input type="hidden" class="form-control" name="id_lk" value="<?php echo $id_lk ?>" />
                  <input type="hidden" class="form-control" name="kode_emiten" value="<?php echo $kode_emiten ?>" />
                  <input type="hidden" class="form-control" name="nama_emiten" value="<?php echo $nama_emiten ?>" />

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Tahun</label>
                    <div class="col-sm-3">
                      <select class="form-control" name="tahun">
                        <option value="<?php echo $data['tahun'];?>"><?php echo $data['tahun'];?></option>
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
                      <input type="number" step="any" class="form-control" name="bunga" value="<?php echo $data['bunga'];?>" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Utang Jangka Panjang</label>
                    <div class="col-sm-3">
                      <input type="number" step="any" class="form-control" name="utang" value="<?php echo $data['utang'];?>" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Modal Saham</label>
                    <div class="col-sm-3">
                      <input type="number" step="any" class="form-control" name="modal" value="<?php echo $data['modal'];?>" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Laba Sebelum Pajak</label>
                    <div class="col-sm-3">
                      <input type="number" step="any" class="form-control" name="laba" value="<?php echo $data['laba'];?>" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Beban Pajak</label>
                    <div class="col-sm-3">
                      <input type="number" step="any" class="form-control" name="pajak" value="<?php echo $data['pajak'];?>" />
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
    
