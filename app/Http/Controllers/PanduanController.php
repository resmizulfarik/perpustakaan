<?php

namespace App\Http\Controllers;

use App\Models\PanduanOpac;
use Illuminate\Http\Request;

class PanduanController extends Controller
{
    /**
     * Tampilan untuk Publik (Siswa/Tamu)
     */
    public function index()
    {
        $data = PanduanOpac::first(); // Mengambil satu data panduan utama
        return view('panduan-opac.index', compact('data'));
    }

    /**
     * Tampilan Form Tambah/Edit untuk Admin
     */
    public function create()
    {
        return view('panduan-opac.create');
    }

    /**
     * Menyimpan data panduan baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        PanduanOpac::create($request->all());

        return redirect()->route('panduan-opac.index')
                         ->with('success', 'Panduan berhasil diperbarui');
    }

    // Anda bisa menambahkan fungsi edit, update, dan destroy sesuai kebutuhan admin
}