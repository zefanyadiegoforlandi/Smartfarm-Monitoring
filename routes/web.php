<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardUserController;

use App\Http\Controllers\DaftarFarmerController;
use App\Http\Controllers\DaftarLahanController;
use App\Http\Controllers\DaftarSensorController;
use App\Http\Controllers\FarmerController;
use App\Http\Controllers\DataRainDropController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Http;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [LoginController::class, 'login']);

Route::middleware('jwt.auth')->group(function () {
    Route::get('/pages/dashboard/admin-dashboard', [DashboardController::class, 'index'])->name('admin-dashboard');
    Route::get('/pages/dashboard/user-dashboard', [DashboardUserController::class, 'index'])->name('user-dashboard');
});

Route::get('/components/table-daftar-lahan', [DashboardController::class, 'table_daftar_lahan'])->name('table-daftar-lahan');
//Daftar Table//

//Daftar Table//
Route::get('/pages/add/daftar-farmer', [DaftarFarmerController::class, 'daftar_farmer'])->name('daftar-farmer');
Route::get('/pages/add/daftar-lahan', [DaftarLahanController::class, 'daftar_lahan'])->name('daftar-lahan');
Route::get('/pages/add/daftar-sensor', [DaftarSensorController::class, 'daftar_sensor'])->name('daftar-sensor');

//Search//
Route::get('/pages/search/search-farmer', [DaftarFarmerController::class, 'search_farmer'])->name('search-farmer');
Route::get('/pages/search/search-lahan', [DaftarLahanController::class, 'search_lahan'])->name('search-lahan');
Route::get('/pages/search/search-sensor', [DaftarSensorController::class, 'search_sensor'])->name('search-sensor');

//Create//
Route::post('/pages/add/daftar-farmer', [DaftarFarmerController::class, 'store_farmer'])->name('farmer-store');
Route::post('/pages/add/daftar-lahan', [DaftarLahanController::class, 'store_lahan'])->name('lahan-store');
Route::post('/pages/add/daftar-sensor', [DaftarSensorController::class, 'store_sensor'])->name('sensor-store');

//Edit-Delete Farmer//
Route::get('/pages/edit-delete/read-farmer/{id}', [DaftarFarmerController::class, 'read_farmer_edit'])->name('read-farmer.edit');
Route::get('/pages/edit-delete/form-farmer/{id}', [DaftarFarmerController::class, 'form_farmer_edit'])->name('form-farmer.edit');
Route::delete('/pages/edit-delete/read-farmer/{id}', [DaftarFarmerController::class, 'read_farmer_destroy'])->name('read-farmer.destroy');
Route::post('/pages/edit-delete/form-farmer/{id}', [DaftarFarmerController::class, 'form_farmer_update'])->name('form-farmer.update');

//Edit-Delete Lahan//
Route::get('/pages/edit-delete/read-lahan/{id}', [DaftarLahanController::class, 'read_lahan_edit'])->name('read-lahan.edit');
Route::get('/pages/edit-delete/form-lahan/{id}', [DaftarLahanController::class, 'form_lahan_edit'])->name('form-lahan.edit');
Route::delete('/pages/edit-delete/read-lahan/{id}', [DaftarLahanController::class, 'read_lahan_destroy'])->name('read-lahan.destroy');
Route::post('/pages/edit-delete/form-lahan/{id}', [DaftarLahanController::class, 'form_lahan_update'])->name('form-lahan.update');

//Edit-Delete Sensor
Route::get('/pages/edit-delete/read-sensor/{id}', [DaftarSensorController::class, 'read_sensor_edit'])->name('read-sensor.edit');
Route::get('/pages/edit-delete/form-sensor/{id}', [DaftarSensorController::class, 'form_sensor_edit'])->name('form-sensor.edit');
Route::delete('/pages/edit-delete/read-sensor/{id}', [DaftarSensorController::class, 'read_sensor_destroy'])->name('read-sensor.destroy');
Route::post('/pages/edit-delete/form-sensor/{id}', [DaftarSensorController::class, 'form_sensor_update'])->name('form-sensor.update');

//Edit-Delete Auth//
Route::get('/pages/edit-delete/read-auth/{id}', [DashboardController::class, 'read_auth_edit'])->name('read-auth.edit');
Route::get('/pages/edit-delete/form-auth/{id}', [DashboardController::class, 'form_auth_edit'])->name('form-auth.edit');
Route::post('/pages/edit-delete/form-auth/{id}', [UserController::class, 'form_auth_update'])->name('form-auth.update');

Route::get('redirects', [UserController::class, 'index']);

Route::get('/user/user-dashboard', [FarmerController::class, 'lihat_dashboard'])->name('dashboard.lihat');
Route::get('/user/pertinjau', [FarmerController::class, 'lihat_pertinjau'])->name('pertinjau.lihat');

Route::get('/user/download', [FarmerController::class, 'download_data'])->name('download.data');

Route::get('/user/akun', [FarmerController::class, 'lihat_akun'])->name('akun.lihat');

Route::get('/user/suhu', [FarmerController::class, 'lihat_suhu'])->name('suhu.lihat');
Route::get('/user/intensitas-cahaya', [FarmerController::class, 'lihat_cahaya'])->name('cahaya.lihat');
Route::get('/user/kelembapan-tanah', [FarmerController::class, 'lihat_ktanah'])->name('ktanah.lihat');
Route::get('/user/kelembapan', [FarmerController::class, 'lihat_kelembapan'])->name('kelembapan.lihat');
Route::get('/user/ketinggian', [FarmerController::class, 'lihat_ketinggian'])->name('ketinggian.lihat');
Route::get('/user/kualitas-udara', [FarmerController::class, 'lihat_kudara'])->name('kudara.lihat');
Route::get('/user/tekanan-udara', [FarmerController::class, 'lihat_tudara'])->name('tudara.lihat');

Route::get('/pages/data-sensor/raindrop', [DataRainDropController::class, 'getData_RainDrop'])->name('raindrop');
Route::get('/update-data-grafik', [DataRainDropController::class, 'updateDataGrafik_RainDrop']);
Route::get('/update-data-table', [DataRainDropController::class, 'updateDataTable_RainDrop'])->name('update-data-table');

Route::get('/sensors/{id_lahan}', [FarmerController::class, 'getSensorsByLahan']);




Route::get('/smartfarm-api', function () {
    $apiKey = config('services.smartfarm.api_key');
    $response = Http::get("http://localhost/smartfarm/smartfarm_api.php?api_key=$apiKey");
});

 














