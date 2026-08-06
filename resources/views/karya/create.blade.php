<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Karya - Perpustakaan SMA N 7 Sijunjung</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body {
            background-color: #f4f7f6;
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        }
        .card-upload {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            overflow: hidden;
        }
        .btn-upload {
            background-color: #dc3545;
            color: white;
            border-radius: 12px;
            padding: 12px;
            font-weight: 600;
            transition: 0.3s;
            border: none;
        }
        .btn-upload:hover {
            background-color: #b02a37;
            color: white;
            transform: translateY(-2px);
        }
        .form-label {
            font-weight: 600;
            color: #495057;
        }
        .header-section {
            background: linear-gradient(135deg, #dc3545 0%, #b02a37 100%);
            color: white;
            padding: 40px 20px;
            text-align: center;
        }
        .input-group-text {
            border-right: none;
        }
        .form-control:focus, .form-select:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.1);
        }
    </style>
</head>
<body>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-7">
                
                {{-- Tombol Kembali --}}
                <div class="mb-4">
                    <a href="{{ route('karya.index') }}" class="btn btn-link text-decoration-none text-danger p-0 fw-bold">
                        <i class="bi bi-arrow-left-circle-fill me-2"></i> Kembali ke Daftar Karya
                    </a>
                </div>

                <div class="card card-upload">
                    {{-- Header --}}
                    <div class="header-section">
                        <i class="bi bi-cloud-arrow-up-fill display-4"></i>
                        <h2 class="fw-bold mt-2 text-uppercase">Publikasikan Karya</h2>
                        <p class="opacity-75 mb-0">Isi detail informasi karya tulis di bawah ini</p>
                    </div>
                    
                    <div class="card-body p-4 p-md-5">
                        
                        {{-- Notifikasi Error Global --}}
                        @if ($errors->any())
                            <div class="alert alert-danger border-0 shadow-sm rounded-3 mb-4">
                                <div class="d-flex">
                                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                    <div>
                                        <ul class="mb-0 small ps-3">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <form action="{{ route('karya.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            {{-- Judul Karya --}}
                            <div class="mb-4">
                                <label for="judul" class="form-label">Judul Karya / Tulisan</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-journal-text text-danger"></i></span>
                                    <input type="text" name="judul" id="judul" 
                                           class="form-control @error('judul') is-invalid @enderror" 
                                           placeholder="Masukkan judul yang menarik..." 
                                           value="{{ old('judul') }}" required autofocus>
                                </div>
                                @error('judul') <div class="small text-danger mt-1">{{ $message }}</div> @enderror
                            </div>

                            {{-- Penulis --}}
                            <div class="mb-4">
                                <label for="penulis" class="form-label">Nama Penulis</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-person-fill text-danger"></i></span>
                                    <input type="text" name="penulis" id="penulis" 
                                           class="form-control @error('penulis') is-invalid @enderror" 
                                           placeholder="Nama lengkap penulis..." 
                                           value="{{ old('penulis') }}" required>
                                </div>
                                @error('penulis') <div class="small text-danger mt-1">{{ $message }}</div> @enderror
                            </div>

                            {{-- Kategori --}}
                            <div class="mb-4">
                                <label for="kategori" class="form-label">Kategori</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-tags-fill text-danger"></i></span>
                                    <select name="kategori" id="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                                        <option value="" disabled {{ old('kategori') ? '' : 'selected' }}>Pilih Kategori...</option>
                                        <option value="guru" {{ old('kategori') == 'guru' ? 'selected' : '' }}>Guru (Pendidik)</option>
                                        <option value="siswa" {{ old('kategori') == 'siswa' ? 'selected' : '' }}>Siswa</option>
                                    </select>
                                </div>
                                @error('kategori') <div class="small text-danger mt-1">{{ $message }}</div> @enderror
                            </div>

                            {{-- Row Upload File --}}
                            <div class="row">
                                {{-- File Cover Gambar (Opsional) --}}
                                <div class="col-md-6 mb-4">
                                    <label for="cover" class="form-label">Cover Gambar <span class="fw-normal text-muted">(Opsional)</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-image-fill text-danger"></i></span>
                                        <input type="file" name="cover" id="cover" 
                                               class="form-control @error('cover') is-invalid @enderror" 
                                               accept="image/*">
                                    </div>
                                    <div class="form-text mt-1" style="font-size: 0.75rem;">Format: JPG, PNG (Max: 2MB)</div>
                                    @error('cover') <div class="small text-danger mt-1">{{ $message }}</div> @enderror
                                </div>

                                {{-- File PDF (Opsional) --}}
                                <div class="col-md-6 mb-4">
                                    <label for="file_pdf" class="form-label">File PDF <span class="fw-normal text-muted">(Opsional)</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-file-earmark-pdf-fill text-danger"></i></span>
                                        <input type="file" name="file_pdf" id="file_pdf" 
                                               class="form-control @error('file_pdf') is-invalid @enderror" 
                                               accept=".pdf">
                                    </div>
                                    <div class="form-text mt-1" style="font-size: 0.75rem;">Format: PDF (Max: 2MB)</div>
                                    @error('file_pdf') <div class="small text-danger mt-1">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            {{-- Info Notice --}}
                            <div class="alert alert-warning border-0 shadow-sm py-3 mb-4 rounded-3">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-info-circle-fill fs-4 me-3 text-warning"></i>
                                    <small class="text-dark">
                                        Anda bisa memilih mengunggah <strong>Cover Gambar saja</strong>, <strong>File PDF saja</strong>, atau <strong>keduanya</strong> sekaligus.
                                    </small>
                                </div>
                            </div>

                            {{-- Submit Buttons --}}
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-upload shadow-sm btn-lg">
                                    <i class="bi bi-send-fill me-2"></i> PUBLIKASIKAN SEKARANG
                                </button>
                                <a href="{{ route('karya.index') }}" class="btn btn-light border-0 text-muted">Batalkan</a>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="text-center mt-4 text-muted">
                    <small>&copy; 2026 Perpustakaan Digital SMA N 7 Sijunjung</small>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>