<?php

namespace App\Repositories\Auth;

interface AuthRepositoryInterface
{
    public function login(array $data);
    public function logout(object $request);
}
