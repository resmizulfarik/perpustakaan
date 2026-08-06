<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Terbaru - Perpustakaan SMA 7 Sijunjung</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        :root {
            --perpustakaan-hitam: #000000;
            --perpustakaan-kuning: #ffc107;
            --perpustakaan-bg: #fdf2f5;
        }

        body { 
            background-color: var(--perpustakaan-bg); 
            font-family: 'Segoe UI', sans-serif;
        }

        /* Header Navbar */
        .navbar-custom {
            background-color: var(--perpustakaan-hitam);
            padding: 10px 0;
            border-bottom: 4px solid var(--perpustakaan-kuning);
        }

        .navbar-brand-text {
            color: white;
            font-weight: bold;
            font-size: 1.2rem;
            text-transform: uppercase;
        }

        .nav-link-custom {
            color: white;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
        }

        .btn-tambah-buku {
            background-color: var(--perpustakaan-kuning);
            color: black;
            font-weight: bold;
            font-size: 0.8rem;
            border-radius: 50px;
            padding: 6px 18px;
            border: none;
            text-decoration: none;
            transition: 0.3s;
        }

        /* Hero Section */
        .hero-section {
            background: #fff;
            padding: 20px 0;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .hero-title {
            font-size: 2.5rem;
            color: #444;
            margin: 0;
        }

        .breadcrumb-custom {
            font-size: 0.9rem;
            color: #888;
        }

        .breadcrumb-custom span { color: #d32f2f; }

        /* Card Style */
        .card-buku {
            border: none;
            border-radius: 20px;
            background: #fff;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            position: relative;
        }

        .card-buku::before {
            content: "";
            position: absolute;
            left: 0; top: 15%; height: 70%; width: 5px;
            background-color: var(--perpustakaan-kuning);
            border-radius: 0 5px 5px 0;
        }

        .card-buku .position-relative {
            flex-shrink: 0;
        }

        .img-cover { width: 130px; height: 180px; object-fit: cover; border-radius: 10px; }
        
        /* Modifikasi Teks & Shadow */
        .penulis-name { 
            color: #d32f2f; 
            font-weight: 700; 
            font-size: 1.2rem; 
            margin: 0; 
            text-shadow: 1px 1px 1px rgba(0,0,0,0.05);
        }
        
        .judul-buku { color: #555; font-size: 0.95rem; margin-bottom: 12px; }
        
        /* Badge Jumlah Buku Modern */
        .badge-jumlah {
            background-color: rgba(255, 193, 7, 0.15);
            color: #b48600;
            font-size: 0.8rem;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 30px;
            border: 1px solid rgba(255, 193, 7, 0.3);
            white-space: nowrap;
        }

        /* Social Icons Box */
        .social-box {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .social-box i {
            width: 38px;
            height: 38px;
            background: #212529;
            color: var(--perpustakaan-kuning);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            font-size: 18px;
        }

        /* Admin Action Buttons */
        .btn-edit-custom {
            background-color: #212529;
            color: white;
            border-radius: 8px;
            font-weight: 600;
            padding: 8px 0;
            width: 100%;
            border: none;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .btn-hapus-custom {
            background-color: transparent;
            color: #dc3545;
            border: 1px solid #dc3545;
            border-radius: 8px;
            font-weight: 600;
            padding: 8px 0;
            width: 100%;
        }
    </style>
</head>
<body>

    <nav class="navbar-custom">
        <div class="container d-flex justify-content-between align-items-center">
            <span class="navbar-brand-text">Buku Terbaru</span>
            <div class="d-flex align-items-center gap-4">
                 <a href="{{ url('/') }}" class="text-white text-decoration-none small fw-bold">BERANDA</a>
                @auth
                <a href="{{ route('buku-terbaru.create') }}" class="btn-tambah-buku">
                    <i class="bi bi-plus"></i> Tambah Buku
                </a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="hero-section">
        <div class="container d-flex justify-content-between align-items-end">
            <h1 class="hero-title">Buku Terbaru</h1>
            <p class="breadcrumb-custom">
                <a href="{{ url('/') }}" style="text-decoration: none; color: inherit;">Beranda</a> 
                / <span>Buku Terbaru</span>
            </p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @forelse($buku as $item)
            <div class="col-md-6 mb-4">
                <div class="card-buku d-flex align-items-start gap-4">
                    
                    <div class="position-relative">
                        <img src="{{ asset('images/covers/' . $item->cover) }}" class="img-cover shadow-sm">
                    </div>

                    <div class="info-text w-100">
                        <div class="d-flex justify-content-between align-items-start mb-1">
                            <h5 class="penulis-name">{{ $item->penulis }}</h5>
                            
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge-jumlah">
                                    <i class="bi bi-stack me-1"></i> {{ $item->jumlah ?? 0 }} Eks
                                </span>

                                @if(($item->jumlah ?? 0) == 0)
                                    <span class="badge bg-danger shadow-sm" style="font-size: 0.75rem; padding: 5px 10px; border-radius: 30px; white-space: nowrap;">
                                        <i class="bi bi-x-circle me-1"></i> Buku Habis
                                    </span>
                                @elseif(($item->jumlah ?? 0) == 1)
                                    <span class="badge bg-warning text-dark shadow-sm">
                                        <i class="bi bi-bookmark-dash me-1"></i> Sedang Dipinjam
                                    </span>     
                                @else
                                    <span class="badge bg-success shadow-sm" style="font-size: 0.75rem; padding: 5px 10px; border-radius: 30px; white-space: nowrap;">
                                        <i class="bi bi-check-circle me-1"></i> Tersedia
                                    </span>
                                @endif
                            </div>
                        </div>

                        <p class="judul-buku">{{ $item->judul }}</p>
                        
                        <div class="social-box">
                            <i class="fab fa-instagram"></i>
                            <i class="fas fa-desktop"></i>
                            <i class="fab fa-tiktok"></i>
                            <i class="fas fa-book-bookmark"></i>
                        </div>
                        
                        @auth
                        <div class="row g-2 pt-2 border-top">
                            <div class="col-6">
                                <a href="{{ route('buku-terbaru.edit', $item->id) }}" class="btn-edit-custom">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                            </div>
                            <div class="col-6">
                                <form action="{{ route('buku-terbaru.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus buku?')">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn-hapus-custom">
                                        <i class="bi bi-trash3"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endauth
                    </div>
                    
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted">Data buku terbaru belum tersedia.</p>
            </div>
            @endforelse
        </div>
    </div>

</body>
</html>