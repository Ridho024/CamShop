<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function registrationView()
    {
        return view('routes/login_register/registration-form');
    }

    public function registrationProses(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'username' => ['required', 'string', 'max:50', 'unique:users'],
            'password' => ['required', 'string', 'max:20', 'confirmed']
        ]);

        $newUser = User::create([
            'username' => $request->username,
            'role' => 'Member',
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        if ($newUser) {
            $user = User::where('username', $request->username)->first();
            $request->session()->put([
                'isLogin' => true,
                'idUser' => $user->id,
                'role' => $user->role,
            ]);

            return redirect('homepage');
        } else {

            return "Registration failed";
        }

        return "Gagal boy";

        // return response()->json(['message' => 'Registration successful', 'user' => $newUser], 201);
    }
}
