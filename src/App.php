<?php
declare(strict_types=1);

namespace PHPNative;

use DI\Container;
use DI\ContainerBuilder;
use PHPNative\Config\DI;
use PHPNative\Loop\LoopInterface;

class App
{
    public Container $container;

    public function __construct(private readonly string $appDir)
    {
        $this->buildContainer();
    }

    public function run(): void
    {
        $loop = $this->container->make(LoopInterface::class);
        $loop->run();
    }

    private function buildContainer(): void
    {
        $builder = new ContainerBuilder();
        $builder->useAttributes(true);
        $this->container = $builder->build();
        $di = $this->container->make(DI::class);
        $di->bindDefault();
    }
}