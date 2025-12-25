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

    public function createlogin()
    {
        return view('login');
    }

    public function loginData(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        if (!Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }
    
        $user = Auth::user(); // UserRegister model
    
        // create sanctum token
        $token = $user->createToken('login-token')->plainTextToken;
    
        return response()->json([
            'success' => true,
            'message' => 'Login successful',
            'token' => $token,
            'user' => $user
        ]);
    }
}