<?php

namespace PHPNative\Lifecycle;

use PHPNative\Container\Container;
use PHPNative\Container\Initializer;
use PHPNative\Container\Singleton;
use PHPNative\Loop\OrderedEventLoop;

#[Singleton]
final readonly class LifecycleInitializer implements Initializer
{

    public function initialize(Container $container): Lifecycle
    {
        $lifeCylce = new Lifecycle(
            $container->get(OrderedEventLoop::class),
            $container->get(ContextCollection::class),
            $container
        );

        return $lifeCylce;
    }
}