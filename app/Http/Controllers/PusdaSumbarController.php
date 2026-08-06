<?php

namespace App\Http\Controllers;

use App\Models\PusdaSumbar;
use Illuminate\Http\Request;

class PusdaSumbarController extends Controller
{
    // Middleware dihapus sesuai permintaan
    
    public function index()
    {
        $pusda = PusdaSumbar::latest()->get();
        return view('pusda_sumbar.index', compact('pusda'));
    }

    public function create()
    {
        return view('pusda_sumbar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_layanan' => 'required',
            'url_link' => 'required|url',
        ]);

        PusdaSumbar::create($request->all());

        return redirect()->route('pusda-sumbar.index')
                         ->with('success', 'Layanan Pusda berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $item = PusdaSumbar::findOrFail($id);
        $item->delete();

        return redirect()->route('pusda-sumbar.index')
                         ->with('success', 'Layanan berhasil dihapus!');
    }
}