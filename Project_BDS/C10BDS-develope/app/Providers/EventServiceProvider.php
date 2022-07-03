<?php

namespace App\Providers;

use App\Events\CustomerSubmitEvent;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

use App\Events\ProductCreated;
use App\Events\ProductLogEvent;
use App\Listeners\SendNewProductNotification;

use App\Events\ProductSold;
use App\Events\ProductSubmitEvent;
use App\Events\UserSubmitEvent;
use App\Events\ProductRenewed;
use App\Listeners\CustomerSubmitListener;
use App\Listeners\ProductLogListener;
use App\Listeners\ProductSubmitListener;
use App\Listeners\SendSoldProductNotification;
use App\Listeners\UserSubmitListener;
use App\Listeners\SendRenewedProductNotification;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [

        CustomerSubmitEvent::class => [
            CustomerSubmitListener::class
        ],
        UserSubmitEvent::class => [
            UserSubmitListener::class
        ],
        Registered::class => [
            SendEmailVerificationNotification::class
        ],
        ProductCreated::class => [
            SendNewProductNotification::class
        ],
        ProductSold::class => [
            SendSoldProductNotification::class
        ],
        ProductSubmitEvent::class => [
            ProductSubmitListener::class,
        ],
        ProductRenewed::class => [
            SendRenewedProductNotification::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
