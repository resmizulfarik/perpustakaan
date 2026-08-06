<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Karya Literasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Warna latar belakang pink lembut sesuai dashboard */
        body { background-color: #fdf2f5; font-family: 'Segoe UI', sans-serif; }
        
        .card-form { border: none; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
        
        /* Tombol Publikasikan menjadi merah */
        .btn-merah { 
            background-color: #d32f2f !important; 
            border: none; 
            padding: 12px; 
            font-weight: bold; 
            color: white !important;
        }
        .btn-merah:hover { background-color: #b71c1c !important; }

        /* Warna judul menjadi hitam tebal */
        .judul-hitam { color: #000000; font-weight: 800; }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-form p-5">
                    <h3 class="judul-hitam mb-4 text-center">Tambah Karya Literasi</h3>
                    <hr class="mb-4">

                    <form action="{{ route('pojok-literasi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold small">NAMA PENULIS</label>
                                <input type="text" name="penulis" class="form-control" placeholder="Nama Lengkap Siswa" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold small">KELAS</label>
                                <input type="text" name="kelas" class="form-control" placeholder="Contoh: XII IPA 1" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small">JUDUL KARYA</label>
                            <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul Menarik" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small">KATEGORI KARYA</label>
                            <select name="kategori" class="form-select" required>
                                <option value="" selected disabled>Pilih Kategori...</option>
                                <option value="Puisi">Puisi</option>
                                <option value="Cerpen">Cerita Pendek (Cerpen)</option>
                                <option value="Artikel">Artikel / Opini</option>
                                <option value="Pantun">Pantun</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small">ISI LITERASI</label>
                            <textarea name="isi" class="form-control" rows="8" placeholder="Tuliskan karya kamu di sini..." required></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold small">UNGGAH COVER (Format: JPG/PNG, Max: 2MB)</label>
                            <input type="file" name="cover" class="form-control" required>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('pojok-literasi.index') }}" class="btn btn-light px-5 fw-bold">BATAL</a>
                            <button type="submit" class="btn btn-merah px-5 shadow">PUBLIKASIKAN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>