<?php

namespace App\Repositories\Usuario;

interface UsuarioRepositoryInterface
{
    public function todosUsuarios();
    public function addUsuario(array $data);
    public function atualizarUsuario(array $data, int $id);
    public function removerUsuario(int $id);
}
