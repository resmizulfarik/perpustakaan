<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Buku - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        body { background-color: #f4f7f6; font-family: 'Segoe UI', sans-serif; }
        .card-form { border-radius: 15px; border: none; box-shadow: 0 5px 20px rgba(0,0,0,0.05); }
    </style>
</head>
<body>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-7">

            @if ($errors->any())
                <div class="alert alert-danger shadow-sm mb-4" style="border-radius: 10px;">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card card-form">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold">Edit Data: {{ $buku->judul }}</h5>
                    <a href="{{ route('buku-terbaru.index') }}" class="btn btn-sm btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('buku-terbaru.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold small text-muted">NAMA PENULIS (Warna Merah di Web)</label>
                            <input type="text" name="penulis" class="form-control" value="{{ old('penulis', $buku->penulis) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-muted">JUDUL BUKU (Warna Abu di Web)</label>
                            <input type="text" name="judul" class="form-control" value="{{ old('judul', $buku->judul) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-muted">JUMLAH BUKU (STOK)</label>
                            <input type="number" name="jumlah" class="form-control" value="{{ old('jumlah', $buku->jumlah ?? 0) }}" min="0" required placeholder="Contoh: 10">
                            <div class="form-text text-muted small">Isi 0 jika buku habis, isi 1 jika sedang dipinjam.</div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label d-block fw-bold small text-muted text-start">GANTI COVER (Kosongkan jika tidak diganti)</label>
                            <div class="p-3 border rounded mb-2 bg-light text-center">
                                @if($buku->cover && file_exists(public_path('images/covers/' . $buku->cover)))
                                    <img src="{{ asset('images/covers/' . $buku->cover) }}" width="110" class="rounded shadow-sm mb-2 d-block mx-auto" style="height: 150px; object-fit: cover;">
                                @else
                                    <div class="text-muted p-3"><i class="bi bi-image" style="font-size: 2rem;"></i><br>Tidak ada cover</div>
                                @endif
                                <span class="badge bg-secondary">Cover Saat Ini</span>
                            </div>
                            <input type="file" name="cover" class="form-control">
                            <div class="form-text text-muted small">Gunakan format JPG/JPEG/PNG, maksimal 2MB.</div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('buku-terbaru.index') }}" class="btn btn-light px-4">Batal</a>
                            <button type="submit" class="btn btn-dark px-5 fw-bold">SIMPAN PERUBAHAN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>