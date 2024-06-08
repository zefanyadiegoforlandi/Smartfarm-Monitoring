<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Import model User
use App\Models\Lahan; // Import model Lahan
use App\Models\Sensor; // Import model Sensor


class LoginController extends Controller
{
    public function showLoginForm()
    {
        $response = Http::get('http://localhost/RESTful-API-Smartfarm-Monitoring/users/');
        $users = $response->json();
        return view('auth.login', ['users' => $users]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $response = Http::get('http://localhost/RESTful-API-Smartfarm-Monitoring/users/');
        $users = $response->json();

        $user = collect($users)->firstWhere('email', $request->email);

        if ($user && password_verify($request->password, $user['password'])) {
            // Simpan atau perbarui data pengguna di database lokal
            $localUser = User::updateOrCreate(
                ['email' => $user['email']], // Kondisi untuk mencari pengguna di database lokal
                [
                    'name' => $user['name'],
                    'password' => $user['password'],
                    'level' => $user['level'],
                    'alamat_user' => $user['alamat_user']
                    // Tambahkan field lain yang diperlukan
                ]
            );

            Auth::login($localUser); // Login menggunakan model lokal

            // Ambil lahan terkait dengan pengguna yang sedang login
            $lahan = Lahan::where('id_user', $localUser->id)->get();

            // Simpan data lahan pada sesi pengguna
            session(['lahan' => $lahan]);

            if ($localUser->level === 'admin') {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('dashboard.lihat');
            }
        }

        return back()->withInput()->withErrors(['email' => 'Email atau password salah']);
    }
}
?>
