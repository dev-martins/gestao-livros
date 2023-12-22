<?php

namespace App\Repositories\Auth;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;

class AuthRepository implements AuthRepositoryInterface
{

    public function login(array $data)
    {
        if (!Auth::attempt($data)) {
            throw new AuthenticationException();
        }

        $user = Auth::user();
        $tokenResult = $user->createToken('Token de Acesso Pessoal');
        $token = $tokenResult->token;
        $token->save();
        return ['token' => $tokenResult->accessToken];
    }

    public function logout(object $request)
    {
        return $request->user()->token()->revoke();
    }
}
