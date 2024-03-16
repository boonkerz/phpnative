<?php

namespace PHPNative\Event;

use PHPNative\Ui\Trait\Size;

class ResizeEvent extends Event
{
    public function __construct(EventType $type = EventType::NOOP, public int $width = 0, public int $height = 0)
    {
        parent::__construct($type);
    }
}