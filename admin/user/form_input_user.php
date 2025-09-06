
    
    <!-- BEGIN CONTENT -->
    <aside class="right-side">
      <!-- BEGIN CONTENT HEADER -->
      <section class="content-header">
        <i class="fa fa-user"></i>
        <span>Input User</span>
        <ol class="breadcrumb">
          <li><a href="index-2.html">Home</a></li>
          <li><a href="#">User</a></li>
          <li class="active">Input User</li>
        </ol>
      </section>
      <!-- END CONTENT HEADER -->
      
      <!-- BEGIN MAIN CONTENT -->
      <section class="content">
        <div class="row">
          
          <!-- BEGIN HORIZONTAL FORM -->
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
                <form class="form-horizontal" role="form" action="user/simpan_user.php" method="post">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">email</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="email" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="password" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Konfirmasi Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="password2" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Level</label>
                    <div class="col-sm-3">
                      <select class="form-control" name="level" required="">
                        <option value="">--Pilih--</option>
                        <option value="admin">Admin</option>
                        <option value="kepala">Kepala</option>
                        <option value="user">User</option>
                      </select>
                    </div>
                  </div>
                  <!--
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Date Only</label>
                    <div class="col-sm-3">
                      <div class="input-group date form_date" data-date="2014-06-14T05:25:07Z" data-date-format="yyyy-dd-mm" data-link-field="dtp_input3">
                        <input type="text" class="form-control">
                        <span class="input-group-addon"><i class="fa fa-th"></i></span>
                      </div>
                      <input type="hidden" id="dtp_input3" value="" />
                    </div>
                  </div>
                  -->
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
    
