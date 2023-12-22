<?php

namespace App\Services\Auth;

interface AuthServiceInterface
{
    public function login(array $data);
    public function logout(object $data);
}
