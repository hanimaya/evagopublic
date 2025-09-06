    
    
    <!-- BEGIN CONTENT -->
    <aside class="right-side">
      <!-- BEGIN CONTENT HEADER -->
      <section class="content-header">
        <i class="fa fa-user"></i>
        <span>Data emiten</span>
        
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
                  <a href="index.php?mod=emiten&pg=form_input_emiten">
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
                      <th>Kode</th>
                      <th>Nama Emiten</th>
                      <th>Tanggal IPO</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php 
                        $sql = mysql_query("SELECT * FROM tbl_emiten");
                        $no  = 1;
                        while($data=mysql_fetch_array($sql)){
                     ?>
                    <tr>
                      <td><?php echo $no++;?></td>
                      <td><?php echo $data['kode_emiten'];?></td>
                      <td><?php echo $data['nama_emiten'];?></td>
                      <td><?php echo $data['tgl_ipo'];?></td>
                      <td>
                      <a href="index.php?mod=emiten&pg=detail_emiten&kode_emiten=<?php echo $data['kode_emiten'];?>&nama_emiten=<?php echo $data['nama_emiten'];?>">
                      <button type="button" class="btn btn-success">
                        <i class="fa fa-eye"></i> Kelola EVA
                      </button>
                      </a>
                      <?php
                        if ($level=='admin'){
                      ?>
                      <a href="index.php?mod=emiten&pg=form_edit_emiten&kode_emiten=<?php echo $data['kode_emiten'];?>">
                      <button type="button" class="btn btn-primary">
                        <i class="fa fa-edit"></i>
                      </button>
                      </a>

                      <a href="emiten/hapus_emiten.php?kode_emiten=<?php echo $data['kode_emiten'];?>" onclick="return confirm('Apakah anda ingin menghapus data ini?')">
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
          </div>
          <!-- END BASIC DATATABLES -->
        </div>
      </section>
      </aside>