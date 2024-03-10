<?php

declare(strict_types=1);

namespace PHPNative\Container;

use ReflectionClass;

interface Container
{
    public function register(string $className, callable $definition): self;

    public function singleton(string $className, callable $definition): self;

    public function config(object $config): self;

    /**
     * @template TClassName
     * @param class-string<TClassName> $className
     * @return TClassName
     */
    public function get(string $className, mixed ...$params): object;

    public function call(object $object, string $methodName, mixed ...$params): mixed;

    /**
     * @template T of \PHPNative\Container\Initializer
     * @template U of \PHPNative\Container\DynamicInitializer
     * @param ReflectionClass|class-string<T>|class-string<U> $initializerClass
     * @return self
     */
    public function addInitializer(ReflectionClass|string $initializerClass): self;
}