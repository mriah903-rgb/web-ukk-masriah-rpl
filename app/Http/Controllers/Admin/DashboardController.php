<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Guru;
use App\Models\Ekstrakurikuler;
use App\Models\Galeri;
use App\Models\Jurusan;
use App\Models\ProfilSekolah;
use App\Models\Osis;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahBerita = Berita::count();
        $jumlahGuru = Guru::count();
        $jumlahEkskul = Ekstrakurikuler::count();
        $jumlahGaleri = Galeri::count();
        $jumlahJurusan = Jurusan::count();
        $jumlahOsis = Osis::count();

        $profil = ProfilSekolah::first();

        return view('admin.dashboard', compact(
            'jumlahBerita',
            'jumlahGuru',
            'jumlahEkskul',
            'jumlahGaleri',
            'jumlahJurusan',
            'jumlahOsis',
            'profil'
        ));
    }
}