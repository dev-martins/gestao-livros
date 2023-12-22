<?php

namespace App\Services\Livro;

use App\Repositories\Livro\LivroRepositoryInterface;
use Illuminate\Support\Collection;

class LivroService implements LivroServiceInterface
{

    public function __construct(protected LivroRepositoryInterface $livroRepository)
    {
    }

    public function todosLivros()
    {
        return $this->livroRepository->todosLivros();
    }

    public function addLivro(array $data)
    {
        $livro = $this->livroRepository->addLivro($data);

        if (isset($data['Autores'])) {
            $livro->autores()->attach($data['Autores']);
        }

        if (isset($data['Assuntos'])) {
            $livro->assuntos()->attach($data['Assuntos']);
        }

        return $livro;
    }

    public function atualizarLivro(array $data, int $id)
    {
        $collection = new Collection($data);
        $livro = $collection->except(['Autores', 'Assuntos'])->all();
        $autores = $collection->get('Autores', []);
        $assuntos = $collection->get('Assuntos', []);

        $livro = $this->livroRepository->atualizarLivro($livro, $id);

        if (count($autores) > 0) {
            $livro->autores()->sync($autores);
        }

        if (count($assuntos) > 0) {
            $livro->autores()->sync($assuntos);
        }

        return $livro;
    }

    public function removerLivro(int $id)
    {
        return $this->livroRepository->removerLivro($id);
    }
}
