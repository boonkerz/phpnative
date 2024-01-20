<?php

namespace PHPNative\Config;

use DI\Container;
use DI\ContainerBuilder;
use PHPNative\Loop\EventLoop;
use PHPNative\Loop\LoopInterface;

class DI
{

    public function __construct(private Container $container)
    {
    }

    public function bindDefault(): void
    {
        $this->container->set(LoopInterface::class, \DI\create(EventLoop::class));
    }
}