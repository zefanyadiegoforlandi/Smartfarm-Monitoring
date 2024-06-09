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

class DashboardController extends Controller
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

            return view('pages/dashboard/dashboard', compact('paginator', 'sensor'));
        }
    }

    public function daftar_farmer()
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

            return view('pages/dashboard/dashboard', compact('paginator', 'sensor'));
        }
    }

    public function search_farmer(Request $request)
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

            $search = $request->search;

            // Filter users based on search criteria
            if (!empty($search)) {
                $users = $users->filter(function ($user) use ($search) {
                    return stripos($user->id, $search) !== false || 
                           stripos($user->name, $search) !== false || 
                           stripos($user->email, $search) !== false;
                });
            }

            return view('pages/search/search-farmer', compact('search', 'users', 'paginator'));
        }
    }

    public function store_farmer(Request $request)
    {
        // Validasi data yang diterima dari request
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'alamat_user' => 'required'
        ], [
            'name.required' => 'Nama wajib diisi!',
            'email.required' => 'Email wajib diisi!',
            'email.email' => 'Email harus valid!',
            'email.unique' => 'Email telah digunakan oleh user lain!',
            'password.required' => 'Password wajib diisi!',
            'password.min' => 'Password minimal 8 karakter!',
            'alamat_user.required' => 'Alamat lahan wajib diisi',
        ]);

        $client = new Client();
        $url = "http://localhost/smartfarm/smartfarm_api.php?table=users";
        $hashedPassword = password_hash($request->input('password'), PASSWORD_BCRYPT);

        try {
            $response = $client->post($url, [
                'form_params' => [
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => $hashedPassword,
                    'level' => 'user', 
                    'alamat_user' => $request->input('alamat_user'),
                ]
            ]);

            $content = $response->getBody()->getContents();

            if ($response->getStatusCode() == 200) {
                return redirect('/pages/add/daftar-farmer')->with('tambah', 'Data berhasil ditambahkan');
            } else {
                return redirect()->back()->with('error', 'Gagal menyimpan data petani');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan data petani: ' . $e->getMessage());
        }
    }

    public function read_farmer_edit($id)
    {
        $response = Http::get("http://localhost/smartfarm/smartfarm_api.php");

        if ($response->successful()) {
            $apiData = $response->json();
            $users = collect(json_decode(json_encode($apiData['users']), false));
            $lahan = collect(json_decode(json_encode($apiData['lahan']), false));
            $sensor = collect(json_decode(json_encode($apiData['sensor']), false));

            $sensors = collect(); 

            $user = $users->firstWhere('id', $id); 

            $userLahanIds = $lahan->where('id_user', $user->id)->pluck('id_lahan');
            $userSensors = $sensor->whereIn('id_lahan', $userLahanIds)->unique('id_sensor');
            $sensors = $sensors->merge($userSensors);

            $perPage = 5; 
            $currentPage = request()->input('page', 1); 
            $paginator = new LengthAwarePaginator(
                $sensors->forPage($currentPage, $perPage), 
                $sensors->count(), 
                $perPage, 
                $currentPage 
            );
            $paginator->setPath(request()->url());

            return view('pages.edit-delete.read-farmer', compact('users', 'user', 'sensors', 'paginator'));
        }
    }

    public function form_farmer_edit(string $id)
    {
        $response = Http::get("http://localhost/smartfarm/smartfarm_api.php");

        if ($response->successful()) {
            $apiData = $response->json();
            $users = collect(json_decode(json_encode($apiData['users']), false));

            $sensors = collect(); 

            $user = $users->firstWhere('id', $id); 

            return view('pages.edit-delete.form-farmer', compact('users', 'user'));
        }
    }

    public function form_farmer_update(Request $request, $id)
    {
        $response = Http::get("http://localhost/smartfarm/smartfarm_api.php");
        $apiData = $response->json();
        $users = collect(json_decode(json_encode($apiData['users']), false));
        $user = $users->where('id', $id)->first();
        $validateData = $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                'email',
                function ($attribute, $value, $fail) use ($id) {
                    $response = Http::get("http://localhost/smartfarm/smartfarm_api.php");
                    if ($response->successful()) {
                        $apiData = $response->json();
                        $users = collect(json_decode(json_encode($apiData['users']), false));

                        // Cek apakah email sudah digunakan oleh ID lain
                        $existingUser = $users->where('email', $value)->where('id', '!=', $id)->first();
                        if ($existingUser) {
                            $fail('Email telah digunakan oleh user lain!');
                        }
                    } else {
                        $fail('Gagal memeriksa database eksternal.');
                    }
                },
            ],
            'password' => 'required|min:8',
            'alamat_user' => 'required'
        ], [
            'name.required' => 'Nama tidak boleh kosong!',
            'email.required' => 'Email tidak boleh kosong!',
            'email.email' => 'Email harus valid!',
            'password.required' => 'Password wajib diisi!',
            'password.min' => 'Password minimal 8 karakter!',
            'alamat_user.required' => 'Alamat tidak boleh kosong!',
        ]);

        $client = new Client();
        $url = "http://localhost/smartfarm/smartfarm_api.php?table=users&id=$id";

        try {
            $response = $client->post($url, [
                'form_params' => [
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => bcrypt($request->input('password')),
                    'level' => 'user', 
                    'alamat_user' => $request->input('alamat_user'),
                ]
            ]);

            if ($response->getStatusCode() == 200) {
                return redirect('/pages/add/daftar-farmer')->with('tambah', 'Data berhasil diupdate');
            } else {
                return redirect()->back()->with('error', 'Gagal menyimpan data petani');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan data petani: ' . $e->getMessage());
        }
    }

    public function read_farmer_destroy($id)
    {
        $response = Http::delete("http://localhost/smartfarm/smartfarm_api.php?table=users&id=$id");

        if ($response->successful()) {
            return redirect('/pages/add/daftar-farmer')->with('delete', 'Farmer berhasil dihapus');
        } else {
            return redirect('/pages/add/daftar-farmer')->with('error', 'Gagal menghapus Farmer');
        }
    }
}
