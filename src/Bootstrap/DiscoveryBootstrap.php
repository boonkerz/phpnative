<?php

declare(strict_types=1);

namespace PHPNative\Bootstrap;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use ReflectionClass;
use SplFileInfo;
use PHPNative\AppConfig;
use PHPNative\Container\Container;
use PHPNative\Discovery\Discovery;
use Throwable;
use function PHPNative\path;

final readonly class DiscoveryBootstrap implements Bootstrap
{
    public function __construct(
        private AppConfig $appConfig,
        private Container $container,
    ) {
    }

    public function boot(): void
    {
        reset($this->appConfig->discoveryClasses);

        while ($discoveryClass = current($this->appConfig->discoveryClasses)) {
            /** @var Discovery $discovery */
            $discovery = $this->container->get($discoveryClass);

            if ($this->appConfig->discoveryCache && $discovery->hasCache()) {
                $discovery->restoreCache($this->container);
                next($this->appConfig->discoveryClasses);

                continue;
            }

            foreach ($this->appConfig->discoveryLocations as $discoveryLocation) {
                $directories = new RecursiveDirectoryIterator($discoveryLocation->path);
                $files = new RecursiveIteratorIterator($directories);

                /** @var SplFileInfo $file */
                foreach ($files as $file) {
                    $fileName = $file->getFilename();

                    if (
                        $fileName === ''
                        || $fileName === '.'
                        || $fileName === '..'
                        || ucfirst($fileName) !== $fileName
                    ) {
                        continue;
                    }

                    $className = str_replace(
                        [$discoveryLocation->path, '/', '.php', '\\\\'],
                        [$discoveryLocation->namespace, '\\', '', '\\'],
                        path($file->getPathname()),
                    );

                    try {
                        $reflection = new ReflectionClass($className);
                    } catch (Throwable) {
                        continue;
                    }

                    $discovery->discover($reflection);
                }
            }

            next($this->appConfig->discoveryClasses);

            $discovery->storeCache();
        }
    }
}
