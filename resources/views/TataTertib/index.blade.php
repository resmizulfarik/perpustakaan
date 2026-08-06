<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tata Tertib - Perpustakaan SMA Negeri 7 Sijunjung</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body { background-color: #f8f9fa; font-family: 'Poppins', sans-serif; color: #333; }
        .navbar-custom { background-color: #1b2f45; padding: 12px 0; }
        .navbar-brand-custom { display: flex; align-items: center; color: white; text-decoration: none; }
        .navbar-brand-custom img { width: 45px; margin-right: 15px; }
        .brand-text h4 { margin: 0; font-weight: 700; font-size: 1.1rem; color: white; }
        .brand-text p { margin: 0; font-size: 0.7rem; color: #f1c40f; text-transform: uppercase; font-weight: 600; }

        .header-bg {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('/assets/img/perpus3.jpg');
            background-size: cover; background-position: center;
            padding: 100px 0 50px; color: white; text-align: center;
        }

        .content-section { padding: 60px 0; }
        .rules-card {
            border: none; box-shadow: 0 10px 40px rgba(0,0,0,0.08);
            border-radius: 20px; padding: 40px; background: #fff;
        }

        .rule-category-title {
            font-size: 1.25rem; font-weight: 800; color: #1b2f45;
            border-bottom: 3px solid #f1c40f; padding-bottom: 5px;
            margin-top: 30px; margin-bottom: 20px; display: inline-block;
        }

        .rule-item {
            position: relative; padding: 10px 15px;
            border-radius: 8px; transition: 0.3s;
            display: flex; justify-content: space-between; align-items: flex-start;
        }
        .rule-item:hover { background-color: #f1f4f9; }
        .rule-text { flex: 1; line-height: 1.6; }
        
        /* Actions (Hanya muncul saat hover) */
        .rule-actions { display: none; margin-left: 15px; white-space: nowrap; }
        .rule-item:hover .rule-actions { display: flex; gap: 5px; }
        .btn-xs { padding: 1px 8px; font-size: 0.7rem; border-radius: 4px; }
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
        <h1 class="display-6 fw-bold">Tata Tertib</h1>
        <p class="mb-0"><a href="/" style="color: #f1c40f; text-decoration: none;">Home</a> / Tata Tertib</p>
    </div>
</div>

<div class="content-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                
                @if(session('success'))
                    <div class="alert alert-success border-0 shadow-sm mb-4">
                        <i class="fa fa-check-circle me-2"></i> {{ session('success') }}
                    </div>
                @endif

                <div class="rules-card">
                    <div class="text-center mb-5">
                        <h3 class="fw-bold">PERATURAN PERPUSTAKAAN</h3>
                        <p class="text-muted">SMA NEGERI 7 SIJUNJUNG</p>
                    </div>

                    @forelse($tata_tertibs->groupBy('kategori') as $kategori => $items)
                        <div class="rule-category-title text-uppercase">{{ $kategori }}</div>
                        
                        @foreach($items as $index => $item)
                        <div class="rule-item">
                            <div class="rule-text">
                                <strong>{{ $loop->iteration }}.</strong> {{ $item->isi_aturan }}
                            </div>
                            
                            {{-- LOGIKA: Hanya tampilkan tombol edit/hapus jika user sudah login --}}
                            @auth
                            <div class="rule-actions">
                                <a href="{{ route('TataTertib.edit', $item->id) }}" class="btn btn-xs btn-warning">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('TataTertib.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus aturan ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-xs btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                            @endauth
                        </div>
                        @endforeach
                    @empty
                        <div class="text-center py-5">
                            <p class="text-muted">Belum ada data tata tertib.</p>
                        </div>
                    @endforelse
                </div>

                {{-- LOGIKA: Hanya tampilkan tombol Tambah jika user sudah login --}}
                @auth
                <div class="text-center mt-5">
                    <a href="{{ route('TataTertib.create') }}" class="btn btn-primary px-4 shadow">
                        <i class="fa fa-plus-circle me-2"></i> Tambah Aturan Baru
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