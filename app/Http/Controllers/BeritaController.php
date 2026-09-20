<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->get();

        return view('berita.index', compact('beritas'));
    }

    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();

        return view('berita.show', compact('berita'));
    }

    public function adminIndex()
    {
        $beritas = Berita::latest()->get();

        return view('admin.berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'video' => 'nullable|mimes:mp4,webm,mov|max:20480',
        ]);

        $gambarPath = null;
        $videoPath = null;

        // Upload gambar
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')
                ->store('berita', 'public');
        }

        // Upload video
        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')
                ->store('berita', 'public');
        }

        Berita::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'isi' => $request->isi,
            'gambar' => $gambarPath,
            'video' => $videoPath,
        ]);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'video' => 'nullable|mimes:mp4,webm,mov|max:20480',
        ]);

        $gambarPath = $berita->gambar;
        $videoPath = $berita->video;

        // Jika ada gambar baru
        if ($request->hasFile('gambar')) {

            if ($berita->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }

            $gambarPath = $request->file('gambar')
                ->store('berita', 'public');
        }

        // Jika ada video baru
        if ($request->hasFile('video')) {

            if ($berita->video) {
                Storage::disk('public')->delete($berita->video);
            }

            $videoPath = $request->file('video')
                ->store('berita', 'public');
        }

        $berita->update([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'isi' => $request->isi,
            'gambar' => $gambarPath,
            'video' => $videoPath,
        ]);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $berita)
    {
        // Hapus gambar
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }

        // Hapus video
        if ($berita->video) {
            Storage::disk('public')->delete($berita->video);
        }

        $berita->delete();

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}