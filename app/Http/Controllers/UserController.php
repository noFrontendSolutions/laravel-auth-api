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

        return ['message' => "You are now logged out!"];
    }
}
