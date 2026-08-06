<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Buku Penunjang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm border-warning">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 fw-bold text-warning">Edit Data Penunjang</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('penunjang.update', $penunjang->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label class="form-label small fw-bold">JUDUL BUKU</label>
                            <input type="text" name="judul" class="form-control" value="{{ $penunjang->judul }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold">PENULIS</label>
                            <input type="text" name="penulis" class="form-control" value="{{ $penunjang->penulis }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-bold">GANTI PDF (OPSIONAL)</label>
                            <input type="file" name="file_pdf" class="form-control" accept=".pdf">
                            <p class="small text-muted mt-2">File saat ini: <strong>{{ $penunjang->file_pdf }}</strong></p>
                        </div>

                        <button type="submit" class="btn btn-warning w-100 text-white fw-bold mb-2">Update Data</button>
                        <a href="{{ route('penunjang.index') }}" class="btn btn-link w-100 text-decoration-none text-muted">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>