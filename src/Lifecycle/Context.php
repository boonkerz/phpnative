<?php

namespace PHPNative\Lifecycle;

use PHPNative\Driver\Window;
use PHPNative\Ui\WindowInterface;

class Context
{

    public function __construct(private Window $driver)
    {

    }

    public function show(): void
    {
        $this->driver->show();
    }

    public function update(float $delta): void
    {

    }

    public function render(float $delta): void
    {
        $this->driver->render();
    }
}