    
    
    <!-- BEGIN CONTENT -->
    <aside class="right-side">
      <!-- BEGIN CONTENT HEADER -->
      <section class="content-header">
        <i class="fa fa-user"></i>
        <span>Data User</span>
        <ol class="breadcrumb">
          <li><a href="index-2.html">Home</a></li>
          <li><a href="#">User</a></li>
          <li class="active">Data User</li>
        </ol>
      </section>
      <!-- END CONTENT HEADER -->
      


    <section class="content">
        <div class="row">
          <!-- BEGIN BASIC DATATABLES -->
          <div class="col-md-12">
            <div class="grid no-border">
              <div class="grid-header">
                <i class="fa fa-userr"></i>
                <span class="grid-title">
                <?php
                      if ($level=='admin'){
                      ?>
                  <a href="index.php?mod=user&pg=form_input_user">
                  <button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Input</button>
                  </a>
                  <?php } ?>
                </span>
                <div class="pull-right grid-tools">
                  <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
                  <a data-widget="reload" title="Reload"><i class="fa fa-refresh"></i></a>
                  <a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>
                </div>
              </div>
              <div class="grid-body">
                <table id="dataTables1" class="data-table table table-bordered table-striped" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th style="text-align:left">No</th>
                      <th>email</th>
                      <th>Password</th>
                      <th>Level</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php 
                        $level   = $_SESSION['level'];
                        $id_user = $_SESSION['id_user'];
                        if ($level=='admin'){
                          $sql = mysql_query("SELECT * FROM tbl_user");
                        } else {
                          $sql = mysql_query("SELECT * FROM tbl_user WHERE id_user='$id_user'");
                        }
                        $no  = 1;
                        while($data=mysql_fetch_array($sql)){
                     ?>
                    <tr>
                      <td><?php echo $no++;?></td>
                      <td><?php echo $data['email'];?></td>
                      <td><?php echo $data['password'];?></td>
                      <td><?php echo $data['level'];?></td>
                      <td>
                      <a href="index.php?mod=user&pg=form_edit_user&id_user=<?php echo $data['id_user'];?>">
                      <button type="button" class="btn btn-primary">
                        <i class="fa fa-edit"></i>
                      </button>
                      </a>
                      <?php
                      if ($level=='admin'){
                      ?>
                      <a href="user/hapus_user.php?id_user=<?php echo $data['id_user'];?>" onclick="return confirm('Apakah anda ingin menghapus data ini?')">
                      <button type="button" class="btn btn-danger">
                        <i class="fa fa-trash-o"></i>
                      </button>
                      </a>
                      <?php } ?>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- END BASIC DATATABLES -->
        </div>
      </section>
      </aside>