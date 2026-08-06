<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struktur Organisasi - Perpustakaan SMA Negeri 7 Sijunjung</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&family=Montserrat:wght@700&display=swap" rel="stylesheet">
    
    <style>
        body { background-color: #f4f7f6; font-family: 'Open Sans', sans-serif; }
        
        /* NAVBAR */
        .navbar-custom {
            background-color: #1b2f45;
            padding: 12px 0;
            position: relative;
            z-index: 10;
        }
        .navbar-brand-custom {
            display: flex; align-items: center; color: white; text-decoration: none;
        }
        .navbar-brand-custom img { width: 45px; margin-right: 15px; }
        .brand-text h4 { margin: 0; font-weight: 700; font-size: 1.1rem; color: white; }
        .brand-text p { margin: 0; font-size: 0.7rem; color: #f1c40f; text-transform: uppercase; font-weight: 600; }

        /* BREADCRUMBS */
        .breadcrumbs {
            background-image: url('/assets/img/perpus3.jpg'); 
            background-size: cover; background-position: center;
            padding: 100px 0 60px 0; position: relative; color: white; text-align: center;
        }
        .breadcrumbs::before {
            content: ""; position: absolute; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.6); z-index: 1;
        }
        .breadcrumbs .container { position: relative; z-index: 2; }

        /* BAGAN STRUKTUR */
        .tree ul {
            padding-top: 20px; position: relative;
            display: flex; justify-content: center;
        }
        .tree li {
            text-align: center; list-style-type: none;
            position: relative; padding: 20px 5px 0 5px;
        }
        .tree li::before, .tree li::after {
            content: ''; position: absolute; top: 0; right: 50%;
            border-top: 2px solid #ccc; width: 50%; height: 20px;
        }
        .tree li::after { right: auto; left: 50%; border-left: 2px solid #ccc; }
        .tree li:only-child::after, .tree li:only-child::before { display: none; }
        .tree li:only-child { padding-top: 0; }
        .tree li:first-child::before, .tree li:last-child::after { border: 0 none; }
        .tree li:last-child::before { border-right: 2px solid #ccc; border-radius: 0 5px 0 0; }
        .tree li:first-child::after { border-radius: 5px 0 0 0; }
        .tree ul ul::before {
            content: ''; position: absolute; top: 0; left: 50%;
            border-left: 2px solid #ccc; width: 0; height: 20px;
        }

        /* KOTAK PERSONIL */
        .person-card {
            border: 2px solid #7fb685;
            background: #d4edda;
            padding: 10px; text-decoration: none;
            color: #155724; font-size: 12px; display: inline-block;
            border-radius: 8px; min-width: 200px; position: relative;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }
        .person-card img {
            width: 55px; height: 65px; float: left; margin-right: 12px;
            border: 1px solid #7fb685; object-fit: cover; border-radius: 4px;
        }
        .person-card .jabatan { 
            font-weight: bold; background: #28a745; color: white; 
            display: block; padding: 3px 8px; margin-bottom: 8px; 
            font-size: 10px; text-transform: uppercase; border-radius: 4px;
        }
        .person-card .nama { font-weight: 700; display: block; font-size: 13px; text-align: left; }
        
        /* ACTIONS: Hanya muncul jika ada interaksi/hover dan user adalah ADMIN */
        .actions { margin-top: 10px; padding-top: 5px; border-top: 1px solid rgba(0,0,0,0.1); }
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

    <div class="breadcrumbs">
        <div class="container">
            <h2>Struktur Organisasi</h2>
            <p><a href="/" style="color: #f1c40f; text-decoration: none; font-weight: bold;">Home</a> <span style="color: white;"> / Struktur</span></p>
        </div>
    </div>

    <div class="container mt-5 mb-5">
        <div class="tree">
            <ul>
                <li>
                    @php 
                        $kepala = $staff->where('urutan', 1)->first(); 
                        $anggota = $staff->where('urutan', '>', 1);
                    @endphp

                    @if($kepala)
                        <div class="person-card">
                            <span class="jabatan">{{ $kepala->jabatan ?? 'Jabatan' }}</span>
                            <img src="{{ $kepala->foto ? asset('assets/img/organisasi/'.$kepala->foto) : 'https://via.placeholder.com/55x65' }}">
                            <div class="info">
                                <span class="nama">{{ $kepala->nama ?? 'Nama Belum Diisi' }}</span>
                            </div>
                            
                            {{-- AKSI ADMIN --}}
                            @auth
                            <div class="actions">
                                <a href="{{ route('organisasi.edit', $kepala->id) }}" class="btn btn-warning py-0 px-2" style="font-size: 10px;">Edit</a>
                                <form action="{{ route('organisasi.destroy', $kepala->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger py-0 px-2" style="font-size: 10px;" onclick="return confirm('Hapus?')">Hapus</button>
                                </form>
                            </div>
                            @endauth
                        </div>

                        @if($anggota->count() > 0)
                            <ul>
                                @foreach($anggota as $item)
                                    <li>
                                        <div class="person-card">
                                            <span class="jabatan">{{ $item->jabatan ?? 'Jabatan' }}</span>
                                            <img src="{{ $item->foto ? asset('assets/img/organisasi/'.$item->foto) : 'https://via.placeholder.com/55x65' }}">
                                            <div class="info">
                                                <span class="nama">{{ $item->nama ?? 'Tanpa Nama' }}</span>
                                            </div>

                                            {{-- AKSI ADMIN --}}
                                            @auth
                                            <div class="actions">
                                                <a href="{{ route('organisasi.edit', $item->id) }}" class="btn btn-warning py-0 px-2" style="font-size: 10px;">Edit</a>
                                                <form action="{{ route('organisasi.destroy', $item->id) }}" method="POST" class="d-inline">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn btn-danger py-0 px-2" style="font-size: 10px;" onclick="return confirm('Hapus?')">Hapus</button>
                                                </form>
                                            </div>
                                            @endauth
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    @else
                        <div class="alert alert-warning">Data pimpinan (Urutan 1) belum tersedia.</div>
                    @endif
                </li>
            </ul>
        </div>

        {{-- TOMBOL TAMBAH HANYA UNTUK ADMIN --}}
        @auth
        <div class="text-center mt-5">
            <a href="{{ route('organisasi.create') }}" class="btn btn-success fw-bold px-4 py-2 shadow-sm">
                <i class="fa fa-plus-circle me-2"></i> Tambah Data Personil
            </a>
        </div>
        @endauth
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>