<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Book Penunjang - SMA Negeri 7 Sijunjung</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        /* Hero Section dengan Background Perpustakaan Gelap */
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.85), rgba(0, 0, 0, 0.95)), 
                        url('https://images.unsplash.com/photo-1507842217343-583bb7270b66?auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            padding: 30px 0 80px 0;
            border-radius: 0 0 40px 40px;
            margin-bottom: 40px;
            color: white;
            border-bottom: 5px solid #ffc107;
        }

        /* Branding Kiri Atas sesuai Beranda */
        .brand-wrapper {
            display: flex;
            align-items: center;
            margin-bottom: 50px;
        }

        .brand-logo {
            width: 45px;
            height: auto;
            margin-right: 12px;
        }

        .brand-text h5 {
            font-weight: 800;
            margin-bottom: 0;
            letter-spacing: 1px;
            font-size: 18px;
            color: #fff;
        }

        .brand-text p {
            color: #ffc107;
            font-weight: 700;
            font-size: 11px;
            margin-bottom: 0;
            letter-spacing: 1px;
        }

        .text-gold { color: #ffc107 !important; }

        .bg-gold-line {
            height: 3px;
            width: 60px;
            background-color: #ffc107;
            margin: 15px auto;
        }

        /* Card Book Styling */
        .card-book {
            border: none;
            border-radius: 20px;
            transition: all 0.3s ease;
            background: white;
            border-bottom: 3px solid transparent;
        }

        .card-book:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
            border-bottom: 3px solid #ffc107;
        }

        .icon-box {
            width: 45px;
            height: 45px;
            background: #fff9e6;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffc107;
            font-size: 22px;
            margin-bottom: 15px;
        }

        /* Tombol Tambah Koleksi (Gaya Admin) */
        .btn-add {
            background-color: #ffc107;
            color: #000;
            padding: 10px 25px;
            border-radius: 50px;
            font-weight: 700;
            border: none;
            transition: 0.3s;
        }

        .btn-add:hover {
            background-color: #e0a800;
            transform: scale(1.05);
            color: #000;
        }

        /* Tombol Baca PDF (Warna Hitam & Gold) */
        .btn-read {
            background-color: #000;
            color: #ffc107;
            border: 1px solid #ffc107;
            border-radius: 50px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-read:hover {
            background-color: #ffc107;
            color: #000;
        }

        .badge-category {
            background: #333;
            color: #ffc107;
            font-weight: 600;
            padding: 5px 12px;
            border-radius: 6px;
            font-size: 10px;
            letter-spacing: 1px;
        }
    </style>
</head>
<body>

<header class="hero-section">
    <div class="container">
        <div class="brand-wrapper">
            <img src="{{ asset('assets/img/logo_sekolah.png') }}" alt="Logo" class="brand-logo">
            <div class="brand-text text-uppercase">
                <h5>PERPUSTAKAAN</h5>
                <p>SMA NEGERI 7 SIJUNJUNG</p>
            </div>
        </div>

        <div class="text-center mt-2">
            <h1 class="fw-bold display-5 mb-0">E-BOOK <span class="text-gold">PENUNJANG</span></h1>
            <div class="bg-gold-line"></div>
            <p class="opacity-75 fs-6 mx-auto mb-4" style="max-width: 650px;">
                Temukan berbagai referensi buku penunjang untuk meningkatkan literasi dan pengetahuan di SMA Negeri 7 Sijunjung.
            </p>
            
            @auth
            <div class="mt-4">
                <a href="{{ route('penunjang.create') }}" class="btn btn-add shadow-sm">
                    <i class="bi bi-plus-circle me-2"></i>TAMBAH KOLEKSI
                </a>
            </div>
            @endauth
        </div>
    </div>
</header>

<div class="container mb-5">
    @if(session('success'))
        <div class="alert alert-dark border-0 shadow-sm rounded-3 mb-4 text-white" style="background: #333;">
            <i class="bi bi-check-circle-fill text-gold me-2"></i> {{ session('success') }}
        </div>
    @endif

    <div class="row g-4">
        @forelse($dataPenunjang as $item)
        <div class="col-md-4 col-lg-3">
            <div class="card card-book h-100 p-3 shadow-sm">
                <div class="card-body d-flex flex-column">
                    <div class="icon-box">
                        <i class="bi bi-bookmark-star-fill"></i>
                    </div>
                    
                    <div class="mb-2">
                        <span class="badge-category">PENUNJANG</span>
                    </div>
                    <h5 class="fw-bold mb-1 text-dark">{{ $item->judul }}</h5>
                    <p class="text-muted small mb-3">Penulis: {{ $item->penulis }}</p>
                    
                    <div class="mt-auto pt-3 d-grid gap-2">
                        <a href="{{ asset('uploads/penunjang/' . $item->file_pdf) }}" target="_blank" class="btn btn-read btn-sm py-2">
                            <i class="bi bi-file-earmark-pdf me-2"></i>BACA SEKARANG
                        </a>

                        @auth
                        <div class="d-flex gap-2">
                            <a href="{{ route('penunjang.edit', $item->id) }}" class="btn btn-outline-secondary btn-sm flex-grow-1 rounded-pill">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('penunjang.destroy', $item->id) }}" method="POST" class="flex-grow-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm w-100 rounded-pill" onclick="return confirm('Hapus data ini?')">
                                    <i class="bi bi-trash"></i>
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
            <div class="bg-white p-5 rounded-4 shadow-sm d-inline-block mx-auto border-top border-warning border-4">
                <i class="bi bi-journal-x text-muted display-4"></i>
                <p class="mt-3 fs-5 fw-bold text-dark">Belum Ada Koleksi</p>
                <p class="small text-muted">Silakan tambahkan koleksi buku penunjang pertama Anda.</p>
            </div>
        </div>
        @endforelse
    </div>

    <div class="mt-5 d-flex justify-content-center">
        {{ $dataPenunjang->links('pagination::bootstrap-5') }}
    </div>
</div>

<footer class="text-center py-4 text-muted border-top bg-white">
    <p class="mb-0 small fw-bold">PERPUSTAKAAN <span class="text-warning">SMA NEGERI 7 SIJUNJUNG</span> &copy; 2026</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>