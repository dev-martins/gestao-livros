<?php

namespace App\Services\Assunto;

use App\Repositories\Assunto\AssuntoRepositoryInterface;

class AssuntoService implements AssuntoServiceInterface
{
    public function __construct(protected AssuntoRepositoryInterface $assuntoRepository)
    {
    }

    public function todosAssuntos()
    {
        return $this->assuntoRepository->todosAssuntos();
    }

    public function addAssunto(array $data)
    {
        return $this->assuntoRepository->addAssunto($data);
    }

    public function atualizarAssunto(array $data, int $id)
    {
        return $this->assuntoRepository->atualizarAssunto($data, $id);
    }

    public function removerAssunto(int $id)
    {
        return $this->assuntoRepository->removerAssunto($id);
    }
}
