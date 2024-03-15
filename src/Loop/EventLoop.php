<?php
declare(strict_types=1);

namespace PHPNative\Loop;

abstract class EventLoop implements LoopInterface
{

    protected bool $running = false;
    protected bool $paused = false;

    private ?WorkerInterface $worker = null;

    public function use(?WorkerInterface $worker): void
    {
        $this->worker = $worker;
    }

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

    public function pause(): void
    {
        if ($this->paused === false && $this->worker !== null) {
            $this->worker->onPause();
        }

        $this->paused = true;
    }

    public function resume(): void
    {
        if ($this->paused === true && $this->worker !== null) {
            $this->worker->onResume();
        }

        $this->paused = false;
    }
    public function stop(): void
    {
        $this->running = false;
    }

    protected function render(float $delta): void
    {
        if ($this->worker !== null) {
            $this->worker->onRender($delta);
        }
    }

    protected function update(float $delta): void
    {
        if ($this->worker !== null && $this->paused === false) {
            $this->worker->onUpdate($delta);
        }
    }
}