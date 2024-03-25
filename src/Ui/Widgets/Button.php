<?php

namespace PHPNative\Ui\Widgets;

use PHPNative\Ui\WidgetInterface;

class Button implements WidgetInterface
{
    public function __construct(public string $title,
                                public string $style = "border border-slate-300 hover:border-indigo-300")
    {

    }
}