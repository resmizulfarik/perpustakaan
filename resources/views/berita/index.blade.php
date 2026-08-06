<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Berita & Informasi - Perpustakaan SMA 7 Sijunjung</title>

  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

  <style>
    body { font-family: 'Poppins', sans-serif; background-color: #f4f7f6; color: #444; }
    
    .top-nav { background: #1b2f45; padding: 10px 0; color: white; border-bottom: 3px solid #f1c40f; }
    .logo-img { width: 50px; height: auto; margin-right: 15px; }
    .logo-text h2 { font-family: 'Montserrat', sans-serif; font-weight: 800; margin: 0; font-size: 20px; line-height: 1; }
    .logo-text p { margin: 5px 0 0 0; font-size: 11px; color: #f1c40f; text-transform: uppercase; font-weight: 600; }

    .berita-header {
      background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
      padding: 80px 0 100px;
      text-align: center;
      color: white;
    }
    .berita-header h1 { font-family: 'Montserrat', sans-serif; font-weight: 800; font-size: 42px; text-transform: uppercase; }

    .news-card {
      background: white;
      border-radius: 15px;
      box-shadow: 0 5px 20px rgba(0,0,0,0.05);
      margin-bottom: 25px;
      display: flex;
      padding: 20px;
      transition: 0.3s;
      border: none;
      max-width: 900px;
    }
    .news-card:hover { transform: translateY(-5px); box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
    .news-image-wrapper { width: 260px; height: 170px; flex-shrink: 0; border-radius: 10px; overflow: hidden; margin-right: 25px; }
    .news-image-wrapper img { width: 100%; height: 100%; object-fit: cover; }
    
    /* Tombol Tambah Berita (Tetap di Kanan) */
    .btn-tambah {
      background: #f1c40f;
      color: #1b2f45;
      font-weight: 700;
      border-radius: 50px;
      padding: 10px 25px;
      text-decoration: none;
      transition: 0.3s;
    }
    .btn-tambah:hover { background: #d4ac0d; color: #1b2f45; }

    /* Tombol Lihat Lainnya (Lebih Kecil & Hover Kuning) */
    .btn-lihat-lainnya {
      background-color: #2b4eff;
      color: white;
      padding: 8px 35px; /* Ukuran dikecilkan */
      font-weight: 700;
      border-radius: 50px;
      text-decoration: none;
      display: inline-block;
      box-shadow: 0 4px 10px rgba(43, 78, 255, 0.2);
      transition: all 0.3s ease;
      font-size: 13px; /* Ukuran font dikecilkan */
      border: none;
    }
    /* Efek Hover Kuning */
    .btn-lihat-lainnya:hover { 
      background-color: #f1c40f; 
      color: #1b2f45; 
      transform: translateY(-2px);
      box-shadow: 0 6px 15px rgba(241, 196, 15, 0.4);
    }
  </style>
</head>
<body>

  <nav class="top-nav">
    <div class="container d-flex align-items-center">
       <img src="{{ asset('assets/img/logo_sekolah.png') }}" alt="Logo" class="logo-img">
       <div class="logo-text">
          <a href="{{ url('/') }}" class="text-white text-decoration-none">
            <h2>PERPUSTAKAAN</h2>
            <p>SMA NEGERI 7 SIJUNJUNG</p>
          </a>
       </div>
    </div>
  </nav>

  <section class="berita-header">
    <div class="container">
      <h1>Berita & Informasi</h1>
    </div>
  </section>

  <div class="container mt-5 mb-5">
    
    @auth
    <div class="text-end mb-4" style="max-width: 900px;">
        <a href="{{ route('berita.create') }}" class="btn-tambah shadow-sm">
            <i class="bi bi-plus-circle-fill me-1"></i> TAMBAH BERITA BARU
        </a>
    </div>
    @endauth

    <div class="row">
      <div class="col-lg-12">
        
        @foreach($allBerita as $item)
        <div class="news-card">
          <div class="news-image-wrapper">
            <img src="{{ $item->gambar ? asset('storage/' . $item->gambar) : asset('assets/img/perpus3.jpg') }}" alt="">
          </div>
          <div class="news-content w-100">
            <h4 class="fw-bold" style="color: #1b2f45;">{{ $item->judul }}</h4>
            <div class="news-meta mb-2">
              <span class="text-muted small"><i class="bi bi-calendar3"></i> {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</span>
            </div>
            <p class="text-muted small">{{ Str::limit(strip_tags($item->isi), 160) }}</p>
            
            <div class="d-flex justify-content-between align-items-center mt-3">
                <a href="{{ route('berita.show', $item->id) }}" class="btn btn-dark btn-sm rounded-pill px-4 shadow-sm">SELENGKAPNYA</a>
                @auth
                <div class="btn-group">
                  <a href="{{ route('berita.edit', $item->id) }}" class="btn btn-sm btn-outline-primary border-0 me-2"><i class="bi bi-pencil-square"></i> Edit</a>
                  <form action="{{ route('berita.destroy', $item->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger border-0" onclick="return confirm('Hapus?')"><i class="bi bi-trash"></i> Hapus</button>
                  </form>
                </div>
                @endauth
            </div>
          </div>
        </div>
        @endforeach

        <div class="mt-5" style="max-width: 900px; text-align: center;">
            <a href="#" class="btn-lihat-lainnya">LIHAT LAINNYA</a>
        </div>

      </div>
    </div>
  </div>

</body>
</html>