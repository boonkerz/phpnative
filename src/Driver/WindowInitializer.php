<?php

namespace PHPNative\Driver;

use PHPNative\Container\Container;
use PHPNative\Container\Initializer;
use PHPNative\Container\Singleton;

#[Singleton]
class WindowInitializer implements Initializer
{

    public function initialize(Container $container): Window
    {
        return new Window();
    }
}