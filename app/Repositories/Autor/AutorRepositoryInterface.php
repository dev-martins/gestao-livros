<?php

namespace App\Repositories\Autor;

interface AutorRepositoryInterface
{
    public function todosAutores();
    public function addAutor(array $data);
    public function atualizarAutor(array $data, int $id);
    public function removerAutor(int $id);
}
