

<!-- Rooms -->
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
            <h1><i class="fa fa-user"></i> FORM PENDAFTARAN</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<br>
<section class="rooms mt100">
  <div class="container">
    <div class="row room-list fadeIn appear"> 
      <!-- Room -->
      <div class="col-sm-4 single">
       
      </div>
      <!-- Room -->
        <div class="col-md-4">
        <h2 class="lined-heading"><span>DAFTAR</span></h2>
        <?php 
                $act = isset($_GET['act']) ? $_GET['act'] : '';
                if ($act==1){

                ?>
              <div class="alert alert-danger" id="MessageNotSent">
                Password Tidak Sesuai
              </div>
              <?php 
                } else if ($act==2){
              ?>
              <div class="alert alert-danger" id="MessageNotSent">
                Email Sudah Terdaftar
              </div>
              <?php 
              } else if ($act==3) {
              ?>
              <div class="alert alert-success" id="MessageNotSent">
                Berhasil mendaftar silahkan login
              </div>
              <?php } ?>
        <form class="clearfix mt50" role="form" method="post" action="page/daftar/simpan_daftar.php" >
          <div class="row">
          </div>
          <div class="form-group">
            <label for="subject" accesskey="S">Nama</label>
            <input name="nama" type="text" value="" class="form-control" required="" style="color:black" />
          </div>
          <div class="form-group">
            <label for="subject" accesskey="S">Email</label>
            <input name="email" type="email" value="" class="form-control" required="" style="color:black" />
          </div>
          <div class="form-group">
            <label for="subject" accesskey="S">Password</label>
            <input name="password" type="password" value="" class="form-control" required="" style="color:black"/>
          </div>
          <div class="form-group">
            <label for="subject" accesskey="S">Konfirmasi Password</label>
            <input name="password2" type="password" value="" class="form-control" required="" style="color:black"/>
          </div>         
          <button type="submit" class="btn  btn-lg btn-primary">Daftar</button>
          <button type="reset" class="btn  btn-lg btn-primary">Bersih</button>
        </form>
      </div>
      <!-- Room -->
      <div class="col-sm-4 double apartment">
        
      </div>
    
      
    </div>
  </div>
</section>
