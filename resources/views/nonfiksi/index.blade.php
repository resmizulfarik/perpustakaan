<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku Non Fiksi - Perpustakaan SMA 7</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .navbar-custom { background-color: #1a1a1a; padding: 15px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .card-img-top { height: 350px; object-fit: cover; border-bottom: 1px solid #eee; }
        .book-card { transition: all 0.3s ease; border: none; border-radius: 10px; overflow: hidden; }
        .book-card:hover { transform: translateY(-10px); box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important; }
        .btn-success { background-color: #27ae60; border: none; }
        .btn-success:hover { background-color: #219150; }
    </style>
</head>
<body>

    <nav class="navbar-custom mb-5">
        <div class="container text-white d-flex justify-content-between align-items-center">
            <span class="fw-bold fs-5">PERPUSTAKAAN SMA NEGERI 7 SIJUNJUNG</span>
            <a href="/" class="btn btn-outline-light btn-sm">
                <i class="bi bi-house-door"></i> Kembali ke Beranda
            </a>
        </div>
    </nav>

    <div class="container">
        <div class="row mb-4 align-items-center">
            <div class="col">
                <h2 class="fw-bold m-0 text-dark">📚 Koleksi Buku Non Fiksi</h2>
                <p class="text-muted mb-0">Silakan pilih buku untuk dibaca secara daring.</p>
            </div>
            
            @auth
            <div class="col-auto">
                <a href="{{ route('nonfiksi.create') }}" class="btn btn-primary px-4 shadow-sm">
                    <i class="bi bi-plus-circle-fill"></i> Tambah Buku
                </a>
            </div>
            @endauth
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            @forelse($dataNonFiksi as $buku)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card book-card shadow-sm h-100">
                        <img src="{{ asset('uploads/nonfiksi/cover/'.$buku->cover) }}" class="card-img-top" alt="{{ $buku->judul }}">
                        
                        <div class="card-body d-flex flex-column">
                            <h6 class="fw-bold text-dark mb-2">{{ $buku->judul }}</h6>
                            <p class="small text-muted mb-3 flex-grow-1">
                                <i class="bi bi-person-fill text-secondary"></i> {{ $buku->penulis }}<br>
                                <i class="bi bi-building text-secondary"></i> {{ $buku->penerbit }} ({{ $buku->tahun_terbit }})
                            </p>
                            
                            <div class="d-grid gap-2">
                                <a href="{{ asset('uploads/nonfiksi/pdf/'.$buku->file_pdf) }}" target="_blank" class="btn btn-success btn-sm py-2">
                                    <i class="bi bi-file-earmark-pdf-fill"></i> Baca Sekarang
                                </a>

                                @auth
                                <div class="d-flex gap-2 mt-1">
                                    <a href="{{ route('nonfiksi.edit', $buku->id) }}" class="btn btn-warning btn-sm flex-fill fw-bold">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="{{ route('nonfiksi.destroy', $buku->id) }}" method="POST" class="flex-fill">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm w-100 fw-bold" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-journal-x text-muted" style="font-size: 4rem;"></i>
                    <p class="text-muted mt-3 fs-5">Belum ada koleksi buku non fiksi saat ini.</p>
                </div>
            @endforelse
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>