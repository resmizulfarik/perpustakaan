<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Layanan Perpusnas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root { --warna-emas: #ffc107; --warna-hitam: #000000; --bg-halaman: #fdf2f5; }
        body { background-color: var(--bg-halaman); font-family: 'Segoe UI', sans-serif; }
        .card-form { border: none; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-top: 5px solid var(--warna-emas); }
        .btn-simpan { background-color: var(--warna-hitam); color: var(--warna-emas); font-weight: bold; border-radius: 10px; padding: 10px 30px; border: none; }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card card-form">
                <div class="card-header bg-white py-3">
                    <h4 class="mb-0 fw-bold"><i class="fas fa-plus-circle me-2"></i>Tambah Layanan Jaringan</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('perpusnas.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Layanan</label>
                            <input type="text" name="nama_layanan" class="form-control" placeholder="Contoh: IPUSNAS" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">URL / Link Website</label>
                            <input type="url" name="url_link" class="form-control" placeholder="https://perpusnas.go.id" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Deskripsi Singkat</label>
                            <textarea name="deskripsi" class="form-control" rows="3" placeholder="Jelaskan sedikit tentang layanan ini..."></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Logo Layanan</label>
                            <input type="file" name="logo" class="form-control" required>
                        </div>

                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <a href="{{ route('perpusnas.index') }}" class="btn btn-outline-secondary px-4">Batal</a>
                            <button type="submit" class="btn-simpan">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>