<?php

namespace PHPNative\Window;

use Attribute;
use ReflectionMethod;

#[Attribute]
class WindowHandler
{
    public string $windowName;

    public ReflectionMethod $handler;

    public function setCommandName(string $windowName): self
    {
        $this->windowName = $windowName;

        return $this;
    }

    public function setHandler(ReflectionMethod $handler): self
    {
        $this->handler = $handler;

        return $this;
    }

    public function __serialize(): array
    {
        return [
            'commandName' => $this->windowName,
            'handler_class' => $this->handler->getDeclaringClass()->getName(),
            'handler_method' => $this->handler->getName(),
        ];
    }

    public function __unserialize(array $data): void
    {
        $this->windowName = $data['windowName'];
        $this->handler = new ReflectionMethod(
            objectOrMethod: $data['handler_class'],
            method: $data['handler_method'],
        );
    }
}