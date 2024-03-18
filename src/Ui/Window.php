<?php

namespace PHPNative\Ui;

use PHPNative\Event\Event;
use PHPNative\Event\EventType;

class Window implements WindowInterface
{

    public function __construct(public int $width, public int $height,
                                public int $x, public int $y, public string $title,
                                public string $class)
    {

    }

}