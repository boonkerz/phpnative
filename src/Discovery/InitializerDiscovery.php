<?php

namespace PHPNative\Discovery;

use PHPNative\Container\Initializer;
use ReflectionClass;
use PHPNative\Container\Container;

final readonly class InitializerDiscovery implements Discovery
{
    private const CACHE_PATH = __DIR__ . '/initializer-discovery.cache.php';

    public function __construct(
        private Container $container,
    ) {
    }

    public function discover(ReflectionClass $class): void
    {
        if (
            ! $class->isInstantiable()
            || ! $class->implementsInterface(Initializer::class)
        ) {
            return;
        }

        $this->container->addInitializer($class);
    }

    public function hasCache(): bool
    {
        return file_exists(self::CACHE_PATH);
    }

    public function storeCache(): void
    {
        file_put_contents(self::CACHE_PATH, serialize($this->container->getInitializers()));
    }

    public function restoreCache(Container $container): void
    {
        $initializers = unserialize(file_get_contents(self::CACHE_PATH));

        $this->container->setInitializers($initializers);
    }

    public function destroyCache(): void
    {
        @unlink(self::CACHE_PATH);
    }
}