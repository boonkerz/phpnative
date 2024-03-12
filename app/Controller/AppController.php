<?php
declare(strict_types=1);

namespace App\Controller;

use PHPNative\Controller\BaseController;
use PHPNative\Lifecycle\AppState;
use PHPNative\Lifecycle\LifecycleHandle;
use PHPNative\Ui\Factory;


class AppController
{
    public function __construct(private Factory $uiFactory)
    {
    }


    #[LifecycleHandle(appState: AppState::onInit)]
    public function init(): void
    {

        dd("test");

    }


}