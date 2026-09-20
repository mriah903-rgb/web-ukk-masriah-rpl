<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\ProfilSekolah;
use App\Models\Berita;

class HomeController extends Controller
{
    public function index()
    {

        $profil = ProfilSekolah::first();


        $banners = Banner::where('is_aktif', 1)
            ->latest()
            ->get();


        $beritas = Berita::latest()
            ->take(3)
            ->get();
            
        return view('home.beranda', [
            'profil' => $profil,
            'banners' => $banners,
            'beritas' => $beritas,

        ]);
    }
}