<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Foto - Perpustakaan SMA Negeri 7 Sijunjung</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <style>
        body { background-color: #f8f9fa; font-family: 'Poppins', sans-serif; color: #333; margin: 0; padding: 0; }
        
        /* NAVBAR UTAMA - Dibuat sangat tinggi z-indexnya agar tidak tertutup */
        .navbar-custom { 
            background-color: #1b2f45; 
            padding: 12px 0; 
            position: relative; 
            z-index: 9999 !important; 
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .navbar-brand-custom { display: flex; align-items: center; color: white; text-decoration: none; }
        .navbar-brand-custom img { width: 45px; margin-right: 15px; }
        .brand-text h4 { margin: 0; font-weight: 700; font-size: 1.1rem; color: white; }
        .brand-text p { margin: 0; font-size: 0.7rem; color: #f1c40f; text-transform: uppercase; font-weight: 600; }

        /* MENU NAVIGASI & DROPDOWN */
        .nav-menu-wrapper { list-style: none; margin: 0; padding: 0; display: flex; align-items: center; }
        .nav-item-dropdown { position: relative; }
        
        .galeri-trigger { 
            color: white !important; 
            text-decoration: none !important; 
            font-weight: 600; 
            font-size: 14px; 
            text-transform: uppercase; 
            padding: 15px 20px;
            display: block; 
            cursor: pointer !important;
        }

        .dropdown-custom {
            display: none; 
            position: absolute; 
            top: 100%; 
            left: 0;
            background-color: #1b2f45; 
            min-width: 180px; 
            padding: 10px 0;
            list-style: none; 
            border-radius: 0 0 8px 8px; 
            box-shadow: 0 8px 20px rgba(0,0,0,0.4); 
            z-index: 10000 !important;
        }

        .dropdown-custom li a {
            color: white !important; 
            padding: 10px 25px; 
            display: block;
            text-decoration: none; 
            font-size: 13px;
            transition: 0.3s;
        }

        .dropdown-custom li a:hover { 
            background-color: #f1c40f; 
            color: #1b2f45 !important; 
        }

        /* Hover memicu dropdown */
        .nav-item-dropdown:hover .dropdown-custom { display: block; }

        /* BANNER - Layer paling bawah */
        .header-bg {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover; 
            background-position: center;
            padding: 100px 0 60px; 
            color: white; 
            text-align: center;
            position: relative;
            z-index: 1; 
        }

        .breadcrumb-custom { color: #f1c40f; font-size: 0.9rem; margin-top: 10px; }
        .breadcrumb-custom span { color: white; }

        /* FORM CARD - Layer menengah */
        .form-card {
            border: none; 
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            margin-top: -60px; /* Ini yang tadi menutupi menu */
            background: #fff; 
            padding: 40px;
            position: relative;
            z-index: 10; 
        }
        
        .form-label { font-weight: 600; color: #1b2f45; margin-bottom: 8px; }
        .form-control { border-radius: 8px; padding: 12px; border: 1px solid #dee2e6; }
        .btn-primary { background-color: #0d6efd; border: none; padding: 12px 30px; border-radius: 8px; font-weight: 600; transition: 0.3s; }
        .btn-secondary { padding: 12px 30px; border-radius: 8px; font-weight: 600; }
    </style>
</head>
<body>

<nav class="navbar-custom shadow-sm">
    <div class="container d-flex justify-content-between align-items-center">
        <a class="navbar-brand-custom" href="/">
            <img src="{{ asset('assets/img/logo_sekolah.png') }}" alt="Logo">
            <div class="brand-text">
                <h4>PERPUSTAKAAN</h4>
                <p>SMA NEGERI 7 SIJUNJUNG</p>
            </div>
        </a>

        <ul class="nav-menu-wrapper">
                <li class="nav-item-dropdown">
                    <a href="javascript:void(0)" class="galeri-trigger">
                        Galeri <i class="fas fa-chevron-down ms-1" style="font-size: 0.7rem;"></i>
                    </a>
                    <ul class="dropdown-custom">
                        <li><a href="/galeri-foto">Galeri Foto</a></li>
                        <li><a href="/galeri-video">Galeri Video</a></li>
                    </ul>
                </li>
        </ul>
    </div>
</nav>

<div class="header-bg">
    <div class="container">
        <h1 class="fw-bold display-5">Tambah Foto</h1>
        <div class="breadcrumb-custom">
            Home <span class="mx-2">/</span> <span>Tambah Galeri</span>
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

                <form action="{{ route('galeri-foto.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <label class="form-label">Judul Foto</label>
                            <input type="text" name="judul" class="form-control shadow-sm" placeholder="Contoh: Library atau Kegiatan Membaca" value="{{ old('judul') }}" required>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="form-label">Tanggal Kegiatan</label>
                            <input type="date" name="tanggal" class="form-control shadow-sm" value="{{ old('tanggal', date('Y-m-d')) }}" required>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="form-label">Pilih Foto</label>
                            <input type="file" name="foto" class="form-control shadow-sm" required>
                            <small class="text-muted mt-1 d-block"><i class="fas fa-info-circle me-1"></i>Maksimal 2MB (JPG, PNG)</small>
                        </div>

                        <div class="col-md-12 mb-4">
                            <label class="form-label">Deskripsi Singkat</label>
                            <textarea name="deskripsi" class="form-control shadow-sm" rows="4" placeholder="Tuliskan keterangan tentang kegiatan ini...">{{ old('deskripsi') }}</textarea>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-3 mt-4">
                        <a href="{{ route('galeri-foto.index') }}" 
                           class="btn btn-secondary d-flex align-items-center justify-content-center" 
                           style="width: 180px; height: 45px; border-radius: 10px; font-weight: 600;">
                            <i class="fas fa-times me-2"></i> Batal
                        </a>

                        <button type="submit" 
                                class="btn btn-primary d-flex align-items-center justify-content-center" 
                                style="width: 180px; height: 45px; border-radius: 10px; font-weight: 600;">
                            <i class="fas fa-save me-2"></i> Simpan ke Galeri
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