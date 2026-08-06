<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Edit Berita - Perpustakaan SMA 7 Sijunjung</title>

  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <style>
    body { font-family: 'Poppins', sans-serif; background-color: #f4f7f6; padding: 60px 0; }
    
    .edit-container {
      background: white;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.08);
      padding: 40px;
    }

    .section-title {
      font-family: 'Montserrat', sans-serif;
      font-weight: 700;
      color: #4e73df; /* Biru sesuai tema header berita */
      border-left: 5px solid #f1c40f;
      padding-left: 15px;
      margin-bottom: 30px;
    }

    .form-label { font-weight: 600; color: #333; }
    
    .current-image-box {
      background: #f8f9fc;
      border: 1px dashed #d1d3e2;
      padding: 15px;
      border-radius: 10px;
      margin-bottom: 15px;
    }

    .btn-update {
      background: #4e73df;
      color: white;
      border-radius: 50px;
      padding: 12px 35px;
      font-weight: 700;
      border: none;
      transition: 0.3s;
    }

    .btn-update:hover { background: #224abe; transform: translateY(-2px); }
  </style>
</head>
<body>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-9">
        
        <div class="mb-4">
          <a href="{{ route('berita.index') }}" class="text-decoration-none text-muted">
            <i class="bi bi-arrow-left"></i> Kembali ke Daftar Berita
          </a>
        </div>

        <div class="edit-container">
          <h2 class="section-title">EDIT PUBLIKASI BERITA</h2>

          <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
              <label class="form-label">Judul Berita</label>
              <input type="text" name="judul" class="form-control form-control-lg @error('judul') is-invalid @enderror" 
                     value="{{ old('judul', $berita->judul) }}" required>
              @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-4">
              <label class="form-label">Isi Berita Lengkap</label>
              <textarea name="isi" class="form-control @error('isi') is-invalid @enderror" 
                        rows="12" required>{{ old('isi', $berita->isi) }}</textarea>
              @error('isi') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-4">
              <label class="form-label">Ganti Gambar (Opsional)</label>
              
              @if($berita->gambar)
                <div class="current-image-box">
                  <small class="text-muted d-block mb-2">Gambar Saat Ini:</small>
                  <img src="{{ asset('storage/' . $berita->gambar) }}" style="max-height: 150px; border-radius: 5px;">
                </div>
              @endif

              <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror">
              <small class="text-muted mt-1 d-block">Biarkan kosong jika tidak ingin mengganti gambar.</small>
            </div>

            <div class="text-end border-top pt-4">
              <button type="submit" class="btn btn-update">
                <i class="bi bi-save2 me-2"></i> PERBARUI BERITA
              </button>
            </div>

          </form>
        </div>

      </div>
    </div>
  </div>

</body>
</html>