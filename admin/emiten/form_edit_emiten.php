

                <?php 
                    $kode_emiten   = $_GET['kode_emiten'];
                    $sql         = "SELECT * FROM tbl_emiten WHERE kode_emiten='$kode_emiten'";
                    $query       = mysql_query($sql);
                    $data        = mysql_fetch_array($query); 

                 ?>
                
   
    
    
    <!-- BEGIN CONTENT -->
    <aside class="right-side">
      <!-- BEGIN CONTENT HEADER -->
      <section class="content-header">
        <i class="fa fa-user"></i>
        <span>Edit emiten</span>
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
                <form class="form-horizontal" role="form" action="emiten/edit_emiten.php" method="post">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Kode</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="kode_emiten" value="<?php echo $data['kode_emiten']?>" required="" readonly="" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">emiten</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama_emiten" value="<?php echo $data['nama_emiten']?>" required="">
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
    
