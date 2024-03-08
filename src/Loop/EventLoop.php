<?php
declare(strict_types=1);

namespace PHPNative\Loop;

abstract class EventLoop implements LoopInterface
{

    protected bool $running = false;

    public function run(int $frameRate = self::DEFAULT_FRAME_RATE, int $updateRate = self::DEFAULT_UPDATE_RATE): void
    {
        if ($this->running) {
            return;
        }

        try {
            $this->running = true;

            $this->execute($frameRate, $updateRate);
        } finally {
            //$this->driver->free();

        }
    }

    abstract protected function execute(int $frameRate, int $updateRate): void;
}