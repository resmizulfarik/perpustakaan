<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tata Tertib - Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <style>
        body { background-color: #f4f7f6; font-family: 'Poppins', sans-serif; }
        .card { border: none; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
        .btn-primary { background-color: #1b2f45; border: none; }
        .btn-primary:hover { background-color: #142334; }
        .form-label { font-weight: 600; color: #1b2f45; }
    </style>
</head>
<body>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-4">
                <a href="{{ route('TataTertib.index') }}" class="text-decoration-none text-muted">
                    <i class="fa fa-arrow-left me-2"></i> Kembali ke Daftar
                </a>
            </div>

            <div class="card">
                <div class="card-body p-5">
                    <h3 class="fw-bold mb-4">Tambah Aturan Baru</h3>
                    <hr class="mb-4">

                    <form action="{{ route('TataTertib.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select name="kategori" id="kategori" class="form-select shadow-sm" required>
                                <option value="" disabled selected>Pilih Kategori...</option>
                                <option value="A. TATA TERTIB PENGUNJUNG">A. TATA TERTIB PENGUNJUNG</option>
                                <option value="B. SYARAT MENJADI ANGGOTA">B. SYARAT MENJADI ANGGOTA</option>
                                <option value="C. KETENTUAN PEMINJAMAN">C. KETENTUAN PEMINJAMAN</option>
                            </select>
                            <small class="text-muted">Kategori ini akan digunakan untuk mengelompokkan aturan di halaman depan.</small>
                        </div>

                        <div class="mb-3">
                            <label for="isi_aturan" class="form-label">Isi Aturan</label>
                            <textarea name="isi_aturan" id="isi_aturan" rows="4" class="form-control shadow-sm" placeholder="Contoh: Pengunjung wajib mengisi buku tamu..." required></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="urutan" class="form-label">Urutan Tampil</label>
                            <input type="number" name="urutan" id="urutan" class="form-control shadow-sm" value="1" required>
                            <small class="text-muted">Gunakan angka (1, 2, 3...) untuk mengatur posisi aturan dari atas ke bawah.</small>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary py-2 fw-bold shadow">
                                <i class="fa fa-save me-2"></i> Simpan Aturan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>