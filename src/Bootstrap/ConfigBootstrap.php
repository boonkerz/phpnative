<?php

declare(strict_types=1);

namespace PHPNative\Bootstrap;

use PHPNative\AppConfig;
use PHPNative\Container\Container;
use function PHPNative\path;

final readonly class ConfigBootstrap implements Bootstrap
{
    public function __construct(
        private Container $container,
    ) {
    }

    public function boot(): void
    {
        // Scan for config files in all discovery locations
        foreach ($this->container->get(AppConfig::class)->discoveryLocations as $discoveryLocation) {
            $configFiles = glob(path($discoveryLocation->path, 'Config/**.php'));

            foreach ($configFiles as $configFile) {
                $configFile = require $configFile;

                $this->container->config($configFile);
            }
        }
    }
}
