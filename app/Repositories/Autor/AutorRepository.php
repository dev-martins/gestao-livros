<?php

namespace App\Repositories\Autor;

use App\Models\Autor;

class AutorRepository implements AutorRepositoryInterface
{

    public function __construct(protected Autor $autor)
    {
    }

    public function todosAutores()
    {
        return $this->autor->get();
    }

    public function addAutor(array $data)
    {
        return $this->autor->create($data);
    }

    public function atualizarAutor(array $data, int $id)
    {
        return $this->autor->where('CodAu', $id)->update($data);
    }

    public function removerAutor(int $id)
    {
        return $this->autor->where('CodAu', $id)->delete();
    }
}
