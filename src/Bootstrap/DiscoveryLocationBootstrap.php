<?php

declare(strict_types=1);

namespace PHPNative\Bootstrap;

use PHPNative\AppConfig;
use PHPNative\Application\Kernel;
use PHPNative\Discovery\DiscoveryLocation;
use function PHPNative\path;

final readonly class DiscoveryLocationBootstrap implements Bootstrap
{
    public function __construct(
        private AppConfig $appConfig,
        private Kernel $kernel,
    ) {
    }

    public function boot(): void
    {
        $discoveredLocations = [
            ...$this->discoverAppNamespaces(),
        ];

        $this->addDiscoveryLocations($discoveredLocations);
    }

    private function discoverAppNamespaces(): array
    {
        $composer = $this->loadJsonFile(path($this->kernel->root, 'composer.json'));
        $namespaceMap = $composer['autoload']['psr-4'] ?? [];

        $discoveredLocations = [];

        foreach ($namespaceMap as $namespace => $path) {
            $path = path($this->kernel->root, $path);

            $discoveredLocations[] = [
                'namespace' => $namespace,
                'path' => $path,
            ];
        }

        return $discoveredLocations;
    }

    private function addDiscoveryLocations(array $discoveredLocations): void
    {
        foreach ($discoveredLocations as $location) {
            $this->appConfig->discoveryLocations = [new DiscoveryLocation(...$location), ...$this->appConfig->discoveryLocations];
        }
    }

    private function loadJsonFile(string $path): array
    {
        if (! is_file($path)) {
            $relativePath = str_replace($this->kernel->root, '.', $path);

            throw new BootstrapException(sprintf('Could not locate %s, try running "composer install"', $relativePath));
        }

        return json_decode(file_get_contents($path), true);
    }
}
