<?php

namespace PHPNative\Support;

use PHPNative\Support\Collection;

abstract class TypedCollection extends Collection
{
    public function __construct(array $elements = [])
    {
        parent::__construct($elements);
    }

    abstract protected function type(): string;

    public function add(mixed $element): void
    {
        parent::add($element);
    }
}