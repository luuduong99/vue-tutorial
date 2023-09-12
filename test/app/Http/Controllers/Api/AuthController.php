<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'password' => ['required'],
            'email' => ['required', 'email']
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        $token = $user->createToken('token')->plainTextToken;

        return response()->json(['token' => $token, 'user' => $user], 201);
    }

    public function login(Request $request)
    {
        // return response()->json(['success', 'ok'], 201);
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $data['email'])->first();

        if (Hash::check($data['password'], $user->password)) {
            $token = $user->createToken('token')->plainTextToken; 
            return response()->json(['token' => $token, 'user' => $user]);
        } else {
            return response()->json(['message' => 'Invalid password'], 401);
        }
        

        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
        //     $user = Auth::user();
        //     return response()->json(['user' => $user]);
        // }

        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ]);

        // $token = $user->createToken('token')->plainTextToken;

        // return response()->json(['token' => $token, 'user' => $user], 201);
    }

    public function logout()
    {
        auth()->user()->currentAccessToken()->delete();

        return [
            'message' => 'Logout'
        ];
    }
}
