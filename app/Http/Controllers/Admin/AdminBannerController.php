<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminBannerController extends Controller
{
    /**
     * Menampilkan daftar banner
     */
    public function index()
    {
        $banners = Banner::latest()->get();

        return view('admin.banner.index', compact('banners'));
    }

    /**
     * Menampilkan form tambah banner
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Menyimpan banner baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'judul' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        // Pastikan folder tersedia
        $folder = public_path('uploads/banner');

        if (!File::exists($folder)) {
            File::makeDirectory($folder, 0755, true);
        }

        $namaFile = null;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');

            $namaFile = time() . '_' . preg_replace(
                '/[^A-Za-z0-9._-]/',
                '_',
                $file->getClientOriginalName()
            );

            $file->move($folder, $namaFile);
        }

        Banner::create([
            'gambar' => $namaFile,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'is_aktif' => $request->boolean('is_aktif'),
        ]);

        return redirect()
            ->route('admin.banner.index')
            ->with('success', 'Banner berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit banner
     */
    public function edit(Banner $banner)
    {
        return view('admin.banner.edit', compact('banner'));
    }

    /**
     * Memperbarui banner
     */
    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'judul' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'is_aktif' => $request->boolean('is_aktif'),
        ];

        $folder = public_path('uploads/banner');

        if (!File::exists($folder)) {
            File::makeDirectory($folder, 0755, true);
        }

        if ($request->hasFile('gambar')) {

            // Hapus gambar lama
            if (
                $banner->gambar &&
                File::exists($folder . '/' . $banner->gambar)
            ) {
                File::delete($folder . '/' . $banner->gambar);
            }

            $file = $request->file('gambar');

            $namaFile = time() . '_' . preg_replace(
                '/[^A-Za-z0-9._-]/',
                '_',
                $file->getClientOriginalName()
            );

            $file->move($folder, $namaFile);

            $data['gambar'] = $namaFile;
        }

        $banner->update($data);

        return redirect()
            ->route('admin.banner.index')
            ->with('success', 'Banner berhasil diperbarui.');
    }

    /**
     * Menghapus banner
     */
    public function destroy(Banner $banner)
    {
        $folder = public_path('uploads/banner');

        if (
            $banner->gambar &&
            File::exists($folder . '/' . $banner->gambar)
        ) {
            File::delete($folder . '/' . $banner->gambar);
        }

        $banner->delete();

        return redirect()
            ->route('admin.banner.index')
            ->with('success', 'Banner berhasil dihapus.');
    }
}