<?php

namespace PHPNative\Driver;


use PHPNative\Tailwind\Actions\StyleToMethod;
use PHPNative\Tailwind\ValueObjects\Styles;

class Window
{
    private ?\SDL_Window $windowId = null;
    private $rendererPtr = null;

    public function __construct(private \PHPNative\Ui\Window $window)
    {
    }

    public function show(): void
    {
        \SDL_Init(SDL_INIT_VIDEO);
        $this->windowId = \SDL_CreateWindow($this->window->title, $this->window->x, $this->window->y, $this->window->width, $this->window->height, SDL_WINDOW_RESIZABLE);
        $this->rendererPtr = \SDL_CreateRenderer($this->windowId, 0, SDL_RENDERER_ACCELERATED);
        \SDL_RaiseWindow($this->windowId);

        $styles = new Styles();
        StyleToMethod::multiple(styles: $styles, stylesString: $this->window->style);
        dd($styles);
    }

    public function close(): void
    {
        \SDL_DestroyRenderer($this->rendererPtr);
        \SDL_DestroyWindow($this->windowId);
        \SDL_Quit();
    }

    public function render(): void
    {
        \SDL_SetRenderDrawColor($this->rendererPtr, 255, 255,255,255);
        \SDL_RenderClear($this->rendererPtr);
        for ($i = 0; $i < 800; ++$i) {
            \SDL_RenderPoint($this->rendererPtr, $i, $i);
        }
        \SDL_RenderPresent($this->rendererPtr);
    }

}