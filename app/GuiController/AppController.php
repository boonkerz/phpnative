<?php
declare(strict_types=1);

namespace App\GuiController;

use App\Windows\MainWindow;
use PHPNative\Lifecycle\AppState;
use PHPNative\Lifecycle\Lifecycle;
use PHPNative\Lifecycle\LifecycleHandle;


class AppController
{
    public function __construct(private Lifecycle $lifecycle)
    {
    }


    #[LifecycleHandle(appState: AppState::onInit)]
    public function init(): void
    {
        $window = new MainWindow(800,400,100,100, "PHPNative Example", "m-10 bg-green-600 sm:bg-red-600");

        $this->lifecycle->show($window);
    }

    private function exit(): void
    {

    }
}