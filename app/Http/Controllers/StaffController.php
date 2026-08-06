<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StaffController extends Controller
{
    /**
     * Menampilkan daftar staff (Tampilan ala Sejarah/List Vertikal)
     */
    public function index()
    {
        $staff = Staff::orderBy('urutan', 'asc')->get();
        return view('staff.index', compact('staff'));
    }

    /**
     * Menampilkan form tambah staff
     */
    public function create()
    {
        return view('staff.create');
    }

    /**
     * Menyimpan data staff baru ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'    => 'required|string|max:255',
            'nip'     => 'nullable|string|max:30',
            'jabatan' => 'required|string|max:255',
            'urutan'  => 'required|integer|min:1',
            'foto'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama_file = time() . "_" . str_replace(' ', '_', $file->getClientOriginalName());
            $file->move(public_path('assets/img/staff'), $nama_file);
            $data['foto'] = $nama_file;
        }

        Staff::create($data);

        return redirect()->route('staff.index')
                         ->with('success', 'Staff berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit staff
     */
    public function edit($id)
    {
        $staff = Staff::findOrFail($id);
        return view('staff.edit', compact('staff'));
    }

    /**
     * Memperbarui data staff
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'    => 'required|string|max:255',
            'nip'     => 'nullable|string|max:30',
            'jabatan' => 'required|string|max:255',
            'urutan'  => 'required|integer|min:1',
            'foto'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $staff = Staff::findOrFail($id);
        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            $path = public_path('assets/img/staff');

            // Hapus foto lama jika ada
            if ($staff->foto && File::exists($path . '/' . $staff->foto)) {
                File::delete($path . '/' . $staff->foto);
            }

            $file = $request->file('foto');
            $nama_file = time() . "_" . str_replace(' ', '_', $file->getClientOriginalName());
            $file->move($path, $nama_file);
            $data['foto'] = $nama_file;
        }

        $staff->update($data);

        return redirect()->route('staff.index')
                         ->with('success', 'Data staff berhasil diperbarui.');
    }

    /**
     * Menghapus data staff
     */
    public function destroy($id)
    {
        $staff = Staff::findOrFail($id);
        $path = public_path('assets/img/staff');

        if ($staff->foto && File::exists($path . '/' . $staff->foto)) {
            File::delete($path . '/' . $staff->foto);
        }

        $staff->delete();

        return redirect()->route('staff.index')
                         ->with('success', 'Staff berhasil dihapus.');
    }
}