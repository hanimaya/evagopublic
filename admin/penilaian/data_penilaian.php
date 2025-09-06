    
    
    <!-- BEGIN CONTENT -->
    <aside class="right-side">
      <!-- BEGIN CONTENT HEADER -->
      <section class="content-header">
        <i class="fa fa-user"></i>
        <span>Data Penilaian Kesehatan Keuangan</span>
        
      </section>
      <!-- END CONTENT HEADER -->
      


    <section class="content">
        <div class="row">
          <!-- BEGIN BASIC DATATABLES -->
          <div class="col-md-12">
            <div class="grid no-border">
              <div class="grid-header">
                <i class="fa fa-perusahaanr"></i>
                <span class="grid-title">
                  <a href="index.php?mod=perusahaan&pg=form_input_perusahaan">
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
                <table id="dataTables1" class="data-table table table-bordered table-striped" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode</th>
                      <th>Nama Perusahaan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php 
                        $sql = mysql_query("SELECT * FROM tbl_perusahaan");
                        $no  = 1;
                        while($data=mysql_fetch_array($sql)){
                     ?>
                    <tr>
                      <td><?php echo $no++;?></td>
                      <td><?php echo $data['kode_perusahaan'];?></td>
                      <td><?php echo $data['nama_perusahaan'];?></td>
                      <td>
                      <a href="index.php?mod=penilaian&pg=rincian_penilaian&kode_perusahaan=<?php echo $data['kode_perusahaan'];?>&nama_perusahaan=<?php echo $data['nama_perusahaan'];?>">
                      <button type="button" class="btn btn-success">
                        <i class="fa fa-eye"></i> Lihat
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
          <!-- END BASIC DATATABLES -->
        </div>
      </section>
      </aside>