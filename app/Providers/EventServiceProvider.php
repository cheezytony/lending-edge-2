<?php

namespace App\Providers;

use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \App\Events\V1\MailEvent::class => [
            \App\Listeners\V1\SendContactMail::class,
        ],

        \Illuminate\Auth\Events\Attempting::class => [
            \App\Listeners\V1\Authentication\LogSuccessfulLogin::class,
        ],
        \Illuminate\Auth\Events\Failed::class => [
            \App\Listeners\V1\Authentication\LogFailedLogin::class,
        ],
        \Illuminate\Auth\Events\Login::class => [
            \App\Listeners\V1\Authentication\LogSuccessfulLogin::class,
        ],
        \Illuminate\Auth\Events\Registered::class => [
            SendEmailVerificationNotification::class,
        ],
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
}
