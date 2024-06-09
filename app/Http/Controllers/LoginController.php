<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $key = "sm4rtf4rm";  // Gantikan dengan secret key yang sebenarnya

        // Data yang akan dikirim ke API
        $postData = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // Mengirim permintaan ke API eksternal sebagai form-data
        $response = Http::asForm()->post('http://localhost/smartfarm_jwt/login/', $postData);

        if ($response->successful()) {
            $data = $response->json();
            $token = $data['token'];

            // Decode JWT token untuk mendapatkan level pengguna
            $decoded = JWT::decode($token, new Key($key, 'HS256'));
            $level = $decoded->level;  // Mengambil level dari token yang didecode

            // Simpan token di session atau cookie
            session(['jwt' => $token]);  // Contoh menggunakan session

            // Redirect berdasarkan level pengguna
            if ($level === 'admin') {
                return redirect()->intended('/dashboard');
            } else {
                return redirect()->intended('/dashboard.lihat');
            }
        }

        return back()->withInput()->withErrors(['login' => 'Email atau password tidak valid atau API tidak merespons.']);
    }
}
