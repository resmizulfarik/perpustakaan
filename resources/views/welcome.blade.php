<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Perpustakaan SMA 7 Sijunjung</title>

  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

 <style>
    /* 1. CSS NAVIGASI UTAMA - DIATUR AGAR MUAT 1 BARIS */
    .navbar-nav {
        display: flex !important;
        align-items: center;
        list-style: none;
        padding: 0;
        margin: 0;
    }
    /* Container Utama */
.nav-item-custom {
    position: relative;
    list-style: none;
}

/* Dropdown Menu - Dibuat Kecil & Menempel */
.dropdown-custom {
    display: none;
    position: absolute;
    top: 100%; /* Menempel tepat di bawah tombol */
    right: 0;
    background: white;
    width: 120px; /* Ukuran lebar diperkecil */
    list-style: none;
    padding: 0; /* Padding nol agar tidak bengkak */
    margin: 0; /* Menghilangkan celah penyebab menu hilang */
    border-radius: 5px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    z-index: 9999;
    border: 1px solid #ddd;
    overflow: hidden;
}

/* Jembatan Tak Terlihat (Pengaman agar menu tidak tutup saat kursor lewat) */
.nav-item-custom::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    height: 10px; /* Area jembatan */
    background: transparent;
}

/* Tampilkan saat di-hover */
.nav-item-custom:hover .dropdown-custom {
    display: block;
}

/* Link Logout - Ukuran Font & Padding Diperkecil */
.text-logout {
    color: #333;
    padding: 6px 12px; /* Diperkecil agar tidak terlihat besar */
    display: flex;
    align-items: center;
    gap: 8px;
    text-decoration: none;
    font-weight: bold;
    font-size: 0.75rem; /* Font lebih kecil (0.75rem) */
    transition: 0.2s;
    background: white;
    width: 100%;
    border: none;
    text-align: left;
}

