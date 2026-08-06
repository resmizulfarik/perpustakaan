<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Edit Sejarah - Perpustakaan SMA Negeri 7 Sijunjung</title>
  
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

  <style>
    body { 
      background-color: #f0f2f5; 
      font-family: 'Poppins', sans-serif; 
    }
    .card {
      border-radius: 15px;
      overflow: hidden;
    }
    .card-header {
      background-color: #1b2f45 !important; 
      border-bottom: 3px solid #f1c40f; 
    }
    .btn-primary {
      background-color: #1b2f45;
      border: none;
      transition: 0.3s;
    }
    .btn-primary:hover {
      background-color: #142436;
      transform: translateY(-2px);
    }
    .form-control:focus {
      border-color: #1b2f45;
      box-shadow: 0 0 0 0.25rem rgba(27, 47, 69, 0.25);
    }
  </style>
</head>
<body>

  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        
        <div class="text-center mb-4">
            <h3 class="fw-bold text-dark">Manajemen Konten Sejarah</h3>
            <p class="text-muted">Perbarui narasi sejarah perpustakaan secara berkala.</p>
        </div>

        <div class="card shadow border-0">
          <div class="card-header text-white p-3">
            <h5 class="mb-0"><i class="fas fa-edit me-2"></i> Update Narasi Sejarah</h5>
          </div>
          <div class="card-body p-4">
            
            {{-- Bagian yang diperbaiki: action menggunakan route store agar sinkron dengan updateOrCreate --}}
            <form action="{{ route('sejarah.store') }}" method="POST">
              @csrf
              
              {{-- Input hidden ID agar Controller tahu ini adalah UPDATE --}}
              <input type="hidden" name="id" value="{{ $dataSejarah->id }}">

              <div class="mb-4">
                <label class="form-label fw-bold text-dark">Konten Sejarah</label>
                <textarea 
                    name="isi" 
                    class="form-control" 
                    rows="12" 
                    style="line-height: 1.8; border-radius: 10px;" 
                    placeholder="Tuliskan sejarah lengkap di sini..."
                    required>{{ $dataSejarah->isi }}</textarea> {{-- Perbaikan: $sejarah jadi $dataSejarah --}}
                <div class="form-text mt-3">
                    <i class="fas fa-info-circle me-1 text-primary"></i> 
                    Gunakan bahasa yang formal, informatif, dan mudah dipahami oleh siswa.
                </div>
              </div>

              <div class="d-flex justify-content-between align-items-center border-top pt-4">
                <a href="{{ route('sejarah.index') }}" class="text-decoration-none text-muted fw-semibold">
                    <i class="fas fa-arrow-left me-1"></i> Kembali ke Galeri
                </a>
                <div class="d-flex gap-2">
                    <a href="{{ route('sejarah.index') }}" class="btn btn-light px-4 border">Batal</a>
                    <button type="submit" class="btn btn-primary px-4 shadow-sm">
                        <i class="fas fa-save me-2"></i> Simpan Perubahan
                    </button>
                </div>
              </div>
            </form>

          </div>
        </div>
        
        <div class="text-center mt-4">
            <small class="text-muted">&copy; 2026 Perpustakaan SMA Negeri 7 Sijunjung</small>
        </div>
      </div>
    </div>
  </div>

</body>
</html>