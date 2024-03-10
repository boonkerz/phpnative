<?php

namespace PHPNative\Sdl;

use PHPNative\Ui\BaseWindow;

class Window
{
    public function __construct(private int $window, private int $renderer, private BaseWindow $baseWindow)
    {

    }

    public function open(BaseWindow $baseWindow) {
        $this->window = SDL_CreateWindow($baseWindow->getTitle(), SDL_WINDOWPOS_UNDEFINED, SDL_WINDOWPOS_UNDEFINED, WINDOW_WIDTH, WINDOW_HEIGHT, SDL_WINDOW_RESIZABLE);
        $this->renderer = SDL_CreateRenderer($this->window, 0, SDL_RENDERER_ACCELERATED);
    }

    public function render(): void
    {

    }
}