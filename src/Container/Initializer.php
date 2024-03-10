<?php

declare(strict_types=1);

namespace PHPNative\Container;

interface Initializer
{
    public function initialize(Container $container): object;
}
