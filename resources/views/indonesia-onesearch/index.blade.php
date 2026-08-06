<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indonesia OneSearch - Jaringan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root { --warna-emas: #ffc107; --warna-hitam: #000000; --bg-halaman: #fdf2f5; }
        body { background-color: var(--bg-halaman); font-family: 'Segoe UI', sans-serif; }
        .navbar-custom { background: var(--warna-hitam); padding: 15px 0; border-bottom: 4px solid var(--warna-emas); }
        .card-ios { border: none; border-radius: 12px; background: #fff; padding: 25px; border-left: 5px solid var(--warna-emas); box-shadow: 0 4px 10px rgba(0,0,0,0.05); height: 100%; transition: 0.3s; }
        .card-ios:hover { transform: translateY(-5px); box-shadow: 0 8px 20px rgba(0,0,0,0.1); }
        .btn-kunjungi { background: var(--warna-hitam); color: var(--warna-emas); border-radius: 8px; font-weight: bold; text-decoration: none; padding: 10px 25px; display: inline-block; transition: 0.3s; }
        .btn-kunjungi:hover { background: #333; color: #fff; }
    </style>
</head>
<body>

    <nav class="navbar-custom">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="text-white fw-bold fs-4"><i class="fas fa-search me-2"></i>INDONESIA ONESEARCH</div>
            <div>
                <a href="{{ url('/') }}" class="text-white text-decoration-none fw-bold me-3 small">BERANDA</a>
                @auth
                <a href="{{ route('indonesia-onesearch.create') }}" class="btn btn-warning btn-sm fw-bold">+ TAMBAH</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="text-center mb-5">
            <h1 class="fw-bold">Pencarian Koleksi Nasional</h1>
            <p class="text-muted">Satu pintu pencarian untuk seluruh koleksi perpustakaan di Indonesia</p>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card-ios">
                    <h5 class="fw-bold mb-2">Portal Indonesia OneSearch (IOS)</h5>
                    <p class="small text-muted mb-4">Satu pintu pencarian untuk semua koleksi publik dari perpustakaan, museum, dan arsip di seluruh Indonesia.</p>
                    <a href="https://onesearch.id/" target="_blank" class="btn-kunjungi">Buka OneSearch</a>
                </div>
            </div>

            @foreach($onesearch as $item)
            <div class="col-md-6 mb-4">
                <div class="card-ios">
                    <h5 class="fw-bold mb-2">{{ $item->nama_layanan }}</h5>
                    <p class="small text-muted mb-4">{{ $item->deskripsi }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ $item->url_link }}" target="_blank" class="btn-kunjungi">Kunjungi Situs</a>
                        @auth
                        <div class="d-flex gap-2">
                            <a href="{{ route('indonesia-onesearch.edit', $item->id) }}" class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('indonesia-onesearch.destroy', $item->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus?')"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                        @endauth
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</body>
</html>