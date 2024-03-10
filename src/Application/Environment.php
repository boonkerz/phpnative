<?php

declare(strict_types=1);

namespace PHPNative\Application;

enum Environment: string
{
    case LOCAL = 'local';
    case STAGING = 'staging';
    case PRODUCTION = 'production';
    case CI = 'ci';
    case TESTING = 'testing';
    case OTHER = 'other';
}
