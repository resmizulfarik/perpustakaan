<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Perpustakaan - Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body { background-color: #f8f9fa; font-family: 'Poppins', sans-serif; }
        
        /* --- NAVBAR STYLE --- */
        .navbar-custom {
            background-color: #1b2f45;
            padding: 12px 0;
        }
        .navbar-brand-custom {
            display: flex;
            align-items: center;
            color: white;
            text-decoration: none;
        }
        .navbar-brand-custom img {
            width: 45px;
            margin-right: 15px;
        }
        .brand-text h4 {
            margin: 0;
            font-weight: 700;
            font-size: 1.1rem;
            letter-spacing: 1px;
            color: white;
        }
        .brand-text p {
            margin: 0;
            font-size: 0.7rem;
            color: #f1c40f;
            text-transform: uppercase;
            font-weight: 600;
        }

        /* Header & Breadcrumbs */
        .header-bg {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('/assets/img/perpus3.jpg');
            background-size: cover; 
            background-position: center;
            padding: 100px 0 50px; 
            color: white; 
            text-align: center;
        }

        .staff-section { padding: 60px 0; background: #fff; }

        /* Style List Staff */
        .staff-item {
            display: flex;
            align-items: center;
            gap: 30px;
            margin-bottom: 35px;
            padding-bottom: 30px;
            border-bottom: 1px solid #f1f1f1;
        }
        .staff-item:last-child { border-bottom: none; }

        .staff-photo-container {
            flex: 0 0 140px; 
        }
        
        .staff-photo {
            width: 140px;
            height: 180px; 
            object-fit: cover;
            border-radius: 12px; 
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            transition: transform 0.3s ease;
        }
        .staff-photo:hover { transform: scale(1.03); }

        .staff-info { flex: 1; }
        
        .staff-info h5 { 
            color: #555; 
            font-weight: 700; 
            text-transform: uppercase; 
            letter-spacing: 1.2px;
            margin-bottom: 6px;
            font-size: 0.85rem;
        }
        
        .staff-info h3 { 
            font-weight: 700; 
            color: #1a1a1a; 
            margin-bottom: 5px; 
            font-size: 1.35rem;
        }
        
        .staff-info p.nip { 
            font-size: 0.85rem;
            color: #777; 
            background: #f1f3f5;
            display: inline-block;
            padding: 4px 14px;
            border-radius: 50px;
            margin-bottom: 15px;
        }

        .admin-actions { display: flex; gap: 8px; }
        .btn-sm { font-size: 0.75rem; border-radius: 6px; }

        @media (max-width: 768px) {
            .staff-item { flex-direction: column; text-align: center; }
            .staff-photo-container { flex: 0 0 auto; }
            .admin-actions { justify-content: center; }
        }
    </style>
</head>
<body>

<nav class="navbar-custom">
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
        <h1 class="display-6 fw-bold">Staff Perpustakaan</h1>
        <p class="mb-0">
            <a href="/" style="color: #f1c40f; text-decoration: none; font-weight: 600;">Home</a> 
            <span style="color: #ddd;"> / Staff</span>
        </p>
    </div>
</div>

<div class="staff-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-5" role="alert">
                        <i class="fa fa-check-circle me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @foreach($staff as $item)
                <div class="staff-item">
                    <div class="staff-photo-container">
                        <img src="{{ $item->foto ? asset('assets/img/staff/'.$item->foto) : 'https://via.placeholder.com/140x180?text=No+Photo' }}" 
                             class="staff-photo" alt="{{ $item->nama }}">
                    </div>
                    
                    <div class="staff-info">
                        <h5>{{ $item->jabatan }}</h5>
                        <h3>{{ $item->nama }}</h3>
                        <p class="nip">NIP. {{ $item->nip ?? '-' }}</p>

                        {{-- TOMBOL EDIT/HAPUS HANYA UNTUK ADMIN --}}
                        @auth
                        <div class="admin-actions">
                            <a href="{{ route('staff.edit', $item->id) }}" class="btn btn-sm btn-outline-warning">
                                <i class="fa fa-edit me-1"></i> Edit
                            </a>
                            <form action="{{ route('staff.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus data staff ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="fa fa-trash me-1"></i> Hapus
                                </button>
                            </form>
                        </div>
                        @endauth
                    </div>
                </div>
                @endforeach

                {{-- TOMBOL TAMBAH HANYA UNTUK ADMIN --}}
                @auth
                <div class="text-center mt-5 pt-4">
                    <a href="{{ route('staff.create') }}" class="btn btn-primary px-4 py-2 shadow-sm">
                        <i class="fa fa-plus-circle me-2"></i> Tambah Staff Baru
                    </a>
                </div>
                @endauth

            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>