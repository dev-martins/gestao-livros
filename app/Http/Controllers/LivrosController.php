<?php

namespace App\Http\Controllers;

use App\Http\Requests\CMS\LivroRequest;
use App\Services\Livro\LivroServiceInterface;

class LivrosController extends Controller
{
    public function __construct(protected LivroServiceInterface $livroService)
    {
    }

    public function todosLivros(LivroRequest $request)
    {
        $response = $this->livroService->todosLivros();

        if ($response->isEmpty())
            return response()->noContent();

        return response()->json($response);
    }

    public function addLivro(LivroRequest $request)
    {
        $data = $request->validated();
        $response =  $this->livroService->addLivro($data);

        if ($response->count())
            return response()->json(['message' => 'Recurso Adicionado'], 201);

        return response()->json(['message' => 'Não foi possível adicionar livro'], 400);
    }

    public function atualizarLivro(LivroRequest $request)
    {
        $data = $request->validated();
        $response =  $this->livroService->atualizarLivro($data, $request->id);

        if ($response)
            return response()->noContent();

        return response()->json(['message' => 'Não foi possível atualizar livro'], 400);
    }

    public function removerLivro(LivroRequest $request)
    {
        $response = $this->livroService->removerLivro($request->id);

        if ($response)
        return response()->noContent();

    return response()->json(['message' => 'Não foi possível remover livro'], 400);
    }
}
