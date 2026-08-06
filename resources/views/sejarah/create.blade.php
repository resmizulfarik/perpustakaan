<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Tambah/Edit Sejarah - Perpustakaan SMA Negeri 7 Sijunjung</title>
  
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

  <style>
    body { background-color: #f0f2f5; font-family: 'Poppins', sans-serif; }
    .card { border-radius: 15px; overflow: hidden; border: none; }
    .card-header { 
      background-color: #1b2f45 !important; /* Biru Tua sesuai identitas */
      border-bottom: 3px solid #f1c40f; /* Garis kuning sesuai logo sekolah */
    }
    .btn-save { background-color: #1b2f45; color: white; border: none; transition: 0.3s; }
    .btn-save:hover { background-color: #142436; color: white; transform: translateY(-2px); }
    .form-control:focus { border-color: #1b2f45; box-shadow: 0 0 0 0.25rem rgba(27, 47, 69, 0.25); }
  </style>
</head>
<body>

  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        
        <div class="text-center mb-4">
            <h3 class="fw-bold text-dark">Form Sejarah Perpustakaan</h3>
            <p class="text-muted">Gunakan form ini untuk menambah atau memperbarui narasi sejarah.</p>
        </div>

        <div class="card shadow">
          <div class="card-header text-white p-3">
            <h5 class="mb-0"><i class="fas fa-pen-nib me-2"></i> Kelola Narasi Sejarah</h5>
          </div>
          <div class="card-body p-4">
            
            {{-- Mengarah ke method store untuk memproses data --}}
            <form action="{{ route('sejarah.store') }}" method="POST">
              @csrf

              {{-- Input hidden ID: Jika data sudah ada, ini akan memicu update. Jika baru, ID akan kosong. --}}
              <input type="hidden" name="id" value="{{ $dataSejarah->id ?? '' }}">

              <div class="mb-4">
                <label class="form-label fw-bold text-dark">Konten Sejarah</label>
                <textarea 
                    name="isi" 
                    class="form-control" 
                    rows="12" 
                    style="line-height: 1.8; border-radius: 10px;" 
                    placeholder="Masukkan narasi sejarah perpustakaan di sini..."
                    required>{{ $dataSejarah->isi ?? '' }}</textarea>
                <div class="form-text mt-3">
                    <i class="fas fa-info-circle me-1 text-primary"></i> 
                    Pastikan narasi yang Anda masukkan sudah benar dan sesuai fakta sekolah.
                </div>
              </div>

              <div class="d-flex justify-content-between align-items-center border-top pt-4">
                <a href="{{ route('sejarah.index') }}" class="text-decoration-none text-muted fw-semibold">
                    <i class="fas fa-arrow-left me-1"></i> Batal
                </a>
                <button type="submit" class="btn btn-save px-5 shadow-sm fw-bold">
                    <i class="fas fa-check-circle me-2"></i> Simpan Narasi
                </button>
              </div>
            </form>

          </div>
        </div>
        
        <div class="text-center mt-4">
            <small class="text-muted">Halaman Administrasi - SMA Negeri 7 Sijunjung</small>
        </div>
      </div>
    </div>
  </div>

</body>
</html>