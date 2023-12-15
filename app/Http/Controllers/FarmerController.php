<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FarmerController extends Controller
{
    public function lihat_pertinjau()
    {
        return view('/user/pertinjau');
    }

    public function lihat_dashboard()
    {
        return view('/user/user-dashboard');
    }

    public function lihat_akun()
    {
        return view('/user/akun');
    }

    public function lihat_suhu()
    {
        return view('/user/suhu');
    }
    
    public function lihat_hujan()
    {
        return view('/user/curah-hujan');
    }

    public function lihat_cahaya()
    {
        return view('/user/intensitas-cahaya');
    }

    public function lihat_ktanah()
    {
        return view('/user/kelembapan-tanah');
    }

    public function lihat_kelembapan()
    {
        return view('/user/kelembapan');
    }

    public function lihat_ketinggian()
    {
        return view('/user/ketinggian');
    }

    public function lihat_kudara()
    {
        return view('/user/kualitas-udara');
    }

    public function lihat_tudara()
    {
        return view('/user/tekanan-udara');
    }

}
