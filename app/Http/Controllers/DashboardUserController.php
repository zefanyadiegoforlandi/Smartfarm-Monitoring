<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;

class DashboardUserController extends Controller
{
    public function index()
    {
        $token = session('jwt');
        $name = session('name');
        $level = session('level');
        
        if (!$token) {
            return redirect('/')->withErrors('Token tidak ditemukan. Silakan login terlebih dahulu.');
        }
    
        $response = Http::withToken($token)->get("http://localhost/smartfarm_jwt/");
        if ($response->successful()) {
            $apiData = $response->json();
            $users = collect(json_decode(json_encode($apiData['users']), false))
                ->where('level', 'user')
                ->sortByDesc('id'); 
            $perPage = 5; 
            $currentPage = request()->input('page', 1); 
            $paginator = new LengthAwarePaginator(
                $users->forPage($currentPage, $perPage), 
                $users->count(), 
                $perPage, 
                $currentPage 
            );
            $paginator->setPath(request()->url());
            $lahan = collect(json_decode(json_encode($apiData['lahan']), false));
            $sensor = collect(json_decode(json_encode($apiData['sensor']), false));

            foreach ($users as $user) {
                $userLahanIds = collect($lahan)->where('id_user', $user->id)->pluck('id_lahan');
                $totalUniqueSensors = collect($sensor)->whereIn('id_lahan', $userLahanIds)->unique('id_sensor')->count();
                $user->totalUniqueSensors = $totalUniqueSensors;
            }

            // Pass the filtered $userLahanIds to the Blade template
            return view('/pages/dashboard/user-dashboard', compact('paginator', 'sensor', 'name', 'level', 'userLahanIds'));
        }

        return redirect('/')->withErrors('Gagal mengambil data dari API.');
    }
}
