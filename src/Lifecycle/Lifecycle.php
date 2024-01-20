<?php

namespace PHPNative\Lifecycle;

use PHPNative\App;

class Lifecycle
{

    public function __construct(private App $application)
    {

    }

    public function show(string $controller): void
    {

    }

    public function run(): void
    {
        $this->application->run();
    }
}