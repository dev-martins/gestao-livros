<?php

namespace App\Http\Controllers;

use App\Http\Requests\CMS\AssuntoRequest;
use App\Services\Assunto\AssuntoServiceInterface;

class AssuntoController extends Controller
{

    public function __construct(protected AssuntoServiceInterface $assuntoService)
    {
    }

    public function todosAssuntos(AssuntoRequest $request)
    {
        $response = $this->assuntoService->todosAssuntos();

        if ($response->isEmpty())
            return response()->noContent();

        return response()->json($response);
    }

    public function addAssunto(AssuntoRequest $request)
    {
        $data = $request->validated();
        $response = $this->assuntoService->addAssunto($data);

        if ($response->count())
            return response()->json(['message' => 'Recurso Adicionado'], 201);

        return response()->json(['message' => 'Não foi possível adicionar assunto'], 400);
    }

    public function atualizarAssunto(AssuntoRequest $request)
    {
        $data = $request->validated();
        $response = $this->assuntoService->atualizarAssunto($data, $request->id);

        if ($response)
            return response()->noContent();

        return response()->json(['message' => 'Não foi possível atualizar assunto'], 400);
    }

    public function removerAssunto(AssuntoRequest $request)
    {
        $response = $this->assuntoService->removerAssunto($request->id);

        if ($response)
            return response()->noContent();

        return response()->json(['message' => 'Não foi possível remover assunto'], 400);
    }
}
