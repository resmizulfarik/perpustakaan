<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Staff - Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white py-3">
                        <h5 class="mb-0 fw-bold">Tambah Data Staff Baru</h5>
                    </div>
                    <div class="card-body p-4">
                        
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('staff.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label fw-bold">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" placeholder="Contoh: Dra. Siti Rubiah Bajawati, M.Pd" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">NIP</label>
                                    <input type="text" name="nip" class="form-control" value="{{ old('nip') }}" placeholder="Masukkan NIP (Opsional)">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Urutan Tampilan</label>
                                    <input type="number" name="urutan" class="form-control" value="{{ old('urutan', 1) }}" required>
                                    <small class="text-muted">1 untuk pimpinan tertinggi</small>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label fw-bold">Jabatan</label>
                                    <input type="text" name="jabatan" class="form-control" value="{{ old('jabatan') }}" placeholder="Contoh: Kepala Perpustakaan" required>
                                </div>

                                <div class="col-md-12 mb-4">
                                    <label class="form-label fw-bold">Foto Staff</label>
                                    <input type="file" name="foto" class="form-control" accept="image/*">
                                    <div class="form-text">Format: JPG, JPEG, PNG (Maks. 2MB)</div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end border-top pt-4 gap-2">
                                <a href="{{ route('staff.index') }}" class="btn btn-outline-secondary" style="width: 150px;">Batal</a>
                                <button type="submit" class="btn btn-primary fw-bold" style="width: 150px;">Simpan Data</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>