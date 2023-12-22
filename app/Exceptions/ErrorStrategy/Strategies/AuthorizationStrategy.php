<?php

namespace App\Exceptions\ErrorStrategy\Strategies;

use App\Exceptions\ErrorStrategy\Contract\ErrorStrategyInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Throwable;

class AuthorizationStrategy implements ErrorStrategyInterface
{
    public function handle(Throwable $e): JsonResponse
    {
        if (env('APP_ENV') != 'production') {
            $file = !is_null($e->getFile()) ? $e->getFile() : 'Arquivo não informado';
            $line = !is_null($e->getLine()) ? $e->getLine() : 'Linha não informada';

            return response()->json(
                ['message' => 'Esta ação não é autorizada.', 'file' => $file, 'line' => $line],
                Response::HTTP_FORBIDDEN
            );
        }
        return response()->json(
            ['message' => 'Esta ação não é autorizada.'],
            Response::HTTP_FORBIDDEN
        );
    }
}
