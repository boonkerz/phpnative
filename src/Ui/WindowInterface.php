<?php

namespace PHPNative\Ui;

use PHPNative\Event\Event;

interface WindowInterface
{
    public function show():void;
    public function hide():void;
    public function render():void;
    public function pollEvent():Event;
}