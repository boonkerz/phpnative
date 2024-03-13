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


        \SDL_Init(SDL_INIT_VIDEO);
        $window = \SDL_CreateWindow("Drawing points on screen", SDL_WINDOWPOS_UNDEFINED, SDL_WINDOWPOS_UNDEFINED, 800, 600, SDL_WINDOW_RESIZABLE);

        $renderer = \SDL_CreateRenderer($window, 0, SDL_RENDERER_ACCELERATED);

// Clear screen
        SDL_SetRenderDrawColor($renderer, 100, 0, 0, 0);
        SDL_RenderClear($renderer);

// Draw line
        SDL_SetRenderDrawColor($renderer, 255, 0, 0, 255);
        for ($i = 0; $i < 800; ++$i) {
            SDL_RenderPoint($renderer, $i, $i);
        }
        SDL_RenderPresent($renderer);
// Wait for quit event
        $event = new \SDL_Event();

        while (true) {
            if (SDL_PollEvent($event) && $event->type == SDL_EVENT_QUIT) {
                dd($event);
                break;
            }
        }

        SDL_DestroyRenderer($renderer);
        SDL_DestroyWindow($window);
        SDL_Quit();
    }
}