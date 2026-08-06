<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>{{ $berita->judul }} - Perpustakaan SMA 7 Sijunjung</title>

  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

  <style>
    body { font-family: 'Poppins', sans-serif; background-color: #fff; color: #444; }
    
    /* Navbar Top (Persis Screenshot Pertama) */
    .top-nav {
      background: #4e73df;
      padding: 15px 0;
      color: white;
      border-bottom: 1px solid rgba(255,255,255,0.1);
    }
    .logo-text h2 { font-family: 'Montserrat', sans-serif; font-weight: 800; margin: 0; font-size: 24px; letter-spacing: 1px; }
    .logo-text p { margin: 0; font-size: 12px; color: #f1c40f; font-weight: 600; text-transform: uppercase; }

    /* Header Berita (Sesuai Screenshot 1) */
    .berita-header {
      background: #4e73df;
      background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
      padding: 80px 0 100px;
      text-align: center;
      color: white;
      position: relative;
    }
    .berita-header h1 { font-family: 'Montserrat', sans-serif; font-weight: 800; font-size: 42px; text-transform: uppercase; }
    
    .breadcrumb-custom {
      background: rgba(255, 255, 255, 0.2);
      display: inline-block;
      padding: 8px 25px;
      border-radius: 50px;
      backdrop-filter: blur(5px);
      margin-top: 20px;
    }
    .breadcrumb-custom a { color: #f1c40f; text-decoration: none; font-weight: 600; }

    .content-section { margin-top: -50px; position: relative; z-index: 10; padding-bottom: 50px; }
    .main-card { background: white; border-radius: 15px; box-shadow: 0 10px 40px rgba(0,0,0,0.1); padding: 40px; }
    .news-img { width: 100%; border-radius: 10px; margin-bottom: 30px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
    .news-meta { color: #888; font-size: 14px; margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 15px; }
    .news-meta i { color: #4e73df; margin-right: 5px; }
    .news-content { line-height: 1.8; font-size: 17px; color: #333; }
  </style>
</head>
<body>

  <nav class="top-nav">
    <div class="container d-flex justify-content-between align-items-center">
      <div class="logo-text">
        <a href="{{ url('/') }}" class="text-white text-decoration-none">
          <h2>PERPUSTAKAAN</h2>
          <p>SMA NEGERI 7 SIJUNJUNG</p>
        </a>
      </div>
      <div class="menu-right d-none d-md-block">
         <a href="{{ url('/') }}" class="text-white text-decoration-none fw-bold">HOME</a>
      </div>
    </div>
  </nav>

  <section class="berita-header">
    <div class="container">
      <h1>DETAIL BERITA</h1>
      <div class="breadcrumb-custom">
        <a href="{{ url('/') }}"><i class="bi bi-house-door-fill"></i> Home</a> 
        <span class="mx-2 text-white-50">></span> 
        <a href="{{ route('berita.index') }}" class="text-white-50">Berita</a>
        <span class="mx-2 text-white-50">></span> 
        <span class="text-white">Baca</span>
      </div>
    </div>
  </section>

  <div class="container content-section">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="main-card">
          <h2 class="fw-bold mb-3" style="color: #1b2f45;">{{ $berita->judul }}</h2>
          
          <div class="news-meta">
            <span><i class="bi bi-calendar3"></i> {{ $berita->created_at }}</span>
            <span class="ms-3"><i class="bi bi-person-fill"></i> Admin Perpustakaan</span>
          </div>

          @if($berita->gambar)
            <img src="{{ asset('storage/' . $berita->gambar) }}" class="news-img" alt="Gambar Berita">
          @endif

          <div class="news-content">
            {!! nl2br(e($berita->isi)) !!}
          </div>

          <div class="mt-5 border-top pt-4">
            <a href="{{ route('berita.index') }}" class="btn btn-outline-primary rounded-pill">
              <i class="bi bi-arrow-left"></i> Kembali ke Daftar Berita
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>