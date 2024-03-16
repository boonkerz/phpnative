<?php

namespace PHPNative\Driver;

use PHPNative\Container\Container;
use PHPNative\Container\Initializer;
use PHPNative\Container\Singleton;

#[Singleton]
class EventInitializer implements Initializer
{

    public function initialize(Container $container): Event
    {
        return new Event();
    }
}