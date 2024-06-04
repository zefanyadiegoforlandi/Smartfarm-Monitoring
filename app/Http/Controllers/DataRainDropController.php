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

    class DataRainDropController extends Controller
    {
        public function getData_RainDrop()
        {
            try {
                $response = Http::get('http://localhost/smartfarm/smartfarm_api.php?table=data_sensor');
                $dataSensors = $response->json();
        
                $sortedData = collect($dataSensors)->slice(-20)->values();

                $dataSensor = $sortedData->map(function ($item) {
                    return [
                        'RainDrop' => $item['RainDrop'],
                        'waktu_perekaman' => $item['waktu_perekaman'],
                        'id_sensor' => $item['id_sensor']
                    ];
                })->toArray();
                $dataTabel = $sortedData->slice(-10)->values()->map(function ($item) {
                    return [
                        'RainDrop' => $item['RainDrop'],
                        'waktu_perekaman' => $item['waktu_perekaman'],
                        'id_sensor' => $item['id_sensor']
                    ];
                })->toArray();

                $perPage = 5; 
                $currentPage = request()->input('page', 1); 

                // Create the paginator from a reversed collection
                $lengthAwarePaginator = new LengthAwarePaginator(
                    collect(array_reverse($dataSensor))->forPage($currentPage, $perPage), 
                    count($dataSensor), 
                    $perPage, 
                    $currentPage 
                );
                $lengthAwarePaginator->setPath(request()->url());
                $paginator = $lengthAwarePaginator->toArray();


                
                return view('/pages/data-sensor/raindrop', compact('paginator','dataSensor','dataTabel'));
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
        

        public function updateDataGrafik_RainDrop()
        {
            try {
                $response = Http::get('http://localhost/smartfarm/smartfarm_api.php?table=data_sensor');
                $dataSensors = $response->json();
    
                $sortedData = collect($dataSensors)->slice(-20)->values();
    
                $RainDrop = $sortedData->pluck('RainDrop')->toArray();
                $waktu_perekaman = $sortedData->pluck('waktu_perekaman')->toArray();
    
                return response()->json(['RainDrop' => $RainDrop, 'waktu_perekaman' => $waktu_perekaman]);
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
        
        public function updateDataTable_RainDrop()
        {
            try {
                // Ambil data dari sumber eksternal, misalnya dari HTTP request ke API
                $response = Http::get('http://localhost/smartfarm/smartfarm_api.php?table=data_sensor');
                $dataSensors = $response->json();
        
                // Olah data dan siapkan untuk ditampilkan dalam tabel
                $sortedData = collect($dataSensors)->slice(-10)->values();
        
                $dataTabel = $sortedData->map(function ($item) {
                    return [
                        'RainDrop' => $item['RainDrop'],
                        'waktu_perekaman' => $item['waktu_perekaman'],
                        'id_sensor' => $item['id_sensor']
                    ];
                })->toArray();

        
                return response()->json(['dataSensor' => $dataTabel]); // Mengembalikan data aktual, bukan paginasi
        
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }        