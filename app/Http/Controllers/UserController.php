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
use App\Models\DataSensor;
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

    public function form_auth_update(Request $request, $id)
    {
        // Validasi form
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required|min:8',
            'id' => 'required',
        ]);
    
        try {
            // Ambil data pengguna
            $user = User::findOrFail($id);
    
            // Perbarui data pengguna
            $user->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'alamat_user' => $request->input('alamat_user'),
            ]);
    
            // Perbarui data sesi
            session()->regenerate();
    
            return redirect('/pages/add/daftar-farmer')->with('success', 'Farmer updated successfully');
        } catch (\Exception $e) {
            \Log::error('Error in form_auth_update: ' . $e->getMessage());
    
            return back()->with('error', 'Error updating farmer. Please try again.');
        }
    }
    
}


