<?php

namespace App\Http\Controllers;

use App\Models\Perpusnas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PerpusnasController extends Controller
{
    public function __construct()
    {
        // Hanya index yang bisa dilihat tanpa login
        $this->middleware('auth')->except(['index']);
    }

    public function index()
    {
        $perpusnas = Perpusnas::all();
        return view('perpusnas.index', compact('perpusnas'));
    }

    public function create()
    {
        return view('perpusnas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_layanan' => 'required',
            'url_link' => 'required|url',
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $namaFile = time() . '.' . $request->logo->extension();
        $request->logo->move(public_path('images/perpusnas'), $namaFile);

        Perpusnas::create([
            'nama_layanan' => $request->nama_layanan,
            'url_link' => $request->url_link,
            'deskripsi' => $request->deskripsi,
            'logo' => $namaFile,
        ]);

        return redirect()->route('perpusnas.index')->with('success', 'Layanan berhasil ditambah!');
    }

    public function destroy($id)
    {
        $item = Perpusnas::findOrFail($id);
        if ($item->logo && File::exists(public_path('images/perpusnas/' . $item->logo))) {
            File::delete(public_path('images/perpusnas/' . $item->logo));
        }
        $item->delete();
        return redirect()->route('perpusnas.index')->with('success', 'Layanan dihapus!');
    }
}