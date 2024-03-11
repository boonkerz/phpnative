<?php

declare(strict_types=1);

namespace PHPNative\Discovery;

use PHPNative\Container\Container;
use PHPNative\Lifecycle\LifecycleConfig;
use PHPNative\Lifecycle\LifecycleHandle;
use PHPNative\Support\Reflection\Attributes;
use ReflectionClass;
use ReflectionMethod;

final readonly class LifecycleDiscovery implements Discovery
{

    private const CACHE_PATH = __DIR__ . '/lifecycle-discovery.cache.php';

    public function __construct(private LifecycleConfig $lifecycleConfig)
    {
    }

    public function discover(ReflectionClass $class): void
    {
        foreach ($class->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
            $lifeCycle = Attributes::find(LifecycleHandle::class)->in($method)->first();

            if (! $lifeCycle) {
                continue;
            }

            $this->lifecycleConfig->addHandle($method, $lifeCycle);
        }
    }

    public function hasCache(): bool
    {
        return file_exists(self::CACHE_PATH);
    }

    public function storeCache(): void
    {
        file_put_contents(self::CACHE_PATH, serialize($this->lifecycleConfig->handles));
    }

    public function restoreCache(Container $container): void
    {
        $commands = unserialize(file_get_contents(self::CACHE_PATH));

        $this->lifecycleConfig->handles = $commands;
    }

    public function destroyCache(): void
    {
        @unlink(self::CACHE_PATH);
    }
}
