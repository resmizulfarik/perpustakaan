<?php

namespace App\Http\Controllers;

use App\Models\IndonesiaOnesearch;
use Illuminate\Http\Request;

class IndonesiaOnesearchController extends Controller
{
    public function index()
    {
        $onesearch = IndonesiaOnesearch::latest()->get();
        return view('indonesia_onesearch.index', compact('onesearch'));
    }

    public function create()
    {
        return view('indonesia_onesearch.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_layanan' => 'required',
            'url_link' => 'required|url',
        ]);

        IndonesiaOnesearch::create($request->all());

        return redirect()->route('indonesia-onesearch.index')
                         ->with('success', 'Layanan IOS berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $onesearch = IndonesiaOnesearch::findOrFail($id);
        return view('indonesia_onesearch.edit', compact('onesearch'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_layanan' => 'required',
            'url_link' => 'required|url',
        ]);

        $onesearch = IndonesiaOnesearch::findOrFail($id);
        $onesearch->update($request->all());

        return redirect()->route('indonesia-onesearch.index')
                         ->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        IndonesiaOnesearch::findOrFail($id)->delete();
        return redirect()->route('indonesia-onesearch.index')
                         ->with('success', 'Layanan berhasil dihapus!');
    }
}