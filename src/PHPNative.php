<?php
declare(strict_types=1);

namespace PHPNative;

use PHPNative\Application\Application;
use PHPNative\Application\GuiApplication;
use PHPNative\Application\Kernel;
use PHPNative\Container\Container;

final readonly class PHPNative
{
    public Container $container;

    private function __construct(
        private Kernel $kernel,
    ) {
    }

    public static function boot(string $root): self
    {
        $kernel = new Kernel(
            root: $root,
            appConfig: new AppConfig(root: $root)
        );

        return new self(
            kernel: $kernel,
        );
    }

    public function console(): ConsoleApplication
    {
        $container = $this->kernel->init();

        $application = new ConsoleApplication(
            args: $_SERVER['argv'],
            container: $container,
        );

        $container->singleton(Application::class, fn () => $application);

        return $application;
    }

    public function gui(): GuiApplication
    {
        $container = $this->kernel->init();
        $appConfig = $container->get(AppConfig::class);

        $application = new GuiApplication(
            container: $container,
            appConfig: $appConfig
        );

        $container->singleton(Application::class, fn () => $application);

        return $application;
    }

    public function kernel(): Kernel
    {
        return $this->kernel;
    }
}