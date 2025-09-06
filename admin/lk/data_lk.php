    <?php
    $kode_emiten = $_GET['kode_emiten'];
    $nama_emiten = $_GET['nama_emiten'];
  ?>  
    
    <!-- BEGIN CONTENT -->
    <aside class="right-side">
      <!-- BEGIN CONTENT HEADER -->
      <section class="content-header">
        <i class="fa fa-user"></i>
        <span>Data Laporan Keuangan <?php echo $nama_emiten ?></span>
        
      </section>
      <!-- END CONTENT HEADER -->
      


    <section class="content">
        <div class="row">
          <!-- BEGIN BASIC DATATABLES -->
          <div class="col-md-12">
            <div class="grid no-border">
              <div class="grid-header">
                <i class="fa fa-lkr"></i>
                <span class="grid-title">
                  <a href="index.php?mod=emiten&pg=detail_emiten&kode_emiten=<?php echo $kode_emiten ?>&nama_emiten=<?php echo $nama_emiten ?>">
                  <button type="button" class="btn btn-primary">
                        <i class="fa fa-arrow-left"></i> Kembali
                  </button>
                  </a>

                  <a href="index.php?mod=lk&pg=form_input_lk&kode_emiten=<?php echo $kode_emiten ?>&nama_emiten=<?php echo $nama_emiten ?>">
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
                      <th>Tahun</th>
                      <th>Bunga</th>
                      <th>Utang</th>
                      <th>Modal</th>
                      <th>Laba</th>
                      <th>Pajak</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php 
                        $sql = mysql_query("SELECT * FROM tbl_lk
                                            WHERE kode_emiten='$kode_emiten'
                                            AND tbl_lk.id_user='$id_user'");
                        $no  = 1;
                        while($data=mysql_fetch_array($sql)){
                     ?>
                    <tr>
                      <td><?php echo $no++;?></td>
                      <td><?php echo $data['tahun'];?></td>
                      <td>
                        <?php 
                          echo "LK Bunga  = Rp ".number_format($data['bunga'],0,",",".")."<br>";
                          echo "Hasil LK  = Rp "."<b>".number_format($data['hasil_bunga'],0,",",".")."<b><br>";
                        ?>
                      </td>
                      <td>
                        <?php 
                          echo "LK Utang  = Rp ".number_format($data['utang'],0,",",".")."<br>";
                          echo "Hasil LK  = Rp "."<b>".number_format($data['hasil_utang'],0,",",".")."<b><br>";
                        ?>
                      </td>
                      <td>
                        <?php 
                          echo "LK Modal  = Rp ".number_format($data['modal'],0,",",".")."<br>";
                          echo "Hasil LK  = Rp "."<b>".number_format($data['hasil_modal'],0,",",".")."<b><br>";
                        ?>
                      </td>
                      <td>
                        <?php 
                          echo "LK Laba   = Rp ".number_format($data['laba'],0,",",".")."<br>";
                          echo "Hasil LK  = Rp "."<b>".number_format($data['hasil_laba'],0,",",".")."<b><br>";
                        ?>
                      </td>
                      <td>
                        <?php 
                          echo "LK Pajak  = Rp ".number_format($data['pajak'],0,",",".")."<br>";
                          echo "Hasil LK  = Rp "."<b>".number_format($data['hasil_pajak'],0,",",".")."<b><br>";
                        ?>
                      </td>
                      <td>

                      <a href="index.php?mod=lk&pg=form_edit_lk&id_lk=<?php echo $data['id_lk'];?>&kode_emiten=<?php echo $kode_emiten ?>&nama_emiten=<?php echo $nama_emiten ?>">
                      <button type="button" class="btn btn-primary">
                        <i class="fa fa-edit"></i>
                      </button>
                      </a>

                      <a href="lk/hapus_lk.php?id_lk=<?php echo $data['id_lk'];?>&kode_emiten=<?php echo $kode_emiten ?>&nama_emiten=<?php echo $nama_emiten ?>" onclick="return confirm('Apakah anda ingin menghapus data ini?')">
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