<?php

namespace App\Http;

use App\Http\Middleware\AuthenticateOnceWithBasicAuth;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\TrimStrings;
use App\Http\Middleware\TrustProxies;
use Fruitcake\Cors\HandleCors;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode;
use Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull;
use Illuminate\Foundation\Http\Middleware\ValidatePostSize;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Routing\Middleware\ThrottleRequests;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Xinax\LaravelGettext\Middleware\GettextMiddleware;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        CheckForMaintenanceMode::class,
        ValidatePostSize::class,
        TrimStrings::class,
        ConvertEmptyStringsToNull::class,
        TrustProxies::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            'start_session',
            'session_errors',
            'bindings',
            'gettext',
        ],

        'api' => [
            'throttle:120,1',
            'bindings',
            'cors',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'start_session' => StartSession::class,
        'authenticate_session' => AuthenticateSession::class,
        'session_errors' => ShareErrorsFromSession::class,
        'bindings' => SubstituteBindings::class,
        'gettext' => GettextMiddleware::class,
        'throttle' => ThrottleRequests::class,
        'guest' => RedirectIfAuthenticated::class,
        'auth' => Authenticate::class,
        'apiAuth' => AuthenticateOnceWithBasicAuth::class,
        'cors' => HandleCors::class,
    ];
}
