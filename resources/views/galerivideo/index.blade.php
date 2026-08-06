<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Video - Perpustakaan SMA Negeri 7 Sijunjung</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body { background-color: #f8f9fa; font-family: 'Poppins', sans-serif; overflow-x: hidden; }
        
        .navbar-custom { background-color: #1b2f45; padding: 12px 0; }
        .navbar-brand-custom { display: flex; align-items: center; color: white; text-decoration: none; }
        .navbar-brand-custom img { width: 45px; margin-right: 15px; }
        .brand-text h4 { margin: 0; font-weight: 700; font-size: 1.1rem; color: white; }
        .brand-text p { margin: 0; font-size: 0.7rem; color: #f1c40f; text-transform: uppercase; font-weight: 600; }

        .header-bg {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url("{{ asset('assets/img/perpus3.jpg') }}");
            background-size: cover; background-position: center;
            padding: 100px 0 60px; color: white; text-align: center; 
        }
        .header-bg .divider { width: 60px; height: 3px; background: #f1c40f; margin: 15px auto; }
        .breadcrumb-custom { color: #f1c40f; font-size: 18px; font-weight: 600; }
        .breadcrumb-custom a { color: #f1c40f; text-decoration: none; }
        .breadcrumb-custom span { color: white; }

        .card-gallery { 
            border: none; border-radius: 15px; 
            overflow: hidden; transition: all 0.3s ease; 
            background: #fff; width: 100%; max-width: 380px; margin: 0 auto; 
        }
        .card-gallery:hover { transform: translateY(-10px); box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important; }
        
        /* Card Styling - Dikecilkan ukurannya */
        .card-gallery { 
            border: none; 
            border-radius: 12px; 
            overflow: hidden; 
            transition: all 0.3s ease; 
            background: #fff; 
            width: 100%; 
            max-width: 320px; /* Diubah dari 380px ke 320px agar lebih mungil */
            margin: 0 auto; 
        }

        /* Video Player Styling - Ukuran lebih kecil dan konsisten */
        .video-wrapper {
            position: relative;
            width: 100%;
            background: #000;
            aspect-ratio: 16 / 9; /* Memastikan rasio video tetap rapi */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .video-wrapper video {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Gunakan cover agar video memenuhi kotak tanpa ruang hitam */
        }

                .card-body h5 {
            display: -webkit-box;
            -webkit-line-clamp: 2; /* Maksimal 2 baris untuk judul */
            -webkit-box-orient: vertical;
            overflow: hidden;
            font-size: 1rem; /* Ukuran font judul diperkecil sedikit */
        }

        .card-body p {
            display: -webkit-box;
            -webkit-line-clamp: 2; /* Maksimal 2 baris untuk deskripsi */
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Video Player Styling - Fix Hitam/0:00 */
        .video-wrapper {
            position: relative;
            width: 100%;
            background: #000;
            aspect-ratio: 16 / 9; /* Menjaga ukuran kotak video tetap konsisten */
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .video-wrapper video {
            width: 100%;
            height: 100%;
            object-fit: contain; /* Memastikan video tidak gepeng */
        }
        
        .btn-tambah {
            background-color: #e03a3c; color: white; border-radius: 8px;
            padding: 10px 20px; font-weight: 600; text-decoration: none;
            transition: 0.3s; display: inline-block; border: none;
        }
        .btn-tambah:hover { background-color: #c03133; color: white; transform: scale(1.05); }

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
        <a class="navbar-brand-custom" href="{{ url('/') }}">
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
        <h1 class="fw-bold display-4">Galeri Video</h1>
        <div class="breadcrumb-custom">
            <a href="{{ url('/') }}">Home</a> 
            <span class="mx-2">/</span> 
            <span>Video</span>
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

    @auth
    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('galeri-video.create') }}" class="btn-tambah shadow-sm">
            <i class="fas fa-plus me-2"></i> Tambah Video Baru
        </a>
    </div>
    @endauth

    <div class="row justify-content-center g-4">
        @forelse ($videos as $video)
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
        <div class="card card-gallery shadow-sm h-100">
            <div class="video-wrapper">
                <video controls preload="metadata" playsinline>
                    {{-- PERBAIKAN DI SINI: Sesuaikan dengan storeAs('public/videos', ...) --}}
                    <source src="{{ asset('storage/videos/' . $video->video) }}" type="video/mp4">
                    Browser Anda tidak mendukung pemutaran video.
                </video>
            </div>
            
            <div class="card-body d-flex flex-column p-4">
                <h5 class="fw-bold text-dark mb-2">{{ $video->judul }}</h5>
                <p class="text-muted small mb-4">{{ $video->deskripsi ?? 'Tidak ada deskripsi.' }}</p>
                
                <div class="d-flex justify-content-between align-items-center border-top pt-3 mt-auto">
                    <small class="text-secondary fw-semibold">
                        <i class="far fa-calendar-alt me-1 text-primary"></i>
                        {{ $video->created_at->format('d M Y') }}
                    </small>
                    
                    @auth
                    <div class="d-flex gap-2">
                        <a href="{{ route('galeri-video.edit', $video->id) }}" class="btn btn-sm btn-outline-warning rounded-pill px-3">
                            Edit
                        </a>
                        <form action="{{ route('galeri-video.destroy', $video->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus video ini?')">
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
    {{-- Bagian empty tetap sama --}}
@endforelse
    </div>

    <div class="d-flex justify-content-center mt-5">
        {{ $videos->links('pagination::bootstrap-5') }}
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>