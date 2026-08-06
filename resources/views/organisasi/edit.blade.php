<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Personil - Struktur Organisasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-secondary-subtle">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow border-0">
                    <div class="card-header bg-dark text-white py-3">
                        <h5 class="mb-0">Edit Data Personil</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('organisasi.update', $personil->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label fw-bold">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" value="{{ $personil->nama }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Jabatan</label>
                                <input type="text" name="jabatan" class="form-control" value="{{ $personil->jabatan }}" required>
                                <div class="form-text">Contoh: Kepala Perpustakaan, Staff Layanan, dll.</div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Foto Personil</label>
                                @if($personil->foto)
                                    <div class="mb-2">
                                        <img src="{{ asset('assets/img/organisasi/' . $personil->foto) }}" alt="Foto" width="100" class="img-thumbnail">
                                        <div class="form-text text-muted small">Foto saat ini</div>
                                    </div>
                                @endif
                                <input type="file" name="foto" class="form-control">
                                <div class="form-text">Pilih file baru jika ingin mengganti foto (Max: 2MB).</div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold">Urutan Tampilan</label>
                                <input type="number" name="urutan" class="form-control" value="{{ $personil->urutan }}" required>
                                <div class="form-text">Angka lebih kecil (misal: 1) akan muncul paling atas.</div>
                            </div>

                            <div class="d-flex justify-content-end border-top pt-3 gap-2">
                                <a href="{{ route('organisasi.index') }}" class="btn btn-outline-secondary" style="min-width: 160px;">Batal</a>
                                <button type="submit" class="btn btn-primary" style="min-width: 160px;">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>