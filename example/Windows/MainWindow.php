<?php
declare(strict_types=1);

namespace Example\Windows;

use PHPNative\Window\BaseWindow;

class MainWindow extends BaseWindow
{

    public function getTitle(): string
    {
        return 'Example Window';
    }

    public function build(): void
    {
        // TODO: Implement build() method.
    }
}