<?php

namespace App\Services\Autor;

use App\Repositories\Autor\AutorRepositoryInterface;

class AutorService implements AutorServiceInterface
{

    public function __construct(protected AutorRepositoryInterface $autorRepository)
    {
    }

    public function todosAutores()
    {
        return $this->autorRepository->todosAutores();
    }

    public function addAutor(array $data)
    {
        return $this->autorRepository->addAutor($data);
    }

    public function atualizarAutor(array $data, int $id)
    {
        return $this->autorRepository->atualizarAutor($data, $id);
    }

    public function removerAutor(int $id)
    {
        return $this->autorRepository->removerAutor($id);
    }
}
