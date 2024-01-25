<?php

namespace App\Providers;

use App\Listeners\EmailUsersAbout;
use App\Listeners\LogSeriesCreated;
use App\Events\SeriesCreated;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
   //código omitido

   protected $listen = [

            Registered::class => [
                SendEmailVerificationNotification::class,
            ],
                SeriesCreated::class => [
                    EmailUsersAbout::class,
                    LogSeriesCreated::class
                ],
];

    //código omitido

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
