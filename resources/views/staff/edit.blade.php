<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Staff - Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            border-radius: 12px;
        }
        .card-header {
            border-radius: 12px 12px 0 0 !important;
        }
        /* Mengatur agar tombol tidak terlalu besar di layar kecil */
        .btn-custom {
            min-width: 100px;
        }
    </style>
</head>
<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-warning text-dark py-3">
                        <h5 class="mb-0 fw-bold text-center">Edit Data Staff</h5>
                    </div>
                    <div class="card-body p-4">
                        
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('staff.update', $staff->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT') 
                            
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label fw-bold">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control" value="{{ old('nama', $staff->nama) }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">NIP</label>
                                    <input type="text" name="nip" class="form-control" value="{{ old('nip', $staff->nip) }}">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Urutan Tampilan</label>
                                    <input type="number" name="urutan" class="form-control" value="{{ old('urutan', $staff->urutan) }}" required>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label fw-bold">Jabatan</label>
                                    <input type="text" name="jabatan" class="form-control" value="{{ old('jabatan', $staff->jabatan) }}" required>
                                </div>

                                <div class="col-md-12 mb-4">
                                    <label class="form-label fw-bold">Foto Staff</label>
                                    
                                    @if($staff->foto)
                                        <div class="mb-2">
                                            <img src="{{ asset('assets/img/staff/' . $staff->foto) }}" alt="Foto" width="100" class="img-thumbnail shadow-sm">
                                            <p class="small text-muted mb-0">Foto saat ini</p>
                                        </div>
                                    @endif

                                    <input type="file" name="foto" class="form-control form-control-sm" accept="image/*">
                                    <div class="form-text">Pilih file baru jika ingin mengganti foto. Maks. 2MB.</div>
                                </div>
                            </div>

                            {{-- Bagian Tombol yang dikecilkan --}}
                            <div class="d-flex justify-content-center border-top pt-4 gap-2">
                                <a href="{{ route('staff.index') }}" class="btn btn-sm btn-outline-secondary btn-custom">Batal</a>
                                <button type="submit" class="btn btn-sm btn-warning fw-bold btn-custom">Simpan Perubahan</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>