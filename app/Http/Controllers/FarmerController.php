<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DataSensor;
use Illuminate\Support\Facades\Auth;
use App\Models\User;





class FarmerController extends Controller
{
    public function lihat_pertinjau()
    {
        //suhu
        $dataSuhu = DataSensor::select('suhu','waktu_perekaman')->get();
        $suhuTerakhir = DataSensor::orderBy('waktu_perekaman', 'desc')->first();
        $suhuTerendah = DataSensor::min('suhu');
        $suhuTertinggi = DataSensor::max('suhu');
        $jumlahData = count($dataSuhu);
        $totalSuhu = 0;
        foreach ($dataSuhu as $suhu) {
            $totalSuhu += $suhu->suhu;
        }
        $rataRataSuhu = ($jumlahData > 0) ? $totalSuhu / $jumlahData : 0;
        //kelembaban udara
        $dataKelembabanUdara = DataSensor::select('kelembaban_udara','waktu_perekaman')->get();
        $kelembabanUdaraTerakhir = DataSensor::orderBy('waktu_perekaman', 'desc')->first();
        $kelembabanUdaraTerendah = DataSensor::min('kelembaban_udara');
        $kelembabanUdaraTertinggi = DataSensor::max('kelembaban_udara');
        $jumlahData = count($dataKelembabanUdara);
        $totalKelembabanUdara = 0;
        foreach ($dataKelembabanUdara as $kelembabanUdara) {
            $totalKelembabanUdara += $kelembabanUdara->kelembaban_udara;
        }
        $rataRataKelembabanUdara = ($jumlahData > 0) ? $totalKelembabanUdara / $jumlahData : 0;

        //curah hujan
        $dataCurahHujan = DataSensor::select('curah_hujan', 'waktu_perekaman')->get();
        $curahHujanTerakhir = DataSensor::orderBy('waktu_perekaman', 'desc')->first();
        $curahHujanTerendah = DataSensor::min('curah_hujan');
        $curahHujanTertinggi = DataSensor::max('curah_hujan');
        $jumlahData = count($dataCurahHujan);
        $totalCurahHujan = 0;
        foreach ($dataCurahHujan as $curahHujan) {
            $totalCurahHujan += $curahHujan->curah_hujan;
        }
        $rataRataCurahHujan = ($jumlahData > 0) ? $totalCurahHujan / $jumlahData : 0;

        //intensitas cahaya
        $dataIntensitasCahaya = DataSensor::select('intensitas_cahaya', 'waktu_perekaman')->get();
        $intensitasCahayaTerakhir = DataSensor::orderBy('waktu_perekaman', 'desc')->first();
        $intensitasCahayaTerendah = DataSensor::min('intensitas_cahaya');
        $intensitasCahayaTertinggi = DataSensor::max('intensitas_cahaya');
        $jumlahData = count($dataIntensitasCahaya);
        $totalIntensitasCahaya = 0;
        foreach ($dataIntensitasCahaya as $intensitasCahaya) {
            $totalIntensitasCahaya += $intensitasCahaya->intensitas_cahaya;
        }
        $rataRataIntensitasCahaya = ($jumlahData > 0) ? $totalIntensitasCahaya / $jumlahData : 0;

        //kualitas udara
        $dataKualitasUdara = DataSensor::select('kualitas_udara', 'waktu_perekaman')->get();
        $kualitasUdaraTerakhir = DataSensor::orderBy('waktu_perekaman', 'desc')->first();
        $kualitasUdaraTerendah = DataSensor::min('kualitas_udara');
        $kualitasUdaraTertinggi = DataSensor::max('kualitas_udara');
        $jumlahData = count($dataKualitasUdara);
        $totalKualitasUdara = 0;
        foreach ($dataKualitasUdara as $kualitasUdara) {
            $totalKualitasUdara += $kualitasUdara->kualitas_udara;
        }
        $rataRataKualitasUdara = ($jumlahData > 0) ? $totalKualitasUdara / $jumlahData : 0;

        //kelembaban tanah
        $dataKelembabanTanah = DataSensor::select('kelembaban_tanah', 'waktu_perekaman')->get();
        $kelembabanTanahTerakhir = DataSensor::orderBy('waktu_perekaman', 'desc')->first();
        $kelembabanTanahTerendah = DataSensor::min('kelembaban_tanah');
        $kelembabanTanahTertinggi = DataSensor::max('kelembaban_tanah');
        $jumlahData = count($dataKelembabanTanah);
        $totalKelembabanTanah = 0;
        foreach ($dataKelembabanTanah as $kelembabanTanah) {
            $totalKelembabanTanah += $kelembabanTanah->kelembaban_tanah;
        }
        $rataRataKelembabanTanah = ($jumlahData > 0) ? $totalKelembabanTanah / $jumlahData : 0;

        //ketinggian saat ini
        $dataKetinggian = DataSensor::select('ketinggian', 'waktu_perekaman')->get();
        $ketinggianTerakhir = DataSensor::orderBy('waktu_perekaman', 'desc')->first();
        $ketinggianTerendah = DataSensor::min('ketinggian');
        $ketinggianTertinggi = DataSensor::max('ketinggian');
        $jumlahData = count($dataKetinggian);
        $totalKetinggian = 0;
        foreach ($dataKetinggian as $ketinggian) {
            $totalKetinggian += $ketinggian->ketinggian;
        }
        $rataRataKetinggian = ($jumlahData > 0) ? $totalKetinggian / $jumlahData : 0;

        //tekanan udara
        $dataTekananUdara = DataSensor::select('tekanan', 'waktu_perekaman')->get();
        $tekananUdaraTerakhir = DataSensor::orderBy('waktu_perekaman', 'desc')->first();
        $tekananUdaraTerendah = DataSensor::min('tekanan');
        $tekananUdaraTertinggi = DataSensor::max('tekanan');
        $jumlahData = count($dataTekananUdara);
        $totalTekananUdara = 0;
        foreach ($dataTekananUdara as $tekananUdara) {
            $totalTekananUdara += $tekananUdara->tekanan;
        }
        $rataRataTekananUdara = ($jumlahData > 0) ? $totalTekananUdara / $jumlahData : 0;

        return view('/user/pertinjau', compact(
            'dataSuhu', 'suhuTerakhir','rataRataSuhu','suhuTerendah','suhuTertinggi',
            'dataKelembabanUdara', 'kelembabanUdaraTerakhir', 'rataRataKelembabanUdara', 'kelembabanUdaraTerendah', 'kelembabanUdaraTertinggi',
            'dataCurahHujan', 'curahHujanTerakhir', 'rataRataCurahHujan', 'curahHujanTerendah', 'curahHujanTertinggi',
            'dataIntensitasCahaya', 'intensitasCahayaTerakhir', 'rataRataIntensitasCahaya', 'intensitasCahayaTerendah', 'intensitasCahayaTertinggi',
            'dataKualitasUdara', 'kualitasUdaraTerakhir', 'rataRataKualitasUdara', 'kualitasUdaraTerendah', 'kualitasUdaraTertinggi',
            'dataKelembabanTanah', 'kelembabanTanahTerakhir', 'rataRataKelembabanTanah', 'kelembabanTanahTerendah', 'kelembabanTanahTertinggi',
            'dataKetinggian', 'ketinggianTerakhir', 'rataRataKetinggian', 'ketinggianTerendah', 'ketinggianTertinggi',
            'dataTekananUdara', 'tekananUdaraTerakhir', 'rataRataTekananUdara', 'tekananUdaraTerendah', 'tekananUdaraTertinggi',
        ));
    }

