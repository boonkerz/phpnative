<?php

declare(strict_types=1);

namespace PHPNative\Exceptions;

use Throwable;

interface ExceptionHandler
{
    public function handle(Throwable $throwable): void;
}
