<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karya Guru - Perpustakaan SMA N 7 Sijunjung</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar-custom {
            background-color: #dc3545; 
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .navbar-brand { font-weight: 700; letter-spacing: 1px; }
        .nav-link { font-weight: 500; transition: 0.3s; margin-left: 15px; }
        .nav-link:hover, .nav-link.active { color: #ffeb3b !important; }
        .nav-link.active { border-bottom: 2px solid #ffeb3b; }

        .card-karya { 
            transition: transform 0.3s, box-shadow 0.3s; 
            border: none; 
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05); 
            overflow: hidden;
        }
        .card-karya:hover { 
            transform: translateY(-8px); 
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        /* Area Tampilan Gambar Cover */
        .karya-cover-wrapper {
            height: 260px;
            width: 100%;
            overflow: hidden;
            background-color: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .karya-cover-img {
            width: 100%;
            height: 100%;
            object-fit: contain; /* Agar seluruh gambar masuk dan TIDAK KEPOTONG */
            object-position: center;
            transition: transform 0.3s ease;
            padding: 10px; /* Beri sedikit ruang napas agar makin rapi */
        }
        
        .card-karya:hover .karya-cover-img {
            transform: scale(1.05);
        }
        
        .bg-tema { background-color: #dc3545; }
        footer { background-color: #212529; color: #ffffff; }
        .line-decoration {
            width: 80px; height: 4px; background: #dc3545; 
            margin: 15px auto; border-radius: 2px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <div class="container">
            <a class="navbar-brand text-uppercase" href="/">PERPUSTAKAAN SMAN 7</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white active" href="{{ url('/karya?kategori=guru') }}">Karya Guru</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/karya?kategori=siswa') }}">Karya Siswa</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5" style="margin-top: 100px; min-height: 80vh;">
        
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row mb-4">
            <div class="col-md-12 text-center">
                <h1 class="fw-bold text-uppercase">KARYA GURU</h1>
                <p class="text-muted fs-5">Daftar karya tulis dan publikasi tenaga pendidik SMA N 7 Sijunjung.</p>
                <div class="line-decoration"></div>
                
                @auth
                <div class="mt-4">
                    <a href="{{ route('karya.create') }}" class="btn btn-danger rounded-pill px-4 fw-bold shadow-sm">
                        <i class="bi bi-cloud-arrow-up-fill me-2"></i>Tambah Karya Baru
                    </a>
                </div>
                @endauth
            </div>
        </div>

        <div class="row">
            @forelse($dataKarya as $karya)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 card-karya d-flex flex-column justify-content-between">
                        
                        <div>
                            {{-- MENAMPILKAN GAMBAR COVER BUKU --}}
                            <div class="karya-cover-wrapper position-relative">
                                <span class="badge bg-tema px-3 py-2 rounded-pill position-absolute top-0 start-0 m-3 shadow-sm z-1">
                                    Pendidik
                                </span>

                                @if(!empty($karya->cover) && file_exists(public_path('uploads/karya/' . $karya->cover)))
                                    {{-- Mengambil dari public/uploads/karya --}}
                                    <img src="{{ asset('uploads/karya/' . $karya->cover) }}" class="karya-cover-img" alt="Cover {{ $karya->judul }}">
                                @elseif(!empty($karya->cover) && file_exists(public_path('storage/uploads/karya/' . $karya->cover)))
                                    {{-- Mengambil jika menggunakan storage:link --}}
                                    <img src="{{ asset('storage/uploads/karya/' . $karya->cover) }}" class="karya-cover-img" alt="Cover {{ $karya->judul }}">
                                @else
                                    {{-- Placeholder jika gambar belum diupload / tidak ditemukan --}}
                                    <div class="d-flex flex-column align-items-center justify-content-center text-muted h-100 w-100">
                                        <i class="bi bi-image display-4 mb-1 opacity-50"></i>
                                        <small class="fw-bold">Tidak Ada Cover</small>
                                    </div>
                                @endif
                            </div>

                            {{-- Judul dan Penulis --}}
                            <div class="p-4 pb-0">
                                <h5 class="fw-bold mb-2 text-dark">{{ $karya->judul }}</h5>
                                <p class="text-muted small mb-3">
                                    <i class="bi bi-person-fill text-danger me-1"></i> Oleh: <strong>{{ $karya->penulis }}</strong>
                                </p>
                            </div>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="p-4 pt-0">
                            @if($karya->file_pdf)
                                <a href="{{ asset('uploads/karya/' . $karya->file_pdf) }}" target="_blank" class="btn btn-outline-danger w-100 rounded-pill fw-bold mb-3 mt-2">
                                    <i class="bi bi-file-earmark-pdf-fill me-2"></i>Lihat Karya (PDF)
                                </a>
                            @else
                                <button class="btn btn-light text-muted w-100 rounded-pill btn-sm mb-3 mt-2" disabled>
                                    <i class="bi bi-file-earmark-x me-1"></i> Tanpa File PDF
                                </button>
                            @endif

                            <hr class="my-3">

                            @auth
                            <div class="d-flex justify-content-center align-items-center gap-3">
                                <a href="{{ route('karya.edit', $karya->id) }}" class="text-warning text-decoration-none small fw-bold">
                                    <i class="bi bi-pencil-square me-1"></i>Edit
                                </a>

                                <span class="text-muted">|</span>

                                <form action="{{ route('karya.destroy', $karya->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus karya ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link p-0 text-muted text-decoration-none small fw-bold">
                                        <i class="bi bi-trash me-1"></i>Hapus Karya
                                    </button>
                                </form>
                            </div>
                            @else
                            <div class="text-center">
                                <small class="text-muted fst-italic"><i class="bi bi-info-circle me-1"></i> Mode Lihat Saja</small>
                            </div>
                            @endauth
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <div class="card border-0 shadow-sm p-5 bg-white rounded-4">
                        <i class="bi bi-folder-x text-muted display-1 mb-3"></i>
                        <h4 class="text-muted">Belum ada data karya guru yang tersedia saat ini.</h4>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <footer class="py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0 fw-light">&copy; 2026 <strong>SMA N 7 Sijunjung</strong>. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>