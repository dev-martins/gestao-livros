<?php

namespace App\Services\Auth;

use App\Repositories\Auth\AuthRepositoryInterface;

class AuthService implements AuthServiceInterface
{

    public function __construct(protected AuthRepositoryInterface $authRepository)
    {
    }

    public function login(array $data)
    {
        return $this->authRepository->login($data);
    }

    public function logout(object $data)
    {
        return $this->authRepository->logout($data);
    }

}
