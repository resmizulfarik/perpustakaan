<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visi dan Misi - Perpustakaan</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,300&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        body { font-family: 'Open Sans', sans-serif; color: #444; }
        
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

        .breadcrumbs {
            background-image: url('/assets/img/perpus3.jpg'); 
            background-size: cover;
            background-position: center;
            padding: 120px 0 60px 0;
            position: relative;
            color: white;
            text-align: center;
        }
        .breadcrumbs::before {
            content: "";
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: 1;
        }
        .breadcrumbs .container { position: relative; z-index: 2; }
        .breadcrumbs h2 { font-size: 48px; font-weight: 700; margin-bottom: 10px; font-family: 'Montserrat', sans-serif; }
        .breadcrumbs ol { display: flex; justify-content: center; list-style: none; padding: 0; font-size: 16px; }
        .breadcrumbs ol li a { color: #f1c40f; text-decoration: none; }
        .breadcrumbs ol li::before { content: "/"; padding: 0 10px; color: #fff; }
        .breadcrumbs ol li:first-child::before { content: ""; }

        .content-card {
            background: #fff;
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.05);
            margin-top: -50px;
            position: relative;
            z-index: 3;
        }
        .section-title { font-weight: 700; color: #1b2f45; margin-bottom: 30px; border-left: 5px solid #f1c40f; padding-left: 20px; }
        .misi-text { white-space: pre-line; line-height: 2; font-size: 17px; }
    </style>
</head>
<body class="bg-light">

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

    <div class="breadcrumbs">
        <div class="container">
            <h2>Visi dan Misi</h2>
            <ol>
                <li><a href="/">Home</a></li>
                <li>Visi dan Misi</li>
            </ol>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="content-card">

                    {{-- Notifikasi Sukses --}}
                    @if(session('success'))
                        <div class="alert alert-success border-0 shadow-sm mb-4">
                            <i class="fa fa-check-circle me-2"></i> {{ session('success') }}
                        </div>
                    @endif

                    <div class="text-center mb-5">
                        <h2 style="font-weight: 700; color: #1b2f45;">Our Vision & Mission</h2>
                        <div style="width: 60px; height: 3px; background: #f1c40f; margin: 0 auto;"></div>
                    </div>

                    @if($data)
                        <div class="mb-5">
                            <h4 class="section-title">VISI</h4>
                            <p class="fs-5 fst-italic px-4">"{{ $data->visi }}"</p>
                        </div>

                        <div>
                            <h4 class="section-title">MISI</h4>
                            <div class="misi-text px-4">
                                {!! nl2br(e($data->misi)) !!}
                            </div>
                        </div>

                        {{-- TOMBOL AKSI: HANYA MUNCUL JIKA SUDAH LOGIN --}}
                        @auth
                        <div class="text-end mt-5 pt-4 border-top d-flex justify-content-end gap-2">
                            <form action="{{ route('visimisi.destroy', $data->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger px-4 fw-bold" style="width: 150px;">Hapus Data</button>
                            </form>

                            <a href="{{ route('visimisi.edit', $data->id) }}" class="btn btn-warning px-4 fw-bold" style="width: 150px;">Edit Data</a>
                        </div>
                        @endauth

                    @else
                        <div class="text-center py-5">
                            <p class="text-muted">Data Visi dan Misi belum tersedia.</p>
                            @auth
                                <a href="{{ route('visimisi.create') }}" class="btn btn-primary">Tambah Data</a>
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>