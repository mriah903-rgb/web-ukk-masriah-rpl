<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Guru;
use App\Models\Ekstrakurikuler;
use App\Models\Galeri;
use App\Models\Banner;
use App\Models\Anggota;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahBerita = Berita::count();
        $jumlahGuru = Guru::count();
        $jumlahEkskul = Ekstrakurikuler::count();
        $jumlahGaleri = Galeri::count();
        $jumlahBanner = Banner::count();
        $jumlahAnggota = Anggota::count();

        return view('layouts.index', compact(
            'jumlahBerita',
            'jumlahGuru',
            'jumlahEkskul',
            'jumlahGaleri',
            'jumlahBanner',
            'jumlahAnggota'
        ));
    }
}
