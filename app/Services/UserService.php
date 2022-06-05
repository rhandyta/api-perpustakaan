<?php
namespace App\Services;

use App\Interfaces\UserInterface;
use Illuminate\Support\Facades\Hash;

class UserService {

    protected $user;
    public function  __construct(UserInterface $user)
    {
        $this->user = $user;
        
    }

    public function store($data)
    {
        $data['password'] = Hash::make($data['password']);
        $register = $this->user->store($data);
        return $register;
    }

    public function login($data)
    {
        $credentials = $this->user->login($data);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['errors' => 'In-valid E-mail and Password'], 401);
        }
        return $this->respondWithToken($token);
    }

    public function me()
    {
        return $this->user->me();
    }


    public function refresh()
    {
        return $this->respondWithToken($this->user->refresh());
    }

    public function logout()
    {
        return $this->user->logout();
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

}