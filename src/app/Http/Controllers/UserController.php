<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|min:5|max:55',
                'email' => 'email|required|unique:users',
                'password' => 'required'
            ]);

            $validatedData['password'] = Hash::make($request->password);

            $user = User::create($validatedData);

            $accessToken = $user->createToken('authToken')->plainTextToken;

            return response(['user' => $user, 'access_token' => $accessToken, 'code' => 200, 'message' => 'User registered successfully']);
        } catch (\Exception $e) {
            // Return a response with a 500 status code
            return response(['user' => null, 'access_token' => null, 'code' => 500, 'message' => $e->getMessage()]);
        }
    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['user' => null, 'access_token' => null, 'code' => 500, 'message' => 'Invalid credentials']);
        }

        $accessToken = Auth::user()->createToken('authToken')->plainTextToken;

        return response(['user' => auth()->user(), 'access_token' => $accessToken, 'code' => 200, 'message' => 'Login successful']);
    }
}
