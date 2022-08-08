<?php

namespace App\Http\Controllers\Api\v1\Auth;

use Exception;
use App\Utils\ResponseUtil;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Exceptions\GenericException;
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
        try {
            $data = ResponseUtil::getDataValues($request);
            if (!auth()->attempt([
                'name' => $data->name,
                'password' => $data->password
            ])) {
                throw new GenericException('Invalid credentials');
            }
            return response([
                'user' => new UserResource(getUser()),
                'access_token' => getUser()->createToken('authToken')->accessToken
            ]);
        } catch (GenericException $e) {
            return response(['error' => $e->getMessage()]);
        } catch (Exception $e) {
            return response(['error' => $e->getMessage()]);
        }
    }
}
