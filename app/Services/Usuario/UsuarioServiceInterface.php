<?php

namespace App\Services\Usuario;

interface UsuarioServiceInterface
{
    public function todosUsuarios();
    public function addUsuario(array $data);
    public function atualizarUsuario(array $data, int $id);
    public function removerUsuario(int $id);
}
