<?php

namespace App\Repositories\Livro;

interface LivroRepositoryInterface
{
    public function todosLivros();
    public function addLivro(array $data);
    public function atualizarLivro(array $data, int $id);
    public function removerLivro(int $id);
}
