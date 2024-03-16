<?php

namespace PHPNative\Event;

use PHPNative\Ui\Trait\Position;

class MoveDownEvent extends Event
{
    public function __construct(EventType $type = EventType::NOOP, public int $x = 0, public int $y = 0)
    {
        parent::__construct($type);
    }
}