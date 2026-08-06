<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    /**
     * Menampilkan halaman Visi & Misi
     */
    public function index()
    {
        $data = VisiMisi::first() ?? VisiMisi::create([
            'visi' => 'Menjadi perpustakaan digital terdepan dalam mencerdaskan bangsa.',
            'misi' => "1. Menyediakan koleksi buku yang berkualitas.\n2. Memberikan layanan literasi berbasis teknologi.\n3. Menciptakan ruang baca yang nyaman."
        ]);

        return view('visimisi.index', compact('data'));
    }

    /**
     * Menampilkan form untuk mengedit Visi & Misi
     */
    public function edit($id)
    {
        $visimisi = VisiMisi::findOrFail($id);
        return view('visimisi.edit', compact('visimisi'));
    }

    /**
     * Menyimpan perubahan data ke database
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'visi' => 'required|string',
            'misi' => 'required|string',
        ]);

        $visimisi = VisiMisi::findOrFail($id);
        
        $visimisi->update([
            'visi' => $request->visi,
            'misi' => $request->misi,
        ]);

        return redirect()->route('visimisi.index')->with('success', 'Visi & Misi berhasil diperbarui');
    }

    /**
     * Menghapus data Visi & Misi dari database
     */
    public function destroy($id)
    {
        // Mencari data berdasarkan ID
        $visimisi = VisiMisi::findOrFail($id);

        // Proses penghapusan
        $visimisi->delete();

        // Kembali ke halaman index dengan pesan sukses
        // Karena datanya dihapus, saat kembali ke index (method index), 
        // Laravel akan otomatis membuat data default baru melalui logika '?? VisiMisi::create'
        return redirect()->route('visimisi.index')->with('success', 'Data berhasil dihapus dan dikembalikan ke default');
    }
}