<?php

namespace App\Repositories\Livro;

use App\Models\Livro;

class LivroRepository implements LivroRepositoryInterface
{

    public function __construct(protected Livro $livro)
    {
    }

    public function todosLivros()
    {
        return $this->livro->with(['autores','assuntos'])->get();
    }


    public function addLivro(array $data)
    {
        return $this->livro->create($data);
    }

    public function atualizarLivro(array $data, int $id)
    {
        $livro = $this->livro->where('CodL', $id)
            ->tap(function ($livro) use ($data) {
                $livro->update($data);
            })
            ->first();

        return $livro;
    }

    public function removerLivro(int $id)
    {
        return $this->livro->where('CodL', $id)->delete();
    }
}
