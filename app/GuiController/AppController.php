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
        $window = new MainWindow(400,400,0,0, "PHPNative Example", "p-6");

        $this->lifecycle->show($window);
    }


}