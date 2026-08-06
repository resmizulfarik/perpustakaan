<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Sejarah - Perpustakaan SMA Negeri 7 Sijunjung</title>

  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
</head>

<body class="page-about">

  <header id="header" class="header d-flex align-items-center fixed-top" style="background: #1b2f45; padding: 15px 0;">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="{{ url('/') }}" class="logo d-flex align-items-center">
        <img src="{{ asset('assets/img/logo_sekolah.png') }}" alt="Logo" style="height: 60px; margin-right: 15px;">
        <h1 class="sitename" style="display: flex; flex-direction: column; line-height: 1.1; margin: 0;">
            <span style="font-weight: 800; font-size: 20px; color: white;">PERPUSTAKAAN</span>
            <span style="font-weight: 400; font-size: 12px; color: #f1c40f;">SMA NEGERI 7 SIJUNJUNG</span>
        </h1>
      </a>
    </div>
  </header>

  <main id="main">
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('{{ asset('assets/img/buku.jpg') }}'); background-size: cover; padding: 140px 0 60px 0; position: relative;">
      <div class="container position-relative d-flex flex-column align-items-center">
        <h2 style="font-size: 48px; font-weight: 700; color: white;">Sejarah</h2>
        <ol style="list-style: none; display: flex; color: #f1c40f; padding: 0;">
          <li><a href="{{ url('/') }}" style="color: #f1c40f; text-decoration: none;">Home</a></li>
          <li style="color: white; margin-left: 10px;">/ Sejarah</li>
        </ol>
      </div>
    </div>

    <section class="about" style="background: #ffffff; padding: 80px 0;">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-12 text-center mb-4">
            <h2 style="color: #1b2f45; font-weight: 700;">Our History</h2>
            <div style="width: 50px; height: 3px; background: #f1c40f; margin: 10px auto;"></div>
          </div>
          
          <div class="col-lg-12">
            <div class="content" style="text-align: justify; line-height: 1.8; color: #444;">
              
              <p>
                @if(isset($dataSejarah))
                    {{ $dataSejarah->isi }}
                @else
                    Perpustakaan SMA Negeri 7 Sijunjung merupakan salah satu sarana pendukung utama dalam proses pembelajaran di sekolah.
                @endif
              </p>

              @if(session('success'))
                  <div class="alert alert-success mt-3 shadow-sm border-0" style="border-left: 5px solid #198754;">
                      <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                  </div>
              @endif

              {{-- BAGIAN YANG DITAMBAHKAN: KHUSUS ADMIN --}}
              @auth
              <div class="mt-5 p-4 border-top d-flex gap-3 justify-content-center bg-light rounded shadow-sm">
                  @if(isset($dataSejarah))
                      <a href="{{ route('sejarah.edit', $dataSejarah->id) }}" class="btn btn-warning px-4 fw-bold">
                          <i class="bi bi-pencil-square me-2"></i> Edit Sejarah
                      </a>

                      <form action="{{ route('sejarah.destroy', $dataSejarah->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data sejarah ini?')">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger px-4 fw-bold">
                              <i class="bi bi-trash me-2"></i> Hapus
                          </button>
                      </form>
                  @else
                      <a href="{{ route('sejarah.create') }}" class="btn btn-primary px-4 fw-bold">
                          <i class="bi bi-plus-circle me-2"></i> Tambah Narasi Sejarah
                      </a>
                  @endif
              </div>
              @endauth
              {{-- END BAGIAN ADMIN --}}

            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>