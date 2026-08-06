<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Dokumentasi</title>
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow border-0">
                    <div class="card-header bg-warning text-dark fw-bold">GANTI FOTO DOKUMENTASI</div>
                    <div class="card-body">
                        <p class="small text-muted">Foto saat ini:</p>
                        <img src="{{ asset('storage/' . $dokumentasi->foto) }}" class="img-fluid mb-3 rounded shadow-sm">
                        
                        <form action="{{ route('dokumentasi.update', $dokumentasi->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="fw-bold">Pilih Foto Baru</label>
                                <input type="file" name="foto" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-warning w-100">Update Foto</button>
                            <a href="{{ route('info.index') }}" class="btn btn-link w-100 text-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>