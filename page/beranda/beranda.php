<?php
// Begin main content area
?>

<!-- BEGIN CONTENT -->
<section class="page-content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page-title">
          <h1>Selamat Datang</h1>
          <p>Aplikasi Perhitungan EVA (Economic Value Added) Perusahaan</p>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="info-box">
              <h3>📊 Dashboard</h3>
              <p>Lihat data dan analisis perusahaan</p>
              <a href="index.php?mod=page/eva&pg=eva" class="btn btn-primary">Buka</a>
            </div>
          </div>

          <div class="col-md-4">
            <div class="info-box">
              <h3>📝 Daftar</h3>
              <p>Buat akun pengguna baru</p>
              <a href="index.php?mod=page/daftar&pg=daftar" class="btn btn-primary">Daftar</a>
            </div>
          </div>

          <div class="col-md-4">
            <div class="info-box">
              <h3>🔐 Login</h3>
              <p>Masuk ke dashboard admin</p>
              <a href="index.php?mod=page/login&pg=form_login" class="btn btn-primary">Login</a>
            </div>
          </div>
        </div>

        <hr style="margin: 40px 0;">

        <div class="content-box">
          <h2>Tentang Aplikasi</h2>
          <p>Aplikasi ini dirancang untuk menghitung Economic Value Added (EVA) dari perusahaan publik di Indonesia.</p>
          
          <h3>Fitur Utama:</h3>
          <ul style="list-style-position: inside;">
            <li>Input dan kelola data emiten</li>
            <li>Perhitungan EVA otomatis</li>
            <li>Laporan keuangan</li>
            <li>Visualisasi grafik</li>
            <li>Export data</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- END CONTENT -->

<style>
  .page-title {
    padding: 40px 0;
    text-align: center;
    background: #f9f9f9;
    border-bottom: 2px solid #333;
  }

  .page-title h1 {
    font-size: 48px;
    color: #333;
    margin: 0;
  }

  .page-title p {
    color: #666;
    font-size: 18px;
    margin: 10px 0 0 0;
  }

  .info-box {
    background: white;
    padding: 30px;
    margin: 20px 0;
    border: 1px solid #ddd;
    border-radius: 5px;
    text-align: center;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    transition: box-shadow 0.3s;
  }

  .info-box:hover {
    box-shadow: 0 4px 8px rgba(0,0,0,0.15);
  }

  .info-box h3 {
    color: #333;
    font-size: 24px;
    margin: 0 0 10px 0;
  }

  .info-box p {
    color: #666;
    margin: 10px 0 20px 0;
  }

  .content-box {
    background: white;
    padding: 30px;
    border: 1px solid #ddd;
    border-radius: 5px;
  }

  .content-box h2 {
    color: #333;
    border-bottom: 2px solid #007bff;
    padding-bottom: 10px;
  }

  .content-box ul {
    line-height: 2;
  }

  .content-box li {
    color: #666;
  }
</style>
