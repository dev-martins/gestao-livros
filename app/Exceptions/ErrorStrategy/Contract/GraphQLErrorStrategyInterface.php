<?php

namespace App\Exceptions\ErrorStrategy\Contract;

interface GraphQLErrorStrategyInterface
{
    public function handle($exception);
}
