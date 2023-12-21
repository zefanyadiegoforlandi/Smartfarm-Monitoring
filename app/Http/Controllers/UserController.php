<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\DataFeed;
use Carbon\Carbon;
use App\Models\Users;
use App\Models\Sensor;
use App\Models\Lahan;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $batas = 15;
        $users = User::with(['lahan.sensor'])
            ->orderBy('id', 'desc')
            ->paginate($batas);

        $lahan = Lahan::orderBy('id_lahan', 'desc')->paginate($batas);
        $sensor = Sensor::orderBy('id_sensor', 'desc')->paginate($batas);
        $jumlah_users = User::count();
        $jumlah_sensor = Sensor::count();
        $jumlah_lahan = Lahan::count();
        $no = $batas * ($users->currentPage() - 1);

        $level = Auth::user()->level;

        if ($level == 'admin') {
            // ... your existing code ...

            // Setelah berhasil login
            Session::regenerate();

            return view('/pages/dashboard/dashboard', compact('users', 'sensor', 'lahan', 'jumlah_users', 'jumlah_lahan', 'jumlah_sensor'));
        } else {
            return view('/user/user-dashboard');
        }
    }
}
