<?php

declare(strict_types=1);

namespace PHPNative\Application;

use PHPNative\AppConfig;
use PHPNative\Container\Container;
use PHPNative\Container\GenericContainer;

final readonly class Kernel
{
    public function __construct(
        public string     $root,
        private AppConfig $appConfig,
    )
    {
    }

    public function init(): Container
    {
        $container = $this->createContainer();

        $bootstraps = [
            //DiscoveryLocationBootstrap::class,
            //ConfigBootstrap::class,
            //DiscoveryBootstrap::class,
        ];

        foreach ($bootstraps as $bootstrap) {
            $container->get(
                $bootstrap,
                kernel: $this,
                appConfig: $this->appConfig,
            )->boot();
        }

        return $container;
    }

    private function createContainer(): Container
    {
        $container = new GenericContainer();

        GenericContainer::setInstance($container);

        $container
            ->config($this->appConfig)
            ->singleton(self::class, fn () => $this)
            ->singleton(Container::class, fn () => $container)
//            ->addInitializer(RouteBindingInitializer::class)
//            ->addInitializer(PDOInitializer::class);
            ;
        return $container;
    }
}