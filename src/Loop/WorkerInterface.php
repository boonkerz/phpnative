<?php

namespace PHPNative\Loop;

interface WorkerInterface
{
    public function onUpdate(float $delta): void;

    public function onRender(float $delta): void;

    public function onPause(): void;

    public function onResume(): void;
}