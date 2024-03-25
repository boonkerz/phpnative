<?php
declare(strict_types=1);

namespace App\Windows;

use PHPNative\Ui\Widgets\Button;
use PHPNative\Ui\Window;

class MainWindow extends Window
{

    public Button $exitButton;

    public function init(): void
    {
        $this->style = "bg-indigo-500 p-6 border border-rose-600";

        $this->exitButton = new Button("Exit");
        $this->addWidget($this->exitButton);
    }
}