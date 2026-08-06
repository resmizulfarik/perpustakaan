<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jaringan Perpusnas - Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root { --warna-emas: #ffc107; --warna-hitam: #000000; --bg-halaman: #fdf2f5; }
        body { background-color: var(--bg-halaman); font-family: 'Segoe UI', sans-serif; }
        .navbar-custom { background: var(--warna-hitam); padding: 15px 0; border-bottom: 4px solid var(--warna-emas); }
        .card-jaringan { border: none; border-radius: 12px; background: #fff; padding: 25px; border-left: 5px solid var(--warna-emas); box-shadow: 0 4px 10px rgba(0,0,0,0.05); transition: 0.3s; height: 100%; }
        .card-jaringan:hover { transform: translateY(-5px); box-shadow: 0 8px 20px rgba(0,0,0,0.1); }
        .btn-kunjungi { background: var(--warna-hitam); color: var(--warna-emas); border-radius: 8px; font-weight: bold; text-decoration: none; padding: 10px 25px; display: inline-block; transition: 0.3s; }
        .btn-kunjungi:hover { background: #333; color: #fff; }
        .nama-layanan { color: #d32f2f; font-weight: bold; text-transform: uppercase; }
    </style>
</head>
<body>

    <nav class="navbar-custom">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="text-white fw-bold fs-4"><i class="fas fa-university me-2"></i>JARINGAN PERPUSNAS</div>
            <a href="{{ url('/') }}" class="text-white text-decoration-none fw-bold small">BERANDA</a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="text-center mb-5">
            <h1 class="fw-bold" style="color: #212529;">Layanan Perpustakaan Digital</h1>
            <p class="text-muted">Akses koleksi resmi Perpustakaan Nasional Republik Indonesia</p>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card-jaringan d-flex align-items-start">
                    <div class="flex-grow-1">
                        <h5 class="nama-layanan mb-2">Perpusnas RI (Website Utama)</h5>
                        <p class="small text-muted mb-4">Portal resmi informasi, profil, dan berita terkini mengenai Perpustakaan Nasional Republik Indonesia.</p>
                        <a href="https://www.perpusnas.go.id" target="_blank" class="btn-kunjungi">Kunjungi Situs</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card-jaringan d-flex align-items-start">
                    <div class="flex-grow-1">
                        <h5 class="nama-layanan mb-2">IPUSNAS</h5>
                        <p class="small text-muted mb-4">Aplikasi perpustakaan digital berbasis media sosial untuk meminjam dan membaca buku secara gratis.</p>
                        <a href="https://ipusnas.id/" target="_blank" class="btn-kunjungi">Kunjungi Situs</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card-jaringan d-flex align-items-start">
                    <div class="flex-grow-1">
                        <h5 class="nama-layanan mb-2">E-Resources</h5>
                        <p class="small text-muted mb-4">Layanan koleksi digital seperti jurnal, e-book, dan karya referensi online lainnya bagi anggota.</p>
                        <a href="https://e-resources.perpusnas.go.id/" target="_blank" class="btn-kunjungi">Kunjungi Situs</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card-jaringan d-flex align-items-start">
                    <div class="flex-grow-1">
                        <h5 class="nama-layanan mb-2">KHASTARA</h5>
                        <p class="small text-muted mb-4">Koleksi naskah kuno, peta, foto, dan dokumen sejarah bangsa yang telah didigitalisasi.</p>
                        <a href="https://khastara.perpusnas.go.id/" target="_blank" class="btn-kunjungi">Kunjungi Situs</a>
                    </div>
                </div>
            </div>
            
            {{-- Data dari Database (Jika Admin Menambahkan Layanan Baru) --}}
            @foreach($perpusnas as $item)
            <div class="col-md-6 mb-4">
                <div class="card-jaringan d-flex align-items-start">
                    <div class="flex-grow-1">
                        <h5 class="nama-layanan mb-2">{{ $item->nama_layanan }}</h5>
                        <p class="small text-muted mb-4">{{ $item->deskripsi }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ $item->url_link }}" target="_blank" class="btn-kunjungi">Kunjungi Situs</a>
                            @auth
                            <form action="{{ route('perpusnas.destroy', $item->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus?')">Hapus</button>
                            </form>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</body>
</html>