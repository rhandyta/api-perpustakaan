<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Http\Requests\StoreLoginRequest;
use App\Http\Requests\StoreRegisterRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $user;

    public function __construct(UserService $user)
    {
        $this->user = $user;
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }


    public function register(StoreRegisterRequest $request)
    {
        $user = $this->user->store($request->all());
        return response()->json([
            'success' => true,
            'data' => $user
        ]);
    }

    public function login(StoreLoginRequest $request)
    {
        $user = $this->user->login($request->all());
        return response()->json([
            'success' => true,
            'token' => $user
        ]);
    }

    public function refresh()
    {
        return $this->user->refresh();
    }

    public function logout()
    {
        $this->user->logout();
        return response()->json([
            'success' => true,
            'message' => 'Successfully logged out'
        ]);
    }

    public function me()
    {
        $user = $this->user->me();
        return $user;
    }

}