.text-logout:hover {
    background-color: #f8f9fa;
    color: #d32f2f;
}

    .navbar-nav > li {
        /* Jarak antar menu tetap rapat agar muat meski tulisan diperbesar */
        margin: 0 4px !important; 
    }

    .navbar-nav .nav-link {
        padding: 8px 0 !important;
        display: flex;
        align-items: center;
        color: white;
        text-decoration: none;
        font-weight: 700;
        text-transform: uppercase;
        /* UKURAN DIPERBESAR: Dari 14px ke 15px agar lebih jelas */
        font-size: 15px; 
        white-space: nowrap !important;
    }

    /* 2. PERBAIKAN DROPDOWN AGAR POSISI PAS */
    .mobile-nav-toggle { display: none !important; }

    .nav-item-custom {
        position: relative;
        padding-bottom: 20px !important; 
        margin-bottom: -20px !important;
        display: inline-block;
    }

    .nav-item-custom:hover .dropdown-custom {
        display: block !important;
        opacity: 1 !important;
        visibility: visible !important;
    }

    .dropdown-custom {
        display: none;
        position: absolute;
        top: 100%;
        right: 0; 
        background: #ffffff;
        min-width: 180px;
        padding: 10px 0;
        list-style: none;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        border-radius: 4px;
        z-index: 999999;
        margin-top: 5px;
    }

    .dropdown-custom li a {
        color: #333 !important;
        padding: 10px 20px !important;
        text-decoration: none !important;
        display: block !important;
        /* UKURAN DIPERBESAR: Menjadi 14px */
        font-size: 14px;
    }

    /* 3. STYLE TOMBOL LOGIN & ADMIN (UKURAN DISESUAIKAN) */
    .btn-login-nav {
        background: #f1c40f !important;
        color: #333 !important;
        padding: 6px 15px !important; 
        border-radius: 50px !important;
        font-weight: 800 !important;
        transition: 0.3s !important;
        border: none;
        text-decoration: none !important;
        /* UKURAN DIPERBESAR: Menjadi 14px agar seimbang */
        font-size: 14px !important;
        display: inline-block;
    }

    
    /* TETAP: CSS Logout Tidak Diubah Sesuai Permintaan */
    .text-logout {
        color: #dc3545 !important;
        font-weight: 600 !important;
    }

    /* Style tambahan untuk kartu sosmed tetap dipertahankan */
    .promo-sosmed { padding: 80px 0; background: #f9f9f9; text-align: center; }
    .sosmed-card { background: white; padding: 40px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); transition: 0.3s; text-decoration: none; display: block; height: 100%; }
    .sosmed-card:hover { transform: translateY(-10px); box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
    .icon-box-ig { color: #E1306C; font-size: 50px; }
    .icon-box-tt { color: #000000; font-size: 50px; }
</style>
</head>

<body class="index-page">

  <header id="header" style="background: rgba(0,0,0,0.85); height: 90px; position: fixed; top: 0; width: 100%; z-index: 9999; display: flex; align-items: center;">
    <div class="container-fluid" style="display: flex; justify-content: space-between; align-items: center; padding: 0 50px;">
      
      <a href="/" style="text-decoration: none; display: flex; align-items: center;">
        <img src="{{ asset('assets/img/logo_sekolah.png') }}" style="max-height: 50px; margin-right: 15px;">
        <div style="color: white; font-family: 'Montserrat', sans-serif;">
          <div style="font-weight: 800; font-size: 18px; margin: 0;">PERPUSTAKAAN</div>
          <div style="font-weight: 400; font-size: 10px; color: #f1c40f; letter-spacing: 1px;">SMA NEGERI 7 SIJUNJUNG</div>
        </div>
      </a>

      <nav>
        <ul style="display: flex; list-style: none; margin: 0; padding: 0; gap: 25px; align-items: center;">
          <li><a href="/" style="color: #f1c40f; text-decoration: none; font-weight: 700; text-transform: uppercase; font-size: 14px;">Beranda</a></li>
          
        <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarProfile" role="button" data-bs-toggle="dropdown" aria-expanded="false" 
       style="color: white; text-decoration: none; font-weight: 700; text-transform: uppercase; font-size: 14px;">
        Profile
    </a>
    <ul class="dropdown-menu dropdown-menu-dark shadow" aria-labelledby="navbarProfile" style="background-color: #000; border: 1px solid #ffc107; padding: 5px 0;">
        <li>
            <a class="dropdown-item d-flex align-items-center" href="{{ route('sejarah.index') }}" style="font-weight: 600; text-transform: uppercase; font-size: 13px; color: white; padding: 10px 20px;">
                <div style="width: 30px;"><i class="bi bi-clock-history text-warning" style="font-size: 16px;"></i></div> 
                <span>Sejarah</span>
            </a>
        </li>
        <li>
            <a class="dropdown-item d-flex align-items-center" href="/visimisi" style="font-weight: 600; text-transform: uppercase; font-size: 13px; color: white; padding: 10px 20px;">
                <div style="width: 30px;"><i class="bi bi-eye text-warning" style="font-size: 16px;"></i></div> 
                <span>Visi dan Misi</span>
            </a>
        </li>
        <li>
            <a class="dropdown-item d-flex align-items-center" href="/organisasi" style="font-weight: 600; text-transform: uppercase; font-size: 13px; color: white; padding: 10px 20px;">
                <div style="width: 30px;"><i class="bi bi-diagram-3 text-warning" style="font-size: 16px;"></i></div> 
                <span>Struktur Organisasi</span>
            </a>
        </li>
        <li>
            <a class="dropdown-item d-flex align-items-center" href="/staff" style="font-weight: 600; text-transform: uppercase; font-size: 13px; color: white; padding: 10px 20px;">
                <div style="width: 30px;"><i class="bi bi-person-badge text-warning" style="font-size: 16px;"></i></div> 
                <span>Staff Perpustakaan</span>
            </a>
        </li>
        <li>
            <a class="dropdown-item d-flex align-items-center" href="/TataTertib" style="font-weight: 600; text-transform: uppercase; font-size: 13px; color: white; padding: 10px 20px;">
                <div style="width: 30px;"><i class="bi bi-journal-text text-warning" style="font-size: 16px;"></i></div> 
                <span>Tata Tertib</span>
            </a>
        </li>
    </ul>
</li>

          <!-- <li><a href="/info" style="color: white; text-decoration: none; font-weight: 700; text-transform: uppercase; font-size: 14px;">Info</a></li>
          <li><a href="{{ route('berita.index') }}" style="color: white; text-decoration: none; font-weight: 700; text-transform: uppercase; font-size: 14px;">Berita</a></li> -->
          <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarInformasi" role="button" data-bs-toggle="dropdown" aria-expanded="false" 
       style="color: white; text-decoration: none; font-weight: 700; text-transform: uppercase; font-size: 14px;">
        Info
    </a>
    <ul class="dropdown-menu dropdown-menu-dark shadow" aria-labelledby="navbarInformasi" style="background-color: #000; border: 1px solid #ffc107; padding: 5px 0;">
        <li>
            <a class="dropdown-item d-flex align-items-center" href="/info" style="font-weight: 600; text-transform: uppercase; font-size: 13px; color: white; padding: 10px 20px;">
                <div style="width: 30px;"><i class="bi bi-info-circle text-warning"></i></div> 
                <span>Info Perpustakaan</span>
            </a>
        </li>
        <li>
            <a class="dropdown-item d-flex align-items-center" href="{{ route('berita.index') }}" style="font-weight: 600; text-transform: uppercase; font-size: 13px; color: white; padding: 10px 20px;">
                <div style="width: 30px;"><i class="bi bi-newspaper text-warning"></i></div> 
                <span>Berita Terkini</span>
            </a>
        </li>
    </ul>
</li>
      <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle"
       href="#"
       id="navbarEbook"
       role="button"
       data-bs-toggle="dropdown"
       aria-expanded="false"
       style="color: white; text-decoration: none; font-weight: 700; text-transform: uppercase; font-size: 14px;">
        E-BOOK
    </a>

    <ul class="dropdown-menu dropdown-menu-dark shadow"
        aria-labelledby="navbarEbook"
        style="background-color: #000; border: 1px solid #ffc107; padding: 5px 0; border-radius: 4px;">

        <!-- Panduan OPAC -->
        <li>
            <a class="dropdown-item d-flex align-items-center"
               href="{{ route('panduan-opac.index') }}"
               style="font-weight:600; text-transform:uppercase; font-size:13px; color:white; padding:10px 20px;">
                <div style="width:30px; flex-shrink:0;">
                    <i class="bi bi-info-circle text-warning"></i>
                </div>
                <span>Panduan OPAC</span>
            </a>
        </li>

        <!-- Karya Guru -->
        <li>
            <a class="dropdown-item d-flex align-items-center"
               href="{{ route('karya.index', ['kategori' => 'guru']) }}"
               style="font-weight:600; text-transform:uppercase; font-size:13px; color:white; padding:10px 20px;">
                <div style="width:30px; flex-shrink:0;">
                    <i class="bi bi-person-workspace text-warning"></i>
                </div>
                <span>Karya Guru</span>
            </a>
        </li>

        <!-- Karya Siswa -->
        <li>
            <a class="dropdown-item d-flex align-items-center"
               href="{{ route('karya.index', ['kategori' => 'siswa']) }}"
               style="font-weight:600; text-transform:uppercase; font-size:13px; color:white; padding:10px 20px;">
                <div style="width:30px; flex-shrink:0;">
                    <i class="bi bi-person text-warning"></i>
                </div>
                <span>Karya Siswa</span>
            </a>
        </li>

        <!-- Fiksi -->
        <li>
            <a class="dropdown-item d-flex align-items-center"
               href="{{ route('fiksi.index') }}"
               style="font-weight:600; text-transform:uppercase; font-size:13px; color:white; padding:10px 20px;">
                <div style="width:30px; flex-shrink:0;">
                    <i class="bi bi-book text-warning"></i>
                </div>
                <span>Fiksi</span>
            </a>
        </li>

        <!-- Non Fiksi -->
        <li>
            <a class="dropdown-item d-flex align-items-center"
               href="{{ route('nonfiksi.index') }}"
               style="font-weight:600; text-transform:uppercase; font-size:13px; color:white; padding:10px 20px;">
                <div style="width:30px; flex-shrink:0;">
                    <i class="bi bi-journal-text text-warning"></i>
                </div>
                <span>Non Fiksi</span>
            </a>
        </li>

        <!-- Penunjang -->
        <li>
            <a class="dropdown-item d-flex align-items-center"
               href="{{ route('penunjang.index') }}"
               style="font-weight:600; text-transform:uppercase; font-size:13px; color:white; padding:10px 20px;">
                <div style="width:30px; flex-shrink:0;">
                    <i class="bi bi-journal-bookmark text-warning"></i>
                </div>
                <span>Penunjang</span>
            </a>
        </li>

    </ul>
</li>

              <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarGaleri" role="button" data-bs-toggle="dropdown" aria-expanded="false" 
            style="color: white; text-decoration: none; font-weight: 700; text-transform: uppercase; font-size: 14px;">
              Galeri
          </a>
          <ul class="dropdown-menu dropdown-menu-dark shadow" aria-labelledby="navbarGaleri" style="background-color: #000; border: 1px solid #ffc107;">
              <li>
                  <a class="dropdown-item" href="/galeri-foto" style="font-weight: 600; text-transform: uppercase; font-size: 13px; color: white;">
                      <i class="bi bi-image me-2 text-warning"></i> Galeri Foto
                  </a>
              </li>
              <li>
                  <a class="dropdown-item" href="/galeri-video" style="font-weight: 600; text-transform: uppercase; font-size: 13px; color: white;">
                      <i class="bi bi-play-btn me-2 text-warning"></i> Galeri Video
                  </a>
              </li>
          </ul>
      </li>

      <li class="nav-item" style="display: flex; align-items: center;">
    <a class="nav-link" href="/buku-terbaru" 
       style="color: white !important; font-weight: 700; text-transform: uppercase; font-size: 14px; white-space: nowrap; padding: 8px 15px !important;">
       Buku Terbaru
    </a>
</li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarPojok" role="button" data-bs-toggle="dropdown" aria-expanded="false" 
              style="color: white; text-decoration: none; font-weight: 700; text-transform: uppercase; font-size: 14px;">
                Pojok
            </a>
            <ul class="dropdown-menu dropdown-menu-dark shadow" aria-labelledby="navbarPojok" style="background-color: #000; border: 1px solid #ffc107;">
                <li>
                    <a class="dropdown-item" href="/pojok-seni" style="font-weight: 600; text-transform: uppercase; font-size: 13px; color: white;">
                        <i class="bi bi-palette me-2 text-warning"></i> Pojok Seni
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="/pojok-literasi" style="font-weight: 600; text-transform: uppercase; font-size: 13px; color: white;">
                        <i class="bi bi-book me-2 text-warning"></i> Pojok Literasi
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider" style="background-color: #ffc107;">
                </li>
                <li>
                    <a class="dropdown-item" href="/prestasi" style="font-weight: 600; text-transform: uppercase; font-size: 13px; color: white;">
                        <i class="bi bi-trophy me-2 text-warning"></i> Prestasi
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarJaringan" role="button" data-bs-toggle="dropdown" aria-expanded="false" 
       style="color: white; text-decoration: none; font-weight: 700; text-transform: uppercase; font-size: 14px;">
        Jaringan
    </a>
    <ul class="dropdown-menu dropdown-menu-dark shadow" aria-labelledby="navbarJaringan" style="background-color: #000; border: 1px solid #ffc107;">
        <li>
            <a class="dropdown-item" href="https://www.perpusnas.go.id/" target="_blank" style="font-weight: 600; text-transform: uppercase; font-size: 13px; color: white;">
                <i class="bi bi-globe me-2 text-warning"></i> Perpusnas
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="https://dapusip.sumbarprov.go.id/" target="_blank" style="font-weight: 600; text-transform: uppercase; font-size: 13px; color: white;">
                <i class="bi bi-map me-2 text-warning"></i> Pusda Sumbar
            </a>
        </li>
        <li>
            <hr class="dropdown-divider" style="background-color: #ffc107;">
        </li>
        <li>
            <a class="dropdown-item" href="https://onesearch.id/" target="_blank" style="font-weight: 600; text-transform: uppercase; font-size: 13px; color: white;">
                <i class="bi bi-search me-2 text-warning"></i> Indonesia OneSearch
            </a>
        </li>
    </ul>
</li>

          <!-- <li><a href="/team" style="color: white; text-decoration: none; font-weight: 700; text-transform: uppercase; font-size: 14px;">Team</a></li> -->
          <!-- <li><a href="/contact" style="color: white; text-decoration: none; font-weight: 700; text-transform: uppercase; font-size: 14px;">Contact</a></li> -->
          
         @auth
    <li class="nav-item-custom">
        <a href="javascript:void(0)" class="btn-login-nav">
            ADMIN <i class="bi bi-chevron-down"></i>
        </a>

        <ul class="dropdown-custom">
            <li>
                <a href="#" class="text-logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-right"></i> LOGOUT
                </a>
            </li>
        </ul>

        <form id="logout-form" action="{{ route('login.destroy') }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </li>
@else
    <li>
        <a href="{{ route('login') }}" class="btn-login-nav">LOGIN</a>
    </li>
@endauth
  </header>

  <main>
    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show container" role="alert" style="position: fixed; top: 100px; right: 20px; z-index: 9999; width: auto; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
<<section id="hero-slider" class="carousel slide carousel-fade" data-bs-ride="carousel" style="position: relative; height: 100vh; width: 100%; display: flex; align-items: center; justify-content: center; text-align: center; overflow: hidden; background: #000;">
    
    <div class="carousel-indicators" style="z-index: 5; bottom: 30px;">
        <button type="button" data-bs-target="#hero-slider" data-bs-slide-to="0" class="active" style="width: 10px; height: 10px; border-radius: 50%; border: none; background: #f1c40f;"></button>
        <button type="button" data-bs-target="#hero-slider" data-bs-slide-to="1" style="width: 10px; height: 10px; border-radius: 50%; border: none; background: #ffffff; opacity: 0.5;"></button>
        <button type="button" data-bs-target="#hero-slider" data-bs-slide-to="2" style="width: 10px; height: 10px; border-radius: 50%; border: none; background: #ffffff; opacity: 0.5;"></button>
    </div>

    <div class="carousel-inner" style="position: absolute; inset: 0; width: 100%; height: 100%; z-index: 1;">
        <div class="carousel-item active" style="height: 100vh;">
            <div style="position: absolute; inset: 0; background: rgba(0, 0, 0, 0.2); z-index: 2;"></div>
            <img src="{{ asset('assets/img/Gambar perpustakaan.JPEG') }}" style="width: 100%; height: 100%; object-fit: cover;">
        </div>
        <div class="carousel-item" style="height: 100vh;">
            <div style="position: absolute; inset: 0; background: rgba(0, 0, 0, 0.2); z-index: 2;"></div>
            <img src="{{ asset('assets/img/fto2.JPEG') }}" style="width: 100%; height: 100%; object-fit: cover;">
        </div>
        <div class="carousel-item" style="height: 100vh;">
            <div style="position: absolute; inset: 0; background: rgba(0, 0, 0, 0.2); z-index: 2;"></div>
            <img src="{{ asset('assets/img/fto4.JPEG') }}" style="width: 100%; height: 100%; object-fit: cover;">
        </div>
    </div>

    <div class="container" style="position: relative; z-index: 3; padding-top: 60px;"> 
        <div style="max-width: 900px; margin: 0 auto;" data-aos="zoom-in">
            <h1 style="color: white; font-size: 45px; font-weight: 800; line-height: 1.2; margin-bottom: 10px; text-shadow: 2px 2px 10px rgba(0,0,0,0.7);">
                Selamat Datang di <br>
                <span style="color: #f1c40f;">Perpustakaan SMA Negeri 7 Sijunjung</span>
            </h1>
            
            <div style="width: 60px; height: 3px; background: #ffffff; margin: 25px auto; border-radius: 5px; box-shadow: 0px 0px 10px rgba(0,0,0,0.5);"></div>
            
            <h3 style="color: rgba(255,255,255,1); font-size: 18px; font-weight: 400; max-width: 700px; margin: 0 auto; line-height: 1.7; text-shadow: 1px 1px 8px rgba(0,0,0,0.8);">
                Wujudkan Gerakan Literasi Sekolah & Jelajahi Ilmu Pengetahuan <br> Tanpa Batas Melalui Koleksi Digital Kami.
            </h3>
        </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#hero-slider" data-bs-slide="prev" style="z-index: 10; width: 100px; background: none; border: none;">
        <span class="modern-nav-circle">
            <span style="font-family: sans-serif; font-size: 40px; font-weight: 100; line-height: 1; margin-right: 4px;">&#10094;</span>
        </span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#hero-slider" data-bs-slide="next" style="z-index: 10; width: 100px; background: none; border: none;">
        <span class="modern-nav-circle">
            <span style="font-family: sans-serif; font-size: 40px; font-weight: 100; line-height: 1; margin-left: 4px;">&#10095;</span>
        </span>
    </button>

</section>

<style>
    /* CSS Bulatan Panah */
    .modern-nav-circle {
        width: 65px;
        height: 65px;
        background: rgba(255, 255, 255, 0.1); /* Lebih transparan agar jernih */
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        border: 1px solid rgba(255, 255, 255, 0.3);
        transition: all 0.4s ease;
    }

    .carousel-control-prev:hover .modern-nav-circle,
    .carousel-control-next:hover .modern-nav-circle {
        background: rgba(241, 196, 15, 0.9); /* Kuning Emas khas */
        border-color: #f1c40f;
        color: #000;
        transform: scale(1.1);
        box-shadow: 0 0 15px rgba(241, 196, 15, 0.4);
    }

    /* Memastikan tombol tidak berbayang biru saat diklik */
    .carousel-control-prev:focus, .carousel-control-next:focus {
        outline: none;
        box-shadow: none;
    }
</style>

    <section class="promo-sosmed">
      <div class="container">
        <div class="row justify-content-center" data-aos="fade-up">
          <div class="col-md-8 mb-5">
            <h2 style="font-weight: 800; color: #333;">Ikuti Keseruan Kami!</h2>
            <p style="color: #777;">Dapatkan update terbaru mengenai koleksi buku dan kegiatan literasi melalui media sosial kami.</p>
          </div>
        </div>
        
        <div class="row g-4 justify-content-center">
          <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
            <a href="https://instagram.com/perpus_sman7sijunjung" target="_blank" class="sosmed-card">
              <i class="bi bi-instagram icon-box-ig"></i>
              <h4 style="margin-top: 20px; color: #333; font-weight: 700;">Instagram</h4>
              <p style="color: #888;">Lihat foto kegiatan dan katalog buku terbaru kami di feed Instagram.</p>
              <span style="color: #E1306C; font-weight: 600;">@perpus_sman7sijunjung</span>
            </a>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
            <a href="https://tiktok.com/@perpus_sman7sijunjung" target="_blank" class="sosmed-card">
              <i class="bi bi-tiktok icon-box-tt"></i>
              <h4 style="margin-top: 20px; color: #333; font-weight: 700;">TikTok</h4>
              <p style="color: #888;">Tonton video seru, review buku, dan tips literasi setiap harinya.</p>
              <span style="color: #000; font-weight: 600;">@perpus_sman7sijunjung</span>
            </a>
          </div>
        </div>
      </div>
    </section>

<section class="section container my-5">
    <div class="card shadow" style="border-radius: 15px; border: 1px solid #e3e6f0; background: #ffffff;">
        <div class="card-header py-3" style="background-color: #f8f9fc; border-bottom: 1px solid #e3e6f0; border-top-left-radius: 15px; border-top-right-radius: 15px;">
            <h6 class="m-0 font-weight-bold" style="color: #4e73df; font-family: 'Segoe UI', sans-serif; font-size: 16px;">
                <i class="bi bi-bar-chart-line-fill text-warning mr-2"></i> Grafik Statistik Kunjungan Perpustakaan per Bulan
            </h6>
        </div>
        <div class="card-body p-4">
            <div style="position: relative; height: 320px; width: 100%;">
                <canvas id="grafikPengunjung"></canvas>
            </div>
            <p class="text-muted small text-center mt-3 mb-0">
                * Grafik di atas menampilkan total data pengunjung (Siswa & Guru) yang tercatat pada tahun 2026.
            </p>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const ctx = document.getElementById('grafikPengunjung');
        if (ctx) {
            // Ambil data array asli dari web.php secara aman
            const dataKunjungan = @json($dataGrafik ?? array_fill(0, 12, 0));

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                    datasets: [{
                        label: 'Jumlah Kunjungan',
                        data: dataKunjungan,
                        backgroundColor: '#F1C40F', // Kuning emas solid khas tema web kamu
                        borderColor: '#D4AC0D',
                        borderWidth: 1,
                        borderRadius: 4 // Sudut melengkung tipis agar rapi, tidak kaku
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                            labels: {
                                boxWidth: 15,
                                font: { family: 'Segoe UI', size: 12 }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            min: 0,
                            suggestedMax: 5, // Biar kalau data masih 0, batas atasnya tidak mepet ke angka 1
                            ticks: {
                                stepSize: 1,
                                color: '#858796',
                                font: { family: 'Segoe UI' }
                            },
                            grid: {
                                color: '#eaecf4',
                                drawBorder: false
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: '#858796',
                                font: { family: 'Segoe UI', weight: 'bold' }
                            }
                        }
                    }
                }
            });
        }
    });
</script>

<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
<script>
    AOS.init();
</script>

</body>
</html>
</body>
</html>