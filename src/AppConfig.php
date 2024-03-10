<?php

declare(strict_types=1);

namespace PHPNative;

use PHPNative\Application\Environment;
use PHPNative\Discovery\DiscoveryDiscovery;

final class AppConfig
{
    public function __construct(
        public string $root,
        public Environment $environment = Environment::LOCAL,
        public bool $discoveryCache = false,

        /** @var \PHPNative\Discovery\DiscoveryLocation[] */
        public array $discoveryLocations = [],

        /** @var class-string[] */
        public array $discoveryClasses = [
            DiscoveryDiscovery::class,
        ],

        /** @var \PHPNative\Exceptions\ExceptionHandler[] */
        public array $exceptionHandlers = [],
        public bool $enableExceptionHandling = true,
    ) {
    }
}
