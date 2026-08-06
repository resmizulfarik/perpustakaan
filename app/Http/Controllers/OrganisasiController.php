<?php

namespace App\Http\Controllers;

use App\Models\Organisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; // Gunakan Facade File untuk pengelolaan folder

class OrganisasiController extends Controller
{
    /**
     * Menampilkan daftar struktur organisasi
     */
    public function index()
    {
        // Mengurutkan berdasarkan 'urutan' agar jabatan tertinggi tampil di atas
        $staff = Organisasi::orderBy('urutan', 'asc')->get();
        return view('organisasi.index', compact('staff'));
    }

    /**
     * Menampilkan form tambah personil baru
     */
    public function create()
    {
        return view('organisasi.create');
    }

    /**
     * Menyimpan data personil baru ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'    => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'urutan'  => 'required|integer|min:1',
            'foto'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            $path = public_path('assets/img/organisasi');
            
            // Buat folder otomatis jika belum ada
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            $file = $request->file('foto');
            $nama_file = time() . "_" . str_replace(' ', '_', $file->getClientOriginalName());
            $file->move($path, $nama_file);
            $data['foto'] = $nama_file;
        }

        Organisasi::create($data);

        return redirect()->route('organisasi.index')
                         ->with('success', 'Personil berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit personil
     */
    public function edit($id)
    {
        $personil = Organisasi::findOrFail($id);
        return view('organisasi.edit', compact('personil'));
    }

    /**
     * Memperbarui data personil di database
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'    => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'urutan'  => 'required|integer|min:1',
            'foto'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $personil = Organisasi::findOrFail($id);
        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            $path = public_path('assets/img/organisasi');

            // Hapus foto lama jika ada untuk menghemat ruang penyimpanan
            if ($personil->foto && File::exists($path . '/' . $personil->foto)) {
                File::delete($path . '/' . $personil->foto);
            }

            $file = $request->file('foto');
            $nama_file = time() . "_" . str_replace(' ', '_', $file->getClientOriginalName());
            $file->move($path, $nama_file);
            $data['foto'] = $nama_file;
        }

        $personil->update($data);

        return redirect()->route('organisasi.index')
                         ->with('success', 'Data personil berhasil diperbarui.');
    }

    /**
     * Menghapus data personil dari database
     */
    public function destroy($id)
    {
        $personil = Organisasi::findOrFail($id);
        $path = public_path('assets/img/organisasi');

        // Hapus file fisik foto sebelum menghapus record di database
        if ($personil->foto && File::exists($path . '/' . $personil->foto)) {
            File::delete($path . '/' . $personil->foto);
        }

        $personil->delete();

        return redirect()->route('organisasi.index')
                         ->with('success', 'Personil berhasil dihapus.');
    }
}