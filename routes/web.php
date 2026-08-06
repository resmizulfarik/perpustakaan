<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GaleriFotoController;
use App\Http\Controllers\GaleriVideoController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TataTertibController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DokumentasiController;
use App\Http\Controllers\PanduanController;
use App\Http\Controllers\KaryaController;
use App\Http\Controllers\FiksiController;
use App\Http\Controllers\NonFiksiController;
use App\Http\Controllers\PenunjangController;
use App\Http\Controllers\BukuTerbaruController;
use App\Http\Controllers\PojokSeniController;
use App\Http\Controllers\PojokLiterasiController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\PerpusnasController;
use App\Http\Controllers\PusdaSumbarController;
use App\Http\Controllers\IndonesiaOnesearchController;
use App\Http\Controllers\LoginController;


/*
|--------------------------------------------------------------------------
| 1. ROUTE PUBLIK (Pengunjung Biasa)
|--------------------------------------------------------------------------
| Hanya bisa melihat (Index & Show), tidak bisa tambah/edit/hapus.
*/

// Route::get('/', function () { return view('welcome'); });
Route::get('/', function () {
    // Mengambil data statistik pengunjung per bulan dengan konversi tanggal yang lebih aman
    $statistik = \App\Models\Pengunjung::select(
        \Illuminate\Support\Facades\DB::raw('MONTH(STR_TO_DATE(created_at, "%Y-%m-%d")) as bulan'),
        \Illuminate\Support\Facades\DB::raw('COUNT(*) as total')
    )
    ->whereYear('created_at', date('Y'))
    ->groupBy(\Illuminate\Support\Facades\DB::raw('MONTH(STR_TO_DATE(created_at, "%Y-%m-%d"))'))
    ->pluck('total', 'bulan')
    ->all();

    // Menyusun wadah data 12 bulan (Januari - Desember)
    $dataGrafik = [];
    for ($i = 1; $i <= 12; $i++) {
        $dataGrafik[] = $statistik[$i] ?? 0; 
    }

    return view('welcome', compact('dataGrafik'));
});
Route::get('/team', function () { return view('team'); });
Route::get('/contact', function () { return view('contact'); });


// Resource yang bisa dilihat publik
Route::resource('galeri-foto', GaleriFotoController::class);
Route::resource('galeri-video', GaleriVideoController::class)->only(['index']);
Route::resource('sejarah', SejarahController::class)->only(['index', 'show', 'create', 'store', 'destroy']);
Route::resource('visimisi', VisiMisiController::class)->only(['index', 'show']);
Route::resource('organisasi', OrganisasiController::class)->only(['index',]);
Route::resource('staff', StaffController::class)->only(['index']);
// Hanya mengizinkan fungsi yang sudah Anda buat di controller
Route::resource('TataTertib', TataTertibController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
Route::resource('info', InfoController::class)->only(['index', 'show']);
Route::resource('berita', BeritaController::class)->only(['index', 'show', 'create', 'store', 'destroy', 'edit', 'update']);
Route::resource('dokumentasi', DokumentasiController::class)->only(['index']);
Route::resource('panduan-opac', PanduanController::class)->only(['index']);
Route::resource('karya', KaryaController::class);
Route::resource('fiksi', FiksiController::class)->only(['index']);
Route::resource('nonfiksi', NonFiksiController::class)->only(['index']);
Route::resource('penunjang', PenunjangController::class)->only(['index']);
Route::resource('buku-terbaru', BukuTerbaruController::class);
Route::resource('pojok-seni', PojokSeniController::class);
Route::resource('pojok-literasi', PojokLiterasiController::class);
Route::resource('prestasi', PrestasiController::class);
Route::resource('perpusnas', PerpusnasController::class);
Route::resource('pusda-sumbar', PusdaSumbarController::class);
Route::resource('indonesia-onesearch', IndonesiaOnesearchController::class);

// Group untuk user yang BELUM login (Guest)
Route::middleware('guest')->group(function () {
    // Ubah 'login.index' menjadi 'login' agar dikenali sistem auth Laravel
    Route::get('/login', [LoginController::class, 'index'])->name('login'); 
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

/*
|--------------------------------------------------------------------------
| 3. ROUTE ADMIN (Hanya Setelah Login)
|--------------------------------------------------------------------------
| Punya akses penuh untuk Tambah, Edit, dan Hapus data.
*/

Route::middleware('auth')->group(function () {
    // Logout
    Route::delete('/logout', [LoginController::class, 'destroy'])->name('login.destroy');

    // Manajemen Data (Create, Store, Edit, Update, Delete)
    Route::resource('galeri-foto', GaleriFotoController::class)->except(['index', 'show']);
    Route::resource('galeri-video', GaleriVideoController::class)->except(['index', 'show']);
    Route::resource('sejarah', SejarahController::class)->except(['index', 'show']);
    Route::resource('visimisi', VisiMisiController::class)->except(['index', 'show']);
    Route::resource('organisasi', OrganisasiController::class)->except(['index',]);
    Route::resource('staff', StaffController::class)->except(['index']);
    Route::resource('TataTertib', TataTertibController::class)->except(['index']);
    Route::resource('info', InfoController::class)->except(['index']);
    Route::resource('dokumentasi', DokumentasiController::class)->except(['index']);
    Route::resource('panduan-opac', PanduanController::class)->except(['index']);
    Route::resource('fiksi', FiksiController::class)->except(['index']);
    Route::resource('nonfiksi', NonFiksiController::class)->except(['index']);
    Route::resource('penunjang', PenunjangController::class)->except(['index']);
    Route::resource('buku-terbaru', BukuTerbaruController::class)->except(['index']);
    Route::resource('pojok-seni', PojokSeniController::class)->except(['index']);
    Route::resource('pojok-literasi', PojokLiterasiController::class)->except(['index']);
    Route::resource('prestasi', PrestasiController::class)->except(['index']);
    Route::resource('perpusnas', PerpusnasController::class)->except(['index']);
    Route::resource('pusda-sumbar', PusdaSumbarController::class)->except(['index']);
    Route::resource('indonesia-onesearch', IndonesiaOnesearchController::class)->except(['index']);
    });
    
