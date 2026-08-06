<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koleksi Fiksi - Perpustakaan SMA N 7 Sijunjung</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', sans-serif; }
        .hero-fiksi {
            background: linear-gradient(45deg, #2c3e50, #4b6584);
            color: white;
            padding: 50px 0;
            border-bottom: 5px solid #f1c40f;
        }
        .card-book {
            border: none;
            border-radius: 15px;
            transition: 0.3s;
            overflow: hidden;
            background: white;
        }
        .card-book:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }
        .book-icon {
            background: #e9ecef;
            height: 250px; /* Sedikit dinaikkan agar proporsi cover gambar lebih pas */
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        .btn-read {
            background-color: #2ecc71; /* Diubah ke hijau agar lebih fresh untuk aksi gambar */
            color: white;
            border: none;
        }
        .btn-read:hover {
            background-color: #27ae60;
            color: white;
        }
        .navbar-dark { background-color: #1a252f; }
    </style>
</head>
<body>

    <nav class="navbar navbar-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">
                <i class="bi bi-house-door-fill"></i> SMAN 7 SIJUNJUNG
            </a>
        </div>
    </nav>

    <div class="hero-fiksi text-center mb-5">
        <div class="container">
            <i class="bi bi-book-half display-3 text-warning"></i>
            <h1 class="fw-bold mt-3 text-uppercase">Koleksi Buku Fiksi</h1>
            <p class="lead opacity-75">Perpustakaan Digital SMA Negeri 7 Sijunjung</p>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row mb-4 align-items-center">
            <div class="col">
                <h4 class="fw-bold m-0 text-secondary border-start border-4 border-primary ps-3">Daftar Buku Tersedia</h4>
            </div>
            
            @auth
            <div class="col-auto">
                <a href="{{ route('fiksi.create') }}" class="btn btn-success rounded-pill px-4 shadow-sm">
                    <i class="bi bi-plus-lg me-2"></i>Tambah Koleksi
                </a>
            </div>
            @endauth
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row g-4">
            @forelse($dataFiksi as $fiksi)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card h-100 card-book shadow-sm">
                    <div class="book-icon">
                        @if($fiksi->file_gambar)
                            <img src="{{ asset('uploads/fiksi/' . $fiksi->file_gambar) }}" class="w-100 h-100" style="object-fit: cover;" alt="{{ $fiksi->judul }}">
                        @else
                            <i class="bi bi-image display-1 opacity-25"></i>
                        @endif
                    </div>

                    <div class="card-body d-flex flex-column">
                        <h6 class="fw-bold text-dark mb-1 text-truncate" title="{{ $fiksi->judul }}">{{ $fiksi->judul }}</h6>
                        <p class="text-muted small mb-2">Penulis: {{ $fiksi->penulis }}</p>
                        
                        @if($fiksi->ringkasan)
                            <p class="text-secondary small text-truncate mb-3">{{ $fiksi->ringkasan }}</p>
                        @endif
                        
                        <div class="mt-auto">
                            <div class="d-grid gap-2">
                                @if($fiksi->file_gambar)
                                    <a href="{{ asset('uploads/fiksi/' . $fiksi->file_gambar) }}" target="_blank" class="btn btn-read btn-sm rounded-pill py-2">
                                        <i class="bi bi-eye-fill me-1"></i> Lihat Gambar / Cover
                                    </a>
                                @else
                                    <button class="btn btn-secondary btn-sm rounded-pill py-2" disabled>
                                        <i class="bi bi-image-alt me-1"></i> Tidak Ada Gambar
                                    </button>
                                @endif
                                
                                @auth
                                <div class="d-flex gap-2 mt-1">
                                    <a href="{{ route('fiksi.edit', $fiksi->id) }}" class="btn btn-outline-warning btn-sm flex-grow-1">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="{{ route('fiksi.destroy', $fiksi->id) }}" method="POST" class="flex-grow-1">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm w-100" onclick="return confirm('Hapus buku ini secara permanen?')">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <i class="bi bi-inbox text-muted display-4"></i>
                <p class="text-muted mt-2">Belum ada koleksi buku fiksi yang tersedia.</p>
            </div>
            @endforelse
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>