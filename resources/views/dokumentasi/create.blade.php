<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Dokumentasi - Pustaka</title>
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .card { border-radius: 15px; border: none; }
        .btn-upload { background-color: #e03a3c; color: white; }
        .btn-upload:hover { background-color: #c42d2f; color: white; }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow p-4">
                    <div class="text-center mb-4">
                        <i class="bi bi-camera-fill text-danger" style="font-size: 3rem;"></i>
                        <h4 class="fw-bold">Upload Dokumentasi</h4>
                        <p class="text-muted small">Pilih foto kegiatan perpustakaan untuk ditampilkan di galeri</p>
                    </div>

                    <form action="{{ route('dokumentasi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label class="form-label fw-bold">Pilih File Foto</label>
                            <input type="file" name="foto" class="form-control" accept="image/*" required>
                            <div class="form-text text-muted">Format: JPG, PNG, JPEG (Maks. 2MB)</div>
                        </div>

                        <button type="submit" class="btn btn-upload w-100 py-2 mb-2">
                            <i class="bi bi-cloud-arrow-up me-2"></i>Mulai Unggah
                        </button>
                        <a href="{{ route('info.index') }}" class="btn btn-outline-secondary w-100">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>