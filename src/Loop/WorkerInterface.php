<?php

namespace PHPNative\Loop;

use PHPNative\Event\Event;

interface WorkerInterface
{
    public function onUpdate(float $delta): void;

    public function onRender(float $delta): void;

    public function onPause(): void;

    public function onResume(): void;
}