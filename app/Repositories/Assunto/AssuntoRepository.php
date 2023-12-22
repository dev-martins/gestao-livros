<?php

namespace App\Repositories\Assunto;

use App\Models\Assunto;

class AssuntoRepository implements AssuntoRepositoryInterface
{
    public function __construct(protected Assunto $assunto)
    {
    }

    public function todosAssuntos()
    {
        return $this->assunto->get();
    }

    public function addAssunto(array $data)
    {
        return $this->assunto->create($data);
    }

    public function atualizarAssunto($data, $id)
    {
        return $this->assunto->where('CodAs', $id)->update($data);
    }

    public function removerAssunto($id)
    {
        return $this->assunto->where('CodAs', $id)->delete();
    }
}
