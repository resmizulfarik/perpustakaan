<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Detail Sejarah - Perpustakaan SMA Negeri 7 Sijunjung</title>

  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

  <style>
    body { font-family: 'Poppins', sans-serif; background-color: #f8f9fa; }
    
    .header-bg {
        background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset("assets/img/buku.jpg") }}');
        background-size: cover; background-position: center;
        padding: 100px 0 60px; color: white; text-align: center;
    }
    
    .content-card {
        background: white; border-radius: 15px; border: none;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05); padding: 40px; margin-top: -50px;
    }

    .divider { width: 60px; height: 3px; background: #f1c40f; margin: 20px auto; }
  </style>
</head>

<body>

  <header id="header" class="header d-flex align-items-center fixed-top" style="background: #1b2f45; padding: 15px 0;">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="{{ url('/') }}" class="logo d-flex align-items-center text-decoration-none">
        <img src="{{ asset('assets/img/logo_sekolah.png') }}" alt="Logo" style="height: 50px; margin-right: 15px;">
        <h1 style="display: flex; flex-direction: column; line-height: 1.1; margin: 0;">
            <span style="font-weight: 800; font-size: 18px; color: white;">PERPUSTAKAAN</span>
            <span style="font-weight: 400; font-size: 11px; color: #f1c40f;">SMA NEGERI 7 SIJUNJUNG</span>
        </h1>
      </a>
    </div>
  </header>

  <main id="main">
    <div class="header-bg">
      <div class="container">
        <h2 class="fw-bold display-5">Detail Sejarah</h2>
        <div style="color: #f1c40f; font-weight: 600;">
          <a href="{{ url('/') }}" style="color: #f1c40f; text-decoration: none;">Home</a> / Sejarah
        </div>
      </div>
    </div>

    <section class="container mb-5">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="content-card">
            <h3 class="text-center fw-bold" style="color: #1b2f45;">Our Library History</h3>
            <div class="divider"></div>
            
            <div class="mt-4" style="text-align: justify; line-height: 1.9; color: #444; font-size: 1.05rem;">
                {{ $sejarah->isi }}
            </div>

            <div class="mt-5 text-center pt-4 border-top">
                <a href="{{ route('sejarah.index') }}" class="btn btn-outline-primary px-4 rounded-pill">
                    <i class="bi bi-arrow-left me-2"></i> Kembali ke Beranda
                </a>
                
                @auth
                <a href="{{ route('sejarah.create') }}" class="btn btn-warning px-4 rounded-pill ms-2">
                    <i class="bi bi-pencil-square me-2"></i> Edit Narasi
                </a>
                @endauth
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer class="py-4 bg-white text-center border-top">
    <small class="text-muted">&copy; 2026 Perpustakaan SMA Negeri 7 Sijunjung</small>
  </footer>

</body>
</html>