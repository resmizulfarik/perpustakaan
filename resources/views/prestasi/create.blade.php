<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Prestasi - Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root { --warna-emas: #ffc107; --warna-hitam: #000000; --bg-halaman: #fdf2f5; }
        body { background-color: var(--bg-halaman); font-family: 'Segoe UI', sans-serif; }
        .card-form { border: none; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-top: 5px solid var(--warna-emas); }
        .btn-simpan { background-color: var(--warna-hitam); color: var(--warna-emas); font-weight: bold; border-radius: 10px; padding: 10px 30px; border: none; transition: 0.3s; }
        .btn-simpan:hover { background-color: #333; color: #fff; }
        .btn-batal { border-radius: 10px; padding: 10px 30px; }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-form">
                <div class="card-header bg-white py-3">
                    <h4 class="mb-0 fw-bold"><i class="fas fa-plus-circle me-2"></i>Tambah Prestasi Baru</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('prestasi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Nama Siswa</label>
                                <input type="text" name="nama_siswa" class="form-control" placeholder="Nama lengkap siswa" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Kelas</label>
                                <input type="text" name="kelas" class="form-control" placeholder="Contoh: XII IPA 1" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Judul Prestasi</label>
                            <input type="text" name="judul_prestasi" class="form-control" placeholder="Contoh: Juara 1 Lomba Pidato" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Tingkat</label>
                                <select name="tingkat" class="form-select" required>
                                    <option value="">-- Pilih Tingkat --</option>
                                    <option value="Sekolah">Sekolah</option>
                                    <option value="Kabupaten">Kabupaten</option>
                                    <option value="Provinsi">Provinsi</option>
                                    <option value="Nasional">Nasional</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Tanggal Dicapai</label>
                                <input type="date" name="tanggal_dicapai" class="form-control" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Foto Sertifikat / Dokumentasi</label>
                            <input type="file" name="foto_sertifikat" class="form-control" required>
                            <small class="text-muted">Format: JPG, PNG, JPEG (Maks. 2MB)</small>
                        </div>

                        <div class="d-flex justify-content-end gap-2 mt-4">
                        <a href="{{ route('prestasi.index') }}" class="btn btn-outline-secondary btn-batal">Batal</a>
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