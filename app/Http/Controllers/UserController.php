<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;


class UserController extends Controller
{
    public function signIn(Request $request)
    {
        $fields = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'first_name' => $fields['first_name'],
            'last_name' => $fields['last_name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $user->createToken('userToken')->plainTextToken;

        $response = ['user' => $user, 'token' => $token];

        return response($response, 201);
    }


    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        $firstName = auth()->user()->first_name;
        $lastName = auth()->user()->last_name;
        return response(['message' => "$firstName $lastName logged out!"], 200);
    }

    public function login(Request $request) {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

    
        $user = User::where('email', $fields['email'])->first();

        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response(['message' => 'Access denied! Bad Credentials!'], 401);
        }

        $token = $user->createToken('userToken')->plainTextToken;
        $response = ['user' => $user, 'token' => $token];

        return response($response, 201);
    }
}
