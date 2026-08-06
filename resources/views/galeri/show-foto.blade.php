<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $foto->judul }} - SMAN 7 Sijunjung</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body { background-color: #f8f9fa; font-family: 'Poppins', sans-serif; }
        
        /* Banner Utama */
        .page-header {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?auto=format&fit=crop&w=1350&q=80');
            background-size: cover; background-position: center;
            padding: 120px 0; color: white; text-align: center;
        }
        .page-header h1 { font-weight: 700; text-transform: uppercase; letter-spacing: 2px; font-size: 2.5rem; }

        /* Main Content */
        .main-card { background: white; border-radius: 15px; border: none; overflow: hidden; }
        
        /* Action Bar Abu-Abu (Share & Reaksi) */
        .action-bar {
            background: #343a40; color: white; padding: 25px;
            border-radius: 10px; display: flex; justify-content: space-between;
            align-items: center; margin-top: 40px;
        }
        .share-icons .btn { 
            width: 40px; height: 40px; padding: 0; line-height: 40px; 
            border-radius: 5px; color: white; margin-right: 8px; border: none; transition: 0.3s;
        }
        .reaction-item { text-align: center; cursor: pointer; transition: 0.3s; padding: 0 15px; }
        .reaction-item i { display: block; font-size: 1.4rem; margin-bottom: 5px; }
        .reaction-item:hover { color: #f1c40f; }

        /* Sidebar Berita */
        .sidebar-box { 
            padding: 30px; border: none; border-radius: 20px; 
            background: #ffffff; box-shadow: 0 10px 30px rgba(0,0,0,0.05); 
        }
        .sidebar-title { 
            border-left: 6px solid #e67e22; padding-left: 15px; 
            font-weight: 700; margin-bottom: 30px; font-size: 1.3rem;
        }
        .sidebar-title span { color: #e67e22; }

        /* Avatar Inisial Bulat */
        .news-link { text-decoration: none; display: flex; align-items: center; gap: 20px; margin-bottom: 25px; transition: 0.3s; }
        .news-avatar {
            width: 65px; height: 65px; min-width: 65px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-weight: 700; font-size: 1.4rem; color: white;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        }

        .news-info h6 { font-size: 0.95rem; font-weight: 600; margin: 0; color: #2d3436; line-height: 1.4; }
        .news-info small { color: #a4b0be; font-size: 0.8rem; display: block; margin-top: 5px; }

        /* Komentar Section */
        .comment-section h3 { font-weight: 700; margin-bottom: 25px; position: relative; padding-bottom: 10px; border-bottom: 3px solid #1b2f45; width: fit-content; }
        .comment-area { 
            width: 100%; border: 2px solid #f1f2f6; padding: 20px; 
            border-radius: 12px; background: #fdfdfd; font-size: 1rem;
        }
        .btn-send { 
            background: #1b2f45; color: white; padding: 12px 40px; 
            border: none; border-radius: 8px; font-weight: 600; margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="page-header">
    <div class="container">
        <h1>{{ $foto->judul }}</h1>
    </div>
</div>

<div class="container mt-5 mb-5">
    <div class="row g-5">
        
        <div class="col-lg-8">
            <div class="main-card p-4 shadow-sm">
                <img src="{{ asset('storage/'.$foto->foto) }}" class="img-fluid rounded-4 mb-4 w-100 shadow" alt="{{ $foto->judul }}">
                
                <div class="px-2">
                    <p style="font-size: 1.15rem; line-height: 1.9; color: #2d3436;">
                        {{ $foto->deskripsi }}
                    </p>
                </div>

                <div class="action-bar shadow-lg">
                    <div class="share-side">
                        <span class="small d-block mb-3 fw-bold text-uppercase opacity-75">Bagikan :</span>
                        <div class="share-icons">
                            <a href="#" class="btn" style="background: #3b5998;"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="btn" style="background: #25d366;"><i class="fab fa-whatsapp"></i></a>
                            <a href="#" class="btn" style="background: #1da1f2;"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="btn" style="background: #0077b5;"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" class="btn" style="background: #636e72;"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>

                    <div class="d-flex align-items-center">
                        <div class="text-end d-none d-md-block me-4 border-end pe-4 opacity-75">
                            <span class="small fw-bold text-uppercase">Apa Reaksi Anda?</span>
                        </div>
                        <div class="d-flex">
                            <div class="reaction-item">
                                <i class="far fa-thumbs-up"></i>
                                <span class="small fw-bold">0 Suka</span>
                            </div>
                            <div class="reaction-item">
                                <i class="far fa-thumbs-down"></i>
                                <span class="small fw-bold">0</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="comment-section mt-5 px-2">
                    <h3>Komentar</h3>
                    <textarea class="comment-area mt-3" placeholder="Berikan Komentar Anda"></textarea>
                    <button class="btn-send shadow text-uppercase">Kirim Komentar</button>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="sidebar-box shadow">
                <h5 class="sidebar-title">BERITA <span>SMAN 7</span></h5>
                
                <a href="#" class="news-link">
                    <div class="news-avatar shadow" style="background: linear-gradient(135deg, #e67e22, #d35400);">WT</div>
                    <div class="news-info">
                        <h6>Wisuda Tahfizh Quran Angkatan X SMAN 7 Sijunjung</h6>
                        <small><i class="far fa-calendar-alt me-1"></i> Rab, 17 Des 2025</small>
                    </div>
                </a>

                <a href="#" class="news-link">
                    <div class="news-avatar shadow" style="background: linear-gradient(135deg, #3498db, #2980b9);">PS</div>
                    <div class="news-info">
                        <h6>Siswa SMAN 7 Sijunjung Raih Juara Literasi Provinsi</h6>
                        <small><i class="far fa-calendar-alt me-1"></i> Sel, 16 Des 2025</small>
                    </div>
                </a>

                <a href="#" class="news-link">
                    <div class="news-avatar shadow" style="background: linear-gradient(135deg, #2ecc71, #27ae60);">II</div>
                    <div class="news-info">
                        <h6>Himbauan Pengambilan Ijazah Tahun Lulus 2024</h6>
                        <small><i class="far fa-calendar-alt me-1"></i> Kam, 10 Jul 2025</small>
                    </div>
                </a>

                <a href="#" class="news-link">
                    <div class="news-avatar shadow" style="background: linear-gradient(135deg, #9b59b6, #8e44ad);">LS</div>
                    <div class="news-info">
                        <h6>Latihan Dasar Kepemimpinan Siswa (LDKS) OSIS SMAN 7</h6>
                        <small><i class="far fa-calendar-alt me-1"></i> Sen, 01 Des 2025</small>
                    </div>
                </a>

                <a href="#" class="news-link">
                    <div class="news-avatar shadow" style="background: linear-gradient(135deg, #e74c3c, #c0392b);">SB</div>
                    <div class="news-info">
                        <h6>Sumbangan Buku Alumni Untuk Perpustakaan SMAN 7</h6>
                        <small><i class="far fa-calendar-alt me-1"></i> Sab, 22 Nov 2025</small>
                    </div>
                </a>
            </div>

            <div class="sidebar-box mt-4 shadow-sm border">
                <h6 class="fw-bold mb-3">Cari Berita</h6>
                <form action="{{ route('galeri-foto.index') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Ketik kata kunci..." value="{{ request('search') }}">
                        <button class="btn btn-warning" type="submit">
                            <i class="fas fa-search"></i>
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