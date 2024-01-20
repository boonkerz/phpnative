<?php
declare(strict_types=1);

namespace PHPNative\Loop;

class EventLoop implements LoopInterface
{

    protected bool $running = false;

    public function run(int $frameRate = self::DEFAULT_FRAME_RATE, int $updateRate = self::DEFAULT_UPDATE_RATE): void
    {
        if ($this->running) {
            return;
        }

        try {
            $this->running = true;

            //$this->execute($frameRate, $updateRate);
        } finally {
            //$this->driver->free();

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