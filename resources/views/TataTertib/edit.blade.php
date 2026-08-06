<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tata Tertib - Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <style>
        body { background-color: #f4f7f6; font-family: 'Poppins', sans-serif; }
        .card { border: none; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
        .btn-warning { background-color: #f1c40f; border: none; color: #1b2f45; }
        .btn-warning:hover { background-color: #d4ac0d; color: #1b2f45; }
        .form-label { font-weight: 600; color: #1b2f45; }
    </style>
</head>
<body>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-4">
                {{-- Menggunakan TataTertib sesuai permintaan --}}
                <a href="{{ route('TataTertib.index') }}" class="text-decoration-none text-muted">
                    <i class="fa fa-arrow-left me-2"></i> Batal dan Kembali
                </a>
            </div>

            <div class="card">
                <div class="card-body p-5">
                    <h3 class="fw-bold mb-4">Edit Aturan</h3>
                    <hr class="mb-4">

                    {{-- Perbaikan tanda petik di bawah ini --}}
                    {{-- Baris 37 ke bawah --}}
                    <form action="{{ route('TataTertib.update', $tata_tertib->id) }}" method="POST">
                        @csrf
                        @method('PUT') 
                        
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select name="kategori" id="kategori" class="form-select shadow-sm" required>
                                <option value="A. TATA TERTIB PENGUNJUNG" {{ $tata_tertib->kategori == 'A. TATA TERTIB PENGUNJUNG' ? 'selected' : '' }}>A. TATA TERTIB PENGUNJUNG</option>
                                <option value="B. SYARAT MENJADI ANGGOTA" {{ $tata_tertib->kategori == 'B. SYARAT MENJADI ANGGOTA' ? 'selected' : '' }}>B. SYARAT MENJADI ANGGOTA</option>
                                <option value="C. KETENTUAN PEMINJAMAN" {{ $tata_tertib->kategori == 'C. KETENTUAN PEMINJAMAN' ? 'selected' : '' }}>C. KETENTUAN PEMINJAMAN</option>
                            </select>
                        </div>
                        
                        {{-- Input isi_aturan dan urutan tetap sama --}}

                        <div class="mb-3">
                            <label for="isi_aturan" class="form-label">Isi Aturan</label>
                            <textarea name="isi_aturan" id="isi_aturan" rows="4" class="form-control shadow-sm" required>{{ $tata_tertib->isi_aturan }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="urutan" class="form-label">Urutan Tampil</label>
                            <input type="number" name="urutan" id="urutan" class="form-control shadow-sm" value="{{ $tata_tertib->urutan }}" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-warning py-2 fw-bold shadow">
                                <i class="fa fa-sync me-2"></i> Perbarui Aturan
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