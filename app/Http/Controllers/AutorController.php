<?php

namespace App\Http\Controllers;

use App\Http\Requests\CMS\AutorRequest;
use App\Services\Autor\AutorServiceInterface;

class AutorController extends Controller
{
    public function __construct(protected AutorServiceInterface $autorService)
    {
    }

    public function todosAutores(AutorRequest $request)
    {
        $response = $this->autorService->todosAutores();

        if ($response->isEmpty())
            return response()->noContent();

        return response()->json($response);
    }

    public function addAutor(AutorRequest $request)
    {
        $data = $request->validated();
        $response = $this->autorService->addAutor($data);

        if ($response->count())
            return response()->json(['message' => 'Recurso Adicionado'], 201);

        return response()->json(['message' => 'Não foi possível adicionar autor'], 400);
    }

    public function atualizarAutor(AutorRequest $request)
    {
        $data = $request->validated();
        return $this->autorService->atualizarAutor($data, $request->id);
    }

    public function removerAutor(AutorRequest $request)
    {
        return $this->autorService->removerAutor($request->id);
    }
}
