<?php

namespace PHPNative\Lifecycle;

use Attribute;
use ReflectionMethod;

#[Attribute]
class LifecycleHandle
{
    public ReflectionMethod $handler;

    public function __construct(private readonly ?AppState $appState = null)
    {

    }

    public function setHandler(ReflectionMethod $handler): self
    {
        $this->handler = $handler;

        return $this;
    }

    public function __serialize(): array
    {
        return [
            'appState' => $this->appState,
            'handler_class' => $this->handler->getDeclaringClass()->getName(),
            'handler_method' => $this->handler->getName(),
        ];
    }

    public function __unserialize(array $data): void
    {
        $this->appState = $data['appState'];
        $this->handler = new ReflectionMethod(
            objectOrMethod: $data['handler_class'],
            method: $data['handler_method'],
        );
    }
}