    public function lihat_dashboard()
    {
        return view('/user/user-dashboard');
    }
    public function download_data()
    {
        return view('/user/download-data');
    }

    public function lihat_akun()
    {
        return view('/user/akun');
    }


    public function lihat_suhu(Request $request)
    {
        $user = User::with('lahan.sensor.dataSensor')->find(Auth::id());
        $dataSensor = DataSensor::orderBy('waktu_perekaman')->orderBy('id_sensor')->get();
        $dataLahan = $user->lahan ?? collect();
    
        return view('/user/suhu', compact('dataSensor', 'dataLahan'));
    }
    
    public function lihat_hujan()
    {
        $dataSensor = DataSensor::orderBy('waktu_perekaman')->orderBy('id_sensor')->get();
        return view('/user/curah-hujan', compact('dataSensor'));
    }

    public function lihat_cahaya()
    {
        $dataSensor = DataSensor::orderBy('waktu_perekaman')->orderBy('id_sensor')->get();
        return view('/user/intensitas-cahaya', compact('dataSensor'));
    }

    public function lihat_ktanah()
    {
        $dataSensor = DataSensor::orderBy('waktu_perekaman')->orderBy('id_sensor')->get();
        return view('/user/kelembapan-tanah', compact('dataSensor'));
    }

    public function lihat_kelembapan()
    {
        $dataSensor = DataSensor::orderBy('waktu_perekaman')->orderBy('id_sensor')->get();
        return view('/user/kelembapan', compact('dataSensor'));
    }

    public function lihat_ketinggian()
    {
        $dataSensor = DataSensor::orderBy('waktu_perekaman')->orderBy('id_sensor')->get();
        return view('/user/ketinggian', compact('dataSensor'));
    }

    public function lihat_kudara()
    {
        $dataSensor = DataSensor::orderBy('waktu_perekaman')->orderBy('id_sensor')->get();
        return view('/user/kualitas-udara', compact('dataSensor'));
    }

    public function lihat_tudara()
    {
        $dataSensor = DataSensor::orderBy('waktu_perekaman')->orderBy('id_sensor')->get();
        return view('/user/tekanan-udara', compact('dataSensor'));
    }

}
