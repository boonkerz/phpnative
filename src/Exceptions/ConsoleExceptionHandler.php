<?php

declare(strict_types=1);

namespace PHPNative\Exceptions;

use Throwable;

final readonly class ConsoleExceptionHandler implements ExceptionHandler
{

    public function handle(Throwable $throwable): void
    {
        var_dump($throwable);
    }
}