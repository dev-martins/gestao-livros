<?php

namespace App\Exceptions\ErrorStrategy\Contract;

use Throwable;

interface ErrorStrategyInterface
{
    public function handle(Throwable $exception);
}
