<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function fetchData()
    {
        $apiKey = config('services.smartfarm.api_key');
        $response = Http::get("http://localhost/smartfarm/smartfarm_api.php?api_key=$apiKey");

        // Proses respons sesuai kebutuhan Anda
        // Contoh: Mengembalikan data yang diterima dari API
        return $response->json();
    }
}
