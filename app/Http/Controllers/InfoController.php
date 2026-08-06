<?php

namespace App\Http\Controllers;

use App\Models\Info; 
use App\Models\Dokumentasi; // 1. TAMBAHKAN INI agar foto bisa dipanggil
use Illuminate\Http\Request;

class InfoController extends Controller
{
    /**
     * Menampilkan halaman index info.
     */
    public function index()
    {
        // Mengambil data informasi (singleton)
        $info = Info::first();

        // 2. AMBIL SEMUA DATA FOTO dari tabel dokumentasi
        $dokumentasis = Dokumentasi::all(); 
        
        // Kirim $info dan $dokumentasis ke view
        return view('info.index', compact('info', 'dokumentasis'));
    }

    /**
     * Menampilkan form untuk membuat data pertama kali.
     */
    public function create()
    {
        if (Info::exists()) {
            return redirect()->route('info.index')->with('error', 'Data sudah ada, silakan gunakan fitur edit.');
        }
        
        return view('info.create');
    }

    /**
     * Menyimpan data informasi dasar.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'alamat' => 'required',
            'instagram' => 'nullable', // Tambahkan validasi medsos
            'tiktok' => 'nullable',
        ]);

        Info::create($request->all());

        return redirect()->route('info.index')->with('success', 'Data informasi berhasil disimpan.');
    }

    /**
     * Menampilkan form untuk mengedit data.
     */
    public function edit($id)
    {
        $info = Info::findOrFail($id);
        return view('info.edit', compact('info'));
    }

    /**
     * Memperbarui data informasi dasar.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email',
            'alamat' => 'required',
            'instagram' => 'nullable',
            'tiktok' => 'nullable',
        ]);

        $info = Info::findOrFail($id);
        $info->update($request->all());

        return redirect()->route('info.index')->with('success', 'Data informasi berhasil diperbarui.');
    }

    /**
     * Method untuk Redirect atau Delete data dasar.
     */
    public function show($id) { return redirect()->route('info.index'); }
    
    public function destroy($id) 
    {
        $info = Info::findOrFail($id);
        $info->delete();
        return redirect()->route('info.index')->with('success', 'Data informasi berhasil dihapus.');
    }
}