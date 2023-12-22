<?php

namespace App\Repositories\Assunto;

interface AssuntoRepositoryInterface
{
    public function todosAssuntos();
    public function addAssunto(array $data);
    public function atualizarAssunto($data, $id);
    public function removerAssunto($id);
}
