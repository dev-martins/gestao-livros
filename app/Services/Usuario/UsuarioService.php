<?php

namespace App\Services\Usuario;

use App\Repositories\Usuario\UsuarioRepositoryInterface;

class UsuarioService implements UsuarioServiceInterface
{

    public function __construct(protected UsuarioRepositoryInterface $usuarioRepository)
    {
    }

    public function todosUsuarios()
    {
        return $this->usuarioRepository->todosUsuarios();
    }

    public function addUsuario(array $data)
    {
        $data['password'] = bcrypt($data['password']);
        return $this->usuarioRepository->addUsuario($data);
    }

    public function atualizarUsuario(array $data, int $id)
    {
        return $this->usuarioRepository->atualizarUsuario($data, $id);
    }

    public function removerUsuario(int $id)
    {
        return $this->usuarioRepository->removerUsuario($id);
    }
}
