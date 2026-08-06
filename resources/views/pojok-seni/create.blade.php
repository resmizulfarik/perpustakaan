<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pojok Seni</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #fdf2f5; font-family: 'Segoe UI', sans-serif; }
        .card-custom { border-radius: 15px; border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .btn-submit { background-color: #d32f2f; color: white; border-radius: 8px; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card card-custom p-4">
                    <h4 class="fw-bold mb-4">Tambah Karya Pojok Seni</h4>
                    
                    <form action="{{ route('pojok-seni.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold small text-secondary">NAMA PENULIS (Warna Merah di Web)</label>
                            <input type="text" name="penulis" class="form-control" placeholder="Contoh: Hendra Jaya" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-secondary">JUDUL KARYA</label>
                            <input type="text" name="judul" class="form-control" placeholder="Contoh: Lukisan Alam" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-secondary">KELAS (Contoh: X.6)</label>
                            <input type="text" name="kelas" class="form-control" placeholder="Contoh: X.6" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-secondary">SINOPSIS / DESKRIPSI</label>
                            <textarea name="sinopsis" class="form-control" rows="3" placeholder="Masukkan cerita singkat karya ini..."></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold small text-secondary">UNGGAH COVER (Ukuran 150x200px)</label>
                            <input type="file" name="cover" class="form-control" required>
                            <div class="form-text">Gunakan format JPG/PNG, maksimal 2MB.</div>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('pojok-seni.index') }}" class="btn btn-light px-4">Batal</a>
                            <button type="submit" class="btn btn-submit px-4">PUBLIKASIKAN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>