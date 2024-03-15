<?php

declare(strict_types=1);

namespace PHPNative\Ui;

use PHPNative\Container\Container;

class Factory
{

    public function __construct(private Container $container)
    {
    }

    public function open(string $windowClass): void {
        $mainwindow = $this->container->get($windowClass);




// Draw line

// Wait for quit event
        $event = new \SDL_Event();

        while (true) {
            if (SDL_PollEvent($event) && $event->type == SDL_EVENT_QUIT) {
                dd($event);
                break;
            }
        }


    }
}