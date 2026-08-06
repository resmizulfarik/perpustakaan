<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pojok Seni</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #fdf2f5; font-family: 'Segoe UI', sans-serif; }
        .card-custom { border-radius: 15px; border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .btn-update { background-color: #212529; color: white; border-radius: 8px; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card card-custom p-4">
                    <h4 class="fw-bold mb-4">Edit Karya Pojok Seni</h4>
                    
                    <form action="{{ route('pojok-seni.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-secondary">NAMA PENULIS</label>
                            <input type="text" name="penulis" class="form-control" value="{{ $item->penulis }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-secondary">JUDUL KARYA</label>
                            <input type="text" name="judul" class="form-control" value="{{ $item->judul }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-secondary">KELAS</label>
                            <input type="text" name="kelas" class="form-control" value="{{ $item->kelas }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-secondary">SINOPSIS / DESKRIPSI</label>
                            <textarea name="sinopsis" class="form-control" rows="3">{{ $item->sinopsis }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-secondary">COVER SAAT INI</label><br>
                            <img src="{{ asset('images/covers/' . $item->cover) }}" width="100" class="rounded mb-2 shadow-sm border">
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold small text-secondary">GANTI COVER (Kosongkan jika tidak ingin diganti)</label>
                            <input type="file" name="cover" class="form-control">
                            <div class="form-text text-danger">*Format JPG/PNG, Maksimal 2MB.</div>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('pojok-seni.index') }}" class="btn btn-light px-4">Batal</a>
                            <button type="submit" class="btn btn-update px-4">SIMPAN PERUBAHAN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>