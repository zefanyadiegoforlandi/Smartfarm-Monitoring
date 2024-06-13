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


    class DaftarSensorController extends Controller
    {
        
        //DAFTAR TABLE
        public function daftar_sensor()
        {
            $token = session('jwt');
        
            if (!$token) {
                return redirect('/')->withErrors('Token tidak ditemukan. Silakan login terlebih dahulu.');
            }
        
            $response = Http::withToken($token)->get("http://localhost/smartfarm_jwt/");
        
            if ($response->successful()) {
                $apiData = $response->json();
                $lahan = collect(json_decode(json_encode($apiData['lahan']), false));
                $sensors = collect(json_decode(json_encode($apiData['sensor']), false))
                    ->sortByDesc('id_sensor');
        
                $sensor = $sensors->map(function ($sensor) use ($lahan) {
                    $matchedLahan = $lahan->firstWhere('id_lahan', $sensor->id_lahan);
                    $sensor->alamat_lahan = $matchedLahan ? $matchedLahan->alamat_lahan : 'Tidak ada lahan';
                    return $sensor;
                });
        
                $perPage = 5;
                $currentPage = request()->input('page', 1);
                $paginator = new LengthAwarePaginator(
                    $sensor->forPage($currentPage, $perPage),
                    $sensor->count(),
                    $perPage,
                    $currentPage
                );
                $paginator->setPath(request()->url());
        
                return view('pages/add/daftar-sensor', compact('paginator', 'lahan'));
            } else {
                // Jika permintaan tidak berhasil, tangani kesalahan di sini
                return redirect()->back()->withErrors('Gagal mengambil data sensor dari server.');
            }
        }
        

        public function search_sensor(Request $request) {
            try {
                $token = session('jwt');
        
                if (!$token) {
                    return redirect('/')->withErrors('Token tidak ditemukan. Silakan login terlebih dahulu.');
                }
        
                $response = Http::withToken($token)->get("http://localhost/smartfarm_jwt/");
        
                if ($response->successful()) {
                    $apiData = $response->json();
                    $lahan = collect(json_decode(json_encode($apiData['lahan']), false));
                    $sensors = collect(json_decode(json_encode($apiData['sensor']), false))
                        ->sortByDesc('id_sensor'); 
        
                    $sensor = $sensors->map(function ($sensor) use ($lahan) {
                        $matchedLahan = $lahan->firstWhere('id_lahan', $sensor->id_lahan);
                        $sensor->alamat_lahan = $matchedLahan ? $matchedLahan->alamat_lahan : 'Tidak ada lahan';
                        return $sensor;
                    });
        
                    $search = $request->search;
        
                    // Filter sensor based on search criteria
                    if (!empty($search)) {
                        $sensor = $sensor->filter(function ($sensor) use ($search) {
                            return stripos($sensor->id_sensor, $search) !== false || 
                                   stripos($sensor->id_lahan, $search) !== false ||
                                   stripos($sensor->alamat_lahan, $search) !== false;
                        });
                    }
                }
        
                return view('pages/search/search-sensor', compact('search', 'sensor','lahan'));
            } catch (Exception $e) {
                // Tangani kesalahan yang terjadi saat melakukan permintaan HTTP
                return redirect()->back()->withErrors('Terjadi kesalahan saat mengambil data sensor dari server.');
            }
        }
        



        public function store_sensor(Request $request)
        {
            try {
                $token = session('jwt');

                if (!$token) {
                    return redirect('/')->withErrors('Token tidak ditemukan. Silakan login terlebih dahulu.');
                }

                $responseUsers = Http::withToken($token)->get("http://localhost/smartfarm_jwt/");
                $apiData = $responseUsers->json();

                $request->validate([
                    'id_lahan' => 'required',
                    'tanggal_aktivasi' => 'required',
                ], [
                    'id_lahan' => 'Lahan wajib di isi',  
                    'tanggal_aktivasi' => 'Tanggal aktivasi harus diisi.',
                ]);

                $url = "http://localhost/smartfarm_jwt/sensor/";
                $responseSensor = Http::withToken($token)->get($url);
                $sensorData = $responseSensor-json();


                $sensorResponse = $client->get($url);
                $sensorData = json_decode($sensorResponse->getBody()->getContents(), true);
                $lastIdFromAPI = null;
                if (!empty($sensorData)) {
                    $lastIdFromAPI = end($sensorData)['id_sensor'];
                }

                // Menghitung ID berikutnya
                $nextNumber = ($lastIdFromAPI) ? intval(substr($lastIdFromAPI, 1)) + 1 : 1;
                $nextNumber = min($nextNumber, 1001);
                $formattedNumber = str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
                $newIdSensor = 'S' . $formattedNumber;


                $response = Http::withToken($token)->asFrom()->post($url, [
                    'form_params' => [
                        'id_sensor' => $newIdSensor,
                        'id_lahan' => $request->id_lahan,
                        'tanggal_aktivasi' => $request->tanggal_aktivasi,
                    ]
                ]);

                if ($response->failed()) {
                    return redirect()->back()->with('error', 'Gagal menyimpan data sensor:' . $response->body());
                }

                $content = $response->body();

                return redirect('/pages/add/daftar-sensor')->with('tambah', 'Sensor berhasil ditambahkan');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Gagal menyimpan data sensor: ' . $e->getMessage());
            }
        }

        
        public function read_sensor_edit($id_sensor)
        {
            try {
                $token = session('jwt');
        
                if (!$token) {
                    return redirect('/')->withErrors('Token tidak ditemukan. Silakan login terlebih dahulu.');
                }
        
                $response = Http::withToken($token)->get("http://localhost/smartfarm_jwt/");
        
                if ($response->successful()) {
                    $apiData = $response->json();
                    $lahan = collect(json_decode(json_encode($apiData['lahan']), false));
                    $sensors = collect(json_decode(json_encode($apiData['sensor']), false))
                        ->where('id_sensor', $id_sensor);
        
                    $sensor = $sensors->map(function ($sensor) use ($lahan) {
                        $matchedLahan = $lahan->firstWhere('id_lahan', $sensor->id_lahan);
                        $sensor->alamat_lahan = $matchedLahan ? $matchedLahan->alamat_lahan : 'Tidak ada lahan';
                        return $sensor;
                    });
                    $sensor = $sensor->first();
        
                    return view('pages.edit-delete.read-sensor', compact('sensor'));
                }
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Gagal mengambil data sensor: ' . $e->getMessage());
            }
        }
        
        public function form_sensor_edit(string $id_sensor)
        {
            try {
                $token = session('jwt');
        
                if (!$token) {
                    return redirect('/')->withErrors('Token tidak ditemukan. Silakan login terlebih dahulu.');
                }
        
                $response = Http::withToken($token)->get("http://localhost/smartfarm_jwt/");
        
                if ($response->successful()) {
                    $apiData = $response->json();
                    $lahan = collect(json_decode(json_encode($apiData['lahan']), false));
                    $sensors = collect(json_decode(json_encode($apiData['sensor']), false))
                        ->where('id_sensor', $id_sensor);
        
                    $sensor = $sensors->map(function ($sensor) use ($lahan) {
                        $matchedLahan = $lahan->firstWhere('id_lahan', $sensor->id_lahan);
                        $sensor->alamat_lahan = $matchedLahan ? $matchedLahan->alamat_lahan : 'Tidak ada lahan';
                        return $sensor;
                    });
                    $sensor = $sensor->firstWhere('id_sensor', $id_sensor);
        
                    return view('pages.edit-delete.form-sensor', compact('sensor', 'lahan'));
                }
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Gagal mengambil data sensor: ' . $e->getMessage());
            }
        }
        
        public function form_sensor_update(Request $request, $id_sensor)
        {
            try {
                $token = session('jwt');
        
                if (!$token) {
                    return redirect('/')->withErrors('Token tidak ditemukan. Silakan login terlebih dahulu.');
                }
        
                $responseUsers = Http::withToken($token)->get("http://localhost/smartfarm_jwt/");
                $apiData = $responseUsers->json();
        
                $users = collect(json_decode(json_encode($apiData['users']), false));
                $lahan = collect(json_decode(json_encode($apiData['lahan']), false));
                $request->validate([
                    'id_lahan' => 'required',
                    'tanggal_aktivasi' => 'required',
                ], [
                    'id_lahan' => 'Lahan wajib di isi',
                    'tanggal_aktivasi' => 'Tanggal aktivasi harus diisi.',
                ]);
        
                $client = new Client();
                $url = "http://localhost/smartfarm_jwt/sensor/$id_sensor";
        
                // Lanjutkan dengan menyimpan data
                $response = $client->post($url, [
                    'form_params' => [
                        'id_lahan' => $request->id_lahan,
                        'tanggal_aktivasi' => $request->tanggal_aktivasi,
                    ]
                ]);
        
                $content = $response->getBody()->getContents();
                return redirect('/pages/add/daftar-sensor')->with('tambah', 'Sensor berhasil diupdate');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Gagal menyimpan data sensor: ' . $e->getMessage());
            }
        }

        public function read_sensor_destroy($id_sensor)
        {
            try {
                $token = session('jwt');

                if (!$token) {
                    return redirect('/')->withErrors('Token tidak ditemukan. Silakan login terlebih dahulu.');
                }

                $response = Http::withToken($token)->delete("http://localhost/smartfarm_jwt/sensor/$id_sensor");

                if ($response->successful()) {
                    return redirect('/pages/add/daftar-sensor')->with('delete', 'Sensor berhasil dihapus');
                } else {
                    return redirect('/pages/add/daftar-sensor')->with('error', 'Gagal menghapus Sensor');
                }
            } catch (\Exception $e) {
                return redirect('/pages/add/daftar-sensor')->with('error', 'Gagal menghapus Sensor: ' . $e->getMessage());
            }
        }


}




