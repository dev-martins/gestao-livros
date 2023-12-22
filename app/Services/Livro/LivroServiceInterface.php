<?php

namespace App\Services\Livro;

interface LivroServiceInterface
{
    public function todosLivros();
    public function addLivro(array $data);
    public function atualizarLivro(array $data, int $id);
    public function removerLivro(int $id);
}
