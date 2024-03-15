<?php

namespace PHPNative\Lifecycle;

use PHPNative\Ui\WindowInterface;

class Context
{

    public function __construct(private WindowInterface $window)
    {

    }

    public function show(): void
    {
        $this->window->show();
    }

}