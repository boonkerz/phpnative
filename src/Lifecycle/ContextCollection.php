<?php

namespace PHPNative\Lifecycle;

use PHPNative\Support\TypedCollection;

class ContextCollection extends TypedCollection
{

    protected function type(): string
    {
        return Context::class;
    }
}