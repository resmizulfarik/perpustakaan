<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>{{ isset($berita) ? 'Edit' : 'Tambah' }} Berita - Admin Perpustakaan</title>

  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <style>
    body { font-family: 'Poppins', sans-serif; background-color: #f0f2f5; padding-top: 50px; }
    .form-card {
      background: white;
      border-radius: 20px;
      border: none;
      box-shadow: 0 15px 35px rgba(0,0,0,0.1);
      padding: 40px;
    }
    
    .header-title {
      font-family: 'Montserrat', sans-serif;
      font-weight: 700;
      font-size: 1.4rem; /* Ukuran sedang */
      color: #1b2f45;
      border-bottom: 3px solid #f1c40f;
      display: inline-block;
      margin-bottom: 30px;
      letter-spacing: 0.5px;
      text-transform: uppercase;
    }
    
    .form-label { font-weight: 600; color: #555; }
    
    .btn-save {
      background: #1b2f45;
      color: white;
      padding: 10px 30px;
      border-radius: 50px;
      font-weight: 600;
      transition: 0.3s;
      border: none;
      font-size: 0.9rem;
    }
    
    .btn-save:hover { 
      background: #2c4a6b; 
      transform: translateY(-2px); 
      color: white;
    }

    .btn-cancel {
      color: #6c757d;
      font-weight: 600;
      font-size: 0.9rem;
      text-decoration: none;
      transition: 0.3s;
    }

    .btn-cancel:hover {
      color: #dc3545;
    }

    .preview-img {
      max-width: 200px;
      border-radius: 10px;
      margin-top: 10px;
      display: block;
    }
  </style>
</head>
<body>

  <div class="container mb-5">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        
        <div class="mb-4">
          <a href="{{ route('berita.index') }}" class="text-decoration-none text-muted small">
            <i class="bi bi-arrow-left"></i> Kembali ke Daftar Berita
          </a>
        </div>

        <div class="form-card">
          <h5 class="header-title">
            {{ isset($berita) ? 'Edit Berita' : 'Tambah Berita Baru' }}
          </h5>

          <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <input type="hidden" name="id" value="{{ $berita->id ?? '' }}">

            <div class="mb-4">
              <label class="form-label small">Judul Berita</label>
              <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" 
                     placeholder="Masukkan judul berita..." value="{{ old('judul', $berita->judul ?? '') }}" required>
              @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-4">
              <label class="form-label small">Isi / Konten Berita</label>
              <textarea name="isi" class="form-control @error('isi') is-invalid @enderror" 
                        rows="10" placeholder="Tuliskan berita selengkapnya di sini..." required>{{ old('isi', $berita->isi ?? '') }}</textarea>
              @error('isi') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-4">
              <label class="form-label small">Gambar Utama</label>
              <input type="file" name="gambar" class="form-control form-control-sm @error('gambar') is-invalid @enderror" accept="image/*">
              <small class="text-muted" style="font-size: 0.75rem;">Format: JPG, PNG. Maksimal 2MB.</small>
              
              @if(isset($berita) && $berita->gambar)
                <div class="mt-2">
                  <small class="d-block mb-1 text-primary" style="font-size: 0.75rem;">Gambar saat ini:</small>
                  <img src="{{ asset('storage/' . $berita->gambar) }}" class="preview-img img-thumbnail shadow-sm">
                </div>
              @endif
              @error('gambar') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="d-flex justify-content-end align-items-center pt-3 border-top mt-4 gap-4">
              <a href="{{ route('berita.index') }}" class="btn-cancel">
                Batal
              </a>
              <button type="submit" class="btn btn-save">
                <i class="bi bi-check-circle me-2"></i> Simpan Berita
              </button>
            </div>

          </form>
        </div>

      </div>
    </div>
  </div>

</body>
</html>