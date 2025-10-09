<?php

namespace VanguardLTE\Http
{
    class Kernel extends \Illuminate\Foundation\Http\Kernel
    {
        protected $middleware = [
            \VanguardLTE\Http\Middleware\VerifyInstallation::class,
            'Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode',
            \VanguardLTE\Http\Middleware\TrimStrings::class,
            'Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull',
            \VanguardLTE\Http\Middleware\TrustProxies::class,
        ];

        protected $middlewareGroups = [
            'web' => [
                \VanguardLTE\Http\Middleware\EncryptCookies::class,
                'Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse',
                'Illuminate\Session\Middleware\StartSession',
                'Illuminate\View\Middleware\ShareErrorsFromSession',
                \VanguardLTE\Http\Middleware\VerifyCsrfToken::class,
                'Illuminate\Routing\Middleware\SubstituteBindings',
                \VanguardLTE\Http\Middleware\SelectLanguage::class,
            ],
            'api' => [
                \VanguardLTE\Http\Middleware\UseApiGuard::class,
                'throttle:60,1',
                'bindings',
            ],
        ];

        protected $routeMiddleware = [
            'auth' => \VanguardLTE\Http\Middleware\Authenticate::class,
            'auth.basic' => 'Illuminate\Auth\Middleware\AuthenticateWithBasicAuth',
            'guest' => \VanguardLTE\Http\Middleware\RedirectIfAuthenticated::class,
            'registration' => \VanguardLTE\Http\Middleware\Registration::class,
            'session.database' => \VanguardLTE\Http\Middleware\DatabaseSession::class,
            'bindings' => 'Illuminate\Routing\Middleware\SubstituteBindings',
            'throttle' => 'Illuminate\Routing\Middleware\ThrottleRequests',
            'cache.headers' => 'Illuminate\Http\Middleware\SetCacheHeaders',
            'role' => 'jeremykenedy\LaravelRoles\App\Http\Middleware\VerifyRole',
            'permission' => 'jeremykenedy\LaravelRoles\App\Http\Middleware\VerifyPermission',
            'level' => 'jeremykenedy\LaravelRoles\App\Http\Middleware\VerifyLevel',
            'ipcheck' => \VanguardLTE\Http\Middleware\IpMiddleware::class,
            'siteisclosed' => \VanguardLTE\Http\Middleware\SiteIsClosed::class,
            'localization' => \VanguardLTE\Http\Middleware\SelectLanguage::class,
            'shopzero' => \VanguardLTE\Http\Middleware\ShopZero::class,
            'shop_not_zero' => \VanguardLTE\Http\Middleware\ShopNotZero::class,
            'only_for_admin' => \VanguardLTE\Http\Middleware\OnlyForAdmin::class,
            'permission_api' => \VanguardLTE\Http\Middleware\VerifyPermission::class,
            'checker' => \VanguardLTE\Http\Middleware\Checker::class,
            '2fa' => 'PragmaRX\Google2FALaravel\Middleware',
        ];
    }

}
