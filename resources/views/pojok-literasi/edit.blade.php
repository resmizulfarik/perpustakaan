<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Karya Literasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f7f6; font-family: 'Segoe UI', sans-serif; }
        .card-form { border: none; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-form p-5">
                    <h3 class="fw-bold text-dark mb-4">Edit Karya: <span class="text-primary">{{ $item->judul }}</span></h3>
                    <hr class="mb-4">

                    <form action="{{ route('pojok-literasi.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold small">NAMA PENULIS</label>
                                <input type="text" name="penulis" class="form-control" value="{{ $item->penulis }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold small">KELAS</label>
                                <input type="text" name="kelas" class="form-control" value="{{ $item->kelas }}" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small">JUDUL KARYA</label>
                            <input type="text" name="judul" class="form-control" value="{{ $item->judul }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small">KATEGORI</label>
                            <select name="kategori" class="form-select" required>
                                <option value="Puisi" {{ $item->kategori == 'Puisi' ? 'selected' : '' }}>Puisi</option>
                                <option value="Cerpen" {{ $item->kategori == 'Cerpen' ? 'selected' : '' }}>Cerpen</option>
                                <option value="Artikel" {{ $item->kategori == 'Artikel' ? 'selected' : '' }}>Artikel</option>
                                <option value="Pantun" {{ $item->kategori == 'Pantun' ? 'selected' : '' }}>Pantun</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small">ISI LITERASI</label>
                            <textarea name="isi" class="form-control" rows="8" required>{{ $item->isi }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small d-block">COVER SAAT INI</label>
                            <img src="{{ asset('images/literasi/' . $item->cover) }}" class="rounded shadow-sm mb-2" style="width: 100px;">
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold small">GANTI COVER (Biarkan kosong jika tetap)</label>
                            <input type="file" name="cover" class="form-control">
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('pojok-literasi.index') }}" class="btn btn-light px-4 fw-bold">BATAL</a>
                            <button type="submit" class="btn btn-dark px-4 fw-bold">SIMPAN PERUBAHAN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>