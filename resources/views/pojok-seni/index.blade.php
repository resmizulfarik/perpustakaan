<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pojok Seni - Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        :root { --aksen: #ffc107; --bg: #fdf2f5; }
        body { background-color: var(--bg); font-family: 'Segoe UI', sans-serif; }
        .navbar-custom { background: #000; border-bottom: 4px solid var(--aksen); padding: 10px 0; }
        .hero-section { background: #fff; padding: 20px 0; margin-bottom: 30px; }
        .card-seni { border: none; border-radius: 20px; background: #fff; padding: 25px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); position: relative; height: 100%; }
        .card-seni::before { content: ""; position: absolute; left: 0; top: 15%; height: 70%; width: 5px; background: var(--aksen); border-radius: 0 5px 5px 0; }
        .img-cover { width: 130px; height: 180px; object-fit: cover; border-radius: 10px; }
        .penulis-name { color: #d32f2f; font-weight: 700; font-size: 1.2rem; text-transform: uppercase; }
        .kelas-text { color: #666; font-weight: 600; font-size: 0.9rem; margin-bottom: 8px; text-transform: uppercase; }
        .sinopsis-text { font-size: 0.85rem; color: #666; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; margin-bottom: 15px; }
        .social-box { display: flex; gap: 10px; margin-bottom: 15px; }
        .social-box i { width: 35px; height: 35px; background: #6c757d; color: white; display: flex; align-items: center; justify-content: center; border-radius: 5px; font-size: 0.9rem; }
    </style>
</head>
<body>

    <nav class="navbar-custom">
        <div class="container d-flex justify-content-between align-items-center text-white">
            <span class="fw-bold">Pojok Seni</span>
            <div class="d-flex gap-4 align-items-center">
                <a href="{{ url('/') }}" class="text-white text-decoration-none small fw-bold">BERANDA</a>
                
                {{-- Tombol Tambah hanya muncul jika Login --}}
                @auth
                    <a href="{{ route('pojok-seni.create') }}" class="btn btn-warning btn-sm fw-bold rounded-pill px-3">+ Tambah Karya</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="hero-section">
        <div class="container d-flex justify-content-between align-items-end">
            <h1 class="m-0">Pojok Seni</h1>
            <p class="m-0 text-muted small">
                <a href="{{ url('/') }}" class="text-decoration-none text-muted">Beranda</a> / 
                <span class="text-danger">Pojok Seni</span>
            </p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @foreach($pojokSeni as $item)
            <div class="col-md-6 mb-4">
                <div class="card-seni d-flex gap-4">
                    <img src="{{ asset('images/covers/' . $item->cover) }}" class="img-cover shadow-sm">
                    
                    <div class="w-100">
                        <h5 class="penulis-name m-0">{{ $item->penulis }}</h5>
                        <p class="kelas-text">KELAS {{ $item->kelas }}</p>
                        
                        <hr class="my-2" style="border-top: 1px solid #eee;">

                        <div class="social-box">
                            <i class="fab fa-twitter"></i>
                            <i class="fab fa-facebook-f"></i>
                            <i class="fab fa-instagram"></i>
                            <i class="fab fa-linkedin-in"></i>
                        </div>

                        <p class="sinopsis-text">
                            {{ $item->sinopsis ?? 'Deskripsi belum tersedia.' }}
                        </p>

                        {{-- AREA ADMIN: Tombol Edit & Hapus hanya muncul jika Login --}}
                        @auth
                        <div class="row g-2 border-top pt-3 mt-auto">
                            <div class="col-6">
                                <a href="{{ route('pojok-seni.edit', $item->id) }}" class="btn btn-dark btn-sm w-100 fw-bold shadow-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                            </div>
                            <div class="col-6">
                                <form action="{{ route('pojok-seni.destroy', $item->id) }}" method="POST">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm w-100 fw-bold shadow-sm" onclick="return confirm('Yakin ingin menghapus karya ini?')">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endauth
                        
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>