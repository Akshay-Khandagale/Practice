<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRegister;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    //
    public function create()
    {
        return view('Register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users_register,email',
            'password' => 'required|min:6|confirmed',
            'role'     => 'required|string',
        ]);

        UserRegister::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Registration successful!',
        ], 201);
    }

    public function loginPage()
    {
        return view('login');
    }

    public function loginDetails(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            $user = Auth::user();
    
            // Force JSON response with correct header
            return response()->json([
                'success' => true,
                'message' => 'Login successful',
                'role'    => $user->role ?? 'user',  // fallback if role null
            ]);
        }
    
        return response()->json([
            'success' => false,
            'message' => 'Invalid email or password',
        ], 401);
    }
}
