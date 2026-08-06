<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Visi Misi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-secondary-subtle">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow border-0">
                    <div class="card-header bg-dark text-white py-3">
                        <h5 class="mb-0">Form Edit Visi & Misi</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('visimisi.update', $visimisi->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label class="form-label fw-bold">Visi Perpustakaan</label>
                                <textarea name="visi" class="form-control" rows="4" required>{{ $visimisi->visi }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold">Misi Perpustakaan</label>
                                <textarea name="misi" class="form-control" rows="10" required>{{ $visimisi->misi }}</textarea>
                                <div class="form-text">Tekan Enter untuk memisahkan poin-poin misi.</div>
                            </div>

                            <div class="d-flex justify-content-end border-top pt-3 gap-2">
                            <a href="{{ route('visimisi.index') }}" class="btn btn-outline-secondary" style="min-width: 160px;">Batal</a>
                            
                            <button type="submit" class="btn btn-primary" style="min-width: 160px;">Simpan Perubahan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>