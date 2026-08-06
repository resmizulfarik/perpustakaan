<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pojok Literasi - Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        /* TEMA UTAMA: HITAM & KUNING EMAS */
        :root { 
            --warna-emas: #ffc107; 
            --warna-hitam: #000000; 
            --bg-halaman: #fdf2f5; 
        }

        body { 
            background-color: var(--bg-halaman); 
            font-family: 'Segoe UI', sans-serif; 
            margin: 0;
            padding: 0;
        }

        /* Navbar Hitam dengan Garis Bawah Emas */
        .navbar-custom { 
            background: var(--warna-hitam); 
            padding: 15px 0; 
            border-bottom: 4px solid var(--warna-emas); 
        }

        .btn-tambah-emas { 
            background-color: var(--warna-emas) !important; 
            color: #000 !important; 
            font-weight: bold; 
            border-radius: 20px; 
            padding: 5px 15px;  
            font-size: 0.75rem; 
            border: none;
            text-decoration: none;
            display: inline-block;
            transition: 0.3s;
        }
        .btn-tambah-emas:hover { transform: scale(1.05); background-color: #e0a800 !important; }

        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: flex-start; 
            margin-top: 25px; 
            margin-bottom: 35px;
        }

        .judul-halaman {
            font-size: 2.2rem !important; 
            font-weight: 800;
            color: #212529;
            line-height: 1;
            margin: 0;
        }

        .sub-judul {
            font-size: 0.85rem;
            color: #6c757d;
            margin-top: 5px;
        }

        .breadcrumb-box {
            font-size: 0.85rem;
            margin-top: 5px;
        }

        .text-merah-aktif { 
            color: #d32f2f; 
            font-weight: bold; 
        }

        .card-literasi { 
            border: none; 
            border-radius: 15px; 
            background: #fff; 
            padding: 25px; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.05); 
            position: relative;
            border-left: 6px solid var(--warna-emas); 
            display: flex;
            gap: 20px;
            margin-bottom: 25px;
        }

        .nama-penulis { 
            color: #d32f2f; 
            font-weight: bold; 
            text-transform: uppercase; 
            font-size: 1.1rem; 
        }

        .social-icons .icon-box {
            background: #6c757d;
            color: white;
            width: 32px;
            height: 32px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
            margin-right: 5px;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .btn-edit-hitam { 
            background: #212529; 
            color: white; 
            border-radius: 8px; 
            padding: 8px 45px; 
            font-weight: bold; 
            border: none; 
            text-decoration: none; 
            font-size: 0.9rem;
        }
        .btn-hapus-outline { 
            background: transparent; 
            color: #dc3545; 
            border: 1px solid #dc3545; 
            border-radius: 8px; 
            padding: 8px 45px; 
            font-weight: bold; 
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

    <nav class="navbar-custom">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="text-white fw-bold fs-4">
                <i class="fas fa-book-open me-2"></i>Pojok Literasi
            </div>
            <div class="d-flex align-items-center gap-4">
                <a href="{{ url('/') }}" class="text-white text-decoration-none fw-bold small">BERANDA</a>
                
                {{-- PERBAIKAN: Tombol Tambah hanya muncul jika ADMIN Login --}}
                @auth
                <a href="{{ route('pojok-literasi.create') }}" class="btn-tambah-emas">
                    + Tambah Literasi
                </a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="header-section">
            <div>
                <h1 class="judul-halaman">Pojok Literasi</h1>
                <p class="sub-judul">Kumpulan puisi, cerpen, dan artikel kreatif</p>
            </div>
            <div class="breadcrumb-box text-muted">
                Beranda / <span class="text-merah-aktif">Pojok Literasi</span>
            </div>
        </div>

        <div class="row">
            @forelse($literasi as $item)
            <div class="col-lg-6">
                <div class="card-literasi">
                    <img src="{{ asset('images/literasi/' . $item->cover) }}" 
                         style="width:130px; height:170px; object-fit:cover; border-radius:10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                    
                    <div class="flex-grow-1">
                        <h5 class="nama-penulis mb-0">{{ $item->penulis }}</h5>
                        <div class="small text-secondary mb-3 fw-bold">KELAS {{ $item->kelas }}</div>
                        
                        <div class="social-icons mb-3">
                            <a href="#" class="icon-box"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="icon-box"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="icon-box"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="icon-box"><i class="fab fa-linkedin-in"></i></a>
                        </div>

                        <p class="small text-muted mb-4 border-top pt-2">
                            <strong>{{ $item->judul }}</strong><br>
                            {{ Str::limit($item->isi, 45) }}
                        </p>

                        {{-- PERBAIKAN: Edit & Hapus hanya muncul jika ADMIN Login --}}
                        @auth
                        <div class="d-flex gap-2">
                            <a href="{{ route('pojok-literasi.edit', $item->id) }}" class="btn-edit-hitam text-center">Edit</a>
                            <form action="{{ route('pojok-literasi.destroy', $item->id) }}" method="POST" class="w-100">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-hapus-outline w-100" onclick="return confirm('Hapus karya ini?')">Hapus</button>
                            </form>
                        </div>
                        @endauth
                        
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <div class="p-5 border border-2 border-dashed rounded-4">
                    <i class="fas fa-book-open fa-3x text-muted mb-3"></i>
                    <p class="text-muted fs-5">Belum ada karya literasi yang diunggah.</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>

</body>
</html>