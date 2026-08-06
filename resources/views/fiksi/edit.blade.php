<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Koleksi Fiksi - SMA N 7 Sijunjung</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f4f7f6; font-family: 'Segoe UI', sans-serif; }
        .card-edit { border: none; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.08); }
        .header-section { 
            background: linear-gradient(135deg, #2c3e50 0%, #1a252f 100%); 
            color: white; padding: 40px; text-align: center; border-radius: 20px 20px 0 0;
        }
        .btn-update { background-color: #3498db; color: white; font-weight: 700; border: none; border-radius: 10px; padding: 12px; }
        .btn-update:hover { background-color: #2980b9; transform: translateY(-2px); color: white; }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="mb-4">
                <a href="{{ route('fiksi.index') }}" class="btn btn-link text-decoration-none text-dark p-0 fw-bold">
                    <i class="bi bi-arrow-left me-2"></i> Batal & Kembali
                </a>
            </div>

            <div class="card card-edit">
                <div class="header-section">
                    <i class="bi bi-pencil-square display-4 text-info"></i>
                    <h2 class="fw-bold mt-2 text-uppercase">Edit Buku Fiksi</h2>
                    <p class="opacity-75">Perbarui informasi buku: <strong>{{ $fiksi->judul }}</strong></p>
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

                    <form action="{{ route('fiksi.update', $fiksi->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="form-label fw-bold">Judul Buku</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-bookmark-star text-primary"></i></span>
                                <input type="text" name="judul" class="form-control" value="{{ old('judul', $fiksi->judul) }}" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Penulis</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-person-fill text-primary"></i></span>
                                <input type="text" name="penulis" class="form-control" value="{{ old('penulis', $fiksi->penulis) }}" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Ringkasan / Sinopsis (Opsional)</label>
                            <textarea name="ringkasan" class="form-control" rows="3">{{ old('ringkasan', $fiksi->ringkasan) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Ganti Gambar / Cover Buku (Kosongkan jika tidak ingin ganti)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-image-fill text-success"></i></span>
                                <input type="file" name="file_gambar" class="form-control" accept=".jpg, .jpeg, .png, .svg">
                            </div>
                            <div class="mt-1 small text-muted mb-2">Maksimal ukuran file: 2MB (Format: JPG, PNG, SVG)</div>
                            
                            @if($fiksi->file_gambar)
                                <div class="mt-2 small text-muted">
                                    <i class="bi bi-image me-1"></i> File saat ini: 
                                    <a href="{{ asset('uploads/fiksi/' . $fiksi->file_gambar) }}" target="_blank" class="text-primary text-decoration-none fw-semibold">
                                        {{ $fiksi->file_gambar }}
                                    </a>
                                </div>
                            @endif
                        </div>

                        <div class="d-grid mt-5">
                            <button type="submit" class="btn btn-update shadow-sm">
                                <i class="bi bi-check-circle-fill me-2"></i> PERBARUI DATA
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