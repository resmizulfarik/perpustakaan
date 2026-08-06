<?php

namespace App\Http\Controllers;

use App\Models\NonFiksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NonFiksiController extends Controller
{
    /**
     * Tampilan daftar buku Non-Fiksi
     */
    public function index()
    {
        $dataNonFiksi = NonFiksi::latest()->get();
        // PERBAIKAN: Mengubah 'NonFiksi.index' menjadi 'nonfiksi.index'
        return view('nonfiksi.index', compact('dataNonFiksi'));
    }

    /**
     * Halaman tambah buku
     */
    public function create()
    {
        // PERBAIKAN: Mengubah 'NonFiksi.create' menjadi 'nonfiksi.create'
        return view('nonfiksi.create');
    }

    /**
     * Proses simpan data baru ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'        => 'required|string|max:255',
            'penulis'      => 'required|string|max:255',
            'penerbit'     => 'required|string|max:255',
            'tahun_terbit' => 'required|numeric',
            'cover'        => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'file_pdf'     => 'required|mimes:pdf|max:10240',
        ]);

        $input = $request->except(['_token']);

        // Proses Upload Cover
        if ($image = $request->file('cover')) {
            $destinationPath = public_path('uploads/nonfiksi/cover/');
            $profileImage = date('YmdHis') . '_' . uniqid() . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['cover'] = $profileImage;
        }

        // Proses Upload PDF
        if ($pdf = $request->file('file_pdf')) {
            $destinationPath = public_path('uploads/nonfiksi/pdf/');
            $pdfName = date('YmdHis') . '_' . uniqid() . "." . $pdf->getClientOriginalExtension();
            $pdf->move($destinationPath, $pdfName);
            $input['file_pdf'] = $pdfName;
        }

        NonFiksi::create($input);

        return redirect()->route('nonfiksi.index')
                         ->with('success', 'Buku Non Fiksi berhasil ditambahkan.');
    }

    /**
     * Halaman edit buku
     */
    public function edit($id)
    {
        $buku = NonFiksi::findOrFail($id);
        
        // PERBAIKAN: Mengubah 'NonFiksi.edit' menjadi 'nonfiksi.edit'
        return view('NonFiksi.edit', compact('buku'));
    }

    /**
     * Proses update data buku
     */
    public function update(Request $request, $id)
    {
        $buku = NonFiksi::findOrFail($id);

        $request->validate([
            'judul'        => 'required|string|max:255',
            'penulis'      => 'required|string|max:255',
            'penerbit'     => 'required|string|max:255',
            'tahun_terbit' => 'required|numeric',
            'cover'        => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'file_pdf'     => 'nullable|mimes:pdf|max:10240',
        ]);

        $input = $request->except(['_token', '_method']);

        // Update Cover jika ada file gambar baru
        if ($image = $request->file('cover')) {
            if ($buku->cover && File::exists(public_path('uploads/nonfiksi/cover/' . $buku->cover))) {
                File::delete(public_path('uploads/nonfiksi/cover/' . $buku->cover));
            }

            $destinationPath = public_path('uploads/nonfiksi/cover/');
            $profileImage = date('YmdHis') . '_' . uniqid() . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['cover'] = $profileImage;
        }

        // Update PDF jika ada file PDF baru
        if ($pdf = $request->file('file_pdf')) {
            if ($buku->file_pdf && File::exists(public_path('uploads/nonfiksi/pdf/' . $buku->file_pdf))) {
                File::delete(public_path('uploads/nonfiksi/pdf/' . $buku->file_pdf));
            }

            $destinationPath = public_path('uploads/nonfiksi/pdf/');
            $pdfName = date('YmdHis') . '_' . uniqid() . "." . $pdf->getClientOriginalExtension();
            $pdf->move($destinationPath, $pdfName);
            $input['file_pdf'] = $pdfName;
        }

        $buku->update($input);

        return redirect()->route('nonfiksi.index')
                         ->with('success', 'Buku Non Fiksi berhasil diperbarui.');
    }

    /**
     * Proses hapus data buku
     */
    public function destroy($id)
    {
        $buku = NonFiksi::findOrFail($id);

        if ($buku->cover && File::exists(public_path('uploads/nonfiksi/cover/' . $buku->cover))) {
            File::delete(public_path('uploads/nonfiksi/cover/' . $buku->cover));
        }

        if ($buku->file_pdf && File::exists(public_path('uploads/nonfiksi/pdf/' . $buku->file_pdf))) {
            File::delete(public_path('uploads/nonfiksi/pdf/' . $buku->file_pdf));
        }

        $buku->delete();

        // PERBAIKAN: Mengubah 'NonFiksi.index' menjadi 'nonfiksi.index'
        return redirect()->route('nonfiksi.index')
                         ->with('success', 'Buku Non Fiksi berhasil dihapus.');
    }
}