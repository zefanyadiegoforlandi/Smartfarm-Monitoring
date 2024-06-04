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


    class DaftarLahanController extends Controller
    {
        
        //DAFTAR TABLE
        public function daftar_lahan()
        {
            $response = Http::get("http://localhost/smartfarm/smartfarm_api.php");
            
            if ($response->successful()) {

                    $apiData = $response->json();
                    $users = collect(json_decode(json_encode($apiData['users']), false));
                    $lahan = collect(json_decode(json_encode($apiData['lahan']), false))
                    ->sortByDesc('id_lahan'); 

                    $lahan = $lahan->map(function ($item) use ($users) {
                        $users = $users->where('id', $item->id_user)->first();
                        $item->user_name = $users ? $users->name : '';
                        return $item;
                    });

                    $perPage = 5; 
                    $currentPage = request()->input('page', 1); 
                    $paginator = new LengthAwarePaginator(
                        $lahan->forPage($currentPage, $perPage), 
                        $lahan->count(), 
                        $perPage, 
                        $currentPage 
                    );
                    $paginator->setPath(request()->url());

            return view('pages/add/daftar-lahan', compact('paginator','users'));
        

        }
    }

    public function search_lahan(Request $request) {
        $response = Http::get("http://localhost/smartfarm/smartfarm_api.php");
        
            if ($response->successful()) {
                $apiData = $response->json();
                $users = collect(json_decode(json_encode($apiData['users']), false));
                $lahans = collect(json_decode(json_encode($apiData['lahan']), false))
                ->sortByDesc('id_lahan'); 

                $lahan = $lahans->map(function ($item) use ($users) {
                    $users = $users->where('id', $item->id_user)->first();
                    $item->user_name = $users ? $users->name : '';
                    return $item;
                });

                $search = $request->search;
                
                // Filter users based on search criteria
                if (!empty($search)) {
                    $lahan = $lahan->filter(function ($lahan) use ($search) {
                        return stripos($lahan->id_lahan, $search) !== false || 
                               stripos($lahan->user_name, $search) !== false ||
                               stripos($lahan->alamat_lahan, $search) !== false;
                    });
                }
            }
        return view('pages/search/search-lahan', compact('search', 'lahan'));

    }



    public function store_lahan(Request $request)
    {
        $responseUsers = Http::get("http://localhost/smartfarm/smartfarm_api.php");
        $apiData = $responseUsers->json();

        $users = collect(json_decode(json_encode($apiData['users']), false));
        $request->validate([

            'id_user' => 'required',
            'alamat_lahan' => 'required',
            'luas_lahan' => 'required|numeric|min:0',
        ], [
            'id_user' => 'Nama wajib di isi',
            'id_user.exists' => 'ID User tidak tersedia dalam database.',
            'alamat_lahan.required' => 'Alamat lahan harus diisi.',
            'luas_lahan.required' => 'Luas lahan harus diisi.',
            'luas_lahan.numeric' => 'Luas lahan harus berupa nilai numerik.',
            'luas_lahan.min:0' => 'Luas lahan tidak boleh minus.',
        ]);

        $client = new Client();
        $url = "http://localhost/smartfarm/smartfarm_api.php?table=lahan";

        try {
            $lahanResponse = $client->get($url);
            $lahanData = json_decode($lahanResponse->getBody()->getContents(), true);
            $lastIdFromAPI = null;
            if (!empty($lahanData)) {
                $lastIdFromAPI = end($lahanData)['id_lahan'];
            }

            // Menghitung ID berikutnya
            $nextNumber = ($lastIdFromAPI) ? intval(substr($lastIdFromAPI, 1)) + 1 : 1;
            $nextNumber = min($nextNumber, 1001);
            $formattedNumber = str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
            $newIdLahan = 'L' . $formattedNumber;

            // Lanjutkan dengan menyimpan data
            $response = $client->post("http://localhost/smartfarm/smartfarm_api.php?table=lahan", [
                'form_params' => [
                    'id_lahan' => $newIdLahan,
                    'id_user' => $request->id_user,
                    'alamat_lahan' => $request->alamat_lahan,
                    'luas_lahan' => $request->luas_lahan,
                ]
            ]);

            $content = $response->getBody()->getContents();
           
            return redirect('/pages/add/daftar-lahan')->with('tambah', 'Lahan berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan data lahan: ' . $e->getMessage());
        }
    }







    public function read_lahan_edit($id_lahan) {
        $response = Http::get("http://localhost/smartfarm/smartfarm_api.php");
            
        if ($response->successful()) {
            $apiData = $response->json();
            $users = collect(json_decode(json_encode($apiData['users']), false));
            $lahans = collect(json_decode(json_encode($apiData['lahan']), false))
                        ->where('id_lahan', $id_lahan); // Mengambil data lahan dengan id_lahan yang sesuai
    
            $lahans = $lahans->map(function ($item) use ($users) {
                $users = $users->where('id', $item->id_user)->first();
                $item->user_name = $users ? $users->name : '';
                return $item;
            });
            $lahan = $lahans->first(); //data terbentuk collection

            return view('pages.edit-delete.read-lahan', compact('lahan'));
        }
    }
    
    
    public function form_lahan_edit(string $id_lahan) {
        $response = Http::get("http://localhost/smartfarm/smartfarm_api.php");
    
        if ($response->successful()) {
            $apiData = $response->json();
            $users = collect(json_decode(json_encode($apiData['users']), false));
            $lahans = collect(json_decode(json_encode($apiData['lahan']), false));
            $lahan = $lahans->map(function ($item) use ($users) {
                $users = $users->where('id', $item->id_user)->first();
                $item->user_name = $users ? $users->name : '';
                return $item;
            });
            $lahan = $lahans->firstWhere('id_lahan', $id_lahan); 
         
            return view('pages.edit-delete.form-lahan', compact('lahan','users'));
        }
    }

  

    public function form_lahan_update(Request $request, $id_lahan)
    {
        $responseUsers = Http::get("http://localhost/smartfarm/smartfarm_api.php");
        $apiData = $responseUsers->json();

        $users = collect(json_decode(json_encode($apiData['users']), false));
        $lahan = collect(json_decode(json_encode($apiData['lahan']), false));
        $request->validate([

            'id_user' => 'required',
            'alamat_lahan' => 'required',
            'luas_lahan' => 'required|numeric|min:0',
        ], [
            'id_user' => 'Nama wajib di isi',
            'id_user.exists' => 'ID User tidak tersedia dalam database.',
            'alamat_lahan.required' => 'Alamat lahan harus diisi.',
            'luas_lahan.required' => 'Luas lahan harus diisi.',
            'luas_lahan.numeric' => 'Luas lahan harus berupa nilai numerik.',
            'luas_lahan.min:0' => 'Luas lahan tidak boleh minus.',
        ]);

        $client = new Client();
        $url = "http://localhost/smartfarm/smartfarm_api.php?table=lahan&id_lahan=$id_lahan";
        try {

            // Lanjutkan dengan menyimpan data
            $response = $client->post($url, [
                'form_params' => [
                    'id_lahan'=> $id_lahan,
                    'id_user' => $request->id_user,
                    'alamat_lahan' => $request->alamat_lahan,
                    'luas_lahan' => $request->luas_lahan,
                ]
            ]);

            $content = $response->getBody()->getContents();
  
            return redirect('/pages/add/daftar-lahan')->with('tambah', 'Lahan berhasil diupdate');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan data lahan: ' . $e->getMessage());
        }
    }

    public function read_lahan_destroy($id_lahan) {
        $response = Http::delete("http://localhost/smartfarm/smartfarm_api.php?table=lahan&id_lahan=$id_lahan");
    
        if ($response->successful()) {
            return redirect('/pages/add/daftar-lahan')->with('delete', 'Lahan berhasil dihapus');
        } else {
            return redirect('/pages/add/daftar-lahan')->with('error', 'Gagal menghapus Lahan');
        }
    }

}




