<?php
declare(strict_types=1);

namespace App\Controller;

use PHPNative\Controller\BaseController;
use PHPNative\Ui\Factory;


class AppController
{
    public function __construct(private Factory $uiFactory)
    {
    }


    #[onAppStart]
    public function init(): void
    {

    }


}