<?php

namespace App\Http\Controllers;

use App\Models\PojokSeni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PojokSeniController extends Controller
{
    /**
     * Menampilkan semua daftar karya (Untuk Publik & Admin)
     */
    public function index()
    {
        $pojokSeni = PojokSeni::latest()->get();
        return view('pojok-seni.index', compact('pojokSeni'));
    }

    /**
     * Form tambah karya (Hanya Admin)
     */
    public function create()
    {
        return view('pojok-seni.create');
    }

    /**
     * Menyimpan karya baru ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'penulis'  => 'required|string|max:255',
            'judul'    => 'required|string|max:255',
            'kelas'    => 'required|string|max:50',
            'sinopsis' => 'nullable|string',
            'cover'    => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Proses Upload Gambar
        $namaFile = time() . '.' . $request->cover->extension();
        $request->cover->move(public_path('images/covers'), $namaFile);

        // Simpan Data
        PojokSeni::create([
            'penulis'  => $request->penulis,
            'judul'    => $request->judul,
            'kelas'    => $request->kelas,
            'sinopsis' => $request->sinopsis,
            'cover'    => $namaFile,
        ]);

        return redirect()->route('pojok-seni.index')->with('success', 'Karya Berhasil Dipublikasikan!');
    }

    /**
     * Form edit karya (Hanya Admin)
     */
    public function edit($id)
    {
        $item = PojokSeni::findOrFail($id);
        return view('pojok-seni.edit', compact('item'));
    }

    /**
     * Memperbarui data karya di database
     */
    public function update(Request $request, $id)
    {
        $item = PojokSeni::findOrFail($id);

        $request->validate([
            'penulis'  => 'required|string|max:255',
            'judul'    => 'required|string|max:255',
            'kelas'    => 'required|string|max:50',
            'sinopsis' => 'nullable|string',
            'cover'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = [
            'penulis'  => $request->penulis,
            'judul'    => $request->judul,
            'kelas'    => $request->kelas,
            'sinopsis' => $request->sinopsis,
        ];

        // Jika Admin mengunggah cover baru
        if ($request->hasFile('cover')) {
            // Hapus file cover yang lama dari folder public
            if (File::exists(public_path('images/covers/' . $item->cover))) {
                File::delete(public_path('images/covers/' . $item->cover));
            }

            // Upload file baru
            $namaFile = time() . '.' . $request->cover->extension();
            $request->cover->move(public_path('images/covers'), $namaFile);
            $data['cover'] = $namaFile;
        }

        $item->update($data);

        return redirect()->route('pojok-seni.index')->with('success', 'Karya Berhasil Diperbarui!');
    }

    /**
     * Menghapus karya dari database dan folder
     */
    public function destroy($id)
    {
        $item = PojokSeni::findOrFail($id);
        
        // Hapus file gambar dari folder sebelum data di DB dihapus
        if (File::exists(public_path('images/covers/' . $item->cover))) {
            File::delete(public_path('images/covers/' . $item->cover));
        }

        $item->delete();
        return redirect()->route('pojok-seni.index')->with('success', 'Karya Berhasil Dihapus!');
    }
}