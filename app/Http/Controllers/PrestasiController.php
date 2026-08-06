<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PrestasiController extends Controller
{
    // public function __construct()
    // {
    //     // Hanya index yang bisa dilihat tanpa login
    //     $this->middleware('auth')->except(['index']);
    // }

    public function index()
    {
        $prestasi = Prestasi::latest()->get();
        return view('prestasi.index', compact('prestasi'));
    }

    public function create()
    {
        return view('prestasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required',
            'kelas' => 'required',
            'judul_prestasi' => 'required',
            'tingkat' => 'required',
            'foto_sertifikat' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $namaFile = time() . '.' . $request->foto_sertifikat->extension();
        $request->foto_sertifikat->move(public_path('images/prestasi'), $namaFile);

        Prestasi::create([
            'nama_siswa' => $request->nama_siswa,
            'kelas' => $request->kelas,
            'judul_prestasi' => $request->judul_prestasi,
            'tingkat' => $request->tingkat,
            'tanggal_dicapai' => $request->tanggal_dicapai,
            'foto_sertifikat' => $namaFile,
        ]);

        return redirect()->route('prestasi.index')->with('success', 'Prestasi berhasil ditambah!');
    }

    public function edit($id)
    {
        $item = Prestasi::findOrFail($id);
        return view('prestasi.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Prestasi::findOrFail($id);
        $request->validate([
            'nama_siswa' => 'required',
            'foto_sertifikat' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto_sertifikat')) {
            if ($item->foto_sertifikat && File::exists(public_path('images/prestasi/' . $item->foto_sertifikat))) {
                File::delete(public_path('images/prestasi/' . $item->foto_sertifikat));
            }
            $namaFile = time() . '.' . $request->foto_sertifikat->extension();
            $request->foto_sertifikat->move(public_path('images/prestasi'), $namaFile);
            $data['foto_sertifikat'] = $namaFile;
        }

        $item->update($data);
        return redirect()->route('prestasi.index')->with('success', 'Prestasi diperbarui!');
    }

    public function destroy($id)
    {
        $item = Prestasi::findOrFail($id);
        if ($item->foto_sertifikat && File::exists(public_path('images/prestasi/' . $item->foto_sertifikat))) {
            File::delete(public_path('images/prestasi/' . $item->foto_sertifikat));
        }
        $item->delete();
        return redirect()->route('prestasi.index')->with('success', 'Prestasi dihapus!');
    }
}