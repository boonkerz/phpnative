<?php

declare(strict_types=1);

namespace PHPNative {

    use PHPNative\Support\Reflection\Attributes;

    function path(string ...$parts): string
    {
        $path = implode('/', $parts);

        return str_replace(
            ['//', '\\', '\\\\'],
            ['/', '/', '/'],
            $path,
        );
    }

    /**
     * @template T of object
     * @param class-string<T> $attributeName
     * @return \PHPNative\Support\Reflection\Attributes<T>
     */
    function attribute(string $attributeName): Attributes
    {
        return Attributes::find($attributeName);
    }

}
