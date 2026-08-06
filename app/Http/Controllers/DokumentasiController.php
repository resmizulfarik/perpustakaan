<?php

namespace App\Http\Controllers;

use App\Models\Dokumentasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumentasiController extends Controller
{
    /**
     * Menampilkan form untuk tambah foto baru.
     */
    public function create()
    {
        return view('dokumentasi.create');
    }

    /**
     * Menyimpan foto ke database dan folder storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            // Menyimpan file ke storage/app/public/dokumentasi
            $path = $request->file('foto')->store('dokumentasi', 'public');
            Dokumentasi::create(['foto' => $path]);
        }

        return redirect()->route('info.index')->with('success', 'Foto berhasil diunggah!');
    }

    /**
     * Menampilkan form edit untuk mengganti foto.
     */
    public function edit($id)
    {
        $dokumentasi = Dokumentasi::findOrFail($id);
        return view('dokumentasi.edit', compact('dokumentasi'));
    }

    /**
     * Memperbarui foto yang sudah ada.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $dokumentasi = Dokumentasi::findOrFail($id);

        if ($request->hasFile('foto')) {
            // Hapus foto lama dari storage jika ada
            if (Storage::disk('public')->exists($dokumentasi->foto)) {
                Storage::disk('public')->delete($dokumentasi->foto);
            }
            
            // Simpan foto baru
            $path = $request->file('foto')->store('dokumentasi', 'public');
            $dokumentasi->update(['foto' => $path]);
        }

        return redirect()->route('info.index')->with('success', 'Foto berhasil diperbarui!');
    }

    /**
     * Menghapus foto dari database dan storage.
     */
    public function destroy($id)
    {
        $dokumentasi = Dokumentasi::findOrFail($id);

        // Cek dan hapus file fisik dari folder storage
        if (Storage::disk('public')->exists($dokumentasi->foto)) {
            Storage::disk('public')->delete($dokumentasi->foto);
        }

        $dokumentasi->delete();

        return redirect()->back()->with('success', 'Foto berhasil dihapus!');
    }
}