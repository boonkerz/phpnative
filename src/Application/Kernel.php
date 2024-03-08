<?php

namespace PHPNative\Application;

use DI\ContainerBuilder;
use PHPNative\Config\DI;
use PHPNative\Loop\LoopInterface;

final readonly class Kernel
{
    public function __construct(
        public string     $root,
    )
    {
    }

    public function init(): Container
    {
        $builder = new ContainerBuilder();
        $builder->useAttributes(true);
        $container = $builder->build();
        $container->make(DI::class);
        $container->bindDefault();

        return $container;
    }
}