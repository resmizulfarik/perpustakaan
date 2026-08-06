<?php

namespace App\Http\Controllers;

use App\Models\Karya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class KaryaController extends Controller
{
    // Menampilkan daftar karya (Bisa diakses siapa saja)
    public function index(Request $request)
    {
        $kategori = $request->query('kategori', 'guru');
        $dataKarya = Karya::where('kategori', $kategori)->latest()->get();

        $view = ($kategori == 'guru') ? 'karya.guru' : 'karya.siswa';
        return view($view, compact('dataKarya'));
    }

    // Form Tambah (Hanya Admin)
    public function create()
    {
        return view('karya.create');
    }

    // Simpan Data (Hanya Admin)
    public function store(Request $request)
    {
        // 1. Ubah file_pdf jadi 'nullable' (opsional)
        $request->validate([
            'judul'    => 'required|string|max:255',
            'penulis'  => 'required|string|max:255',
            'kategori' => 'required|in:guru,siswa',
            'cover'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048', 
            'file_pdf' => 'nullable|mimes:pdf|max:2048', // Boleh kosong sekarang!
        ]);

        $namaFile = null;
        $namaCover = null;

        // 2. Upload PDF jika ada
        if ($request->hasFile('file_pdf')) {
            $file = $request->file('file_pdf');
            $namaFile = time() . '_' . str_replace(' ', '_', $request->judul) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/karya'), $namaFile);
        }

        // 3. Upload Cover jika ada
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $namaCover = time() . '_cover_' . str_replace(' ', '_', $request->judul) . '.' . $cover->getClientOriginalExtension();
            $cover->move(public_path('uploads/karya'), $namaCover);
        }

        // 4. Simpan ke database
        Karya::create([
            'judul'    => $request->judul,
            'penulis'  => $request->penulis,
            'kategori' => $request->kategori,
            'cover'    => $namaCover,
            'file_pdf' => $namaFile,
        ]);

        return redirect()->route('karya.index', ['kategori' => $request->kategori])
                         ->with('success', 'Karya berhasil ditambahkan!');
    }

    // Form Edit (Hanya Admin)
    public function edit($id)
    {
        $karya = Karya::findOrFail($id);
        return view('karya.edit', compact('karya'));
    }

    // Update Data (Hanya Admin)
    public function update(Request $request, $id)
    {
        $karya = Karya::findOrFail($id);

        $request->validate([
            'judul'    => 'required|string|max:255',
            'penulis'  => 'required|string|max:255',
            'kategori' => 'required|in:guru,siswa',
            'file_pdf' => 'nullable|mimes:pdf|max:2048',
            'cover'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = [
            'judul'    => $request->judul,
            'penulis'  => $request->penulis,
            'kategori' => $request->kategori,
        ];

        // Update PDF jika mengunggah file baru
        if ($request->hasFile('file_pdf')) {
            if ($karya->file_pdf) {
                $oldPath = public_path('uploads/karya/' . $karya->file_pdf);
                if (File::exists($oldPath)) { File::delete($oldPath); }
            }

            $file = $request->file('file_pdf');
            $namaFile = time() . '_' . str_replace(' ', '_', $request->judul) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/karya'), $namaFile);
            $data['file_pdf'] = $namaFile;
        }

        // Update Cover jika mengunggah gambar baru
        if ($request->hasFile('cover')) {
            if ($karya->cover) {
                $oldCoverPath = public_path('uploads/karya/' . $karya->cover);
                if (File::exists($oldCoverPath)) { File::delete($oldCoverPath); }
            }

            $cover = $request->file('cover');
            $namaCover = time() . '_cover_' . str_replace(' ', '_', $request->judul) . '.' . $cover->getClientOriginalExtension();
            $cover->move(public_path('uploads/karya'), $namaCover);
            $data['cover'] = $namaCover;
        }

        $karya->update($data);

        return redirect()->route('karya.index', ['kategori' => $karya->kategori])
                         ->with('success', 'Karya berhasil diperbarui!');
    }

    // Hapus Data (Hanya Admin)
    public function destroy($id)
    {
        $karya = Karya::findOrFail($id);

        // Hapus file PDF jika ada di folder
        if ($karya->file_pdf) {
            $path = public_path('uploads/karya/' . $karya->file_pdf);
            if (File::exists($path)) { File::delete($path); }
        }

        // Hapus file Cover jika ada di folder
        if ($karya->cover) {
            $coverPath = public_path('uploads/karya/' . $karya->cover);
            if (File::exists($coverPath)) { File::delete($coverPath); }
        }

        $karya->delete();
        return back()->with('success', 'Karya berhasil dihapus!');
    }
}