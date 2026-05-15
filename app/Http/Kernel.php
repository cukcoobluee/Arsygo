<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    // Middleware global (di semua request)
    protected $middleware = [
    ];

    // Middleware grup
    protected $middlewareGroups = [
    ];

    // Middleware per route
    protected $routeMiddleware = [

    ];
}
