    <?php
    $kode_emiten = $_GET['kode_emiten'];
    $nama_emiten = $_GET['nama_emiten'];
  ?>  
    
    <!-- BEGIN CONTENT -->
    <aside class="right-side">
      <!-- BEGIN CONTENT HEADER -->
      <section class="content-header">
        <i class="fa fa-user"></i>
        <span>Data Return Individual <?php echo $nama_emiten ?></span>
        
      </section>
      <!-- END CONTENT HEADER -->
      


    <section class="content">
        <div class="row">
          <!-- BEGIN BASIC DATATABLES -->
          <div class="col-md-12">
            <div class="grid no-border">
              <div class="grid-header">
                <i class="fa fa-rir"></i>
                <span class="grid-title">
                  <a href="index.php?mod=emiten&pg=detail_emiten&kode_emiten=<?php echo $kode_emiten ?>&nama_emiten=<?php echo $nama_emiten ?>">
                  <button type="button" class="btn btn-primary">
                        <i class="fa fa-arrow-left"></i> Kembali
                  </button>
                  </a>

                  <a href="index.php?mod=ri&pg=form_input_ri&kode_emiten=<?php echo $kode_emiten ?>&nama_emiten=<?php echo $nama_emiten ?>">
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
                      <th>Bulan</th>
                      <th>Tahun</th>
                      <th>Nilai PI</th>
                      <th>Nilai RI</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php 
                        $sql = mysql_query("SELECT * FROM tbl_ri 
                                            WHERE kode_emiten='$kode_emiten'
                                            AND id_user='$id_user'");
                        $no  = 1;
                        while($data=mysql_fetch_array($sql)){
                     ?>
                    <tr>
                      <td><?php echo $no++;?></td>
                      <td><?php echo $data['bulan'];?></td>
                      <td><?php echo $data['tahun'];?></td>
                      <td><?php echo number_format($data['nilai_pi'],0,",",".");?></td>
                      <td><?php echo number_format($data['nilai_ri'],3,",",".");?></td>
                      <td>

                      <a href="index.php?mod=ri&pg=form_edit_ri&id_ri=<?php echo $data['id_ri'];?>&kode_emiten=<?php echo $kode_emiten ?>&nama_emiten=<?php echo $nama_emiten ?>">
                      <button type="button" class="btn btn-primary">
                        <i class="fa fa-edit"></i>
                      </button>
                      </a>

                      <a href="ri/hapus_ri.php?id_ri=<?php echo $data['id_ri'];?>&kode_emiten=<?php echo $kode_emiten ?>&nama_emiten=<?php echo $nama_emiten ?>" onclick="return confirm('Apakah anda ingin menghapus data ini?')">
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
          <!-- END BASIC DATATABLES -->
        </div>
      </section>
      </aside>