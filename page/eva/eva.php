  <?php
    $kode_emiten  = isset($_GET['kode_emiten']) ? $_GET['kode_emiten'] : '';
    $nama_emiten  = isset($_GET['nama_emiten']) ? $_GET['nama_emiten'] : '';
    $dari_tahun   = isset($_POST['dari_tahun']) ? $_POST['dari_tahun'] : '';
    $sampai_tahun = isset($_POST['sampai_tahun']) ? $_POST['sampai_tahun'] : '';
  ?>  

<!-- Parallax Effect -->
<script type="text/javascript">$(document).ready(function(){$('#parallax-pagetitle').parallax("50%", -0.55);});</script>
<section class="parallax-effect" tabindex="5000" style="overflow: hidden; outline: none;">
  <div id="parallax-pagetitle" style="background-image: url(&quot;images/parallax/parallax-01.jpg&quot;); background-position: 50% -67px;">
    <div class="color-overlay"> 
      <!-- Page title -->
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <ol class="breadcrumb">
              <li>&nbsp;</li>
              <li>&nbsp;</li>
            </ol>
            <h1><i class="fa fa-building"></i> RASIO KEUANGAN PERUSAHAAN</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<br>
<div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <h2></h2>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12">
        <a href="https://www.idx.co.id/" target="_blank" class="btn btn-success btn-lg pull-right"><i class="fa fa-bar-chart-o"></i> Lihat Grafik</a>
        
      </div>
    </div>
  </div>
<div class="container">
  <div class="row"> 

    <!-- Blog -->
    <section class="blog mt50">
      <div class="col-md-12"> 
       
        <article> 
          <div class="row">
           
           <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
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
                        $sql = db_query( "SELECT * FROM tbl_emiten");
                        $no  = 1;
                        while($data=db_fetch_array($sql)){
                     ?>
                    <tr>
                      <td><?php echo $no++;?></td>
                      <td><?php echo $data['kode_emiten'];?></td>
                      <td><?php echo $data['nama_emiten'];?></td>
                      <td><?php echo $data['tgl_ipo'];?></td>
                      <td>
                      <a href="index.php?mod=page/eva&pg=rincian_eva&kode_emiten=<?php echo $data['kode_emiten'];?>&nama_emiten=<?php echo $data['nama_emiten'];?>">
                      <button type="button" class="btn btn-success">
                        <i class="fa fa-eye"></i> Lihat EVA
                      </button>
                      </a>

                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
            </div><!-- /.box-body -->
          </div>
        </article>
      
      </div>
    </section>

    
    <!-- Aside -->
    
  </div>
</div>
