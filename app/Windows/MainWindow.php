<?php
declare(strict_types=1);

namespace App\Windows;

use PHPNative\Ui\BaseWindow;

#[Window('')]
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