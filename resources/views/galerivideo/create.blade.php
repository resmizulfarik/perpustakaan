<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Video - Perpustakaan SMA Negeri 7 Sijunjung</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body { 
            background-color: #f8f9fa; 
            font-family: 'Poppins', sans-serif; 
        }
        .card-form { 
            border: none; 
            border-radius: 20px; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.05); 
        }
        .card-header {
            background-color: transparent !important;
            border-bottom: 1px solid #eee;
            padding: 25px;
        }
        .form-label { 
            font-weight: 600; 
            color: #1b2f45; 
        }
        .form-control {
            border-radius: 10px;
            padding: 12px;
            border: 1px solid #dee2e6;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.1);
        }
        /* Style Tombol agar Sama Ukuran dan di Kanan */
        .btn-action { 
            width: 180px; 
            height: 48px; 
            border-radius: 10px; 
            font-weight: 600; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            transition: all 0.3s ease;
        }
        .btn-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .upload-info {
            font-size: 0.85rem;
            color: #6c757d;
            margin-top: 5px;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="mb-4 text-center">
                <h2 class="fw-bold text-dark">Tambah Video Galeri</h2>
                <p class="text-muted">Pilih file video dari laptop untuk menambah koleksi dokumentasi sekolah.</p>
            </div>

            <div class="card card-form">
                <div class="card-body p-4">
                    <form action="{{ route('galeri-video.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Judul Video</label>
                            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" 
                                   value="{{ old('judul') }}" placeholder="Contoh: Kegiatan Literasi Siswa" required>
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Pilih File Video (MP4/MKV)</label>
                            <input type="file" name="video" class="form-control @error('video') is-invalid @enderror" 
                                   accept="video/mp4,video/x-m4v,video/*" required>

                             <div class="mb-3">
                                <label class="form-label fw-bold">Tanggal Kegiatan</label>
                                <input type="date" name="tanggal" class="form-control" required>
                            </div>
                            
                            <div class="upload-info">
                                <i class="fas fa-info-circle me-1"></i> Pilih file video langsung dari laptop kamu. Maksimal 50MB.
                            </div>
                            
                            @error('video')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Deskripsi Video</label>
                            <textarea name="deskripsi" class="form-control" rows="4" 
                                      placeholder="Tuliskan keterangan singkat mengenai isi video ini...">{{ old('deskripsi') }}</textarea>
                        </div>

                        <div class="d-flex justify-content-end gap-3 pt-3 border-top">
                            <a href="{{ route('galeri-video.index') }}" class="btn btn-secondary btn-action shadow-sm">
                                <i class="fas fa-times me-2"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-primary btn-action shadow-sm">
                                <i class="fas fa-upload me-2"></i> Upload Video
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>