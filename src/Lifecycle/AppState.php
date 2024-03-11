<?php

namespace PHPNative\Lifecycle;

enum AppState: int
{

    case onInit = 1;
    case onStart = 2;
    case onStarted = 3;
    case onClose = 4;
    case onClosed = 5;
}
