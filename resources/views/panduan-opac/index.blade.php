<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panduan OPAC - Perpustakaan SMA 7 Sijunjung</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #0f0f0f; /* Background gelap astetik */
            color: #ffffff;
            overflow-x: hidden;
        }
        
        /* Container Standar agar tidak terlalu lebar */
        .container-standar {
            max-width: 800px; 
        }

        .main-title {
            color: #ffc107; /* Warna emas mewah */
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-size: 1.8rem;
        }

        .card-custom {
            border: 1px solid rgba(255, 193, 7, 0.3);
            border-radius: 15px;
            background-color: #1a1a1a; /* Card hitam */
            box-shadow: 0 10px 30px rgba(0,0,0,0.7);
        }

        .step-number {
            width: 35px;
            height: 35px;
            background: #ffc107;
            color: #000;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            font-weight: 800;
            flex-shrink: 0;
            font-size: 1rem;
        }

        .instruction-title {
            color: #ffc107;
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .instruction-text {
            color: #cccccc;
            font-size: 0.9rem;
            line-height: 1.5;
        }

        .btn-gold {
            background-color: #ffc107;
            color: #000;
            border: none;
            padding: 12px 35px;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.9rem;
            transition: 0.3s;
            letter-spacing: 1px;
        }

        .btn-gold:hover {
            background-color: #e0a800;
            transform: translateY(-2px);
            color: #000;
            box-shadow: 0 5px 15px rgba(255, 193, 7, 0.3);
        }

        .back-link {
            color: #ffc107;
            font-size: 0.9rem;
            text-decoration: none;
            transition: 0.2s;
            font-weight: 600;
        }

        .back-link:hover { color: #fff; }

        hr { border-top: 1px solid #333; opacity: 0.6; }
    </style>
</head>
<body>

<div class="container container-standar py-5">
    <div class="mb-4">
        <a href="/" class="back-link">
            <i class="bi bi-arrow-left-circle-fill me-2"></i> Kembali ke Beranda
        </a>
    </div>

    <div class="text-center mb-5">
        <h1 class="main-title mb-1">Panduan Penggunaan OPAC</h1>
        <p class="text-muted small">Online Public Access Catalog</p>
        <div class="mx-auto" style="width: 60px; height: 3px; background: #ffc107; border-radius: 10px;"></div>
    </div>

    <div class="card card-custom p-4 p-md-5">
        <h5 class="fw-bold mb-4 text-white">
            <i class="bi bi-info-circle-fill text-warning me-2"></i> Langkah-langkah Pencarian:
        </h5>
        
        <div class="d-flex mb-4">
            <div class="step-number me-4">1</div>
            <div>
                <div class="instruction-title">Akses Sistem OPAC</div>
                <p class="instruction-text">Gunakan komputer yang tersedia di area perpustakaan atau klik tombol cari di bawah untuk memulai pencarian digital.</p>
            </div>
        </div>

        <div class="d-flex mb-4">
            <div class="step-number me-4">2</div>
            <div>
                <div class="instruction-title">Masukan Kata Kunci</div>
                <p class="instruction-text">Ketikkan judul buku, nama pengarang, atau subjek yang Anda cari pada kolom pencarian yang tersedia.</p>
            </div>
        </div>

        <div class="d-flex mb-2">
            <div class="step-number me-4">3</div>
            <div>
                <div class="instruction-title">Catat Nomor Panggil</div>
                <p class="instruction-text">Setelah menemukan buku, catat <strong>Nomor Panggil (Call Number)</strong> untuk memudahkan Anda menemukan lokasi fisik buku di rak.</p>
            </div>
        </div>

        <hr class="my-5">

        <div class="text-center">
            <p class="text-secondary small mb-4">Siap untuk mencari koleksi favorit Anda?</p>
            <a href="#" class="btn btn-gold rounded-pill shadow">
                <i class="bi bi-search me-2"></i> Mulai Cari Buku Sekarang
            </a>
        </div>
    </div>

    <footer class="text-center mt-5 text-secondary" style="font-size: 0.8rem;">
        &copy; 2026 PERPUSTAKAAN SMA NEGERI 7 SIJUNJUNG <br>
        <span class="text-muted small">Silakan hubungi petugas jika memerlukan bantuan teknis.</span>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>