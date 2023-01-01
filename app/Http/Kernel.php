<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class,
        \Fruitcake\Cors\HandleCors::class,
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array<string, class-string|string>
     */
    protected $routeMiddleware = [
        'auth'             => \App\Http\Middleware\Authenticate::class,
        'auth.basic'       => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'cache.headers'    => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can'              => \Illuminate\Auth\Middleware\Authorize::class,
        'guest'            => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed'           => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle'         => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified'         => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
    /*--------------------------------------------------------------------------------------------------------------------*/
        /////////////// start laravel permissions middleware - added here manually for the permission package ///////////////
        'role'               => \Spatie\Permission\Middlewares\RoleMiddleware::class,
        'permission'         => \Spatie\Permission\Middlewares\PermissionMiddleware::class,
        'role_or_permission' => \Spatie\Permission\Middlewares\RoleOrPermissionMiddleware::class,
        /////////////// end laravel permissions middleware - added here manually for the permission package ///////////////
    /*--------------------------------------------------------------------------------------------------------------------*/
        /////////////// start admin, moderator & supplier user types middleware for dashboard ///////////////
        'dashboard' => \App\Http\Middleware\Dashboard::class, //it will take guests to the register page if they tried to write "/dashboard" in the URL (for "guests", dashboard isn't allowed in the Front-End already & in URL!)
                                                              //it will take users with the user type "customer" to the main website's home page if they tried to write "/dashboard" in the URL (also for "customers", dashboard isn't allowed in the Front-End already & in URL!)
                                                              //it will take users with the user type "admin", "moderator" & "supplier" to the dashboard (dashboard is allowed to them in Front-End & in URL)
        /////////////// end admin, moderator & supplier user types middleware for dashboard ///////////////
    /*--------------------------------------------------------------------------------------------------------------------*/
        /////////////// start guest cart page - already logged in as a customer middleware ///////////////
        'cart_already_logged_in_as_a_customer' => \App\Http\Middleware\CartAlreadyLoggedIn::class, /* it will take the registered users (as customers) to the cart page
                                                                                                      not to the guest cart page because they are already logged in */
        /////////////// end guest cart page - already logged in as a customer middleware ///////////////
    /*--------------------------------------------------------------------------------------------------------------------*/
        /////////////// **************************************************************** ///////////////
        'unregistered_users' => \App\Http\Middleware\unregisteredUsers::class, /* it will take the unregistered users to a certain page. In this middleware's logic
                                                                                  code the certain page is "home" which gives the functionality the correct logic */
        /////////////// **************************************************************** ///////////////
    /*--------------------------------------------------------------------------------------------------------------------*/
        /////////////// **************************************************************** ///////////////
        'only_admins_and_moderators' => \App\Http\Middleware\onlyAdminsAndModerators::class, // "admins" & "moderators" ONLY! no any other user type from the DB
        /////////////// **************************************************************** ///////////////
    /*--------------------------------------------------------------------------------------------------------------------*/
        /////////////// **************************************************************** ///////////////
        'only_customers_and_suppliers' => \App\Http\Middleware\onlyCustomersAndSuppliers::class, // "customers" & "suppliers" ONLY! no any other user type from the DB
        /////////////// **************************************************************** ///////////////
    /*--------------------------------------------------------------------------------------------------------------------*/
        /////////////// **************************************************************** ///////////////
        'only_customers' => \App\Http\Middleware\onlyCustomers::class, // "customers" ONLY! no any other user type from the DB
        /////////////// **************************************************************** ///////////////
    /*--------------------------------------------------------------------------------------------------------------------*/
        /////////////// **************************************************************** ///////////////
        'only_guests' => \App\Http\Middleware\onlyGuests::class, // "guests" ONLY! no any other user type from the DB
        /////////////// **************************************************************** ///////////////
    /*--------------------------------------------------------------------------------------------------------------------*/
    /*--------------------------------------------------------------------------------------------------------------------*/
        /////////////// **************************************************************** ///////////////

        /////////////// **************************************************************** ///////////////
    /*--------------------------------------------------------------------------------------------------------------------*/

    ];
}
