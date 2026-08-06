<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku Non Fiksi - Perpustakaan SMA 7</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body { background-color: #f4f7f6; }
        .card { border: none; border-radius: 15px; }
        .form-label { font-weight: 600; color: #444; }
        .btn-simpan { background-color: #2c3e50; color: white; border: none; }
        .btn-simpan:hover { background-color: #1a252f; color: white; }
    </style>
</head>
<body>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-bold m-0"><i class="bi bi-journal-plus text-primary"></i> Tambah Koleksi Non Fiksi</h3>
                    <a href="{{ route('nonfiksi.index') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>

                <hr>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('nonfiksi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Buku</label>
                        <input type="text" name="judul" class="form-control" id="judul" placeholder="Masukkan judul buku..." required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="penulis" class="form-label">Penulis</label>
                            <input type="text" name="penulis" class="form-control" id="penulis" placeholder="Nama penulis..." required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="penerbit" class="form-label">Penerbit</label>
                            <input type="text" name="penerbit" class="form-control" id="penerbit" placeholder="Nama penerbit..." required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                        <input type="number" name="tahun_terbit" class="form-control" id="tahun_terbit" placeholder="Contoh: 2024" required>
                    </div>

                    <div class="mb-3">
                        <label for="cover" class="form-label">Upload Cover Buku (JPG/PNG)</label>
                        <input type="file" name="cover" class="form-control" id="cover" accept="image/*" required>
                        <small class="text-muted">Rekomendasi ukuran: 300x450 px (Max 2MB)</small>
                    </div>

                    <div class="mb-4">
                        <label for="file_pdf" class="form-label">Upload File Buku (PDF)</label>
                        <input type="file" name="file_pdf" class="form-control" id="file_pdf" accept="application/pdf" required>
                        <small class="text-muted">Format file harus PDF (Max 10MB)</small>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-simpan p-2 fw-bold">
                            <i class="bi bi-cloud-upload"></i> Simpan ke Koleksi
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>