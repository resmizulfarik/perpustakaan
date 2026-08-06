<?php

namespace App\Http\Controllers;

use App\Models\GaleriVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriVideoController extends Controller
{
    public function index()
    {
        // Menggunakan paginate 3 agar tampilan grid col-4 lebih rapi (pas 1 baris)
        $videos = GaleriVideo::latest()->paginate(3);
        return view('galerivideo.index', compact('videos'));
    }

    public function create()
    {
        return view('galerivideo.create');
    }

    public function store(Request $request)
    {
            $request->validate([
            'judul'     => 'required|string|max:255',
            'video'     => 'required|mimes:mp4|max:51200', // Hanya izinkan MP4, maks 50MB
            'deskripsi' => 'nullable|string'
        ]);
        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $nama_video = time() . '_' . $file->getClientOriginalName();
            
            // PERBAIKAN: Gunakan disk 'public' agar langsung masuk ke storage/app/public/videos
            $file->storeAs('videos', $nama_video, 'public');
        }

       GaleriVideo::create([
            'judul'     => $request->judul,
            'video'     => $nama_video,
            'tanggal'   => $request->tanggal, // Simpan tanggal dari form
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('galeri-video.index')->with('success', 'Video berhasil diupload!');
    }

    public function edit($id)
    {
        $video = GaleriVideo::findOrFail($id);
        return view('galerivideo.edit', compact('video'));
    }

    public function update(Request $request, $id)
    {
            $request->validate([
            'judul'     => 'required|string|max:255',
            'video'     => 'required|mimes:mp4|max:51200', // Hanya izinkan MP4, maks 50MB
            'deskripsi' => 'nullable|string'
        ]);

        $video = GaleriVideo::findOrFail($id);
        $data = [
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi
        ];

        if ($request->hasFile('video')) {
            // Hapus video lama dari storage
            Storage::disk('public')->delete('videos/' . $video->video);

            $file = $request->file('video');
            $nama_video = time() . '_' . $file->getClientOriginalName();
            
            // Simpan file baru
            $file->storeAs('videos', $nama_video, 'public');
            $data['video'] = $nama_video;
        }

        $video->update($data);

        return redirect()->route('galeri-video.index')->with('success', 'Video berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $video = GaleriVideo::findOrFail($id);
        
        // Hapus file fisik menggunakan disk public
        Storage::disk('public')->delete('videos/' . $video->video);
        
        $video->delete();

        return redirect()->route('galeri-video.index')->with('success', 'Video berhasil dihapus!');
    }
}