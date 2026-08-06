<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Prestasi - Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root { --warna-emas: #ffc107; --warna-hitam: #000000; --bg-halaman: #fdf2f5; }
        body { background-color: var(--bg-halaman); font-family: 'Segoe UI', sans-serif; }
        .card-form { border: none; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-top: 5px solid var(--warna-emas); }
        .btn-update { background-color: var(--warna-hitam); color: var(--warna-emas); font-weight: bold; border-radius: 10px; padding: 10px 30px; border: none; }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-form">
                <div class="card-header bg-white py-3">
                    <h4 class="mb-0 fw-bold"><i class="fas fa-edit me-2"></i>Edit Prestasi Siswa</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('prestasi.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Nama Siswa</label>
                                <input type="text" name="nama_siswa" class="form-control" value="{{ $item->nama_siswa }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Kelas</label>
                                <input type="text" name="kelas" class="form-control" value="{{ $item->kelas }}" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Judul Prestasi</label>
                            <input type="text" name="judul_prestasi" class="form-control" value="{{ $item->judul_prestasi }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Foto Saat Ini</label><br>
                            <img src="{{ asset('images/prestasi/' . $item->foto_sertifikat) }}" width="150" class="rounded shadow-sm mb-2">
                            <input type="file" name="foto_sertifikat" class="form-control">
                            <small class="text-muted">Kosongkan jika tidak ingin mengganti foto</small>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('prestasi.index') }}" class="btn btn-outline-secondary px-4">Batal</a>
                            <button type="submit" class="btn btn-update">Update Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>