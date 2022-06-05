<?php
namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\Models\User;

class UserRepository implements UserInterface {

   protected $user;

   public function __construct(User $user)
   {
       $this->user = $user;
   }

   public function store($data)
   {
       $register = $this->user::create($data);
       return $register;
   }

   public function login($data)
   {
        return $data;
   }

   public function me()
   {
       return auth()->user();
   }

   public function refresh()
   {
       return auth()->refresh();
   }

   public function logout()
   {
        $logout = auth()->logout();
        return $logout;
   }
}