<?php

namespace App\Interfaces;

interface UserInterface {
    public function store($data);
    public function login($data);
    public function me();
    public function refresh();
    public function logout();
    
}