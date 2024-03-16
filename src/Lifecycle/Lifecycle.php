<?php

namespace PHPNative\Lifecycle;

use PHPNative\Container\Container;
use PHPNative\Container\Singleton;
use PHPNative\Event\Event;
use PHPNative\Event\EventType;
use PHPNative\Loop\OrderedEventLoop;
use PHPNative\Loop\WorkerInterface;
use PHPNative\Ui\Window;

class Lifecycle implements WorkerInterface
{

    public function __construct(
        private OrderedEventLoop $loop,
        private ContextCollection $contextCollection,
        private Container $container)
    {
        $this->loop->use($this);
    }

    public function show(Window $window, array $arguments = []): void
    {
        if ($this->contextCollection !== null) {
            $this->contextCollection->map(fn(Context $context) => $context->hide());
        }

        foreach ($arguments as $name => $argument) {
            if (\class_exists($name) || \interface_exists($name)) {
                $this->container->instance($name, $argument);
            }
        }

        $context = $this->container->get(
            Context::class,
            window: $window
        );

        $context->show();

        $this->contextCollection->add($context);
    }

    public function run(): void
    {
        $this->loop->run();
    }

    public function onUpdate(float $delta): void
    {
        $this->contextCollection->map(fn(Context $context) => $context->update($delta));
    }

    public function onRender(float $delta): void
    {
        $this->contextCollection->map(fn(Context $context) => $context->render($delta));
    }

    public function onEvent(Event $event): void
    {
        if($event->getType() === EventType::QUIT) {
            $this->loop->stop();
        }
    }

    public function onPause(): void
    {
        if ($this->context !== null) {
            $this->context->pause();
        }
    }

    public function onResume(): void
    {
        if ($this->context !== null) {
            $this->context->resume();
        }
    }
}