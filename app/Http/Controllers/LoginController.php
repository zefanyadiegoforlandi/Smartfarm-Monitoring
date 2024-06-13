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

        $key = "sm4rtf4rm";  // Replace with the actual secret key

        // Data to be sent to the API
        $postData = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // Send request to external API as form-data
        $response = Http::asForm()->post('http://localhost/smartfarm_jwt/login/', $postData);

        if ($response->successful()) {
            $data = $response->json();
            $token = $data['token'];

            try {
                $decoded = JWT::decode($token, new Key($key, 'HS256'));
                $level = $decoded->level;  
                $name = $decoded->name;  // Assuming the name is part of the JWT payload

                // Debugging statement to check decoded token
                // dd($decoded);
                
                // Save token and name in session
                session(['jwt' => $token, 'name' => $name, 'level' => $level]);  // Save name in session

                // Redirect based on user level
                if ($level === 'admin') {
                    return redirect()->intended(route('admin-dashboard'));
                } else {
                    return redirect()->intended(route('user-dashboard'));
                }
            } catch (\Exception $e) {
                return back()->withInput()->withErrors(['login' => 'Token tidak valid.']);
            }
        } elseif ($response->status() == 401) {
            // Check API response status
            return back()->withInput()->withErrors(['login' => 'Email atau password salah.']);
        } else {
            return back()->withInput()->withErrors(['login' => 'API tidak merespons.']);
        }
    }
}
