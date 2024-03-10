<?php

namespace PHPNative\Ui;

class Window
{
    public function __construct(private int $width, private int $height,
                                private int $x, private int $y, private string $title,
                                private string $class)
    {
    }

}