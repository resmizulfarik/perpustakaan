<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Prestasi - Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        :root { --warna-emas: #ffc107; --warna-hitam: #000000; --bg-halaman: #fdf2f5; }
        body { background-color: var(--bg-halaman); font-family: 'Segoe UI', sans-serif; }
        .navbar-custom { background: var(--warna-hitam); padding: 15px 0; border-bottom: 4px solid var(--warna-emas); }
        .btn-tambah-emas { background-color: var(--warna-emas) !important; color: #000 !important; font-weight: bold; border-radius: 20px; padding: 5px 15px; font-size: 0.75rem; text-decoration: none; transition: 0.3s; }
        .judul-halaman { font-size: 2.2rem !important; font-weight: 800; color: #212529; margin: 0; }
        .card-prestasi { border: none; border-radius: 15px; background: #fff; padding: 25px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border-left: 6px solid var(--warna-emas); display: flex; gap: 20px; margin-bottom: 25px; }
        .nama-siswa { color: #d32f2f; font-weight: bold; text-transform: uppercase; font-size: 1.1rem; }
        .btn-edit-hitam { background: #212529; color: white; border-radius: 8px; padding: 8px 45px; font-weight: bold; text-decoration: none; font-size: 0.9rem; text-align: center; }
        .btn-hapus-outline { background: transparent; color: #dc3545; border: 1px solid #dc3545; border-radius: 8px; padding: 8px 45px; font-weight: bold; font-size: 0.9rem; }
    </style>
</head>
<body>

    <nav class="navbar-custom">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="text-white fw-bold fs-4"><i class="fas fa-trophy me-2"></i>Prestasi Siswa</div>
            <div class="d-flex align-items-center gap-4">
                <a href="{{ url('/') }}" class="text-white text-decoration-none fw-bold small">BERANDA</a>
                @auth
                <a href="{{ route('prestasi.create') }}" class="btn-tambah-emas">+ Tambah Prestasi</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-start mb-4">
            <div>
                <h1 class="judul-halaman">Prestasi Siswa</h1>
                <p class="text-muted small">Daftar pencapaian gemilang siswa SMA N 7 Sijunjung</p>
            </div>
        </div>

        <div class="row">
            @forelse($prestasi as $item)
            <div class="col-lg-6">
                <div class="card-prestasi">
                    <img src="{{ asset('images/prestasi/' . $item->foto_sertifikat) }}" style="width:130px; height:170px; object-fit:cover; border-radius:10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                    
                    <div class="flex-grow-1">
                        <h5 class="nama-siswa mb-0">{{ $item->nama_siswa }}</h5>
                        <div class="small text-secondary mb-2 fw-bold">KELAS {{ $item->kelas }}</div>
                        
                        <p class="small text-muted mb-3 border-top pt-2">
                            <strong class="text-dark">{{ $item->judul_prestasi }}</strong><br>
                            Tingkat: {{ $item->tingkat }}
                        </p>

                        @auth
                        <div class="d-flex gap-2">
                            <a href="{{ route('prestasi.edit', $item->id) }}" class="btn-edit-hitam">Edit</a>
                            <form action="{{ route('prestasi.destroy', $item->id) }}" method="POST" class="w-100">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-hapus-outline w-100" onclick="return confirm('Hapus data?')">Hapus</button>
                            </form>
                        </div>
                        @endauth
                    </div>
                </div>
            </div>
            @empty
            <div class="text-center py-5"><p class="text-muted">Belum ada data prestasi.</p></div>
            @endforelse
        </div>
    </div>
</body>
</html>