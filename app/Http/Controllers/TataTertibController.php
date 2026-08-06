<?php

namespace App\Http\Controllers;

use App\Models\TataTertib;
use Illuminate\Http\Request;

class TataTertibController extends Controller
{
    // Menampilkan halaman utama
    public function index()
    {
        $tata_tertibs = TataTertib::orderBy('urutan', 'asc')->get();
        // Disesuaikan dengan nama folder di screenshot Anda: TataTertib
        return view('TataTertib.index', compact('tata_tertibs'));
    }

    // Menampilkan form tambah data
    public function create()
    {
        return view('TataTertib.create');
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
            'isi_aturan' => 'required',
            'urutan' => 'required|numeric',
        ]);

        TataTertib::create($request->all());

        return redirect()->route('TataTertib.index')
                         ->with('success', 'Tata tertib berhasil ditambahkan.');
    }

    // Menampilkan form edit
   public function edit($id)
{
    $tata_tertib = \App\Models\TataTertib::findOrFail($id);
    // Memanggil folder TataTertib (kapital) dan mengirim variabel
    return view('TataTertib.edit', compact('tata_tertib'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'kategori' => 'required',
        'isi_aturan' => 'required',
        'urutan' => 'required|numeric',
    ]);

    $tata_tertib = \App\Models\TataTertib::findOrFail($id);
    $tata_tertib->update($request->all());

    // Redirect ke route TataTertib.index
    return redirect()->route('TataTertib.index')->with('success', 'Data berhasil diupdate');
}
    // Menghapus data
    public function destroy($id)
    {
        $TataTertib = TataTertib::findOrFail($id);
        $TataTertib->delete();

        return redirect()->route('TataTertib.index')
                         ->with('success', 'Tata tertib berhasil dihapus.');
    }
}