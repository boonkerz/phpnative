<?php

namespace PHPNative\Lifecycle;

use PHPNative\Ui\WindowInterface;

class Context
{

    public function __construct(private WindowInterface $window)
    {

    }

    public function show(): void
    {
        $this->window->show();
    }

    public function update(float $delta): void
    {
        echo "up".PHP_EOL;
    }

    public function render(float $delta): void
    {
        echo "re".PHP_EOL;
        $this->window->render();

        while ($event = $this->window->pollEvent()) {
            echo $event .PHP_EOL;
            if($event == 99) $this->window->close();
            if($event == 1) break;
            //$this->poll($event);
        }
    }
}