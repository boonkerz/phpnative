<?php

declare(strict_types=1);

namespace PHPNative {
    function path(string ...$parts): string
    {
        $path = implode('/', $parts);

        return str_replace(
            ['//', '\\', '\\\\'],
            ['/', '/', '/'],
            $path,
        );
    }
}
