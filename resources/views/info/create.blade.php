<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Info - Pustaka SMA 7 Sijunjung</title>
    
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    
    <style>
        body { background: #f4f7f6; font-family: 'Open Sans', sans-serif; }
        .card { border-radius: 15px; border: none; }
        .btn-save { background-color: #198754; color: white; border: none; font-weight: bold; }
        .btn-save:hover { background-color: #146c43; color: white; }
        .label-green { color: #198754; font-weight: 600; margin-bottom: 5px; }
    </style>
</head>

<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card shadow-lg p-4">
                    <div class="text-center mb-4">
                        <i class="bi bi-plus-circle-fill" style="font-size: 3rem; color: #198754;"></i>
                        <h3 class="fw-bold">Input Informasi Dasar</h3>
                        <p class="text-muted">Lengkapi data awal perpustakaan</p>
                    </div>

                    <form action="{{ route('info.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="label-green"><i class="bi bi-envelope-fill me-2"></i>Email Sekolah</label>
                            <input type="email" name="email" class="form-control" placeholder="contoh: sman7sijunjung@gmail.com" required>
                        </div>

                        <div class="mb-3">
                            <label class="label-green"><i class="bi bi-geo-alt-fill me-2"></i>Alamat Lengkap</label>
                            <textarea name="alamat" class="form-control" rows="3" placeholder="Jl. Raya No..." required></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="label-green"><i class="bi bi-instagram me-2"></i>Instagram</label>
                                <input type="text" name="instagram" class="form-control" placeholder="Username Instagram">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="label-green"><i class="bi bi-tiktok me-2"></i>TikTok</label>
                                <input type="text" name="tiktok" class="form-control" placeholder="Username TikTok">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-save w-100 py-2 mb-2 shadow-sm">
                            <i class="bi bi-check-lg me-2"></i>Simpan Informasi
                        </button>
                        <a href="{{ route('info.index') }}" class="btn btn-outline-secondary w-100 py-2">
                            <i class="bi bi-arrow-left me-2"></i>Kembali
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>