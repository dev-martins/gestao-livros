<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Services\Auth\AuthServiceInterface;

class AuthController extends Controller
{

    public function __construct(protected AuthServiceInterface $auth)
    {
    }

    public function login(AuthRequest $request)
    {
        $data = $request->validated();
        return $this->auth->login($data);
    }

    public function logout(AuthRequest $request)
    {
        $response = $this->auth->logout($request);

        if ($response)
            return response()->noContent();

        return response()->json(['message' => 'Não foi possível deslogar o usuario'], 400);
    }
}
