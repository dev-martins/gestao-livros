<?php

namespace App\Services\Assunto;

interface AssuntoServiceInterface
{
    public function todosAssuntos();
    public function addAssunto(array $data);
    public function atualizarAssunto(array $data, int $id);
    public function removerAssunto(int $id);
}
