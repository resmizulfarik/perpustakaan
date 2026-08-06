<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Koleksi Buku - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        body { background-color: #f4f7f6; font-family: 'Segoe UI', sans-serif; }
        .card-form { border-radius: 15px; border: none; box-shadow: 0 5px 20px rgba(0,0,0,0.05); }
        .btn-simpan { background-color: #d32f2f; color: white; font-weight: 700; border: none; }
        .btn-simpan:hover { background-color: #b71c1c; color: white; }
    </style>
</head>
<body>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            
            @if ($errors->any())
                <div class="alert alert-danger shadow-sm mb-4" style="border-radius: 10px;">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card card-form">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold" style="color: #444;">Tambah Buku Terbaru</h5>
                    <a href="{{ route('buku-terbaru.index') }}" class="btn btn-sm btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('buku-terbaru.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold small text-muted">NAMA PENULIS (Warna Merah di Web)</label>
                            <input type="text" name="penulis" class="form-control" placeholder="Contoh: Hendra Jaya" value="{{ old('penulis') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-muted">JUDUL BUKU (Warna Abu di Web)</label>
                            <input type="text" name="judul" class="form-control" placeholder="Contoh: Sistem Robotika" value="{{ old('judul') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-muted">JUMLAH BUKU (STOK)</label>
                            <input type="number" name="jumlah" class="form-control" placeholder="Contoh: 5" value="{{ old('jumlah') }}" min="0" required>
                            <div class="form-text text-muted small">Tentukan jumlah buku yang tersedia di rak perpustakaan. (Isi 0 jika langsung habis, isi 1 jika langsung dipinjam).</div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold small text-muted">UNGGAH COVER (Ukuran Proposional 130x180px)</label>
                            <input type="file" name="cover" class="form-control" required>
                            <div class="form-text text-muted small">Gunakan format JPG/JPEG/PNG, maksimal 2MB.</div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('buku-terbaru.index') }}" class="btn btn-light px-4">Batal</a>
                            <button type="submit" class="btn btn-simpan px-5">PUBLIKASIKAN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>