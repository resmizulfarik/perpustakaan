<?php

namespace App\Http\Controllers;

use App\Models\PojokLiterasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PojokLiterasiController extends Controller
{
    /**
     * Konstruktor untuk mengatur keamanan
     */
    // public function __construct()
    // {
    //     // Hanya fungsi 'index' yang bisa dilihat semua orang (Publik)
    //     // Fungsi lain (create, store, edit, update, destroy) WAJIB LOGIN
    //     $this->middleware('auth')->except(['index']);
    // }

    /**
     * Menampilkan daftar literasi (Dapat dilihat semua orang)
     */
    public function index()
    {
        $literasi = PojokLiterasi::latest()->get();
        return view('pojok-literasi.index', compact('literasi'));
    }

    /**
     * Form tambah karya (Hanya Admin)
     */
    public function create()
    {
        return view('pojok-literasi.create');
    }

    /**
     * Simpan data baru (Hanya Admin)
     */
    public function store(Request $request)
    {
        $request->validate([
            'penulis'  => 'required',
            'kelas'    => 'required', 
            'judul'    => 'required',
            'isi'      => 'required',
            'kategori' => 'required',
            'cover'    => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $namaFile = time() . '.' . $request->cover->extension();
        $request->cover->move(public_path('images/literasi'), $namaFile);

        PojokLiterasi::create([
            'penulis'  => $request->penulis,
            'kelas'    => $request->kelas,
            'judul'    => $request->judul,
            'isi'      => $request->isi,
            'kategori' => $request->kategori,
            'cover'    => $namaFile,
        ]);

        return redirect()->route('pojok-literasi.index')->with('success', 'Berhasil menambahkan karya!');
    }

    /**
     * Form edit karya (Hanya Admin)
     */
    public function edit($id)
    {
        $item = PojokLiterasi::findOrFail($id);
        return view('pojok-literasi.edit', compact('item'));
    }

    /**
     * Update data (Hanya Admin)
     */
    public function update(Request $request, $id)
    {
        $item = PojokLiterasi::findOrFail($id);

        $request->validate([
            'penulis'  => 'required',
            'kelas'    => 'required',
            'judul'    => 'required',
            'isi'      => 'required',
            'kategori' => 'required',
            'cover'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['penulis', 'kelas', 'judul', 'isi', 'kategori']);

        if ($request->hasFile('cover')) {
            if ($item->cover && File::exists(public_path('images/literasi/' . $item->cover))) {
                File::delete(public_path('images/literasi/' . $item->cover));
            }

            $namaFile = time() . '.' . $request->cover->extension();
            $request->cover->move(public_path('images/literasi'), $namaFile);
            $data['cover'] = $namaFile;
        }

        $item->update($data);

        return redirect()->route('pojok-literasi.index')->with('success', 'Berhasil memperbarui karya!');
    }

    /**
     * Hapus data (Hanya Admin)
     */
    public function destroy($id)
    {
        $item = PojokLiterasi::findOrFail($id);
        
        if ($item->cover && File::exists(public_path('images/literasi/' . $item->cover))) {
            File::delete(public_path('images/literasi/' . $item->cover));
        }

        $item->delete();
        return redirect()->route('pojok-literasi.index')->with('success', 'Karya berhasil dihapus!');
    }
}