<?php

declare(strict_types=1);

namespace PHPNative\Discovery;

final readonly class DiscoveryLocation
{
    public function __construct(
        public string $namespace,
        public string $path,
    ) {
    }
}
