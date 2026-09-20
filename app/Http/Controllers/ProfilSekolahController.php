<?php

namespace App\Http\Controllers;

use App\Models\ProfilSekolah;
use Illuminate\Http\Request;

class ProfilSekolahController extends Controller
{


    public function index()
    {
        $profil = ProfilSekolah::first();

        return view('profil-sekolah.index', compact('profil'));
    }




    public function adminIndex()
    {
        $profil = ProfilSekolah::first();

        return view('admin.profil-sekolah.index', compact('profil'));
    }




    public function create()
    {
        return view('admin.profil-sekolah.create');
    }



    public function store(Request $request)
    {
        $validated = $request->validate([
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'sejarah' => 'nullable|string',

            'npsn' => 'nullable|string|max:20',
            'nama_sekolah' => 'required|string|max:255',
            'status_sekolah' => 'nullable|string|max:100',
            'bentuk_pendidikan' => 'nullable|string|max:100',

            'alamat_jalan' => 'nullable|string|max:255',
            'desa_kelurahan' => 'nullable|string|max:100',
            'kecamatan' => 'nullable|string|max:100',
            'kabupaten_kota' => 'nullable|string|max:100',
            'provinsi' => 'nullable|string|max:100',
            'kode_pos' => 'nullable|string|max:10',

            'telepon' => 'nullable|string|max:30',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|string|max:255',

            'kepala_sekolah' => 'nullable|string|max:255',
            'akreditasi' => 'nullable|string|max:50',
        ]);



        if ($request->hasFile('logo')) {

            $file = $request->file('logo');

            $namaFile = time() . '_' . $file->getClientOriginalName();

            $folder = public_path('uploads/profil-sekolah');

            if (!file_exists($folder)) {
                mkdir($folder, 0755, true);
            }

            $file->move($folder, $namaFile);

            $validated['logo'] = $namaFile;
        }
        ProfilSekolah::create($validated);

        return redirect()
            ->route('admin.profil-sekolah.index')
            ->with('success', 'Profil sekolah berhasil ditambahkan.');
    }
    public function edit()
    {
        $profil = ProfilSekolah::firstOrFail();

        return view('admin.profil-sekolah.edit', compact('profil'));
    }

    public function update(Request $request)
    {
        $profil = ProfilSekolah::firstOrFail();

        $validated = $request->validate([
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'sejarah' => 'nullable|string',

            'npsn' => 'nullable|string|max:20',
            'nama_sekolah' => 'required|string|max:255',
            'status_sekolah' => 'nullable|string|max:100',
            'bentuk_pendidikan' => 'nullable|string|max:100',

            'alamat_jalan' => 'nullable|string|max:255',
            'desa_kelurahan' => 'nullable|string|max:100',
            'kecamatan' => 'nullable|string|max:100',
            'kabupaten_kota' => 'nullable|string|max:100',
            'provinsi' => 'nullable|string|max:100',
            'kode_pos' => 'nullable|string|max:10',

            'telepon' => 'nullable|string|max:30',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|string|max:255',

            'kepala_sekolah' => 'nullable|string|max:255',
            'akreditasi' => 'nullable|string|max:50',
        ]);

        if ($request->hasFile('logo')) {

            $file = $request->file('logo');

            $namaFile = time() . '_' . $file->getClientOriginalName();

            $folder = public_path('uploads/profil-sekolah');


            if (!file_exists($folder)) {
                mkdir($folder, 0755, true);
            }

            $file->move($folder, $namaFile);

            $validated['logo'] = $namaFile;
        }
        $profil->update($validated);

        return redirect()
            ->route('admin.profilsekolah.index')
            ->with('success', 'Profil sekolah berhasil diperbarui.');
    }
}