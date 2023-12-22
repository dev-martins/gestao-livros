<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Services\Usuario\UsuarioServiceInterface;

class UsuariosController extends Controller
{
    public function __construct(protected UsuarioServiceInterface $user)
    {
    }

    public function todosUsuarios(UsuarioRequest $request)
    {
        $response = $this->user->todosUsuarios();

        if ($response->isEmpty())
            return response()->noContent();

        return response()->json($response);
    }

    public function addUsuario(UsuarioRequest $request)
    {
        $data = $request->validated();
        $response = $this->user->addUsuario($data);

        if ($response->count())
            return response()->json(['message' => 'Recurso Adicionado'], 201);

        return response()->json(['message' => 'Não foi possível adicionar usuário'], 400);
    }

    public function atualizarUsuario(UsuarioRequest $request)
    {
        $data = $request->validated();
        $response = $this->user->atualizarUsuario($data, $request->id);

        if ($response)
            return response()->noContent();

        return response()->json(['message' => 'Não foi possível atualizar usuário'], 400);
    }

    public function removerUsuario(UsuarioRequest $request)
    {
        $response = $this->user->removerUsuario($request->id);

        if ($response)
            return response()->noContent();

        return response()->json(['message' => 'Não foi possível remover usuário'], 400);
    }
}
