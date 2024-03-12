<?php

namespace PHPNative\Application;

use PHPNative\AppConfig;
use PHPNative\Application\Application;
use PHPNative\Container\Container;
use PHPNative\Lifecycle\LifecycleConfig;
use PHPNative\Loop\OrderedEventLoop;
use Throwable;

final readonly class GuiApplication implements Application
{

    public function __construct(
        private Container $container,
        private AppConfig $appConfig,
    ) {
    }

    public function run(): void
    {
        try {
            $lifeCycleConfig = $this->container->get(LifecycleConfig::class);

            dd("test");
        } catch (Throwable $throwable) {
            if (! $this->appConfig->enableExceptionHandling) {
                throw $throwable;
            }

            foreach ($this->appConfig->exceptionHandlers as $exceptionHandler) {
                $exceptionHandler->handle($throwable);
            }
        }
    }
}