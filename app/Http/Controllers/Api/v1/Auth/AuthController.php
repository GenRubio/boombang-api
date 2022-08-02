<?php

namespace App\Http\Controllers\Api\v1\Auth;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Api\v1\Auth\Interfaces\AuthControllerInterface;

class AuthController extends Controller implements AuthControllerInterface
{
    public function register(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);
        $validateData['password'] = Hash::make($request->password);

        $user = (new UserService())->create($validateData);
        return response([
            'user' => $user,
            'access_token' => $user->createToken('authToken')->accessToken,
        ]);
    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required',
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid credentials']);
        }

        $accessToken = getUser()->createToken('authToken')->accessToken;

        return response([
            'user' => new UserResource(getUser()),
            'access_token' => $accessToken
        ]);
    }
}
