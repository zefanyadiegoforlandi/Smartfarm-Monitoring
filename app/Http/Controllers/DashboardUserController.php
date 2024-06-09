<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use GuzzleHttp\Client;

class DashboardUserController extends Controller
{
public function index()
    {
        $response = Http::get("http://localhost/smartfarm/smartfarm_api.php");

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

            return view('/pages/dashboard/user-dashboard', compact('paginator', 'sensor'));
        }
    }
}