<?php

namespace App\Exceptions\ErrorStrategy;

use App\Exceptions\ErrorStrategy\Strategies\AccessDeniedHttpStrategy;
use App\Exceptions\ErrorStrategy\Strategies\AuthenticationStrategy;
use App\Exceptions\ErrorStrategy\Strategies\AuthorizationStrategy;
use App\Exceptions\ErrorStrategy\Strategies\BadRequestHttpStrategy;
use App\Exceptions\ErrorStrategy\Strategies\MethodNotAllowedHttpStrategy;
use App\Exceptions\ErrorStrategy\Strategies\NotFoundHttpStrategy;
use App\Exceptions\ErrorStrategy\Strategies\QueryExceptionStrategy;
use App\Exceptions\ErrorStrategy\Strategies\TooManyRequestsHttpStrategy;
use App\Exceptions\ErrorStrategy\Strategies\UnprocessableEntityHttpStrategy;
use App\Exceptions\ErrorStrategy\Strategies\UnsupportedMediaTypeHttpStrategy;
use App\Exceptions\ErrorStrategy\Strategies\ValidationExceptionStrategy;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use Symfony\Component\HttpKernel\Exception\UnsupportedMediaTypeHttpException;
use Throwable;

class ErrorResponse
{
    private $strategies = [];

    public function __construct()
    {
        $this->strategies = [
            AccessDeniedHttpException::class    => new AccessDeniedHttpStrategy(),
            AuthenticationException::class      => new AuthenticationStrategy(),
            AuthorizationException::class       => new AuthorizationStrategy(),
            BadRequestHttpException::class      => new BadRequestHttpStrategy(),
            MethodNotAllowedHttpException::class    => new MethodNotAllowedHttpStrategy(),
            NotFoundHttpException::class        => new NotFoundHttpStrategy(),
            TooManyRequestsHttpException::class => new TooManyRequestsHttpStrategy(),
            UnprocessableEntityHttpException::class => new UnprocessableEntityHttpStrategy(),
            UnsupportedMediaTypeHttpException::class    => new UnsupportedMediaTypeHttpStrategy(),
            QueryException::class    => new QueryExceptionStrategy(),
            ValidationException::class    => new ValidationExceptionStrategy(),
        ];
    }

    public function generate(Throwable $e)
    {
        foreach ($this->strategies as $exceptionType => $strategy) {
            if ($e instanceof $exceptionType) {
                return $strategy->handle($e);
            }
        }


        if (env('APP_ENV') != 'production') {
            $file = !is_null($e->getFile()) ? $e->getFile() : 'Arquivo não informado';
            $line = !is_null($e->getLine()) ? $e->getLine() : 'Linha não informada';
            return response()->json([
                'message'       => $e->getMessage(),
                'file'          => $file,
                'line'          => $line
            ],Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        return response()->json(
            ['message' => $e->getMessage()],
            Response::HTTP_INTERNAL_SERVER_ERROR
        );
    }
}
