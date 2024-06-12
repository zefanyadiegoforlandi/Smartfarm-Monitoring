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


class DaftarFarmerController extends Controller
{
    
    //DAFTAR TABLE
    public function daftar_farmer()
    {
        $token = session('jwt');

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

            return view('pages/add/daftar-farmer', compact('paginator', 'sensor'));
        }

        return redirect('/')->withErrors('Gagal mengambil data dari API.');
    }

    public function search_farmer(Request $request) {
        $token = session('jwt');

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

            $search = $request->search;
            
            // Filter users based on search criteria
            if (!empty($search)) {
                $users = $users->filter(function ($user) use ($search) {
                    return stripos($user->id, $search) !== false || 
                           stripos($user->name, $search) !== false || 
                           stripos($user->email, $search) !== false;
                });
            }
        }
        return view('pages/search/search-farmer', compact('search', 'users', 'paginator'));
    }

    public function store_farmer(Request $request)
    {
        $token = session('jwt');
        if (!$token) {
            return redirect('/')->withErrors('Token tidak ditemukan. Silakan login terlebih dahulu.');
        }
    
        // Validasi input dasar tanpa keunikan email
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'alamat_user' => 'required'
        ], [
            'name.required' => 'Nama wajib diisi!',
            'email.required' => 'Email wajib diisi!',
            'email.email' => 'Email harus valid!',
            'password.required' => 'Password wajib diisi!',
            'password.min' => 'Password minimal 8 karakter!',
            'alamat_user.required' => 'Alamat lahan wajib diisi',
        ]);
    
        // Cek keunikan email via API menggunakan form-data
        $response = Http::withToken($token)->asMultipart()->post("http://localhost/smartfarm_jwt/check-email/", [
            [
                'name' => 'email',
                'contents' => $validated['email']
            ]
        ]);
    
        if (!$response->successful()) {
            return redirect()->back()->withErrors('Gagal memeriksa keunikan email.');
        }
    
        if ($response->json()['message'] == 'Email is already in use.') {
            return redirect()->back()->withErrors('Email telah digunakan oleh user lain!');
        }
    
        // Lanjutkan proses simpan data jika email unik
        $client = new \GuzzleHttp\Client();
        $url = "http://localhost/smartfarm_jwt/users/";
    
        try {
            $response = $client->post($url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token
                ],
                'form_params' => [
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => $request->input('password'),
                    'level' => 'user',
                    'alamat_user' => $request->input('alamat_user'),
                ]
            ]);
    
            if ($response->getStatusCode() == 200) {
                return redirect('/pages/add/daftar-farmer')->with('tambah', 'Data berhasil ditambahkan');
            } else {
                return redirect()->back()->with('error', 'Gagal menyimpan data petani');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan data petani: ' . $e->getMessage());
        }
    }

    public function read_farmer_edit($id) {
        $token = session('jwt');
        if (!$token) {
            return redirect('/')->withErrors('Token tidak ditemukan. Silakan login terlebih dahulu.');
        }
    
        $response = Http::withToken($token)->get("http://localhost/smartfarm_jwt/");
        
        if ($response->successful()) {
            $apiData = $response->json();
            $users = collect(json_decode(json_encode($apiData['users']), false));
            $lahan = collect(json_decode(json_encode($apiData['lahan']), false));
            $sensor = collect(json_decode(json_encode($apiData['sensor']), false));
    
            $sensors = collect(); 
    
            $user = $users->firstWhere('id', $id); 
    
            if ($user) {
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
            } else {
                return redirect()->back()->withErrors('User tidak ditemukan.');
            }
        } else {
            return redirect()->back()->withErrors('Gagal mengambil data dari API.');
        }
    }

    public function form_farmer_edit(string $id) {
        $token = session('jwt');
        if (!$token) {
            return redirect('/')->withErrors('Token tidak ditemukan. Silakan login terlebih dahulu.');
        }
    
        $response = Http::withToken($token)->get("http://localhost/smartfarm_jwt/");
        
        if ($response->successful()) {
            $apiData = $response->json();
            $users = collect(json_decode(json_encode($apiData['users']), false));
    
            $user = $users->firstWhere('id', $id);
    
            if ($user) {
                return view('pages.edit-delete.form-farmer', compact('users', 'user'));
            } else {
                return redirect()->back()->withErrors('User tidak ditemukan.');
            }
        } else {
            return redirect()->back()->withErrors('Gagal mengambil data dari API.');
        }
    }
    
    

    public function form_farmer_update(Request $request, $id) {
        $token = session('jwt');
        if (!$token) {
            return redirect('/')->withErrors('Token tidak ditemukan. Silakan login terlebih dahulu.');
        }
    
        // Ambil data pengguna dari API
        $response = Http::withToken($token)->get("http://localhost/smartfarm_jwt/users/$id");
    
        if ($response->successful()) {
            $user = $response->json();
    
            if (!$user) {
                return redirect()->back()->with('error', 'User tidak ditemukan.');
            }
    
            // Validasi data yang diinput
            $validateData = $request->validate([
                'name' => 'required',
                'email' => [
                    'required',
                    'email',
                    function ($attribute, $value, $fail) use ($user, $token) {
                        if ($value !== $user['email']) {
                            // Memeriksa di database apakah email sudah ada
                            $existingUserResponse = Http::withToken($token)->get('http://localhost/smartfarm_jwt/users?email=' . $value);
                            $existingUsers = $existingUserResponse->json();
    
                            // Hanya melanjutkan jika ada pengguna yang ditemukan
                            if (!empty($existingUsers) && is_array($existingUsers)) {
                                foreach ($existingUsers as $existingUser) {
                                    if ($existingUser['email'] === $value && $existingUser['id'] != $user['id']) {
                                        $fail('Email telah digunakan oleh user lain!');
                                        return;
                                    }
                                }
                            }
                        }
                    },
                ],
                'password' => 'required|min:8',
                'alamat_user' => 'required'
            ]);
    
            // Membuat array untuk menyimpan field yang perlu diupdate
            $updateData = [];
            if ($request->input('name') !== $user['name']) {
                $updateData['name'] = $request->input('name');
            }
            if ($request->input('email') !== $user['email']) {
                $updateData['email'] = $request->input('email');
            }
            if ($request->input('password') !== $user['password']) {
                $updateData['password'] = $request->input('password');
            }
            if ($request->input('alamat_user') !== $user['alamat_user']) {
                $updateData['alamat_user'] = $request->input('alamat_user');
            }
            
            // Menambahkan level jika tidak ada di request
            $updateData['level'] = 'user';
    
            if (empty($updateData)) {
                return redirect()->back()->with('info', 'Tidak ada perubahan data.');
            }
    
            // Proses update jika validasi berhasil
            $client = new \GuzzleHttp\Client();
            $url = "http://localhost/smartfarm_jwt/users/$id";
    
            try {
                $response = $client->post($url, [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $token
                    ],
                    'form_params' => $updateData
                ]);
    
                if ($response->getStatusCode() == 200) {
                    // Cek hasil akhir yang disimpan
                    $updatedUserResponse = Http::withToken($token)->get("http://localhost/smartfarm_jwt/users/$id");
                    $updatedUser = $updatedUserResponse->json();
        
                    return redirect('/pages/add/daftar-farmer')->with('tambah', 'Data berhasil diupdate.');
                } else {
                    return redirect()->back()->with('error', 'Gagal menyimpan data petani');
                }
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Gagal menyimpan data petani: ' . $e->getMessage());
            }
        } else {
            return redirect()->back()->with('error', 'Gagal memeriksa database eksternal.');
        }
    }
    
    
    
    
    public function read_farmer_destroy($id) {
        $token = session('jwt');
        if (!$token) {
            return redirect('/')->withErrors('Token tidak ditemukan. Silakan login terlebih dahulu.');
        }
    
        $response = Http::withToken($token)->delete("http://localhost/smartfarm_jwt/users/$id");
    
        if ($response->successful()) {
            return redirect('/pages/add/daftar-farmer')->with('delete', 'Farmer berhasil dihapus');
        } else {
            return redirect('/pages/add/daftar-farmer')->with('error', 'Gagal menghapus Farmer');
        }
    }

    
    


}

