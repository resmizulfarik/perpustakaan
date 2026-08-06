<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info - Perpustakaan SMA 7 Sijunjung</title>
    
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    
    <style>
        body { font-family: "Open Sans", sans-serif; color: #444; margin: 0; padding: 0; }

        /* NAVBAR - Sesuai style Sejarah/Struktur */
        .navbar-custom { background-color: #1b2f45; padding: 12px 0; }
        .navbar-brand-custom { display: flex; align-items: center; color: white; text-decoration: none; }
        .navbar-brand-custom img { width: 45px; margin-right: 15px; }
        .brand-text h4 { margin: 0; font-weight: 700; font-size: 1.1rem; color: white; }
        .brand-text p { margin: 0; font-size: 0.7rem; color: #f1c40f; text-transform: uppercase; font-weight: 600; }

        /* HERO SECTION - Persis Tampilan Sejarah */
        .header-bg {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url("{{ asset('assets/img/perpus3.jpg') }}");
            background-size: cover; 
            background-position: center;
            padding: 120px 0 80px; 
            color: white; 
            text-align: center;
        }
        .header-bg h1 { font-size: 48px; font-weight: 700; margin-bottom: 10px; }
        .header-bg .breadcrumb-custom { font-size: 18px; font-weight: 600; }
        .header-bg .breadcrumb-custom a { color: #f1c40f; text-decoration: none; }
        .header-bg .divider { 
            width: 60px; height: 3px; background: #f1c40f; margin: 20px auto; 
        }

        /* Jam Layanan */
        .service-hours { padding: 60px 0; background: #fff; }
        .service-hours h2 { font-size: 32px; font-weight: 700; color: #333; }
        .hours-list { list-style: none; padding: 0; }
        .hours-list li { font-size: 18px; margin-bottom: 15px; display: flex; align-items: center; }
        .hours-list li i { color: #e03a3c; font-size: 24px; margin-right: 15px; }

        /* Dokumentasi Gallery */
        .gallery { padding: 60px 0; background: #f9f9f9; }
        .gallery-item { 
            margin-bottom: 30px; overflow: hidden; border-radius: 12px; 
            box-shadow: 0 5px 15px rgba(0,0,0,0.1); background: #fff; position: relative; 
        }
        .gallery-item img { width: 100%; height: 250px; object-fit: cover; transition: 0.3s; }
        .gallery-item:hover img { transform: scale(1.1); filter: brightness(60%); }
        
        .label-dokumentasi { 
            background-color: #e03a3c; color: white; padding: 10px 30px; 
            border-radius: 5px; font-weight: bold; display: inline-block; 
            text-transform: uppercase; margin-bottom: 40px; 
        }

        .gallery-controls {
            position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);
            display: flex; gap: 10px; opacity: 0; transition: 0.3s; z-index: 10;
        }
        .gallery-item:hover .gallery-controls { opacity: 1; }

        /* Footer */
        .footer-dark { background: #4e5964; color: #fff; padding: 60px 0 30px; }
        .btn-subscribe { background: #e03a3c; color: #fff; border-radius: 0 4px 4px 0; border: none; padding: 10px 20px; }
        .social-links a { background: rgba(255,255,255,0.1); color: #fff; width: 38px; height: 38px; display: inline-flex; align-items: center; justify-content: center; border-radius: 4px; margin-right: 5px; text-decoration: none; }
    </style>
</head>

<body>

    {{-- NAVBAR --}}
    <nav class="navbar-custom">
        <div class="container">
            <a class="navbar-brand-custom" href="/">
                <img src="{{ asset('assets/img/logo_sekolah.png') }}" alt="Logo">
                <div class="brand-text">
                    <h4>PERPUSTAKAAN</h4>
                    <p>SMA NEGERI 7 SIJUNJUNG</p>
                </div>
            </a>
        </div>
    </nav>

    {{-- HERO SECTION (SEPERTI SEJARAH) --}}
    <div class="header-bg">
        <div class="container" data-aos="fade-up">
            <h1>Selamat Datang</h1>
            <div class="breadcrumb-custom">
                <a href="/">Home</a> / Info
            </div>
            <div class="divider"></div>
            <p>Satu Buku, Sejuta Pengetahuan.</p>
        </div>
    </div>

    <section class="service-hours">
        <div class="container border-bottom pb-5 text-center">
            @auth
            <div class="mb-4">
                <a href="{{ route('info.edit', $info->id ?? 1) }}" class="btn btn-warning btn-sm shadow-sm">
                    <i class="bi bi-pencil-square"></i> Edit Jam & Alamat
                </a>
            </div>
            @endauth

            <div class="row align-items-center text-start">
                <div class="col-lg-6" data-aos="fade-right">
                    <h2>JAM LAYANAN PERPUSTAKAAN</h2>
                    <h3 class="text-secondary">SMA NEGERI 7 SIJUNJUNG</h3>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <p class="mb-4 text-muted">Kepada seluruh pengguna layanan Perpustakaan SMA Negeri 7 Sijunjung, harap memperhatikan jam layanan berikut!</p>
                    <ul class="hours-list">
                        <li><i class="bi bi-clock-fill"></i> Senin - Kamis : 07 : 30 - 15 : 00 WIB</li>
                        <li><i class="bi bi-clock-fill"></i> Jum'at : 07 : 30 - 12 : 00 WIB</li>
                        <li><i class="bi bi-calendar-x-fill"></i> Sabtu dan Tanggal Merah : TUTUP</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="gallery text-center">
        <div class="container">
            <div class="label-dokumentasi" data-aos="fade-up">DOKUMENTASI</div>
            
            @auth
            <div class="mb-4 text-end" data-aos="fade-up">
                <a href="{{ route('dokumentasi.create') }}" class="btn btn-danger shadow">
                    <i class="bi bi-plus-circle me-1"></i> Tambah Foto
                </a>
            </div>
            @endauth

            <div class="row" data-aos="fade-up">
                @forelse($dokumentasis as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item">
                        <a href="{{ asset('storage/' . $item->foto) }}" class="glightbox">
                            <img src="{{ asset('storage/' . $item->foto) }}" class="img-fluid">
                        </a>
                        
                        @auth
                        <div class="gallery-controls">
                            <a href="{{ route('dokumentasi.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('dokumentasi.destroy', $item->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus foto ini?')">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                        @endauth
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="alert alert-light border shadow-sm">Belum ada dokumentasi.</div>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <footer class="footer-dark">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="fw-bold">PUSTAKA<br>SMA NEGERI 7 SIJUNJUNG</h3>
                    <p>{{ $info->alamat ?? 'Kecamatan Koto VII, Kabupaten Sijunjung' }}<br>Sumatera Barat</p>
                    <p><strong>Email:</strong> {{ $info->email ?? 'pustakasman7sij@gmail.com' }}</p>
                    <div class="social-links mt-4">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 mt-4 mt-lg-0">
                    <h5 class="fw-bold mb-3">Berlangganan!</h5>
                    <p class="small">Dapatkan informasi terbaru dari kami langsung di email Anda.</p>
                    <form action="#" method="post" class="d-flex mt-3">
                        <input type="email" class="form-control rounded-0" placeholder="Masukkan Email Anda">
                        <button type="submit" class="btn btn-subscribe rounded-0">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script>
        AOS.init();
        const glightbox = GLightbox({ selector: '.glightbox' });
    </script>
</body>
</html>