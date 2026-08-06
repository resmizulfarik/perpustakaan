<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Koleksi Fiksi - SMA N 7 Sijunjung</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f4f7f6; font-family: 'Segoe UI', sans-serif; }
        .card-upload { border: none; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.08); }
        .header-section { 
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%); 
            color: white; padding: 40px; text-align: center; border-radius: 20px 20px 0 0;
        }
        .btn-save { background-color: #f1c40f; color: #2c3e50; font-weight: 700; border: none; border-radius: 10px; padding: 12px; }
        .btn-save:hover { background-color: #d4ac0d; transform: translateY(-2px); }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="mb-4">
                <a href="{{ route('fiksi.index') }}" class="btn btn-link text-decoration-none text-dark p-0 fw-bold">
                    <i class="bi bi-arrow-left me-2"></i> Kembali ke Daftar Fiksi
                </a>
            </div>

            <div class="card card-upload">
                <div class="header-section">
                    <i class="bi bi-journal-plus display-4 text-warning"></i>
                    <h2 class="fw-bold mt-2">TAMBAH BUKU FIKSI</h2>
                    <p class="opacity-75">Masukkan detail buku fiksi baru ke dalam sistem</p>
                </div>

                <div class="card-body p-4 p-md-5">
                    @if ($errors->any())
                        <div class="alert alert-danger border-0 shadow-sm mb-4">
                            <ul class="mb-0 small">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('fiksi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label class="form-label fw-bold">Judul Buku</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-bookmark-star text-primary"></i></span>
                                <input type="text" name="judul" class="form-control" placeholder="Contoh: Laskar Pelangi" value="{{ old('judul') }}" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Penulis</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-person-fill text-primary"></i></span>
                                <input type="text" name="penulis" class="form-control" placeholder="Nama pengarang..." value="{{ old('penulis') }}" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Ringkasan / Sinopsis (Opsional)</label>
                            <textarea name="ringkasan" class="form-control" rows="3" placeholder="Ceritakan sedikit tentang isi buku...">{{ old('ringkasan') }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Unggah Gambar / Cover Buku</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-image-fill text-success"></i></span>
                                <input type="file" name="file_gambar" class="form-control" accept=".jpg, .jpeg, .png, .svg" required>
                            </div>
                            <div class="mt-1 small text-muted">Maksimal ukuran file: 2MB (Format: JPG, PNG, SVG)</div>
                        </div>

                        <div class="d-grid mt-5">
                            <button type="submit" class="btn btn-save shadow-sm">
                                <i class="bi bi-cloud-check-fill me-2"></i> SIMPAN KOLEKSI
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>