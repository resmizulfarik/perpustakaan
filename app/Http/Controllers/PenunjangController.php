<?php

namespace App\Http\Controllers;

use App\Models\Penunjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Controllers\HasMiddleware; // Tambah ini jika pakai Laravel 11
use Illuminate\Routing\Controllers\Middleware;    // Tambah ini jika pakai Laravel 11

class PenunjangController extends Controller
{
    /**
     * Jika kamu menggunakan Laravel 10 kebawah, pakai __construct yang diperbaiki ini.
     * Jika Laravel 11, biarkan kosong dan atur di web.php (lebih disarankan).
     */
    // public function __construct()
    // {
    //     // Pastikan middleware auth aktif untuk semua kecuali index
    //     $this->middleware('auth')->except(['index']);
    // }

    public function index()
    {
        // Menggunakan paginate agar jika buku banyak, halaman tidak berat
        $dataPenunjang = Penunjang::latest()->paginate(8); 
        return view('penunjang.index', compact('dataPenunjang'));
    }

    public function create()
    {
        return view('penunjang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'    => 'required|string|max:255',
            'penulis'  => 'required|string|max:255',
            'file_pdf' => 'required|mimes:pdf|max:10240', // Maks 10MB
        ]);

        try {
            $namaFile = null;
            if ($request->hasFile('file_pdf')) {
                $file = $request->file('file_pdf');
                // Slug judul agar nama file rapi di server
                $judulSafe = str($request->judul)->slug('_');
                $namaFile = time() . '_penunjang_' . $judulSafe . '.pdf';
                $file->move(public_path('uploads/penunjang'), $namaFile);
            }

            Penunjang::create([
                'judul'     => $request->judul,
                'penulis'   => $request->penulis,
                'ringkasan' => $request->ringkasan,
                'file_pdf'  => $namaFile,
            ]);

            return redirect()->route('penunjang.index')->with('success', 'Buku penunjang berhasil ditambahkan!');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function edit($id)
    {
        $penunjang = Penunjang::findOrFail($id);
        return view('penunjang.edit', compact('penunjang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'    => 'required|string|max:255',
            'penulis'  => 'required|string|max:255',
            'file_pdf' => 'nullable|mimes:pdf|max:10240',
        ]);

        $penunjang = Penunjang::findOrFail($id);
        $data = $request->except('file_pdf');

        if ($request->hasFile('file_pdf')) {
            // Hapus file lama jika ada
            $pathLama = public_path('uploads/penunjang/' . $penunjang->file_pdf);
            if (File::exists($pathLama)) {
                File::delete($pathLama);
            }

            $file = $request->file('file_pdf');
            $judulSafe = str($request->judul)->slug('_');
            $namaFile = time() . '_penunjang_' . $judulSafe . '.pdf';
            $file->move(public_path('uploads/penunjang'), $namaFile);
            $data['file_pdf'] = $namaFile;
        }

        $penunjang->update($data);
        return redirect()->route('penunjang.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $penunjang = Penunjang::findOrFail($id);
        
        // Hapus file fisiknya
        if ($penunjang->file_pdf) {
            $pathFile = public_path('uploads/penunjang/' . $penunjang->file_pdf);
            if (File::exists($pathFile)) {
                File::delete($pathFile);
            }
        }

        $penunjang->delete();
        return redirect()->route('penunjang.index')->with('success', 'Buku telah dihapus!');
    }
}