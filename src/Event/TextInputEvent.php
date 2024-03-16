<?php

namespace PHPNative\Event;

use PHPNative\Ui\Trait\Position;

class TextInputEvent extends Event
{
    public function __construct(EventType $type = EventType::TEXTINPUT, public string $text = "")
    {
        parent::__construct($type);
    }
}