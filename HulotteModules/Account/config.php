<?php

use function DI\add;
use function DI\autowire;
use function DI\get;
use Hulotte\AuthInterface;
use HulotteModules\Auth;

return [
    // Class definitions
    AuthInterface::class => autowire(Auth::class),

    // Permissions

    // Twig extensions

    // URLs

    // Variables
    'account.auth.login' => '/login',
];
