<?php

namespace App\Http\Controllers;

use App\Models\BukuTerbaru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class BukuTerbaruController extends Controller
{
    /**
     * Menampilkan daftar buku untuk PUBLIK & ADMIN
     */
    public function index()
    {
        // Mengambil buku terbaru dengan urutan paling atas
        $buku = BukuTerbaru::orderBy('created_at', 'desc')->get();
        
        // Proteksi: Cek role admin jika kamu menggunakan sistem login
        if (auth()->check() && auth()->user()->role == 'admin') {
            return view('buku_terbaru.admin_index', compact('buku'));
        }

        return view('buku_terbaru.index', compact('buku'));
    }

    public function create()
    {
        return view('buku_terbaru.create');
    }

    /**
     * Menyimpan data buku baru
     */
    public function store(Request $request)
    {
        // 1. Validasi Input (Menambahkan validasi jumlah)
        $request->validate([
            'judul'     => 'required|string|max:255',
            'penulis'   => 'required|string|max:255',
            'cover'     => 'required|image|mimes:jpeg,png,jpg|max:2048', // Max 2MB
            'deskripsi' => 'nullable',
            'jumlah'    => 'required|numeric|min:0' // <-- Kolom Jumlah Buku Wajib Diisi
        ]);

        try {
            // 2. Proses Upload Gambar
            if ($request->hasFile('cover')) {
                $file = $request->file('cover');
                $namaFile = time() . "_" . str_replace(' ', '_', $file->getClientOriginalName());
                
                // Pastikan folder public/images/covers sudah ada
                $file->move(public_path('images/covers'), $namaFile);

                // 3. Simpan ke Database (Menambahkan array jumlah)
                BukuTerbaru::create([
                    'judul'     => $request->judul,
                    'penulis'   => $request->penulis,
                    'cover'     => $namaFile,
                    'deskripsi' => $request->deskripsi,
                    'jumlah'    => $request->jumlah, // <-- Menyimpan nilai jumlah ke database
                ]);

                return redirect()->route('buku-terbaru.index')->with('success', 'Buku terbaru berhasil dipublikasikan!');
            }
            
            return redirect()->back()->withErrors(['cover' => 'Gagal mengunggah gambar.']);

        } catch (\Exception $e) {
            // Jika error, catat di log dan beri tahu user
            Log::error("Gagal simpan buku: " . $e->getMessage());
            return redirect()->back()->withInput()->withErrors(['error' => 'Terjadi kesalahan sistem saat menyimpan data.']);
        }
    }

    public function edit($id)
    {
        $buku = BukuTerbaru::findOrFail($id);
        return view('buku_terbaru.edit', compact('buku'));
    }

    public function update(Request $request, $id)
    {
        $buku = BukuTerbaru::findOrFail($id);
        
        // Validasi input edit (Menambahkan validasi jumlah)
        $request->validate([
            'judul'     => 'required|string|max:255',
            'penulis'   => 'required|string|max:255',
            'cover'     => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'jumlah'    => 'required|numeric|min:0' // <-- Kolom Jumlah Buku Wajib Diisi saat edit
        ]);

        // Mengambil isian input termasuk field jumlah baru
        $data = $request->only(['judul', 'penulis', 'deskripsi', 'jumlah']);

        if ($request->hasFile('cover')) {
            // Hapus gambar lama agar hosting tidak penuh
            if (File::exists(public_path('images/covers/' . $buku->cover))) {
                File::delete(public_path('images/covers/' . $buku->cover));
            }
            
            // Upload gambar baru
            $file = $request->file('cover');
            $namaFile = time() . "_" . str_replace(' ', '_', $file->getClientOriginalName());
            $file->move(public_path('images/covers'), $namaFile);
            $data['cover'] = $namaFile;
        }

        $buku->update($data);

        return redirect()->route('buku-terbaru.index')->with('success', 'Data buku berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $buku = BukuTerbaru::findOrFail($id);
        
        // Hapus file fisik
        if (File::exists(public_path('images/covers/' . $buku->cover))) {
            File::delete(public_path('images/covers/' . $buku->cover));
        }
        
        $buku->delete();

        return redirect()->route('buku-terbaru.index')->with('success', 'Buku berhasil dihapus dari sistem.');
    }
}