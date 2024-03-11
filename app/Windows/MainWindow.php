<?php
declare(strict_types=1);

namespace App\Windows;

use App\Controller\AppController;

#[Window(title: 'MainWindow', id: 'mainwindow', controller: AppController::class)]
class MainWindow
{


}