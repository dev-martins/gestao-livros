<?php

namespace App\Services\Autor;

interface AutorServiceInterface
{
    public function todosAutores();
    public function addAutor(array $data);
    public function atualizarAutor(array $data, int $id);
    public function removerAutor(int $id);
}
