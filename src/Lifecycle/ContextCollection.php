<?php

namespace PHPNative\Lifecycle;

use PHPNative\Container\Singleton;
use PHPNative\Support\TypedCollection;

#[Singleton]
class ContextCollection extends TypedCollection
{

    protected function type(): string
    {
        return Context::class;
    }
}