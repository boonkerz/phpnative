<?php

declare(strict_types=1);

namespace PHPNative\Discovery;

use PHPNative\Support\Reflection\Attributes;
use PHPNative\Window\WindowHandler;
use ReflectionClass;
use ReflectionMethod;

final readonly class WindowDiscovery implements Discovery
{
    public function __construct(private WindowConfig $windowConfig)
    {
    }

    public function discover(ReflectionClass $class): void
    {
        foreach ($class->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
            $window = Attributes::find(WindowHandler::class)->in($method)->first();

            if (! $window) {
                continue;
            }

            $this->windowConfig->addCommand($method, $window);
        }
    }

}
