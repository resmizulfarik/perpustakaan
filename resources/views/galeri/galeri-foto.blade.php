<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Foto - Perpustakaan SMA Negeri 7 Sijunjung</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body { background-color: #f8f9fa; font-family: 'Poppins', sans-serif; overflow-x: hidden; }
        
        /* Navbar Header */
        .navbar-custom { background-color: #1b2f45; padding: 12px 0; }
        .navbar-brand-custom { display: flex; align-items: center; color: white; text-decoration: none; }
        .navbar-brand-custom img { width: 45px; margin-right: 15px; }
        .brand-text h4 { margin: 0; font-weight: 700; font-size: 1.1rem; color: white; }
        .brand-text p { margin: 0; font-size: 0.7rem; color: #f1c40f; text-transform: uppercase; font-weight: 600; }

        /* Header Banner - Disesuaikan agar seragam dengan Sejarah/Info */
        .header-bg {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url("{{ asset('assets/img/perpus3.jpg') }}");
            background-size: cover; background-position: center;
            padding: 100px 0 60px; color: white; 
            text-align: center; 
        }
        .header-bg .divider { 
            width: 60px; height: 3px; background: #f1c40f; margin: 15px auto; 
        }
        .breadcrumb-custom { color: #f1c40f; font-size: 18px; font-weight: 600; }
        .breadcrumb-custom a { color: #f1c40f; text-decoration: none; }
        .breadcrumb-custom span { color: white; }

        /* Card Styling */
        .card-gallery { 
            border: none; border-radius: 15px; 
            overflow: hidden; transition: all 0.3s ease; 
            background: #fff; width: 100%; max-width: 380px; margin: 0 auto; 
        }
        .card-gallery:hover { transform: translateY(-10px); box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important; }
        .card-img-top { height: 230px; object-fit: cover; cursor: pointer; transition: 0.3s; }
        .card-img-top:hover { opacity: 0.9; }
        
        /* Buttons */
        .btn-tambah {
            background-color: #e03a3c; color: white; border-radius: 8px;
            padding: 10px 20px; font-weight: 600; text-decoration: none;
            transition: 0.3s; display: inline-block; border: none;
        }
        .btn-tambah:hover { background-color: #c03133; color: white; transform: scale(1.05); }

        .btn-detail-galeri {
            background-color: #1b2f45; color: white; border: none; border-radius: 8px;
            padding: 10px; font-weight: 600; width: 100%;
            transition: 0.3s; text-decoration: none; display: inline-block; text-align: center;
        }
        .btn-detail-galeri:hover { background-color: #142435; color: white; }

        /* Custom Pagination */
        .pagination { gap: 5px; }
        .page-item .page-link {
            border-radius: 8px !important; color: #1b2f45;
            border: 1px solid #dee2e6; padding: 10px 18px; font-weight: 600;
        }
        .page-item.active .page-link {
            background-color: #1b2f45; border-color: #1b2f45; color: white;
        }
    </style>
</head>
<body>

<nav class="navbar-custom shadow-sm">
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

<div class="header-bg">
    <div class="container">
        <h1 class="fw-bold display-4">Galeri Foto</h1>
        <div class="breadcrumb-custom">
            <a href="/">Home</a> 
            <span class="mx-2">/</span> 
            <span>Galeri</span>
        </div>
        <div class="divider"></div>
    </div>
</div>

<div class="container mt-5 mb-5">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- PROTEKSI ADMIN: Tombol Tambah Foto --}}
    @auth
    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('galeri-foto.create') }}" class="btn-tambah shadow-sm">
            <i class="fas fa-plus me-2"></i> Tambah Foto
        </a>
    </div>
    @endauth

    <div class="row justify-content-center g-4">
        @forelse ($galeri as $foto)
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <div class="card card-gallery shadow-sm h-100">
                    <a href="{{ route('galeri-foto.show', $foto->id) }}">
                        <img src="{{ asset('storage/'.$foto->foto) }}" class="card-img-top" alt="{{ $foto->judul }}">
                    </a>
                    
                    <div class="card-body d-flex flex-column p-4">
                        <a href="{{ route('galeri-foto.show', $foto->id) }}" class="text-decoration-none">
                            <h5 class="fw-bold text-dark mb-2">{{ $foto->judul }}</h5>
                        </a>
                        <p class="text-muted small mb-4">{{ Str::limit($foto->deskripsi, 60) }}</p>
                        
                        <div class="mb-3 mt-auto">
                            <a href="{{ route('galeri-foto.show', $foto->id) }}" class="btn-detail-galeri shadow-sm">
                                Detail Galeri
                            </a>
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center border-top pt-3">
                            <small class="text-secondary fw-semibold">
                                <i class="far fa-calendar-alt me-1 text-primary"></i>
                                {{ \Carbon\Carbon::parse($foto->tanggal)->translatedFormat('d M Y') }}
                            </small>
                            
                            {{-- PROTEKSI ADMIN: Tombol Edit & Hapus --}}
                            @auth
                            <div class="d-flex gap-2">
                                <a href="{{ route('galeri-foto.edit', $foto->id) }}" class="btn btn-sm btn-outline-warning rounded-pill px-3">
                                    Edit
                                </a>
                                <form action="{{ route('galeri-foto.destroy', $foto->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus foto ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 py-5 text-center">
                <h4 class="text-muted">Belum ada koleksi foto dalam galeri.</h4>
            </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-5">
        {{ $galeri->links('pagination::bootstrap-5') }}
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>