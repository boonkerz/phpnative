<?php

namespace PHPNative\Ui;

use PHPNative\Event\Event;
use PHPNative\Event\EventType;

class Window implements WindowInterface
{
    private ?\SDL_Window $windowId = null;
    private $rendererId = null;

    public function __construct(private int $width, private int $height,
                                private int $x, private int $y, private string $title,
                                private string $class)
    {

    }

    public function show(): void
    {
        \SDL_Init(SDL_INIT_VIDEO);
        $this->windowId = \SDL_CreateWindow($this->title, SDL_WINDOWPOS_UNDEFINED, SDL_WINDOWPOS_UNDEFINED, $this->width, $this->height, SDL_WINDOW_RESIZABLE);
        $this->rendererId = \SDL_CreateRenderer($this->windowId, 0, SDL_RENDERER_ACCELERATED);
        \SDL_RaiseWindow($this->windowId);
    }

    public function close(): void
    {
        \SDL_DestroyRenderer($this->rendererId);
        \SDL_DestroyWindow($this->windowId);
        \SDL_Quit();
    }

    public function render(): void
    {
        \SDL_SetRenderDrawColor($this->rendererId, 255, 255,255,255);
        \SDL_RenderClear($this->rendererId);
        for ($i = 0; $i < 800; ++$i) {
            \SDL_RenderPoint($this->rendererId, $i, $i);
        }
        \SDL_RenderPresent($this->rendererId);
    }

    public function hide(): void
    {
        // TODO: Implement hide() method.
    }
}