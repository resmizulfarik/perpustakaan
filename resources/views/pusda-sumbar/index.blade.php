<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pusda Sumbar - Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root { --warna-emas: #ffc107; --warna-hitam: #000000; --bg-halaman: #fdf2f5; }
        body { background-color: var(--bg-halaman); font-family: 'Segoe UI', sans-serif; }
        .navbar-custom { background: var(--warna-hitam); padding: 15px 0; border-bottom: 4px solid var(--warna-emas); }
        .card-pusda { border: none; border-radius: 12px; background: #fff; padding: 25px; border-left: 5px solid #d32f2f; box-shadow: 0 4px 10px rgba(0,0,0,0.05); height: 100%; transition: 0.3s; }
        .card-pusda:hover { transform: translateY(-5px); }
        .btn-kunjungi { background: var(--warna-hitam); color: var(--warna-emas); border-radius: 8px; font-weight: bold; text-decoration: none; padding: 10px 25px; display: inline-block; transition: 0.3s; }
        .btn-kunjungi:hover { background: #333; color: #fff; }
        .nama-layanan { color: #d32f2f; font-weight: bold; text-transform: uppercase; }
    </style>
</head>
<body>

    <nav class="navbar-custom">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="text-white fw-bold fs-4"><i class="fas fa-map-marked-alt me-2"></i>PUSDA SUMBAR</div>
            <div>
                <a href="{{ url('/') }}" class="text-white text-decoration-none fw-bold me-3 small">BERANDA</a>
                @auth
                <a href="{{ route('pusda-sumbar.create') }}" class="btn btn-warning btn-sm fw-bold">+ TAMBAH</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="text-center mb-5">
            <h1 class="fw-bold">Layanan Perpustakaan Daerah Sumbar</h1>
            <p class="text-muted">Akses layanan literasi digital Provinsi Sumatera Barat</p>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card-pusda">
                    <h5 class="nama-layanan mb-2">Dinas Kearsipan & Perpustakaan Sumbar</h5>
                    <p class="small text-muted mb-4">Website resmi penyedia informasi layanan perpustakaan dan kearsipan di wilayah Sumatera Barat.</p>
                   <a href="https://dapus.sumbarprov.go.id" target="_blank" class="btn-kunjungi">Kunjungi Situs</a>
                </div>
            </div>

            @foreach($pusda as $item)
            <div class="col-md-6 mb-4">
                <div class="card-pusda">
                    <h5 class="nama-layanan mb-2">{{ $item->nama_layanan }}</h5>
                    <p class="small text-muted mb-4">{{ $item->deskripsi }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ $item->url_link }}" target="_blank" class="btn-kunjungi">Kunjungi Situs</a>
                        @auth
                        <form action="{{ route('pusda-sumbar.destroy', $item->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus layanan ini?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                        @endauth
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>