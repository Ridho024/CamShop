<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginRequired()
    {
        return view('/routes/login_register/login-required');
    }

    public function loginForm()
    {
        return view('/routes/login_register/login-form');
    }

    public function loginProses(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'exists_in_database:email,email'],
            'username' => ['required', 'exists_in_database:username,username'],
            'password' => ['required'] // 'confirmed' buat nanti registrasi
        ], [
            'email.exists_in_database' => 'Email address not found',
            'username.exists_in_database' => 'Username not found',
        ]);

        if (Auth::attempt($credentials)) {

            if (Auth::check()) {
                $user = User::where('username', $request->username)->first();
                $request->session()->put([
                    'isLogin' => true,
                    'idUser' => $user->id,
                    'role' => $user->role,
                ]);

                return redirect('homepage');
        
                // if ($user->role == 'Admin') {
                    
                //     // return "Login Berhasil";

                //     return view('routes/homepage/admin-dashboard', ['adminProfile' => $user]); 
                //     // Ini harusnya di proses di homepage ngab
                //     // Jadi kita cuma ngirim session
                //     // return redirect()->intended('list-product');
                // } else if ($user->role == 'Member') {
                //     return "You are usual buddy";
                // }
            }

            return "Something in trouble please try again...";
        }

        return view('routes/login_register/login-form')->with('wrongPassword', true);
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate(); // Invalidate session
        $request->session()->regenerateToken(); // Regenerate token

        return redirect('list-product');
    }
}
