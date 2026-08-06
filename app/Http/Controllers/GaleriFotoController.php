<?php

namespace App\Http\Controllers;

use App\Models\GaleriFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriFotoController extends Controller
{
    // PROSES INDEX DENGAN FITUR CARI & EAGER LOADING RELASI
    public function index(Request $request)
    {
        // Menangkap kata kunci dari input 'search' di sidebar
        $search = $request->input('search');

        // Mengambil data galeri beserta relasi 'info' (DIPERBAIKI DISINI)
        $galeri = GaleriFoto::with('info') 
            ->when($search, function ($query, $search) {
                // Logika pencarian: mencari di judul atau deskripsi
                return $query->where('judul', 'like', "%{$search}%")
                             ->orWhere('deskripsi', 'like', "%{$search}%");
            })
            ->latest() // Mengurutkan berdasarkan yang terbaru
            ->paginate(3); // Membatasi 3 item per halaman agar ada pagination

        return view('galeri.galeri-foto', compact('galeri'));
    }

    /**
     * Menampilkan detail foto beserta relasi info jika dibutuhkan
     */
    public function show($id)
    {
        // Mencari data foto berdasarkan ID berikut dengan data relasi infonya
        $foto = GaleriFoto::with('info')->findOrFail($id);
        
        // Mengirim data ke view show-foto
        return view('galeri.show-foto', compact('foto'));
    }

    // Form Tambah
    public function create()
    {
        return view('galeri.tambah-foto');
    }

    // Proses Simpan Data
    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'required|string|max:255',
            'tanggal'   => 'required|date',
            'foto'      => 'required|image|mimes:jpg,jpeg,png,webp|max:10240',
            'deskripsi' => 'nullable|string'
        ]);

        $path = $request->file('foto')->store('galeri', 'public');

        GaleriFoto::create([
            'judul'     => $request->judul,
            'tanggal'   => $request->tanggal,
            'foto'      => $path,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('galeri-foto.index')->with('success', 'Foto berhasil disimpan');
    }

    // Form Edit
    public function edit($id)
    {
        $foto = GaleriFoto::findOrFail($id);
        return view('galeri.edit-foto', compact('foto'));
    }

    // Proses Update Data
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'     => 'required|string|max:255',
            'tanggal'   => 'required|date',
            'foto'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
            'deskripsi' => 'nullable|string'
        ]);

        $foto = GaleriFoto::findOrFail($id);
        $path = $foto->foto;

        if ($request->hasFile('foto')) {
            // Hapus file fisik lama
            Storage::disk('public')->delete($foto->foto);
            $path = $request->file('foto')->store('galeri', 'public');
        }

        $foto->update([
            'judul'     => $request->judul,
            'tanggal'   => $request->tanggal,
            'foto'      => $path,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('galeri-foto.index')->with('success', 'Foto berhasil diperbarui');
    }

    // Fungsi Hapus
    public function destroy($id)
    {
        $foto = GaleriFoto::findOrFail($id);
        Storage::disk('public')->delete($foto->foto);
        $foto->delete();

        return redirect()->route('galeri-foto.index')->with('success', 'Foto berhasil dihapus');
    }
}