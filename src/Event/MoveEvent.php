<?php

namespace PHPNative\Event;

use PHPNative\Ui\Trait\Position;

class MoveEvent extends Event
{
    use Position;

    public function __construct(EventType $type = EventType::NOOP, int $x = 0, int $y = 0)
    {
        parent::__construct($type);
        $this->x = $x;
        $this->y = $y;
    }
}