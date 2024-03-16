<?php

namespace PHPNative\Driver;

use PHPNative\Event\EventType;

class Event
{
    public function __construct(private \SDL_Event $event = new \SDL_Event())
    {
    }

    public function pollEvent(): \PHPNative\Event\Event
    {
        \SDL_PollEvent($this->event);
        return match($this->event->type) {
            SDL_EVENT_QUIT => new \PHPNative\Event\Event(EventType::QUIT),
            default => new \PHPNative\Event\Event(EventType::NOOP)
        };
    }
}