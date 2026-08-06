<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Video - Perpustakaan SMA Negeri 7 Sijunjung</title>
    
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
        .form-label { 
            font-weight: 600; 
            color: #1b2f45; 
        }
        .form-control {
            border-radius: 10px;
            padding: 12px;
            border: 1px solid #dee2e6;
        }
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
        }
        /* Preview Video Styling */
        .preview-container {
            border-radius: 15px;
            overflow: hidden;
            background: #000;
            border: 2px solid #ffc107;
        }
        video {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="mb-4 text-center">
                <h2 class="fw-bold text-dark">Edit Data Video</h2>
                <p class="text-muted">Perbarui informasi atau ganti file video melalui formulir di bawah ini.</p>
            </div>

            <div class="card card-form">
                <div class="card-body p-4">
                    <form action="{{ route('galeri-video.update', $video->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Judul Video</label>
                            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" 
                                   value="{{ old('judul', $video->judul) }}" required>
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Ganti File Video (Opsional)</label>
                            <input type="file" name="video" class="form-control @error('video') is-invalid @enderror" 
                                   accept="video/mp4,video/x-m4v,video/*">
                            <small class="text-muted">Biarkan kosong jika tidak ingin mengganti file video.</small>
                            @error('video')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Deskripsi Video</label>
                            <textarea name="deskripsi" class="form-control" rows="4">{{ old('deskripsi', $video->deskripsi) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label d-block text-muted small mb-2">
                                <i class="fas fa-play-circle me-1"></i> Video Saat Ini:
                            </label>
                            <div class="preview-container shadow-sm">
                                <video controls>
                                    <source src="{{ asset('storage/videos/' . $video->video) }}" type="video/mp4">
                                    Browser Anda tidak mendukung preview video.
                                </video>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-3 pt-3 border-top">
                            <a href="{{ route('galeri-video.index') }}" class="btn btn-secondary btn-action shadow-sm">
                                <i class="fas fa-times me-2"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-warning btn-action shadow-sm text-dark">
                                <i class="fas fa-sync-alt me-2"></i> Perbarui Video
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