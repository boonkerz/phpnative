<?php

namespace PHPNative\Window;

abstract class BaseWindow
{

    abstract public function build(): void;

    abstract public function getTitle(): string;

}