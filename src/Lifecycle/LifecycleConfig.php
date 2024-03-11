<?php

declare(strict_types=1);

namespace PHPNative\Lifecycle;

use ReflectionMethod;

final class LifecycleConfig
{
    public function __construct(
        /** @var \PHPNative\Lifecycle\LifecycleHandle[] $handles */
        public array $handles = [],
    ) {
    }

    public function addHandle(ReflectionMethod $handler, LifecycleHandle $handle): self
    {
        $handle->setHandler($handler);

        $this->handles[] = $handle;

        return $this;
    }
}