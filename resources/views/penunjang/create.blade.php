<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Buku Penunjang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 fw-bold">Tambah Buku Penunjang</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('penunjang.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label small fw-bold">JUDUL BUKU</label>
                            <input type="text" name="judul" class="form-control" placeholder="Contoh: Kamus Fisika" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold">NAMA PENULIS</label>
                            <input type="text" name="penulis" class="form-control" placeholder="Nama penulis..." required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-bold">FILE PDF</label>
                            <input type="file" name="file_pdf" class="form-control" accept=".pdf" required>
                            <div class="form-text">Maksimal ukuran file 10MB.</div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 mb-2">Simpan Koleksi</button>
                        <a href="{{ route('penunjang.index') }}" class="btn btn-link w-100 text-decoration-none text-muted">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>