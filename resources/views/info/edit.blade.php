<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Informasi - Pustaka SMA 7 Sijunjung</title>
    
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    
    <style>
        body { background: #f4f7f6; font-family: 'Open Sans', sans-serif; }
        .card { border-radius: 15px; border: none; }
        .btn-update { background-color: #e03a3c; color: white; border: none; font-weight: bold; }
        .btn-update:hover { background-color: #c42d2f; color: white; }
        .label-red { color: #e03a3c; font-weight: 600; margin-bottom: 5px; }
        .form-control:focus { border-color: #e03a3c; box-shadow: 0 0 0 0.25 red; }
    </style>
</head>

<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card shadow-lg p-4">
                    <div class="text-center mb-4">
                        <i class="bi bi-gear-fill" style="font-size: 3rem; color: #e03a3c;"></i>
                        <h3 class="fw-bold">Pengaturan Informasi</h3>
                        <p class="text-muted">Kelola data alamat, email, dan sosial media perpustakaan</p>
                    </div>

                    <form action="{{ route('info.update', $info->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="label-red"><i class="bi bi-envelope-at-fill me-2"></i>Email Perpustakaan</label>
                                <input type="email" name="email" value="{{ old('email', $info->email) }}" class="form-control" placeholder="Contoh: pustakasman7@gmail.com" required>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="label-red"><i class="bi bi-geo-alt-fill me-2"></i>Alamat Lengkap</label>
                                <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan alamat lengkap sekolah..." required>{{ old('alamat', $info->alamat) }}</textarea>
                            </div>

                            <hr class="my-3">
                            <h5 class="mb-3 fw-bold text-secondary">Link Sosial Media</h5>

                            <div class="col-md-6 mb-3">
                                <label class="label-red"><i class="bi bi-instagram me-2"></i>Instagram</label>
                                <input type="text" name="instagram" value="{{ old('instagram', $info->instagram) }}" class="form-control" placeholder="Username Instagram">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="label-red"><i class="bi bi-tiktok me-2"></i>TikTok</label>
                                <input type="text" name="tiktok" value="{{ old('tiktok', $info->tiktok) }}" class="form-control" placeholder="Username TikTok">
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="label-red"><i class="bi bi-facebook me-2"></i>Facebook</label>
                                <input type="text" name="facebook" value="{{ old('facebook', $info->facebook ?? '') }}" class="form-control" placeholder="Nama Halaman Facebook">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="label-red"><i class="bi bi-twitter-x me-2"></i>Twitter / X</label>
                                <input type="text" name="twitter" value="{{ old('twitter', $info->twitter ?? '') }}" class="form-control" placeholder="Username X">
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-update w-100 py-2 mb-2 shadow-sm">
                                <i class="bi bi-save me-2"></i>Simpan Perubahan
                            </button>
                            <a href="{{ route('info.index') }}" class="btn btn-outline-secondary w-100 py-2">
                                <i class="bi bi-arrow-left me-2"></i>Kembali ke Halaman Info
                            </a>
                        </div>
                    </form>
                </div>
                
                <p class="text-center mt-3 text-muted small">© 2026 Perpustakaan SMAN 7 Sijunjung</p>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>