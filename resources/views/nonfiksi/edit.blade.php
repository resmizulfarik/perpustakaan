<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku Non Fiksi - Perpustakaan SMA 7 Sijunjung</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body { background-color: #f4f7f6; font-family: 'Segoe UI', sans-serif; }
        .card { border: none; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.08); }
        .form-label { font-weight: 600; color: #444; }
        .btn-update { background-color: #f39c12; color: white; border: none; font-weight: 700; }
        .btn-update:hover { background-color: #e67e22; color: white; }
        .preview-img { width: 100px; height: 130px; object-fit: cover; border-radius: 8px; border: 2px solid #ddd; }
    </style>
</head>
<body>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="fw-bold m-0"><i class="bi bi-pencil-square text-warning"></i> Edit Buku Non Fiksi</h3>
                    <a href="{{ route('nonfiksi.index') }}" class="btn btn-outline-secondary btn-sm fw-bold">
                        <i class="bi bi-arrow-left"></i> Batal
                    </a>
                </div>

                <hr class="mb-4">

                {{-- Alert Error Validation --}}
                @if ($errors->any())
                    <div class="alert alert-danger border-0 shadow-sm mb-4">
                        <ul class="mb-0 small">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- PERBAIKAN: Mengubah NonFiksi.update menjadi nonfiksi.update --}}
                <form action="{{ route('nonfiksi.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Judul Buku --}}
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Buku</label>
                        <input type="text" name="judul" class="form-control" id="judul" value="{{ old('judul', $buku->judul) }}" required>
                    </div>

                    {{-- Penulis & Penerbit --}}
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="penulis" class="form-label">Penulis</label>
                            <input type="text" name="penulis" class="form-control" id="penulis" value="{{ old('penulis', $buku->penulis) }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="penerbit" class="form-label">Penerbit</label>
                            <input type="text" name="penerbit" class="form-control" id="penerbit" value="{{ old('penerbit', $buku->penerbit) }}" required>
                        </div>
                    </div>

                    {{-- Tahun Terbit --}}
                    <div class="mb-3">
                        <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                        <input type="number" name="tahun_terbit" class="form-control" id="tahun_terbit" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}" required>
                    </div>

                    {{-- Cover Gambar --}}
                    <div class="mb-3">
                        <label class="form-label d-block">Cover Saat Ini</label>
                        @if($buku->cover && file_exists(public_path('uploads/nonfiksi/cover/' . $buku->cover)))
                            <div class="mb-2">
                                <img src="{{ asset('uploads/nonfiksi/cover/'.$buku->cover) }}" class="preview-img" alt="Cover Buku">
                            </div>
                        @else
                            <div class="mb-2 text-muted small"><i class="bi bi-image"></i> Belum ada cover</div>
                        @endif
                        <input type="file" name="cover" class="form-control" id="cover" accept="image/*">
                        <small class="text-muted">*Kosongkan jika tidak ingin mengganti cover</small>
                    </div>

                    {{-- File PDF --}}
                    <div class="mb-4">
                        <label class="form-label d-block">File PDF Saat Ini</label>
                        @if($buku->file_pdf && file_exists(public_path('uploads/nonfiksi/pdf/' . $buku->file_pdf)))
                            <div class="mb-2">
                                <a href="{{ asset('uploads/nonfiksi/pdf/'.$buku->file_pdf) }}" target="_blank" class="badge bg-info text-decoration-none p-2">
                                    <i class="bi bi-file-earmark-pdf-fill"></i> Lihat File PDF Saat Ini
                                </a>
                            </div>
                        @else
                            <div class="mb-2 text-muted small"><i class="bi bi-file-earmark-pdf"></i> Belum ada file PDF</div>
                        @endif
                        <input type="file" name="file_pdf" class="form-control" id="file_pdf" accept="application/pdf">
                        <small class="text-muted">*Kosongkan jika tidak ingin mengganti file PDF</small>
                    </div>

                    {{-- Tombol Submit --}}
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-update p-2 fw-bold text-dark">
                            <i class="bi bi-save"></i> Perbarui Data Buku
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