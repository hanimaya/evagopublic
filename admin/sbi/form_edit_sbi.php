

                <?php 
                    $id_sbi      = $_GET['id_sbi'];
                    $sql         = "SELECT * FROM tbl_sbi WHERE id_sbi='$id_sbi'";
                    $query       = mysql_query($sql);
                    $data        = mysql_fetch_array($query); 

                 ?>
                
   
    
    <!-- BEGIN CONTENT -->
    <aside class="right-side">
      <!-- BEGIN CONTENT HEADER -->
      <section class="content-header">
        <i class="fa fa-user"></i>
        <span>Input Data sbi</span>
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
                <form class="form-horizontal" role="form" action="sbi/edit_sbi.php" method="post">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Bulan</label>
                    <div class="col-sm-3">
                      <select class="form-control" name="bulan">
                        <option value="<?php echo $data['bulan'];?>"><?php echo $data['bulan'];?></option>
                        <option value="Januari">Januari</option>
                        <option value="Februari">Februari</option>
                        <option value="Maret">Maret</option>
                        <option value="April">April</option>
                        <option value="Mei">Mei</option>
                        <option value="Juni">Juni</option>
                        <option value="Juli">Juli</option>
                        <option value="Agustus">Agustus</option>
                        <option value="September">September</option>
                        <option value="Oktober">Oktober</option>
                        <option value="November">November</option>
                        <option value="Desember">Desember</option>
                      </select>
                    </div>
                  </div>
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
                    <label class="col-sm-2 control-label">Nilai</label>
                    <div class="col-sm-3">
                      <input type="hidden" step="any" class="form-control" name="id_sbi" value="<?php echo $data['id_sbi'];?>" />
                      <input type="number" step="any" class="form-control" name="nilai" value="<?php echo $data['nilai'];?>" />
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
    
