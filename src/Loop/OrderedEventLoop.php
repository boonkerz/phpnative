<?php

namespace PHPNative\Loop;

use PHPNative\Loop\EventLoop;

class OrderedEventLoop extends EventLoop
{

    public Timer $render;

    public Timer $updates;

    public function __construct()
    {

        $this->render = new Timer(self::DEFAULT_FRAME_RATE);
        $this->updates = new Timer(self::DEFAULT_UPDATE_RATE);
    }

    protected function execute(int $frameRate, int $updateRate): void
    {
        $this->render->rate($frameRate)->touch();
        $this->updates->rate($updateRate)->touch();

        while ($this->running) {
            $now = \microtime(true);

            if (($delta = $this->updates->next($now)) !== null) {
                //$this->update($delta);
            }

            if (($delta = $this->render->next($now)) !== null) {
                //$this->render($delta);
            }

        }
    }

    public function pause(): void
    {
        // TODO: Implement pause() method.
    }

    public function resume(): void
    {
        // TODO: Implement resume() method.
    }

    public function stop(): void
    {
        // TODO: Implement stop() method.
    }
}