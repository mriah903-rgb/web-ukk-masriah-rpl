<?php

namespace App\Http\Controllers;

use App\Models\Osis;

class OsisController extends Controller
{
    /**
     * Menampilkan daftar pengurus OSIS.
     */
    public function index()
    {
        $osis = Osis::orderBy('id', 'asc')->get();

        return view('osis.index', compact('osis'));
    }

    /**
     * Menampilkan detail pengurus OSIS.
     */
    public function show(Osis $osi)
    {
        return view('osis.show', compact('osi'));
    }
}