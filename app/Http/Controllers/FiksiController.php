<?php

namespace App\Http\Controllers;

use App\Models\Fiksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FiksiController extends Controller
{
    /**
     * Menampilkan daftar buku fiksi (Bisa diakses Publik & Admin)
     */
    public function index()
    {
        // Mengambil data fiksi terbaru
        $dataFiksi = Fiksi::latest()->get();
        
        return view('fiksi.index', compact('dataFiksi'));
    }

    /**
     * Form tambah buku fiksi (Hanya Admin)
     */
    public function create()
    {
        return view('fiksi.create');
    }

    /**
     * Menyimpan data buku fiksi baru ke database
     */
    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'judul'       => 'required|string|max:255',
            'penulis'     => 'required|string|max:255',
            'file_gambar' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
        ]);

        $namaFile = null;

        // 2. Logika Upload File Gambar
        if ($request->hasFile('file_gambar')) {
            $file = $request->file('file_gambar');
            
            // Mengambil ekstensi asli file gambar (.png/.jpg/.svg)
            $ekstensi = $file->getClientOriginalExtension();
            
            // Membuat nama file unik berdasarkan waktu dan judul
            $namaFile = time() . '_' . str_replace(' ', '_', strtolower($request->judul)) . '.' . $ekstensi;
            
            // Pindahkan ke folder public/uploads/fiksi
            $file->move(public_path('uploads/fiksi'), $namaFile);
        }

        // 3. Simpan ke Database
        Fiksi::create([
            'judul'       => $request->judul,
            'penulis'     => $request->penulis,
            'ringkasan'   => $request->ringkasan,
            'file_gambar' => $namaFile, // Pastikan nama kolom di database sesuai
        ]);

        return redirect()->route('fiksi.index')->with('success', 'Buku fiksi berhasil ditambahkan!');
    }

    /**
     * Form edit buku fiksi (Hanya Admin)
     */
    public function edit($id)
    {
        $fiksi = Fiksi::findOrFail($id);
        return view('fiksi.edit', compact('fiksi'));
    }

    /**
     * Update data buku fiksi
     */
    public function update(Request $request, $id)
    {
        // 1. Validasi Input
        $request->validate([
            'judul'       => 'required|string|max:255',
            'penulis'     => 'required|string|max:255',
            'file_gambar' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
        ]);

        $fiksi = Fiksi::findOrFail($id);
        
        // Ambil semua request kecuali file_gambar
        $data = $request->except('file_gambar');

        // 2. Jika ada file gambar baru yang diunggah
        if ($request->hasFile('file_gambar')) {
            // Hapus file gambar lama jika ada
            $pathLama = public_path('uploads/fiksi/' . $fiksi->file_gambar);
            if ($fiksi->file_gambar && File::exists($pathLama)) {
                File::delete($pathLama);
            }

            // Upload file gambar baru
            $file = $request->file('file_gambar');
            $ekstensi = $file->getClientOriginalExtension();
            $namaFile = time() . '_' . str_replace(' ', '_', strtolower($request->judul)) . '.' . $ekstensi;
            $file->move(public_path('uploads/fiksi'), $namaFile);
            
            // Masukkan nama file baru ke dalam array data untuk diupdate
            $data['file_gambar'] = $namaFile;
        }

        // 3. Update data di database
        $fiksi->update($data);

        return redirect()->route('fiksi.index')->with('success', 'Data buku fiksi berhasil diperbarui!');
    }

    /**
     * Menghapus buku fiksi beserta filenya
     */
    public function destroy($id)
    {
        $fiksi = Fiksi::findOrFail($id);

        // Hapus file fisik gambar di folder uploads jika ada
        $pathFile = public_path('uploads/fiksi/' . $fiksi->file_gambar);
        if ($fiksi->file_gambar && File::exists($pathFile)) {
            File::delete($pathFile);
        }

        // Hapus data dari database
        $fiksi->delete();

        return redirect()->route('fiksi.index')->with('success', 'Buku fiksi telah dihapus!');
    }
}