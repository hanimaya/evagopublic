    
    
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
                <table width="100%" border="1" cellspacing="0" cellpadding="0">
                  <tr>
                    <td>KODE</td>
                    <td>TAHUN</td>
                    <td>NILAI</td>
                  </tr>
                  <?php
                    $sql  = mysql_query("SELECT * FROM tbl_emiten");
                    while($data = mysql_fetch_assoc($sql)){
                      $kode_emiten = $data['kode_emiten'];
                  ?>
                  <tr>
                    <td>
                      <?php
                          echo $data['kode_emiten'];
                        
                      ?>
                    </td>
                    
                    <td>
                    <?php
                        $sql2  = mysql_query("SELECT tahun FROM tbl_eva WHERE kode_emiten='$kode_emiten'");
                        while($data2 = mysql_fetch_assoc($sql2)){
                          echo $data2['tahun'];
                        }
                      ?>
                    </td>
                    <td>
                      <?php
                        $sql2  = mysql_query("SELECT nilai_eva FROM tbl_eva WHERE kode_emiten='$kode_emiten'");
                        while($data2 = mysql_fetch_assoc($sql2)){
                          echo $data2['nilai_eva'];
                        }
                      ?>
                    </td>
                  </tr>
                  <?php } ?>
                </table>
                </div>
              </div>
            </div>
          </div>
          <!-- END BASIC DATATABLES -->
        </div>
      </section>
      </aside>
