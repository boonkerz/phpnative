<?php
declare(strict_types=1);

namespace PHPNative;

use DI\Container;
use PHPNative\Application\Kernel;
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

        $application = new GuiApplication(
            args: $_SERVER['argv'],
            container: $container,
        );

        $container->singleton(Application::class, fn () => $application);

        return $application;
    }

    public function kernel(): Kernel
    {
        return $this->kernel;
    }
}