<?php

namespace PHPNative\Ui;

class Window implements WindowInterface
{
    private ?\SDL_Window $windowId = null;
    private $rendererId = null;
    private \SDL_Event $event;

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
        $this->event = new \SDL_Event();
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

    public function pollEvent(): int
    {
        \SDL_PollEvent($this->event);
        return match($this->event->type) {
            SDL_EVENT_QUIT => 99,
            default => 1
        };
    }

    public function hide(): void
    {
        // TODO: Implement hide() method.
    }
}