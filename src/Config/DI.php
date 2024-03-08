<?php

namespace PHPNative\Config;

use DI\Container;
use PHPNative\Loop\LoopInterface;
use PHPNative\Loop\OrderedEventLoop;

class DI
{

    public function __construct(private Container $container)
    {
    }

    public function bindDefault(): void
    {
        $this->container->set(LoopInterface::class, \DI\create(OrderedEventLoop::class));
    }
}