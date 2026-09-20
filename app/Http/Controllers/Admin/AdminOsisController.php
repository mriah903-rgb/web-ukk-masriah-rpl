<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Osis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminOsisController extends Controller
{
    /**
     * Menampilkan daftar pengurus OSIS.
     */
    public function index()
    {
        $osis = Osis::orderBy('id', 'asc')->get();

        return view('admin.osis.index', compact('osis'));
    }

    public function create()
    {
        return view('admin.osis.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'keterangan' => 'nullable|string',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')
                ->store('osis', 'public');
        }

        Osis::create($validated);

        return redirect()
            ->route('admin.osis.index')
            ->with('success', 'Data pengurus OSIS berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit pengurus.
     */
    public function edit(Osis $osi)
    {
        return view('admin.osis.edit', compact('osi'));
    }

    /**
     * Memperbarui data pengurus.
     */
    public function update(Request $request, Osis $osi)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'keterangan' => 'nullable|string',
        ]);

        if ($request->hasFile('foto')) {

            if ($osi->foto) {
                Storage::disk('public')->delete($osi->foto);
            }

            $validated['foto'] = $request->file('foto')
                ->store('osis', 'public');
        }

        $osi->update($validated);

        return redirect()
            ->route('admin.osis.index')
            ->with('success', 'Data pengurus OSIS berhasil diperbarui.');
    }


    public function destroy(Osis $osi)
    {
        if ($osi->foto) {
            Storage::disk('public')->delete($osi->foto);
        }

        $osi->delete();

        return redirect()
            ->route('admin.osis.index')
            ->with('success', 'Data pengurus OSIS berhasil dihapus.');
    }
}