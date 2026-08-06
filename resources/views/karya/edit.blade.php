<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Karya - Perpustakaan SMA N 7 Sijunjung</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f4f7f6; font-family: 'Segoe UI', sans-serif; }
        .card-edit { border: none; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.08); overflow: hidden; }
        .header-section { 
            background-color: #2c3e50; 
            color: white; padding: 30px; text-align: center;
        }
        .btn-submit { background-color: #2c3e50; color: white; font-weight: 700; border: none; border-radius: 8px; padding: 12px; }
        .btn-submit:hover { background-color: #1a252f; color: white; }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-8">

            <div class="card card-edit">
                <!-- Header Card -->
                <div class="header-section">
                    <h2 class="fw-bold text-uppercase mb-1">EDIT DATA KARYA</h2>
                    <p class="mb-0 opacity-75">ID Karya: #{{ $karya->id }} | Kategori: {{ ucfirst($karya->kategori) }}</p>
                </div>

                <div class="card-body p-4 p-md-5">
                    <!-- Display Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger border-0 shadow-sm mb-4">
                            <ul class="mb-0 small">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('karya.update', $karya->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Judul Karya -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">Judul Karya</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white"><i class="bi bi-journal-bookmark text-danger"></i></span>
                                <input type="text" name="judul" class="form-control" value="{{ old('judul', $karya->judul) }}" required>
                            </div>
                        </div>

                        <!-- Nama Penulis -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">Nama Penulis</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white"><i class="bi bi-person text-danger"></i></span>
                                <input type="text" name="penulis" class="form-control" value="{{ old('penulis', $karya->penulis) }}" required>
                            </div>
                        </div>

                        <!-- Grid Kategori, Ganti Cover, & Ganti File PDF -->
                        <div class="row mb-4">
                            <!-- Kategori -->
                            <div class="col-md-4 mb-3 mb-md-0">
                                <label class="form-label fw-bold">Kategori</label>
                                <select name="kategori" class="form-select" required>
                                    <option value="guru" {{ old('kategori', $karya->kategori) == 'guru' ? 'selected' : '' }}>Guru (Pendidik)</option>
                                    <option value="siswa" {{ old('kategori', $karya->kategori) == 'siswa' ? 'selected' : '' }}>Siswa</option>
                                </select>
                            </div>

                            <!-- INPUT COVER GAMBAR (YANG SEBELUMNYA BELUM ADA) -->
                            <div class="col-md-4 mb-3 mb-md-0">
                                <label class="form-label fw-bold">Ganti Cover (Gambar)</label>
                                <input type="file" name="cover" class="form-control" accept="image/*">
                                <small class="text-muted d-block mt-1" style="font-size: 0.75rem;">Biarkan kosong jika tidak ganti.</small>
                            </div>

                            <!-- Ganti File PDF -->
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Ganti File (PDF)</label>
                                <input type="file" name="file_pdf" class="form-control" accept="application/pdf">
                                <small class="text-muted d-block mt-1" style="font-size: 0.75rem;">Biarkan kosong jika tidak ganti.</small>
                            </div>
                        </div>

                        <!-- Preview File Saat Ini (Cover & PDF) -->
                        <div class="row mb-4">
                            <!-- Preview Cover -->
                            @if($karya->cover && file_exists(public_path('uploads/karya/' . $karya->cover)))
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <div class="p-3 border rounded bg-light d-flex align-items-center gap-3">
                                        <img src="{{ asset('uploads/karya/' . $karya->cover) }}" alt="Cover Saat Ini" class="rounded border" style="height: 60px; width: 45px; object-fit: cover;">
                                        <div>
                                            <span class="d-block fw-bold small">Cover saat ini:</span>
                                            <small class="text-muted text-truncate d-inline-block" style="max-width: 150px;">{{ $karya->cover }}</small>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <!-- Preview PDF -->
                            @if($karya->file_pdf && file_exists(public_path('uploads/karya/' . $karya->file_pdf)))
                                <div class="col-md-6">
                                    <div class="p-3 border rounded bg-light d-flex align-items-center gap-3" style="background-color: #e0f7fa !important;">
                                        <i class="bi bi-file-earmark-pdf-fill text-danger fs-2"></i>
                                        <div>
                                            <span class="d-block fw-bold small">File PDF saat ini:</span>
                                            <a href="{{ asset('uploads/karya/' . $karya->file_pdf) }}" target="_blank" class="small text-decoration-none text-primary fw-semibold">
                                                Lihat File PDF <i class="bi bi-box-arrow-up-right ms-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Tombol Submit -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-submit">
                                SIMPAN PERUBAHAN
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