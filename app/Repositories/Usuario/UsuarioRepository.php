<?php

namespace App\Repositories\Usuario;

use App\Models\User;

class UsuarioRepository implements UsuarioRepositoryInterface
{

    public function __construct(protected User $usuario)
    {
    }

    public function todosUsuarios()
    {
        return $this->usuario->get();
    }

    public function addUsuario(array $data)
    {
        return $this->usuario->create($data);
    }

    public function atualizarUsuario(array $data, int $id)
    {
        return $this->usuario->where('id', $id)->update($data);
    }

    public function removerUsuario(int $id)
    {
        return $this->usuario->where('id', $id)->delete();
    }
}
