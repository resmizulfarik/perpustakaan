<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Foto - Perpustakaan SMA Negeri 7 Sijunjung</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <style>
        body { background-color: #f8f9fa; font-family: 'Poppins', sans-serif; color: #333; }
        
        /* Navbar Header */
        .navbar-custom { background-color: #1b2f45; padding: 12px 0; }
        .navbar-brand-custom { display: flex; align-items: center; color: white; text-decoration: none; }
        .navbar-brand-custom img { width: 45px; margin-right: 15px; }
        .brand-text h4 { margin: 0; font-weight: 700; font-size: 1.1rem; color: white; }
        .brand-text p { margin: 0; font-size: 0.7rem; color: #f1c40f; text-transform: uppercase; font-weight: 600; }

        /* Header Banner (Sesuai Screenshot) */
        .header-bg {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover; background-position: center;
            padding: 100px 0 60px; color: white; text-align: center;
        }
        .breadcrumb-custom { color: #f1c40f; font-size: 0.9rem; margin-top: 10px; }
        .breadcrumb-custom span { color: white; }

        /* Form Styling */
        .form-card {
            border: none; border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            margin-top: -60px;
            background: #fff; padding: 40px;
        }
        
        .form-label { font-weight: 600; color: #1b2f45; margin-bottom: 8px; }
        .form-control { border-radius: 8px; padding: 12px; border: 1px solid #dee2e6; }
        
        .btn-primary { background-color: #0d6efd; border: none; padding: 12px 30px; border-radius: 8px; font-weight: 600; }
        .btn-secondary { padding: 12px 30px; border-radius: 8px; font-weight: 600; }
        
        .current-photo-box {
            background-color: #f1f3f5;
            padding: 15px;
            border-radius: 10px;
            border: 1px dashed #ced4da;
        }
    </style>
</head>
<body>

<nav class="navbar-custom shadow-sm">
    <div class="container">
        <a class="navbar-brand-custom" href="/">
            <img src="{{ asset('assets/img/logo_sekolah.png') }}" alt="Logo">
            <div class="brand-text">
                <h4>PERPUSTAKAAN</h4>
                <p>SMA NEGERI 7 SIJUNJUNG</p>
            </div>
        </a>
    </div>
</nav>

<div class="header-bg">
    <div class="container">
        <h1 class="fw-bold display-5">Edit Foto Galeri</h1>
        <div class="breadcrumb-custom">
            Home <span class="mx-2">/</span> <span>Edit Data</span>
        </div>
    </div>
</div>

<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="form-card">
                
                @if ($errors->any())
                    <div class="alert alert-danger border-0 shadow-sm mb-4">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li><i class="fas fa-exclamation-circle me-2"></i>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('galeri-foto.update', $foto->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <label class="form-label">Judul Foto</label>
                            <input type="text" name="judul" class="form-control shadow-sm" value="{{ old('judul', $foto->judul) }}" required>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="form-label">Tanggal Kegiatan</label>
                            <input type="date" name="tanggal" class="form-control shadow-sm" value="{{ old('tanggal', $foto->tanggal) }}" required>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="form-label">Ganti Foto (Opsional)</label>
                            <input type="file" name="foto" class="form-control shadow-sm">
                            <small class="text-muted mt-1 d-block">Max 2MB (JPG, PNG). Biarkan kosong jika tidak diganti.</small>
                        </div>

                        <div class="col-md-12 mb-4">
                            <label class="form-label d-block">Foto Saat Ini</label>
                            <div class="current-photo-box text-center">
                                <img src="{{ asset('storage/' . $foto->foto) }}" alt="Preview" class="img-fluid rounded shadow-sm" style="max-height: 250px;">
                            </div>
                        </div>

                        <div class="col-md-12 mb-4">
                            <label class="form-label">Deskripsi Singkat</label>
                            <textarea name="deskripsi" class="form-control shadow-sm" rows="4">{{ old('deskripsi', $foto->deskripsi) }}</textarea>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items: center border-top pt-4">
                        <a href="{{ route('galeri-foto.index') }}" class="btn btn-secondary text-white">
                            <i class="fa fa-times me-2"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-primary shadow">
                            <i class="fa fa-sync me-2"></i> Perbarui Data
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>