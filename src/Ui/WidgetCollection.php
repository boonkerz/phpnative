<?php

namespace PHPNative\Ui;

use PHPNative\Support\TypedCollection;

class WidgetCollection extends TypedCollection
{

    protected function type(): string
    {
        return WidgetInterface::class;
    }
}