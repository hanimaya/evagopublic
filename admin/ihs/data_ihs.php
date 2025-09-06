    
    
    <!-- BEGIN CONTENT -->
    <aside class="right-side">
      <!-- BEGIN CONTENT HEADER -->
      <section class="content-header">
        <i class="fa fa-user"></i>
        <span>Data Indeks Harga Saham (IHSG)</span>
        
      </section>
      <!-- END CONTENT HEADER -->
      


    <section class="content">
        <div class="row">
          <!-- BEGIN BASIC DATATABLES -->
          <div class="col-md-12">
            <div class="grid no-border">
              <div class="grid-header">
                <i class="fa fa-ihsr"></i>
                <span class="grid-title">
                  <a href="index.php?mod=ihs&pg=form_input_ihs">
                  <button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Input</button>
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
                <table id="dataTables1" class="data-table table table-bordered table-striped" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Bulan</th>
                      <th>Tahun</th>
                      <th>Nilai CP</th>
                      <th>Nilai RM</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php 
                        $sql = mysql_query("SELECT * FROM tbl_ihs WHERE id_user='$id_user'");
                        $no  = 1;
                        while($data=mysql_fetch_array($sql)){
                     ?>
                    <tr>
                      <td><?php echo $no++;?></td>
                      <td><?php echo $data['bulan'];?></td>
                      <td><?php echo $data['tahun'];?></td>
                      <td><?php echo number_format($data['nilai_cp'],3,",",".");?></td>
                      <td><?php echo number_format($data['nilai_rm'],3,",",".");?></td>
                      <td>

                      <a href="index.php?mod=ihs&pg=form_edit_ihs&id_ihs=<?php echo $data['id_ihs'];?>">
                      <button type="button" class="btn btn-primary">
                        <i class="fa fa-edit"></i>
                      </button>
                      </a>

                      <a href="ihs/hapus_ihs.php?id_ihs=<?php echo $data['id_ihs'];?>" onclick="return confirm('Apakah anda ingin menghapus data ini?')">
                      <button type="button" class="btn btn-danger">
                        <i class="fa fa-trash-o"></i>
                      </button>
                      </a>
                      </td>
                    </tr>
                    <?php } ?>
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