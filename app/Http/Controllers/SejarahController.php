<?php

namespace App\Http\Controllers;

use App\Models\Sejarah;
use Illuminate\Http\Request;

class SejarahController extends Controller
{
    public function index()
    {
        // Mengambil data pertama untuk ditampilkan di halaman depan
        $dataSejarah = Sejarah::first();
        return view('sejarah.index', compact('dataSejarah'));
    }

    public function create()
    {
        // Variabel harus $dataSejarah agar sinkron dengan file create.blade.php
        $dataSejarah = Sejarah::first();
        return view('sejarah.create', compact('dataSejarah'));
    }

    public function edit($id)
    {
        // Menambahkan method edit dengan tetap menggunakan variabel $dataSejarah
        $dataSejarah = Sejarah::findOrFail($id);
        return view('sejarah.edit', compact('dataSejarah'));
    }

    public function store(Request $request)
    {
        $request->validate(['isi' => 'required']);

        // Logika cerdas: Jika ID ada, maka UPDATE. Jika ID kosong, maka CREATE.
        Sejarah::updateOrCreate(
            ['id' => $request->id], 
            ['isi' => $request->isi]
        );

        return redirect()->route('sejarah.index')->with('success', 'Data sejarah berhasil diperbarui!');
    }

    public function show($id)
    {
        // Pengaman rute agar tidak error "undefined method"
        return redirect()->route('sejarah.index');
    }

    public function destroy($id)
    {
        Sejarah::findOrFail($id)->delete();
        return redirect()->route('sejarah.index')->with('success', 'Data sejarah berhasil dihapus!');
    }
}